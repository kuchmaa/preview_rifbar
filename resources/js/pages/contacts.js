import { getElemById } from '../utils/DOM.js';
import {
    inputHandler,
    inputPlaceholderHandler,
    inputValidator,
    preventDefault,
    resizeTextArea,
    ValidationEnum,
} from '../utils/event.js';

(() => {
    var nameInput = inputPlaceholderHandler(getElemById('name'), {
        callback: (value, newValue) => {
			return newValue;
        },
		errorCallback: (value) => {
			return !value.length > 3
		},
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
    // var phoneInput = inputHandler({
    //     wrapper: phone,
    //     input: phone.getElementsByTagName('input')[0],
    //     callback: (value, key) => {
    //         if (!isNaN(key)) {
    //             return value + key;
    //         } else if (key == 'Backspace') {
    //             return value.slice(0, -1);
    //         } else {
    //             return value;
    //         }
    //     },
    //     errorMessage: (value) => {
    //         return !inputValidator({ type: ValidationEnum.phone, value });
    //     },
    // });
    // var emailInput = inputPlaceholderHandler(getElemById('emailInputWrapper'), {
    //     callback: (value, key) => {
    //         if (key.match(/^[a-zA-Z0-9`.@_\-\s]$/)) {
    //             return `${value}${key}`;
    //         } else if (key == 'Backspace') {
    //             return value.slice(0, -1);
    //         } else {
    //             return `${value}`;
    //         }
    //     },
    //     errorCallback: (value) => {
    //         return (
    //             !inputValidator({ type: ValidationEnum.email, value }) &&
    //             'Invalid mail. Example: test.set_wqee@example.test.te'
    //         );
    //     },
    // });

    var notifyTypeElements = createNotifyTypeElements(getElemById('question'), getElemById('problem'));

    function validateReasons() {
        const selectedReasons = Array.from(notifyTypeElements.getElements())
            .filter(obj => obj.getState())
            .length;

        const errorElement = document.getElementById('reasonsError');
        if (errorElement) {
            if (selectedReasons === 0) {
                errorElement.textContent = 'Please select at least one reason for contact';
                return false;
            } else {
                errorElement.textContent = '';
                return true;
            }
        }
        return selectedReasons > 0;
    }

    /**
     * @type {HTMLFormElement}
     */
    var form = getElemById('form');

    // Обработчик отправки формы
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const isReasonsValid = validateReasons();
        if (!isReasonsValid) {
            return false;
        }

        const reasons = Array.from(notifyTypeElements.getElements());
        reasons.forEach((obj, index) => {
            const checkbox = document.querySelector(`input[name="reasons[${index}][name]"]`);
            if (checkbox) {
                checkbox.checked = obj.getState();
            }
        });

        form.submit();
    });

    if (window.location.search.includes('message')) {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'flex';
        }
    }

    resizeTextArea(getElemById('messageTextArea'), {elemHeight: '25px', pd: 32});

    function createNotifyTypeElements(...elem) {
        var arr = Array.from({ length: elem.length }, () => null);

        elem.forEach((element, i) => {
            var obj = createNotifyObject(element);
            arr[i] = obj;
            element.addEventListener('click', () => {
                obj.setState(!obj.getState());

                const checkbox = element.querySelector('input[type="checkbox"]');
                if (checkbox) {
                    checkbox.checked = obj.getState();
                }

                validateReasons();
            });
        });

        return {
            getElements() {
                return arr;
            },
        };
    }

    function createNotifyObject(elem, state = false) {
        const checkbox = elem.querySelector('input[type="checkbox"]');
        if (checkbox) {
            state = checkbox.checked;
        }

        return {
            getElement: () => elem,
            getKey() {
                return elem.id;
            },
            getState() {
                return state;
            },
            /**
             * @param {boolean} value
             */
            setState(value) {
                state = value;
                state ? elem.setAttribute('checked', '') : elem.removeAttribute('checked');

                const checkbox = elem.querySelector('input[type="checkbox"]');
                if (checkbox) {
                    checkbox.checked = state;
                }
            },
        };
    }

    document.addEventListener('DOMContentLoaded', () => {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            const closeButton = successMessage.querySelector('.close-success-message');
            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    successMessage.style.display = 'none';
                });
            }
        }
    });
})();
