(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[52],{113:function(e,t,c){"use strict";var o=c(13),n=c.n(o),i=c(0),s=c(150),a=c(6),l=c.n(a);c(214);const r=e=>({thousandSeparator:null==e?void 0:e.thousandSeparator,decimalSeparator:null==e?void 0:e.decimalSeparator,decimalScale:null==e?void 0:e.minorUnit,fixedDecimalScale:!0,prefix:null==e?void 0:e.prefix,suffix:null==e?void 0:e.suffix,isNumericString:!0});t.a=e=>{let{className:t,value:c,currency:o,onValueChange:a,displayType:p="text",...u}=e;const d="string"==typeof c?parseInt(c,10):c;if(!Number.isFinite(d))return null;const m=d/10**o.minorUnit;if(!Number.isFinite(m))return null;const h=l()("wc-block-formatted-money-amount","wc-block-components-formatted-money-amount",t),b={...u,...r(o),value:void 0,currency:void 0,onValueChange:void 0},g=a?e=>{const t=+e.value*10**o.minorUnit;a(t)}:()=>{};return Object(i.createElement)(s.a,n()({className:h,displayType:p},b,{value:m,onValueChange:g}))}},214:function(e,t){},284:function(e,t,c){"use strict";var o=c(13),n=c.n(o),i=c(0),s=c(6),a=c.n(s);c(285),t.a=e=>{let{children:t,className:c,headingLevel:o,...s}=e;const l=a()("wc-block-components-title",c),r="h"+o;return Object(i.createElement)(r,n()({className:l},s),t)}},285:function(e,t){},287:function(e,t){},288:function(e,t,c){"use strict";var o=c(1);t.a=e=>{let{defaultTitle:t=Object(o.__)("Step","woo-gutenberg-products-block"),defaultDescription:c=Object(o.__)("Step description text.","woo-gutenberg-products-block"),defaultShowStepNumber:n=!0}=e;return{title:{type:"string",default:t},description:{type:"string",default:c},showStepNumber:{type:"boolean",default:n}}}},310:function(e,t,c){"use strict";var o=c(0),n=c(6),i=c.n(n),s=c(284);c(287);const a=e=>{let{title:t,stepHeadingContent:c}=e;return Object(o.createElement)("div",{className:"wc-block-components-checkout-step__heading"},Object(o.createElement)(s.a,{"aria-hidden":"true",className:"wc-block-components-checkout-step__title",headingLevel:"2"},t),!!c&&Object(o.createElement)("span",{className:"wc-block-components-checkout-step__heading-content"},c))};t.a=e=>{let{id:t,className:c,title:n,legend:s,description:l,children:r,disabled:p=!1,showStepNumber:u=!0,stepHeadingContent:d=(()=>{})}=e;const m=s||n?"fieldset":"div";return Object(o.createElement)(m,{className:i()(c,"wc-block-components-checkout-step",{"wc-block-components-checkout-step--with-step-number":u,"wc-block-components-checkout-step--disabled":p}),id:t,disabled:p},!(!s&&!n)&&Object(o.createElement)("legend",{className:"screen-reader-text"},s||n),!!n&&Object(o.createElement)(a,{title:n,stepHeadingContent:d()}),Object(o.createElement)("div",{className:"wc-block-components-checkout-step__container"},!!l&&Object(o.createElement)("p",{className:"wc-block-components-checkout-step__description"},l),Object(o.createElement)("div",{className:"wc-block-components-checkout-step__content"},r)))}},442:function(e,t){},496:function(e,t,c){"use strict";c.r(t);var o=c(0),n=c(6),i=c.n(n),s=c(135),a=c(310),l=c(7),r=c(3),p=c(120),u=c(37),d=c(1),m=c(494),h=c(492),b=c(75),g=c(478),k=c(479),w=(c(442),c(2)),_=c(43),O=c(113);const j=e=>{let{minRate:t,maxRate:c,multiple:n=!1}=e;if(void 0===t||void 0===c)return null;const i=Object(w.getSetting)("displayCartPricesIncludingTax",!1)?parseInt(t.price,10)+parseInt(t.taxes,10):parseInt(t.price,10),s=Object(w.getSetting)("displayCartPricesIncludingTax",!1)?parseInt(c.price,10)+parseInt(c.taxes,10):parseInt(c.price,10),a=0===i?Object(o.createElement)("em",null,Object(d.__)("free","woo-gutenberg-products-block")):Object(o.createElement)(O.a,{currency:Object(_.getCurrencyFromPriceResponse)(t),value:i});return Object(o.createElement)("span",{className:"wc-block-checkout__shipping-method-option-price"},i!==s||n?Object(o.createInterpolateElement)(0===i&&0===s?"<price />":Object(d.__)("from <price />","woo-gutenberg-products-block"),{price:a}):a)};var v=c(245);function f(e){return e?{min:e.reduce((e,t)=>Object(v.c)(t.method_id)?e:void 0===e||parseInt(t.price,10)<parseInt(e.price,10)?t:e,void 0),max:e.reduce((e,t)=>Object(v.c)(t.method_id)?e:void 0===e||parseInt(t.price,10)>parseInt(e.price,10)?t:e,void 0)}:{min:void 0,max:void 0}}function E(e){return e?{min:e.reduce((e,t)=>Object(v.c)(t.method_id)?e:void 0===e||t.price<e.price?t:e,void 0),max:e.reduce((e,t)=>Object(v.c)(t.method_id)?e:void 0===e||t.price>e.price?t:e,void 0)}:{min:void 0,max:void 0}}const x=Object(d.__)("Local Pickup","woo-gutenberg-products-block"),N=Object(d.__)("Shipping","woo-gutenberg-products-block"),S=e=>{let{checked:t,rate:c,showPrice:n,showIcon:s,toggleText:a,multiple:l}=e;return Object(o.createElement)(m.a,{value:"pickup",className:i()("wc-block-checkout__shipping-method-option",{"wc-block-checkout__shipping-method-option--selected":"pickup"===t})},!0===s&&Object(o.createElement)(b.a,{icon:g.a,size:28,className:"wc-block-checkout__shipping-method-option-icon"}),Object(o.createElement)("span",{className:"wc-block-checkout__shipping-method-option-title"},a),!0===n&&Object(o.createElement)(j,{multiple:l,minRate:c.min,maxRate:c.max}))},y=e=>{let{checked:t,rate:c,showPrice:n,showIcon:s,toggleText:a}=e;const l=void 0===c.min?Object(o.createElement)("span",{className:"wc-block-checkout__shipping-method-option-price"},Object(d.__)("calculated with an address","woo-gutenberg-products-block")):Object(o.createElement)(j,{minRate:c.min,maxRate:c.max});return Object(o.createElement)(m.a,{value:"shipping",className:i()("wc-block-checkout__shipping-method-option",{"wc-block-checkout__shipping-method-option--selected":"shipping"===t})},!0===s&&Object(o.createElement)(b.a,{icon:k.a,size:28,className:"wc-block-checkout__shipping-method-option-icon"}),Object(o.createElement)("span",{className:"wc-block-checkout__shipping-method-option-title"},a),!0===n&&l)};var I=e=>{var t,c;let{checked:n,onChange:i,showPrice:s,showIcon:a,localPickupText:l,shippingText:r}=e;const{shippingRates:u}=Object(p.a)();return Object(o.createElement)(h.a,{id:"shipping-method",className:"wc-block-checkout__shipping-method-container",label:"options",onChange:i,checked:n},Object(o.createElement)(y,{checked:n,rate:f(null===(t=u[0])||void 0===t?void 0:t.shipping_rates),showPrice:s,showIcon:a,toggleText:r||N}),Object(o.createElement)(S,{checked:n,rate:E(null===(c=u[0])||void 0===c?void 0:c.shipping_rates),multiple:u.length>1,showPrice:s,showIcon:a,toggleText:l||x}))},C=c(288),T={...Object(C.a)({defaultTitle:Object(d.__)("Shipping method","woo-gutenberg-products-block"),defaultDescription:Object(d.__)("Select how you would like to receive your order.","woo-gutenberg-products-block")}),className:{type:"string",default:""},showIcon:{type:"boolean",default:!0},showPrice:{type:"boolean",default:!0},localPickupText:{type:"string",default:x},shippingText:{type:"string",default:N},lock:{type:"object",default:{move:!0,remove:!0}}};t.default=Object(s.withFilteredAttributes)(T)(e=>{let{title:t,description:c,showStepNumber:n,children:s,className:d,showPrice:m,showIcon:h,shippingText:b,localPickupText:g}=e;const{checkoutIsProcessing:k,prefersCollection:w}=Object(l.useSelect)(e=>{const t=e(r.CHECKOUT_STORE_KEY);return{checkoutIsProcessing:t.isProcessing(),prefersCollection:t.prefersCollection()}}),{setPrefersCollection:_}=Object(l.useDispatch)(r.CHECKOUT_STORE_KEY),{shippingRates:O,needsShipping:j,hasCalculatedShipping:v,isCollectable:f}=Object(p.a)();return j&&v&&O&&f&&u.e?Object(o.createElement)(a.a,{id:"shipping-method",disabled:k,className:i()("wc-block-checkout__shipping-method",d),title:t,description:c,showStepNumber:n},Object(o.createElement)(I,{checked:w?"pickup":"shipping",onChange:e=>{_("pickup"===e)},showPrice:m,showIcon:h,localPickupText:g,shippingText:b}),s):null})}}]);