import{f as t,g as a,o as n,c,a as e,u as m,H as k,b as u,t as h,d as x,w as _,P as b,B as $}from"./app.e79a48e0.js";import{_ as w}from"./BookListItem.fb37a441.js";import{_ as y}from"./Breadcrumbs.2efa316d.js";import{_ as B}from"./Pagination.1bf673b6.js";import{_ as S}from"./MainLayout.b9ad185d.js";import"./BookSingleCtaButton.c16c7794.js";import"./NavigationBar.73081ded.js";import"./plugin-vue_export-helper.21dcd24c.js";const N={key:0,class:"text-3xl md:text-2xl text-red-600 font-bold my-4 text-center"},V={class:"px-4"},C={class:"bg-bwave sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded"},H={__name:"BookList",setup(p){const o=t(()=>a().props.value.category),s=t(()=>o.value[`name_${l.value}`]),r=t(()=>a().props.value.books),l=t(()=>a().props.value.locale),d=t(()=>a().props.value.navigation),v=t(()=>`${t(()=>d.value.find(i=>i.route==="books")[`name_${l.value}`]).value} | ${s.value}`);return(f,i)=>(n(),c("section",null,[e(m(k),{title:v.value},null,8,["title"]),o.value.url!=="vsetko"?(n(),c("h1",N,[u("span",V,h(s.value),1)])):x("",!0),e(y,{id:"books"}),u("div",C,[e(m(b),{"column-width":230,gap:16,items:r.value.data},{default:_(({item:g})=>[e(w,{item:g},null,8,["item"])]),_:1},8,["items"])]),e(B,{links:r.value.meta.links,class:"mt-4"},null,8,["links"])]))}},A={__name:"Books",setup(p){return window.scrollTo({top:0,behavior:"smooth"}),(o,s)=>(n(),$(S,null,{default:_(()=>[e(H)]),_:1}))}};export{A as default};
