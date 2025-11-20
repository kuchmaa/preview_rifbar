import { resizeTextArea } from "./utils/event.js";
import Menu from "./utils/menu.js";

const menu = new Menu(
    document.getElementById("nav-menu"),
    document.getElementById("cover"),
    {
        open: document.getElementById("menu-button"),
        close: document.getElementById("closeMeinMenu"),
    }
);

let hasScrolledDown = false;
let hasScrolledUp = false;
let header = document.getElementsByTagName("header")[0];
const headerShadow = () => {
	const scrollTop = window.scrollY || document.documentElement.scrollTop;
    if (scrollTop > 10 && !hasScrolledDown) {
        hasScrolledDown = true;
        hasScrolledUp = false;
        header.setAttribute("scroll", "");
    }
    // Если пользователь вернулся вверх
    if (scrollTop <= 0 && !hasScrolledUp) {
        header.removeAttribute("scroll");
        hasScrolledUp = true;
        hasScrolledDown = false;
    }
}

document.addEventListener('DOMContentLoaded', () => {
	headerShadow()
})

window.addEventListener(
    "scroll",
    () => {
    	headerShadow();
    },
    {
        passive: true,
    }
);

const chatMsgArea = document.getElementById('message-input');
resizeTextArea(chatMsgArea, {elemHeight: '40px'}, (event, h, newH) => {
    console.log(event, h, newH);
})
