import{_ as k}from"./MainLayout.8d599799.js";import{H as f}from"./head.ec1d62f2.js";import{o as a,c as n,b as e,a as l,w as _,t as i,u as d,L as v,f as s,D as y,B as p,e as g,F as b,G as x,g as o}from"./app.372134bc.js";import{_ as j}from"./Breadcrumbs.12fe74ed.js";import{_ as w}from"./Pagination.38a4eabc.js";import"./NavigationBar.3d578b6e.js";import"./plugin-vue_export-helper.21dcd24c.js";const $={class:"border-b border-gray-200 last:border-b-0 mb-1 rounded px-2 py-6"},B={class:"text-lg text-red-600 hover:text-red-700"},S=["innerHTML"],A={__name:"SearchResultItem",props:{item:Object},setup(u){const t=u;return(c,r)=>(a(),n("article",$,[e("header",B,[l(d(v),{href:t.item.link},{default:_(()=>[e("strong",null,i(t.item.title),1)]),_:1},8,["href"])]),e("main",{class:"text-sm italic my-1",innerHTML:t.item.teaser},null,8,S),e("footer",null,[e("small",null,i(t.item.created_at),1)])]))}},L={key:0,class:"max-w-[48rem] mx-auto mt-10"},H={class:""},I={key:1,class:"max-w-[48rem] mx-auto mt-10"},q={__name:"SearchResult",setup(u){window.scrollTo({top:0,behavior:"smooth"});const t=g();s(()=>t.getters.lang);const c=s(()=>o().props.value.locale);s(()=>o().props.value.parameter);const r=s(()=>o().props.value.items);s(()=>o().props.value.books),s(()=>o().props.value.people);const h={en:{search:"Search results for",noresults:"Unfortunately, we didn't find anything...",options:{authors:"Authors",blogs:"AspektIn",books:"Books",events:"Events",pages:"Pages",njuvinky:"Njuvinky"}},sk:{query:"V\xFDsledky vyh\u013Ead\xE1vania pre",noresults:"\u013Dutujeme, ale ni\u010D sme nena\u0161li...",options:{authors:"Autorky / Autori",blogs:"AspektIn",books:"Knihy",events:"Podujatia",pages:"Str\xE1nky",njuvinky:"\u0147j\xFAvinky"}}};return y(()=>{}),(M,N)=>(a(),p(k,null,{default:_(()=>[l(d(f),{title:"search"}),l(j,{id:"aspektin"}),r.value?(a(),n("section",L,[e("div",H,[(a(!0),n(b,null,x(r.value.data,m=>(a(),p(A,{key:m.id,item:m},null,8,["item"]))),128))]),l(w,{links:r.value.meta.links,class:"mt-4"},null,8,["links"])])):(a(),n("section",I,[e("p",null,i(h[c.value].noresults),1)]))]),_:1}))}};export{q as default};
