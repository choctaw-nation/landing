/**
 * HeaderClickHandler
 *
 * Handles the Mega-Menu functionality across desktop & mobile screen widths.
 * Called in `src/index.js`
 *
 * @package ChocatwNation
 * @since 0.2
 */

/**
 * Handles the Mega Menu
 */
export default class HeaderClickHandler {
	/**
	 * The Current window width
	 *
	 * @var {number} windowWidth
	 */
	private windowWidth: number;

	/**
	 * Whether or not the navbar is a hamburger
	 *
	 * @var {boolean} navbarIsHamburger
	 */
	private navbarIsHamburger: boolean;

	/**
	 * The screen width at which point the navbar becomes a hamburger
	 * @var {number} screenWidthForHamburger
	 */
	private screenWidthForHamburger: number;

	/** The Top-level Nav Anchors that are mega-menus
	 *
	 * @var {NodeListOf<HTMLAnchorElement>} megaMenuAnchors
	 */
	private megaMenuAnchors: NodeListOf<HTMLAnchorElement>;

	/** Builds the Class
	 *
	 * @param {number} screenWidthForHamburger the screen width at which point the navbar becomes a hamburger
	 */
	constructor(screenWidthForHamburger: number) {
		this.screenWidthForHamburger = screenWidthForHamburger;
		this.checkIsMobile();
		window.addEventListener("resize", this.handleResize.bind(this));
		this.init();
	}

	/** Checks if can init, then runs. */
	private init() {
		if (!this.navbarIsHamburger) {
			this.getTheMegaMenuAnchors();
			this.handleClicks();
		}
	}

	/**
	 * Inits `this.windowWidth` property.
	 * Checks if the current window width is less than the size at which the navbar becomes a hamburger
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
		this.init();
	}

	/** Gets the top-level mega-menu anchors, else throws a warning in the console. */
	private getTheMegaMenuAnchors() {
		const anchors = document.querySelectorAll(
			"#bootscore-navbar > .mega-menu > a",
		) as NodeListOf<HTMLAnchorElement>;
		if (anchors.length === 0) {
			console.warn(`Couldn't grab top-level anchors from the nav!`);
			return;
		} else {
			this.megaMenuAnchors = anchors;
		}
	}

	/** Listens for Clicks on Desktop widths and sends user to that location. */
	private handleClicks() {
		this.megaMenuAnchors.forEach((anchor) => {
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
