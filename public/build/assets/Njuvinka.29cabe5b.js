import{f as s,g as c,e as g,C as k,o,c as n,a as l,u as b,H as y,b as t,t as u,d as r,A as w,w as $}from"./app.ddfc9217.js";import{_ as d}from"./FileList.97407138.js";import{_ as j}from"./Breadcrumbs.977d4074.js";import{_}from"./Separator.f840fdc5.js";import{_ as H}from"./MainLayout.97f22fcc.js";import"./NavigationBar.7978bd1d.js";import"./plugin-vue_export-helper.21dcd24c.js";const L={class:"max-w-3xl mx-auto"},M={class:""},N={class:"relative flex flex-col md:flex-row justify-between items-center md:items-start mb-4"},B={class:"text-center md:text-left w-full h-full flex-1 flex flex-col justify-items-stretch"},S={class:""},T={class:"text-2xl md:text-3xl text-red-600 font-bold"},C={class:"text-xl text-red-600 my-1"},V={class:"md:my-4 text-xl"},D={class:"max-w-2xl mx-auto px-1"},A={class:"mb-6"},E=["innerHTML"],F={key:0,class:"mb-6"},P=["innerHTML"],q={key:1,class:"mb-6"},z={key:2,class:"mb-6"},G={__name:"NjuvinkySingle",setup(v){const e=s(()=>c().props.value.blog.data),a=s(()=>c().props.value.locale),f=s(()=>c().props.value.navigation),x=g(),i=s(()=>x.getters.lang),h=s(()=>f.value.find(m=>m.route==="njuvinky")[`name_${a.value}`]),p=s(()=>`${h.value} | ${e.value.title}`);return k(()=>console.log(e.value)),(m,I)=>(o(),n("div",L,[l(b(y),{title:p.value},null,8,["title"]),l(j,{id:"njuvinky",article:e.value.title},null,8,["article"]),t("article",M,[t("header",N,[t("div",B,[t("div",S,[t("h1",T,u(e.value.title),1),t("h4",C,u(e.value.subtitle),1),t("h3",V,u(e.value.authors),1)])])]),t("main",D,[t("section",A,[t("div",{class:"content",innerHTML:e.value.body},null,8,E)]),e.value.links?(o(),n("section",F,[l(_,{title:i.value[a.value].articleLinks,margin:""},null,8,["title"]),t("div",{innerHTML:e.value.links},null,8,P)])):r("",!0),e.value.files.length?(o(),n("section",q,[l(_,{title:i.value[a.value].articleFiles,margin:""},null,8,["title"]),l(d,{files:e.value.files},null,8,["files"])])):r("",!0),e.value.downloads.length?(o(),n("section",z,[l(_,{title:i.value[a.value].articleDownloads,margin:""},null,8,["title"]),l(d,{files:e.value.downloads},null,8,["files"])])):r("",!0)])])]))}},X={__name:"Njuvinka",setup(v){return(e,a)=>(o(),w(H,null,{default:$(()=>[l(G)]),_:1}))}};export{X as default};
