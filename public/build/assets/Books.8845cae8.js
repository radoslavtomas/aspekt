import{f as t,g as a,o as n,c,a as e,u as m,H as k,b as u,t as x,d as b,w as _,P as h,A as $}from"./app.ddfc9217.js";import{_ as y}from"./BookListItem.7fd07e48.js";import{_ as B}from"./Breadcrumbs.977d4074.js";import{_ as w}from"./Pagination.f20e926b.js";import{_ as S}from"./MainLayout.97f22fcc.js";import"./BookSingleCtaButton.4d3625d7.js";import"./NavigationBar.7978bd1d.js";import"./plugin-vue_export-helper.21dcd24c.js";const N={key:0,class:"text-3xl md:text-2xl text-red-600 font-bold my-4 text-center"},V={class:"px-4"},C={class:"bg-books sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded"},H={__name:"BookList",setup(p){const s=t(()=>a().props.value.category),o=t(()=>s.value[`name_${l.value}`]),r=t(()=>a().props.value.books),l=t(()=>a().props.value.locale),d=t(()=>a().props.value.navigation),v=t(()=>`${t(()=>d.value.find(i=>i.route==="books")[`name_${l.value}`]).value} | ${o.value}`);return(f,i)=>(n(),c("section",null,[e(m(k),{title:v.value},null,8,["title"]),s.value.url!=="vsetko"?(n(),c("h1",N,[u("span",V,x(o.value),1)])):b("",!0),e(B,{id:"books"}),u("div",C,[e(m(h),{items:r.value.data,"column-width":230,gap:16},{default:_(({item:g})=>[e(y,{item:g},null,8,["item"])]),_:1},8,["items"])]),e(w,{class:"mt-4",links:r.value.meta.links},null,8,["links"])]))}},F={__name:"Books",setup(p){return(s,o)=>(n(),$(S,null,{default:_(()=>[e(H)]),_:1}))}};export{F as default};
