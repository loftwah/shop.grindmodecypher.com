(window["__wcAdmin_webpackJsonp"] = window["__wcAdmin_webpackJsonp"] || []).push([[5],{

/***/ 606:
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ 625:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "InboxPanel", function() { return InboxPanel; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(0);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _inbox_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(606);
/* harmony import */ var _inbox_scss__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_inbox_scss__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _inbox_panel__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(547);
/* harmony import */ var _abbreviated_notifications_panel__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(256);


/**
 * Internal dependencies
 */



const InboxPanel = ({
  hasAbbreviatedNotifications,
  thingsToDoNextCount
}) => {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "woocommerce-notification-panels"
  }, hasAbbreviatedNotifications && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_abbreviated_notifications_panel__WEBPACK_IMPORTED_MODULE_3__[/* AbbreviatedNotificationsPanel */ "b"], {
    thingsToDoNextCount: thingsToDoNextCount
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_inbox_panel__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"], {
    showHeader: false
  }));
};
/* harmony default export */ __webpack_exports__["default"] = (InboxPanel);

/***/ })

}]);