import { getElemById } from "../utils/DOM.js";
import {
    inputPassword,
    inputPlaceholderHandler,
    inputValidator,
    preventDefault,
    ValidationEnum,
} from "../utils/event.js";

(() => {

	var errorElem = getElemById('error');
    // 1. Получаем основные элементы формы
    const formElement = getElemById("form");

    // Обёртки (div) для каждого поля:
    const nameWrapper = getElemById("name");
    const emailWrapper = getElemById("email");
    const phoneWrapper = getElemById("phone");
    const passWrapper = getElemById("pass");
    const confirmWrapper = getElemById("varyfPass");

    // Кнопка "Submit"
    const submitButton = getElemById("submit");

    // 2. Создаём обработчики для полей (name, email, phone) через inputPlaceholderHandler
    const nameHandler = inputPlaceholderHandler(nameWrapper, {
        callback: (value, newValue) => newValue,
        errorCallback: (value) => value.length < 1 && "Type name",
    });

    const emailHandler = inputPlaceholderHandler(emailWrapper, {
        callback: (value, newValue) => newValue,
        errorCallback: (value) =>
            !inputValidator({
                type: ValidationEnum.email,
                value,
            }) && "Invalid email",
    });

    const phoneHandler = inputPlaceholderHandler(phoneWrapper, {
        callback: (value, newValue) => {
            // Убираем пробелы, подставляем пробелы между цифрами для формата
            value = value.replaceAll(" ", "");
            newValue = newValue.replaceAll(" ", "");
            if (!isNaN(newValue)) {
                // Например, делим 10 цифр на блоки 3-3-4
                return newValue.replace(/^(\d{3})(\d{3})(\d{4})(.*)$/, "$1 $2 $3$4");
            } else {
                return value.replace(/^(\d{3})(\d{3})(\d{4})(.*)$/, "$1 $2 $3$4");
            }
        },
        errorCallback: (value) =>
            !inputValidator({
                type: ValidationEnum.phone,          // /^\d{10}$/
                value: value.replaceAll(" ", ""),    // убираем пробелы для валидации
            }) && "Invalid phone",
    });

    // 3. Обработчик пароля и подтверждения пароля
    //    В вашем event.js inputPassword возвращает { passHandler, confirmHandler, getPass()... }
    //    Нам нужны именно passHandler и confirmHandler, чтобы получить значения полей
    const password = inputPassword(passWrapper, confirmWrapper, {
        pass: passWrapper.getElementsByClassName("showPass")[0],
        confirm: confirmWrapper.getElementsByClassName("showPass")[0],
    });
    // Теперь password.passHandler — это обработчик основного пароля,
    // а password.confirmHandler — обработчик поля подтверждения пароля.

    // 4. При сабмите формы
    formElement.addEventListener(
        "submit",
		preventDefault(() => {
			submitButton.disabled = true;
            // Локальная проверка ошибок
            const allValid =
                nameHandler.checkError() &&
                emailHandler.checkError() &&
                phoneHandler.checkError() &&
                password.passHandler.checkError() &&       // Основной пароль
                password.confirmHandler.checkError();      // Подтверждение пароля

            if (allValid) {
                // 5. Отправляем запрос на /register через fetch
                fetch("/register", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                    },
                    body: JSON.stringify({
                        name: nameHandler.getValue(),
                        email: emailHandler.getValue(),
                        phone: phoneHandler.getValue(),
                        // Берём значение из passHandler (основной пароль)
                        password: password.passHandler.getValue(),
                        // Берём значение из confirmHandler (подтверждение)
                        password_confirmation: password.confirmHandler.getValue(),
                    }),
                })
                    .then(async (response) => {
                        if (!response.ok) {
                            // Например, 422 при ошибке валидации
                            const errors = await response.json().catch(() => ({}));
                            console.error("Validation errors:", errors);
                            throw errors;
                        }
                        // Следуем серверному редиректу на /dashboard, который распределит по ролям
                        window.location.href = "/dashboard";
                    })
					
                    .catch((error) => {
						if (error.errors.email) {
							emailHandler.setError(true, error.message)
						} else { 
							errorElem.innerText ='Unexpected error, try again later'; 
						}
						// alert("Request error: " + error.message);
						submitButton.disabled = false;
                    });
            }
        })
    );
})();