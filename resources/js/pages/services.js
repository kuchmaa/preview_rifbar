import { windowResize } from "../utils/event";
import { Slider } from "../utils/slider";

const clientSlider = new Slider(document.getElementById("clientSlider"));

const sliderPage = (el, classNames, ...items) => {
    let page = document.createElement(el);
    page.className = classNames;
    items && page.append(...items);

    return page;
};
const resizeClientSlider = function (width) {
    if (width < 1024) {

        if (Array.from(clientSlider.pages.elements[0].children).length !== 1) {
            let pages = [];
            Array.from(clientSlider.pages.elements).forEach((elem) => {
                const com1 = sliderPage(
                    "div",
                    "slider-page flex row",
                    elem.getElementsByTagName("div")[0]
                );
                const com2 = elem.getElementsByTagName("div")[0]
                    ? sliderPage(
                          "div",
                          "slider-page flex row",
                          elem.getElementsByTagName("div")[0]
                      )
                    : null;

                com2 ? pages.push(com1, com2) : pages.push(com1);
            });
            clientSlider.pages.setElements(...pages);
        }
    } else {
        var children = Array.from(clientSlider.pages.elements);
        if (children[0].children.length < 2) {
            var pages = Array.from(
                {
                    length: Math.ceil(children.length / 2),
                },
                () => sliderPage("div", "slider-page flex row")
            );
            var i = 1;
            var elI = 0;
            children.forEach((page) => {
                if (i < 3) {
                    var item = page.lastChild;
                    pages[elI].append(item);
                    i++;
                } else {
                    elI++;
                    i = 1;
                    var item = page.lastChild;
                    pages[elI].append(item);
                    i++;
                }
            });

            clientSlider.pages.setElements(...pages);
        }
    }
};

windowResize(resizeClientSlider);
