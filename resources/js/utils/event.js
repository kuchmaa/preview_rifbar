/**
 * Функция-обработчик ввода, принимающая введенное значение и нажатую клавишу.
 * @callback InputHandlerCallback
 * @param {string} value - Текущее значение ввода.
 * @param {string} key - Нажатая клавиша.
 * @returns {boolean} - Флаг, указывающий, прошло ли значение валидацию.
 */

/**
 * Функция-обработчик ввода, принимающая введенное значение и нажатую клавишу.
 * @callback InputErrorHandlerCallback
 * @param {string} value - Текущее значение ввода.
 * @returns {boolean} - Флаг, указывающий, прошло ли значение валидацию.
 */

/**
 * @enum {string}
 */
export const ValidationEnum = {
	email: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
	phone: /^\d{10}$/,
	default: /^[\p{L}\p{N}`.,\-\s]*$/u,
    number: /^[\p{N}]*$/u,
    arrow: /^[^<>]*$/,
    name: /^[\p{L}\p{N}\s.\-'\u02BC]+$/u,
    safeHtml: /(<\s*(script|iframe|object|embed|link|style|meta)\b[^>]*>|<[^>]+on\w+\s*=|javascript\s*:|[^a-zA-Z0-9А-Яа-яёЁ\s.,:;\-+%"'\(\)\[\]\{\}])/i
};
/**
 *
 * @param {{
 * 	type: RegExp,
 * 	value: string,
 * 	pattern: RegExp
 * }} param0
 */
export const inputValidator = ({ type, value, pattern }) => {
    if (type) {
		return type.test(value);
	} else {
		return pattern.test(value);
	}
};

export const ratingEvent = (elements) => {
    Array.from(elements).forEach((elem) => {
        const input = elem.querySelector("input");
        const stars = elem.querySelectorAll(".star-icon");

        let selectedValue = 0;

        stars.forEach((star, i) => {
            const value = i + 1;

            star.addEventListener("click", () => {
                selectedValue = value;
                input.value = value;

                stars.forEach((s, j) => {
                    if (j < value) {
                        s.setAttribute("active", "");
                    } else {
                        s.removeAttribute("active");
                    }
                });
                console.log(input.value);

            });

            star.addEventListener("mouseover", () => {
                stars.forEach((s, j) => {
                    if (j < value) {
                        s.setAttribute("active", "");
                    } else {
                        s.removeAttribute("active");
                    }
                });
            });

            star.addEventListener("mouseout", () => {
                stars.forEach((s, j) => {
                    if (j < selectedValue) {
                        s.setAttribute("active", "");
                    } else {
                        s.removeAttribute("active");
                    }
                });
            });
        });
    });
};


const resizeEvent = new Event("resize");
window.onload = () => {
	window.dispatchEvent(resizeEvent);
};

/**
 * Отменяет стандартное поведение
 * @param {callback} callback
 * @returns {(event) => void}
 */
export const preventDefault = (callback = () => {}) => {
	return (event) => {
		event.preventDefault();
		callback(event);
	};
};

export function inputElement(elem) {
	return {
		wrapper: elem,
		input: elem.getElementsByTagName("input")[0] ?? elem.getElementsByTagName("textarea")[0],
		errorElem: elem.getElementsByClassName("error-message")[0],
	};
}
/**
 * Управляет вводом в поле, проверяет его значение и выводит ошибку

 * @param {{
 * 	wrapper: HTMLElement,
 * 	input: HTMLInputElement,
 * 	errorElem: HTMLElement,
 *  focusCallback: callback,
 * 	placeholder: HTMLElement,
 *  errorMessage: InputErrorHandlerCallback,
 *  callback: InputHandlerCallback
 * }} options - Настройки обработчика
 * @returns {{
 * 	checkError: () => boolean,
 *	getState: () => boolean,
 *	setInput: (value: string) => void,
 *	getInput: () => HTMLInputElement,
 *	getWrapper: () => HTMLElement,
 *	getPlaceholder: () => HTMLElement,
 *	getErrorElem: () => HTMLElement,
 *	getError: () => boolean,
 *	getValue: () => boolean,
 * 	setError: (value: boolean, msg?: string) => void
 * }}
 */
export const inputHandler = ({ wrapper, input, placeholder, errorElem, errorMessage, callback }) => {
	var value = input.value;
	var error = false;
	var state = false;
	var blurEvent = new Event("blur");
	wrapper.onclick = () => {
		input.focus();
	};
    input.addEventListener("input", (event) => {
        value = typeof callback == 'function' ? callback(value, event.target.value, event) : event.target.value;

		event.target.value = value;
		var err = typeof errorMessage == 'function' ? errorMessage(value) : null;
		if (err) {
			if (errorElem) {
				errorElem.innerText = err;
			}
			error = true;
			if (wrapper) {
                wrapper.setAttribute("error", "");
                wrapper.classList.remove('validInput')
			} else {
                input.setAttribute("error", "");
                input.classList.remove('validInput')
			}
			state = false;
		} else {
			if (errorElem) {
				errorElem.innerText = "";
			}
			error = false;
			if (wrapper) {
				wrapper.removeAttribute("error");
			} else {
				input.removeAttribute("error");
			}
			state = true;
		}
	});

	input.addEventListener("focus", () => {
		if (placeholder) {
			placeholder.removeAttribute("hidden");
		}
		scroll = input.scrollWidth;
		setTimeout(() => {
			const evt = new Event("input", { bubbles: true });
			input.dispatchEvent(evt);
		  }, 500);
		wrapper.classList.add("focus");
	});
	input.addEventListener("blur", (event) => {
		var err = errorMessage(input.value);
		if (event.target.value.length == 0) {
			wrapper.classList.remove("focus");
			wrapper.classList.remove("validInput");
		} else {
			wrapper.classList.remove("focus");
			wrapper.classList.add("validInput");
		}
		if (placeholder) {
			placeholder.setAttribute("hidden", "");
		}
		if (!err) {
			if (wrapper) {
				// wrapper.classList.add('validInput');
				wrapper.removeAttribute("error");
			} else {
				// input.classList.add('validInput');
				input.removeAttribute("error");
			}
			if (errorElem) {
				errorElem.innerText = "";
			}
			state = true;
			error = false;
		} else {
			if (errorElem) {
				errorElem.innerText = err;
			}
			error = true;
			if (wrapper) {
				wrapper.setAttribute("error", "");
			} else {
				input.setAttribute("error", "");
			}
			state = false;
		}
	});
	return {
		checkError: () => {
			input.dispatchEvent(blurEvent);
			return state;
		},
		getState: () => state,
		setInput: (string) => {
			value = string;
			input.value = string;
		},
		getInput: () => input,
		getWrapper: () => wrapper,
		getPlaceholder: () => placeholder,
		getErrorElem: () => errorElem,
		getError: () => error,
		getValue: () => value,
		setError: (value, msg) => {

			if (value) {
				if (msg) {
					errorElem.innerText = msg;
				}
				if (wrapper) {
					wrapper.setAttribute("error", "");
				} else {
					input.setAttribute("error", "");
				}
			}
			error = value;
			state = !value;
		}
	};
};
/**
 *
 * @param {HTMLElement} parent
 * @returns {{
 * 	input: HTMLInputElement,
 * 	inputWrapper: HTMLElement,
 * 	placeholder: HTMLElement,
 * 	error: HTMLElement
 * }}
 */
export const getInputHelperItems = (parent) => {
	return {
		parent,
		inputWrapper: parent.getElementsByClassName("inputWrapper")[0],
		input: parent.getElementsByTagName("input")[0],
		placeholder: parent.getElementsByClassName("placeholder")[0],
		error: parent.getElementsByClassName("error-message")[0],
	};
};
/**
 *
 * @param {HTMLElement} parent
 * @param {{
 * 	callback: InputHandlerCallback,
 * errorCallback: InputErrorHandlerCallback
 * }} param1
 * @returns inputHandler
 */
export const inputPlaceholderHandler = (parent, { callback, errorCallback = () => {} }) => {
	var elem = getInputHelperItems(parent);
	var handler = inputHandler({
		wrapper: parent,
		input: elem.input,
		errorElem: elem.error,
		placeholder: elem.placeholder,
		callback,
		parentElement: elem.parent,
		errorMessage: errorCallback,
	});

	return handler;
};

export const inputPassword = (passwordInput, confirmInput = null, { pass = null, confirm = null }) => {
	var errPassLength = (value) =>
		(value.length < 8 && "Min password lenght: 8") || (value.length > 30 && "Max password lenght: 30");
	var passObj = getInputHelperItems(passwordInput);
	var confirmObj = confirmInput && getInputHelperItems(confirmInput);
	var currentPass = "";
	var confirmPass = "";
	var showPassHandler = null;
	var showCurrentPassHandler = null;
	var passHandler = inputHandler({
		wrapper: passwordInput,
		input: passObj.input,
		errorElem: passObj.error,
		placeholder: passObj.placeholder,
		parentElement: passObj.parent,
		callback: (value, newValue, event) => {
			console.log(123);

			currentPass = newValue;
			confirmHandler && confirmHandler.checkError();
			return newValue;
		},
		errorMessage: errPassLength,
	});
	if (pass) {
		showPassHandler = showPass(passHandler, pass, false);
	}
	var confirmHandler = confirmObj
		? inputHandler({
				wrapper: confirmInput,
				input: confirmObj.input,
				errorElem: confirmObj.error,
				placeholder: confirmObj.placeholder,
				parentElement: confirmObj.parent,
			callback: (value, newValue) => {
					confirmPass = newValue;
					return newValue;
				},
				errorMessage: (value) =>
					confirmPass !== currentPass ? "The passwords do not match" : errPassLength(value),
		  })
		: null;
	if (confirm) {
		showCurrentPassHandler = showPass(confirmHandler, confirm, false, () => confirmPass);
	}

	return {
		passHandler,
		confirmHandler,
		getPass: () => (confirmHandler ? confirmPass : currentPass),
	};

	/**
	 *
	 * @param {} handler
	 * @param {HTMLElement} button
	 * @param {*} state
	 * @returns
	 */
	function showPass(handler, button, state = false) {
		button.addEventListener("click", () => {
			state = !state;
			state
				? (() => {
					handler.getInput().type = 'text';
					button.setAttribute('active', '')
				})()
				: (() => {
					handler.getInput().type = 'password';
					button.removeAttribute('active');
				})();
		});
		return {
			getState: () => state,
		};
	}
};

/**
 * Вызывает функции при изменении окна
 *
 * @param  {...(innerWidth: number) => void} funcs
 */
export const windowResize = (...funcs) => {
	window.addEventListener("resize", (e) => {
		funcs.forEach((fun) => {
			fun(e.target.innerWidth);
		});
	}, {passive: true});
};
/**
 * Изменяет высоту textarea при вводе
 *
 * @param {HTMLTextAreaElement} elem
 * @param {{elemHeight: `${number}px`, pd: number}}
 * @param {(event: InputEvent, height, newHeight) => } callback
 */
export const resizeTextArea = async (elem, {elemHeight, pd}, callback) => {
	var height = elem.scrollHeight;
	elem.addEventListener("input", (event) => {
		elem.style.height = elemHeight;
		height = elem.scrollHeight;
		elem.style.height = pd ? height - pd + "px" : height + "px";
		if (callback) {
			callback(event, height, elem.scrollHeight);
		}
	});
};
