import { getElemById } from "../utils/DOM.js";
import { windowResize } from "../utils/event.js";
(() => {
	var orderListEl = getElemById('order-list');
    var ordersTable = getElemById('orders').getElementsByTagName('table')[0];
	var ordersTheadTable = ordersTable.getElementsByTagName('thead')[0].getElementsByTagName('tr')[0];
	var ordersAmount = Array.from(ordersTheadTable.children).at(-2)	
    var ordersTheadLastChild = ordersTheadTable.lastElementChild;
	var mobileState = false;
	
    windowResize(async (width) => {
        if (width < 850) {
			ordersTheadLastChild.style.display = 'none'
			ordersAmount.classList.remove('border-right')
			if (!mobileState && !getElemById('noItems')) {
				ordersTable.classList.add('mobile');
				mobileState = true;
				Array.from(orderListEl.children).forEach((el) => {
					if (el.className !== "mobile-buttons") {
						let elems = Array.from(el.children)
						elems.at(-1).style.display = 'none'
						elems.at(-2).classList.remove('border-right')
					}
				})
            }
            
        } else {
			ordersTheadLastChild.removeAttribute('style');
			ordersAmount.classList.add('border-right')
			if (mobileState && !getElemById('noItems')) {
                ordersTable.classList.remove('mobile');
				Array.from(orderListEl.children).forEach((el) => {
					if (el.className !== "mobile-buttons") {
						let elems = Array.from(el.children)
						elems.at(-1).removeAttribute('style');
						elems.at(-2).classList.add('border-right')
					}
				})
                mobileState = false
            }
        }
    })
})()

    