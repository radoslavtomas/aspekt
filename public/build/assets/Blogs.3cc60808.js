import{f as e,g as a,o as n,c as u,a as t,u as m,H as k,b as l,t as $,d as b,w as p,P as B,B as w}from"./app.e79a48e0.js";import{_}from"./BlogListItem.03b0d7ff.js";import{_ as y}from"./Breadcrumbs.2efa316d.js";import{_ as N}from"./Pagination.1bf673b6.js";import{_ as S}from"./AspektinHero.ece4b830.js";import{_ as V}from"./MainLayout.b9ad185d.js";import"./NavigationBar.73081ded.js";import"./plugin-vue_export-helper.21dcd24c.js";const C={class:"bg-wave"},H={key:0,class:"text-3xl md:text-2xl text-red-600 font-bold my-4 text-center"},P={class:"px-4"},D={class:"mb-4 border-2 border-purple-500 p-4 bg-transparent"},E={__name:"BlogList",setup(d){const s=e(()=>a().props.value.category),o=e(()=>s.value[`name_${i.value}`]),r=e(()=>a().props.value.blogs),v=e(()=>a().props.value.featured),i=e(()=>a().props.value.locale),f=e(()=>a().props.value.navigation),g=e(()=>f.value.find(c=>c.route==="aspektin")[`name_${i.value}`]),h=e(()=>`${g.value} | ${o.value}`);return(c,L)=>(n(),u("section",null,[t(m(k),{title:h.value},null,8,["title"]),l("div",C,[t(S),s.value.url!=="vsetko"?(n(),u("h1",H,[l("span",P,$(o.value),1)])):b("",!0),t(y,{id:"aspektin"}),t(_,{featured:!0,item:v.value.data},null,8,["item"]),l("div",D,[t(m(B),{"column-width":230,gap:16,items:r.value.data},{default:p(({item:x})=>[t(_,{item:x},null,8,["item"])]),_:1},8,["items"])])]),t(N,{links:r.value.meta.links,class:"mt-4"},null,8,["links"])]))}},J={__name:"Blogs",setup(d){return window.scrollTo({top:0,behavior:"smooth"}),(s,o)=>(n(),w(V,null,{default:p(()=>[t(E)]),_:1}))}};export{J as default};
