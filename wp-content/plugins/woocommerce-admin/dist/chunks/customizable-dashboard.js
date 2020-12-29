(window["__wcAdmin_webpackJsonp"] = window["__wcAdmin_webpackJsonp"] || []).push([[29],{

/***/ 241:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/esm/defineProperty.js
var defineProperty = __webpack_require__(6);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js
var objectWithoutProperties = __webpack_require__(11);

// EXTERNAL MODULE: ./node_modules/classnames/index.js
var classnames = __webpack_require__(4);
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

/***/ 574:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return getFilteredCurrencyInstance; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CurrencyContext; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(0);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(51);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _woocommerce_currency__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(167);
/* harmony import */ var _woocommerce_currency__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_woocommerce_currency__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _woocommerce_wc_admin_settings__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(35);
/**
 * External dependencies
 */




var appCurrency = _woocommerce_currency__WEBPACK_IMPORTED_MODULE_2___default()(_woocommerce_wc_admin_settings__WEBPACK_IMPORTED_MODULE_3__[/* CURRENCY */ "b"]);
var getFilteredCurrencyInstance = function getFilteredCurrencyInstance(query) {
  var config = appCurrency.getCurrencyConfig();
  var filteredConfig = Object(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_1__["applyFilters"])('woocommerce_admin_report_currency', config, query);
  return _woocommerce_currency__WEBPACK_IMPORTED_MODULE_2___default()(filteredConfig);
};
var CurrencyContext = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createContext"])(appCurrency // default value
);

/***/ }),

/***/ 581:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(0);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(4);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _visually_hidden__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(241);


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

/***/ 582:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(5);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(20);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(15);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(13);
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(22);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(23);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(10);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(0);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(181);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(1);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(2);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(25);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _woocommerce_components__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(74);
/* harmony import */ var _woocommerce_components__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_woocommerce_components__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _woocommerce_wc_admin_settings__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(35);
/* harmony import */ var _woocommerce_data__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(34);
/* harmony import */ var _woocommerce_data__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(_woocommerce_data__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var _woocommerce_date__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(42);
/* harmony import */ var _woocommerce_date__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(_woocommerce_date__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var _woocommerce_tracks__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(50);
/* harmony import */ var _woocommerce_tracks__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(_woocommerce_tracks__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var _lib_currency_context__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(574);
/* harmony import */ var _customer_effort_score_tracks_data_constants__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(118);









function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

/**
 * External dependencies
 */










/**
 * Internal dependencies
 */




var ReportFilters = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default()(ReportFilters, _Component);

  var _super = _createSuper(ReportFilters);

  function ReportFilters() {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, ReportFilters);

    _this = _super.call(this);
    _this.onDateSelect = _this.onDateSelect.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.onFilterSelect = _this.onFilterSelect.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.onAdvancedFilterAction = _this.onAdvancedFilterAction.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(ReportFilters, [{
    key: "onDateSelect",
    value: function onDateSelect(data) {
      var _this$props = this.props,
          report = _this$props.report,
          addCesSurveyForAnalytics = _this$props.addCesSurveyForAnalytics;
      addCesSurveyForAnalytics();
      Object(_woocommerce_tracks__WEBPACK_IMPORTED_MODULE_16__["recordEvent"])('datepicker_update', _objectSpread({
        report: report
      }, Object(lodash__WEBPACK_IMPORTED_MODULE_10__["omitBy"])(data, lodash__WEBPACK_IMPORTED_MODULE_10__["isUndefined"])));
    }
  }, {
    key: "onFilterSelect",
    value: function onFilterSelect(data) {
      var _this$props2 = this.props,
          report = _this$props2.report,
          addCesSurveyForAnalytics = _this$props2.addCesSurveyForAnalytics; // This event gets triggered in the following cases.
      // 1. Select "Single Product" and choose a product.
      // 2. Select "Comparison" or any other filter types.
      // The comparsion and other filter types require a user to click
      // a button to execute a query, so this is not a good place to
      // trigger a CES survey for those.

      var triggerCesFor = ['single_product', 'single_category', 'single_coupon', 'single_variation'];
      var filterName = data.filter || data['filter-variations'];

      if (triggerCesFor.includes(filterName)) {
        addCesSurveyForAnalytics();
      }

      Object(_woocommerce_tracks__WEBPACK_IMPORTED_MODULE_16__["recordEvent"])('analytics_filter', {
        report: report,
        filter: data.filter || 'all'
      });
    }
  }, {
    key: "onAdvancedFilterAction",
    value: function onAdvancedFilterAction(action, data) {
      var _this$props3 = this.props,
          report = _this$props3.report,
          addCesSurveyForAnalytics = _this$props3.addCesSurveyForAnalytics;

      switch (action) {
        case 'add':
          Object(_woocommerce_tracks__WEBPACK_IMPORTED_MODULE_16__["recordEvent"])('analytics_filters_add', {
            report: report,
            filter: data.key
          });
          break;

        case 'remove':
          Object(_woocommerce_tracks__WEBPACK_IMPORTED_MODULE_16__["recordEvent"])('analytics_filters_remove', {
            report: report,
            filter: data.key
          });
          break;

        case 'filter':
          var snakeCaseData = Object.keys(data).reduce(function (result, property) {
            result[Object(lodash__WEBPACK_IMPORTED_MODULE_10__["snakeCase"])(property)] = data[property];
            return result;
          }, {});
          addCesSurveyForAnalytics();
          Object(_woocommerce_tracks__WEBPACK_IMPORTED_MODULE_16__["recordEvent"])('analytics_filters_filter', _objectSpread({
            report: report
          }, snakeCaseData));
          break;

        case 'clear_all':
          Object(_woocommerce_tracks__WEBPACK_IMPORTED_MODULE_16__["recordEvent"])('analytics_filters_clear_all', {
            report: report
          });
          break;

        case 'match':
          Object(_woocommerce_tracks__WEBPACK_IMPORTED_MODULE_16__["recordEvent"])('analytics_filters_all_any', {
            report: report,
            value: data.match
          });
          break;
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props4 = this.props,
          advancedFilters = _this$props4.advancedFilters,
          filters = _this$props4.filters,
          path = _this$props4.path,
          query = _this$props4.query,
          showDatePicker = _this$props4.showDatePicker,
          defaultDateRange = _this$props4.defaultDateRange;

      var _getDateParamsFromQue = Object(_woocommerce_date__WEBPACK_IMPORTED_MODULE_15__["getDateParamsFromQuery"])(query, defaultDateRange),
          period = _getDateParamsFromQue.period,
          compare = _getDateParamsFromQue.compare,
          before = _getDateParamsFromQue.before,
          after = _getDateParamsFromQue.after;

      var _getCurrentDates = Object(_woocommerce_date__WEBPACK_IMPORTED_MODULE_15__["getCurrentDates"])(query, defaultDateRange),
          primaryDate = _getCurrentDates.primary,
          secondaryDate = _getCurrentDates.secondary;

      var dateQuery = {
        period: period,
        compare: compare,
        before: before,
        after: after,
        primaryDate: primaryDate,
        secondaryDate: secondaryDate
      };
      var Currency = this.context;
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_woocommerce_components__WEBPACK_IMPORTED_MODULE_12__["ReportFilters"], {
        query: query,
        siteLocale: _woocommerce_wc_admin_settings__WEBPACK_IMPORTED_MODULE_13__[/* LOCALE */ "c"].siteLocale,
        currency: Currency.getCurrencyConfig(),
        path: path,
        filters: filters,
        advancedFilters: advancedFilters,
        showDatePicker: showDatePicker,
        onDateSelect: this.onDateSelect,
        onFilterSelect: this.onFilterSelect,
        onAdvancedFilterAction: this.onAdvancedFilterAction,
        dateQuery: dateQuery,
        isoDateFormat: _woocommerce_date__WEBPACK_IMPORTED_MODULE_15__["isoDateFormat"]
      });
    }
  }]);

  return ReportFilters;
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["Component"]);

ReportFilters.contextType = _lib_currency_context__WEBPACK_IMPORTED_MODULE_17__[/* CurrencyContext */ "a"];
/* harmony default export */ __webpack_exports__["a"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_8__[/* default */ "a"])(Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_11__["withSelect"])(function (select) {
  var _select$getSetting = select(_woocommerce_data__WEBPACK_IMPORTED_MODULE_14__["SETTINGS_STORE_NAME"]).getSetting('wc_admin', 'wcAdminSettings'),
      defaultDateRange = _select$getSetting.woocommerce_default_date_range;

  return {
    defaultDateRange: defaultDateRange
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_11__["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch(_customer_effort_score_tracks_data_constants__WEBPACK_IMPORTED_MODULE_18__[/* STORE_KEY */ "c"]),
      addCesSurveyForAnalytics = _dispatch.addCesSurveyForAnalytics;

  return {
    addCesSurveyForAnalytics: addCesSurveyForAnalytics
  };
}))(ReportFilters));
ReportFilters.propTypes = {
  /**
   * Config option passed through to `AdvancedFilters`
   */
  advancedFilters: prop_types__WEBPACK_IMPORTED_MODULE_9___default.a.object,

  /**
   * Config option passed through to `FilterPicker` - if not used, `FilterPicker` is not displayed.
   */
  filters: prop_types__WEBPACK_IMPORTED_MODULE_9___default.a.array,

  /**
   * The `path` parameter supplied by React-Router
   */
  path: prop_types__WEBPACK_IMPORTED_MODULE_9___default.a.string.isRequired,

  /**
   * The query string represented in object form
   */
  query: prop_types__WEBPACK_IMPORTED_MODULE_9___default.a.object,

  /**
   * Whether the date picker must be shown..
   */
  showDatePicker: prop_types__WEBPACK_IMPORTED_MODULE_9___default.a.bool,

  /**
   * The report where filter are placed.
   */
  report: prop_types__WEBPACK_IMPORTED_MODULE_9___default.a.string.isRequired
};

/***/ }),

/***/ 660:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/objectWithoutProperties.js
var objectWithoutProperties = __webpack_require__(58);
var objectWithoutProperties_default = /*#__PURE__*/__webpack_require__.n(objectWithoutProperties);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/defineProperty.js
var defineProperty = __webpack_require__(5);
var defineProperty_default = /*#__PURE__*/__webpack_require__.n(defineProperty);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/toConsumableArray.js
var toConsumableArray = __webpack_require__(28);
var toConsumableArray_default = /*#__PURE__*/__webpack_require__.n(toConsumableArray);

// EXTERNAL MODULE: external {"this":["wp","element"]}
var external_this_wp_element_ = __webpack_require__(0);

// EXTERNAL MODULE: external {"this":["wp","i18n"]}
var external_this_wp_i18n_ = __webpack_require__(3);

// EXTERNAL MODULE: ./node_modules/@wordpress/compose/build-module/higher-order/compose.js
var compose = __webpack_require__(181);

// EXTERNAL MODULE: external "lodash"
var external_lodash_ = __webpack_require__(2);

// EXTERNAL MODULE: ./node_modules/@wordpress/components/build-module/dropdown/index.js
var dropdown = __webpack_require__(339);

// EXTERNAL MODULE: ./node_modules/@wordpress/components/build-module/button/index.js
var build_module_button = __webpack_require__(67);

// EXTERNAL MODULE: ./node_modules/@wordpress/components/build-module/icon/index.js
var icon = __webpack_require__(114);

// EXTERNAL MODULE: external {"this":["wp","hooks"]}
var external_this_wp_hooks_ = __webpack_require__(51);

// EXTERNAL MODULE: ./node_modules/@wordpress/icons/build-module/icon/index.js
var build_module_icon = __webpack_require__(377);

// EXTERNAL MODULE: ./node_modules/@wordpress/primitives/build-module/svg/index.js
var svg = __webpack_require__(78);

// CONCATENATED MODULE: ./node_modules/@wordpress/icons/build-module/library/plus-circle-filled.js


/**
 * WordPress dependencies
 */

var plusCircleFilled = Object(external_this_wp_element_["createElement"])(svg["c" /* SVG */], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, Object(external_this_wp_element_["createElement"])(svg["b" /* Path */], {
  d: "M2 12C2 6.44444 6.44444 2 12 2C17.5556 2 22 6.44444 22 12C22 17.5556 17.5556 22 12 22C6.44444 22 2 17.5556 2 12ZM13 11V7H11V11H7V13H11V17H13V13H17V11H13Z"
}));
/* harmony default export */ var plus_circle_filled = (plusCircleFilled);
//# sourceMappingURL=plus-circle-filled.js.map
// EXTERNAL MODULE: external {"this":["wp","data"]}
var external_this_wp_data_ = __webpack_require__(25);

// EXTERNAL MODULE: external {"this":["wc","components"]}
var external_this_wc_components_ = __webpack_require__(74);

// EXTERNAL MODULE: external {"this":["wc","data"]}
var external_this_wc_data_ = __webpack_require__(34);

// EXTERNAL MODULE: external {"this":["wc","navigation"]}
var external_this_wc_navigation_ = __webpack_require__(29);

// EXTERNAL MODULE: external {"this":["wc","date"]}
var external_this_wc_date_ = __webpack_require__(42);

// EXTERNAL MODULE: external {"this":["wc","tracks"]}
var external_this_wc_tracks_ = __webpack_require__(50);

// EXTERNAL MODULE: ./client/dashboard/style.scss
var style = __webpack_require__(590);

// CONCATENATED MODULE: ./client/dashboard/default-sections.js


/**
 * External dependencies
 */




/**
 * Internal dependencies
 */

var LazyDashboardCharts = Object(external_this_wp_element_["lazy"])(function () {
  return Promise.all(/* import() | dashboard-charts */[__webpack_require__.e(1), __webpack_require__.e(2), __webpack_require__.e(8), __webpack_require__.e(31)]).then(__webpack_require__.bind(null, 674));
});
var LazyLeaderboards = Object(external_this_wp_element_["lazy"])(function () {
  return Promise.all(/* import() | leaderboards */[__webpack_require__.e(2), __webpack_require__.e(3), __webpack_require__.e(36)]).then(__webpack_require__.bind(null, 676));
});
var LazyStorePerformance = Object(external_this_wp_element_["lazy"])(function () {
  return __webpack_require__.e(/* import() | store-performance */ 49).then(__webpack_require__.bind(null, 666));
});

var default_sections_DashboardCharts = function DashboardCharts(props) {
  return Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Suspense"], {
    fallback: Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Spinner"], null)
  }, Object(external_this_wp_element_["createElement"])(LazyDashboardCharts, props));
};

var default_sections_Leaderboards = function Leaderboards(props) {
  return Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Suspense"], {
    fallback: Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Spinner"], null)
  }, Object(external_this_wp_element_["createElement"])(LazyLeaderboards, props));
};

var default_sections_StorePerformance = function StorePerformance(props) {
  return Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Suspense"], {
    fallback: Object(external_this_wp_element_["createElement"])(external_this_wc_components_["Spinner"], null)
  }, Object(external_this_wp_element_["createElement"])(LazyStorePerformance, props));
};

var DEFAULT_SECTIONS_FILTER = 'woocommerce_dashboard_default_sections';
/* harmony default export */ var default_sections = (Object(external_this_wp_hooks_["applyFilters"])(DEFAULT_SECTIONS_FILTER, [{
  key: 'store-performance',
  component: default_sections_StorePerformance,
  title: Object(external_this_wp_i18n_["__"])('Performance', 'woocommerce-admin'),
  isVisible: true,
  icon: 'arrow-right-alt',
  hiddenBlocks: ['coupons/amount', 'coupons/orders_count', 'downloads/download_count', 'taxes/order_tax', 'taxes/total_tax', 'taxes/shipping_tax', 'revenue/shipping', 'orders/avg_order_value', 'revenue/refunds', 'revenue/gross_sales']
}, {
  key: 'charts',
  component: default_sections_DashboardCharts,
  title: Object(external_this_wp_i18n_["__"])('Charts', 'woocommerce-admin'),
  isVisible: true,
  icon: 'chart-bar',
  hiddenBlocks: ['orders_avg_order_value', 'avg_items_per_order', 'products_items_sold', 'revenue_total_sales', 'revenue_refunds', 'coupons_amount', 'coupons_orders_count', 'revenue_shipping', 'taxes_total_tax', 'taxes_order_tax', 'taxes_shipping_tax', 'downloads_download_count']
}, {
  key: 'leaderboards',
  component: default_sections_Leaderboards,
  title: Object(external_this_wp_i18n_["__"])('Leaderboards', 'woocommerce-admin'),
  isVisible: true,
  icon: 'editor-ol',
  hiddenBlocks: ['coupons', 'customers']
}]));
// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/extends.js
var helpers_extends = __webpack_require__(36);
var extends_default = /*#__PURE__*/__webpack_require__.n(helpers_extends);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/classCallCheck.js
var classCallCheck = __webpack_require__(20);
var classCallCheck_default = /*#__PURE__*/__webpack_require__.n(classCallCheck);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/createClass.js
var createClass = __webpack_require__(15);
var createClass_default = /*#__PURE__*/__webpack_require__.n(createClass);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/assertThisInitialized.js
var assertThisInitialized = __webpack_require__(13);
var assertThisInitialized_default = /*#__PURE__*/__webpack_require__.n(assertThisInitialized);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/inherits.js
var inherits = __webpack_require__(22);
var inherits_default = /*#__PURE__*/__webpack_require__.n(inherits);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js
var possibleConstructorReturn = __webpack_require__(23);
var possibleConstructorReturn_default = /*#__PURE__*/__webpack_require__.n(possibleConstructorReturn);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/getPrototypeOf.js
var getPrototypeOf = __webpack_require__(10);
var getPrototypeOf_default = /*#__PURE__*/__webpack_require__.n(getPrototypeOf);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/esm/extends.js
var esm_extends = __webpack_require__(7);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js
var esm_objectWithoutProperties = __webpack_require__(11);

// EXTERNAL MODULE: ./node_modules/@wordpress/compose/build-module/hooks/use-instance-id/index.js
var use_instance_id = __webpack_require__(147);

// EXTERNAL MODULE: ./node_modules/@wordpress/components/build-module/base-control/index.js
var base_control = __webpack_require__(581);

// CONCATENATED MODULE: ./node_modules/@wordpress/components/build-module/text-control/index.js




/**
 * WordPress dependencies
 */

/**
 * Internal dependencies
 */


function TextControl(_ref) {
  var label = _ref.label,
      hideLabelFromVision = _ref.hideLabelFromVision,
      value = _ref.value,
      help = _ref.help,
      className = _ref.className,
      onChange = _ref.onChange,
      _ref$type = _ref.type,
      type = _ref$type === void 0 ? 'text' : _ref$type,
      props = Object(esm_objectWithoutProperties["a" /* default */])(_ref, ["label", "hideLabelFromVision", "value", "help", "className", "onChange", "type"]);

  var instanceId = Object(use_instance_id["a" /* default */])(TextControl);
  var id = "inspector-text-control-".concat(instanceId);

  var onChangeValue = function onChangeValue(event) {
    return onChange(event.target.value);
  };

  return Object(external_this_wp_element_["createElement"])(base_control["a" /* default */], {
    label: label,
    hideLabelFromVision: hideLabelFromVision,
    id: id,
    help: help,
    className: className
  }, Object(external_this_wp_element_["createElement"])("input", Object(esm_extends["a" /* default */])({
    className: "components-text-control__input",
    type: type,
    id: id,
    value: value,
    onChange: onChangeValue,
    "aria-describedby": !!help ? id + '__help' : undefined
  }, props)));
}
//# sourceMappingURL=index.js.map
// CONCATENATED MODULE: ./client/dashboard/section-controls.js








function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

/**
 * External dependencies
 */





var section_controls_SectionControls = /*#__PURE__*/function (_Component) {
  inherits_default()(SectionControls, _Component);

  var _super = _createSuper(SectionControls);

  function SectionControls(props) {
    var _this;

    classCallCheck_default()(this, SectionControls);

    _this = _super.call(this, props);
    _this.onMoveUp = _this.onMoveUp.bind(assertThisInitialized_default()(_this));
    _this.onMoveDown = _this.onMoveDown.bind(assertThisInitialized_default()(_this));
    return _this;
  }

  createClass_default()(SectionControls, [{
    key: "onMoveUp",
    value: function onMoveUp() {
      var _this$props = this.props,
          onMove = _this$props.onMove,
          onToggle = _this$props.onToggle;
      onMove(-1); // Close the dropdown

      onToggle();
    }
  }, {
    key: "onMoveDown",
    value: function onMoveDown() {
      var _this$props2 = this.props,
          onMove = _this$props2.onMove,
          onToggle = _this$props2.onToggle;
      onMove(1); // Close the dropdown

      onToggle();
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props3 = this.props,
          onRemove = _this$props3.onRemove,
          isFirst = _this$props3.isFirst,
          isLast = _this$props3.isLast,
          onTitleBlur = _this$props3.onTitleBlur,
          onTitleChange = _this$props3.onTitleChange,
          titleInput = _this$props3.titleInput;
      return Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_element_["createElement"])("div", {
        className: "woocommerce-ellipsis-menu__item"
      }, Object(external_this_wp_element_["createElement"])(TextControl, {
        label: Object(external_this_wp_i18n_["__"])('Section Title', 'woocommerce-admin'),
        onBlur: onTitleBlur,
        onChange: onTitleChange,
        required: true,
        value: titleInput
      })), Object(external_this_wp_element_["createElement"])("div", {
        className: "woocommerce-dashboard-section-controls"
      }, !isFirst && Object(external_this_wp_element_["createElement"])(external_this_wc_components_["MenuItem"], {
        isClickable: true,
        onInvoke: this.onMoveUp
      }, Object(external_this_wp_element_["createElement"])(icon["a" /* default */], {
        icon: 'arrow-up-alt2',
        label: Object(external_this_wp_i18n_["__"])('Move up')
      }), Object(external_this_wp_i18n_["__"])('Move up', 'woocommerce-admin')), !isLast && Object(external_this_wp_element_["createElement"])(external_this_wc_components_["MenuItem"], {
        isClickable: true,
        onInvoke: this.onMoveDown
      }, Object(external_this_wp_element_["createElement"])(icon["a" /* default */], {
        icon: 'arrow-down-alt2',
        label: Object(external_this_wp_i18n_["__"])('Move Down')
      }), Object(external_this_wp_i18n_["__"])('Move Down', 'woocommerce-admin')), Object(external_this_wp_element_["createElement"])(external_this_wc_components_["MenuItem"], {
        isClickable: true,
        onInvoke: onRemove
      }, Object(external_this_wp_element_["createElement"])(icon["a" /* default */], {
        icon: 'trash',
        label: Object(external_this_wp_i18n_["__"])('Remove block')
      }), Object(external_this_wp_i18n_["__"])('Remove section', 'woocommerce-admin'))));
    }
  }]);

  return SectionControls;
}(external_this_wp_element_["Component"]);

/* harmony default export */ var section_controls = (section_controls_SectionControls);
// CONCATENATED MODULE: ./client/dashboard/section.js










function section_createSuper(Derived) { var hasNativeReflectConstruct = section_isNativeReflectConstruct(); return function _createSuperInternal() { var Super = getPrototypeOf_default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = getPrototypeOf_default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return possibleConstructorReturn_default()(this, result); }; }

function section_isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

/**
 * External dependencies
 */


/**
 * Internal dependencies
 */



var section_Section = /*#__PURE__*/function (_Component) {
  inherits_default()(Section, _Component);

  var _super = section_createSuper(Section);

  function Section(props) {
    var _this;

    classCallCheck_default()(this, Section);

    _this = _super.call(this, props);
    var title = props.title;
    _this.state = {
      titleInput: title
    };
    _this.onToggleHiddenBlock = _this.onToggleHiddenBlock.bind(assertThisInitialized_default()(_this));
    _this.onTitleChange = _this.onTitleChange.bind(assertThisInitialized_default()(_this));
    _this.onTitleBlur = _this.onTitleBlur.bind(assertThisInitialized_default()(_this));
    return _this;
  }

  createClass_default()(Section, [{
    key: "onTitleChange",
    value: function onTitleChange(updatedTitle) {
      this.setState({
        titleInput: updatedTitle
      });
    }
  }, {
    key: "onTitleBlur",
    value: function onTitleBlur() {
      var _this$props = this.props,
          onTitleUpdate = _this$props.onTitleUpdate,
          title = _this$props.title;
      var titleInput = this.state.titleInput;

      if (titleInput === '') {
        this.setState({
          titleInput: title
        });
      } else if (onTitleUpdate) {
        onTitleUpdate(titleInput);
      }
    }
  }, {
    key: "onToggleHiddenBlock",
    value: function onToggleHiddenBlock(key) {
      var _this2 = this;

      return function () {
        var hiddenBlocks = Object(external_lodash_["xor"])(_this2.props.hiddenBlocks, [key]);

        _this2.props.onChangeHiddenBlocks(hiddenBlocks);
      };
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props2 = this.props,
          SectionComponent = _this$props2.component,
          props = objectWithoutProperties_default()(_this$props2, ["component"]);

      var titleInput = this.state.titleInput;
      return Object(external_this_wp_element_["createElement"])("div", {
        className: "woocommerce-dashboard-section"
      }, Object(external_this_wp_element_["createElement"])(SectionComponent, extends_default()({
        onTitleChange: this.onTitleChange,
        onTitleBlur: this.onTitleBlur,
        onToggleHiddenBlock: this.onToggleHiddenBlock,
        titleInput: titleInput,
        controls: section_controls
      }, props)));
    }
  }]);

  return Section;
}(external_this_wp_element_["Component"]);


// EXTERNAL MODULE: ./client/analytics/components/report-filters/index.js
var report_filters = __webpack_require__(582);

// EXTERNAL MODULE: ./client/lib/currency-context.js
var currency_context = __webpack_require__(574);

// CONCATENATED MODULE: ./client/dashboard/customizable.js





function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { defineProperty_default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

/**
 * External dependencies
 */













/**
 * Internal dependencies
 */






var DASHBOARD_FILTERS_FILTER = 'woocommerce_admin_dashboard_filters';
var filters = Object(external_this_wp_hooks_["applyFilters"])(DASHBOARD_FILTERS_FILTER, []);

var customizable_mergeSectionsWithDefaults = function mergeSectionsWithDefaults(prefSections) {
  if (!prefSections || prefSections.length === 0) {
    return default_sections;
  }

  var defaultKeys = default_sections.map(function (section) {
    return section.key;
  });
  var prefKeys = prefSections.map(function (section) {
    return section.key;
  });
  var keys = new Set([].concat(toConsumableArray_default()(prefKeys), toConsumableArray_default()(defaultKeys)));
  var sections = [];
  keys.forEach(function (key) {
    var defaultSection = default_sections.find(function (section) {
      return section.key === key;
    });

    if (!defaultSection) {
      return;
    }

    var prefSection = prefSections.find(function (section) {
      return section.key === key;
    });
    sections.push(_objectSpread(_objectSpread({}, defaultSection), prefSection));
  });
  return sections;
};

var customizable_CustomizableDashboard = function CustomizableDashboard(_ref) {
  var defaultDateRange = _ref.defaultDateRange,
      path = _ref.path,
      query = _ref.query;

  var _useUserPreferences = Object(external_this_wc_data_["useUserPreferences"])(),
      updateUserPreferences = _useUserPreferences.updateUserPreferences,
      userPrefs = objectWithoutProperties_default()(_useUserPreferences, ["updateUserPreferences"]);

  var sections = customizable_mergeSectionsWithDefaults(userPrefs.dashboard_sections);

  var updateSections = function updateSections(newSections) {
    updateUserPreferences({
      dashboard_sections: newSections
    });
  };

  var updateSection = function updateSection(updatedKey, newSettings) {
    var newSections = sections.map(function (section) {
      if (section.key === updatedKey) {
        return _objectSpread(_objectSpread({}, section), newSettings);
      }

      return section;
    });
    updateSections(newSections);
  };

  var onChangeHiddenBlocks = function onChangeHiddenBlocks(updatedKey) {
    return function (updatedHiddenBlocks) {
      updateSection(updatedKey, {
        hiddenBlocks: updatedHiddenBlocks
      });
    };
  };

  var onSectionTitleUpdate = function onSectionTitleUpdate(updatedKey) {
    return function (updatedTitle) {
      Object(external_this_wc_tracks_["recordEvent"])('dash_section_rename', {
        key: updatedKey
      });
      updateSection(updatedKey, {
        title: updatedTitle
      });
    };
  };

  var toggleVisibility = function toggleVisibility(key, onToggle) {
    return function () {
      if (onToggle) {
        // Close the dropdown before setting state so an action is not performed on an unmounted component.
        onToggle();
      } // When toggling visibility, place section at the end of the array.


      var index = sections.findIndex(function (s) {
        return key === s.key;
      });
      var toggledSection = sections.splice(index, 1).shift();
      toggledSection.isVisible = !toggledSection.isVisible;
      sections.push(toggledSection);

      if (toggledSection.isVisible) {
        Object(external_this_wc_tracks_["recordEvent"])('dash_section_add', {
          key: toggledSection.key
        });
      } else {
        Object(external_this_wc_tracks_["recordEvent"])('dash_section_remove', {
          key: toggledSection.key
        });
      }

      updateSections(sections);
    };
  };

  var onMove = function onMove(index, change) {
    var movedSection = sections.splice(index, 1).shift();
    var newIndex = index + change; // Figure out the index of the skipped section.

    var nextJumpedSectionIndex = change < 0 ? newIndex : newIndex - 1;

    if (sections[nextJumpedSectionIndex].isVisible || // Is the skipped section visible?
    index === 0 || // Will this be the first element?
    index === sections.length - 1 // Will this be the last element?
    ) {
        // Yes, lets insert.
        sections.splice(newIndex, 0, movedSection);
        updateSections(sections);
        var eventProps = {
          key: movedSection.key,
          direction: change > 0 ? 'down' : 'up'
        };
        Object(external_this_wc_tracks_["recordEvent"])('dash_section_order_change', eventProps);
      } else {
      // No, lets try the next one.
      onMove(index, change + change);
    }
  };

  var renderAddMore = function renderAddMore() {
    var hiddenSections = sections.filter(function (section) {
      return section.isVisible === false;
    });

    if (hiddenSections.length === 0) {
      return null;
    }

    return Object(external_this_wp_element_["createElement"])(dropdown["a" /* default */], {
      position: "top center",
      className: "woocommerce-dashboard-section__add-more",
      renderToggle: function renderToggle(_ref2) {
        var onToggle = _ref2.onToggle,
            isOpen = _ref2.isOpen;
        return Object(external_this_wp_element_["createElement"])(build_module_button["a" /* default */], {
          onClick: onToggle,
          title: Object(external_this_wp_i18n_["__"])('Add more sections', 'woocommerce-admin'),
          "aria-expanded": isOpen
        }, Object(external_this_wp_element_["createElement"])(build_module_icon["a" /* default */], {
          icon: plus_circle_filled
        }));
      },
      renderContent: function renderContent(_ref3) {
        var onToggle = _ref3.onToggle;
        return Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_element_["createElement"])(external_this_wc_components_["H"], null, Object(external_this_wp_i18n_["__"])('Dashboard Sections', 'woocommerce-admin')), Object(external_this_wp_element_["createElement"])("div", {
          className: "woocommerce-dashboard-section__add-more-choices"
        }, hiddenSections.map(function (section) {
          return Object(external_this_wp_element_["createElement"])(build_module_button["a" /* default */], {
            key: section.key,
            onClick: toggleVisibility(section.key, onToggle),
            className: "woocommerce-dashboard-section__add-more-btn",
            title: Object(external_this_wp_i18n_["sprintf"])(Object(external_this_wp_i18n_["__"])('Add %s section', 'woocommerce-admin'), section.title)
          }, Object(external_this_wp_element_["createElement"])(icon["a" /* default */], {
            icon: section.icon,
            size: 30
          }), Object(external_this_wp_element_["createElement"])("span", {
            className: "woocommerce-dashboard-section__add-more-btn-title"
          }, section.title));
        })));
      }
    });
  };

  var renderDashboardReports = function renderDashboardReports() {
    var _getDateParamsFromQue = Object(external_this_wc_date_["getDateParamsFromQuery"])(query, defaultDateRange),
        period = _getDateParamsFromQue.period,
        compare = _getDateParamsFromQue.compare,
        before = _getDateParamsFromQue.before,
        after = _getDateParamsFromQue.after;

    var _getCurrentDates = Object(external_this_wc_date_["getCurrentDates"])(query, defaultDateRange),
        primaryDate = _getCurrentDates.primary,
        secondaryDate = _getCurrentDates.secondary;

    var dateQuery = {
      period: period,
      compare: compare,
      before: before,
      after: after,
      primaryDate: primaryDate,
      secondaryDate: secondaryDate
    };
    var visibleSectionKeys = sections.filter(function (section) {
      return section.isVisible;
    }).map(function (section) {
      return section.key;
    });
    return Object(external_this_wp_element_["createElement"])(external_this_wp_element_["Fragment"], null, Object(external_this_wp_element_["createElement"])(report_filters["a" /* default */], {
      report: "dashboard",
      query: query,
      path: path,
      dateQuery: dateQuery,
      isoDateFormat: external_this_wc_date_["isoDateFormat"],
      filters: filters
    }), sections.map(function (section, index) {
      if (section.isVisible) {
        return Object(external_this_wp_element_["createElement"])(section_Section, {
          component: section.component,
          hiddenBlocks: section.hiddenBlocks,
          key: section.key,
          onChangeHiddenBlocks: onChangeHiddenBlocks(section.key),
          onTitleUpdate: onSectionTitleUpdate(section.key),
          path: path,
          query: query,
          title: section.title,
          onMove: Object(external_lodash_["partial"])(onMove, index),
          onRemove: toggleVisibility(section.key),
          isFirst: section.key === visibleSectionKeys[0],
          isLast: section.key === visibleSectionKeys[visibleSectionKeys.length - 1],
          filters: filters
        });
      }

      return null;
    }), renderAddMore());
  };

  return Object(external_this_wp_element_["createElement"])(currency_context["a" /* CurrencyContext */].Provider, {
    value: Object(currency_context["b" /* getFilteredCurrencyInstance */])(Object(external_this_wc_navigation_["getQuery"])())
  }, renderDashboardReports());
};

/* harmony default export */ var customizable = __webpack_exports__["default"] = (Object(compose["a" /* default */])(Object(external_this_wp_data_["withSelect"])(function (select) {
  var _select$getSetting = select(external_this_wc_data_["SETTINGS_STORE_NAME"]).getSetting('wc_admin', 'wcAdminSettings'),
      defaultDateRange = _select$getSetting.woocommerce_default_date_range;

  var withSelectData = {
    defaultDateRange: defaultDateRange
  };
  return withSelectData;
}))(customizable_CustomizableDashboard));

/***/ })

}]);