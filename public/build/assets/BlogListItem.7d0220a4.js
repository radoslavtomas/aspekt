import{f as g,g as f,o as i,c as l,b as t,a as c,w as n,y as a,t as m,u,L as d,d as h,h as _}from"./app.b4a238e4.js";const b={class:"col-span-5 sm:col-span-3 lg:col-span-4"},x={key:0,class:"text-sm italic mb-1 mt-1"},k=["innerHTML"],y={key:0,class:"col-span-5 sm:col-span-2 lg:col-span-1"},L=["src"],w=["innerHTML"],B={__name:"BlogListItem",props:{item:Object,featured:Boolean},setup(r){const p=g(()=>{var o;const s=(o=f().props.value.category)==null?void 0:o.url;return s||"vsetko"}),e=r;return(s,o)=>(i(),l("article",{class:a([r.featured?"border-4 mb-4 border-purple-500 bg-slate-50 shadow-sm":"bg-white shadow-md border-gray-300","border p-4"])},[t("main",{class:a(e.item.feature_img&&e.featured?"grid grid-cols-5 gap-4":"")},[t("div",b,[c(u(d),{href:s.route("aspektin",[p.value,e.item.slug])},{default:n(()=>[t("h2",{class:a([r.featured?"text-2xl":"text-lg","text-red-600"])},m(e.item.title),3)]),_:1},8,["href"]),e.item.subtitle?(i(),l("h3",x,m(e.item.subtitle),1)):h("",!0),t("h3",{class:a([e.item.subtitle?"":"mt-1","text-sm italic mb-0 sm:mb-4 text-red-600"])},[c(u(d),{href:s.route("search",{parameter:"author",query:e.item.authors?e.item.authors:"red."})},{default:n(()=>[_(m(e.item.authors?e.item.authors:"red."),1)]),_:1},8,["href"])],2),t("p",{class:"text-sm hidden sm:block",innerHTML:e.item.teaser},null,8,k)]),e.item.feature_img&&e.featured?(i(),l("div",y,[t("img",{src:e.item.feature_img,alt:"featured_image",class:"w-full rounded"},null,8,L),t("p",{class:"text-sm mt-4 sm:hidden",innerHTML:e.item.teaser},null,8,w)])):h("",!0)],2)],2))}};export{B as _};
