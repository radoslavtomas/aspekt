import{f as o,g as r,e as k,C as b,o as a,c as i,a as l,u as t,H as y,b as s,t as _,d as m,A as w,w as $}from"./app.32798085.js";import{_ as f}from"./FileList.538aa9f7.js";import{_ as j}from"./Breadcrumbs.fe8ea15b.js";import{_ as u}from"./Separator.18e061a2.js";import{_ as H}from"./MainLayout.207f92f3.js";import"./NavigationBar.9a5b33f2.js";import"./plugin-vue_export-helper.21dcd24c.js";const L={class:"max-w-3xl mx-auto"},M={class:""},N={class:"relative flex flex-col md:flex-row justify-between items-center md:items-start mb-4"},B={class:"text-center md:text-left w-full h-full flex-1 flex flex-col justify-items-stretch"},S={class:""},T={class:"text-2xl md:text-3xl text-red-600 font-bold"},C={class:"text-xl text-red-600 my-1"},V={class:"md:my-4 text-xl"},D={class:"max-w-2xl mx-auto px-1"},A={class:"mb-6"},E=["innerHTML"],F={key:0,class:"mb-6"},P=["innerHTML"],q={key:1,class:"mb-6"},z={key:2,class:"mb-6"},G={__name:"NjuvinkySingle",setup(x){const e=o(()=>r().props.value.blog.data),n=o(()=>r().props.value.locale),h=o(()=>r().props.value.navigation),p=k(),c=o(()=>p.getters.lang),v=o(()=>h.value.find(d=>d.route==="njuvinky")[`name_${n.value}`]),g=o(()=>`${v.value} | ${e.value.title}`);return b(()=>console.log(e.value)),(d,I)=>(a(),i("div",L,[l(t(y),{title:t(g)},null,8,["title"]),l(j,{id:"njuvinky",article:t(e).title},null,8,["article"]),s("article",M,[s("header",N,[s("div",B,[s("div",S,[s("h1",T,_(t(e).title),1),s("h4",C,_(t(e).subtitle),1),s("h3",V,_(t(e).authors),1)])])]),s("main",D,[s("section",A,[s("div",{class:"content",innerHTML:t(e).body},null,8,E)]),t(e).links?(a(),i("section",F,[l(u,{title:t(c)[t(n)].articleLinks,margin:""},null,8,["title"]),s("div",{innerHTML:t(e).links},null,8,P)])):m("",!0),t(e).files.length?(a(),i("section",q,[l(u,{title:t(c)[t(n)].articleFiles,margin:""},null,8,["title"]),l(f,{files:t(e).files},null,8,["files"])])):m("",!0),t(e).downloads.length?(a(),i("section",z,[l(u,{title:t(c)[t(n)].articleDownloads,margin:""},null,8,["title"]),l(f,{files:t(e).downloads},null,8,["files"])])):m("",!0)])])]))}},X={__name:"Njuvinka",setup(x){return(e,n)=>(a(),w(H,null,{default:$(()=>[l(G)]),_:1}))}};export{X as default};