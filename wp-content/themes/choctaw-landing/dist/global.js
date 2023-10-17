/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./wp-content/themes/choctaw-landing/src/js/header.ts":
/*!************************************************************!*\
  !*** ./wp-content/themes/choctaw-landing/src/js/header.ts ***!
  \************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ HeaderClickHandler; }
/* harmony export */ });
class HeaderClickHandler {
  constructor(screenWidthForHamburger) {
    this.screenWidthForHamburger = screenWidthForHamburger;
    this.checkIsMobile();
    window.addEventListener("resize", this.handleResize.bind(this));
    this.handleClicks();
  }

  /**
   * Inits `this.windowWidth` property & checks if the current window width is less than the size at which the navbar becomes a hamburger
   *
   */
  checkIsMobile() {
    this.windowWidth = window.innerWidth;
    this.navbarIsHamburger = this.windowWidth < this.screenWidthForHamburger;
  }

  /**
   * Sets `this.windowWidth` to the window's innerWidth value
   */
  handleResize() {
    this.windowWidth = window.innerWidth;
    this.checkIsMobile();
    this.handleClicks();
  }
  handleClicks() {
    if (this.navbarIsHamburger) {
      return;
    }
    const topLevelAnchors = document.querySelectorAll("#bootscore-navbar > .menu-item-has-children > a");
    if (!topLevelAnchors && !this.navbarIsHamburger) {
      console.warn(`Couldn't grab top-level anchors from the nav!`);
      return;
    }
    topLevelAnchors.forEach(anchor => {
      anchor.addEventListener("click", ev => {
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

/***/ }),

/***/ "./wp-content/themes/choctaw-landing/src/styles/main.scss":
/*!****************************************************************!*\
  !*** ./wp-content/themes/choctaw-landing/src/styles/main.scss ***!
  \****************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!********************************************************!*\
  !*** ./wp-content/themes/choctaw-landing/src/index.js ***!
  \********************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_main_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles/main.scss */ "./wp-content/themes/choctaw-landing/src/styles/main.scss");
/* harmony import */ var _js_header__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js/header */ "./wp-content/themes/choctaw-landing/src/js/header.ts");


const headerClickHandler = new _js_header__WEBPACK_IMPORTED_MODULE_1__["default"](1200);
}();
/******/ })()
;
//# sourceMappingURL=global.js.map