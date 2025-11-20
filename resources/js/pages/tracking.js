import { createElement, getElemById, swapAttribute } from '../utils/DOM.js';
import { inputPlaceholderHandler, preventDefault, windowResize } from '../utils/event.js';

(() => {

    var forms = {
        trackingNumber: {
            inputs: {
                number: getElemById('number'),
            },
            buttons: {
                track: getElemById('track'),
            },
            form: getElemById('trackingNumber'),
            h: getElemById('trackingH1'),
        },
    };
    // var shipmentItems = {
    //     get shipmentNumber() {
    //         return getElemById('shipmentNumber')
    //     },
    //     set shipmentNumber(value) {
    //         this.shipmentNumber.innerText = value;
    //     },
    //     trackingInfo: {
    //         parent: getElemById('trackingInfo'),
    //         get status(){
    //             return getElemById('status')
    //         },
    //         set status(value) {
    //             this.status.innerText = value;
    //         },
    //         get deliveryDate(){
    //             return getElemById('deliveryDate')
    //         },
    //         set deliveryDate(value) {
    //             this.deliveryDate.innerText = value;
    //         },
    //         get shipmentType(){
    //             return getElemById('shipmentType');
    //         },
    //         set shipmentType(values){
    //             this.shipmentType.innerText = values.toString().replaceAll(',', ', ');
    //         }
    //     }
    // }

    // var trackingInfo = {
    //     element: getElemById('trackingInfoWrapper'),
    //     get number(){
    //         return getElemById('shipmentNumber');
    //     },
    //     set number(value){
    //         this.number.innerText = value;
    //     },
    //     get status(){
    //         return getElemById('status');
    //     },
    //     set status(value){
    //         this.status.innerText = value;

    //     },
    //     get deliveryDate(){
    //         return getElemById('deliveryDate');
    //     },
    //     set deliveryDate(date){
    //         this.deliveryDate.innerText = parseDate(date);
    //     },
    //     get shipmentType(){
    //         return getElemById('shipmentType');
    //     },
    //     /**
    //      * @param {Array} values
    //      */
    //     set shipmentType(values){
    //         this.shipmentType.innerText = values.toString().replaceAll(',', ', ')
    //     }
    // };
    // var callSection = {
    //     0: getElemById('section1'),
    //     1: getElemById('section2'),
    // };
    // var pathElement = getElemById('path');
    // /**
    //  * @enum {string}
    //  */
    // var PathItemHeaderEnum = {
    //     accepted(){
    //         return this.headerElement(
    //             createElement('strong', {}, null, 'shippment accepted')()
    //         );
    //     },
    //     sentTo(){
    //         var sent = createElement('strong', {}, null, 'sent');
    //         var destination = createElement('strong', {}, null, 'to destination');
    //         return this.headerElement(sent(), destination())
    //     },
    //     inTransit() {
    //         return this.headerElement(
    //             createElement('strong', {}, null, 'in transit')()
    //         );
    //     },
    //     recipient() {
    //         var will = createElement('span', {}, ['size_ml'], 'will be')
    //         var strong = createElement('strong', {}, null, 'delivered to recipient')
    //         return this.headerElement(will(), strong())
    //     },
    //     headerElement(...elements){
    //         return createElement(
    //             'span',
    //             {},
    //             ['size_sl',  'path-item-header',  'flex',  'col',  'aic'],
    //             null
    //         )(...elements)
    //     }
    // }
    // /**
    //  * @enum {string}
    //  */
    // var PathItemStatusEnum = {
    //     done(){
    //         return createElement(
    //             'div',
    //             {},
    //             ['done', 'path-item-svg', 'flex-center'])();
    //     },
    //     process(){
    //         return createElement(
    //             'div',
    //             {},
    //             ['process', 'path-item-svg', 'flex-center']
    //         )();
    //     },
    //     default(){
    //         return  createElement(
    //             'div',
    //             {},
    //             ['path-item-svg', 'flex-center']
    //         )();
    //     }
    // }
    if (forms.trackingNumber.inputs.number) {
        var trackNumberInput = inputPlaceholderHandler(forms.trackingNumber.inputs.number, {
            callback: (_, value) => {
                return value.toLocaleUpperCase().replaceAll(' ', '');
            },
            errorCallback: (value) => {
                return value.length < 6
                    ? (() => {
                        forms.trackingNumber.buttons.track.setAttribute('disabled', '');
                        return 'Tracking number min length: 6';
                    })()
                    : (() => {
                        forms.trackingNumber.buttons.track.removeAttribute('disabled');
                        return false;
                    })();
            },
        });
    }
    // forms.trackingNumber.form.addEventListener(
    //     'submit',
    //     preventDefault(() => {
    //         const elem = swapAttribute(forms.trackingNumber.form, trackingInfo.element);
    //         const call = swapAttribute(callSection[0], callSection[1]);


    //         fetchData(new FormData(forms.trackingNumber.form))

    //         /**
    //          * @param {FormData} form
    //          */
    //         function fetchData(form) {
    //             trackingInfo.number = form.get('track_number');

    //             fetch(`/tracking?track_number=${trackingInfo.number}`)
    //                 .then(response => response.json())
    //             .then(data => {
    //                 console.log(data);
    //                 getElemById('slider').style.display = 'none';
    //                 getElemById('using').style.display = 'none';
    //                 elem('active');
    //                 forms.trackingNumber.h.removeAttribute('active');
    //                 call('active');
    //             }).catch(() => {
    //                 trackNumberInput.setError(true, "Track number not found")
    //             });

    //             // createPath(
    //             //     createPathItem({
    //             //         header: PathItemHeaderEnum.accepted(),
    //             //         status: PathItemStatusEnum.done(),
    //             //         date: new Date('05/18/2025'),
    //             //         city: "New York"
    //             //     }),
    //             //     createPathItem({
    //             //         header: PathItemHeaderEnum.sentTo(),
    //             //         status: PathItemStatusEnum.done(),
    //             //         date: new Date('05/18/2025'),
    //             //     }),
    //             //     createPathItem({
    //             //         header: PathItemHeaderEnum.inTransit(),
    //             //         status: PathItemStatusEnum.process(),
    //             //         date: new Date('05/18/2025'),
    //             //         city: "Virginia"
    //             //     }),
    //             // )
    //             // addToPath(
    //             //     createPathItem({
    //             //         header: PathItemHeaderEnum.recipient(),
    //             //         status: PathItemStatusEnum.default(),
    //             //         date: new Date('05/18/2025'),
    //             //         city: "Florida"
    //             //     })
    //             // )
    //         }
    //     })
    // );

    // windowResize((width) => {
    //     if (pathElement instanceof HTMLElement) {
    //         pathElement.classList.toggle('row', width > 850)
    //         pathElement.classList.toggle('pathCol', width <= 850)
    //     }
    // })

    // /**
    //  * Создаёт путь
    //  *
    //  * @param {PathItem[]} elements
    //  */
    // function createPath(...elements) {
    //     pathElement.replaceChildren(...elements);
    //     pathElement.lastChild.getElementsByClassName('path-item-svg')[0].classList.add('path-item-svg_end');
    //     pathElement.classList.toggle('row', pathElement.children.length < 4 && window.innerWidth > 850)
    //     pathElement.classList.toggle('pathCol', pathElement.children.length > 4 || window.innerWidth < 850);
    // }
    // /**
    //  * @param  {...any} elements
    //  */
    // function addToPath(...elements) {
    //     pathElement.lastChild.getElementsByClassName('path-item-svg')[0].classList.remove('path-item-svg_end');
    //     pathElement.append(...elements);
    //     pathElement.lastChild.getElementsByClassName('path-item-svg')[0].classList.add('path-item-svg_end');
    //     pathElement.classList.toggle('row', pathElement.children.length < 4 && window.innerWidth > 850)
    //     pathElement.classList.toggle('pathCol', pathElement.children.length > 4 || window.innerWidth < 850);
    // }
    // /**
    //  *
    //  *
    //  * @param {{
    //  * header: PathItemHeaderEnum,
    //  * status: PathItemStatusEnum,
    //  * date: string | Date,
    //  * city?: string
    //  * }} param0
    //  * @returns {PathItem}
    //  */
    // function createPathItem({header, status, date, city}){
    //     var headerElement = createElement(
    //         'span',
    //         {},
    //         ['size_sl', 'path-item-header', 'flex', 'col', 'aic']
    //     )(header);
    //     var pathItemInfo = createElement('div', {}, ['path-item-info', 'flex', 'col'])

    //     const dateElement = createElement(
    //         'span', {}, ['path-item-date', 'color-clue'],
    //         parseDate(date)
    //     );
    //     var cityElement = null
    //     if (city) {
    //         cityElement = createElement(
    //             'div', {}, ['path-item-city', 'flex', 'aic']
    //         )(createElement('span', {}, null, city)());
    //     }

    //     return createElement(
    //         'div', {}, ['path-item', 'flex', 'col', 'aic']
    //         )(
    //             headerElement,
    //             status,
    //             cityElement ?
    //             pathItemInfo(dateElement(), cityElement)
    //             : pathItemInfo(dateElement()) ,
    //         );
    // }

    // /**
    //  * Парисит дату в строку `01/01/2025`
    //  * @param {string | Date} date
    //  * @returns {string}
    //  */
    // function parseDate(date) {
    //     const dateObj = new Date(date)
    //     return `${(dateObj.getMonth() + 1).toString().padStart(2, '0')}/${dateObj.getDate().toString().padStart(2, '0')}/${dateObj.getFullYear()}`
    // }

    /**
     * Кнопка в последней секции которая скролит к началу страницы
     * @type {HTMLElement}
     */
    var scrollBtn = document.getElementById('scrollTop');
    /**
     * При нажатии плавная прокрутка к началу страницы
     */
    scrollBtn.onclick = () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        })
    }
})();
