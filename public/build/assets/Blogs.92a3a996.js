import{f as a,g as l,o as u,c as d,b as s,a as o,w as f,G as _,t as p,u as t,L as y,d as v,H as B,U as L,A as w}from"./app.c7681763.js";import{_ as H}from"./Breadcrumbs.e90b204d.js";import{_ as M}from"./Pagination.39aef046.js";import{_ as T}from"./AspektinHero.0fe3158a.js";import{_ as C}from"./MainLayout.e19f8cd5.js";import"./NavigationBar.0a2eb923.js";import"./plugin-vue_export-helper.21dcd24c.js";const N={class:"col-span-5 sm:col-span-3 lg:col-span-4"},S={class:"text-sm italic mb-0 sm:mb-4"},V=["innerHTML"],U={key:0,class:"col-span-5 sm:col-span-2 lg:col-span-1"},j=["src"],z=["innerHTML"],h={__name:"BlogListItem",props:{item:Object,featured:Boolean},setup(n){const e=n,i=a(()=>{var c;const r=(c=l().props.value.category)==null?void 0:c.url;return r||"vsetko"});return(r,c)=>{var m;return u(),d("article",{class:_(["border p-4",n.featured?"border-4 mb-4 border-purple-100 bg-slate-50 shadow-sm":"bg-white shadow-md border-gray-300"])},[s("main",{class:_(e.item.feature_img&&e.featured?"grid grid-cols-5 gap-4":"")},[s("div",N,[o(t(y),{href:r.route("aspektin",[t(i),e.item.slug])},{default:f(()=>[s("h2",{class:_([n.featured?"text-2xl":"text-lg","text-red-600"])},p(e.item.title),3)]),_:1},8,["href"]),s("h3",S,p((m=e.item.authors)!=null?m:"red."),1),s("p",{class:"text-sm hidden sm:block",innerHTML:e.item.teaser},null,8,V)]),e.item.feature_img&&e.featured?(u(),d("div",U,[s("img",{src:e.item.feature_img,alt:"featured_image",class:"w-full rounded"},null,8,j),s("p",{class:"text-sm mt-4 sm:hidden",innerHTML:e.item.teaser},null,8,z)])):v("",!0)],2)],2)}}},A={class:"bg-books"},D={key:0,class:"text-3xl md:text-2xl text-red-600 font-bold my-4 text-center"},E={class:"px-4"},G={class:"mb-4 border-2 border-purple-100 p-4 bg-transparent"},I={__name:"BlogList",setup(n){const e=a(()=>l().props.value.category),i=a(()=>e.value[`name_${m.value}`]),r=a(()=>l().props.value.blogs),c=a(()=>l().props.value.featured),m=a(()=>l().props.value.locale),b=a(()=>l().props.value.navigation),x=a(()=>b.value.find(g=>g.route==="aspektin")[`name_${m.value}`]),k=a(()=>`${x.value} | ${i.value}`);return(g,O)=>(u(),d("section",null,[o(t(B),{title:t(k)},null,8,["title"]),s("div",A,[o(T),t(e).url!=="vsetko"?(u(),d("h1",D,[s("span",E,p(t(i)),1)])):v("",!0),o(H,{id:"aspektin"}),o(h,{item:t(c).data,featured:!0},null,8,["item"]),s("div",G,[o(t(L),{items:t(r).data,"column-width":230,gap:16},{default:f(({item:$})=>[o(h,{item:$},null,8,["item"])]),_:1},8,["items"])])]),o(M,{class:"mt-4",links:t(r).meta.links},null,8,["links"])]))}},W={__name:"Blogs",setup(n){return(e,i)=>(u(),w(C,null,{default:f(()=>[o(I)]),_:1}))}};export{W as default};