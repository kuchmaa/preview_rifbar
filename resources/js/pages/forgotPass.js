import { getElemById } from "../utils/DOM";
import { inputPlaceholderHandler, inputValidator, preventDefault, ValidationEnum } from "../utils/event";

let email = inputPlaceholderHandler(form.inputsWrapper.email, {
		callback: (value, newValue) => {
			return newValue;
		},
		errorCallback: (value) =>
			!inputValidator({
				type: ValidationEnum.email,
				value,
			}) && "Invalid email",
});
	
getElemById('form').addEventListener('submit', preventDefault((e) => {
	if (email.getError()) {
		(email.getValue());
		
	}
}))