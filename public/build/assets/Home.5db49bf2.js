import{e as u,f as l,g as _,o as s,c,b as n,t as y,J as k,K as $,a as t,w as f,u as v,P as w,F as h,G as b,B as p,H,d as B}from"./app.a6f8f2e3.js";import{_ as F}from"./MainLayout.61965cd8.js";import{_ as A}from"./plugin-vue_export-helper.21dcd24c.js";import{_ as T}from"./BookListItem.942a5230.js";import{_ as g}from"./Separator.e86a14ef.js";import{_ as P}from"./BlogListItem.9f411672.js";import{_ as S}from"./EventListItem.9616ef12.js";import"./NavigationBar.9ab17583.js";import"./BookSingleCtaButton.af9d00b2.js";const x=e=>(k("data-v-fcf596a0"),e=e(),$(),e),j={class:"aspekt-hero flex justify-center items-center flex-col px-2 py-6 sm:py-8 mt-4 border border-gray-100"},I=x(()=>n("img",{class:"w-36 h-auto",src:"/assets/img/logo_clean.png",alt:"Aspekt Logo"},null,-1)),E={class:"relative flex justify-center items-center mt-4 px-2 py-0.5 rounded-lg"},N=x(()=>n("div",{class:"bg-gray-100 opacity-70 z-0 absolute top-0 right-0 w-full h-full"},null,-1)),O={class:"text-sm sm:text-sm text-center text-gray-700 z-10"},V={__name:"AspektHero",setup(e){const o=u(),a=l(()=>o.getters.lang),r=l(()=>_().props.value.locale);return(m,d)=>(s(),c("section",j,[I,n("div",E,[N,n("p",O,y(a.value[r.value].homePageHeroSubtitle),1)])]))}};var z=A(V,[["__scopeId","data-v-fcf596a0"]]);const C={class:"my-4"},D={class:"bg-wave sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded mb-8"},L={__name:"TheFeaturedBooks",props:{books:Array},setup(e){const o=u(),a=l(()=>o.getters.lang),r=l(()=>_().props.value.locale);return(m,d)=>(s(),c("section",C,[t(g,{title:a.value[r.value].homePageFeaturedBooksTitle,margin:""},null,8,["title"]),n("div",D,[t(v(w),{"column-width":250,gap:16,items:e.books},{default:f(({item:i})=>[t(T,{item:i},null,8,["item"])]),_:1},8,["items"])])]))}},G={class:"my-4"},J={class:"grid grid-cols-1 md:grid-cols-2 gap-2"},K={__name:"TheFeaturedBlogs",props:{blogs:Array},setup(e){const o=u(),a=l(()=>o.getters.lang),r=l(()=>_().props.value.locale);return(m,d)=>(s(),c("section",G,[t(g,{title:a.value[r.value].homePageFeaturedBlogsTitle,margin:""},null,8,["title"]),n("div",J,[(s(!0),c(h,null,b(e.blogs,i=>(s(),p(P,{key:i.id,fullHeight:!0,item:i},null,8,["item"]))),128))])]))}},q={class:"my-4"},M={class:"flex gap-2 flex-col md:flex-row"},Q={class:"mb-2 last:mb-0 md:mb-0 grow basis-0"},R={__name:"TheFeaturedEvents",props:{events:Array},setup(e){const o=u(),a=l(()=>o.getters.lang),r=l(()=>_().props.value.locale);return(m,d)=>(s(),c("section",q,[t(g,{title:a.value[r.value].homePageFeaturedEventsTitle,margin:""},null,8,["title"]),n("div",M,[(s(!0),c(h,null,b(e.events,i=>(s(),c("div",Q,[t(S,{fullHeight:!0,item:i},null,8,["item"])]))),256))])]))}},ae={__name:"Home",props:{blogs:Object,books:Object,events:Object|null},setup(e){const o=l(()=>_().props.value.locale),a={en:"Home",sk:"Domov"};return(r,m)=>(s(),p(F,null,{default:f(()=>[t(v(H),{title:a[o.value]},null,8,["title"]),t(z),t(L,{books:e.books.data},null,8,["books"]),e.events?(s(),p(R,{key:0,events:e.events.data},null,8,["events"])):B("",!0),t(K,{blogs:e.blogs.data},null,8,["blogs"])]),_:1}))}};export{ae as default};