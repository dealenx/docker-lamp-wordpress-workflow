/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		"app": 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	var jsonpArray = window["webpackJsonp"] = window["webpackJsonp"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push([0,"vendor"]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/main.js":
/*!*********************!*\
  !*** ./src/main.js ***!
  \*********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _scss_app_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scss/app.scss */ \"./src/scss/app.scss\");\n/* harmony import */ var _scss_app_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_scss_app_scss__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _modules_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules.js */ \"./src/modules.js\");\n\n\n\njQuery(document).ready(function () {\n  _modules_js__WEBPACK_IMPORTED_MODULE_1__[\"default\"].init();\n});\n\n//# sourceURL=webpack:///./src/main.js?");

/***/ }),

/***/ "./src/modules.js":
/*!************************!*\
  !*** ./src/modules.js ***!
  \************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ \"jquery\");\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _modules_slide_nav__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/slide-nav */ \"./src/modules/slide-nav.js\");\n/* harmony import */ var _modules_breadcrumbs__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/breadcrumbs */ \"./src/modules/breadcrumbs.js\");\n/* harmony import */ var _modules_search__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modules/search */ \"./src/modules/search.js\");\n\n\n\n\n\n\n/* harmony default export */ __webpack_exports__[\"default\"] = ((function () {\n  var init = function init() {\n    Object(_modules_slide_nav__WEBPACK_IMPORTED_MODULE_1__[\"init\"])(jquery__WEBPACK_IMPORTED_MODULE_0___default.a);\n    Object(_modules_breadcrumbs__WEBPACK_IMPORTED_MODULE_2__[\"init\"])(jquery__WEBPACK_IMPORTED_MODULE_0___default.a);\n    Object(_modules_search__WEBPACK_IMPORTED_MODULE_3__[\"init\"])(jquery__WEBPACK_IMPORTED_MODULE_0___default.a);\n  };\n  return {\n    init: init\n  };\n})());\n\n//# sourceURL=webpack:///./src/modules.js?");

/***/ }),

/***/ "./src/modules/breadcrumbs.js":
/*!************************************!*\
  !*** ./src/modules/breadcrumbs.js ***!
  \************************************/
/*! exports provided: init */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"init\", function() { return init; });\nvar init = function init($) {\n  var breadcrumbs = \"breadcrumbs\";\n\n  var switchBreadcrumbs = function switchBreadcrumbs() {\n    if ($(window).scrollTop() >= 50) {\n      $(\"#\" + breadcrumbs).addClass(\"scrolled\");\n    } else {\n      $(\"#\" + breadcrumbs).removeClass(\"scrolled\");\n    }\n  };\n\n  $(window).scroll(function () {\n    switchBreadcrumbs();\n  });\n\n  $(window).load(function () {\n    switchBreadcrumbs();\n  });\n};\n\n//# sourceURL=webpack:///./src/modules/breadcrumbs.js?");

/***/ }),

/***/ "./src/modules/search.js":
/*!*******************************!*\
  !*** ./src/modules/search.js ***!
  \*******************************/
/*! exports provided: init */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"init\", function() { return init; });\nvar init = function init($) {\n\n    var myOverlay = \"myOverlay\";\n    var searchForm = \"searchForm\";\n\n    $(\"#openSearch\").click(function (event //CHECK IF YOUR BUTTON IS PRESSED\n    ) {\n        $(\"#\" + myOverlay).fadeTo(\"fast\", 1);\n        $(\"#\" + myOverlay).addClass('visibled');\n        $(\"#s\").focus();\n    });\n\n    $(\"#closeSearch\").click(function (event //CHECK IF YOUR BUTTON IS PRESSED\n    ) {\n        $(\"#\" + myOverlay).fadeOut(\"fast\", 0);\n    });\n\n    $(document).click(function (e) {\n        if (e.target.id == 'myOverlay') {\n            $(\"#\" + myOverlay).fadeOut(\"fast\", 0);\n        }\n    });\n};\n\n//# sourceURL=webpack:///./src/modules/search.js?");

/***/ }),

/***/ "./src/modules/slide-nav.js":
/*!**********************************!*\
  !*** ./src/modules/slide-nav.js ***!
  \**********************************/
/*! exports provided: init */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"init\", function() { return init; });\n\nvar init = function init($) {\n  var hamburger = \"hamb\"; //THIS IS THE NAME OF YOUR HAMBURGER BUTTON\n\n  var slideNavName = \"slideDown\"; //THIS IS THE NAME OF YOUR HIDING NAVIGATION\n\n  var rectangleName = \"rect\"; //THIS IS THE NAME OF YOUR LITTLE HAMBURGER RECTANGLES, MINUS THE NUMBERS (SEE CSS COMMENTS)\n\n\n  //YOU MAY CHANGE ALL OF THESE IF YOU NEED TO (SEE CSS COMMENTS)\n  var showRect = \"showRect\";\n  var topRectX = \"topRectX\";\n  var hideRectX = \"hideRectX\";\n  var bottomRectX = \"bottomRectX\";\n  var topNav = \"topNav\";\n\n  var switchHamb = function switchHamb() {\n    $(\"#\" + rectangleName + \"1\").toggleClass(showRect + \" \" + topRectX);\n    $(\"#\" + rectangleName + \"2\").toggleClass(showRect + \" \" + hideRectX);\n    $(\"#\" + rectangleName + \"3\").toggleClass(showRect + \" \" + bottomRectX);\n  };\n\n  $(\"#\" + hamburger).click(function (event //CHECK IF YOUR BUTTON IS PRESSED\n  ) {\n    if ($(\"#\" + slideNavName).attr(\"class\") == \"hidden\") {\n      switchHamb();\n\n      //REVEAL YOUR NAVIGATION\n      $(\"#\" + slideNavName).toggleClass(\"hidden revealed\");\n    } else if ($(\"#\" + slideNavName).attr(\"class\") == \"revealed\") {\n      //CHECKS TO SEE IF YOUR MENU IS CURRENTLY OPEN\n      switchHamb();\n\n      //HIDE YOUR NAVIGATION\n      $(\"#\" + slideNavName).toggleClass(\"revealed hidden\");\n    }\n  });\n\n  $(\"#\" + hamburger).click(function (e) {\n    e.stopPropagation();\n  });\n\n  $(\"#\" + slideNavName).click(function (e) {\n    e.stopPropagation();\n  });\n\n  $(\"#\" + topNav).click(function (e) {\n    e.stopPropagation();\n  });\n\n  $(document).click(function () {\n    console.log(\"Click on document\");\n\n    if ($(\"#\" + slideNavName).attr(\"class\") == \"revealed\") {\n      //SEE IF YOUR NAV IS OPEN\n\n      switchHamb();\n\n      //HIDE YOUR NAVIGATION\n      $(\"#\" + slideNavName).toggleClass(\"revealed hidden\");\n    }\n  });\n\n  //BONUS!!! AN OPENED NAV DISSAPEARS WHEN SCROLLING!!\n\n  var hideNavigation = function hideNavigation() {\n    if ($(\"#\" + slideNavName).attr(\"class\") == \"revealed\") {\n      //SEE IF YOUR NAV IS OPEN\n      switchHamb();\n\n      //HIDE YOUR NAVIGATION\n      $(\"#\" + slideNavName).toggleClass(\"revealed hidden\");\n    }\n  };\n\n  $(window).scroll(function (event //AUTOMATICALLY HIDES THE NAV WHEN SCROLLING STARTS\n  ) {\n    hideNavigation();\n  });\n\n  $(window).resize(function () {\n    hideNavigation();\n  });\n};\n\n//# sourceURL=webpack:///./src/modules/slide-nav.js?");

/***/ }),

/***/ "./src/scss/app.scss":
/*!***************************!*\
  !*** ./src/scss/app.scss ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./src/scss/app.scss?");

/***/ }),

/***/ 0:
/*!******************************************!*\
  !*** multi babel-polyfill ./src/main.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! babel-polyfill */\"./node_modules/babel-polyfill/lib/index.js\");\nmodule.exports = __webpack_require__(/*! ./src/main.js */\"./src/main.js\");\n\n\n//# sourceURL=webpack:///multi_babel-polyfill_./src/main.js?");

/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = jQuery;\n\n//# sourceURL=webpack:///external_%22jQuery%22?");

/***/ })

/******/ });