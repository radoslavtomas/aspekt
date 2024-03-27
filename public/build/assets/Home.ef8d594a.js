import{e as _,f as g,g as f,o as h,c as v,b as e,t as n,J as k,K as w,a as s,w as r,u as o,P as H,h as d,L as i,B,H as T}from"./app.42ee52da.js";import{_ as $}from"./MainLayout.11ccae2e.js";import{_ as j}from"./plugin-vue_export-helper.21dcd24c.js";import{_ as M}from"./BookListItem.3782e01c.js";import{_ as x}from"./Separator.aaceedf9.js";import{r as m}from"./ArrowRightCircleIcon.9320730a.js";import"./NavigationBar.320b7ac1.js";import"./BookSingleCtaButton.f923bbd4.js";const y=t=>(k("data-v-fcf596a0"),t=t(),w(),t),L={class:"aspekt-hero flex justify-center items-center flex-col px-2 py-6 sm:py-8 mt-4 border border-gray-100"},P=y(()=>e("img",{class:"w-36 h-auto",src:"/assets/img/logo_clean.png",alt:"Aspekt Logo"},null,-1)),z={class:"relative flex justify-center items-center mt-4 px-2 py-0.5 rounded-lg"},A=y(()=>e("div",{class:"bg-gray-100 opacity-70 z-0 absolute top-0 right-0 w-full h-full"},null,-1)),S={class:"text-sm sm:text-sm text-center text-gray-700 z-10"},F={__name:"AspektHero",setup(t){const u=_(),l=g(()=>u.getters.lang),c=g(()=>f().props.value.locale);return(a,b)=>(h(),v("section",L,[P,e("div",z,[A,e("p",S,n(l.value[c.value].homePageHeroSubtitle),1)])]))}};var I=j(F,[["__scopeId","data-v-fcf596a0"]]);const R={class:"my-4"},N={class:"bg-books sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded mb-8"},V={__name:"TheFeaturedBooks",props:{books:Array},setup(t){const u=_(),l=g(()=>u.getters.lang),c=g(()=>f().props.value.locale);return(a,b)=>(h(),v("section",R,[s(x,{title:l.value[c.value].homePageFeaturedBooksTitle,margin:""},null,8,["title"]),e("div",N,[s(o(H),{items:t.books,"column-width":250,gap:16},{default:r(({item:p})=>[s(M,{item:p},null,8,["item"])]),_:1},8,["items"])])]))}},O={class:"my-4"},C={class:"mt-8 bg-white overflow-hidden border border-gray-200 sm:rounded shadow-lg"},D={class:"grid grid-cols-1 md:grid-cols-2"},E={class:"p-6 flex flex-col justify-start"},J={class:"mb-4"},K={class:"flex items-center"},q={class:"ml-2 text-lg font-bold"},G=["innerHTML"],Q={class:"flex w-full justify-end"},U={class:"p-6 flex flex-col justify-start border-t border-gray-200 md:border-t-0 md:border-l"},W={class:"mb-4"},X={class:"flex items-center"},Y={class:"ml-2 text-lg font-bold"},Z={class:""},ee=["innerHTML"],te={class:"flex w-full justify-end"},se={class:"p-6 flex flex-col justify-start border-t border-gray-200"},oe={class:"mb-4"},le={class:"flex items-center"},ae={class:"ml-2 text-lg font-bold"},re={class:""},ce=["innerHTML"],ne={class:"flex w-full justify-end"},de={class:"p-6 flex flex-col justify-start border-t border-gray-200 md:border-l"},ie={class:"mb-4"},ue={class:"flex items-center"},ge={class:"ml-2 text-lg font-bold"},me={class:""},he=["innerHTML"],_e={class:"flex w-full justify-end"},fe={__name:"TheFeaturedBlogs",props:{blogs:Array},setup(t){const u=_(),l=g(()=>u.getters.lang),c=g(()=>f().props.value.locale);return(a,b)=>(h(),v("section",O,[s(x,{title:l.value[c.value].homePageFeaturedBlogsTitle,margin:""},null,8,["title"]),e("div",C,[e("div",D,[e("div",E,[e("div",J,[e("div",K,[e("div",q,[s(o(i),{href:a.route("aspektin",{category:"vsetko",slug:t.blogs[0].slug}),class:"text-red-600 hover:text-red-700"},{default:r(()=>[d(n(t.blogs[0].title),1)]),_:1},8,["href"])])]),e("div",null,[e("div",{innerHTML:t.blogs[0].teaser,class:"mt-2 text-gray-600 text-sm"},null,8,G)])]),e("div",Q,[s(o(i),{href:a.route("aspektin",{category:"vsetko",slug:t.blogs[0].slug}),class:"rounded text-zinc-600 text-sm text-center px-3 py-2 w-full sm:w-auto shadow-md bg-gray-200 hover:bg-gray-300"},{default:r(()=>[d(n(l.value[c.value].homePageReadMoreButton)+" ",1),s(o(m),{class:"w-5 h-5 ml-1 inline"})]),_:1},8,["href"])])]),e("div",U,[e("div",W,[e("div",X,[e("div",Y,[s(o(i),{href:a.route("aspektin",{category:"vsetko",slug:t.blogs[1].slug}),class:"text-red-600 hover:text-red-700"},{default:r(()=>[d(n(t.blogs[1].title),1)]),_:1},8,["href"])])]),e("div",Z,[e("div",{innerHTML:t.blogs[1].teaser,class:"mt-2 text-gray-600 text-sm"},null,8,ee)])]),e("div",te,[s(o(i),{href:a.route("aspektin",{category:"vsetko",slug:t.blogs[1].slug}),class:"rounded text-zinc-600 text-sm text-center px-3 py-2 w-full sm:w-auto shadow-md bg-gray-200 hover:bg-gray-300"},{default:r(()=>[d(n(l.value[c.value].homePageReadMoreButton)+" ",1),s(o(m),{class:"w-5 h-5 ml-1 inline"})]),_:1},8,["href"])])]),e("div",se,[e("div",oe,[e("div",le,[e("div",ae,[s(o(i),{href:a.route("aspektin",{category:"vsetko",slug:t.blogs[2].slug}),class:"text-red-600 hover:text-red-700"},{default:r(()=>[d(n(t.blogs[2].title),1)]),_:1},8,["href"])])]),e("div",re,[e("div",{innerHTML:t.blogs[2].teaser,class:"mt-2 text-gray-600 text-sm"},null,8,ce)])]),e("div",ne,[s(o(i),{href:a.route("aspektin",{category:"vsetko",slug:t.blogs[2].slug}),class:"rounded text-zinc-600 text-sm text-center px-3 py-2 w-full sm:w-auto shadow-md bg-gray-200 hover:bg-gray-300"},{default:r(()=>[d(n(l.value[c.value].homePageReadMoreButton)+" ",1),s(o(m),{class:"w-5 h-5 ml-1 inline"})]),_:1},8,["href"])])]),e("div",de,[e("div",ie,[e("div",ue,[e("div",ge,[s(o(i),{href:a.route("aspektin",{category:"vsetko",slug:t.blogs[3].slug}),class:"text-red-600 hover:text-red-700"},{default:r(()=>[d(n(t.blogs[3].title),1)]),_:1},8,["href"])])]),e("div",me,[e("div",{innerHTML:t.blogs[3].teaser,class:"mt-2 text-gray-600 text-sm"},null,8,he)])]),e("div",_e,[s(o(i),{href:a.route("aspektin",{category:"vsetko",slug:t.blogs[3].slug}),class:"rounded text-zinc-600 text-sm text-center px-3 py-2 w-full sm:w-auto shadow-md bg-gray-200 hover:bg-gray-300"},{default:r(()=>[d(n(l.value[c.value].homePageReadMoreButton)+" ",1),s(o(m),{class:"w-5 h-5 ml-1 inline"})]),_:1},8,["href"])])])])])]))}},Be={__name:"Home",props:{blogs:Object,books:Object},setup(t){return(u,l)=>(h(),B($,null,{default:r(()=>[s(o(T),{title:"Home"}),s(I),s(V,{books:t.books.data},null,8,["books"]),s(fe,{blogs:t.blogs.data},null,8,["blogs"])]),_:1}))}};export{Be as default};
