(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[42],{113:function(e,t,c){"use strict";var r=c(13),a=c.n(r),n=c(0),l=c(150),s=c(6),o=c.n(s);c(214);const i=e=>({thousandSeparator:null==e?void 0:e.thousandSeparator,decimalSeparator:null==e?void 0:e.decimalSeparator,decimalScale:null==e?void 0:e.minorUnit,fixedDecimalScale:!0,prefix:null==e?void 0:e.prefix,suffix:null==e?void 0:e.suffix,isNumericString:!0});t.a=e=>{let{className:t,value:c,currency:r,onValueChange:s,displayType:m="text",...u}=e;const p="string"==typeof c?parseInt(c,10):c;if(!Number.isFinite(p))return null;const b=p/10**r.minorUnit;if(!Number.isFinite(b))return null;const d=o()("wc-block-formatted-money-amount","wc-block-components-formatted-money-amount",t),O={...u,...i(r),value:void 0,currency:void 0,onValueChange:void 0},j=s?e=>{const t=+e.value*10**r.minorUnit;s(t)}:()=>{};return Object(n.createElement)(l.a,a()({className:d,displayType:m},O,{value:b,onValueChange:j}))}},214:function(e,t){},22:function(e,t,c){"use strict";var r=c(0),a=c(6),n=c.n(a);t.a=e=>{let t,{label:c,screenReaderLabel:a,wrapperElement:l,wrapperProps:s={}}=e;const o=null!=c,i=null!=a;return!o&&i?(t=l||"span",s={...s,className:n()(s.className,"screen-reader-text")},Object(r.createElement)(t,s,a)):(t=l||r.Fragment,o&&i&&c!==a?Object(r.createElement)(t,s,Object(r.createElement)("span",{"aria-hidden":"true"},c),Object(r.createElement)("span",{className:"screen-reader-text"},a)):Object(r.createElement)(t,s,c))}},299:function(e,t,c){"use strict";var r=c(0),a=c(1),n=c(113),l=c(6),s=c.n(l),o=c(43);c(300);const i=e=>{let{currency:t,maxPrice:c,minPrice:l,priceClassName:i,priceStyle:m={}}=e;return Object(r.createElement)(r.Fragment,null,Object(r.createElement)("span",{className:"screen-reader-text"},Object(a.sprintf)(
/* translators: %1$s min price, %2$s max price */
Object(a.__)("Price between %1$s and %2$s","woo-gutenberg-products-block"),Object(o.formatPrice)(l),Object(o.formatPrice)(c))),Object(r.createElement)("span",{"aria-hidden":!0},Object(r.createElement)(n.a,{className:s()("wc-block-components-product-price__value",i),currency:t,value:l,style:m})," — ",Object(r.createElement)(n.a,{className:s()("wc-block-components-product-price__value",i),currency:t,value:c,style:m})))},m=e=>{let{currency:t,regularPriceClassName:c,regularPriceStyle:l,regularPrice:o,priceClassName:i,priceStyle:m,price:u}=e;return Object(r.createElement)(r.Fragment,null,Object(r.createElement)("span",{className:"screen-reader-text"},Object(a.__)("Previous price:","woo-gutenberg-products-block")),Object(r.createElement)(n.a,{currency:t,renderText:e=>Object(r.createElement)("del",{className:s()("wc-block-components-product-price__regular",c),style:l},e),value:o}),Object(r.createElement)("span",{className:"screen-reader-text"},Object(a.__)("Discounted price:","woo-gutenberg-products-block")),Object(r.createElement)(n.a,{currency:t,renderText:e=>Object(r.createElement)("ins",{className:s()("wc-block-components-product-price__value","is-discounted",i),style:m},e),value:u}))};t.a=e=>{let{align:t,className:c,currency:a,format:l="<price/>",maxPrice:o,minPrice:u,price:p,priceClassName:b,priceStyle:d,regularPrice:O,regularPriceClassName:j,regularPriceStyle:g,spacingStyle:_}=e;const y=s()(c,"price","wc-block-components-product-price",{["wc-block-components-product-price--align-"+t]:t});l.includes("<price/>")||(l="<price/>",console.error("Price formats need to include the `<price/>` tag."));const v=O&&p!==O;let f=Object(r.createElement)("span",{className:s()("wc-block-components-product-price__value",b)});return v?f=Object(r.createElement)(m,{currency:a,price:p,priceClassName:b,priceStyle:d,regularPrice:O,regularPriceClassName:j,regularPriceStyle:g}):void 0!==u&&void 0!==o?f=Object(r.createElement)(i,{currency:a,maxPrice:o,minPrice:u,priceClassName:b,priceStyle:d}):p&&(f=Object(r.createElement)(n.a,{className:s()("wc-block-components-product-price__value",b),currency:a,value:p,style:d})),Object(r.createElement)("span",{className:y,style:_},Object(r.createInterpolateElement)(l,{price:f}))}},300:function(e,t){},301:function(e,t,c){"use strict";var r=c(13),a=c.n(r),n=c(0),l=c(30),s=c(6),o=c.n(s);c(302),t.a=e=>{let{className:t="",disabled:c=!1,name:r,permalink:s="",target:i,rel:m,style:u,onClick:p,...b}=e;const d=o()("wc-block-components-product-name",t);if(c){const e=b;return Object(n.createElement)("span",a()({className:d},e,{dangerouslySetInnerHTML:{__html:Object(l.decodeEntities)(r)}}))}return Object(n.createElement)("a",a()({className:d,href:s,target:i},b,{dangerouslySetInnerHTML:{__html:Object(l.decodeEntities)(r)},style:u}))}},302:function(e,t){},308:function(e,t,c){"use strict";var r=c(0),a=c(6),n=c.n(a);c(363),t.a=e=>{let{children:t,className:c}=e;return Object(r.createElement)("div",{className:n()("wc-block-components-product-badge",c)},t)}},339:function(e,t,c){"use strict";var r=c(0),a=c(130),n=c(131);const l=e=>{const t=e.indexOf("</p>");return-1===t?e:e.substr(0,t+4)},s=e=>e.replace(/<\/?[a-z][^>]*?>/gi,""),o=(e,t)=>e.replace(/[\s|\.\,]+$/i,"")+t,i=function(e,t){let c=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"&hellip;";const r=s(e),a=r.split(" ").splice(0,t).join(" ");return Object(n.autop)(o(a,c))},m=function(e,t){let c=!(arguments.length>2&&void 0!==arguments[2])||arguments[2],r=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"&hellip;";const a=s(e),l=a.slice(0,t);if(c)return Object(n.autop)(o(l,r));const i=l.match(/([\s]+)/g),m=i?i.length:0,u=a.slice(0,t+m);return Object(n.autop)(o(u,r))};t.a=e=>{let{source:t,maxLength:c=15,countType:s="words",className:o="",style:u={}}=e;const p=Object(r.useMemo)(()=>function(e){let t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:15,c=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"words";const r=Object(n.autop)(e),s=Object(a.count)(r,c);if(s<=t)return r;const o=l(r),u=Object(a.count)(o,c);return u<=t?o:"words"===c?i(o,t):m(o,t,"characters_including_spaces"===c)}(t,c,s),[t,c,s]);return Object(r.createElement)(r.RawHTML,{style:u,className:o},p)}},362:function(e,t){},363:function(e,t){},364:function(e,t){},365:function(e,t){},395:function(e,t,c){"use strict";var r=c(13),a=c.n(r),n=c(0),l=c(30),s=c(2);c(362),t.a=e=>{let{image:t={},fallbackAlt:c=""}=e;const r=t.thumbnail?{src:t.thumbnail,alt:Object(l.decodeEntities)(t.alt)||c||"Product Image"}:{src:s.PLACEHOLDER_IMG_SRC,alt:""};return Object(n.createElement)("img",a()({className:"wc-block-components-product-image"},r,{alt:r.alt}))}},396:function(e,t,c){"use strict";var r=c(0),a=c(1),n=c(308);t.a=()=>Object(r.createElement)(n.a,{className:"wc-block-components-product-backorder-badge"},Object(a.__)("Available on backorder","woo-gutenberg-products-block"))},397:function(e,t,c){"use strict";var r=c(0),a=c(1),n=c(308);t.a=e=>{let{lowStockRemaining:t}=e;return t?Object(r.createElement)(n.a,{className:"wc-block-components-product-low-stock-badge"},Object(a.sprintf)(
/* translators: %d stock amount (number of items in stock for product) */
Object(a.__)("%d left in stock","woo-gutenberg-products-block"),t)):null}},410:function(e,t,c){"use strict";var r=c(0),a=c(5),n=c(30);c(365);var l=e=>{let{details:t=[]}=e;return Array.isArray(t)?(t=t.filter(e=>!e.hidden),0===t.length?null:Object(r.createElement)("ul",{className:"wc-block-components-product-details"},t.map(e=>{const t=(null==e?void 0:e.key)||e.name||"",c=(null==e?void 0:e.className)||(t?"wc-block-components-product-details__"+Object(a.kebabCase)(t):"");return Object(r.createElement)("li",{key:t+(e.display||e.value),className:c},t&&Object(r.createElement)(r.Fragment,null,Object(r.createElement)("span",{className:"wc-block-components-product-details__name"},Object(n.decodeEntities)(t),":")," "),Object(r.createElement)("span",{className:"wc-block-components-product-details__value"},Object(n.decodeEntities)(e.display||e.value)))}))):null},s=c(339),o=c(37),i=e=>{let{className:t,shortDescription:c="",fullDescription:a=""}=e;const n=c||a;return n?Object(r.createElement)(s.a,{className:t,source:n,maxLength:15,countType:o.o.wordCountType||"words"}):null};c(364),t.a=e=>{let{shortDescription:t="",fullDescription:c="",itemData:a=[],variation:n=[]}=e;return Object(r.createElement)("div",{className:"wc-block-components-product-metadata"},Object(r.createElement)(i,{className:"wc-block-components-product-metadata__description",shortDescription:t,fullDescription:c}),Object(r.createElement)(l,{details:a}),Object(r.createElement)(l,{details:n.map(e=>{let{attribute:t="",value:c}=e;return{key:t,value:c}})}))}},453:function(e,t){},501:function(e,t,c){"use strict";c.r(t);var r=c(0),a=c(1),n=c(270),l=c(11),s=c(6),o=c.n(s),i=c(22),m=c(299),u=c(301),p=c(43),b=c(394),d=c(2),O=c(42),j=c(23),g=c(396),_=c(395),y=c(397),v=c(410);const f=e=>Object(l.mustContain)(e,"<price/>");var E=e=>{let{cartItem:t}=e;const{images:c,low_stock_remaining:n,show_backorder_badge:s,name:E,permalink:k,prices:w,quantity:N,short_description:h,description:P,item_data:x,variation:C,totals:S,extensions:I}=t,{receiveCart:T,...D}=Object(O.a)(),F=Object(r.useMemo)(()=>({context:"summary",cartItem:t,cart:D}),[t,D]),L=Object(p.getCurrencyFromPriceResponse)(w),A=Object(l.applyCheckoutFilter)({filterName:"itemName",defaultValue:E,extensions:I,arg:F}),R=Object(b.a)({amount:parseInt(w.raw_prices.regular_price,10),precision:Object(j.a)(w.raw_prices.precision)?parseInt(w.raw_prices.precision,10):w.raw_prices.precision}).convertPrecision(L.minorUnit).getAmount(),$=Object(b.a)({amount:parseInt(w.raw_prices.price,10),precision:Object(j.a)(w.raw_prices.precision)?parseInt(w.raw_prices.precision,10):w.raw_prices.precision}).convertPrecision(L.minorUnit).getAmount(),V=Object(p.getCurrencyFromPriceResponse)(S);let M=parseInt(S.line_subtotal,10);Object(d.getSetting)("displayCartPricesIncludingTax",!1)&&(M+=parseInt(S.line_subtotal_tax,10));const U=Object(b.a)({amount:M,precision:V.minorUnit}).getAmount(),H=Object(l.applyCheckoutFilter)({filterName:"subtotalPriceFormat",defaultValue:"<price/>",extensions:I,arg:F,validation:f}),W=Object(l.applyCheckoutFilter)({filterName:"cartItemPrice",defaultValue:"<price/>",extensions:I,arg:F,validation:f}),B=Object(l.applyCheckoutFilter)({filterName:"cartItemClass",defaultValue:"",extensions:I,arg:F});return Object(r.createElement)("div",{className:o()("wc-block-components-order-summary-item",B)},Object(r.createElement)("div",{className:"wc-block-components-order-summary-item__image"},Object(r.createElement)("div",{className:"wc-block-components-order-summary-item__quantity"},Object(r.createElement)(i.a,{label:N.toString(),screenReaderLabel:Object(a.sprintf)(
/* translators: %d number of products of the same type in the cart */
Object(a._n)("%d item","%d items",N,"woo-gutenberg-products-block"),N)})),Object(r.createElement)(_.a,{image:c.length?c[0]:{},fallbackAlt:A})),Object(r.createElement)("div",{className:"wc-block-components-order-summary-item__description"},Object(r.createElement)(u.a,{disabled:!0,name:A,permalink:k}),Object(r.createElement)(m.a,{currency:L,price:$,regularPrice:R,className:"wc-block-components-order-summary-item__individual-prices",priceClassName:"wc-block-components-order-summary-item__individual-price",regularPriceClassName:"wc-block-components-order-summary-item__regular-individual-price",format:H}),s?Object(r.createElement)(g.a,null):!!n&&Object(r.createElement)(y.a,{lowStockRemaining:n}),Object(r.createElement)(v.a,{shortDescription:h,fullDescription:P,itemData:x,variation:C})),Object(r.createElement)("span",{className:"screen-reader-text"},Object(a.sprintf)(
/* translators: %1$d is the number of items, %2$s is the item name and %3$s is the total price including the currency symbol. */
Object(a._n)("Total price for %1$d %2$s item: %3$s","Total price for %1$d %2$s items: %3$s",N,"woo-gutenberg-products-block"),N,A,Object(p.formatPrice)(U,V))),Object(r.createElement)("div",{className:"wc-block-components-order-summary-item__total-price","aria-hidden":"true"},Object(r.createElement)(m.a,{currency:V,format:W,price:U})))};c(453);var k=e=>{let{cartItems:t=[]}=e;const{isLarge:c,hasContainerWidth:s}=Object(n.b)();return s?Object(r.createElement)(l.Panel,{className:"wc-block-components-order-summary",initialOpen:c,hasBorder:!1,title:Object(r.createElement)("span",{className:"wc-block-components-order-summary__button-text"},Object(a.__)("Order summary","woo-gutenberg-products-block")),titleTag:"h2"},Object(r.createElement)("div",{className:"wc-block-components-order-summary__content"},t.map(e=>Object(r.createElement)(E,{key:e.key,cartItem:e})))):null};t.default=e=>{let{className:t}=e;const{cartItems:c}=Object(O.a)();return Object(r.createElement)(l.TotalsWrapper,{className:t},Object(r.createElement)(k,{cartItems:c}))}}}]);