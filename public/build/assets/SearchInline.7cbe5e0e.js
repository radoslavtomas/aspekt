import{_ as h}from"./MainLayout.1cf7f02c.js";import{H as b}from"./head.ec1d62f2.js";import{f as t,D as w,B as k,w as a,e as B,o,a as e,u as l,c as n,b as c,P as d,d as u,g as m}from"./app.cbd766b5.js";import{_ as y}from"./BlogListItem.847e8d77.js";import{_ as $}from"./BookListItem.e8649fe1.js";import{_}from"./Separator.748d4f46.js";import{_ as P}from"./Breadcrumbs.732a5b90.js";import{_ as T}from"./PeopleListItem.d1286d23.js";import"./NavigationBar.f96d381e.js";import"./plugin-vue_export-helper.21dcd24c.js";import"./BookSingleCtaButton.d5651c64.js";const x={key:0},N={class:"bg-wave sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded"},V={key:1,class:"mt-10"},C={class:"bg-wave sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded"},H={key:2,class:"mt-10"},S={class:"bg-wave sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded"},Q={__name:"SearchInline",setup(A){window.scrollTo({top:0,behavior:"smooth"});const f=B(),r=t(()=>f.getters.lang),i=t(()=>m().props.value.locale),p=t(()=>m().props.value.books),g=t(()=>m().props.value.blogs),v=t(()=>m().props.value.people);return w(()=>{}),(D,E)=>(o(),k(h,null,{default:a(()=>[e(l(b),{title:"search"}),e(P,{id:"aspektin"}),p.value?(o(),n("section",x,[e(_,{title:r.value[i.value].searchPageBooksTitle,margin:""},null,8,["title"]),c("div",N,[e(l(d),{"column-width":230,gap:16,items:p.value.data},{default:a(({item:s})=>[e($,{item:s},null,8,["item"])]),_:1},8,["items"])])])):u("",!0),g.value?(o(),n("section",V,[e(_,{title:r.value[i.value].searchPageBlogsTitle,margin:""},null,8,["title"]),c("div",C,[e(l(d),{"column-width":230,gap:16,items:g.value.data},{default:a(({item:s})=>[e(y,{item:s},null,8,["item"])]),_:1},8,["items"])])])):u("",!0),v.value?(o(),n("section",H,[e(_,{title:r.value[i.value].searchPageAuthorsTitle,margin:""},null,8,["title"]),c("div",S,[e(l(d),{"column-width":330,gap:16,items:v.value.data},{default:a(({item:s})=>[e(T,{item:s},null,8,["item"])]),_:1},8,["items"])])])):u("",!0)]),_:1}))}};export{Q as default};