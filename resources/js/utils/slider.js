/**
 * 
 * @param {HTMLDivElement} parent 
 */
export function Slider(parent) {
	if (parent instanceof HTMLDivElement) {
		this.parent = parent;
		var buttonWrapper = parent.getElementsByClassName("slider-controls")[0];
		this.button = {
			get wrapper() {
				return buttonWrapper
			},
			get back() {
				return buttonWrapper.getElementsByClassName("slider-back")[0];
			},
			get next() {
				return buttonWrapper.getElementsByClassName("slider-next")[0];
			} 
		}
		var pagesWrapper = parent.getElementsByClassName("slider-pages")[0];
		var currentPage = 1;
		pagesWrapper.children[currentPage - 1].setAttribute("current", "");
		var ellipsesDiv = pagesWrapper.getElementsByClassName("ellipses")[0];
		if (ellipsesDiv) {
			let ellipses = Array.from({length: pagesWrapper.children.length - 1}, (_, i) => {
				let ellipse = document.createElement('div');
				ellipse.classList.add("ellipse");
				(i === 0 && ellipse.setAttribute("active", ""));
				return ellipse;
			});
			ellipsesDiv.replaceChildren(...ellipses);
		}

		var process = false

		this.pages = {
			get wrapper() {
				return pagesWrapper;
			},
			get elements() {
				return pagesWrapper.children;
			},
			get process() {
				return () => process
			},
			setElements(...elements)
			{
				process = true
				elements[currentPage - 1].setAttribute("current", "");
				pagesWrapper.replaceChildren(...elements);
				if (currentPage > pagesWrapper.children.length) {
					currentPage = pagesWrapper.children.length;
				}
				if (ellipsesDiv) {
					pagesWrapper.append(ellipsesDiv);
					let ellipses = Array.from({length: pagesWrapper.children.length - 1}, (_, i) => {
						let ellipse = document.createElement('div');
						ellipse.classList.add("ellipse");
						(i + 1 == currentPage && ellipse.setAttribute("active", ""))
						return ellipse;
					});
					ellipsesDiv.replaceChildren(...ellipses);
					
					process = false	;
				}
			},
			next()
			{ 		
				if (
					pagesWrapper.children[currentPage] && 
					pagesWrapper.children[currentPage] != ellipsesDiv
				){
					pagesWrapper.children[currentPage - 1].removeAttribute("current");
					pagesWrapper.children[currentPage].setAttribute("current", "");
					
					if (ellipsesDiv) {
						let eclipses = pagesWrapper.getElementsByClassName("ellipses")[0];
						eclipses.children[currentPage - 1].removeAttribute('active');
						eclipses.children[currentPage].setAttribute("active", "");
					}
					++currentPage;
				}
				
			},
			back()
			{ 
				var ellipsesDiv = pagesWrapper.getElementsByClassName("ellipses")[0];

				if(pagesWrapper.children[currentPage - 2]){
					pagesWrapper.children[currentPage - 1].removeAttribute("current");
					pagesWrapper.children[currentPage - 2].setAttribute("current", "");
					--currentPage;
					if (ellipsesDiv) {
						let eclipses = pagesWrapper.getElementsByClassName("ellipses")[0];
						eclipses.children[currentPage].removeAttribute('active');
						eclipses.children[currentPage - 1].setAttribute("active", "");
					}

				}
			}
		}
		this.button.back.onclick = this.pages.back;
		this.button.next.onclick = this.pages.next;
	} else {
		return null;
	}
	
}