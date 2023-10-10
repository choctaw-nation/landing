export default class HeaderClickHandler {
	private windowWidth: number;
	private navbarIsHamburger: boolean;
	private screenWidthForHamburger: number;
	constructor(screenWidthForHamburger: number) {
		this.screenWidthForHamburger = screenWidthForHamburger;
		this.checkIsMobile();
		window.addEventListener("resize", this.handleResize.bind(this));
		this.handleClicks();
	}

	/**
	 * Inits `this.windowWidth` property & checks if the current window width is less than the size at which the navbar becomes a hamburger
	 *
	 */
	private checkIsMobile() {
		this.windowWidth = window.innerWidth;
		this.navbarIsHamburger =
			this.windowWidth < this.screenWidthForHamburger;
	}

	/**
	 * Sets `this.windowWidth` to the window's innerWidth value
	 */
	private handleResize() {
		this.windowWidth = window.innerWidth;
		this.checkIsMobile();
		this.handleClicks();
	}

	private handleClicks() {
		if (this.navbarIsHamburger) {
			return;
		}
		const topLevelAnchors = document.querySelectorAll(
			"#bootscore-navbar > .menu-item-has-children > a",
		) as NodeListOf<HTMLAnchorElement>;
		if (!topLevelAnchors && !this.navbarIsHamburger) {
			console.warn(`Couldn't grab top-level anchors from the nav!`);
			return;
		}
		topLevelAnchors.forEach((anchor) => {
			anchor.addEventListener("click", (ev) => {
				if (ev.target) {
					window.location.href = ev.target.href;
				} else {
					console.warn(`Couldn't get the href from the target!`);
					return;
				}
			});
		});
	}
}
