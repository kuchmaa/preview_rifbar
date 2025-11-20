import { getElemById } from "../utils/DOM.js";
import {
    inputPassword,
    inputPlaceholderHandler,
    inputValidator,
    preventDefault,
    ValidationEnum,
} from "../utils/event.js";

(() => {
    const form = {
		errorElem: getElemById('error'),
        element: getElemById("form"), // <form id="form">
        inputsWrapper: {
            email: getElemById("email"), // <div id="email"> ... <input name="email">
            pass: getElemById("pass"),   // <div id="pass">  ... <input name="password">
        },
        buttons: {
            submit: getElemById("submit"), // <button id="submit">
        },
    };

    // 1) Обработчик поля "Email"
    const emailHandler = inputPlaceholderHandler(form.inputsWrapper.email, {
        callback: (value, newValue) => newValue,
        errorCallback: (value) =>
            !inputValidator({
                type: ValidationEnum.email,
                value,
            }) && "Invalid email",
    });

    // 2) Обработчик поля "Password"
    const passwordHandler = inputPassword(
        form.inputsWrapper.pass,
        null, // Нет блока "Confirm Password" для логина
        {
            pass: form.inputsWrapper.pass.getElementsByClassName("showPass")[0],
        }
    );

    // 3) При сабмите формы
    form.element.addEventListener(
        "submit",
		preventDefault(() => {
			form.buttons.submit.disabled = true;
            // Проверяем локальные ошибки валидации
            if (emailHandler.checkError() && passwordHandler.passHandler.checkError()) {
                // Собираем данные из формы
                const formData = new FormData(form.element);

                // Отправляем AJAX-запрос на /login
                fetch("/login", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                    },
                    body: JSON.stringify({
                        email: formData.get("email"),
                        password: passwordHandler.getPass(),
                        remember: Boolean(formData.get("remember")),
                    }),
                })
                    .then(async (response) => {
                        if (!response.ok) {
                            // Например, 401 при неверных данных или 422 при ошибке валидации
                            let errors = {};
                            try {
                                errors = await response.json();
                            } catch {}
                            // console.error("Login error:", errors);
                            throw new Error("Invalid email or password");
                        }

                        // Следуем серверному редиректу на /dashboard, который распределит по ролям
                        window.location.href = "/dashboard";
                    })
					.catch((error) => {
						form.buttons.submit.disabled = false;
						form.errorElem.innerText = `${error.message}`;
						emailHandler.setError(true);
						passwordHandler.passHandler.setError(true);
                    });
            }
        })
    );
})();