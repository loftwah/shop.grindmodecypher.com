(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[25],{269:function(e,t,a){"use strict";t.a={showProductLink:{type:"boolean",default:!0},showSaleBadge:{type:"boolean",default:!0},saleBadgeAlign:{type:"string",default:"right"},imageSizing:{type:"string",default:"full-size"},productId:{type:"number",default:0}}},270:function(e,t,a){"use strict";var c=a(6),l=a.n(c),n=a(0),s=a(1),o=a(4),i=a.n(o),r=a(2),u=a(29),d=a(56),m=a(65),b=a(207),g=(a(341),a(43));const p=()=>Object(n.createElement)("img",{src:r.PLACEHOLDER_IMG_SRC,alt:"",width:500,height:500}),O=e=>{let{image:t,onLoad:a,loaded:c,showFullSize:s,fallbackAlt:o}=e;const{thumbnail:i,src:r,srcset:u,sizes:d,alt:m}=t||{},b={alt:m||o,onLoad:a,hidden:!c,src:i,...s&&{src:r,srcSet:u,sizes:d}};return Object(n.createElement)(n.Fragment,null,b.src&&Object(n.createElement)("img",l()({"data-testid":"product-image"},b)),!c&&Object(n.createElement)(p,null))};t.a=Object(d.withProductDataContext)(e=>{const{className:t,imageSizing:a="full-size",showProductLink:c=!0,showSaleBadge:l,saleBadgeAlign:o="right"}=e,{parentClassName:r}=Object(u.useInnerBlockLayoutContext)(),{product:d}=Object(u.useProductDataContext)(),[j,h]=Object(n.useState)(!1),{dispatchStoreEvent:w}=Object(m.a)(),f=Object(g.d)(e),k=Object(g.a)(e),y=Object(g.c)(e);if(!d.id)return Object(n.createElement)("div",{className:i()(t,"wc-block-components-product-image",{[r+"__product-image"]:r},k.className),style:{...f.style,...k.style,...y.style}},Object(n.createElement)(p,null));const E=!!d.images.length,S=E?d.images[0]:null,L=c?"a":n.Fragment,z=Object(s.sprintf)(
/* translators: %s is referring to the product name */
Object(s.__)("Link to %s","woo-gutenberg-products-block"),d.name),_={href:d.permalink,...!E&&{"aria-label":z},onClick:()=>{w("product-view-link",{product:d})}};return Object(n.createElement)("div",{className:i()(t,"wc-block-components-product-image",{[r+"__product-image"]:r},k.className),style:{...f.style,...k.style,...y.style}},Object(n.createElement)(L,c&&_,!!l&&Object(n.createElement)(b.default,{align:o,product:d}),Object(n.createElement)(O,{fallbackAlt:d.name,image:S,onLoad:()=>h(!0),loaded:j,showFullSize:"cropped"!==a})))})},341:function(e,t){},557:function(e,t,a){"use strict";a.r(t);var c=a(56),l=a(270),n=a(269);t.default=Object(c.withFilteredAttributes)(n.a)(l.a)}}]);