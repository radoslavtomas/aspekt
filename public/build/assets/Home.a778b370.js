import{e as _,f as u,g as f,o as h,c as b,b as e,t as c,u as t,K as k,M as w,a as o,w as r,U as H,h as n,L as i,A as M,H as T}from"./app.b70aaf37.js";import{_ as $}from"./MainLayout.6c604f69.js";import{_ as j}from"./plugin-vue_export-helper.21dcd24c.js";import{_ as B}from"./BookListItem.634324f9.js";import{_ as v}from"./Separator.f17ae685.js";import{r as m}from"./ArrowRightCircleIcon.eae79a18.js";import"./NavigationBar.1238e60e.js";import"./BookSingleCtaButton.26e3c54b.js";const y=s=>(k("data-v-fcf596a0"),s=s(),w(),s),L={class:"aspekt-hero flex justify-center items-center flex-col px-2 py-6 sm:py-8 mt-4 border border-gray-100"},P=y(()=>e("img",{class:"w-36 h-auto",src:"/assets/img/logo_clean.png",alt:"Aspekt Logo"},null,-1)),A={class:"relative flex justify-center items-center mt-4 px-2 py-0.5 rounded-lg"},z=y(()=>e("div",{class:"bg-gray-100 opacity-70 z-0 absolute top-0 right-0 w-full h-full"},null,-1)),S={class:"text-sm sm:text-sm text-center text-gray-700 z-10"},F={__name:"AspektHero",setup(s){const g=_(),l=u(()=>g.getters.lang),d=u(()=>f().props.value.locale);return(a,x)=>(h(),b("section",L,[P,e("div",A,[z,e("p",S,c(t(l)[t(d)].homePageHeroSubtitle),1)])]))}};var I=j(F,[["__scopeId","data-v-fcf596a0"]]);const R={class:"my-4"},N={class:"bg-books sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded mb-8"},V={__name:"TheFeaturedBooks",props:{books:Array},setup(s){const g=_(),l=u(()=>g.getters.lang),d=u(()=>f().props.value.locale);return(a,x)=>(h(),b("section",R,[o(v,{title:t(l)[t(d)].homePageFeaturedBooksTitle,margin:""},null,8,["title"]),e("div",N,[o(t(H),{items:s.books,"column-width":250,gap:16},{default:r(({item:p})=>[o(B,{item:p},null,8,["item"])]),_:1},8,["items"])])]))}},O={class:"my-4"},C={class:"mt-8 bg-white overflow-hidden border border-gray-200 sm:rounded shadow-lg"},D={class:"grid grid-cols-1 md:grid-cols-2"},E={class:"p-6 flex flex-col justify-start"},K={class:"mb-4"},U={class:"flex items-center"},q={class:"ml-2 text-lg font-bold"},G=["innerHTML"],J={class:"flex w-full justify-end"},Q={class:"p-6 flex flex-col justify-start border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l"},W={class:"mb-4"},X={class:"flex items-center"},Y={class:"ml-2 text-lg font-bold"},Z={class:""},ee=["innerHTML"],te={class:"flex w-full justify-end"},se={class:"p-6 flex flex-col justify-start border-t border-gray-200 dark:border-gray-700"},oe={class:"mb-4"},le={class:"flex items-center"},ae={class:"ml-2 text-lg font-bold"},re={class:""},de=["innerHTML"],ce={class:"flex w-full justify-end"},ne={class:"p-6 flex flex-col justify-start border-t border-gray-200 dark:border-gray-700 md:border-l"},ie={class:"mb-4"},ge={class:"flex items-center"},ue={class:"ml-2 text-lg font-bold"},me={class:""},he=["innerHTML"],_e={class:"flex w-full justify-end"},fe={__name:"TheFeaturedBlogs",props:{blogs:Array},setup(s){const g=_(),l=u(()=>g.getters.lang),d=u(()=>f().props.value.locale);return(a,x)=>(h(),b("section",O,[o(v,{title:t(l)[t(d)].homePageFeaturedBlogsTitle,margin:""},null,8,["title"]),e("div",C,[e("div",D,[e("div",E,[e("div",K,[e("div",U,[e("div",q,[o(t(i),{href:a.route("aspektin",{category:"vsetko",slug:s.blogs[0].slug}),class:"text-red-600 hover:text-red-700"},{default:r(()=>[n(c(s.blogs[0].title),1)]),_:1},8,["href"])])]),e("div",null,[e("div",{innerHTML:s.blogs[0].teaser,class:"mt-2 text-gray-600 dark:text-gray-400 text-sm"},null,8,G)])]),e("div",J,[o(t(i),{href:a.route("aspektin",{category:"vsetko",slug:s.blogs[0].slug}),class:"rounded text-zinc-600 text-sm text-center px-3 py-2 w-full sm:w-auto shadow-md bg-gray-200 hover:bg-gray-300"},{default:r(()=>[n(c(t(l)[t(d)].homePageReadMoreButton)+" ",1),o(t(m),{class:"w-5 h-5 ml-1 inline"})]),_:1},8,["href"])])]),e("div",Q,[e("div",W,[e("div",X,[e("div",Y,[o(t(i),{href:a.route("aspektin",{category:"vsetko",slug:s.blogs[1].slug}),class:"text-red-600 hover:text-red-700"},{default:r(()=>[n(c(s.blogs[1].title),1)]),_:1},8,["href"])])]),e("div",Z,[e("div",{innerHTML:s.blogs[1].teaser,class:"mt-2 text-gray-600 dark:text-gray-400 text-sm"},null,8,ee)])]),e("div",te,[o(t(i),{href:a.route("aspektin",{category:"vsetko",slug:s.blogs[1].slug}),class:"rounded text-zinc-600 text-sm text-center px-3 py-2 w-full sm:w-auto shadow-md bg-gray-200 hover:bg-gray-300"},{default:r(()=>[n(c(t(l)[t(d)].homePageReadMoreButton)+" ",1),o(t(m),{class:"w-5 h-5 ml-1 inline"})]),_:1},8,["href"])])]),e("div",se,[e("div",oe,[e("div",le,[e("div",ae,[o(t(i),{href:a.route("aspektin",{category:"vsetko",slug:s.blogs[2].slug}),class:"text-red-600 hover:text-red-700"},{default:r(()=>[n(c(s.blogs[2].title),1)]),_:1},8,["href"])])]),e("div",re,[e("div",{innerHTML:s.blogs[2].teaser,class:"mt-2 text-gray-600 dark:text-gray-400 text-sm"},null,8,de)])]),e("div",ce,[o(t(i),{href:a.route("aspektin",{category:"vsetko",slug:s.blogs[2].slug}),class:"rounded text-zinc-600 text-sm text-center px-3 py-2 w-full sm:w-auto shadow-md bg-gray-200 hover:bg-gray-300"},{default:r(()=>[n(c(t(l)[t(d)].homePageReadMoreButton)+" ",1),o(t(m),{class:"w-5 h-5 ml-1 inline"})]),_:1},8,["href"])])]),e("div",ne,[e("div",ie,[e("div",ge,[e("div",ue,[o(t(i),{href:a.route("aspektin",{category:"vsetko",slug:s.blogs[3].slug}),class:"text-red-600 hover:text-red-700"},{default:r(()=>[n(c(s.blogs[3].title),1)]),_:1},8,["href"])])]),e("div",me,[e("div",{innerHTML:s.blogs[3].teaser,class:"mt-2 text-gray-600 dark:text-gray-400 text-sm"},null,8,he)])]),e("div",_e,[o(t(i),{href:a.route("aspektin",{category:"vsetko",slug:s.blogs[3].slug}),class:"rounded text-zinc-600 text-sm text-center px-3 py-2 w-full sm:w-auto shadow-md bg-gray-200 hover:bg-gray-300"},{default:r(()=>[n(c(t(l)[t(d)].homePageReadMoreButton)+" ",1),o(t(m),{class:"w-5 h-5 ml-1 inline"})]),_:1},8,["href"])])])])])]))}},Me={__name:"Home",props:{blogs:Object,books:Object},setup(s){return(g,l)=>(h(),M($,null,{default:r(()=>[o(t(T),{title:"Home"}),o(I),o(V,{books:s.books.data},null,8,["books"]),o(fe,{blogs:s.blogs.data},null,8,["blogs"])]),_:1}))}};export{Me as default};