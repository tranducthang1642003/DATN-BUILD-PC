/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
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
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/slickside.js ***!
  \***********************************/
__webpack_require__.r(__webpack_exports__);
$(".one-time").slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true,
  autoplay: true,
  autoplaySpeed: 8000
});
document.addEventListener("DOMContentLoaded", function () {
  var menuToggle = document.getElementById("menu-toggle");
  var mobileMenu = document.getElementById("mobile-menu");
  menuToggle.addEventListener("click", function () {
    mobileMenu.classList.toggle("hidden");
  });
});
$(document).ready(function () {
  $(".autoplay").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000
  });
});
$(document).ready(function () {
  $(".autoplay-slider").slick({
    infinite: true,
    speed: 300,
    slidesToShow: 5,
    adaptiveHeight: true,
    responsive: [{
      breakpoint: 1280,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true
      }
    }, {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }]
  });
});
$(document).ready(function () {
  $(".slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: ".slider-nav"
  });
  $(".slider-nav").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".slider-for",
    dots: true,
    centerMode: true,
    focusOnSelect: true
  });
});
$(document).ready(function () {
  $(".autoplay-sliderr").slick({
    // slidesToShow: 5,
    // slidesToScroll: 1,
    // autoplay: true,
    // autoplaySpeed: 2000,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    adaptiveHeight: true,
    responsive: [{
      breakpoint: 1280,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true
      }
    }, {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 640,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });
});
$(document).ready(function () {
  $(".autoplay-evaluate").slick({
    // slidesToShow: 5,
    // slidesToScroll: 1,
    // autoplay: true,
    // autoplaySpeed: 2000,
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    responsive: [{
      breakpoint: 1280,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true
      }
    }, {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 640,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });
});
/***/ (() => {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\resources\\js\\slickside.js: Unexpected token (58:0)\n\n\u001b[0m \u001b[90m 56 |\u001b[39m     })\u001b[33m;\u001b[39m\n \u001b[90m 57 |\u001b[39m })\u001b[33m;\u001b[39m\n\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 58 |\u001b[39m \u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<\u001b[39m \u001b[33mHEAD\u001b[39m\n \u001b[90m    |\u001b[39m \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\n \u001b[90m 59 |\u001b[39m\n \u001b[90m 60 |\u001b[39m \u001b[33m===\u001b[39m\u001b[33m===\u001b[39m\u001b[33m=\u001b[39m\n \u001b[90m 61 |\u001b[39m \u001b[33m>>>\u001b[39m\u001b[33m>>>\u001b[39m\u001b[33m>\u001b[39m e6decab8deefc6df25261af37841e4165a144ec1\u001b[0m\n    at constructor (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:351:19)\n    at Parser.raise (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:3233:19)\n    at Parser.unexpected (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:3253:16)\n    at Parser.parseExprAtom (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:10952:16)\n    at Parser.parseExprSubscripts (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:10568:23)\n    at Parser.parseUpdate (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:10551:21)\n    at Parser.parseMaybeUnary (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:10529:23)\n    at Parser.parseMaybeUnaryOrPrivate (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:10383:61)\n    at Parser.parseExprOps (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:10388:23)\n    at Parser.parseMaybeConditional (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:10365:23)\n    at Parser.parseMaybeAssign (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:10326:21)\n    at Parser.parseExpressionBase (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:10280:23)\n    at C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:10276:39\n    at Parser.allowInAnd (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:11913:16)\n    at Parser.parseExpression (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:10276:17)\n    at Parser.parseStatementContent (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:12354:23)\n    at Parser.parseStatementLike (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:12221:17)\n    at Parser.parseModuleItem (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:12198:17)\n    at Parser.parseBlockOrModuleBlockBody (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:12778:36)\n    at Parser.parseBlockBody (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:12771:10)\n    at Parser.parseProgram (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:12098:10)\n    at Parser.parseTopLevel (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:12088:25)\n    at Parser.parse (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:13902:10)\n    at parse (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\parser\\lib\\index.js:13944:38)\n    at parser (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\core\\lib\\parser\\index.js:41:34)\n    at parser.next (<anonymous>)\n    at normalizeFile (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:64:37)\n    at normalizeFile.next (<anonymous>)\n    at run (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\core\\lib\\transformation\\index.js:21:50)\n    at run.next (<anonymous>)\n    at transform (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\core\\lib\\transform.js:22:33)\n    at transform.next (<anonymous>)\n    at step (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\gensync\\index.js:261:32)\n    at C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\gensync\\index.js:273:13\n    at async.call.result.err.err (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\gensync\\index.js:223:11)\n    at C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\gensync\\index.js:189:28\n    at C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\@babel\\core\\lib\\gensync-utils\\async.js:67:7\n    at C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\gensync\\index.js:113:33\n    at step (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\gensync\\index.js:287:14)\n    at C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\gensync\\index.js:273:13\n    at async.call.result.err.err (C:\\Users\\GitHub\\laravel\\DATN-BUILD-PC\\node_modules\\gensync\\index.js:223:11)");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module doesn't tell about it's top-level declarations so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/slickside.js"]();
/******/ 	
/******/ })()
;