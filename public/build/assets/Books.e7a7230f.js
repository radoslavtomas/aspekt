import{_ as k}from"./BasketWidget.6860b639.js";import{i as s,j as o,o as c,c as _,a as t,u as a,H as x,b as n,t as $,w as u,U as b,F as h}from"./app.fc0ad415.js";import{_ as y}from"./BookListItem.4cad3f18.js";import{_ as B}from"./Breadcrumbs.60c4caea.js";import{_ as w}from"./Pagination.66df5703.js";import{_ as S}from"./MainLayout.bc42a645.js";import"./BookSingleCtaButton.c93d993f.js";import"./NavigationBar.e79d4650.js";import"./plugin-vue_export-helper.21dcd24c.js";const F={class:"text-3xl md:text-2xl text-red-600 font-bold my-8 text-center"},H={class:"px-4"},N={class:"bg-books sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded"},V={__name:"BookList",setup(p){const r=s(()=>o().props.value.category),e=s(()=>r.value[`name_${l.value}`]),i=s(()=>o().props.value.books),l=s(()=>o().props.value.locale),d=s(()=>o().props.value.navigation),f=s(()=>`${s(()=>d.value.find(m=>m.route==="books")[`name_${l.value}`]).value} | ${e.value}`);return(g,m)=>(c(),_("section",null,[t(a(x),{title:a(f)},null,8,["title"]),t(B,{id:"books"}),n("h1",F,[n("span",H,$(a(e)),1)]),n("div",N,[t(a(b),{items:a(i).data,"column-width":230,gap:16},{default:u(({item:v})=>[t(y,{item:v},null,8,["item"])]),_:1},8,["items"])]),t(w,{class:"mt-4",links:a(i).meta.links},null,8,["links"])]))}},A={__name:"Books",setup(p){return(r,e)=>(c(),_(h,null,[t(S,null,{default:u(()=>[t(V)]),_:1}),t(k)],64))}};export{A as default};