(window["__wcAdmin_webpackJsonp"] = window["__wcAdmin_webpackJsonp"] || []).push([[7],{

/***/ 133:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/esm/defineProperty.js
var defineProperty = __webpack_require__(6);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js
var objectWithoutProperties = __webpack_require__(14);

// EXTERNAL MODULE: ./node_modules/classnames/index.js
var classnames = __webpack_require__(7);
var classnames_default = /*#__PURE__*/__webpack_require__.n(classnames);

// EXTERNAL MODULE: external {"this":["wp","element"]}
var external_this_wp_element_ = __webpack_require__(0);

// CONCATENATED MODULE: ./node_modules/@wordpress/components/build-module/visually-hidden/utils.js



/**
 * Utility Functions
 */

/**
 * renderAsRenderProps is used to wrap a component and convert
 * the passed property "as" either a string or component, to the
 * rendered tag if a string, or component.
 *
 * See VisuallyHidden hidden for example.
 *
 * @param {string|WPComponent} as A tag or component to render.
 * @return {WPComponent} The rendered component.
 */
function renderAsRenderProps(_ref) {
  var _ref$as = _ref.as,
      Component = _ref$as === void 0 ? 'div' : _ref$as,
      props = Object(objectWithoutProperties["a" /* default */])(_ref, ["as"]);

  if (typeof props.children === 'function') {
    return props.children(props);
  }

  return Object(external_this_wp_element_["createElement"])(Component, props);
}


//# sourceMappingURL=utils.js.map
// CONCATENATED MODULE: ./node_modules/@wordpress/components/build-module/visually-hidden/index.js



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(defineProperty["a" /* default */])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * External dependencies
 */

/**
 * Internal dependencies
 */


/**
 * VisuallyHidden component to render text out non-visually
 * for use in devices such as a screen reader.
 *
 * @param {Object}             props             Component props.
 * @param {string|WPComponent} [props.as="div"]  A tag or component to render.
 * @param {string}             [props.className] Class to set on the container.
 */

function VisuallyHidden(_ref) {
  var _ref$as = _ref.as,
      as = _ref$as === void 0 ? 'div' : _ref$as,
      className = _ref.className,
      props = Object(objectWithoutProperties["a" /* default */])(_ref, ["as", "className"]);

  return renderAsRenderProps(_objectSpread({
    as: as,
    className: classnames_default()('components-visually-hidden', className)
  }, props));
}

/* harmony default export */ var visually_hidden = __webpack_exports__["a"] = (VisuallyHidden);
//# sourceMappingURL=index.js.map

/***/ }),

/***/ 177:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(0);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(7);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _visually_hidden__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(133);


/**
 * External dependencies
 */

/**
 * Internal dependencies
 */



function BaseControl(_ref) {
  var id = _ref.id,
      label = _ref.label,
      hideLabelFromVision = _ref.hideLabelFromVision,
      help = _ref.help,
      className = _ref.className,
      children = _ref.children;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('components-base-control', className)
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "components-base-control__field"
  }, label && id && (hideLabelFromVision ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_visually_hidden__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"], {
    as: "label",
    htmlFor: id
  }, label) : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("label", {
    className: "components-base-control__label",
    htmlFor: id
  }, label)), label && !id && (hideLabelFromVision ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_visually_hidden__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"], {
    as: "label"
  }, label) : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(BaseControl.VisualLabel, null, label)), children), !!help && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", {
    id: id + '__help',
    className: "components-base-control__help"
  }, help));
}

BaseControl.VisualLabel = function (_ref2) {
  var className = _ref2.className,
      children = _ref2.children;
  className = classnames__WEBPACK_IMPORTED_MODULE_1___default()('components-base-control__label', className);
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
    className: className
  }, children);
};

/* harmony default export */ __webpack_exports__["a"] = (BaseControl);
//# sourceMappingURL=index.js.map

/***/ }),

/***/ 206:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return createNoticesFromResponse; });
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(19);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__);
/**
 * External dependencies
 */

function createNoticesFromResponse(response) {
  var _dispatch = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__["dispatch"])('core/notices'),
      createNotice = _dispatch.createNotice;

  if (response.error_data && response.errors && Object.keys(response.errors).length) {
    // Loop over multi-error responses.
    Object.keys(response.errors).forEach(function (errorKey) {
      createNotice('error', response.errors[errorKey].join(' '));
    });
  } else if (response.message) {
    // Handle generic messages.
    createNotice(response.code ? 'error' : 'success', response.message);
  }
}

/***/ }),

/***/ 730:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(6);
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(14);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(0);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * WordPress dependencies
 */
 // Disable reason: JSDoc linter doesn't seem to parse the union (`&`) correctly.

/* eslint-disable jsdoc/valid-types */

/** @typedef {{icon: JSX.Element, size?: number} & import('react').ComponentPropsWithoutRef<'SVG'>} IconProps */

/* eslint-enable jsdoc/valid-types */

/**
 * Return an SVG icon.
 *
 * @param {IconProps} props icon is the SVG component to render
 *                          size is a number specifiying the icon size in pixels
 *                          Other props will be passed to wrapped SVG component
 *
 * @return {JSX.Element}  Icon component
 */

function Icon(_ref) {
  var icon = _ref.icon,
      _ref$size = _ref.size,
      size = _ref$size === void 0 ? 24 : _ref$size,
      props = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"])(_ref, ["icon", "size"]);

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["cloneElement"])(icon, _objectSpread({
    width: size,
    height: size
  }, props));
}

/* harmony default export */ __webpack_exports__["a"] = (Icon);
//# sourceMappingURL=index.js.map

/***/ }),

/***/ 731:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXTERNAL MODULE: ./node_modules/@emotion/styled-base/dist/styled-base.browser.esm.js + 1 modules
var styled_base_browser_esm = __webpack_require__(269);

// CONCATENATED MODULE: ./node_modules/@babel/runtime/helpers/esm/taggedTemplateLiteral.js
function _taggedTemplateLiteral(strings, raw) {
  if (!raw) {
    raw = strings.slice(0);
  }

  return Object.freeze(Object.defineProperties(strings, {
    raw: {
      value: Object.freeze(raw)
    }
  }));
}
// CONCATENATED MODULE: ./node_modules/@wordpress/components/build-module/text/styles/font-family.js
var fontFamily = "font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto,\nOxygen-Sans, Ubuntu, Cantarell, \"Helvetica Neue\", sans-serif;";
//# sourceMappingURL=font-family.js.map
// EXTERNAL MODULE: ./node_modules/@emotion/core/dist/core.browser.esm.js + 5 modules
var core_browser_esm = __webpack_require__(155);

// CONCATENATED MODULE: ./node_modules/@wordpress/components/build-module/text/styles/emotion-css.js
/**
 * External dependencies
 */

/* harmony default export */ var emotion_css = (core_browser_esm["b" /* css */]);
//# sourceMappingURL=emotion-css.js.map
// CONCATENATED MODULE: ./node_modules/@wordpress/components/build-module/text/styles/text-mixins.js


function _templateObject9() {
  var data = _taggedTemplateLiteral(["\n\t", "\n\t", "\n"]);

  _templateObject9 = function _templateObject9() {
    return data;
  };

  return data;
}

function _templateObject8() {
  var data = _taggedTemplateLiteral(["\n\t\t\t\t", "\n\t\t\t\t", "\n\t\t\t"]);

  _templateObject8 = function _templateObject8() {
    return data;
  };

  return data;
}

function _templateObject7() {
  var data = _taggedTemplateLiteral(["\n\t\t\t\t", "\n\t\t\t\t", "\n\t\t\t"]);

  _templateObject7 = function _templateObject7() {
    return data;
  };

  return data;
}

function _templateObject6() {
  var data = _taggedTemplateLiteral(["\n\t\t\t\t", "\n\t\t\t"]);

  _templateObject6 = function _templateObject6() {
    return data;
  };

  return data;
}

function _templateObject5() {
  var data = _taggedTemplateLiteral(["\n\t\t\t\t", "\n\t\t\t\t", "\n\t\t\t"]);

  _templateObject5 = function _templateObject5() {
    return data;
  };

  return data;
}

function _templateObject4() {
  var data = _taggedTemplateLiteral(["\n\t\t\t\t", "\n\t\t\t\t", "\n\t\t\t"]);

  _templateObject4 = function _templateObject4() {
    return data;
  };

  return data;
}

function _templateObject3() {
  var data = _taggedTemplateLiteral(["\n\t\t\t\t", "\n\t\t\t\t", "\n\t\t\t"]);

  _templateObject3 = function _templateObject3() {
    return data;
  };

  return data;
}

function _templateObject2() {
  var data = _taggedTemplateLiteral(["\n\t\t\t\t", "\n\t\t\t\t", "\n\t\t\t"]);

  _templateObject2 = function _templateObject2() {
    return data;
  };

  return data;
}

function _templateObject() {
  var data = _taggedTemplateLiteral(["\n\t\t\t\t", "\n\t\t\t\t", "\n\t\t\t"]);

  _templateObject = function _templateObject() {
    return data;
  };

  return data;
}

/**
 * Internal dependencies
 */


var fontWeightNormal = "font-weight: 400;";
var fontWeightSemibold = "font-weight: 600;";
var title = "\n  ".concat(fontWeightNormal, "\n");
var titleLarge = "\n\tfont-size: 32px;\n\tline-height: 40px;\n";
var titleMedium = "\n\tfont-size: 24px;\n\tline-height: 32px;\n";
var titleSmall = "\n\tfont-size: 20px;\n\tline-height: 28px;\n";
var subtitle = "\n\t".concat(fontWeightSemibold, "\n\tfont-size: 14px;\n\tline-height: 20px;\n");
var subtitleLarge = "\n\tfont-size: 16px;\n\tline-height: 24px;\n";
var subtitleSmall = "\n\tfont-size: 14px;\n\tline-height: 20px;\n";
var body = "\n\t".concat(fontWeightNormal, "\n");
var bodyLarge = "\n\tfont-size: 16px;\n\tline-height: 24px;\n";
var bodySmall = "\n\tfont-size: 14px;\n\tline-height: 20px;\n";
var text_mixins_button = "\n  ".concat(fontWeightSemibold, "\n  font-size: 14px;\n  line-height: 20px;\n");
var caption = "\n\t".concat(fontWeightNormal, "\n\tfont-size: 12px;\n\tline-height: 16px;\n");
var label = "\n\t".concat(fontWeightSemibold, "\n\tfont-size: 12px;\n\tline-height: 16px;\n");
/**
 * @typedef {'title.large'|'title.medium'|'title.small'|'subtitle'|'subtitle.small'|'body'|'body.large'|'body.small'|'button'|'caption'|'label'} TextVariant
 */

/**
 * @param {TextVariant} variantName
 */

var text_mixins_variant = function variant() {
  var variantName = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'body';

  switch (variantName) {
    case 'title.large':
      return emotion_css(_templateObject(), title, titleLarge);

    case 'title.medium':
      return emotion_css(_templateObject2(), title, titleMedium);

    case 'title.small':
      return emotion_css(_templateObject3(), title, titleSmall);

    case 'subtitle':
      return emotion_css(_templateObject4(), subtitle, subtitleLarge);

    case 'subtitle.small':
      return emotion_css(_templateObject5(), subtitle, subtitleSmall);

    case 'body':
      return emotion_css(_templateObject6(), body);

    case 'body.large':
      return emotion_css(_templateObject7(), body, bodyLarge);

    case 'body.small':
      return emotion_css(_templateObject8(), body, bodySmall);

    case 'button':
      return text_mixins_button;

    case 'caption':
      return caption;

    case 'label':
      return label;
  }
};
/**
 * @typedef {Object} TextProps
 * @property {TextVariant} variant one of TextVariant to be used
 */

/**
 * @param {TextProps} props
 */


var text_mixins_text = function text(props) {
  return emotion_css(_templateObject9(), fontFamily, text_mixins_variant(props.variant));
};
//# sourceMappingURL=text-mixins.js.map
// CONCATENATED MODULE: ./node_modules/@wordpress/components/build-module/text/index.js


/**
 * Internal dependencies
 */


var Text = Object(styled_base_browser_esm["a" /* default */])("p", {
  target: "e15wbhsk0",
  label: "Text"
})("\n\tbox-sizing: border-box;\n\tmargin: 0;\n", text_mixins_text,  true ? "" : undefined);

/* harmony default export */ var build_module_text = __webpack_exports__["a"] = (Text);
//# sourceMappingURL=index.js.map

/***/ }),

/***/ 737:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(0);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(37);


/**
 * WordPress dependencies
 */

var chevronRight = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__[/* SVG */ "b"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__[/* Path */ "a"], {
  d: "M10.6 6L9.4 7l4.6 5-4.6 5 1.2 1 5.4-6z"
}));
/* harmony default export */ __webpack_exports__["a"] = (chevronRight);
//# sourceMappingURL=chevron-right.js.map

/***/ }),

/***/ 778:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXPORTS
__webpack_require__.d(__webpack_exports__, "a", function() { return /* binding */ CheckboxControl; });

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/esm/extends.js
var esm_extends = __webpack_require__(12);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js
var objectWithoutProperties = __webpack_require__(14);

// EXTERNAL MODULE: external {"this":["wp","element"]}
var external_this_wp_element_ = __webpack_require__(0);

// EXTERNAL MODULE: ./node_modules/@wordpress/compose/build-module/hooks/use-instance-id/index.js
var use_instance_id = __webpack_require__(112);

// EXTERNAL MODULE: ./node_modules/@wordpress/components/node_modules/@wordpress/icons/build-module/icon/index.js
var icon = __webpack_require__(730);

// EXTERNAL MODULE: ./node_modules/@wordpress/primitives/build-module/svg/index.js
var svg = __webpack_require__(37);

// CONCATENATED MODULE: ./node_modules/@wordpress/components/node_modules/@wordpress/icons/build-module/library/check.js


/**
 * WordPress dependencies
 */

var check = Object(external_this_wp_element_["createElement"])(svg["b" /* SVG */], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, Object(external_this_wp_element_["createElement"])(svg["a" /* Path */], {
  d: "M9 18.6L3.5 13l1-1L9 16.4l9.5-9.9 1 1z"
}));
/* harmony default export */ var library_check = (check);
//# sourceMappingURL=check.js.map
// EXTERNAL MODULE: ./node_modules/@wordpress/components/build-module/base-control/index.js
var base_control = __webpack_require__(177);

// CONCATENATED MODULE: ./node_modules/@wordpress/components/build-module/checkbox-control/index.js




/**
 * WordPress dependencies
 */


/**
 * Internal dependencies
 */


function CheckboxControl(_ref) {
  var label = _ref.label,
      className = _ref.className,
      heading = _ref.heading,
      checked = _ref.checked,
      help = _ref.help,
      onChange = _ref.onChange,
      props = Object(objectWithoutProperties["a" /* default */])(_ref, ["label", "className", "heading", "checked", "help", "onChange"]);

  var instanceId = Object(use_instance_id["a" /* default */])(CheckboxControl);
  var id = "inspector-checkbox-control-".concat(instanceId);

  var onChangeValue = function onChangeValue(event) {
    return onChange(event.target.checked);
  };

  return Object(external_this_wp_element_["createElement"])(base_control["a" /* default */], {
    label: heading,
    id: id,
    help: help,
    className: className
  }, Object(external_this_wp_element_["createElement"])("span", {
    className: "components-checkbox-control__input-container"
  }, Object(external_this_wp_element_["createElement"])("input", Object(esm_extends["a" /* default */])({
    id: id,
    className: "components-checkbox-control__input",
    type: "checkbox",
    value: "1",
    onChange: onChangeValue,
    checked: checked,
    "aria-describedby": !!help ? id + '__help' : undefined
  }, props)), checked ? Object(external_this_wp_element_["createElement"])(icon["a" /* default */], {
    icon: library_check,
    className: "components-checkbox-control__checked",
    role: "presentation"
  }) : null), Object(external_this_wp_element_["createElement"])("label", {
    className: "components-checkbox-control__label",
    htmlFor: id
  }, label));
}
//# sourceMappingURL=index.js.map

/***/ }),

/***/ 791:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXPORTS
__webpack_require__.d(__webpack_exports__, "b", function() { return /* binding */ installActivateAndConnectWcpay; });
__webpack_require__.d(__webpack_exports__, "a", function() { return /* binding */ getPaymentMethods; });

// EXTERNAL MODULE: external {"this":["wp","element"]}
var external_this_wp_element_ = __webpack_require__(0);

// EXTERNAL MODULE: external {"this":["wp","i18n"]}
var external_this_wp_i18n_ = __webpack_require__(3);

// EXTERNAL MODULE: external {"this":["wp","apiFetch"]}
var external_this_wp_apiFetch_ = __webpack_require__(22);
var external_this_wp_apiFetch_default = /*#__PURE__*/__webpack_require__.n(external_this_wp_apiFetch_);

// EXTERNAL MODULE: external "lodash"
var external_lodash_ = __webpack_require__(2);

// EXTERNAL MODULE: ./node_modules/interpolate-components/lib/index.js
var lib = __webpack_require__(36);
var lib_default = /*#__PURE__*/__webpack_require__.n(lib);

// EXTERNAL MODULE: ./client/settings/index.js
var client_settings = __webpack_require__(20);

// EXTERNAL MODULE: external {"this":["wc","components"]}
var external_this_wc_components_ = __webpack_require__(55);

// EXTERNAL MODULE: ./client/wc-api/constants.js
var constants = __webpack_require__(30);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/extends.js
var helpers_extends = __webpack_require__(78);
var extends_default = /*#__PURE__*/__webpack_require__.n(helpers_extends);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/asyncToGenerator.js
var asyncToGenerator = __webpack_require__(54);
var asyncToGenerator_default = /*#__PURE__*/__webpack_require__.n(asyncToGenerator);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/classCallCheck.js
var classCallCheck = __webpack_require__(42);
var classCallCheck_default = /*#__PURE__*/__webpack_require__.n(classCallCheck);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/createClass.js
var createClass = __webpack_require__(41);
var createClass_default = /*#__PURE__*/__webpack_require__.n(createClass);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/inherits.js
var inherits = __webpack_require__(43);
var inherits_default = /*#__PURE__*/__webpack_require__.n(inherits);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js
var possibleConstructorReturn = __webpack_require__(47);
var possibleConstructorReturn_default = /*#__PURE__*/__webpack_require__.n(possibleConstructorReturn);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/getPrototypeOf.js
var getPrototypeOf = __webpack_require__(28);
var getPrototypeOf_default = /*#__PURE__*/__webpack_require__.n(getPrototypeOf);

// EXTERNAL MODULE: ./node_modules/@wordpress/components/build-module/button/index.js
var build_module_button = __webpack_require__(69);

// EXTERNAL MODULE: ./node_modules/@wordpress/compose/build-module/higher-order/compose.js
var compose = __webpack_require__(175);

// EXTERNAL MODULE: external {"this":["wp","data"]}
var external_this_wp_data_ = __webpack_require__(19);

// EXTERNAL MODULE: external {"this":["wc","data"]}
var external_this_wc_data_ = __webpack_require__(48);

// CONCATENATED MODULE: ./client/task-list/tasks/payments/bacs.js









function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

/**
 * External dependencies
 */





/**
 * WooCommerce dependencies
 */




var bacs_PayFast = /*#__PURE__*/function (_Component) {
  inherits_default()(PayFast, _Component);

  var _super = _createSuper(PayFast);

  function PayFast() {
    var _temp, _this;

    classCallCheck_default()(this, PayFast);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    return possibleConstructorReturn_default()(_this, (_temp = _this = _super.call.apply(_super, [this].concat(args)), _this.getInitialConfigValues = function () {
      return {
        account_name: '',
        account_number: '',
        bank_name: '',
        sort_code: '',
        iban: '',
        bic: ''
      };
    }, _this.validate = function (values) {
      var errors = {};

      if (!values.account_number && !values.iban) {
        errors.account_number = errors.iban = Object(external_this_wp_i18n_["__"])('Please enter an account number or IBAN', 'woocommerce-admin');
      }

      return errors;
    }, _this.updateSettings = /*#__PURE__*/function () {
      var _ref = asyncToGenerator_default()( /*#__PURE__*/regeneratorRuntime.mark(function _callee(values) {
        var _this$props, updateOptions, createNotice, markConfigured, update;

        return regeneratorRuntime.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _this$props = _this.props, updateOptions = _this$props.updateOptions, createNotice = _this$props.createNotice, markConfigured = _this$props.markConfigured;
                _context.next = 3;
                return updateOptions({
                  woocommerce_bacs_settings: {
                    enabled: 'yes'
                  },
                  woocommerce_bacs_accounts: [values]
                });

              case 3:
                update = _context.sent;

                if (update.success) {
                  markConfigured('bacs');
                  createNotice('success', Object(external_this_wp_i18n_["__"])('Direct bank transfer details added successfully', 'woocommerce-admin'));
                } else {
                  createNotice('error', Object(external_this_wp_i18n_["__"])('There was a problem saving your payment setings', 'woocommerce-admin'));
                }

              case 5:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }));

      return function (_x) {
        return _ref.apply(this, arguments);
      };
    }(), _temp));
  }

  createClass_default()(PayFast, [{
    key: "render",
    value: function render() {
      var isOptionsRequesting = this.props.isOptionsRequesting;
      return Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Form"], {
        initialValues: this.getInitialConfigValues(),
        onSubmitCallback: this.updateSettings,
        validate: this.validate
      }, function (_ref2) {
        var getInputProps = _ref2.getInputProps,
            handleSubmit = _ref2.handleSubmit;
        return Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_element_["createElement"])(external_this_wc_components_["H"], null, Object(external_this_wp_i18n_["__"])('Add your bank details', 'woocommerce-admin')), Object(external_this_wp_element_["createElement"])("p", null, Object(external_this_wp_i18n_["__"])('These details are required to receive payments via bank transfer', 'woocommerce-admin')), Object(external_this_wp_element_["createElement"])("div", {
          className: "woocommerce-task-payment-method__fields"
        }, Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('Account name', 'woocommerce-admin'),
          required: true
        }, getInputProps('account_name'))), Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('Account number', 'woocommerce-admin'),
          required: true
        }, getInputProps('account_number'))), Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('Bank name', 'woocommerce-admin'),
          required: true
        }, getInputProps('bank_name'))), Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('Sort code', 'woocommerce-admin'),
          required: true
        }, getInputProps('sort_code'))), Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('IBAN', 'woocommerce-admin'),
          required: true
        }, getInputProps('iban'))), Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('BIC / Swift', 'woocommerce-admin'),
          required: true
        }, getInputProps('bic')))), Object(external_this_wp_element_["createElement"])(build_module_button["a" /* default */], {
          isPrimary: true,
          isBusy: isOptionsRequesting,
          onClick: handleSubmit
        }, Object(external_this_wp_i18n_["__"])('Save', 'woocommerce-admin')));
      });
    }
  }]);

  return PayFast;
}(external_this_wp_element_["Component"]);

/* harmony default export */ var bacs = (Object(compose["a" /* default */])(Object(external_this_wp_data_["withSelect"])(function (select) {
  var _select = select(external_this_wc_data_["OPTIONS_STORE_NAME"]),
      isOptionsUpdating = _select.isOptionsUpdating;

  var isOptionsRequesting = isOptionsUpdating();
  return {
    isOptionsRequesting: isOptionsRequesting
  };
}), Object(external_this_wp_data_["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/notices'),
      createNotice = _dispatch.createNotice;

  var _dispatch2 = dispatch(external_this_wc_data_["OPTIONS_STORE_NAME"]),
      updateOptions = _dispatch2.updateOptions;

  return {
    createNotice: createNotice,
    updateOptions: updateOptions
  };
}))(bacs_PayFast));
// CONCATENATED MODULE: ./client/task-list/tasks/payments/images/bacs.js

/* harmony default export */ var images_bacs = (function () {
  return Object(external_this_wp_element_["createElement"])("svg", {
    width: "96",
    height: "32",
    viewBox: "0 0 96 32",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, Object(external_this_wp_element_["createElement"])("rect", {
    width: "32",
    height: "32",
    rx: "16",
    fill: "#8E9196"
  }), Object(external_this_wp_element_["createElement"])("mask", {
    id: "bacs0",
    "mask-type": "alpha",
    maskUnits: "userSpaceOnUse",
    x: "8",
    y: "8",
    width: "16",
    height: "16"
  }, Object(external_this_wp_element_["createElement"])("path", {
    fillRule: "evenodd",
    clipRule: "evenodd",
    d: "M8.875 12.25L16 8.5L23.125 12.25V13.75H8.875V12.25ZM16 10.195L19.9075 12.25H12.0925L16 10.195ZM10.75 15.25H12.25V20.5H10.75V15.25ZM15.25 20.5V15.25H16.75V20.5H15.25ZM23.125 23.5V22H8.875V23.5H23.125ZM19.75 15.25H21.25V20.5H19.75V15.25Z",
    fill: "white"
  })), Object(external_this_wp_element_["createElement"])("g", {
    mask: "url(#bacs0)"
  }, Object(external_this_wp_element_["createElement"])("rect", {
    x: "7",
    y: "7",
    width: "18",
    height: "18",
    fill: "white"
  })), Object(external_this_wp_element_["createElement"])("mask", {
    id: "bacs1",
    "mask-type": "alpha",
    maskUnits: "userSpaceOnUse",
    x: "39",
    y: "10",
    width: "18",
    height: "12"
  }, Object(external_this_wp_element_["createElement"])("path", {
    d: "M39 17L53.17 17L49.59 20.59L51 22L57 16L51 10L49.59 11.41L53.17 15L39 15L39 17Z",
    fill: "white"
  })), Object(external_this_wp_element_["createElement"])("g", {
    mask: "url(#bacs1)"
  }, Object(external_this_wp_element_["createElement"])("rect", {
    x: "60",
    y: "28",
    width: "24",
    height: "24",
    transform: "rotate(-180 60 28)",
    fill: "#8E9196"
  })), Object(external_this_wp_element_["createElement"])("rect", {
    x: "64",
    width: "32",
    height: "32",
    rx: "16",
    fill: "#8E9196"
  }), Object(external_this_wp_element_["createElement"])("mask", {
    id: "bacs2",
    "mask-type": "alpha",
    maskUnits: "userSpaceOnUse",
    x: "72",
    y: "8",
    width: "16",
    height: "16"
  }, Object(external_this_wp_element_["createElement"])("path", {
    fillRule: "evenodd",
    clipRule: "evenodd",
    d: "M72.875 12.25L80 8.5L87.125 12.25V13.75H72.875V12.25ZM80 10.195L83.9075 12.25H76.0925L80 10.195ZM74.75 15.25H76.25V20.5H74.75V15.25ZM79.25 20.5V15.25H80.75V20.5H79.25ZM87.125 23.5V22H72.875V23.5H87.125ZM83.75 15.25H85.25V20.5H83.75V15.25Z",
    fill: "white"
  })), Object(external_this_wp_element_["createElement"])("g", {
    mask: "url(#bacs2)"
  }, Object(external_this_wp_element_["createElement"])("rect", {
    x: "71",
    y: "7",
    width: "18",
    height: "18",
    fill: "white"
  })));
});
// CONCATENATED MODULE: ./client/task-list/tasks/payments/images/cod.js

/* harmony default export */ var cod = (function () {
  return Object(external_this_wp_element_["createElement"])("svg", {
    width: "96",
    height: "32",
    viewBox: "0 0 96 32",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, Object(external_this_wp_element_["createElement"])("rect", {
    width: "32",
    height: "32",
    rx: "16",
    fill: "#8E9196"
  }), Object(external_this_wp_element_["createElement"])("mask", {
    id: "cod-mask-0",
    "mask-type": "alpha",
    maskUnits: "userSpaceOnUse",
    x: "7",
    y: "10",
    width: "18",
    height: "12"
  }, Object(external_this_wp_element_["createElement"])("path", {
    fillRule: "evenodd",
    clipRule: "evenodd",
    d: "M22 13H19.75V10H9.25C8.425 10 7.75 10.675 7.75 11.5V19.75H9.25C9.25 20.995 10.255 22 11.5 22C12.745 22 13.75 20.995 13.75 19.75H18.25C18.25 20.995 19.255 22 20.5 22C21.745 22 22.75 20.995 22.75 19.75H24.25V16L22 13ZM21.625 14.125L23.095 16H19.75V14.125H21.625ZM10.75 19.75C10.75 20.1625 11.0875 20.5 11.5 20.5C11.9125 20.5 12.25 20.1625 12.25 19.75C12.25 19.3375 11.9125 19 11.5 19C11.0875 19 10.75 19.3375 10.75 19.75ZM13.165 18.25C12.7525 17.7925 12.1675 17.5 11.5 17.5C10.8325 17.5 10.2475 17.7925 9.835 18.25H9.25V11.5H18.25V18.25H13.165ZM19.75 19.75C19.75 20.1625 20.0875 20.5 20.5 20.5C20.9125 20.5 21.25 20.1625 21.25 19.75C21.25 19.3375 20.9125 19 20.5 19C20.0875 19 19.75 19.3375 19.75 19.75Z",
    fill: "white"
  })), Object(external_this_wp_element_["createElement"])("g", {
    mask: "url(#cod-mask-0)"
  }, Object(external_this_wp_element_["createElement"])("rect", {
    x: "7",
    y: "7",
    width: "18",
    height: "18",
    fill: "white"
  })), Object(external_this_wp_element_["createElement"])("mask", {
    id: "cod-mask-1",
    "mask-type": "alpha",
    maskUnits: "userSpaceOnUse",
    x: "39",
    y: "10",
    width: "18",
    height: "12"
  }, Object(external_this_wp_element_["createElement"])("path", {
    d: "M39 17L53.17 17L49.59 20.59L51 22L57 16L51 10L49.59 11.41L53.17 15L39 15L39 17Z",
    fill: "white"
  })), Object(external_this_wp_element_["createElement"])("g", {
    mask: "url(#cod-mask-1)"
  }, Object(external_this_wp_element_["createElement"])("rect", {
    x: "60",
    y: "28",
    width: "24",
    height: "24",
    transform: "rotate(-180 60 28)",
    fill: "#8E9196"
  })), Object(external_this_wp_element_["createElement"])("rect", {
    x: "64",
    width: "32",
    height: "32",
    rx: "16",
    fill: "#8E9196"
  }), Object(external_this_wp_element_["createElement"])("mask", {
    id: "cod-mask-2",
    "mask-type": "alpha",
    maskUnits: "userSpaceOnUse",
    x: "76",
    y: "9",
    width: "8",
    height: "14"
  }, Object(external_this_wp_element_["createElement"])("path", {
    d: "M80.2926 15.175C78.5901 14.7325 78.0426 14.275 78.0426 13.5625C78.0426 12.745 78.8001 12.175 80.0676 12.175C81.4026 12.175 81.8976 12.8125 81.9426 13.75H83.6001C83.5476 12.46 82.7601 11.275 81.1926 10.8925V9.25H78.9426V10.87C77.4876 11.185 76.3176 12.13 76.3176 13.5775C76.3176 15.31 77.7501 16.1725 79.8426 16.675C81.7176 17.125 82.0926 17.785 82.0926 18.4825C82.0926 19 81.7251 19.825 80.0676 19.825C78.5226 19.825 77.9151 19.135 77.8326 18.25H76.1826C76.2726 19.8925 77.5026 20.815 78.9426 21.1225V22.75H81.1926V21.1375C82.6551 20.86 83.8176 20.0125 83.8176 18.475C83.8176 16.345 81.9951 15.6175 80.2926 15.175Z",
    fill: "white"
  })), Object(external_this_wp_element_["createElement"])("g", {
    mask: "url(#cod-mask-2)"
  }, Object(external_this_wp_element_["createElement"])("rect", {
    x: "71",
    y: "7",
    width: "18",
    height: "18",
    fill: "white"
  })));
});
// EXTERNAL MODULE: ./client/lib/notices/index.js
var notices = __webpack_require__(206);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/defineProperty.js
var defineProperty = __webpack_require__(17);
var defineProperty_default = /*#__PURE__*/__webpack_require__.n(defineProperty);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/assertThisInitialized.js
var assertThisInitialized = __webpack_require__(65);
var assertThisInitialized_default = /*#__PURE__*/__webpack_require__.n(assertThisInitialized);

// EXTERNAL MODULE: external {"this":["wc","navigation"]}
var external_this_wc_navigation_ = __webpack_require__(23);

// CONCATENATED MODULE: ./client/task-list/tasks/payments/stripe.js











function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { defineProperty_default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function stripe_createSuper(Derived) { var hasNativeReflectConstruct = stripe_isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }

function stripe_isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

/**
 * External dependencies
 */







/**
 * WooCommerce dependencies
 */







var stripe_Stripe = /*#__PURE__*/function (_Component) {
  inherits_default()(Stripe, _Component);

  var _super = stripe_createSuper(Stripe);

  function Stripe(props) {
    var _this;

    classCallCheck_default()(this, Stripe);

    _this = _super.call(this, props);
    _this.state = {
      oAuthConnectFailed: false,
      connectURL: null,
      isPending: false
    };
    _this.updateSettings = _this.updateSettings.bind(assertThisInitialized_default()(_this));
    return _this;
  }

  createClass_default()(Stripe, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      var stripeSettings = this.props.stripeSettings;
      var query = Object(external_this_wc_navigation_["getQuery"])(); // Handle redirect back from Stripe.

      if (query['stripe-connect'] && query['stripe-connect'] === '1') {
        var isStripeConnected = stripeSettings.publishable_key && stripeSettings.secret_key;

        if (isStripeConnected) {
          this.completeMethod();
          return;
        }
      }

      if (!this.requiresManualConfig()) {
        this.fetchOAuthConnectURL();
      }
    }
  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate(prevProps) {
      var activePlugins = this.props.activePlugins;

      if (!prevProps.activePlugins.includes('woocommerce-gateway-stripe') && activePlugins.includes('woocommerce-gateway-stripe')) {
        this.fetchOAuthConnectURL();
      }
    }
  }, {
    key: "requiresManualConfig",
    value: function requiresManualConfig() {
      var _this$props = this.props,
          activePlugins = _this$props.activePlugins,
          isJetpackConnected = _this$props.isJetpackConnected;
      var oAuthConnectFailed = this.state.oAuthConnectFailed;
      return !isJetpackConnected || !activePlugins.includes('woocommerce-services') || oAuthConnectFailed;
    }
  }, {
    key: "completeMethod",
    value: function completeMethod() {
      var _this$props2 = this.props,
          createNotice = _this$props2.createNotice,
          markConfigured = _this$props2.markConfigured;
      this.setState({
        isPending: false
      });
      createNotice('success', Object(external_this_wp_i18n_["__"])('Stripe connected successfully.', 'woocommerce-admin'));
      markConfigured('stripe');
    }
  }, {
    key: "fetchOAuthConnectURL",
    value: function () {
      var _fetchOAuthConnectURL = asyncToGenerator_default()( /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
        var activePlugins, result;
        return regeneratorRuntime.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                activePlugins = this.props.activePlugins;

                if (activePlugins.includes('woocommerce-gateway-stripe')) {
                  _context.next = 3;
                  break;
                }

                return _context.abrupt("return");

              case 3:
                _context.prev = 3;
                this.setState({
                  isPending: true
                });
                _context.next = 7;
                return external_this_wp_apiFetch_default()({
                  path: constants["e" /* WCS_NAMESPACE */] + '/connect/stripe/oauth/init',
                  method: 'POST',
                  data: {
                    returnUrl: Object(client_settings["f" /* getAdminLink */])('admin.php?page=wc-admin&task=payments&method=stripe&stripe-connect=1')
                  }
                });

              case 7:
                result = _context.sent;

                if (!(!result || !result.oauthUrl)) {
                  _context.next = 11;
                  break;
                }

                this.setState({
                  oAuthConnectFailed: true,
                  isPending: false
                });
                return _context.abrupt("return");

              case 11:
                this.setState({
                  connectURL: result.oauthUrl,
                  isPending: false
                });
                _context.next = 17;
                break;

              case 14:
                _context.prev = 14;
                _context.t0 = _context["catch"](3);
                this.setState({
                  oAuthConnectFailed: true,
                  isPending: false
                });

              case 17:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this, [[3, 14]]);
      }));

      function fetchOAuthConnectURL() {
        return _fetchOAuthConnectURL.apply(this, arguments);
      }

      return fetchOAuthConnectURL;
    }()
  }, {
    key: "renderConnectButton",
    value: function renderConnectButton() {
      var connectURL = this.state.connectURL;
      return Object(external_this_wp_element_["createElement"])(build_module_button["a" /* default */], {
        isPrimary: true,
        href: connectURL
      }, Object(external_this_wp_i18n_["__"])('Connect', 'woocommerce-admin'));
    }
  }, {
    key: "updateSettings",
    value: function () {
      var _updateSettings = asyncToGenerator_default()( /*#__PURE__*/regeneratorRuntime.mark(function _callee2(values) {
        var _this$props3, updateOptions, stripeSettings, createNotice, update;

        return regeneratorRuntime.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _this$props3 = this.props, updateOptions = _this$props3.updateOptions, stripeSettings = _this$props3.stripeSettings, createNotice = _this$props3.createNotice;
                _context2.next = 3;
                return updateOptions({
                  woocommerce_stripe_settings: _objectSpread(_objectSpread({}, stripeSettings), {}, {
                    publishable_key: values.publishable_key,
                    secret_key: values.secret_key,
                    enabled: 'yes'
                  })
                });

              case 3:
                update = _context2.sent;

                if (update.success) {
                  this.completeMethod();
                } else {
                  createNotice('error', Object(external_this_wp_i18n_["__"])('There was a problem saving your payment setings', 'woocommerce-admin'));
                }

              case 5:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, this);
      }));

      function updateSettings(_x) {
        return _updateSettings.apply(this, arguments);
      }

      return updateSettings;
    }()
  }, {
    key: "getInitialConfigValues",
    value: function getInitialConfigValues() {
      return {
        publishable_key: '',
        secret_key: ''
      };
    }
  }, {
    key: "validateManualConfig",
    value: function validateManualConfig(values) {
      var errors = {};

      if (values.publishable_key.match(/^pk_live_/) === null) {
        errors.publishable_key = Object(external_this_wp_i18n_["__"])('Please enter a valid publishable key. Valid keys start with "pk_live".', 'woocommerce-admin');
      }

      if (values.secret_key.match(/^[rs]k_live_/) === null) {
        errors.secret_key = Object(external_this_wp_i18n_["__"])('Please enter a valid secret key. Valid keys start with "sk_live" or "rk_live".', 'woocommerce-admin');
      }

      return errors;
    }
  }, {
    key: "renderManualConfig",
    value: function renderManualConfig() {
      var isOptionsUpdating = this.props.isOptionsUpdating;
      var stripeHelp = lib_default()({
        mixedString: Object(external_this_wp_i18n_["__"])('Your API details can be obtained from your {{docsLink}}Stripe account{{/docsLink}}.  Don’t have a Stripe account? {{registerLink}}Create one.{{/registerLink}}', 'woocommerce-admin'),
        components: {
          docsLink: Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Link"], {
            href: "https://stripe.com/docs/keys",
            target: "_blank",
            type: "external"
          }),
          registerLink: Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Link"], {
            href: "https://dashboard.stripe.com/register",
            target: "_blank",
            type: "external"
          })
        }
      });
      return Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Form"], {
        initialValues: this.getInitialConfigValues(),
        onSubmitCallback: this.updateSettings,
        validate: this.validateManualConfig
      }, function (_ref) {
        var getInputProps = _ref.getInputProps,
            handleSubmit = _ref.handleSubmit;
        return Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('Live Publishable Key', 'woocommerce-admin'),
          required: true
        }, getInputProps('publishable_key'))), Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('Live Secret Key', 'woocommerce-admin'),
          required: true
        }, getInputProps('secret_key'))), Object(external_this_wp_element_["createElement"])(build_module_button["a" /* default */], {
          isPrimary: true,
          isBusy: isOptionsUpdating,
          onClick: handleSubmit
        }, Object(external_this_wp_i18n_["__"])('Proceed', 'woocommerce-admin')), Object(external_this_wp_element_["createElement"])("p", null, stripeHelp));
      });
    }
  }, {
    key: "getConnectStep",
    value: function getConnectStep() {
      var _this$state = this.state,
          connectURL = _this$state.connectURL,
          isPending = _this$state.isPending,
          oAuthConnectFailed = _this$state.oAuthConnectFailed;
      var connectStep = {
        key: 'connect',
        label: Object(external_this_wp_i18n_["__"])('Connect your Stripe account', 'woocommerce-admin')
      };

      if (isPending) {
        return connectStep;
      }

      if (!oAuthConnectFailed && connectURL) {
        return _objectSpread(_objectSpread({}, connectStep), {}, {
          description: Object(external_this_wp_i18n_["__"])('A Stripe account is required to process payments.', 'woocommerce-admin'),
          content: this.renderConnectButton()
        });
      }

      return _objectSpread(_objectSpread({}, connectStep), {}, {
        description: Object(external_this_wp_i18n_["__"])('Connect your store to your Stripe account. Don’t have a Stripe account? Create one.', 'woocommerce-admin'),
        content: this.renderManualConfig()
      });
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props4 = this.props,
          installStep = _this$props4.installStep,
          isOptionsUpdating = _this$props4.isOptionsUpdating;
      var isPending = this.state.isPending;
      return Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Stepper"], {
        isVertical: true,
        isPending: !installStep.isComplete || isOptionsUpdating || isPending,
        currentStep: installStep.isComplete ? 'connect' : 'install',
        steps: [installStep, this.getConnectStep()]
      });
    }
  }]);

  return Stripe;
}(external_this_wp_element_["Component"]);

/* harmony default export */ var stripe = (Object(compose["a" /* default */])(Object(external_this_wp_data_["withSelect"])(function (select) {
  var _select = select(external_this_wc_data_["OPTIONS_STORE_NAME"]),
      getOption = _select.getOption,
      isOptionsUpdating = _select.isOptionsUpdating;

  var _select2 = select(external_this_wc_data_["PLUGINS_STORE_NAME"]),
      getActivePlugins = _select2.getActivePlugins,
      isJetpackConnected = _select2.isJetpackConnected;

  return {
    activePlugins: getActivePlugins(),
    isJetpackConnected: isJetpackConnected(),
    isOptionsUpdating: isOptionsUpdating(),
    stripeSettings: getOption('woocommerce_stripe_settings') || []
  };
}), Object(external_this_wp_data_["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/notices'),
      createNotice = _dispatch.createNotice;

  var _dispatch2 = dispatch(external_this_wc_data_["OPTIONS_STORE_NAME"]),
      updateOptions = _dispatch2.updateOptions;

  return {
    createNotice: createNotice,
    updateOptions: updateOptions
  };
}))(stripe_Stripe));
// CONCATENATED MODULE: ./client/task-list/tasks/payments/square.js










function square_ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function square_objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { square_ownKeys(Object(source), true).forEach(function (key) { defineProperty_default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { square_ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function square_createSuper(Derived) { var hasNativeReflectConstruct = square_isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }

function square_isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

/**
 * External dependencies
 */






/**
 * WooCommerce dependencies
 */







var square_Square = /*#__PURE__*/function (_Component) {
  inherits_default()(Square, _Component);

  var _super = square_createSuper(Square);

  function Square(props) {
    var _this;

    classCallCheck_default()(this, Square);

    _this = _super.call(this, props);
    _this.state = {
      isPending: false
    };
    _this.connect = _this.connect.bind(assertThisInitialized_default()(_this));
    return _this;
  }

  createClass_default()(Square, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      var _this$props = this.props,
          createNotice = _this$props.createNotice,
          markConfigured = _this$props.markConfigured;
      var query = Object(external_this_wc_navigation_["getQuery"])(); // Handle redirect back from Square

      if (query['square-connect']) {
        if (query['square-connect'] === '1') {
          createNotice('success', Object(external_this_wp_i18n_["__"])('Square connected successfully.', 'woocommerce-admin'));
          markConfigured('square');
        }
      }
    }
  }, {
    key: "connect",
    value: function () {
      var _connect = asyncToGenerator_default()( /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
        var _this$props2, createNotice, hasCbdIndustry, options, updateOptions, errorMessage, newWindow, result;

        return regeneratorRuntime.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _this$props2 = this.props, createNotice = _this$props2.createNotice, hasCbdIndustry = _this$props2.hasCbdIndustry, options = _this$props2.options, updateOptions = _this$props2.updateOptions;
                this.setState({
                  isPending: true
                });
                updateOptions({
                  woocommerce_square_credit_card_settings: square_objectSpread(square_objectSpread({}, options.woocommerce_square_credit_card_settings), {}, {
                    enabled: 'yes'
                  })
                });
                errorMessage = Object(external_this_wp_i18n_["__"])('There was an error connecting to Square. Please try again or skip to connect later in store settings.', 'woocommerce-admin');
                _context.prev = 4;
                newWindow = null;

                if (hasCbdIndustry) {
                  // It's necessary to declare the new tab before the async call,
                  // otherwise, it won't be possible to open it.
                  newWindow = window.open('/', '_blank');
                }

                _context.next = 9;
                return external_this_wp_apiFetch_default()({
                  path: constants["f" /* WC_ADMIN_NAMESPACE */] + '/plugins/connect-square',
                  method: 'POST'
                });

              case 9:
                result = _context.sent;

                if (!(!result || !result.connectUrl)) {
                  _context.next = 15;
                  break;
                }

                this.setState({
                  isPending: false
                });
                createNotice('error', errorMessage);

                if (hasCbdIndustry) {
                  newWindow.close();
                }

                return _context.abrupt("return");

              case 15:
                this.setState({
                  isPending: true
                });
                this.redirect(result.connectUrl, newWindow);
                _context.next = 23;
                break;

              case 19:
                _context.prev = 19;
                _context.t0 = _context["catch"](4);
                this.setState({
                  isPending: false
                });
                createNotice('error', errorMessage);

              case 23:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this, [[4, 19]]);
      }));

      function connect() {
        return _connect.apply(this, arguments);
      }

      return connect;
    }()
  }, {
    key: "redirect",
    value: function redirect(connectUrl, newWindow) {
      if (newWindow) {
        newWindow.location.href = connectUrl;
        window.location = Object(client_settings["f" /* getAdminLink */])('admin.php?page=wc-admin');
      } else {
        window.location = connectUrl;
      }
    }
  }, {
    key: "render",
    value: function render() {
      var installStep = this.props.installStep;
      var isPending = this.state.isPending;
      return Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Stepper"], {
        isVertical: true,
        isPending: !installStep.isComplete || isPending,
        currentStep: installStep.isComplete ? 'connect' : 'install',
        steps: [installStep, {
          key: 'connect',
          label: Object(external_this_wp_i18n_["__"])('Connect your Square account', 'woocommerce-admin'),
          description: Object(external_this_wp_i18n_["__"])('A Square account is required to process payments. You will be redirected to the Square website to create the connection.', 'woocommerce-admin'),
          content: Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_element_["createElement"])(build_module_button["a" /* default */], {
            isPrimary: true,
            isBusy: isPending,
            onClick: this.connect
          }, Object(external_this_wp_i18n_["__"])('Connect', 'woocommerce-admin')))
        }]
      });
    }
  }]);

  return Square;
}(external_this_wp_element_["Component"]);

/* harmony default export */ var square = (Object(compose["a" /* default */])(Object(external_this_wp_data_["withSelect"])(function (select) {
  var _select = select(external_this_wc_data_["OPTIONS_STORE_NAME"]),
      getOption = _select.getOption,
      isResolving = _select.isResolving;

  var options = getOption('woocommerce_square_credit_card_settings');
  var optionsIsRequesting = isResolving('getOption', ['woocommerce_square_credit_card_settings']);
  return {
    options: options,
    optionsIsRequesting: optionsIsRequesting
  };
}), Object(external_this_wp_data_["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/notices'),
      createNotice = _dispatch.createNotice;

  var _dispatch2 = dispatch(external_this_wc_data_["OPTIONS_STORE_NAME"]),
      updateOptions = _dispatch2.updateOptions;

  return {
    createNotice: createNotice,
    updateOptions: updateOptions
  };
}))(square_Square));
// CONCATENATED MODULE: ./client/task-list/tasks/payments/wcpay.js






function wcpay_createSuper(Derived) { var hasNativeReflectConstruct = wcpay_isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }

function wcpay_isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

/**
 * External dependencies
 */



/**
 * WooCommerce dependencies
 */



var wcpay_WCPay = /*#__PURE__*/function (_Component) {
  inherits_default()(WCPay, _Component);

  var _super = wcpay_createSuper(WCPay);

  function WCPay() {
    classCallCheck_default()(this, WCPay);

    return _super.apply(this, arguments);
  }

  createClass_default()(WCPay, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      var _this$props = this.props,
          createNotice = _this$props.createNotice,
          markConfigured = _this$props.markConfigured;
      var query = Object(external_this_wc_navigation_["getQuery"])(); // Handle redirect back from WCPay on-boarding

      if (query['wcpay-connection-success']) {
        createNotice('success', Object(external_this_wp_i18n_["__"])('WooCommerce Payments connected successfully.', 'woocommerce-admin'));
        markConfigured('wcpay');
      }
    }
  }, {
    key: "render",
    value: function render() {
      return null;
    }
  }]);

  return WCPay;
}(external_this_wp_element_["Component"]);

/* harmony default export */ var wcpay = (Object(external_this_wp_data_["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/notices'),
      createNotice = _dispatch.createNotice;

  return {
    createNotice: createNotice
  };
})(wcpay_WCPay));
// CONCATENATED MODULE: ./client/task-list/tasks/payments/images/wcpay.js

/* harmony default export */ var images_wcpay = (function () {
  return Object(external_this_wp_element_["createElement"])("svg", {
    width: "100",
    height: "64",
    viewBox: "-10 0 120 64",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, Object(external_this_wp_element_["createElement"])("path", {
    fillRule: "evenodd",
    clipRule: "evenodd",
    d: "M9.78073 0.5H91.1787C96.3299 0.5 100.5 4.77335 100.5 10.0522V41.8929C100.5 47.1717 96.3299 51.4451 91.1787 51.4451H61.9883L65.9948 61.5L48.3742 51.4451H9.82161C4.67036 51.4451 0.500298 47.1717 0.500298 41.8929V10.0522C0.459415 4.81524 4.62947 0.5 9.78073 0.5Z",
    fill: "#7F54B3"
  }), Object(external_this_wp_element_["createElement"])("path", {
    d: "M5.48791 9.1725C6.06028 8.37648 6.91882 7.95752 8.06354 7.87373C10.1486 7.70615 11.3342 8.71165 11.6204 10.8902C12.8877 19.6464 14.2778 27.0619 15.7495 33.1368L24.7029 15.6663C25.5206 14.0743 26.5426 13.2364 27.7691 13.1526C29.568 13.0269 30.6718 14.2 31.1215 16.6718C32.1436 22.2439 33.4519 26.9781 35.0054 31.0001C36.0684 20.3586 37.8672 12.6917 40.402 7.95753C41.0152 6.78445 41.9146 6.19791 43.1002 6.11412C44.0405 6.03033 44.8991 6.3236 45.6759 6.95203C46.4526 7.58047 46.8615 8.37648 46.9432 9.34008C46.9841 10.0942 46.8615 10.7226 46.5344 11.3511C44.94 14.3676 43.6317 19.4369 42.5688 26.4754C41.5467 33.3044 41.1787 38.6251 41.424 42.4376C41.5058 43.485 41.3423 44.4067 40.9334 45.2027C40.4428 46.1244 39.707 46.6272 38.7666 46.711C37.7037 46.7948 36.5998 46.292 35.5369 45.1608C31.7348 41.1807 28.7094 35.2316 26.5018 27.3133C23.8444 32.6759 21.882 36.6979 20.6146 39.3792C18.2025 44.1134 16.1584 46.5434 14.4413 46.6691C13.3374 46.7529 12.3971 45.7893 11.5795 43.7783C9.49445 38.2899 7.24589 27.6904 4.83379 11.9795C4.71114 10.8902 4.91555 9.92662 5.48791 9.1725Z",
    fill: "white"
  }), Object(external_this_wp_element_["createElement"])("path", {
    d: "M93.3864 15.7499C91.9146 13.1105 89.7478 11.5185 86.8451 10.89C86.0683 10.7225 85.3324 10.6387 84.6374 10.6387C80.7127 10.6387 77.5238 12.7335 75.0299 16.923C72.904 20.4841 71.8411 24.4223 71.8411 28.7376C71.8411 31.9635 72.4952 34.7286 73.8034 37.0329C75.2752 39.6723 77.442 41.2644 80.3447 41.8928C81.1215 42.0604 81.8574 42.1442 82.5524 42.1442C86.518 42.1442 89.7069 40.0494 92.1599 35.8598C94.2858 32.2568 95.3488 28.3186 95.3488 24.0034C95.3488 20.7355 94.6946 18.0123 93.3864 15.7499ZM88.2351 27.355C87.6628 30.1201 86.6407 32.173 85.128 33.5556C83.9424 34.6449 82.8386 35.1057 81.8165 34.8962C80.8353 34.6868 80.0177 33.8069 79.4044 32.173C78.9138 30.8742 78.6685 29.5755 78.6685 28.3605C78.6685 27.3131 78.7503 26.2657 78.9547 25.3021C79.3226 23.5844 80.0177 21.9086 81.1215 20.3166C82.4706 18.2637 83.9015 17.4258 85.3733 17.719C86.3545 17.9285 87.1722 18.8083 87.7854 20.4422C88.276 21.741 88.5213 23.0398 88.5213 24.2547C88.5213 25.344 88.3987 26.3914 88.2351 27.355Z",
    fill: "white"
  }), Object(external_this_wp_element_["createElement"])("path", {
    d: "M67.7528 15.7499C66.281 13.1105 64.0734 11.5185 61.2116 10.89C60.4348 10.7225 59.6989 10.6387 59.0039 10.6387C55.0791 10.6387 51.8903 12.7335 49.3964 16.923C47.2705 20.4841 46.2075 24.4223 46.2075 28.7376C46.2075 31.9635 46.8616 34.7286 48.1699 37.0329C49.6417 39.6723 51.8085 41.2644 54.7112 41.8928C55.488 42.0604 56.2238 42.1442 56.9189 42.1442C60.8845 42.1442 64.0734 40.0494 66.5263 35.8598C68.6523 32.2568 69.7152 28.3186 69.7152 24.0034C69.7152 20.7355 69.0611 18.0123 67.7528 15.7499ZM62.6016 27.355C62.0292 30.1201 61.0071 32.173 59.4945 33.5556C58.3089 34.6449 57.205 35.1057 56.183 34.8962C55.2018 34.6868 54.3841 33.8069 53.7709 32.173C53.2803 30.8742 53.035 29.5755 53.035 28.3605C53.035 27.3131 53.1167 26.2657 53.3212 25.3021C53.6891 23.5844 54.3841 21.9086 55.4879 20.3166C56.8371 18.2637 58.268 17.4258 59.7398 17.719C60.721 17.9285 61.5386 18.8083 62.1519 20.4422C62.6425 21.741 62.8878 23.0398 62.8878 24.2547C62.8878 25.344 62.806 26.3914 62.6016 27.355Z",
    fill: "white"
  }));
});
// EXTERNAL MODULE: ./node_modules/@wordpress/components/build-module/checkbox-control/index.js + 1 modules
var checkbox_control = __webpack_require__(778);

// EXTERNAL MODULE: external {"this":["wp","url"]}
var external_this_wp_url_ = __webpack_require__(26);

// CONCATENATED MODULE: ./client/task-list/tasks/payments/paypal.js











function paypal_ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function paypal_objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { paypal_ownKeys(Object(source), true).forEach(function (key) { defineProperty_default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { paypal_ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function paypal_createSuper(Derived) { var hasNativeReflectConstruct = paypal_isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }

function paypal_isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

/**
 * External dependencies
 */








/**
 * WooCommerce dependencies
 */





var paypal_PayPal = /*#__PURE__*/function (_Component) {
  inherits_default()(PayPal, _Component);

  var _super = paypal_createSuper(PayPal);

  function PayPal(props) {
    var _this;

    classCallCheck_default()(this, PayPal);

    _this = _super.call(this, props);
    _this.state = {
      autoConnectFailed: false,
      connectURL: '',
      isPending: false
    };
    _this.updateSettings = _this.updateSettings.bind(assertThisInitialized_default()(_this));
    _this.validate = _this.validate.bind(assertThisInitialized_default()(_this));
    return _this;
  }

  createClass_default()(PayPal, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      var _this$props = this.props,
          createNotice = _this$props.createNotice,
          markConfigured = _this$props.markConfigured;
      var query = Object(external_this_wc_navigation_["getQuery"])(); // Handle redirect back from PayPal

      if (query['paypal-connect']) {
        if (query['paypal-connect'] === '1') {
          createNotice('success', Object(external_this_wp_i18n_["__"])('PayPal connected successfully.', 'woocommerce-admin'));
          markConfigured('paypal');
          return;
        }
        /* eslint-disable react/no-did-mount-set-state */


        this.setState({
          autoConnectFailed: true
        });
        /* eslint-enable react/no-did-mount-set-state */

        return;
      }

      this.fetchOAuthConnectURL();
    }
  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate(prevProps) {
      var activePlugins = this.props.activePlugins;

      if (!prevProps.activePlugins.includes('woocommerce-gateway-paypal-express-checkout') && activePlugins.includes('woocommerce-gateway-paypal-express-checkout')) {
        this.fetchOAuthConnectURL();
      }
    }
  }, {
    key: "isWooCommerceServicesConnected",
    value: function isWooCommerceServicesConnected() {
      var _this$props2 = this.props,
          activePlugins = _this$props2.activePlugins,
          isJetpackConnected = _this$props2.isJetpackConnected,
          wcsTosAccepted = _this$props2.wcsTosAccepted;
      return isJetpackConnected && wcsTosAccepted && activePlugins.includes('woocommerce-services');
    }
  }, {
    key: "fetchOAuthConnectURL",
    value: function () {
      var _fetchOAuthConnectURL = asyncToGenerator_default()( /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
        var activePlugins, result;
        return regeneratorRuntime.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                activePlugins = this.props.activePlugins;

                if (activePlugins.includes('woocommerce-gateway-paypal-express-checkout')) {
                  _context.next = 3;
                  break;
                }

                return _context.abrupt("return");

              case 3:
                this.setState({
                  isPending: true
                });
                _context.prev = 4;
                _context.next = 7;
                return external_this_wp_apiFetch_default()({
                  path: constants["f" /* WC_ADMIN_NAMESPACE */] + '/plugins/connect-paypal',
                  method: 'POST'
                });

              case 7:
                result = _context.sent;

                if (!(!result || !result.connectUrl)) {
                  _context.next = 11;
                  break;
                }

                this.setState({
                  autoConnectFailed: true,
                  isPending: false
                });
                return _context.abrupt("return");

              case 11:
                this.setState({
                  connectURL: result.connectUrl,
                  isPending: false
                });
                _context.next = 17;
                break;

              case 14:
                _context.prev = 14;
                _context.t0 = _context["catch"](4);
                this.setState({
                  autoConnectFailed: true,
                  isPending: false
                });

              case 17:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this, [[4, 14]]);
      }));

      function fetchOAuthConnectURL() {
        return _fetchOAuthConnectURL.apply(this, arguments);
      }

      return fetchOAuthConnectURL;
    }()
  }, {
    key: "updateSettings",
    value: function () {
      var _updateSettings = asyncToGenerator_default()( /*#__PURE__*/regeneratorRuntime.mark(function _callee2(values) {
        var _this$props3, createNotice, options, updateOptions, markConfigured, optionValues, update;

        return regeneratorRuntime.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _this$props3 = this.props, createNotice = _this$props3.createNotice, options = _this$props3.options, updateOptions = _this$props3.updateOptions, markConfigured = _this$props3.markConfigured;
                optionValues = paypal_objectSpread(paypal_objectSpread({}, options.woocommerce_ppec_paypal_settings), {}, {
                  enabled: 'yes'
                });

                if (values.create_account) {
                  // Tell WCS to proxy payment requests.
                  // See: https://github.com/Automattic/woocommerce-services/blob/29dfe0ba6fd3075afe08f917a6ff33c321502d9c/classes/class-wc-connect-paypal-ec.php#L53.
                  optionValues.reroute_requests = 'yes';
                  optionValues.email = values.account_email;
                } else {
                  optionValues.api_username = values.api_username;
                  optionValues.api_password = values.api_password;
                }

                _context2.next = 5;
                return updateOptions({
                  woocommerce_ppec_paypal_settings: optionValues
                });

              case 5:
                update = _context2.sent;

                if (update.success) {
                  createNotice('success', Object(external_this_wp_i18n_["__"])('PayPal connected successfully.', 'woocommerce-admin'));
                  markConfigured('paypal');
                } else {
                  createNotice('error', Object(external_this_wp_i18n_["__"])('There was a problem saving your payment settings.', 'woocommerce-admin'));
                }

              case 7:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, this);
      }));

      function updateSettings(_x) {
        return _updateSettings.apply(this, arguments);
      }

      return updateSettings;
    }()
  }, {
    key: "getInitialConfigValues",
    value: function getInitialConfigValues() {
      return {
        api_username: '',
        api_password: '',
        create_account: this.isWooCommerceServicesConnected(),
        account_email: ''
      };
    }
  }, {
    key: "validate",
    value: function validate(values) {
      var errors = {};

      if (!values.create_account && !values.api_username) {
        errors.api_username = Object(external_this_wp_i18n_["__"])('Please enter your API username', 'woocommerce-admin');
      }

      if (!values.create_account && !values.api_password) {
        errors.api_password = Object(external_this_wp_i18n_["__"])('Please enter your API password', 'woocommerce-admin');
      }

      if (this.isWooCommerceServicesConnected() && values.create_account && !Object(external_this_wp_url_["isEmail"])(values.account_email)) {
        errors.account_email = Object(external_this_wp_i18n_["__"])('Please enter a valid email address', 'woocommerce-admin');
      }

      return errors;
    }
  }, {
    key: "renderAutomaticConfig",
    value: function renderAutomaticConfig() {
      var isOptionsUpdating = this.props.isOptionsUpdating;
      var _this$state = this.state,
          autoConnectFailed = _this$state.autoConnectFailed,
          connectURL = _this$state.connectURL,
          isPending = _this$state.isPending;
      var canAutoCreate = this.isWooCommerceServicesConnected();
      var initialValues = this.getInitialConfigValues();
      return Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Form"], {
        initialValues: initialValues,
        onSubmitCallback: this.updateSettings,
        validate: this.validate
      }, function (_ref) {
        var getInputProps = _ref.getInputProps,
            handleSubmit = _ref.handleSubmit,
            values = _ref.values;
        return Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, canAutoCreate && Object(external_this_wp_element_["createElement"])("div", {
          className: "woocommerce-task-payments__paypal-auto-create-account"
        }, Object(external_this_wp_element_["createElement"])(checkbox_control["a" /* default */], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('Create a PayPal account for me', 'woocommerce-admin')
        }, getInputProps('create_account'))), values.create_account && Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('Email address', 'woocommerce-admin'),
          type: "email"
        }, getInputProps('account_email')))), !isPending && (autoConnectFailed || !connectURL) && (!canAutoCreate || !values.create_account) && Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('API Username', 'woocommerce-admin'),
          required: true
        }, getInputProps('api_username'))), Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('API Password', 'woocommerce-admin'),
          required: true
        }, getInputProps('api_password'))), Object(external_this_wp_element_["createElement"])(build_module_button["a" /* default */], {
          onClick: handleSubmit,
          isPrimary: true,
          isBusy: isOptionsUpdating
        }, Object(external_this_wp_i18n_["__"])('Proceed', 'woocommerce-admin')), Object(external_this_wp_element_["createElement"])("p", null, lib_default()({
          mixedString: Object(external_this_wp_i18n_["__"])('Your API details can be obtained from your {{link}}PayPal account{{/link}}', 'woocommerce-admin'),
          components: {
            link: Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Link"], {
              href: "https://docs.woocommerce.com/document/paypal-express-checkout/#section-8",
              target: "_blank",
              type: "external"
            })
          }
        }))), canAutoCreate && values.create_account && Object(external_this_wp_element_["createElement"])(build_module_button["a" /* default */], {
          onClick: handleSubmit,
          isPrimary: true,
          isBusy: isOptionsUpdating
        }, Object(external_this_wp_i18n_["__"])('Create account', 'woocommerce-admin')), !autoConnectFailed && connectURL && (!canAutoCreate || !values.create_account) && Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_element_["createElement"])(build_module_button["a" /* default */], {
          isPrimary: true,
          href: connectURL
        }, Object(external_this_wp_i18n_["__"])('Connect', 'woocommerce-admin')), Object(external_this_wp_element_["createElement"])("p", null, Object(external_this_wp_i18n_["__"])('You will be redirected to the Paypal website to create the connection.', 'woocommerce-admin'))));
      });
    }
  }, {
    key: "getConnectStep",
    value: function getConnectStep() {
      return {
        key: 'connect',
        label: Object(external_this_wp_i18n_["__"])('Connect your PayPal account', 'woocommerce-admin'),
        description: Object(external_this_wp_i18n_["__"])('A Paypal account is required to process payments. Connect your store to your PayPal account.', 'woocommerce-admin'),
        content: this.renderAutomaticConfig()
      };
    }
  }, {
    key: "render",
    value: function render() {
      var installStep = this.props.installStep;
      var isPending = this.state.isPending;
      return Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Stepper"], {
        isVertical: true,
        isPending: !installStep.isComplete || isPending,
        currentStep: installStep.isComplete ? 'connect' : 'install',
        steps: [installStep, this.getConnectStep()]
      });
    }
  }]);

  return PayPal;
}(external_this_wp_element_["Component"]);
paypal_PayPal.defaultProps = {
  manualConfig: false // WCS is not required for the PayPal OAuth flow, so we can default to smooth connection.

};
/* harmony default export */ var paypal = (Object(compose["a" /* default */])(Object(external_this_wp_data_["withSelect"])(function (select) {
  var _select = select(external_this_wc_data_["OPTIONS_STORE_NAME"]),
      getOption = _select.getOption,
      isOptionsUpdating = _select.isOptionsUpdating;

  var _select2 = select(external_this_wc_data_["PLUGINS_STORE_NAME"]),
      getActivePlugins = _select2.getActivePlugins,
      isJetpackConnected = _select2.isJetpackConnected;

  var paypalOptions = getOption('woocommerce_ppec_paypal_settings');
  var wcsOptions = getOption('wc_connect_options');
  var activePlugins = getActivePlugins();
  return {
    activePlugins: activePlugins,
    isJetpackConnected: isJetpackConnected(),
    isOptionsUpdating: isOptionsUpdating(),
    options: paypalOptions,
    wcsTosAccepted: wcsOptions && wcsOptions.tos_accepted
  };
}), Object(external_this_wp_data_["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/notices'),
      createNotice = _dispatch.createNotice;

  var _dispatch2 = dispatch(external_this_wc_data_["OPTIONS_STORE_NAME"]),
      updateOptions = _dispatch2.updateOptions;

  return {
    createNotice: createNotice,
    updateOptions: updateOptions
  };
}))(paypal_PayPal));
// CONCATENATED MODULE: ./client/task-list/tasks/payments/klarna.js








function klarna_createSuper(Derived) { var hasNativeReflectConstruct = klarna_isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }

function klarna_isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

/**
 * External dependencies
 */




/**
 * WooCommerce dependencies
 */




var klarna_Klarna = /*#__PURE__*/function (_Component) {
  inherits_default()(Klarna, _Component);

  var _super = klarna_createSuper(Klarna);

  function Klarna(props) {
    var _this;

    classCallCheck_default()(this, Klarna);

    _this = _super.call(this, props);
    _this.continue = _this.continue.bind(assertThisInitialized_default()(_this));
    return _this;
  }

  createClass_default()(Klarna, [{
    key: "continue",
    value: function _continue() {
      var _this$props = this.props,
          markConfigured = _this$props.markConfigured,
          plugin = _this$props.plugin;
      var slug = plugin === 'checkout' ? 'klarna-checkout' : 'klarna-payments';
      markConfigured(slug);
    }
  }, {
    key: "renderConnectStep",
    value: function renderConnectStep() {
      var plugin = this.props.plugin;
      var slug = plugin === 'checkout' ? 'klarna-checkout' : 'klarna-payments';
      var section = plugin === 'checkout' ? 'kco' : 'klarna_payments';
      var link = Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Link"], {
        href: client_settings["a" /* ADMIN_URL */] + 'admin.php?page=wc-settings&tab=checkout&section=' + section,
        target: "_blank",
        type: "external"
      });
      var helpLink = Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Link"], {
        href: 'https://docs.woocommerce.com/document/' + slug + '/#section-3',
        target: "_blank",
        type: "external"
      });
      var configureText = lib_default()({
        mixedString: Object(external_this_wp_i18n_["__"])('Klarna can be configured under your {{link}}store settings{{/link}}. Figure out {{helpLink}}what you need{{/helpLink}}.', 'woocommerce-admin'),
        components: {
          link: link,
          helpLink: helpLink
        }
      });
      return Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_element_["createElement"])("p", null, configureText), Object(external_this_wp_element_["createElement"])(build_module_button["a" /* default */], {
        isPrimary: true,
        onClick: this.continue
      }, Object(external_this_wp_i18n_["__"])('Continue', 'woocommerce-admin')));
    }
  }, {
    key: "render",
    value: function render() {
      var installStep = this.props.installStep;
      return Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Stepper"], {
        isVertical: true,
        isPending: !installStep.isComplete,
        currentStep: installStep.isComplete ? 'connect' : 'install',
        steps: [installStep, {
          key: 'connect',
          label: Object(external_this_wp_i18n_["__"])('Connect your Klarna account', 'woocommerce-admin'),
          content: this.renderConnectStep()
        }]
      });
    }
  }]);

  return Klarna;
}(external_this_wp_element_["Component"]);

/* harmony default export */ var klarna = (klarna_Klarna);
// CONCATENATED MODULE: ./client/task-list/tasks/payments/payfast.js









function payfast_createSuper(Derived) { var hasNativeReflectConstruct = payfast_isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }

function payfast_isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

/**
 * External dependencies
 */






/**
 * WooCommerce dependencies
 */




var payfast_PayFast = /*#__PURE__*/function (_Component) {
  inherits_default()(PayFast, _Component);

  var _super = payfast_createSuper(PayFast);

  function PayFast() {
    var _temp, _this;

    classCallCheck_default()(this, PayFast);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    return possibleConstructorReturn_default()(_this, (_temp = _this = _super.call.apply(_super, [this].concat(args)), _this.getInitialConfigValues = function () {
      return {
        merchant_id: '',
        merchant_key: '',
        pass_phrase: ''
      };
    }, _this.validate = function (values) {
      var errors = {};

      if (!values.merchant_id) {
        errors.merchant_id = Object(external_this_wp_i18n_["__"])('Please enter your merchant ID', 'woocommerce-admin');
      }

      if (!values.merchant_key) {
        errors.merchant_key = Object(external_this_wp_i18n_["__"])('Please enter your merchant key', 'woocommerce-admin');
      }

      if (!values.pass_phrase) {
        errors.pass_phrase = Object(external_this_wp_i18n_["__"])('Please enter your passphrase', 'woocommerce-admin');
      }

      return errors;
    }, _this.updateSettings = /*#__PURE__*/function () {
      var _ref = asyncToGenerator_default()( /*#__PURE__*/regeneratorRuntime.mark(function _callee(values) {
        var _this$props, updateOptions, createNotice, markConfigured, update;

        return regeneratorRuntime.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _this$props = _this.props, updateOptions = _this$props.updateOptions, createNotice = _this$props.createNotice, markConfigured = _this$props.markConfigured; // Because the PayFast extension only works with the South African Rand
                // currency, force the store to use it while setting the PayFast settings

                _context.next = 3;
                return updateOptions({
                  woocommerce_currency: 'ZAR',
                  woocommerce_payfast_settings: {
                    merchant_id: values.merchant_id,
                    merchant_key: values.merchant_key,
                    pass_phrase: values.pass_phrase,
                    enabled: 'yes'
                  }
                });

              case 3:
                update = _context.sent;

                if (update.success) {
                  markConfigured('payfast');
                  createNotice('success', Object(external_this_wp_i18n_["__"])('PayFast connected successfully', 'woocommerce-admin'));
                } else {
                  createNotice('error', Object(external_this_wp_i18n_["__"])('There was a problem saving your payment setings', 'woocommerce-admin'));
                }

              case 5:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }));

      return function (_x) {
        return _ref.apply(this, arguments);
      };
    }(), _temp));
  }

  createClass_default()(PayFast, [{
    key: "renderConnectStep",
    value: function renderConnectStep() {
      var isOptionsRequesting = this.props.isOptionsRequesting;
      var helpText = lib_default()({
        mixedString: Object(external_this_wp_i18n_["__"])('Your API details can be obtained from your {{link}}PayFast account{{/link}}', 'woocommerce-admin'),
        components: {
          link: Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Link"], {
            href: "https://www.payfast.co.za/",
            target: "_blank",
            type: "external"
          })
        }
      });
      return Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Form"], {
        initialValues: this.getInitialConfigValues(),
        onSubmitCallback: this.updateSettings,
        validate: this.validate
      }, function (_ref2) {
        var getInputProps = _ref2.getInputProps,
            handleSubmit = _ref2.handleSubmit;
        return Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('Merchant ID', 'woocommerce-admin'),
          required: true
        }, getInputProps('merchant_id'))), Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('Merchant Key', 'woocommerce-admin'),
          required: true
        }, getInputProps('merchant_key'))), Object(external_this_wp_element_["createElement"])(external_this_wc_components_["TextControl"], extends_default()({
          label: Object(external_this_wp_i18n_["__"])('Passphrase', 'woocommerce-admin'),
          required: true
        }, getInputProps('pass_phrase'))), Object(external_this_wp_element_["createElement"])(build_module_button["a" /* default */], {
          isPrimary: true,
          isBusy: isOptionsRequesting,
          onClick: handleSubmit
        }, Object(external_this_wp_i18n_["__"])('Proceed', 'woocommerce-admin')), Object(external_this_wp_element_["createElement"])("p", null, helpText));
      });
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props2 = this.props,
          installStep = _this$props2.installStep,
          isOptionsRequesting = _this$props2.isOptionsRequesting;
      return Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Stepper"], {
        isVertical: true,
        isPending: !installStep.isComplete || isOptionsRequesting,
        currentStep: installStep.isComplete ? 'connect' : 'install',
        steps: [installStep, {
          key: 'connect',
          label: Object(external_this_wp_i18n_["__"])('Connect your PayFast account', 'woocommerce-admin'),
          content: this.renderConnectStep()
        }]
      });
    }
  }]);

  return PayFast;
}(external_this_wp_element_["Component"]);

/* harmony default export */ var payfast = (Object(compose["a" /* default */])(Object(external_this_wp_data_["withSelect"])(function (select) {
  var _select = select(external_this_wc_data_["OPTIONS_STORE_NAME"]),
      isOptionsUpdating = _select.isOptionsUpdating;

  var isOptionsRequesting = isOptionsUpdating();
  return {
    isOptionsRequesting: isOptionsRequesting
  };
}), Object(external_this_wp_data_["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/notices'),
      createNotice = _dispatch.createNotice;

  var _dispatch2 = dispatch(external_this_wc_data_["OPTIONS_STORE_NAME"]),
      updateOptions = _dispatch2.updateOptions;

  return {
    createNotice: createNotice,
    updateOptions: updateOptions
  };
}))(payfast_PayFast));
// CONCATENATED MODULE: ./client/task-list/tasks/payments/methods.js


/**
 * External dependencies
 */





/**
 * WooCommerce dependencies
 */




/**
 * Internal dependencies
 */












function installActivateAndConnectWcpay(resolve, reject, createNotice, installAndActivatePlugins) {
  var errorMessage = Object(external_this_wp_i18n_["__"])('There was an error connecting to WooCommerce Payments. Please try again or connect later in store settings.', 'woocommerce-admin');

  var connect = function connect() {
    external_this_wp_apiFetch_default()({
      path: constants["f" /* WC_ADMIN_NAMESPACE */] + '/plugins/connect-wcpay',
      method: 'POST'
    }).then(function (response) {
      window.location = response.connectUrl;
    }).catch(function () {
      createNotice('error', errorMessage);
      reject();
    });
  };

  installAndActivatePlugins(['woocommerce-payments']).then(function () {
    return connect();
  }).catch(function (error) {
    Object(notices["a" /* createNoticesFromResponse */])(error);
    reject();
  });
}
function getPaymentMethods(_ref) {
  var activePlugins = _ref.activePlugins,
      countryCode = _ref.countryCode,
      createNotice = _ref.createNotice,
      installAndActivatePlugins = _ref.installAndActivatePlugins,
      options = _ref.options,
      profileItems = _ref.profileItems;
  var settings = Object(client_settings["g" /* getSetting */])('onboarding', {
    stripeSupportedCountries: [],
    wcPayIsConnected: false
  });
  var stripeSupportedCountries = settings.stripeSupportedCountries,
      wcPayIsConnected = settings.wcPayIsConnected;
  var hasCbdIndustry = Object(external_lodash_["some"])(profileItems.industry, {
    slug: 'cbd-other-hemp-derived-products'
  }) || false;
  var methods = [];

  if (window.wcAdminFeatures.wcpay) {
    var tosLink = Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Link"], {
      href: 'https://wordpress.com/tos/',
      target: "_blank",
      type: "external"
    });
    var tosPrompt = lib_default()({
      mixedString: Object(external_this_wp_i18n_["__"])('By clicking "Set up," you agree to the {{link}}Terms of Service{{/link}}', 'woocommerce-admin'),
      components: {
        link: tosLink
      }
    });
    var wcPayDocLink = Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Link"], {
      href: 'https://docs.woocommerce.com/document/payments/testing/dev-mode/',
      target: "_blank",
      type: "external"
    });
    var wcPayDocPrompt = lib_default()({
      mixedString: Object(external_this_wp_i18n_["__"])('Setting up a store for a client? {{link}}Start here{{/link}}', 'woocommerce-admin'),
      components: {
        link: wcPayDocLink
      }
    });
    var wcPaySettingsLink = Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Link"], {
      href: Object(client_settings["f" /* getAdminLink */])('admin.php?page=wc-settings&tab=checkout&section=woocommerce_payments'),
      type: "wp-admin"
    }, Object(external_this_wp_i18n_["__"])('Settings', 'woocommerce-admin'));
    methods.push({
      key: 'wcpay',
      title: Object(external_this_wp_i18n_["__"])('WooCommerce Payments', 'woocommerce-admin'),
      content: Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_i18n_["__"])('Accept credit card payments the easy way! No setup fees. No ' + 'monthly fees. Just 2.9% + $0.30 per transaction ' + 'on U.S. issued cards. ', 'woocommerce-admin'), wcPayIsConnected && wcPaySettingsLink, !wcPayIsConnected && Object(external_this_wp_element_["createElement"])("p", null, tosPrompt), profileItems.setup_client && Object(external_this_wp_element_["createElement"])("p", null, wcPayDocPrompt)),
      before: Object(external_this_wp_element_["createElement"])(images_wcpay, null),
      onClick: function onClick(resolve, reject) {
        return installActivateAndConnectWcpay(resolve, reject, createNotice, installAndActivatePlugins);
      },
      visible: ['US', 'PR'].includes(countryCode) && !hasCbdIndustry,
      plugins: ['woocommerce-payments'],
      container: Object(external_this_wp_element_["createElement"])(wcpay, null),
      isConfigured: wcPayIsConnected,
      isEnabled: options.woocommerce_woocommerce_payments_settings && options.woocommerce_woocommerce_payments_settings.enabled === 'yes',
      optionName: 'woocommerce_woocommerce_payments_settings'
    });
  }

  methods.push({
    key: 'stripe',
    title: Object(external_this_wp_i18n_["__"])('Credit cards - powered by Stripe', 'woocommerce-admin'),
    content: Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_i18n_["__"])('Accept debit and credit cards in 135+ currencies, methods such as Alipay, ' + 'and one-touch checkout with Apple Pay.', 'woocommerce-admin')),
    before: Object(external_this_wp_element_["createElement"])("img", {
      src: client_settings["e" /* WC_ASSET_URL */] + 'images/stripe.png',
      alt: ""
    }),
    visible: stripeSupportedCountries.includes(countryCode) && !hasCbdIndustry,
    plugins: ['woocommerce-gateway-stripe'],
    container: Object(external_this_wp_element_["createElement"])(stripe, null),
    isConfigured: options.woocommerce_stripe_settings && options.woocommerce_stripe_settings.publishable_key && options.woocommerce_stripe_settings.secret_key,
    isEnabled: options.woocommerce_stripe_settings && options.woocommerce_stripe_settings.enabled === 'yes',
    optionName: 'woocommerce_stripe_settings'
  }, {
    key: 'paypal',
    title: Object(external_this_wp_i18n_["__"])('PayPal Checkout', 'woocommerce-admin'),
    content: Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_i18n_["__"])("Safe and secure payments using credit cards or your customer's PayPal account.", 'woocommerce-admin')),
    before: Object(external_this_wp_element_["createElement"])("img", {
      src: client_settings["e" /* WC_ASSET_URL */] + 'images/paypal.png',
      alt: ""
    }),
    visible: !hasCbdIndustry,
    plugins: ['woocommerce-gateway-paypal-express-checkout'],
    container: Object(external_this_wp_element_["createElement"])(paypal, null),
    isConfigured: options.woocommerce_ppec_paypal_settings && (options.woocommerce_ppec_paypal_settings.reroute_requests && options.woocommerce_ppec_paypal_settings.email || options.woocommerce_ppec_paypal_settings.api_username && options.woocommerce_ppec_paypal_settings.api_password),
    isEnabled: options.woocommerce_ppec_paypal_settings && options.woocommerce_ppec_paypal_settings.enabled === 'yes',
    optionName: 'woocommerce_ppec_paypal_settings'
  }, {
    key: 'klarna_checkout',
    title: Object(external_this_wp_i18n_["__"])('Klarna Checkout', 'woocommerce-admin'),
    content: Object(external_this_wp_i18n_["__"])('Choose the payment that you want, pay now, pay later or slice it. No credit card numbers, no passwords, no worries.', 'woocommerce-admin'),
    before: Object(external_this_wp_element_["createElement"])("img", {
      src: client_settings["e" /* WC_ASSET_URL */] + 'images/klarna-black.png',
      alt: ""
    }),
    visible: ['SE', 'FI', 'NO', 'NL'].includes(countryCode) && !hasCbdIndustry,
    plugins: ['klarna-checkout-for-woocommerce'],
    container: Object(external_this_wp_element_["createElement"])(klarna, {
      plugin: 'checkout'
    }),
    // @todo This should check actual Klarna connection information.
    isConfigured: activePlugins.includes('klarna-checkout-for-woocommerce'),
    isEnabled: options.woocommerce_kco_settings && options.woocommerce_kco_settings.enabled === 'yes',
    optionName: 'woocommerce_kco_settings'
  }, {
    key: 'klarna_payments',
    title: Object(external_this_wp_i18n_["__"])('Klarna Payments', 'woocommerce-admin'),
    content: Object(external_this_wp_i18n_["__"])('Choose the payment that you want, pay now, pay later or slice it. No credit card numbers, no passwords, no worries.', 'woocommerce-admin'),
    before: Object(external_this_wp_element_["createElement"])("img", {
      src: client_settings["e" /* WC_ASSET_URL */] + 'images/klarna-black.png',
      alt: ""
    }),
    visible: ['DK', 'DE', 'AT'].includes(countryCode) && !hasCbdIndustry,
    plugins: ['klarna-payments-for-woocommerce'],
    container: Object(external_this_wp_element_["createElement"])(klarna, {
      plugin: 'payments'
    }),
    // @todo This should check actual Klarna connection information.
    isConfigured: activePlugins.includes('klarna-payments-for-woocommerce'),
    isEnabled: options.woocommerce_klarna_payments_settings && options.woocommerce_klarna_payments_settings.enabled === 'yes',
    optionName: 'woocommerce_klarna_payments_settings'
  }, {
    key: 'square',
    title: Object(external_this_wp_i18n_["__"])('Square', 'woocommerce-admin'),
    content: Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_i18n_["__"])('Securely accept credit and debit cards with one low rate, no surprise fees (custom rates available). ' + 'Sell online and in store and track sales and inventory in one place.', 'woocommerce-admin'), hasCbdIndustry && Object(external_this_wp_element_["createElement"])("span", {
      className: "text-style-strong"
    }, Object(external_this_wp_i18n_["__"])(' Selling CBD products is only supported by Square.', 'woocommerce-admin'))),
    before: Object(external_this_wp_element_["createElement"])("img", {
      src: client_settings["e" /* WC_ASSET_URL */] + 'images/square-black.png',
      alt: ""
    }),
    visible: hasCbdIndustry && ['US'].includes(countryCode) || ['brick-mortar', 'brick-mortar-other'].includes(profileItems.selling_venues) && ['US', 'CA', 'JP', 'GB', 'AU'].includes(countryCode),
    plugins: ['woocommerce-square'],
    container: Object(external_this_wp_element_["createElement"])(square, null),
    isConfigured: options.wc_square_refresh_tokens && options.wc_square_refresh_tokens.length,
    isEnabled: options.woocommerce_square_credit_card_settings && options.woocommerce_square_credit_card_settings.enabled === 'yes',
    optionName: 'woocommerce_square_credit_card_settings',
    hasCbdIndustry: hasCbdIndustry
  }, {
    key: 'payfast',
    title: Object(external_this_wp_i18n_["__"])('PayFast', 'woocommerce-admin'),
    content: Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_i18n_["__"])('The PayFast extension for WooCommerce enables you to accept payments by Credit Card and EFT via one of South Africa’s most popular payment gateways. No setup fees or monthly subscription costs.', 'woocommerce-admin'), Object(external_this_wp_element_["createElement"])("p", null, Object(external_this_wp_i18n_["__"])('Selecting this extension will configure your store to use South African rands as the selected currency.', 'woocommerce-admin'))),
    before: Object(external_this_wp_element_["createElement"])("img", {
      src: client_settings["e" /* WC_ASSET_URL */] + 'images/payfast.png',
      alt: "PayFast logo"
    }),
    visible: ['ZA'].includes(countryCode) && !hasCbdIndustry,
    plugins: ['woocommerce-payfast-gateway'],
    container: Object(external_this_wp_element_["createElement"])(payfast, null),
    isConfigured: options.woocommerce_payfast_settings && options.woocommerce_payfast_settings.merchant_id && options.woocommerce_payfast_settings.merchant_key && options.woocommerce_payfast_settings.pass_phrase,
    isEnabled: options.woocommerce_payfast_settings && options.woocommerce_payfast_settings.enabled === 'yes',
    optionName: 'woocommerce_payfast_settings'
  }, {
    key: 'cod',
    title: Object(external_this_wp_i18n_["__"])('Cash on delivery', 'woocommerce-admin'),
    content: Object(external_this_wp_i18n_["__"])('Take payments in cash upon delivery.', 'woocommerce-admin'),
    before: Object(external_this_wp_element_["createElement"])(cod, null),
    visible: !hasCbdIndustry,
    isEnabled: options.woocommerce_cod_settings && options.woocommerce_cod_settings.enabled === 'yes',
    optionName: 'woocommerce_cod_settings'
  }, {
    key: 'bacs',
    title: Object(external_this_wp_i18n_["__"])('Direct bank transfer', 'woocommerce-admin'),
    content: Object(external_this_wp_i18n_["__"])('Take payments via bank transfer.', 'woocommerce-admin'),
    before: Object(external_this_wp_element_["createElement"])(images_bacs, null),
    visible: !hasCbdIndustry,
    container: Object(external_this_wp_element_["createElement"])(bacs, null),
    isConfigured: options.woocommerce_bacs_accounts && options.woocommerce_bacs_accounts.length,
    isEnabled: options.woocommerce_bacs_settings && options.woocommerce_bacs_settings.enabled === 'yes',
    optionName: 'woocommerce_bacs_settings'
  });
  return Object(external_lodash_["filter"])(methods, function (method) {
    return method.visible;
  });
}

/***/ })

}]);