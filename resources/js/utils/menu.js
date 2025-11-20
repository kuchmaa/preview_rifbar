/**
 * Класс `Menu` управляет отображением меню с возможностью открытия и закрытия через триггеры и коллбэк.
 *
 * @param {HTMLElement} menu - Элемент меню.
 * @param {HTMLElement | null} cover - Затемняющий фон (оверлей).
 * @param {Object} triggers - Объект с кнопками управления.
 * @param {HTMLElement} triggers.open - Кнопка открытия меню.
 * @param {HTMLElement} [triggers.close] - Кнопка закрытия меню (необязательная).
 * @param {(state: boolean) => void} [callback] - Функция, вызываемая при изменении состояния меню.
 *
 * @constructor
 */
export default class Menu {
    menu = null;
    cover = null;
    state = false;
    constructor(menu, cover, { open, close }, callback) {
        this.menu = menu;
        this.open = open;
        this.close = close;
        this.cover = cover;
        this.state = false;
        if (!close) {
            window.addEventListener('click',  (e) => {
                if (!menu.contains(e.target) && !open.contains(e.target)) {
                    this.closeFunc.bind(this)();
                    if (callback) {
                        callback(false);
                    }
                }
            });
        }
        if (open) {
            open.addEventListener('click', this.openFunc.bind(this));
        }
        if (close) {
            close.addEventListener('click', this.closeFunc.bind(this));
        }
        if (cover) {
            cover.addEventListener('click', this.closeFunc.bind(this));
        }
    }
    openFunc() {
        document.body.style.overflow = 'hidden';
        this.menu.setAttribute('open', '');

        this.state = true;
        if (this.cover) {
            this.cover.setAttribute('open', '');
        }
        if (this.callback) {
            this.callback(true);
        }
    }
    closeFunc() {
        document.body.removeAttribute('style')
        this.menu.removeAttribute('open');
        if (this.cover) {
            this.cover.removeAttribute('open');
        }
        if (this.callback) {
            this.callback(false);
        }
        this.state = false;
    }
}
