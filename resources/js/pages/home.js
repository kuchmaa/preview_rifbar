import Accordion from "../utils/accordion.js";
import { inputElement, inputHandler, inputValidator, ValidationEnum, windowResize } from "../utils/event.js";
import { Slider } from "../utils/slider.js";

const clientSlider = new Slider(document.getElementById("clientSlider"));
const partnersSlider = new Slider(document.getElementById("partners-slider"));


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
var partners = Array.from(
    {
        length: (() => {
            var l = 0;
            Array.from(partnersSlider.pages.elements).forEach((item) => {
                !item.className.includes("ellipses") &&
                    (l = l + item.children.length);
            });
            return l;
        })(),
    },
    () => {
        return null;
    }
);
partners.length = 0;
Array.from(partnersSlider.pages.elements).forEach((item) => {
    !item.className.includes("ellipses") &&
        Array.from(item.children, (child) => {
            partners[partners.length] = child;
        });
});

const resizePartnersSlider = (width) => {
    function arrayPages(maxItems) {
        let pages = [];

        partners.forEach((el) => {
            if (!pages[0]) {
                pages.push([]);
                pages[0].push(el);
            } else {
                if (pages[pages.length - 1].length < maxItems) {
                    pages[pages.length - 1].push(el);
                } else {
                    pages.push([]);
                    pages[pages.length - 1].push(el);
                }
            }
        });

        pages = Array.from(pages, (...elem) => {
            return sliderPage("div", "slider-page flex row aic", ...elem[0]);
        });

        return pages;
    }

    const pagesLength = Array.from(
        partnersSlider.pages.wrapper.children[0].children
    ).length;

    if (!partnersSlider.pages.process()) {
        if (width > 1110 && pagesLength != 8) {
            var pages = arrayPages(8);

            partnersSlider.pages.setElements(...pages);
        } else if (width > 800 && width < 1100 && pagesLength != 6) {
            var pages = arrayPages(6);
            // (pages);

            partnersSlider.pages.setElements(...pages);
        } else if (width > 425 && width < 799 && pagesLength != 4) {
            var pages = arrayPages(4);

            partnersSlider.pages.setElements(...pages);
        } else if (width < 425 && pagesLength != 2) {
            var pages = arrayPages(2);

            partnersSlider.pages.setElements(...pages);
        }
    }
};

const accordion = new Accordion(document.getElementById("faqsAccordion"));

const nameInput = inputHandler({
    ...inputElement(document.getElementById('comment_name')),
    errorMessage: (value) => {
        const xss = !inputValidator({
            type: ValidationEnum.name,
            value
        });
        return value.length < 2 ? 'Name must be at least 2 characters' : xss && "Contains invalid characters."
    }
});
const emailInput = inputHandler({
    ...inputElement(document.getElementById('comment_email')),
    errorMessage: (value) => !inputValidator({
        type: ValidationEnum.email,
        value
    }) ? "Please enter a valid email address" : null
});

const contentInput = inputHandler({
    ...inputElement(document.getElementById('comment-content')),
    errorMessage: (value) => {
        const xss = inputValidator({
            type: ValidationEnum.safeHtml,
            value
        });
        const l = value.length;
        return l < 10 ? "Comment must be at least 10 characters" : l > 1000 ? "Comment cannot exceed 1000 characters" : xss && "Contains invalid characters."
    }
});
document.getElementById('comment-form').addEventListener('submit', (e) => {
    const validInputs = [nameInput, emailInput, contentInput];
    validInputs.forEach((input) => {
        if (input.getError()) {
            input.checkError();
            e.preventDefault();
        }
    })
})

windowResize(resizeClientSlider, resizePartnersSlider);
