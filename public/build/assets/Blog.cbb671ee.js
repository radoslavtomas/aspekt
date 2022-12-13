import{_ as v}from"./BasketWidget.f6e4e835.js";import{i as l,j as r,e as b,o as i,c as a,a as o,u as t,H as w,b as e,t as d,d as _,w as y,F as S}from"./app.db67b4b4.js";import{_ as p}from"./FileList.b1fa523f.js";import{_ as $}from"./Breadcrumbs.1a395367.js";import{_ as m}from"./Separator.cbe4bbde.js";import{_ as T}from"./MainLayout.a33562bd.js";import"./NavigationBar.744a40d9.js";import"./plugin-vue_export-helper.21dcd24c.js";const B={class:"max-w-3xl mx-auto"},E={class:"mb-6"},H=e("div",{class:"mb-6 text-gray-700 aspektin text-center p-4"},[e("h1",{class:"text-3xl font-bold tracking-widest"},"A S P E K T i n"),e("h5",{class:"text-sm tracking-wider font-bold"},"f e m i n i s t i c k y\xA0\xA0\xA0w e b z i n")],-1),P={class:""},M={class:"relative flex flex-col md:flex-row justify-between items-center md:items-start mb-6 md:mb-12"},K={class:"text-center md:text-left w-full h-full flex-1 flex flex-col justify-items-stretch"},L={class:""},N={class:"text-2xl md:text-3xl text-red-600 font-bold"},j={class:"text-xl text-red-600 my-1"},z={class:"md:my-4 text-xl"},A={class:"max-w-2xl mx-auto px-1"},C={class:"mb-6"},F=["innerHTML"],V={key:0,class:"mb-6"},D=["innerHTML"],R={key:1,class:"mb-6"},U={key:2,class:"mb-6"},q={__name:"BlogSingle",setup(h){const s=l(()=>r().props.value.blog.data),n=l(()=>r().props.value.locale),x=l(()=>r().props.value.navigation),g=l(()=>{const u=l(()=>x.value.find(k=>k.route==="aspektin")[`name_${n.value}`]),f=s.value.title;return`${u.value} | ${f}`}),c={sk:{pages:"Po\u010Det str\xE1n",aspekt_price:"ASPEKT cena",common_price:"Be\u017En\xE1 cena",editors:"Editorstvo",translation:"Preklad",sample:"Uk\xE1\u017Eka z knihy",links:"S\xFAvisiace odkazy",files:"S\xFAbory na stiahnutie",downloads:"Knihy na stiahnutie"},en:{pages:"Number of pages",aspekt_price:"ASPEKT price",common_price:"Common cena",editors:"Editors",translation:"Translation",sample:"Sample",links:"Related links",files:"Files to download",downloads:"Books to download"}};return b(()=>console.log(s.value)),(u,f)=>(i(),a("div",B,[o(t(w),{title:t(g)},null,8,["title"]),e("div",E,[o($,{id:"aspektin",article:t(s).title},null,8,["article"])]),H,e("article",P,[e("header",M,[e("div",K,[e("div",L,[e("h1",N,d(t(s).title),1),e("h4",j,d(t(s).subtitle),1),e("h3",z,d(t(s).authors),1)])])]),e("main",A,[e("section",C,[e("div",{class:"content",innerHTML:t(s).body},null,8,F)]),t(s).links?(i(),a("section",V,[o(m,{title:c[t(n)].links,margin:""},null,8,["title"]),e("div",{innerHTML:t(s).links},null,8,D)])):_("",!0),t(s).files.length?(i(),a("section",R,[o(m,{title:c[t(n)].files,margin:""},null,8,["title"]),o(p,{files:t(s).files},null,8,["files"])])):_("",!0),t(s).downloads.length?(i(),a("section",U,[o(m,{title:c[t(n)].downloads,margin:""},null,8,["title"]),o(p,{files:t(s).downloads},null,8,["files"])])):_("",!0)])])]))}},Z={__name:"Blog",setup(h){return(s,n)=>(i(),a(S,null,[o(T,null,{default:y(()=>[o(q)]),_:1}),o(v)],64))}};export{Z as default};
