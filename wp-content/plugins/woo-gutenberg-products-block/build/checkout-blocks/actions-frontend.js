(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[31],{106:function(e,t,n){"use strict";var c=n(0);n(135),t.a=()=>Object(c.createElement)("span",{className:"wc-block-components-spinner","aria-hidden":"true"})},135:function(e,t){},137:function(e,t,n){"use strict";var c=n(18),o=n.n(c),a=n(0),r=n(62),s=n(5),i=n.n(s),l=n(106);n(188),t.a=e=>{let{className:t,showSpinner:n=!1,children:c,...s}=e;const u=i()("wc-block-components-button",t,{"wc-block-components-button--loading":n});return Object(a.createElement)(r.a,o()({className:u},s),n&&Object(a.createElement)(l.a,null),Object(a.createElement)("span",{className:"wc-block-components-button__text"},c))}},188:function(e,t){},246:function(e,t,n){"use strict";n.d(t,"b",(function(){return r})),n.d(t,"a",(function(){return s}));var c=n(33),o=n(147);const a=function(){let e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];const{paymentMethods:t,expressPaymentMethods:n,paymentMethodsInitialized:a,expressPaymentMethodsInitialized:r}=Object(o.b)(),s=Object(c.a)(t),i=Object(c.a)(n);return{paymentMethods:e?i:s,isInitialized:e?r:a}},r=()=>a(!1),s=()=>a(!0)},327:function(e,t,n){"use strict";var c=n(0),o=n(32);const a=Object(c.createElement)(o.SVG,{xmlns:"http://www.w3.org/2000/SVG",viewBox:"0 0 24 24"},Object(c.createElement)("path",{fill:"none",d:"M0 0h24v24H0z"}),Object(c.createElement)("path",{d:"M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"}));t.a=a},351:function(e,t,n){"use strict";n.d(t,"a",(function(){return s}));var c=n(1),o=n(41),a=n(147),r=n(246);const s=()=>{const{onSubmit:e,isCalculating:t,isBeforeProcessing:n,isProcessing:s,isAfterProcessing:i,isComplete:l,hasError:u}=Object(o.b)(),{paymentMethods:b={}}=Object(r.b)(),{activePaymentMethod:m,currentStatus:d}=Object(a.b)(),p=b[m]||{},w=s||i||n,g=l&&!u;return{submitButtonText:(null==p?void 0:p.placeOrderButtonLabel)||Object(c.__)("Place Order","woo-gutenberg-products-block"),onSubmit:e,isCalculating:t,isDisabled:s||d.isDoingExpressPayment,waitingForProcessing:w,waitingForRedirect:g}}},352:function(e,t){},353:function(e,t){},377:function(e,t,n){"use strict";n.r(t);var c=n(134),o=n(0),a=n(5),r=n.n(a),s=n(2),i=n(1),l=n(84),u=n(108),b=n(32),m=Object(o.createElement)(b.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",width:"24",height:"24",fill:"currentColor"},Object(o.createElement)("path",{d:"M20 11H7.8l5.6-5.6L12 4l-8 8 8 8 1.4-1.4L7.8 13H20v-2z"}));n(353);var d=e=>{let{link:t}=e;return Object(o.createElement)("a",{href:t||l.c,className:"wc-block-components-checkout-return-to-cart-button"},Object(o.createElement)(u.a,{srcElement:m}),Object(i.__)("Return to Cart","woo-gutenberg-products-block"))},p=n(351),w=n(327),g=n(137),h=()=>{const{submitButtonText:e,onSubmit:t,isCalculating:n,isDisabled:c,waitingForProcessing:a,waitingForRedirect:r}=Object(p.a)();return Object(o.createElement)(g.a,{className:"wc-block-components-checkout-place-order-button",onClick:t,disabled:n||c||a||r,showSpinner:a},r?Object(o.createElement)(u.a,{srcElement:w.a,alt:Object(i.__)("Done","woo-gutenberg-products-block")}):e)};n(352);t.default=Object(c.withFilteredAttributes)({cartPageId:{type:"number",default:0},showReturnToCart:{type:"boolean",default:!0},className:{type:"string",default:""},lock:{type:"object",default:{move:!0,remove:!0}}})(e=>{let{cartPageId:t,showReturnToCart:n,className:c}=e;return Object(o.createElement)("div",{className:r()("wc-block-checkout__actions",c)},n&&Object(o.createElement)(d,{link:Object(s.getSetting)("page-"+t,!1)}),Object(o.createElement)(h,null))})}}]);