(window.__googlesitekit_webpackJsonp=window.__googlesitekit_webpackJsonp||[]).push([[13],{1:function(t,e){t.exports=googlesitekit.i18n},101:function(t,e,r){"use strict";r.d(e,"a",(function(){return b})),r.d(e,"c",(function(){return y})),r.d(e,"b",(function(){return m}));var n=r(17),o=r.n(n),a=r(6),i=r.n(a),u=r(5),c=r.n(u),s=r(10),l=r.n(s),f=r(4),d=r.n(f),p=r(43),v=r(7),g=d.a.createRegistryControl,b=function(t){var e;l()(t,"storeName is required to create a snapshot store.");var r={},n={deleteSnapshot:c.a.mark((function t(){var e;return c.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,{payload:{},type:"DELETE_SNAPSHOT"};case 2:return e=t.sent,t.abrupt("return",e);case 4:case"end":return t.stop()}}),t)})),restoreSnapshot:c.a.mark((function t(){var e,r,n,o,a,i,u=arguments;return c.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return e=u.length>0&&void 0!==u[0]?u[0]:{},r=e.clearAfterRestore,n=void 0===r||r,t.next=4,{payload:{},type:"RESTORE_SNAPSHOT"};case 4:if(o=t.sent,a=o.cacheHit,i=o.value,!a){t.next=13;break}return t.next=10,{payload:{snapshot:i},type:"SET_STATE_FROM_SNAPSHOT"};case 10:if(!n){t.next=13;break}return t.next=13,{payload:{},type:"DELETE_SNAPSHOT"};case 13:return t.abrupt("return",a);case 14:case"end":return t.stop()}}),t)})),createSnapshot:c.a.mark((function t(){var e;return c.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,{payload:{},type:"CREATE_SNAPSHOT"};case 2:return e=t.sent,t.abrupt("return",e);case 4:case"end":return t.stop()}}),t)}))},a=(e={},i()(e,"DELETE_SNAPSHOT",(function(){return Object(p.a)("datastore::cache::".concat(t))})),i()(e,"CREATE_SNAPSHOT",g((function(e){return function(){return Object(p.d)("datastore::cache::".concat(t),e.stores[t].store.getState())}}))),i()(e,"RESTORE_SNAPSHOT",(function(){return Object(p.b)("datastore::cache::".concat(t),v.b)})),e);return{initialState:r,actions:n,controls:a,reducer:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:r,e=arguments.length>1?arguments[1]:void 0,n=e.type,a=e.payload;switch(n){case"SET_STATE_FROM_SNAPSHOT":var i=a.snapshot,u=(i.error,o()(i,["error"]));return u;default:return t}}}},h=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:d.a;return Object.values(t.stores).filter((function(t){return Object.keys(t.getActions()).includes("restoreSnapshot")}))},y=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:d.a;return Promise.all(h(t).map((function(t){return t.getActions().createSnapshot()})))},m=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:d.a;return Promise.all(h(t).map((function(t){return t.getActions().restoreSnapshot()})))}},1108:function(t,e,r){"use strict";r.r(e);var n=r(4),o=r.n(n),a=r(53),i=r(101),u=r(6),c=r.n(u),s=r(5),l=r.n(s),f=r(10),d=r.n(f),p=r(57),v=r.n(p),g=r(45);function b(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function h(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?b(Object(r),!0).forEach((function(e){c()(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):b(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}var y={resetInViewHook:l.a.mark((function t(){var e,r;return l.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,o.a.commonActions.getRegistry();case 2:return e=t.sent,r=e.select(g.b).getValue("useInViewResetCount"),t.next=6,y.setValue("useInViewResetCount",r+1);case 6:return t.abrupt("return",t.sent);case 7:case"end":return t.stop()}}),t)})),setValues:function(t){return d()(v()(t),"values must be an object."),{payload:{values:t},type:"SET_VALUES"}},setValue:function(t,e){return d()(t,"key is required."),{payload:{key:t,value:e},type:"SET_VALUE"}}},m={initialState:{useInViewResetCount:0},actions:y,controls:{},reducer:function(t,e){var r=e.type,n=e.payload;switch(r){case"SET_VALUES":var o=n.values;return h(h({},t),o);case"SET_VALUE":var a=n.key,i=n.value;return h(h({},t),{},c()({},a,i));default:return t}},resolvers:{},selectors:{getValue:function(t,e){return t[e]},getInViewResetHook:function(t){return t.useInViewResetCount}}},O=o.a.combineStores(o.a.commonStore,m,Object(i.a)(g.b),Object(a.b)());O.initialState,O.actions,O.controls,O.reducer,O.resolvers,O.selectors;o.a.registerStore(g.b,O)},28:function(t,e,r){"use strict";r.d(e,"a",(function(){return n})),r.d(e,"b",(function(){return o}));var n="_googlesitekitDataLayer",o="data-googlesitekit-gtag"},30:function(t,e,r){"use strict";(function(t){var n,o;r.d(e,"a",(function(){return a})),r.d(e,"b",(function(){return i}));var a=new Set((null===(n=t)||void 0===n||null===(o=n._googlesitekitBaseData)||void 0===o?void 0:o.enabledFeatures)||[]),i=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:a;return e instanceof Set&&e.has(t)}}).call(this,r(18))},31:function(t,e,r){"use strict";(function(t){r.d(e,"a",(function(){return m})),r.d(e,"b",(function(){return y}));var n=r(87),o=t._googlesitekitBaseData||{},a=o.activeModules,i=void 0===a?[]:a,u=o.isSiteKitScreen,c=o.trackingEnabled,s=o.trackingID,l=o.referenceSiteURL,f=o.userIDHash,d=o.isAuthenticated,p={activeModules:i,trackingEnabled:c,trackingID:s,referenceSiteURL:l,userIDHash:f,isSiteKitScreen:u,userRoles:o.userRoles,isAuthenticated:d,pluginVersion:"1.74.0"},v=Object(n.a)(p),g=v.enableTracking,b=v.disableTracking,h=(v.isTrackingEnabled,v.initializeSnippet),y=v.trackEvent;function m(t){t?g():b()}u&&c&&h()}).call(this,r(18))},35:function(t,e,r){"use strict";r.d(e,"a",(function(){return n}));var n=function(t){return t instanceof Date&&!isNaN(t)}},4:function(t,e){t.exports=googlesitekit.data},41:function(t,e,r){"use strict";r.d(e,"a",(function(){return o}));var n=r(35),o=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",e="string"==typeof t;if(!e)return!1;var r=t.split("-");return 3===r.length&&Object(n.a)(new Date(t))}},43:function(t,e,r){"use strict";(function(t){r.d(e,"b",(function(){return h})),r.d(e,"d",(function(){return y})),r.d(e,"a",(function(){return m})),r.d(e,"c",(function(){return O}));var n=r(5),o=r.n(n),a=r(14),i=r.n(a),u=(r(24),r(7));function c(t,e){var r="undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(!r){if(Array.isArray(t)||(r=function(t,e){if(!t)return;if("string"==typeof t)return s(t,e);var r=Object.prototype.toString.call(t).slice(8,-1);"Object"===r&&t.constructor&&(r=t.constructor.name);if("Map"===r||"Set"===r)return Array.from(t);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return s(t,e)}(t))||e&&t&&"number"==typeof t.length){r&&(t=r);var n=0,o=function(){};return{s:o,n:function(){return n>=t.length?{done:!0}:{done:!1,value:t[n++]}},e:function(t){throw t},f:o}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var a,i=!0,u=!1;return{s:function(){r=r.call(t)},n:function(){var t=r.next();return i=t.done,t},e:function(t){u=!0,a=t},f:function(){try{i||null==r.return||r.return()}finally{if(u)throw a}}}}function s(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=new Array(e);r<e;r++)n[r]=t[r];return n}var l,f="googlesitekit_".concat("1.74.0","_"),d=["sessionStorage","localStorage"],p=[].concat(d),v=function(){var e=i()(o.a.mark((function e(r){var n,a;return o.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(n=t[r]){e.next=3;break}return e.abrupt("return",!1);case 3:return e.prev=3,a="__storage_test__",n.setItem(a,a),n.removeItem(a),e.abrupt("return",!0);case 10:return e.prev=10,e.t0=e.catch(3),e.abrupt("return",e.t0 instanceof DOMException&&(22===e.t0.code||1014===e.t0.code||"QuotaExceededError"===e.t0.name||"NS_ERROR_DOM_QUOTA_REACHED"===e.t0.name)&&0!==n.length);case 13:case"end":return e.stop()}}),e,null,[[3,10]])})));return function(t){return e.apply(this,arguments)}}();function g(){return b.apply(this,arguments)}function b(){return(b=i()(o.a.mark((function e(){var r,n,a;return o.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(void 0===l){e.next=2;break}return e.abrupt("return",l);case 2:r=c(p),e.prev=3,r.s();case 5:if((n=r.n()).done){e.next=15;break}if(a=n.value,!l){e.next=9;break}return e.abrupt("continue",13);case 9:return e.next=11,v(a);case 11:if(!e.sent){e.next=13;break}l=t[a];case 13:e.next=5;break;case 15:e.next=20;break;case 17:e.prev=17,e.t0=e.catch(3),r.e(e.t0);case 20:return e.prev=20,r.f(),e.finish(20);case 23:return void 0===l&&(l=null),e.abrupt("return",l);case 25:case"end":return e.stop()}}),e,null,[[3,17,20,23]])})))).apply(this,arguments)}var h=function(){var t=i()(o.a.mark((function t(e){var r,n,a,i,u,c,s;return o.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,g();case 2:if(!(r=t.sent)){t.next=10;break}if(!(n=r.getItem("".concat(f).concat(e)))){t.next=10;break}if(a=JSON.parse(n),i=a.timestamp,u=a.ttl,c=a.value,s=a.isError,!i||u&&!(Math.round(Date.now()/1e3)-i<u)){t.next=10;break}return t.abrupt("return",{cacheHit:!0,value:c,isError:s});case 10:return t.abrupt("return",{cacheHit:!1,value:void 0});case 11:case"end":return t.stop()}}),t)})));return function(e){return t.apply(this,arguments)}}(),y=function(){var e=i()(o.a.mark((function e(r,n){var a,i,c,s,l,d,p,v,b=arguments;return o.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return a=b.length>2&&void 0!==b[2]?b[2]:{},i=a.ttl,c=void 0===i?u.b:i,s=a.timestamp,l=void 0===s?Math.round(Date.now()/1e3):s,d=a.isError,p=void 0!==d&&d,e.next=3,g();case 3:if(!(v=e.sent)){e.next=14;break}return e.prev=5,v.setItem("".concat(f).concat(r),JSON.stringify({timestamp:l,ttl:c,value:n,isError:p})),e.abrupt("return",!0);case 10:return e.prev=10,e.t0=e.catch(5),t.console.warn("Encountered an unexpected storage error:",e.t0),e.abrupt("return",!1);case 14:return e.abrupt("return",!1);case 15:case"end":return e.stop()}}),e,null,[[5,10]])})));return function(t,r){return e.apply(this,arguments)}}(),m=function(){var e=i()(o.a.mark((function e(r){var n;return o.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,g();case 2:if(!(n=e.sent)){e.next=13;break}return e.prev=4,n.removeItem("".concat(f).concat(r)),e.abrupt("return",!0);case 9:return e.prev=9,e.t0=e.catch(4),t.console.warn("Encountered an unexpected storage error:",e.t0),e.abrupt("return",!1);case 13:return e.abrupt("return",!1);case 14:case"end":return e.stop()}}),e,null,[[4,9]])})));return function(t){return e.apply(this,arguments)}}(),O=function(){var e=i()(o.a.mark((function e(){var r,n,a,i;return o.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,g();case 2:if(!(r=e.sent)){e.next=14;break}for(e.prev=4,n=[],a=0;a<r.length;a++)0===(i=r.key(a)).indexOf(f)&&n.push(i.substring(f.length));return e.abrupt("return",n);case 10:return e.prev=10,e.t0=e.catch(4),t.console.warn("Encountered an unexpected storage error:",e.t0),e.abrupt("return",[]);case 14:return e.abrupt("return",[]);case 15:case"end":return e.stop()}}),e,null,[[4,10]])})));return function(){return e.apply(this,arguments)}}()}).call(this,r(18))},45:function(t,e,r){"use strict";r.d(e,"b",(function(){return n})),r.d(e,"a",(function(){return o}));var n="core/ui",o="activeContextID"},50:function(t,e,r){"use strict";r.d(e,"b",(function(){return o})),r.d(e,"a",(function(){return a})),r.d(e,"d",(function(){return i})),r.d(e,"c",(function(){return u})),r.d(e,"e",(function(){return c}));var n=r(111);function o(t){try{return new URL(t).pathname}catch(t){}return null}function a(t,e){try{return new URL(e,t).href}catch(t){}return("string"==typeof t?t:"")+("string"==typeof e?e:"")}function i(t){return"string"!=typeof t?t:t.replace(/^https?:\/\/(www\.)?/i,"").replace(/\/$/,"")}function u(t){return/^#\w[A-Za-z0-9-_]*$/.test(t)}function c(t,e){if(!Object(n.a)(t))return t;if(t.length<=e)return t;var r=new URL(t),o=t.replace(r.origin,"");if(o.length<e)return o;var a=o.length-Math.floor(e)+1;return"…"+o.substr(a)}},51:function(t,e,r){"use strict";r.d(e,"a",(function(){return o}));var n=r(28);function o(t){return function(){t[n.a]=t[n.a]||[],t[n.a].push(arguments)}}},53:function(t,e,r){"use strict";r.d(e,"a",(function(){return g})),r.d(e,"b",(function(){return b}));var n=r(6),o=r.n(n),a=r(29),i=r.n(a),u=r(10),c=r.n(u),s=r(80),l=r.n(s),f=r(7);function d(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function p(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?d(Object(r),!0).forEach((function(e){o()(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):d(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function v(t,e){if(e&&Array.isArray(e)){var r=e.map((function(t){return"object"===i()(t)?Object(f.y)(t):t}));return"".concat(t,"::").concat(l()(JSON.stringify(r)))}return t}var g={receiveError:function(t,e,r){return c()(t,"error is required."),e&&c()(r&&Array.isArray(r),"args is required (and must be an array) when baseName is specified."),{type:"RECEIVE_ERROR",payload:{error:t,baseName:e,args:r}}},clearError:function(t,e){return t&&c()(e&&Array.isArray(e),"args is required (and must be an array) when baseName is specified."),{type:"CLEAR_ERROR",payload:{baseName:t,args:e}}},clearErrors:function(t){return{type:"CLEAR_ERRORS",payload:{baseName:t}}}};function b(){var t={getErrorForSelector:function(e,r){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:[];return c()(r,"selectorName is required."),t.getError(e,r,n)},getErrorForAction:function(e,r){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:[];return c()(r,"actionName is required."),t.getError(e,r,n)},getError:function(t,e,r){var n=t.error,o=t.errors;return e||r?(c()(e,"baseName is required."),o[v(e,r)]):n},getErrors:function(t){var e=new Set(Object.values(t.errors));return void 0!==t.error&&e.add(t.error),Array.from(e)},hasErrors:function(e){return t.getErrors(e).length>0}};return{initialState:{errors:{},error:void 0},actions:g,controls:{},reducer:function(t,e){var r=e.type,n=e.payload;switch(r){case"RECEIVE_ERROR":var a=n.baseName,i=n.args,u=n.error;return p(p({},t),{},a?{errors:p(p({},t.errors||{}),{},o()({},v(a,i),u))}:{error:u});case"CLEAR_ERROR":var c=n.baseName,s=n.args,l=p({},t);if(c){var f=v(c,s);l.errors=p({},t.errors||{}),delete l.errors[f]}else l.error=void 0;return l;case"CLEAR_ERRORS":var d=n.baseName,g=p({},t);if(d)for(var b in g.errors=p({},t.errors||{}),g.errors)(b===d||b.startsWith("".concat(d,"::")))&&delete g.errors[b];else g.errors={},g.error=void 0;return g;default:return t}},resolvers:{},selectors:t}}},58:function(t,e,r){"use strict";r.d(e,"d",(function(){return n})),r.d(e,"c",(function(){return o})),r.d(e,"b",(function(){return a})),r.d(e,"a",(function(){return i})),r.d(e,"e",(function(){return u})),r.d(e,"h",(function(){return f})),r.d(e,"i",(function(){return b})),r.d(e,"j",(function(){return h})),r.d(e,"k",(function(){return v.a})),r.d(e,"g",(function(){return y})),r.d(e,"f",(function(){return O})),r.d(e,"l",(function(){return g}));var n="Invalid dateString parameter, it must be a string.",o='Invalid date range, it must be a string with the format "last-x-days".',a=3600,i=86400,u=604800,c=r(10),s=r.n(c),l=r(35),f=function(t){var e=new Date(t);s()(Object(l.a)(e),"Date param must construct to a valid date instance or be a valid date instance itself.");var r="".concat(e.getMonth()+1),n="".concat(e.getDate());return[e.getFullYear(),r.length<2?"0".concat(r):r,n.length<2?"0".concat(n):n].join("-")},d=r(12),p=r.n(d),v=r(41),g=function(t){s()(Object(v.a)(t),n);var e=t.split("-"),r=p()(e,3),o=r[0],a=r[1],i=r[2];return new Date(o,a-1,i)},b=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",e=arguments.length>1?arguments[1]:void 0,r=g(t);return r.setDate(r.getDate()-e),f(r)},h=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",e=t.split("-");return 3===e.length&&"last"===e[0]&&!Number.isNaN(e[1])&&!Number.isNaN(parseFloat(e[1]))&&"days"===e[2]};function y(t){var e=t.match(/last-(\d+)-days/);if(e&&e[1])return parseInt(e[1],10);throw new Error("Unrecognized date range slug.")}var m=r(1);function O(){var t=function(t){return Object(m.sprintf)(
/* translators: %s: number of days */
Object(m._n)("Last %s day","Last %s days",t,"google-site-kit"),t)};return{"last-7-days":{slug:"last-7-days",label:t(7),days:7},"last-14-days":{slug:"last-14-days",label:t(14),days:14},"last-28-days":{slug:"last-28-days",label:t(28),days:28},"last-90-days":{slug:"last-90-days",label:t(90),days:90}}}},63:function(t,e,r){"use strict";(function(t){var n=r(0),o=r.n(n),a=r(9),i=r.n(a);function ChangeArrow(e){var r=e.direction,n=e.invertColor,o=e.width,a=e.height;return t.createElement("svg",{className:i()("googlesitekit-change-arrow","googlesitekit-change-arrow--".concat(r),{"googlesitekit-change-arrow--inverted-color":n}),width:o,height:a,viewBox:"0 0 10 10",fill:"none",xmlns:"http://www.w3.org/2000/svg"},t.createElement("path",{d:"M5.625 10L5.625 2.375L9.125 5.875L10 5L5 -1.76555e-07L-2.7055e-07 5L0.875 5.875L4.375 2.375L4.375 10L5.625 10Z",fill:"currentColor"}))}ChangeArrow.propTypes={direction:o.a.string,invertColor:o.a.bool,width:o.a.number,height:o.a.number},ChangeArrow.defaultProps={direction:"up",invertColor:!1,width:9,height:9},e.a=ChangeArrow}).call(this,r(3))},64:function(t,e,r){"use strict";r.d(e,"a",(function(){return i})),r.d(e,"b",(function(){return u}));var n=r(29),o=r.n(n),a=r(70),i=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};return{__html:a.a.sanitize(t,e)}};function u(t){var e,r="object"===o()(t)?t.toString():t;return null==r||null===(e=r.replace)||void 0===e?void 0:e.call(r,/\/+$/,"")}},65:function(t,e,r){"use strict";r.d(e,"a",(function(){return o}));var n=r(2),o=function(t){return function(e){return function FilteredComponent(r){return Object(n.createElement)(n.Fragment,{},"",Object(n.createElement)(e,r),t)}}}},7:function(t,e,r){"use strict";r.d(e,"z",(function(){return u.b})),r.d(e,"w",(function(){return c.a})),r.d(e,"A",(function(){return c.b})),r.d(e,"y",(function(){return p})),r.d(e,"f",(function(){return v.b})),r.d(e,"n",(function(){return v.c})),r.d(e,"u",(function(){return g.c})),r.d(e,"v",(function(){return g.d})),r.d(e,"r",(function(){return g.b})),r.d(e,"m",(function(){return g.a})),r.d(e,"h",(function(){return b.a})),r.d(e,"s",(function(){return O})),r.d(e,"g",(function(){return w})),r.d(e,"b",(function(){return j.b})),r.d(e,"a",(function(){return j.a})),r.d(e,"c",(function(){return j.e})),r.d(e,"j",(function(){return j.f})),r.d(e,"x",(function(){return j.l})),r.d(e,"k",(function(){return S.b})),r.d(e,"q",(function(){return S.c})),r.d(e,"e",(function(){return S.a})),r.d(e,"p",(function(){return E.b})),r.d(e,"l",(function(){return E.a})),r.d(e,"t",(function(){return E.d})),r.d(e,"o",(function(){return k})),r.d(e,"d",(function(){return _})),r.d(e,"B",(function(){return A})),r.d(e,"i",(function(){return D}));var n=r(119),o=r.n(n),a=r(115),i=r.n(a),u=r(31),c=r(64),s=r(29),l=r.n(s),f=r(80),d=r.n(f),p=function(t){return d()(JSON.stringify(function t(e){var r={};return Object.keys(e).sort().forEach((function(n){var o=e[n];o&&"object"===l()(o)&&!Array.isArray(o)&&(o=t(o)),r[n]=o})),r}(t)))};var v=r(82),g=(r(85),r(73)),b=r(65);function h(t){return t.replace(/\[([^\]]+)\]\((https?:\/\/[^\/]+\.\w+\/?.*?)\)/gi,'<a href="$2" target="_blank" rel="noopener noreferrer">$1</a>')}function y(t){return"<p>".concat(t.replace(/\n{2,}/g,"</p><p>"),"</p>")}function m(t){return t.replace(/\n/gi,"<br>")}function O(t){for(var e=t,r=0,n=[h,y,m];r<n.length;r++){e=(0,n[r])(e)}return e}var w=function(t){return t=parseFloat(t),isNaN(t)||0===t?[0,0,0,0]:[Math.floor(t/60/60),Math.floor(t/60%60),Math.floor(t%60),Math.floor(1e3*t)-1e3*Math.floor(t)]},j=r(58),S=r(86),E=r(50),k=function(t){switch(t){case"minute":return 60;case"hour":return 3600;case"day":return 86400;case"week":return 604800;case"month":return 2592e3;case"year":return 31536e3}},_=function(t,e){if("0"===t||0===t||isNaN(t))return null;var r=(e-t)/t;return isNaN(r)||!o()(r)?null:r},A=function(t){try{return JSON.parse(t)&&!!t}catch(t){return!1}},D=function(t){if(!t)return"";var e=t.replace(/&#(\d+);/g,(function(t,e){return String.fromCharCode(e)})).replace(/(\\)/g,"");return i()(e)}},70:function(t,e,r){"use strict";(function(t){r.d(e,"a",(function(){return o}));var n=r(120),o=r.n(n)()(t)}).call(this,r(18))},73:function(t,e,r){"use strict";(function(t){r.d(e,"c",(function(){return w})),r.d(e,"d",(function(){return S})),r.d(e,"b",(function(){return E})),r.d(e,"a",(function(){return k}));var n=r(12),o=r.n(n),a=r(29),i=r.n(a),u=r(6),c=r.n(u),s=r(17),l=r.n(s),f=r(27),d=r(68),p=r.n(d),v=r(1);function g(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function b(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?g(Object(r),!0).forEach((function(e){c()(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):g(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}var h=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},r=y(t,e),n=r.formatUnit,o=r.formatDecimal;try{return n()}catch(t){return o()}},y=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};t=parseInt(t,10),Number.isNaN(t)&&(t=0);var r=Math.floor(t/60/60),n=Math.floor(t/60%60),o=Math.floor(t%60);return{hours:r,minutes:n,seconds:o,formatUnit:function(){var a=e.unitDisplay,i=b(b({unitDisplay:void 0===a?"short":a},l()(e,["unitDisplay"])),{},{style:"unit"});return 0===t?S(o,b(b({},i),{},{unit:"second"})):Object(v.sprintf)(
/* translators: 1: formatted seconds, 2: formatted minutes, 3: formatted hours */
Object(v._x)("%3$s %2$s %1$s","duration of time: hh mm ss","google-site-kit"),o?S(o,b(b({},i),{},{unit:"second"})):"",n?S(n,b(b({},i),{},{unit:"minute"})):"",r?S(r,b(b({},i),{},{unit:"hour"})):"").trim()},formatDecimal:function(){var e=Object(v.sprintf)(// translators: %s number of seconds with "s" as the abbreviated unit.
Object(v.__)("%ds","google-site-kit"),o);if(0===t)return e;var a=Object(v.sprintf)(// translators: %s number of minutes with "m" as the abbreviated unit.
Object(v.__)("%dm","google-site-kit"),n),i=Object(v.sprintf)(// translators: %s number of hours with "h" as the abbreviated unit.
Object(v.__)("%dh","google-site-kit"),r);return Object(v.sprintf)(
/* translators: 1: formatted seconds, 2: formatted minutes, 3: formatted hours */
Object(v._x)("%3$s %2$s %1$s","duration of time: hh mm ss","google-site-kit"),o?e:"",n?a:"",r?i:"").trim()}}},m=function(t){return 1e6<=t?Math.round(t/1e5)/10:1e4<=t?Math.round(t/1e3):1e3<=t?Math.round(t/100)/10:t},O=function(t){var e={minimumFractionDigits:1,maximumFractionDigits:1};return 1e6<=t?Object(v.sprintf)(// translators: %s: an abbreviated number in millions.
Object(v.__)("%sM","google-site-kit"),S(m(t),t%10==0?{}:e)):1e4<=t?Object(v.sprintf)(// translators: %s: an abbreviated number in thousands.
Object(v.__)("%sK","google-site-kit"),S(m(t))):1e3<=t?Object(v.sprintf)(// translators: %s: an abbreviated number in thousands.
Object(v.__)("%sK","google-site-kit"),S(m(t),t%10==0?{}:e)):S(t,{signDisplay:"never",maximumFractionDigits:1})},w=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};t=Object(f.isFinite)(t)?t:Number(t),Object(f.isFinite)(t)||(console.warn("Invalid number",t,i()(t)),t=0);var r={};if("%"===e)r={style:"percent",maximumFractionDigits:2};else{if("s"===e)return h(t,{unitDisplay:"narrow"});e&&"string"==typeof e?r={style:"currency",currency:e}:Object(f.isPlainObject)(e)&&(r=b({},e))}var n=r,o=n.style,a=void 0===o?"metric":o;return"metric"===a?O(t):"duration"===a?h(t,e):S(t,r)},j=p()(console.warn),S=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},r=e.locale,n=void 0===r?k():r,a=l()(e,["locale"]);try{return new Intl.NumberFormat(n,a).format(t)}catch(e){j("Site Kit numberFormat error: Intl.NumberFormat( ".concat(JSON.stringify(n),", ").concat(JSON.stringify(a)," ).format( ").concat(i()(t)," )"),e.message)}for(var u={currencyDisplay:"narrow",currencySign:"accounting",style:"unit"},c=["signDisplay","compactDisplay"],s={},f=0,d=Object.entries(a);f<d.length;f++){var p=o()(d[f],2),v=p[0],g=p[1];u[v]&&g===u[v]||(c.includes(v)||(s[v]=g))}try{return new Intl.NumberFormat(n,s).format(t)}catch(e){return new Intl.NumberFormat(n).format(t)}},E=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},r=e.locale,n=void 0===r?k():r,o=e.style,a=void 0===o?"long":o,i=e.type,u=void 0===i?"conjunction":i;if(Intl.ListFormat){var c=new Intl.ListFormat(n,{style:a,type:u});return c.format(t)}
/* translators: used between list items, there is a space after the comma. */var s=Object(v.__)(", ","google-site-kit");return t.join(s)},k=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:t,r=Object(f.get)(e,["_googlesitekitLegacyData","locale"]);if(r){var n=r.match(/^(\w{2})?(_)?(\w{2})/);if(n&&n[0])return n[0].replace(/_/g,"-")}return e.navigator.language}}).call(this,r(18))},82:function(t,e,r){"use strict";(function(t){r.d(e,"a",(function(){return c})),r.d(e,"b",(function(){return s})),r.d(e,"c",(function(){return f}));var n=r(12),o=r.n(n),a=r(1);function i(t,e){var r="undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(!r){if(Array.isArray(t)||(r=function(t,e){if(!t)return;if("string"==typeof t)return u(t,e);var r=Object.prototype.toString.call(t).slice(8,-1);"Object"===r&&t.constructor&&(r=t.constructor.name);if("Map"===r||"Set"===r)return Array.from(t);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return u(t,e)}(t))||e&&t&&"number"==typeof t.length){r&&(t=r);var n=0,o=function(){};return{s:o,n:function(){return n>=t.length?{done:!0}:{done:!1,value:t[n++]}},e:function(t){throw t},f:o}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var a,i=!0,c=!1;return{s:function(){r=r.call(t)},n:function(){var t=r.next();return i=t.done,t},e:function(t){c=!0,a=t},f:function(){try{i||null==r.return||r.return()}finally{if(c)throw a}}}}function u(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=new Array(e);r<e;r++)n[r]=t[r];return n}var c=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,e=null,r=null,n=document.querySelector("#toplevel_page_googlesitekit-dashboard .googlesitekit-notifications-counter"),o=document.querySelector("#wp-admin-bar-google-site-kit .googlesitekit-notifications-counter");if(n&&o)return!1;if(e=document.querySelector("#toplevel_page_googlesitekit-dashboard .wp-menu-name"),r=document.querySelector("#wp-admin-bar-google-site-kit .ab-item"),null===e&&null===r)return!1;var i=document.createElement("span");i.setAttribute("class","googlesitekit-notifications-counter update-plugins count-".concat(t));var u=document.createElement("span");u.setAttribute("class","plugin-count"),u.setAttribute("aria-hidden","true"),u.textContent=t;var c=document.createElement("span");return c.setAttribute("class","screen-reader-text"),c.textContent=Object(a.sprintf)(
/* translators: %d is the number of notifications */
Object(a._n)("%d notification","%d notifications",t,"google-site-kit"),t),i.appendChild(u),i.appendChild(c),e&&null===n&&e.appendChild(i),r&&null===o&&r.appendChild(i),i},s=function(){t.localStorage&&t.localStorage.clear(),t.sessionStorage&&t.sessionStorage.clear()},l=function(t){for(var e=location.search.substr(1).split("&"),r={},n=0;n<e.length;n++)r[e[n].split("=")[0]]=decodeURIComponent(e[n].split("=")[1]);return t?r.hasOwnProperty(t)?decodeURIComponent(r[t].replace(/\+/g," ")):"":r},f=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:location,r=new URL(e.href);if(t)return r.searchParams&&r.searchParams.get?r.searchParams.get(t):l(t);var n,a={},u=i(r.searchParams.entries());try{for(u.s();!(n=u.n()).done;){var c=o()(n.value,2),s=c[0],f=c[1];a[s]=f}}catch(t){u.e(t)}finally{u.f()}return a}}).call(this,r(18))},85:function(t,e,r){"use strict";(function(t){r(46),r(47)}).call(this,r(18))},86:function(t,e,r){"use strict";(function(t){r.d(e,"b",(function(){return a})),r.d(e,"c",(function(){return i})),r.d(e,"a",(function(){return u}));var n=r(201),o=r(63),a=function(e){var r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};if(Number.isNaN(Number(e)))return"";var a=r.invertColor,i=void 0!==a&&a;return Object(n.a)(t.createElement(o.a,{direction:e>0?"up":"down",invertColor:i}))},i=function(t){var e,r,n,o,a,i,u,c,s,l,f,d,p,v,g;if(void 0!==t)return 1===(null==t||null===(e=t[0])||void 0===e||null===(r=e.data)||void 0===r||null===(n=r.rows)||void 0===n?void 0:n.length)||(null==t||null===(o=t[0])||void 0===o||null===(a=o.data)||void 0===a||null===(i=a.rows)||void 0===i||null===(u=i[0])||void 0===u||null===(c=u.metrics)||void 0===c||null===(s=c[0])||void 0===s||null===(l=s.values)||void 0===l?void 0:l[0])===(null==t||null===(f=t[0])||void 0===f||null===(d=f.data)||void 0===d||null===(p=d.totals)||void 0===p||null===(v=p[0])||void 0===v||null===(g=v.values)||void 0===g?void 0:g[0])},u=function(t,e){return t>0&&e>0?t/e-1:t>0?1:e>0?-1:0}}).call(this,r(3))},87:function(t,e,r){"use strict";(function(t){r.d(e,"a",(function(){return l}));var n=r(6),o=r.n(n),a=r(88),i=r(89);function u(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function c(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?u(Object(r),!0).forEach((function(e){o()(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):u(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}var s={activeModules:[],isAuthenticated:!1,referenceSiteURL:"",trackingEnabled:!1,trackingID:"",userIDHash:"",userRoles:[]};function l(e){var r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:t,n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:t,o=c(c({},s),e);o.referenceSiteURL&&(o.referenceSiteURL=o.referenceSiteURL.toString().replace(/\/+$/,""));var u=Object(a.a)(o,r);return{enableTracking:function(){o.trackingEnabled=!0},disableTracking:function(){o.trackingEnabled=!1},initializeSnippet:u,isTrackingEnabled:function(){return!!o.trackingEnabled},trackEvent:Object(i.a)(o,r,u,n)}}}).call(this,r(18))},88:function(t,e,r){"use strict";(function(t){r.d(e,"a",(function(){return a}));var n=r(51),o=r(28);function a(e,r){var a,i=Object(n.a)(r);return function(){var r=t.document;if(void 0===a&&(a=!!r.querySelector("script[".concat(o.b,"]"))),!a){var n=r.createElement("script");n.setAttribute(o.b,""),n.async=!0,n.src="https://www.googletagmanager.com/gtag/js?id=".concat(e.trackingID,"&l=").concat(o.a),r.head.appendChild(n),i("js",new Date),i("config",e.trackingID,{send_page_view:e.isSiteKitScreen}),a=!0}}}}).call(this,r(18))},89:function(t,e,r){"use strict";r.d(e,"a",(function(){return p}));var n=r(5),o=r.n(n),a=r(6),i=r.n(a),u=r(14),c=r.n(u),s=r(51),l=r(30);function f(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function d(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?f(Object(r),!0).forEach((function(e){i()(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):f(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function p(t,e,r,n){var a=Object(s.a)(e);return function(){var e=c()(o.a.mark((function e(i,u,c,s){var f,p,v,g,b,h,y,m,O,w;return o.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(f=t.activeModules,p=t.referenceSiteURL,v=t.trackingEnabled,g=t.trackingID,b=t.userIDHash,h=t.userRoles,y=void 0===h?[]:h,m=t.isAuthenticated,O=t.pluginVersion,v){e.next=3;break}return e.abrupt("return");case 3:return r(),w={send_to:g,event_category:i,event_label:c,value:s,dimension1:p,dimension2:y.join(","),dimension3:b,dimension4:O||"",dimension5:Array.from(l.a).join(","),dimension6:f.join(","),dimension7:m?1:0},e.abrupt("return",new Promise((function(t){var e,r,o=setTimeout((function(){n.console.warn('Tracking event "'.concat(u,'" (category "').concat(i,'") took too long to fire.')),t()}),1e3),c=function(){clearTimeout(o),t()};a("event",u,d(d({},w),{},{event_callback:c})),(null===(e=n._gaUserPrefs)||void 0===e||null===(r=e.ioo)||void 0===r?void 0:r.call(e))&&c()})));case 6:case"end":return e.stop()}}),e)})));return function(t,r,n,o){return e.apply(this,arguments)}}()}}},[[1108,1,0]]]);