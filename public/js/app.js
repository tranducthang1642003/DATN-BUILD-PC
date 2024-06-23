/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ (() => {

throw new Error("Module build failed (from ./node_modules/mini-css-extract-plugin/dist/loader.js):\nModuleBuildError: Module build failed (from ./node_modules/postcss-loader/dist/cjs.js):\nError [ERR_REQUIRE_ESM]: require() of ES Module C:\\xampp\\htdocs\\DATN-BUILD-PC\\postcss.config.js from C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\node_modules\\cosmiconfig\\dist\\loaders.js not supported.\nInstead change the require of postcss.config.js in C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\node_modules\\cosmiconfig\\dist\\loaders.js to a dynamic import() which is available in all CommonJS modules.\n    at module.exports (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\import-fresh\\index.js:32:59)\n    at loadJs (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\node_modules\\cosmiconfig\\dist\\loaders.js:16:18)\n    at Explorer.loadFileContent (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\node_modules\\cosmiconfig\\dist\\Explorer.js:84:32)\n    at Explorer.createCosmiconfigResult (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\node_modules\\cosmiconfig\\dist\\Explorer.js:89:36)\n    at Explorer.loadSearchPlace (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\node_modules\\cosmiconfig\\dist\\Explorer.js:70:31)\n    at async Explorer.searchDirectory (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\node_modules\\cosmiconfig\\dist\\Explorer.js:55:27)\n    at async run (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\node_modules\\cosmiconfig\\dist\\Explorer.js:35:22)\n    at async cacheWrapper (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\node_modules\\cosmiconfig\\dist\\cacheWrapper.js:16:18)\n    at async cacheWrapper (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\node_modules\\cosmiconfig\\dist\\cacheWrapper.js:16:18)\n    at async cacheWrapper (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\node_modules\\cosmiconfig\\dist\\cacheWrapper.js:16:18)\n    at async Explorer.search (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\node_modules\\cosmiconfig\\dist\\Explorer.js:27:20)\n    at async loadConfig (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\dist\\utils.js:68:16)\n    at async Object.loader (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\dist\\index.js:54:22)\n    at processResult (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\webpack\\lib\\NormalModule.js:841:19)\n    at C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\webpack\\lib\\NormalModule.js:966:5\n    at C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\loader-runner\\lib\\LoaderRunner.js:400:11\n    at C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\loader-runner\\lib\\LoaderRunner.js:252:18\n    at context.callback (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\loader-runner\\lib\\LoaderRunner.js:124:13)\n    at Object.loader (C:\\xampp\\htdocs\\DATN-BUILD-PC\\node_modules\\postcss-loader\\dist\\index.js:56:7)");

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
Object(function webpackMissingModule() { var e = new Error("Cannot find module './bootstrap'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'alpinejs'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());


window.Alpine = Object(function webpackMissingModule() { var e = new Error("Cannot find module 'alpinejs'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'alpinejs'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())();

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	__webpack_modules__["./resources/js/app.js"](0, {}, __webpack_require__);
/******/ 	// This entry module doesn't tell about it's top-level declarations so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/css/app.css"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ })()
;