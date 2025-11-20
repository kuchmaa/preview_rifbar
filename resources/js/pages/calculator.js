import Accordion from "../utils/accordion.js";
import { createElement, getElemById, swapAttribute } from "../utils/DOM.js";
import {
	inputElement,
	inputHandler,
	inputPlaceholderHandler,
	inputValidator,
	preventDefault,
	ValidationEnum,
} from "../utils/event.js";
import { Slider } from "../utils/slider.js";

// Объявляем переменные за пределами IIFE для глобальной доступности
let form = {};
let calcPages = {};
let orderPrice = {};

(() => {

	var amountFormatter = new Intl.NumberFormat("en-EN");
	window.amountFormatter = amountFormatter; // Делаем доступным глобально
	new Slider(getElemById("affordableSlider"), );
	new Accordion(getElemById("mattressesAccordion", {autoClosing: false}));
	var priceCoefficient = (coefficient) => {
        return (w, h, l) => {
            const price = w * h * l * coefficient;
			return Math.max(60, price).toFixed(2);
		};
	};
	var orderPriseElem = (elem, pattern) => {
		var minPrice = 150;
		var priceValue = 0;
		return {
			/**
			 * Вставляет новое значение в `elem`, применяя `pattern`.
			 *
			 * @param {(value: number) => number} callback - Функция, возвращающая новое значение.
			 */
			setPrice(callback) {
				priceValue = callback(parseFloat(`${priceValue}`.replaceAll(",", "").replaceAll('$', '')));

				// this.addInsurance(); // Закомментировано, так как элемент "cost" не найден

				// Сразу обновляем отображаемую цену без учета страхования
				elem.innerHTML = pattern(priceValue < minPrice ? minPrice : priceValue);

				// Сохраняем текущую цену в localStorage, если доступна функция сохранения
				if (window.saveCalculatorData) {
					// Сохраняем актуальную цену перед вызовом функции
					window.currentOrderPrice = priceValue < minPrice ? minPrice : priceValue;
					setTimeout(window.saveCalculatorData, 0);
				}
			},
			// Закомментировано, так как вызывает ошибку при отсутствии элемента "cost"
			// addInsurance() {
			//	var value = parseFloat(getElemById("cost").innerText.split("$")[1].replaceAll(",", ""));
			//	elem.innerHTML = pattern(priceValue < minPrice ? minPrice + value : priceValue + value);
			// },
			/**
			 * Возвращает текущее значение `elem`.
			 *
			 * @returns {number} - Числовое значение цены.
			 */
			getPrice: () => parseFloat(priceValue.replaceAll(",", "")),
		};
	};
	orderPrice = orderPriseElem(getElemById("orderPrise"), (value) => {
		var newValue = parseFloat(value).toFixed(2);
		return amountFormatter.format(`${newValue}`) + " $";
	});
	/**
	 * @type {HTMLButtonElement}
	 */
	var orderBtn = getElemById("orderBtn");
	form = {
		/**
		 * @type {HTMLFormElement}
		 */
		boxes: getElemById("boxes"),
		/**
		 * @type {HTMLFormElement}
		 */
		furniture: getElemById("furniture"),
		/**
		 * @type {HTMLFormElement}
		 */
		van: getElemById("van"),
		/**
		 * @type {HTMLFormElement}
		 */
		mattresses: getElemById("mattresses"),
		/**
		 * @type {HTMLFormElement}
		 */
		doors: getElemById("doors"),
		/**
		 * @type {HTMLFormElement}
		 */
		tv: getElemById("tv"),
		/**
		 * @type {HTMLFormElement}
		 */
		suitcases: getElemById("suitcases"),
	};
	calcPages = {
		/**
		 * @type {HTMLDivElement}
		 */
		boxes: getElemById("boxesBtn"),
		/**
		 * @type {HTMLDivElement}
		 */
		furniture: getElemById("furnitureBtn"),
		/**
		 * @type {HTMLDivElement}
		 */
		van: getElemById("vanBtn"),
		/**
		 * @type {HTMLDivElement}
		 */
		mattresses: getElemById("mattressesBtn"),
		/**
		 * @type {HTMLDivElement}
		 */
		doors: getElemById("doorsBtn"),
		/**
		 * @type {HTMLDivElement}
		 */
		tv: getElemById("tvBtn"),
		/**
		 * @type {HTMLDivElement}
		 */
		suitcases: getElemById("suitcasesBtn"),
		/**
		 * @type {HTMLDivElement}
		 */
	};
	var customSizeList = {
		/**
		 * @type {HTMLDivElement}
		 */
		boxes: getElemById("customBoxesList"),
		/**
		 * @type {HTMLDivElement}
		 */
		furniture: getElemById("furnitureList"),
		mattresses: getElemById("customMattressesList"),
	};
	var customSizeBtns = {
		boxes: {
			/**
			 * @type {HTMLButtonElement}
			 */
			open: getElemById("custom-box-btn"),
			/**
			 * Элемент который содержит поля ввода
			 * @type {HTMLDivElement}
			 */
			inputs: getElemById("custom-box"),
			/**
			 * @type {HTMLButtonElement}
			 */
			add: getElemById("addCustomBoxSize"),
		},
		furniture: {
			/**
			 * @type {HTMLButtonElement}
			 */
			open: getElemById("showFurnitureCustom"),
			/**
			 * Элемент который содержит поля ввода
			 * @type {HTMLDivElement}
			 */
			inputs: getElemById("furnitureCustomSize"),
			/**
			 * @type {HTMLButtonElement}
			 */
			add: getElemById("addCustomFurniture"),
		},
		mattresses: {
			/**
			 * @type {HTMLButtonElement}
			 */
			open: getElemById("showCustomMattresses"),
			/**
			 * Элемент который содержит поля ввода
			 * @type {HTMLDivElement}
			 */
			inputs: getElemById("mattressesCustomInputs"),
			/**
			 * @type {HTMLButtonElement}
			 */
			add: getElemById("addCustomMattressesSize"),
		},
	};
	var customSizeInputs = {
		boxes: {
			parent: getElemById("boxCustomValues"),
			/**
			 * @type {HTMLInputElement}
			 */
			width: inputElement(getElemById("customBoxesWidth")),
			/**
			 * @type {HTMLInputElement}
			 */
			height: inputElement(getElemById("customBoxesHeigh")),
			/**
			 * @type {HTMLInputElement}
			 */
			length: inputElement(getElemById("customBoxesLength")),
		},
		furniture: {
			parent: getElemById("furnitureCustomValues"),
			/**
			 * @type {HTMLInputElement}
			 */
			width: inputElement(getElemById("customFurnitureWidth")),
			/**
			 * @type {HTMLInputElement}
			 */
			height: inputElement(getElemById("customFurnitureHeigh")),
			/**
			 * @type {HTMLInputElement}
			 */
			length: inputElement(getElemById("customFurnitureLength")),
			/**
			 * @type {HTMLInputElement}
			 */
		},
		mattresses: {
			parent: getElemById("mattressesCustomInputs"),
			/**
			 * @type {HTMLInputElement}
			 */
			width: inputElement(getElemById("customMattressesWidth")),
			height: inputElement(getElemById("customMattressesHeight")),
			/**
			 * @type {HTMLInputElement}
			 */
			length: inputElement(getElemById("customMattressesLength")),
		},
	};

	var phone = getElemById("phone");
	var swapPage = calcSwapPage(form.boxes, calcPages.boxes);
	var checkboxEvents = {};
	(() => {
		var i = 0;
		for (const key in form) {
			form[key].addEventListener("submit", preventDefault());
			swapPage(calcPages[key], form[key]);
			const boxElements = form[key].getElementsByClassName("box");
			Array.from(boxElements).forEach((item) => {
				item.getElementsByClassName("box-tab-count")[0].classList.add("disabled");
			});
			checkboxEvents[key] = checkboxEvent(calcPages[key], boxElements);
			++i;
		}
	})();
	const minMaxSize = lengthValidation({ maxValue: 400, minValue: 0 });
	var boxesValidator = {
		width: minMaxSize(customSizeInputs.boxes.width, (value) => `${value}"`),
		height: minMaxSize(customSizeInputs.boxes.height, (value) => `${value}"`),
		length: minMaxSize(customSizeInputs.boxes.length, (value) => `${value}"`),
	};
	var furnitureValidator = {
		width: minMaxSize(customSizeInputs.furniture.width, (value) => `${value}"`),
		height: minMaxSize(customSizeInputs.furniture.height, (value) => `${value}"`),
		length: minMaxSize(customSizeInputs.furniture.length, (value) => `${value}"`),
	};
	var mattressesValidator = {
		width: minMaxSize(customSizeInputs.mattresses.width, (value) => `${value}"`),
		height: minMaxSize(customSizeInputs.mattresses.height, (value) => `${value}"`),
		length: minMaxSize(customSizeInputs.mattresses.length, (value) => `${value}"`),
	};
    window.customSizeList = customSizeList;
    window.checkboxEvents = checkboxEvents;
	customSizeBtns.boxes.open.addEventListener("click", () => {
		const swap = swapAttribute(customSizeBtns.boxes.open, customSizeBtns.boxes.inputs);
		swap("active");
	});
	customSizeBtns.boxes.add.addEventListener("click", () => {
		if (
			!boxesValidator.height.handler.getError() &&
			!boxesValidator.width.handler.getError() &&
			!boxesValidator.length.handler.getError()
		) {
			var btns = customSizeBtns.boxes;
			const swap = swapAttribute(btns.inputs, btns.open);
			const price = priceCoefficient(0.012);

			// Получаем размеры
			const width = parseInt(boxesValidator.width.handler.getValue());
			const height = parseInt(boxesValidator.height.handler.getValue());
			const length = parseInt(boxesValidator.length.handler.getValue());
			const calculatedPrice = price(width, height, length);
			// console.log(calculatedPrice);

			// Создаем уникальный ключ
			const uniqueKey = generateCustomKey('box');

			// Создаем UI элемент
			var item = addItemToCustomSize(customSizeList.boxes, {
				width: width,
				price: calculatedPrice,
				height: height,
				length: length,
                boxKey: uniqueKey,
                checked: true
			});

			// Добавляем в глобальную переменную (нужно для внутренней логики)
			window.customItems.boxes.push({
				key: uniqueKey,
				width: width,
				height: height,
				length: length,
				price: calculatedPrice,
				count: 1
			});

			// Добавляем обработчики и активируем чекбокс
			checkboxEvents.boxes.addCheckbox(customSizeList.boxes, item);

			// Сохраняем данные в куки
			if (window.saveCalculatorData) {
				setTimeout(window.saveCalculatorData, 0);
			}

			swap("active");
		}
	});
	customSizeBtns.furniture.add.addEventListener("click", () => {
		if (
			furnitureValidator.height.handler.getState() &&
			furnitureValidator.width.handler.getState() &&
			furnitureValidator.length.handler.getState()
		) {
			var btns = customSizeBtns.furniture;
			const swap = swapAttribute(btns.inputs, btns.open);
			const price = priceCoefficient(0.012);

			// Получаем размеры
			const width = parseInt(furnitureValidator.width.handler.getValue());
			const height = parseInt(furnitureValidator.height.handler.getValue());
			const length = parseInt(furnitureValidator.length.handler.getValue());
			const calculatedPrice = price(width, height, length);

			// Создаем уникальный ключ
			const uniqueKey = generateCustomKey('furniture');

			// Создаем UI элемент
			var item = addItemToCustomSize(customSizeList.furniture, {
				width: width,
				price: calculatedPrice,
				height: height,
				length: length,
                boxKey: uniqueKey,
                checked: true
			});

			// Добавляем в глобальную переменную (нужно для внутренней логики)
			window.customItems.furniture.push({
				key: uniqueKey,
				width: width,
				height: height,
				length: length,
				price: calculatedPrice,
				count: 1
			});

			// Добавляем обработчики и активируем чекбокс
			checkboxEvents.furniture.addCheckbox(customSizeList.furniture, item);

			// Сохраняем данные в куки
			if (window.saveCalculatorData) {
				setTimeout(window.saveCalculatorData, 0);
			}

			swap("active");
		}
	});

	customSizeBtns.furniture.open.addEventListener("click", () => {
		var btns = customSizeBtns.furniture;
		const swap = swapAttribute(btns.open, btns.inputs);
		swap("active");
	});
	var mattressesTable = getElemById("mattressesTable");
	customSizeBtns.mattresses.open.addEventListener("click", () => {
		var btns = customSizeBtns.mattresses;
		const swap = swapAttribute(btns.open.parentElement, btns.inputs);
		mattressesTable.setAttribute("hidden", "");
		swap("active");
	});
	customSizeBtns.mattresses.add.addEventListener("click", () => {
		var btns = customSizeBtns.mattresses;
		const swap = swapAttribute(btns.inputs, btns.open.parentElement);
		if (
			!mattressesValidator.width.handler.getError() &&
			!mattressesValidator.height.handler.getError() &&
			!mattressesValidator.length.handler.getError()
		) {
			if (customSizeList.mattresses.getAttribute("hidden") == "") {
				customSizeList.mattresses.removeAttribute("hidden");
			}
			customSizeList.mattresses.setAttribute("active", "");
			var list = customSizeList.mattresses.getElementsByClassName("box-list")[0];
			const price = priceCoefficient(0.012);

			// Получаем размеры
			const width = parseInt(mattressesValidator.width.handler.getValue());
			const height = parseInt(mattressesValidator.height.handler.getValue());
			const length = parseInt(mattressesValidator.length.handler.getValue());
			const calculatedPrice = price(width, height, length);

			// Создаем уникальный ключ
			const uniqueKey = generateCustomKey('mattress');

			// Создаем UI элемент
			var item = addItemToCustomSize(list, {
				boxKeyElement: false,
				price: calculatedPrice,
				height: height,
				width: width,
				length: length,
                boxKey: uniqueKey,
                checked: true
			});

			// Добавляем в глобальную переменную (нужно для внутренней логики)
			window.customItems.mattresses.push({
				key: uniqueKey,
				width: width,
				height: height,
				length: length,
				price: calculatedPrice,
				count: 1
			});

			// Добавляем обработчики и активируем чекбокс
			checkboxEvents.mattresses.addCheckbox(list, item);

			// Сохраняем данные в куки
			if (window.saveCalculatorData) {
				setTimeout(window.saveCalculatorData, 0);
			}

			mattressesTable.removeAttribute("hidden");
			swap("active");
		}
	});
	var nameInput = inputPlaceholderHandler(getElemById("name"), {
		callback: (value, newValue) => {
			return inputValidator({
				type: ValidationEnum.default,
				value: newValue,
			})
				? newValue
				: value;
		},
		errorCallback: (value) => {},
	});
	var phoneInput = inputHandler({
		wrapper: phone,
		input: phone.getElementsByTagName("input")[0],
		callback: (value, newValue) => {
			value = value.replaceAll(" ", "");
			newValue = newValue.replaceAll(" ", "");
			if (!isNaN(newValue)) {
				return newValue.replace(/^(\d{3})(\d{3})(\d{4})(.*)$/, "$1 $2 $3$4");
			} else {
				return value.replace(/^(\d{3})(\d{3})(\d{4})(.*)$/, "$1 $2 $3$4");
			}
		},
		errorMessage: (value) => {
			return !inputValidator({ type: ValidationEnum.phone, value: value.replaceAll(" ", "") });
		},
	});
	var emailInput = inputPlaceholderHandler(getElemById("emailInputWrapper"), {
		callback: (value, newValue) => {
			return newValue;
		},
		errorCallback: (value) => {
			return (
				!inputValidator({ type: ValidationEnum.email, value }) &&
				"Invalid mail. Example: test.set_wqee@example.test.te"
			);
		},
	});

	var upInputs = {
		city: inputPlaceholderHandler(getElemById("upAddress"), addressEvent()),
		zip: inputPlaceholderHandler(getElemById("upZipCode"), zipCodeEvent())
	}
	var deliverInputs = {
		city: inputPlaceholderHandler(getElemById("deliverAddress"), addressEvent()),
		zip: inputPlaceholderHandler(getElemById("deliverZipCode"), zipCodeEvent())
	}

	getElemById('upState').addEventListener('change', selectEvent)
	getElemById('deliverState').addEventListener('change', selectEvent)

	function selectEvent(e) {
		const parent = e.target.parentElement;
		parent.removeAttribute('error')
	}

	function addressEvent() {
		return {
			callback: (value, newValue) => {
				return inputValidator({ type: ValidationEnum.default, value: newValue }) ? newValue : value;
			},
			errorCallback: (value) => {
				if (value.length === 0) {
					return "Invalid address";
				}
			},
		};
	}
	function zipCodeEvent () {
		return {
			callback: (value, newValue) => {
				return !isNaN(newValue) ? newValue.length > 5 ? value : newValue : value;
			},
			errorCallback: (value) => {
				if (value.length != 5) {
					return `Length: 5`;
				}
			},
		}
	}


	// var insuranceInput = inputInsuranceValidation(insurance.input, (value) => {
	// 	value = value.match(new RegExp(`^-?\\d+(?:\\.\\d{0,${2}})?`))[0];

	// 	insuranceCost(value);
	// 	return amountFormatter.format(value);
	// });
	// insurance.add.addEventListener("click", () => {
	// 	insuranceInput.setValue((insuranceInput.getValue() + 25).toFixed(2));
	// 	insuranceCost(insuranceInput.getValue(), insuranceInput.getOldValue());
	// 	insuranceInput.checkError();
	// });
	// insurance.minus.addEventListener("click", () => {
	// 	parseInt(insuranceInput.getValue()) > 25
	// 		? (() => {
	// 				insuranceInput.setValue((insuranceInput.getValue() - 25).toFixed(2));
	// 				insuranceCost(insuranceInput.getValue(), insuranceInput.getOldValue());
	// 		  })()
	// 		: (() => {
	// 				insuranceInput.setValue(25);
	// 		  })();
	// 	insuranceInput.checkError();
    // });
    const prohibitedItemsCheckbox = document.getElementById('noProhibitedItems');
    const confirmRules = document.getElementById('confirmRules');
    function confirmRuleEvent(e) {
        console.log(prohibitedItemsCheckbox);

        if (this.checked) {
            confirmRules.removeAttribute('error')
            prohibitedItemsCheckbox.removeEventListener('change', confirmRuleEvent)
        }
    }
//     window.scrollTo({
//   top: -100,
//   behavior: 'smooth'
    // });
    function isInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= window.innerHeight &&
        rect.right <= window.innerWidth
    );
    }
    function scrollToItem(item) {
        const rect = item.getBoundingClientRect();
        const y = rect.top + window.scrollY;

        if (!isInViewport(phone)) {
            window.scrollTo({
            top: y - 150,
            behavior: 'smooth'
            });
        }
    }
    orderBtn.addEventListener("click", async (e) => {
        // scrollToItem();
		// ПЕРВАЯ ПРОВЕРКА: Подтверждение запрещенных веществ
        if (prohibitedItemsCheckbox && !prohibitedItemsCheckbox.checked) {
            e.preventDefault();
            e.stopPropagation();

            confirmRules.setAttribute('error', '')

            // Прокручиваем к чекбоксу
            scrollToItem(prohibitedItemsCheckbox)

            // Добавляем обработчик изменения чекбокса для сброса ошибки
            prohibitedItemsCheckbox.addEventListener('change', confirmRuleEvent);

            return; // ОСТАНАВЛИВАЕМ выполнение
        } else if (prohibitedItemsCheckbox && prohibitedItemsCheckbox.checked) {
            confirmRules.removeAttribute('error')
			// Добавляем скрытое поле с timestamp
			const form = document.getElementById('orderFrom');
			if (form) {
				let timestampField = form.querySelector('input[name="prohibited_items_confirmed_at"]');
				if (!timestampField) {
					timestampField = document.createElement('input');
					timestampField.type = 'hidden';
					timestampField.name = 'prohibited_items_confirmed_at';
					form.appendChild(timestampField);
				}
				timestampField.value = new Date().toISOString();
			}
		}

		e.preventDefault();

		const isValid = validateForm();
		if (!isValid) {
			return;
		}

		orderBtn.disabled = true;
		const originalButtonText = orderBtn.innerHTML;
		orderBtn.innerHTML = '<span>Processing...</span>';

		try {
			const formData = collectFormData();
			console.log('Form data collected:', formData);
			const paymentMethod = formData.payment_method;

			if (paymentMethod === 'stripe') {
				if (typeof Stripe === 'undefined') {
					throw new Error("Stripe payment system is not available.");
				}
				const sessionId = await createStripeSession(formData);
				if (sessionId) {
					await redirectToStripeCheckout(sessionId);
				} else {
					throw new Error('Failed to get Stripe session ID');
				}
			} else {
				// For Zelle and Cash payments, create order directly
				const response = await createOrderDirectly(formData);
				if (response.success) {
					// Redirect to success page or show success message
					window.location.href = response.redirect_url || '/cabinet';
				} else {
					throw new Error(response.message || 'Failed to create order');
				}
			}
		} catch (error) {
			console.error('Error processing payment:', error);

			// Удаляем предыдущие ошибки
			const existingError = document.getElementById('payment-error');
			if (existingError) {
				existingError.remove();
			}

			let errorMessage = 'Payment processing error: ' + error.message;

			// Если ошибка содержит информацию о валидации, покажем более подробно
			if (error.message.includes('validation') || error.message.includes('pattern')) {
				errorMessage = 'Please check all form fields are filled correctly. ' + error.message;
			}

			const errorElem = createElement('div', {
				id: 'payment-error',
				className: 'alert alert-danger',
				style: {
					color: 'red',
					margin: '10px 0',
					padding: '10px',
					borderRadius: '5px',
					backgroundColor: '#f8d7da',
					border: '1px solid #f5c6cb'
				}
			}, null, errorMessage)();

			const calcElement = getElemById('calc');
			if (calcElement) {
				calcElement.insertBefore(errorElem, calcElement.firstChild);
				// Прокручиваем к ошибке
				errorElem.scrollIntoView({ behavior: 'smooth', block: 'center' });
			}

			// Разблокируем кнопку
			orderBtn.disabled = false;
			orderBtn.innerHTML = originalButtonText;
		}
	});

	function validateForm() {
		let isValid = true;
		const requiredFields = [
			'name', 'email', 'phone', 'upZipCode', 'deliverZipCode', 'upCity', 'deliverCity',
			'upAddress', 'deliverAddress'
		];

		requiredFields.forEach(field => {
			const input = document.querySelector(`input[name="${field}"]`) ?? document.querySelector(`select[name="${field}"]`);

			if (!input) {
				console.error(`Required field "${field}" not found in form`);
				isValid = false;
				return;
			}

			const parent = input.closest('.inputWrapper') ? input.closest('.inputWrapper').parentElement : input.parentElement.parentElement;

			if (!input.value.trim()) {
				isValid = false;
				parent.setAttribute('error', '');

                const errorElem = parent.querySelector('.error-message');
                scrollToItem(input);

				if (errorElem) {
					errorElem.innerText = 'This field is required';
				}
			}

			if (field === 'email' && input.value.trim()) {
				const isEmailValid = inputValidator({
					type: ValidationEnum.email,
					value: input.value
				});

				if (!isEmailValid) {
					isValid = false;
					parent.setAttribute('error', '');

                    const errorElem = parent.querySelector('.error-message');

                    scrollToItem(input)
                    if (errorElem) {

						errorElem.innerText = 'Please enter a valid email address';
					}
				}
			}

			if (field === 'phone' && input.value.trim()) {
				const phonePattern = /^\d{3}\s\d{3}\s\d{4}$/;
				const isPhoneValid = phonePattern.test(input.value);

                if (!isPhoneValid) {
                    scrollToItem(input)
					isValid = false;
					parent.setAttribute('error', '');

					const errorElem = parent.querySelector('.error-message');
					if (errorElem) {
						errorElem.innerText = 'Please enter a valid phone number';
					}
				}
			}

			// Проверка zip кодов с использованием существующей логики
			if ((field === 'upZipCode' || field === 'deliverZipCode') && input.value.trim()) {
				// Используем логику из zipCodeEvent
				if (input.value.length !== 5 || isNaN(input.value)) {
					isValid = false;
					parent.setAttribute('error', '');

                    const errorElem = parent.querySelector('.error-message');
                    scrollToItem(input)
					if (errorElem) {
						errorElem.innerText = 'ZIP code must be 5 digits';
					}
				}
			}

			// Проверка адреса с использованием существующей логики
			if ((field === 'upAddress' || field === 'deliverAddress') && input.value.trim()) {
				// Используем логику из deliverEvent
                if (input.value.length < 5 || !inputValidator({ type: ValidationEnum.default, value: input.value })) {
                    scrollToItem(input)
					isValid = false;
					parent.setAttribute('error', '');

					const errorElem = parent.querySelector('.error-message');
					if (errorElem) {
						errorElem.innerText = 'Invalid address';
					}
				}
			}

			// Проверка города
			if ((field === 'upCity' || field === 'deliverCity') && input.value.trim()) {
                if (input.value.length < 2 || !inputValidator({ type: ValidationEnum.default, value: input.value })) {
                    scrollToItem(input)
					isValid = false;
					parent.setAttribute('error', '');

					const errorElem = parent.querySelector('.error-message');
					if (errorElem) {
						errorElem.innerText = 'Invalid city name';
					}
				}
			}
		});

		// Проверяем, выбрана ли хотя бы одна позиция
		const anyItemSelected = document.querySelectorAll('input[type="checkbox"]:checked').length > 0;
		if (!anyItemSelected) {
			isValid = false;

			// Создаем элемент ошибки с помощью createElement из DOM.js
			const errorDiv = createElement('div', {
				id: 'items-error',
				className: 'alert alert-danger',
				style: {
					color: 'red',
					margin: '10px 0'
				}
			}, null, 'Please select at least one item for shipping')();

			const calcElement = getElemById('calc');
			if (calcElement) {
				// Удаляем существующее сообщение об ошибке, если оно есть
				const existingError = calcElement.querySelector('#items-error');
				if (existingError) {
					existingError.remove();
				}

				calcElement.insertBefore(errorDiv, calcElement.firstChild);
				// Прокручиваем к ошибке
				errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
			}
		}

		return isValid;
	}

	function collectFormData() {
		const formData = {
			name: document.querySelector('input[name="name"]')?.value || '',
			upAddress: document.querySelector('input[name="upAddress"]')?.value || '',
			deliverAddress: document.querySelector('input[name="deliverAddress"]')?.value || '',
			phone: (document.querySelector('input[name="phone"]')?.value || '').replace(/\s/g, ''), // Убираем пробелы
			upZipCode: document.querySelector('input[name="upZipCode"]')?.value || '',
			deliverZipCode: document.querySelector('input[name="deliverZipCode"]')?.value || '',
			email: document.querySelector('input[name="email"]')?.value || '',
			upCity: document.querySelector('select[name="upCity"]')?.value || document.querySelector('input[name="upCity"]')?.value || '',
			deliverCity: document.querySelector('select[name="deliverCity"]')?.value || document.querySelector('input[name="deliverCity"]')?.value || '',
			insurance: 0, // Страховка больше не используется
		};

		// Используем новую функцию для получения данных о товарах с правильными размерами кастомных элементов
		const calculatorData = getFormDataWithCustomSizes();

		// Объединяем с основными данными формы
		const categories = ['boxes', 'furniture', 'van', 'mattresses', 'doors', 'tv', 'suitcases'];
		categories.forEach(category => {
			formData[category] = calculatorData[category] || [];
		});

		// Добавляем общую стоимость
		const totalAmountInput = document.querySelector('input[name="totalAmount"]');
		formData.totalAmount = totalAmountInput ? parseFloat(totalAmountInput.value) : 0;

		// Добавляем подтверждение запрещенных товаров
		const prohibitedItemsCheckbox = document.getElementById('noProhibitedItems');
		const isConfirmed = prohibitedItemsCheckbox ? prohibitedItemsCheckbox.checked : false;

		// Отправляем только если подтверждено, иначе не включаем поле
		if (isConfirmed) {
			formData.no_prohibited_items_confirmed = true;

			// Добавляем timestamp подтверждения
			const timestampField = document.querySelector('input[name="prohibited_items_confirmed_at"]');
			formData.prohibited_items_confirmed_at = timestampField ? timestampField.value : new Date().toISOString();
		}

		// Добавляем метод оплаты
		const paymentMethodElement = document.querySelector('input[name="payment_method"]:checked');
		formData.payment_method = paymentMethodElement ? paymentMethodElement.value : 'stripe';

		// Добавляем CSRF токен
		const csrfElement = document.querySelector('meta[name="csrf-token"]');
		formData._token = csrfElement ? csrfElement.getAttribute('content') : '';

		return formData;
	}

	/**
	 * Функция для получения данных формы с правильными размерами кастомных элементов
	 * Использует window.getFormData и дополняет данные из window.customItems
	 */
	function getFormDataWithCustomSizes() {
		// Получаем базовые данные о выбранных товарах
		let formData = {};

		// Если доступна глобальная функция getFormData, используем ее
		if (window.getFormData && typeof window.getFormData === 'function') {
			formData = window.getFormData();
		} else {
			// Иначе используем собственную реализацию
			formData = {
				boxes: getSelectedItems('boxes'),
				furniture: getSelectedItems('furniture'),
				van: getSelectedItems('van'),
				mattresses: getSelectedItems('mattresses'),
				doors: getSelectedItems('doors'),
				tv: getSelectedItems('tv'),
				suitcases: getSelectedItems('suitcases')
			};
		}

		// Проверяем, существует ли глобальный объект customItems
		if (window.customItems) {
			// Обрабатываем категории, для которых могут быть кастомные элементы
			['boxes', 'furniture', 'mattresses'].forEach(category => {
				// Проверяем, есть ли элементы в этой категории
				if (formData[category] && formData[category].length > 0 && window.customItems[category]) {
					// Обновляем каждый элемент в категории
					formData[category] = formData[category].map(item => {
						// Проверяем, является ли это кастомным элементом
						if (item.key && item.key.includes('custom_')) {
							// Ищем соответствующий элемент в customItems
							const customItem = window.customItems[category].find(ci => ci.key === item.key);
							if (customItem) {
								// Обновляем size используя данные из customItems
								return {
									...item,
									size: {
										width: customItem.width || 0,
										height: customItem.height || 0,
										length: customItem.length || 0
									}
								};
							}
						}
						return item;
					});
				}
			});
		}

		return formData;
	}

	// Создание сессии Stripe на сервере
	async function createStripeSession(formData) {
		// Преобразуем данные в JSON
		const jsonData = JSON.stringify(formData);

		// Получаем CSRF токен
		const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

		// Отправляем запрос на сервер
		const response = await fetch('/stripe/create-checkout-session', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': csrfToken
			},
			body: jsonData
		});

		// Проверяем статус ответа
		if (!response.ok) {
			if (response.status === 401) {
				window.location.href = '/login';
				return null;
			}
			let errorMessage = 'Server error: ' + response.status;
			try {
				const errorData = await response.json();
				if (errorData.errors && typeof errorData.errors === 'object') {
					// Обрабатываем ошибки валидации Laravel
					const validationErrors = [];
					for (const [field, messages] of Object.entries(errorData.errors)) {
						if (Array.isArray(messages)) {
							validationErrors.push(...messages);
						} else {
							validationErrors.push(messages);
						}
					}
					errorMessage = validationErrors.join('. ');
				} else {
					errorMessage = errorData.error || errorData.message || errorMessage;
				}
			} catch (e) {
				// Если не удалось получить JSON, пробуем получить текст
				try {
					errorMessage = await response.text() || errorMessage;
				} catch (textError) {
					errorMessage = 'Server error: ' + response.status;
				}
			}
			throw new Error(errorMessage);
		}

		// Обрабатываем ответ
		const data = await response.json();

		if (!data.id) {
			throw new Error('Stripe session ID not received from server');
		}

		return data.id;
	}

	// Создание заказа напрямую для Zelle и Cash платежей
	async function createOrderDirectly(formData) {
		console.log('Creating order directly with data:', formData);

		// Преобразуем данные в JSON
		const jsonData = JSON.stringify(formData);

		// Получаем CSRF токен
		const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

		// Отправляем запрос на сервер
		const response = await fetch('/orders', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': csrfToken,
				'Accept': 'application/json'
			},
			body: jsonData
		});

		// Проверяем статус ответа
		if (!response.ok) {
			if (response.status === 401) {
				window.location.href = '/login';
				return { success: false, message: 'Authentication required' };
			}
			let errorMessage = 'Server error: ' + response.status;
			try {
				const errorData = await response.json();

				// Если есть ошибки валидации, покажем их подробно
				if (errorData.errors && typeof errorData.errors === 'object') {
					const validationErrors = [];
					for (const [field, messages] of Object.entries(errorData.errors)) {
						if (Array.isArray(messages)) {
							validationErrors.push(...messages);
						} else {
							validationErrors.push(messages);
						}
					}
					errorMessage = validationErrors.join('. ');
				} else {
					errorMessage = errorData.error || errorData.message || errorMessage;
				}
			} catch (e) {
				// Если не удалось получить JSON, пробуем получить текст
				try {
					errorMessage = await response.text() || errorMessage;
				} catch (textError) {
					errorMessage = 'Server error: ' + response.status;
				}
			}
			return { success: false, message: errorMessage };
		}

		// Обрабатываем ответ
		const data = await response.json();
		return data;
	}

	// Перенаправление на страницу оплаты Stripe
	async function redirectToStripeCheckout(sessionId) {
		// Получаем публичный ключ Stripe
		const stripeKeyElement = document.querySelector('meta[name="stripeKey"]');
		const stripeKey = stripeKeyElement ? stripeKeyElement.getAttribute('content') : '';

		if (!stripeKey) {
			throw new Error('Stripe key not found');
		}

		// Инициализируем Stripe
		const stripe = Stripe(stripeKey);

		// Очищаем сохраненные данные перед перенаправлением
		localStorage.removeItem('calculatorFormData');

		// Перенаправляем на Stripe Checkout
		const { error } = await stripe.redirectToCheckout({
			sessionId: sessionId
		});

		if (error) {
			throw new Error(error.message);
		}
	}

	window.insuranceCost = function(newValue) {
		// Функция-заглушка для поддержки обратной совместимости
		// Больше не вычисляет стоимость страхования, так как элемент "cost" может отсутствовать
		return;
    }
    /**
     * ? потом
     */
	// function inputInsuranceValidation(input, callback) {
	// 	var value = input.value.replaceAll(",", "");
	// 	var oldValue = parseFloat(input.value.trim().replace(",", ""));
	// 	var state = false;
	// 	var fieldset = getElemById("insuranceFieldset");
	// 	input.addEventListener("input", (event) => {
	// 		var newValue = event.target.value.replaceAll(",", "");

	// 		if (event.inputType != "deleteContentBackward") {
	// 			if (event.data == "." || (!isNaN(event.data) && newValue !== "")) {
	// 				if (event.data != ".") {
	// 					value = callback(newValue);
	// 					input.value = value;
	// 				} else {
	// 					if (newValue.includes(".") && !value.includes(".")) {
	// 						value = newValue;
	// 						input.value = newValue;
	// 					} else if (value.includes(".")) {
	// 						input.value = value;
	// 					}
	// 				}
	// 			} else {
	// 				(value);

	// 				input.value = callback(value.replaceAll(",", ""));
	// 			}
	// 		} else {
	// 			if (newValue.at() != "." && newValue !== "") {
	// 				value = callback(newValue.replaceAll(",", ""));
	// 			} else if (newValue == "") {
	// 				value = "0";
	// 			} else {
	// 				value = callback(newValue.replaceAll(",", ""));
	// 			}
	// 		}
	// 	});
	// 	return {
	// 		checkError: () => {
	// 			if (value < 25) {
	// 				input.value = 25;
	// 				state = true;
	// 			} else {
	// 				state = true;
	// 			}
	// 			if (!state) {
	// 				fieldset.setAttribute("error", "");
	// 			} else {
	// 				fieldset.removeAttribute("error");
	// 			}
	// 			return state;
	// 		},
	// 		getOldValue: () => oldValue,
	// 		/**
	// 		 * Возвращает значение из поля `input`
	// 		 * @returns {float}
	// 		 */
	// 		getValue: () => {
	// 			return parseFloat(value.replaceAll(",", ""));
	// 		},
	// 		/**
	// 		 * Устанавливает новое значение в `input`
	// 		 * @param {string | number | float} newValue
	// 		 */
	// 		setValue: (newValue) => {
	// 			oldValue = value;
	// 			value = amountFormatter.format(newValue);
	// 			input.value = amountFormatter.format(newValue);
	// 		},
	// 	};
	// }
	function updatePaymentMethodDisplay() {
		// Получаем выбранный метод оплаты
		const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked')?.value || 'stripe';

		// Получаем элементы
		const orderPriceElement = getElemById('orderPrise');
		const stripeFeeRow = getElemById('stripeFeeRow');
		const commissionElement = getElemById('stripeCommission');
		const totalElement = getElemById('totalWithCommission');

		if (!orderPriceElement || !totalElement) return;

		// Получаем базовую цену
		const basePriceText = orderPriceElement.innerText.replace(/[^0-9.]/g, '');
		const basePrice = parseFloat(basePriceText) || 0;

		let finalTotal = basePrice;

		if (selectedPaymentMethod === 'stripe') {
			// Показываем комиссию Stripe
			if (stripeFeeRow) stripeFeeRow.style.display = 'flex';

			// Рассчитываем комиссию (3%)
			const stripeCommission = Math.round(basePrice * 0.03 * 100) / 100;

			// Обновляем отображение комиссии
			if (commissionElement) {
				commissionElement.innerHTML = `${stripeCommission.toFixed(2)} $`;
			}

			// Добавляем комиссию к итоговой сумме
			finalTotal = basePrice + stripeCommission;
		} else {
			// Скрываем комиссию для Zelle и Cash
			if (stripeFeeRow) stripeFeeRow.style.display = 'none';

			// Итоговая сумма = базовая цена без комиссии
			finalTotal = basePrice;
		}

		// Обновляем итоговую сумму
		totalElement.innerHTML = `${finalTotal.toFixed(2)} $`;

		// Обновляем скрытое поле для отправки на сервер
		const totalAmountInput = document.querySelector('input[name="totalAmount"]');
		if (totalAmountInput) {
			totalAmountInput.value = finalTotal.toFixed(2);
		}
	}
	const orderPriceElement = getElemById('orderPrise');
    if (!orderPriceElement) return;

    // Первичное обновление
    updatePaymentMethodDisplay();

    const observer = new MutationObserver(updatePaymentMethodDisplay);
    observer.observe(orderPriceElement, {
        childList: true,
        characterData: true,
        subtree: true
    });

    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', updatePaymentMethodDisplay);
    });

    document.querySelectorAll('.box-tab-count input').forEach(input => {
        input.addEventListener('change', updatePaymentMethodDisplay);
        input.addEventListener('input', updatePaymentMethodDisplay);
    });

    // Добавляем обработчики для радиокнопок методов оплаты
    document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
        radio.addEventListener('change', updatePaymentMethodDisplay);
    });

	function lengthValidation({ maxValue, minValue }) {
		return (target, callback) => {
			var handler = inputHandler({
				wrapper: target.errorElem.parentElement,
				input: target.input,
				errorElem: target.errorElem,
				callback: (value, newValue, event) => {
					newValue = newValue.replace('"', "");
					if (event.inputType == "deleteContentBackward") {
						newValue = newValue.slice(0, -1);
					}
					return inputValidator({ type: ValidationEnum.number, value: newValue }) ? `${newValue}"` : value;
				},
				errorMessage: (value) => {
					value = value.slice(0, -1);
					if (value > maxValue || value < minValue) {
						return `min: ${minValue} - max: ${maxValue}`;
					}
				},
			});
			return {
				maxValue,
				handler,
				minValue,
			};
		};
	}
	function checkboxEvent(elem, checkboxes) {
		var checked = false;
		var states = Array.from({ length: checkboxes.length }, () => false);
		if (checkboxes.length > 0) {
			Array.from(checkboxes).forEach((el, i) => {
				newCheckbox(el, i, false, true);
			});
		}
		return {
			/**
			 * Добавляет новый чекбокс для проверки
			 *
			 * @param {HTMLElement} parent родитель элемента
			 * @param {HTMLElement} newCheckboxItem
			 */
			addCheckbox: (parent, newCheckboxItem) => {
				states.push(true);
				const checkboxElem = newCheckbox(newCheckboxItem, states.length - 1, newCheckboxItem.getElementsByClassName('checkbox')[0].checked, true);
				const deleteBtn = newCheckboxItem.getElementsByClassName("box-tab-delete")[0];
				deleteBtn.onclick = () => {
					const children = Array.from(parent.children);
					// Get the unique key from the data-key attribute
					const customKey = newCheckboxItem.getAttribute('data-key');

					// Если это кастомный элемент
					if (customKey && customKey.includes('custom_')) {
						// Определяем категорию по родительскому элементу или ID
						let category = null;

						if (parent.id === 'customBoxesList') {
							category = 'boxes';
						} else if (parent.id === 'furnitureList') {
							category = 'furniture';
						} else if (parent.closest('#customMattressesList')) {
							category = 'mattresses';
						}

						// Если категория определена и существует в customItems
						if (category && window.customItems && window.customItems[category]) {
							// Удаляем элемент из массива
							window.customItems[category] = window.customItems[category].filter(item => item.key !== customKey);

							// Принудительно сохраняем в куки
							if (window.saveCalculatorData) {
								setTimeout(window.saveCalculatorData, 0);
							}
						}
					}

					// Удаляем элемент из DOM
					children.filter((item) => item == newCheckboxItem && removeCheckbox(parent, checkboxElem));
				};
				checkCheckedItems();
			},
			removeCheckbox,
			length: () => states.length
		};
		function removeCheckbox(parent, checkboxElem) {
			const children = Array.from(parent.children);

			// Удаляем элемент из DOM
			for (var i = 0; i < children.length; ++i) {
				if (children[i] == checkboxElem.element) {
					var index = states.length - children.length - 1;
					states = states.filter((_, f) => f - 1 != index + i);
					parent.removeChild(checkboxElem.element);
					break;
				}
			}

			// Обновляем цену заказа если чекбокс был отмечен
			checkboxElem.checkbox.checked() &&
				orderPrice.setPrice(
					(value) => value - checkboxElem.checkbox.getPrice() * checkboxElem.counter.getValue()
				);

			// Обновляем состояние чекбоксов
			checkCheckedItems();

			// Сохраняем изменения в куки
			if (window.saveCalculatorData) {
				setTimeout(window.saveCalculatorData, 0);
			}
			if (checkboxEvents.furniture.length() == 0) {
				const btns = customSizeBtns.furniture;
				const swap = swapAttribute(btns.open , btns.inputs);
				swap("active");
			}
		}
		function newCheckbox(el, i, checked, counterActive = false) {
			var counterElem = counter(el.getElementsByClassName("box-tab-count")[0], (oldCount, newCount) => {
				var price = el.getElementsByClassName("box-size-value-prise")[0].getElementsByTagName("strong")[0];
                console.log(checkbox.basePrise);

                if (Number(newCount) <= 0 && checkbox.checked()) {
                    checkbox.setChecked(false)
                } else if(Number(newCount) > 0 && !checkbox.checked()) {
                    checkbox.setChecked(true)
                }

				price.innerText = `$${window.amountFormatter.format(checkbox.getPrice() * newCount)}`;

				// if (!checkbox.checked()) checkbox.setChecked();

				if (checkbox.checked()) {
					orderPrice.setPrice((value) => {
						return value - checkbox.getPrice() * oldCount + checkbox.getPrice() * newCount;
					});
                }



				// Обновляем количество в customItems, если это кастомный элемент
				const customKey = el.getAttribute('data-key');
				if (customKey && window.customItems) {
					// Поиск категории и элемента
					let found = false;

					// Перебираем все категории
					['boxes', 'furniture', 'mattresses'].forEach(category => {
						if (window.customItems[category]) {
							const itemIndex = window.customItems[category].findIndex(item => item.key === customKey);
							if (itemIndex !== -1) {
								found = true;
								// Обновляем количество
								window.customItems[category][itemIndex].count = parseInt(newCount);

								// Принудительно сохраняем в куки после обновления
								if (window.saveCalculatorData) {
									setTimeout(window.saveCalculatorData, 0);
								}
							}
						}
					});
				}
			});
			counterActive && counterElem.enable();
			var checkbox = checkboxItemEvent(el, checked, (state) => {
				if (state) {
					orderPrice.setPrice((value) => {
						return value + checkbox.getPrice() * counterElem.getValue();
					});
				} else {
					orderPrice.setPrice((value) => {
						return value - checkbox.getPrice() * counterElem.getValue();
					});
				}
				states[i] = checkbox.checked();
				checkCheckedItems();
			});
			if (checked) {
				orderPrice.setPrice((value) => value + checkbox.getPrice());
			}
			return {
				element: el,
				checkbox,
				counter: counterElem,
			};
		}
		function checkCheckedItems() {
			checked = states.some(Boolean);
			if (!elem.getAttribute("checked") && checked) {
				elem.setAttribute("checked", "");
			} else if (!checked) {
				elem.removeAttribute("checked");
			}
		}
	}
    function checkboxItemEvent(checkboxElem, checked = false, callback) {
        var price = checkboxElem
        .getElementsByClassName("box-size-value-prise")[0]
        .getElementsByTagName("strong")[0]
        .innerHTML.split("$")[1];
        const basePrise = Number(price);
		var checkbox = checkboxElem.getElementsByTagName("input")[0];
		const checkedEvent = new Event("change", { bubbles: true });
		checkbox.addEventListener("change", () => {
			checked = !checked;
			callback(checked);
		});
        return {
            basePrise,
			/**
			 * Цена элемента
			 * @returns {number}
			 */
			getPrice: () => parseFloat(price.replaceAll(",", "")),
			/**
			 * Состояние элемента
			 * @returns {number}
			 */
			checked: () => checked,
			setChecked: () => {
				checkbox.checked = !checkbox.checked;
				checkbox.dispatchEvent(checkedEvent);
			},
		};
	}
	function counter(countElem, callback) {
		var state = false;
		let oldCount = 1;
		const btns = {
			minus: countElem.getElementsByTagName("svg")[0],
			add: countElem.getElementsByTagName("svg")[1],
		};
		var input = countElem.getElementsByTagName("input")[0];
		btns.minus.addEventListener("click", () => {
			if (state) {
				var value = input.value;
				oldCount = Number(value);
				value > 0 && --value;
				value == "" && (value = 0);
				callback(oldCount, value);
				input.value = value;
			}
		});
		btns.add.addEventListener("click", () => {
			if (state) {
				var value = input.value;
				oldCount = Number(value);
				++value;

				callback(oldCount, value);
				input.value = value;
			}
		});
		input.addEventListener(
			"keydown",
			preventDefault(() => {})
		);
		return {
			enable: () => {
				state = true;
				countElem.classList.remove("disabled");
			},
			disable: () => {
				state = false;
			},
			parent: countElem,
			getValue: () => parseInt(input.value),
		};
	}
    function addItemToCustomSize(customSizeList2, { boxKeyElement, price, width, height, length, boxKey, checked = false }) {
		var itemCount = customSizeList2.children.length;
		var item = createCustomSizeItem({ key: itemCount + 1, price, boxKeyElement, width, height, length, boxKey, checked });
		customSizeList2.append(item);
		return item;
	}
    window.addItemToCustomSize = addItemToCustomSize
	function createCustomSizeItem({ key, boxKeyElement = true, price, width, height, length, boxKey, checked }) {
		const item = createElement("div", {}, ["box", "size-row", "flex", "row", "aic", "delateBoxWrapper"]);
		const checkbox = createElement(
			"input",
			{
				type: "checkbox",
                name: boxKey || `custom${key}`,
                checked: checked
			},
			["checkbox"]
		)();

		if (boxKeyElement) {
			var boxKey = createElement(
				"h3",
				{},
				["box-size", "flex", "row", "aic", "color-blue"],
				`<strong>C${key}</strong>`
			);
		}
		const boxSizeWrapper = newBoxSizeWrapper(
			boxKeyElement && boxKey(),
			boxSizeValues({ width, height, price, length })
		);

		// Сохраняем информацию о кастомном элементе
		const customItemInfo = {
			key: `custom${key}`,
			width,
			height,
			length,
			price
		};

		// Создаем DOM-элемент
		const domElement = item(checkbox, boxSizeWrapper, boxTabCount(), deleteElement());

		// Устанавливаем data-key атрибут на уже созданный DOM-элемент
		if (boxKey) {
			domElement.setAttribute("data-key", boxKey);
		} else {
			domElement.setAttribute("data-key", `custom${key}`);
		}

		return domElement;
		function newBoxSizeWrapper(...items) {
			items = items.filter((item2) => items && item2);
			return createElement("div", {}, ["box-size-wrapper", "flex", "row"])(...items);
		}
		function boxSizeValues({ width: width2, height: height2, length: length2, price: price2 }) {
			var elem = createElement("div", {}, ["box-size-values", "flex", "col"]);
			var sizes = (() => {
				var value = "";
				width2 && (value += `${width2}"x`);
				height2 && (value += `${height2}"x`);
				length2 && (value += `${length2}"`);
				return value;
			})();
			const boxSizeParam = createElement("span", {}, ["box-size-value-param", "flex", "col"])(sizes);
			const boxSizePrise = createElement(
				"strong",
                {},
				["box-size-value-prise"],
				`<span><strong>$${window.amountFormatter.format(price2)}</strong></span>`
            )();
            const basePrice = createElement('span', {
                style: {
                    display: "none"
                }
            }, ['basePriceValue'], price2)()
			return elem(boxSizeParam, boxSizePrise, basePrice);
		}
		function boxTabCount() {
			return createElement(
				"div",
				{},
				["box-tab-count", "flex", "row"],
				`<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M19 15L9 15L9 13L19 13V15Z" fill="black" />
		</svg>
		<input type="number" value="1" min="1">
		<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M19 15V13H15L15 9H13L13 13H9V15L13 15L13 19H15L15 15L19 15Z" fill="black" />
		</svg>`
			)();
		}
		function deleteElement() {
			return createElement("div", {}, ["box-tab-delete", "flex-center"])();
		}
	}
	function calcSwapPage(startPage, startBtn) {
		return (btn, page) => {
			btn.addEventListener("click", () => {
				var swapPage2 = swapAttribute(startPage, page);
				var swapBtn = swapAttribute(startBtn, btn);
				if (page != startPage) {
					startPage = page;
					startBtn = btn;
					swapPage2("active");
					swapBtn("active");
				}
			});
		};
	}
})();

// В конце файла добавляем экспорт функции для расчета итоговой стоимости
window.getCalculatedPrice = function() {
	return orderPrice.getPrice();
};

// Также добавляем функцию для экспорта данных формы
window.getFormData = function() {
	return {
		boxes: getSelectedItems('boxes'),
		furniture: getSelectedItems('furniture'),
		van: getSelectedItems('van'),
		mattresses: getSelectedItems('mattresses'),
		doors: getSelectedItems('doors'),
		tv: getSelectedItems('tv'),
		suitcases: getSelectedItems('suitcases')
	};
};

// Доступ к глобальным переменным для функций
window.form = form;
window.calcPages = calcPages;

// Функция для получения выбранных элементов по категории
function getSelectedItems(category) {
	const items = [];

	try {
		// Находим форму для категории
		const categoryForm = getElemById(category);

		// Проверяем, активна ли эта категория и существует ли форма
		if (!categoryForm) {
			return items;
		}

		// Получаем все выбранные чекбоксы
		const checkboxes = categoryForm.querySelectorAll('input[type="checkbox"]:checked');

		// Обрабатываем каждый чекбокс
		checkboxes.forEach((checkbox, index) => {
			try {
				// Находим родительский элемент бокса (size-row или box)
				const boxRow = checkbox.closest('.size-row') || checkbox.closest('.box');
				if (!boxRow) {
					return;
				}

				// Получаем ключ (идентификатор) опции
				const key = checkbox.getAttribute('name') || '';

				// Находим поле с количеством
				const countInput = boxRow.querySelector('input[type="number"]');
				const count = countInput ? parseInt(countInput.value) || 1 : 1;

				// Получаем размеры (для некоторых категорий)
				let width = 0, height = 0, length = 0;

				// Для пользовательских размеров и мебели
				if (key.includes('custom') || category === 'furniture') {
					// Ищем поля с размерами
					const customWidthInput = boxRow.querySelector('input[placeholder*="width"], input[name*="width"]');
					const customHeightInput = boxRow.querySelector('input[placeholder*="height"], input[name*="height"]');
					const customLengthInput = boxRow.querySelector('input[placeholder*="length"], input[name*="length"]');

					if (customWidthInput) width = parseFloat(customWidthInput.value.replace(/[^0-9.]/g, '')) || 0;
					if (customHeightInput) height = parseFloat(customHeightInput.value.replace(/[^0-9.]/g, '')) || 0;
					if (customLengthInput) length = parseFloat(customLengthInput.value.replace(/[^0-9.]/g, '')) || 0;
				}

				// Получаем цену
				let price = 0;
				const priceEl = boxRow.querySelector('.box-size-value-prise');
				if (priceEl) {
					const priceText = priceEl.textContent;
					price = parseFloat(priceText.replace(/[^\d.]/g, ''));
				}

				// Добавляем собранные данные в массив
				const item = {
					key,
					count,
					size: {
						width,
						height,
						length
					},
					price
				};

				items.push(item);
			} catch (err) {
				// Error processing checkbox
			}
		});

	} catch (err) {
		// Error getting selected items
	}

	return items;
}

// // Вызываем инициализацию автозаполнения после загрузки страницы
// if (document.readyState === 'loading') {
// 	document.addEventListener('DOMContentLoaded', function() {
// 		// Ждем немного, чтобы Google Maps API успел загрузиться
// 		setTimeout(window.initCalculatorAutocomplete, 1000);
// 		// Инициализируем валидацию запрещенных веществ
// 		initProhibitedItemsValidation();
// 	});
// } else {
// 	// Если DOM уже загружен, инициализируем сразу
// 	setTimeout(window.initCalculatorAutocomplete, 1000);
// 	initProhibitedItemsValidation();
// }

// Добавляем обработчик для сохранения данных формы в куки
document.addEventListener('DOMContentLoaded', function () {
    setTimeout(window.initCalculatorAutocomplete, 1000);
	// Загружаем данные из куки
	loadFormDataFromCookies();

	// Добавляем обработчики событий для сохранения данных
	setupSaveHandlers();

	// Экспортируем функцию сохранения данных
	window.saveCalculatorData = saveFormDataToCookies;

	// Функция для сохранения данных формы в куки
	function saveFormDataToCookies() {
		try {
			// Проверяем, разрешены ли функциональные куки
			const cookieConsent = localStorage.getItem('cookieConsent');
			if (cookieConsent) {
				const consentData = JSON.parse(cookieConsent);
				// Если функциональные куки не разрешены, не сохраняем данные
				if (!consentData.functional) {
					return;
				}
			}

			// Сбор данных форм
			const formData = {
				boxes: collectCategoryData('boxes'),
				furniture: collectCategoryData('furniture'),
				mattresses: collectCategoryData('mattresses'),
				van: collectCategoryData('van'),
				doors: collectCategoryData('doors'),
				tv: collectCategoryData('tv'),
				suitcases: collectCategoryData('suitcases'),

				// Дополнительно сохраняем пользовательские данные
				user_info: {
					name: document.querySelector('#name input')?.value || '',
					email: document.querySelector('#emailInputWrapper input')?.value || '',
					phone: document.querySelector('#phone input')?.value || '',
					upAddress: document.querySelector('#upAddress input')?.value || '',
					deliverAddress: document.querySelector('#deliverAddress input')?.value || '',
					// Старые поля для обратной совместимости
					zipCode: document.querySelector('#zipCodeWrapper input')?.value || '',
					city: document.querySelector('#cityInputWrapper input')?.value || '',
					// Новые поля
					upZipCode: document.querySelector('input[name="upZipCode"]')?.value || '',
					deliverZipCode: document.querySelector('input[name="deliverZipCode"]')?.value || '',
					upCity: document.querySelector('select[name="upCity"]')?.value || document.querySelector('input[name="upCity"]')?.value || '',
					deliverCity: document.querySelector('select[name="deliverCity"]')?.value || document.querySelector('input[name="deliverCity"]')?.value || '',
					insurance: {
						checked: true, // Страховка всегда включена
						value: document.querySelector('#insuranceWrapper input')?.value || '0',
						cost: getElemById('cost')?.innerText || '$25'
					}
				},
				orderPrice: window.currentOrderPrice || orderPrice.getPrice(),
				timestamp: Date.now(),
				expiresIn: 24 * 60 * 60 * 1000 // 24 часа в миллисекундах
			};

			localStorage.setItem('calculatorFormData', JSON.stringify(formData));

			if (typeof Cookies !== 'undefined' && typeof Cookies.set === 'function') {
				Cookies.set('calculatorFormData', JSON.stringify(formData), { expires: 1 }); // 1 день
			}

		} catch (error) {
			// Ошибка сохранения
		}
	}

	function collectCategoryData(category) {
		const result = [];
		const categoryForm = window.form[category];
		if (!categoryForm) return result;

		const checkboxes = categoryForm.querySelectorAll('input[type="checkbox"]');
		checkboxes.forEach(checkbox => {
			const row = checkbox.closest('.size-row') || checkbox.closest('.box');
			if (!row) return;

			const countInput = row.querySelector('input[type="number"]');
			if (!countInput) return;

			const name = checkbox.getAttribute('name');
			const isChecked = checkbox.checked;
			const count = countInput.value;

			const itemData = {
				name: name,
				checked: isChecked,
                count: count,
			};

			if (name && name.startsWith('custom_')) {
				const customKey = row.getAttribute('data-key');
				let width = 0, height = 0, length = 0, price = 0;

				const sizeText = row.querySelector('.box-size-value-param')?.textContent;
				if (sizeText) {
					const dimensions = sizeText.split('x');
					if (dimensions.length >= 3) {
						width = parseInt(dimensions[0]) || 0;
						height = parseInt(dimensions[1]) || 0;
						length = parseInt(dimensions[2]) || 0;
					}
				}

				const priceEl = row.querySelector('.basePriceValue');
				if (priceEl) {
					price = parseFloat(priceEl.textContent.replace(/[^\d.]/g, '')) || 0;
					if (count > 1) {
						price = price / count; // Получаем цену за единицу
                    }
				}

				itemData.size = {
					width: width,
					height: height,
					length: length
				};
				itemData.price = price;
			}

			result.push(itemData);
		});

		return result;
	}

	function updateCustomItemCount(input) {
		const boxElement = input.closest('.box');
		if (!boxElement) return;

		const customKey = boxElement.getAttribute('data-key');
		if (!customKey || !window.customItems) return;

		const newCount = parseInt(input.value) || 1;

		['boxes', 'furniture', 'mattresses'].forEach(category => {
			if (window.customItems[category]) {
				const itemIndex = window.customItems[category].findIndex(item => item.key === customKey);
				if (itemIndex !== -1) {
					window.customItems[category][itemIndex].count = newCount;
				}
			}
		});
	}

	function getCustomItemCategory(key) {
		if (!key || !window.customItems) return null;

		for (const category of ['boxes', 'furniture', 'mattresses']) {
			if (window.customItems[category] &&
				window.customItems[category].some(item => item.key === key)) {
				return category;
			}
		}
		return null;
	}

	function loadFormDataFromCookies() {
		try {
			const cookieConsent = localStorage.getItem('cookieConsent');
			if (cookieConsent) {
				const consentData = JSON.parse(cookieConsent);
				if (!consentData.functional) {
					return;
				}
			}

			let formDataStr = localStorage.getItem('calculatorFormData');

			if (!formDataStr && typeof Cookies !== 'undefined' && typeof Cookies.get === 'function') {
				formDataStr = Cookies.get('calculatorFormData');
			}

			if (formDataStr) {
				const formData = JSON.parse(formDataStr);

				if (formData.timestamp && formData.expiresIn) {
					const now = Date.now();
					const expirationTime = formData.timestamp + formData.expiresIn;

					if (now > expirationTime) {
						localStorage.removeItem('calculatorFormData');
						if (typeof Cookies !== 'undefined' && typeof Cookies.remove === 'function') {
							Cookies.remove('calculatorFormData');
						}
						return;
					}
				}
                for (const key in formData) {
                    if (formData[key]) {
                        restoreCategoryData(key, formData[key])
                    };
                }
				if (formData.boxes) restoreCategoryData('boxes', formData.boxes);
				if (formData.furniture) restoreCategoryData('furniture', formData.furniture);
				if (formData.mattresses) restoreCategoryData('mattresses', formData.mattresses);
				if (formData.van) restoreCategoryData('van', formData.van);
				if (formData.doors) restoreCategoryData('doors', formData.doors);
				if (formData.tv) restoreCategoryData('tv', formData.tv);
				if (formData.suitcases) restoreCategoryData('suitcases', formData.suitcases);

				if (formData.user_info) {
					const userInfo = formData.user_info;

					if (userInfo.name) document.querySelector('#name input').value = userInfo.name;
					if (userInfo.email) document.querySelector('#emailInputWrapper input').value = userInfo.email;
					if (userInfo.phone) document.querySelector('#phone input').value = userInfo.phone;
					if (userInfo.upAddress) document.querySelector('#upAddress input').value = userInfo.upAddress;
					if (userInfo.deliverAddress) document.querySelector('#deliverAddress input').value = userInfo.deliverAddress;

					if (userInfo.upZipCode) {
						const upZipCodeInput = document.querySelector('input[name="upZipCode"]');
						if (upZipCodeInput) upZipCodeInput.value = userInfo.upZipCode;
					}

					if (userInfo.deliverZipCode) {
						const deliverZipCodeInput = document.querySelector('input[name="deliverZipCode"]');
						if (deliverZipCodeInput) deliverZipCodeInput.value = userInfo.deliverZipCode;
					}

					if (userInfo.upCity) {
						const upCitySelect = document.querySelector('select[name="upCity"]');
						if (upCitySelect) {
							const options = Array.from(upCitySelect.options);
							const option = options.find(opt => opt.value === userInfo.upCity);
							if (option) {
								upCitySelect.value = userInfo.upCity;
							}
						}

						// Если также есть инпут - загружаем и в него
						const upCityInput = document.querySelector('input[name="upCity"]');
						if (upCityInput) upCityInput.value = userInfo.upCity;
					}

					if (userInfo.deliverCity) {
						const deliverCitySelect = document.querySelector('select[name="deliverCity"]');
						if (deliverCitySelect) {
							const options = Array.from(deliverCitySelect.options);
							const option = options.find(opt => opt.value === userInfo.deliverCity);
							if (option) {
								deliverCitySelect.value = userInfo.deliverCity;
							}
						}

						const deliverCityInput = document.querySelector('input[name="deliverCity"]');
						if (deliverCityInput) deliverCityInput.value = userInfo.deliverCity;
					}

					if (userInfo.zipCode) {
						const zipCodeInput = document.querySelector('#zipCodeWrapper input');
						if (zipCodeInput) zipCodeInput.value = userInfo.zipCode;
					}

					if (userInfo.city) {
						const cityInput = document.querySelector('#cityInputWrapper input');
						if (cityInput) cityInput.value = userInfo.city;
					}

					const fields = ['name', 'upAddress', 'deliverAddress', 'email', 'zipCode', 'upZipCode', 'deliverZipCode'];
					fields.forEach(field => {
						const input = document.querySelector(`#${field === 'email' ? 'emailInputWrapper' : field} input`) ||
									document.querySelector(`input[name="${field}"]`);
						if (input && input.value) {
							const placeholder = input.parentElement.querySelector('.placeholder');
							if (placeholder) {
								placeholder.removeAttribute('hidden');
							}
						}
					});

					// Комментируем логику, связанную со страхованием
					// Ранее код пытался обратиться к элементу "cost", который может отсутствовать
					/*
					if (userInfo.insurance) {
						const insuranceInput = document.querySelector('#insuranceWrapper input');
						if (insuranceInput && userInfo.insurance.value) {
							insuranceInput.value = userInfo.insurance.value;

							// Обновляем отображаемую стоимость страховки
							const costValue = parseFloat(userInfo.insurance.value.replace(/[^\d.]/g, '')) || 0;
							insuranceCost(costValue);
						}
					}
					*/
				}

				if (formData.orderPrice) {
					window.currentOrderPrice = formData.orderPrice;
					console.log(formData.orderPrice);


					orderPrice.setPrice(() => formData.orderPrice);

					const orderPriceElement = getElemById("orderPrise");
					if (orderPriceElement) {
						orderPriceElement.innerHTML = amountFormatter.format(formData.orderPrice) + " $";
					}
				} else {
					updateOrderPrice();
				}
			}
		} catch (error) {
			// Ошибка загрузки
		}
	}

	function restoreCategoryData(category, data) {
		const categoryForm = window.form[category];
		if (!categoryForm) return;

		data.forEach(item => {
			if (!item.name) return;

			if (item.name.startsWith('custom_')) {
				handleCustomItem(category, item);
			} else {
				const checkbox = categoryForm.querySelector(`input[name="${item.name}"]`);
				if (!checkbox) return;

				if (item.checked) {
					checkbox.checked = true;

					const row = checkbox.closest('.size-row') || checkbox.closest('.box');
					if (row) {
						const countInput = row.querySelector('input[type="number"]');
						if (countInput && item.count) {
							countInput.value = item.count;
						}

						const countContainer = row.querySelector('.box-tab-count');
						if (countContainer) {
							countContainer.classList.remove('disabled');
						}

						checkbox.dispatchEvent(new Event('change', { bubbles: true }));
					}
				}
			}
		});

		// Функция для обработки кастомных предметов
		function handleCustomItem(category, item) {
			const size = item.size || {};
			const count = parseInt(item.count) || 1;
			const key = item.name; // Используем name как ключ

			if (!size.width || !size.height || !size.length) return;

			let container;
			let boxKeyElement = true;

			switch(category) {
				case 'boxes':
					container = customSizeList.boxes;
					break;
				case 'furniture':
					container = customSizeList.furniture;
					break;
				case 'mattresses':
					container = customSizeList.mattresses;
					if (container.getAttribute("hidden") === "") {
						container.removeAttribute("hidden");
					}
					container.setAttribute("active", "");
					container = container.getElementsByClassName("box-list")[0] || container;
					boxKeyElement = false;

					if (mattressesTable && mattressesTable.hasAttribute("hidden")) {
						mattressesTable.removeAttribute("hidden");
					}
					break;
				default:
					return; // Неизвестная категория
			}

			const newItem = addItemToCustomSize(container, {
				width: size.width,
				height: size.height,
				length: size.length,
				price: item.price || 0,
				boxKey: key,
                boxKeyElement: boxKeyElement,
                checked: item.checked
			});

			window.customItems[category].push({
				key: key,
				width: size.width,
				height: size.height,
				length: size.length,
				price: item.price || 0,
				count: count
			});

			checkboxEvents[category].addCheckbox(container, newItem);

			if (count > 1) {
				const countInput = newItem.querySelector('input[type="number"]');
				if (countInput) {
					countInput.value = count;

					const countContainer = newItem.querySelector('.box-tab-count');
					if (countContainer) {
						countContainer.classList.remove('disabled');
					}

					const priceEl = newItem.querySelector('.box-size-value-prise strong');
					if (priceEl && item.price) {
						priceEl.innerText = `$${window.amountFormatter.format(item.price * count)}`;
					}
				}
			}
		}
	}

	function setupSaveHandlers() {
		const userInputs = document.querySelectorAll('#inputs input, #inputs select');
		userInputs.forEach(input => {
			input.addEventListener('change', () => setTimeout(saveFormDataToCookies, 0));
			input.addEventListener('input', () => setTimeout(saveFormDataToCookies, 0));
		});

		// Добавляем обработчики для новых селект-элементов городов
		const citySelects = document.querySelectorAll('select[name="upCity"], select[name="deliverCity"]');
		citySelects.forEach(select => {
			select.addEventListener('change', () => setTimeout(saveFormDataToCookies, 0));
		});

		const checkboxes = document.querySelectorAll('input[type="checkbox"]');
		checkboxes.forEach(checkbox => {
			checkbox.addEventListener('change', () => setTimeout(saveFormDataToCookies, 0));
		});

		const counters = document.querySelectorAll('.box-tab-count input');
		counters.forEach(counter => {
			counter.addEventListener('change', function() {
				updateCustomItemCount(this);
				setTimeout(saveFormDataToCookies, 0);
			});
			counter.addEventListener('input', function() {
				updateCustomItemCount(this);
				setTimeout(saveFormDataToCookies, 0);
			});
		});

		const counterButtons = document.querySelectorAll('.box-tab-count svg');
		counterButtons.forEach(button => {
			button.addEventListener('click', function() {
				const input = button.parentElement.querySelector('input[type="number"]');
				if (input) {
					setTimeout(() => {
						updateCustomItemCount(input);
						saveFormDataToCookies();
					}, 100);
				} else {
				setTimeout(saveFormDataToCookies, 100);
				}
			});
		});

		const tabs = document.querySelectorAll('.checkBox');
		tabs.forEach(tab => {
			tab.addEventListener('click', function() {
				setTimeout(saveFormDataToCookies, 100);
			});
		});

		const orderButton = getElemById('orderBtn');
		if (orderButton) {
			orderButton.addEventListener('click', () => setTimeout(saveFormDataToCookies, 0));
		}

		function updateCustomItemCount(input) {
			const boxElement = input.closest('.box');
			if (!boxElement) return;

			const customKey = boxElement.getAttribute('data-key');
			if (!customKey || !window.customItems) return;

			const newCount = parseInt(input.value) || 1;

			['boxes', 'furniture', 'mattresses'].forEach(category => {
				if (window.customItems[category]) {
					const itemIndex = window.customItems[category].findIndex(item => item.key === customKey);
					if (itemIndex !== -1) {
						window.customItems[category][itemIndex].count = newCount;
					}
				}
			});
		}
	}

	// Функция для обновления цены заказа
	function updateOrderPrice() {
		try {
			orderPrice.setPrice(() => 0);

			['boxes', 'furniture', 'mattresses', 'van', 'doors', 'tv', 'suitcases'].forEach(category => {
				const categoryForm = getElemById(category);
				if (!categoryForm) return;

				const selectedCheckboxes = categoryForm.querySelectorAll('input[type="checkbox"]:checked');

				selectedCheckboxes.forEach(checkbox => {
					const row = checkbox.closest('.box') || checkbox.closest('.size-row');
					if (!row) return;

					const priceEl = row.querySelector('.box-size-value-prise strong');
					if (!priceEl) return;

					const countInput = row.querySelector('input[type="number"]');
					const count = countInput ? parseInt(countInput.value) || 1 : 1;

					let price = parseFloat(priceEl.textContent.replace(/[^\d.]/g, '')) || 0;

					const isCustom = checkbox.getAttribute('name')?.startsWith('custom_');
					if (isCustom && count > 1) {
						const customKey = row.getAttribute('data-key');
						if (customKey) {
							const item = window.customItems[category]?.find(item => item.key === customKey);
							if (item) {
								price = item.price * count;
							}
						}
					}

					orderPrice.setPrice(value => value + price);
				});
			});
		} catch (error) {
			// Ошибка при обновлении цены
		}
	}
});

// Функция для очистки сохраненных данных после успешного заказа
window.clearCalculatorData = function() {
	const cookieConsent = localStorage.getItem('cookieConsent');
	let functionalCookiesAllowed = true;

	if (cookieConsent) {
		const consentData = JSON.parse(cookieConsent);
		functionalCookiesAllowed = consentData.functional;
	}

	if (functionalCookiesAllowed) {
		if (window.cookieUtils) {
			window.cookieUtils.deleteCookie('calculatorFormData');
		}

		localStorage.removeItem('calculatorFormData');
	}

	// Очищаем данные о кастомных элементах
	window.customItems = {
		boxes: [],
		furniture: [],
		mattresses: []
	};

	try {
		const customBoxesList = getElemById('customBoxesList');
		const furnitureList = getElemById('furnitureList');
		const customMattressesList = getElemById('customMattressesList');

		if (customBoxesList) customBoxesList.innerHTML = '';
		if (furnitureList) furnitureList.innerHTML = '';
		if (customMattressesList) {
			const boxList = customMattressesList.querySelector('.box-list');
			if (boxList) boxList.innerHTML = '';
			else customMattressesList.innerHTML = '';
		}
	} catch (error) {
		// Error clearing custom elements UI
	}
};

window.customItems = {
	boxes: [],
	furniture: [],
	mattresses: []
};

function generateCustomKey(type) {
    return `custom_${type}_${Date.now()}_${Math.floor(Math.random() * 1000)}`;
}

// Глобальная переменная для хранения текущей цены заказа
window.currentOrderPrice = null;

// Функция инициализации автозаполнения адресов через Google Places API
window.initCalculatorAutocomplete = function() {
	// Проверяем, загружен ли Google Maps API
	if (typeof google === 'undefined' || !google.maps || !google.maps.places) {
		// Если API еще не загружен, пробуем инициализировать позже
		setTimeout(window.initCalculatorAutocomplete, 500);
		return;
	}

	const pickupAddressInput = document.querySelector('input[name="upAddress"]');
	const deliveryAddressInput = document.querySelector('input[name="deliverAddress"]');
	const pickupZipInput = document.querySelector('input[name="upZipCode"]');
	const deliveryZipInput = document.querySelector('input[name="deliverZipCode"]');
	const pickupStateSelect = document.getElementById('upState');
	const deliveryStateSelect = document.getElementById('deliverState');

	// Настройки для автозаполнения (только адреса в США, на английском языке)
	const options = {
		types: ['address'],
		componentRestrictions: { country: 'us' },
		language: 'en',
		region: 'us'
	};

	// Функция для обработки выбранного адреса
	const fillInAddress = (place, isPickup) => {
		const components = {
			postal_code: '',
			state: '',
			state_short: ''
		};

		// Парсим компоненты адреса
		for (const component of place.address_components) {
			const types = component.types;
			if (types.includes('postal_code')) {
				components.postal_code = component.long_name;
			}
			if (types.includes('administrative_area_level_1')) {
				components.state = component.long_name;
				components.state_short = component.short_name;
			}
		}

		// Форматируем адрес (убираем ', USA' если есть)
        let formattedAddress = place.formatted_address ? place.formatted_address.replace(', USA', '') : '';
        console.log(formattedAddress);


		if (isPickup) {
			// Заполняем поля для pickup
			if (pickupAddressInput) {
				pickupAddressInput.value = formattedAddress;
				// Триггерим события для обновления состояния формы
				pickupAddressInput.dispatchEvent(new Event('input', { bubbles: true }));
				pickupAddressInput.dispatchEvent(new Event('change', { bubbles: true }));
			}
			if (pickupZipInput && components.postal_code) {
				pickupZipInput.value = components.postal_code;
				pickupZipInput.dispatchEvent(new Event('input', { bubbles: true }));
				pickupZipInput.dispatchEvent(new Event('change', { bubbles: true }));
			}
			if (pickupStateSelect && components.state) {
				// Проверяем, есть ли такой штат в списке
				const stateOption = Array.from(pickupStateSelect.options).find(
					option => option.value === components.state ||
							 option.text === components.state ||
							 option.value === components.state_short
				);
				if (stateOption) {
					pickupStateSelect.value = stateOption.value;
					pickupStateSelect.dispatchEvent(new Event('change', { bubbles: true }));
				}
			}
		} else {
			// Заполняем поля для delivery
			if (deliveryAddressInput) {
				deliveryAddressInput.value = formattedAddress;
				deliveryAddressInput.dispatchEvent(new Event('input', { bubbles: true }));
				deliveryAddressInput.dispatchEvent(new Event('change', { bubbles: true }));
			}
			if (deliveryZipInput && components.postal_code) {
				deliveryZipInput.value = components.postal_code;
				deliveryZipInput.dispatchEvent(new Event('input', { bubbles: true }));
				deliveryZipInput.dispatchEvent(new Event('change', { bubbles: true }));
			}
			if (deliveryStateSelect && components.state) {
				// Проверяем, есть ли такой штат в списке
				const stateOption = Array.from(deliveryStateSelect.options).find(
					option => option.value === components.state ||
							 option.text === components.state ||
							 option.value === components.state_short
				);
				if (stateOption) {
					deliveryStateSelect.value = stateOption.value;
					deliveryStateSelect.dispatchEvent(new Event('change', { bubbles: true }));
				}
			}
		}

		// Сохраняем данные формы после автозаполнения
		if (window.saveCalculatorData) {
			setTimeout(window.saveCalculatorData, 100);
		}
	};

	// Инициализируем автозаполнение для поля pickup адреса
	if (pickupAddressInput) {
		try {
			const pickupAutocomplete = new google.maps.places.Autocomplete(pickupAddressInput, options);
			pickupAutocomplete.setFields(['address_components', 'formatted_address']);
			pickupAutocomplete.addListener('place_changed', () => {
				const place = pickupAutocomplete.getPlace();
				if (place.address_components) {
					fillInAddress(place, true);
				}
			});
		} catch (error) {
			console.warn('Не удалось инициализировать автозаполнение для pickup адреса:', error);
		}
	}

	// Инициализируем автозаполнение для поля delivery адреса
	if (deliveryAddressInput) {
		try {
			const deliveryAutocomplete = new google.maps.places.Autocomplete(deliveryAddressInput, options);
			deliveryAutocomplete.setFields(['address_components', 'formatted_address']);
			deliveryAutocomplete.addListener('place_changed', () => {
				const place = deliveryAutocomplete.getPlace();
				if (place.address_components) {
					fillInAddress(place, false);
				}
			});
		} catch (error) {
			console.warn('Не удалось инициализировать автозаполнение для delivery адреса:', error);
		}
	}
};

// // Вызываем инициализацию автозаполнения после загрузки страницы
// if (document.readyState === 'loading') {
// 	document.addEventListener('DOMContentLoaded', function() {
// 		// Ждем немного, чтобы Google Maps API успел загрузиться
// 		setTimeout(window.initCalculatorAutocomplete, 1000);
// 		// Инициализируем валидацию запрещенных веществ
// 		initProhibitedItemsValidation();
// 	});
// } else {
// 	// Если DOM уже загружен, инициализируем сразу
// 	setTimeout(window.initCalculatorAutocomplete, 1000);
// 	initProhibitedItemsValidation();
// }

// // Функция для валидации чекбокса запрещенных веществ
// function initProhibitedItemsValidation() {

//     const prohibitedItemsCheckbox = document.getElementById('noProhibitedItems');
//     const confirmRules = document.getElementById('confirmRules');

// 	if (!prohibitedItemsCheckbox || !errorDiv) {
// 		console.warn('Prohibited items validation elements not found');
// 		return;
// 	}


// }

