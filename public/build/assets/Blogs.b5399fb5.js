import{f as s,g as c,o as m,c as p,b as r,a,w as f,E as _,t as g,u as e,L as y,P as B,d as b,H as w,U as L,A as H}from"./app.b70aaf37.js";import{_ as S}from"./Breadcrumbs.aedecf3b.js";import{_ as z}from"./Pagination.af57e223.js";import{_ as C}from"./AspektinHero.876e2b95.js";import{_ as N}from"./MainLayout.6c604f69.js";import"./NavigationBar.1238e60e.js";import"./plugin-vue_export-helper.21dcd24c.js";const V={class:"col-span-5 sm:col-span-3 lg:col-span-4 order-2 sm:order-1"},j={class:"text-sm italic mb-4"},E=["innerHTML"],v={__name:"BlogListItem",props:{item:Object,featured:Boolean},setup(o){const t=o,i=s(()=>{var n;const l=(n=c().props.value.category)==null?void 0:n.url;return l||"vsetko"}),u=s(()=>t.item.feature_img?t.item.feature_img:"/assets/img/default_feature_image.jpg");return(l,n)=>{var d;return m(),p("article",{class:_(["border p-4",o.featured?"border-4 mb-4 border-purple-100 bg-slate-50 shadow-sm":"bg-white shadow-md border-gray-300"])},[r("main",{class:_(o.featured?"grid grid-cols-5 gap-4":"")},[r("div",V,[a(e(y),{href:l.route("aspektin",[e(i),t.item.slug])},{default:f(()=>[r("h2",{class:_([o.featured?"text-2xl":"text-lg","text-red-600"])},g(t.item.title),3)]),_:1},8,["href"]),r("h3",j,g((d=t.item.authors)!=null?d:"red."),1),r("p",{class:"text-xs",innerHTML:t.item.teaser},null,8,E)]),o.featured?(m(),p("div",{key:0,class:"col-span-5 sm:col-span-2 lg:col-span-1 order-1 sm:order-2 min-h-[13rem]",style:B(`background: url(${e(u)}) center center no-repeat;background-size: cover;`)},null,4)):b("",!0)],2)],2)}}},I={class:"bg-books"},M={key:0,class:"text-3xl md:text-2xl text-red-600 font-bold my-4 text-center"},P={class:"px-4"},T={class:"mb-4 border-2 border-purple-100 p-4 bg-transparent"},U={__name:"BlogList",setup(o){const t=s(()=>c().props.value.category),i=s(()=>t.value[`name_${n.value}`]),u=s(()=>c().props.value.blogs),l=s(()=>c().props.value.featured),n=s(()=>c().props.value.locale),d=s(()=>c().props.value.navigation),x=s(()=>d.value.find(h=>h.route==="aspektin")[`name_${n.value}`]),k=s(()=>`${x.value} | ${i.value}`);return(h,A)=>(m(),p("section",null,[a(e(w),{title:e(k)},null,8,["title"]),r("div",I,[a(C),e(t).url!=="vsetko"?(m(),p("h1",M,[r("span",P,g(e(i)),1)])):b("",!0),a(S,{id:"aspektin"}),a(v,{item:e(l).data,featured:!0},null,8,["item"]),r("div",T,[a(e(L),{items:e(u).data,"column-width":230,gap:16},{default:f(({item:$})=>[a(v,{item:$},null,8,["item"])]),_:1},8,["items"])])]),a(z,{class:"mt-4",links:e(u).meta.links},null,8,["links"])]))}},Q={__name:"Blogs",setup(o){return(t,i)=>(m(),H(N,null,{default:f(()=>[a(U)]),_:1}))}};export{Q as default};