/**
 * Класс `Accordion` добавляет функциональность аккордеона для дочерних элементов внутри родительского контейнера.
 *
 * @param {HTMLDivElement} parent - Родительский контейнер аккордеона, содержащий элементы `.accordion-item_header`.
 * @param {{
 * 	autoClosing: boolean
 * }} config
 */
export default class Accordion {
	#activeItem = null;
	constructor(parent, config = { autoClosing: true }) {
        if (parent instanceof HTMLDivElement) {
            this.parent = parent;
            this.children = parent.children;

            Array.from(this.children).forEach((item) => {
                if (item.getElementsByClassName('accordion-item_header')[0]) {
                    item.getElementsByClassName('accordion-item_header')[0].addEventListener('click', () => {
                        if (item.getAttribute('active') == null) {
							item.setAttribute('active', '');
							if (config.autoClosing && this.#activeItem !== null) {
								this.#activeItem.removeAttribute('active');
							}
							this.#activeItem = item;
                        } else {
							item.removeAttribute('active');
							
							if (config.autoClosing) {
								this.#activeItem = null;
							}
                        }
                    });
                }
            });
        }
    }
}
