import{s as k,f as a,o as n,c as d,a as i,u as e,w as b,F as g,H as P,b as t,t as s,m as N,d as S,L as f,j as v,g as B}from"./app.6b52608d.js";import{_ as C}from"./MainLayout.15b42afb.js";import{r as V}from"./ArrowLeftCircleIcon.c4b480f8.js";import{r as j}from"./ArrowRightCircleIcon.b4b3b5ba.js";import"./NavigationBar.db9d8181.js";import"./SupportUs.6e6d6060.js";import"./plugin-vue_export-helper.21dcd24c.js";const L={class:"max-w-xl mx-auto pt-8"},D={class:"text-2xl text-center text-pink-600 font-semibold mb-4"},E={key:0,class:"mb-4"},F={class:"border-collapse border border-slate-400 shadow-md w-full text-sm"},H={class:"bg-gray-200"},M={colspan:"2",class:"border border-slate-400 p-2"},T={class:"p-2"},$={class:"p-2"},q={class:"border border-slate-400"},A={class:"p-2"},K={class:"p-2 font-bold"},R={class:"mb-4"},Y={class:"border-collapse border border-slate-400 shadow-md w-full text-sm"},z={class:"bg-gray-200"},G={colspan:"2",class:"border border-slate-400 p-2"},I=t("td",{class:"border border-slate-400 w-1/3 p-2"},"Email",-1),J={class:"border border-slate-400 w-2/3 p-2"},O={class:"border border-slate-400 w-1/3 p-2"},Q={class:"border border-slate-400 w-2/3 p-2"},U={class:"border border-slate-400 w-1/3 p-2"},W={class:"border border-slate-400 w-2/3 p-2"},X={class:"border border-slate-400 w-1/3 p-2"},Z={key:0,class:"border border-slate-400 w-2/3 p-2"},ee={key:1,class:"border border-slate-400 w-2/3 p-2"},te={class:"border border-slate-400 w-1/3 p-2"},se={class:"border border-slate-400 w-2/3 p-2"},oe={class:"border border-slate-400 w-1/3 p-2"},le={class:"border border-slate-400 w-2/3 p-2"},re={class:"border border-slate-400 w-1/3 p-2"},ae={class:"border border-slate-400 w-2/3 p-2"},ne={class:"my-6 flex flex-col sm:flex-row flex-col-reverse justify-between items-center text-sm sm:text-base"},de={class:"mb-4"},ie={class:"text-sm"},ge={__name:"Summary",setup(ce){const c=k(),m=a(()=>c.getters.basket),o=a(()=>c.getters.customer),l=a(()=>c.getters.lang),r=a(()=>B().props.value.locale),h=a(()=>c.getters.subtotal),y=[{value:"703",description:"Slovensko"},{value:"203",description:"\u010Cesk\xE1 republika"},{value:"276",description:"Nemecko"},{value:"616",description:"Po\u013Esko"},{value:"826",description:"Ve\u013Ek\xE1 Brit\xE1nia"},{value:"40",description:"Rak\xFAsko"},{value:"840",description:"Spojen\xE9 \u0161t\xE1ty"},{value:"124",description:"Kanada"}],w=a(()=>o.value.delivery_country?y.filter(u=>u.value===o.value.delivery_country)[0].description:""),x=a(()=>o.value.billing_country?y.filter(u=>u.value===o.value.billing_country)[0].description:"");return(_,u)=>(n(),d(g,null,[i(e(P),{title:"Summary"}),i(C,null,{default:b(()=>[t("div",L,[t("h1",D,s(e(l)[e(r)].summaryTitle),1),e(m).length?(n(),d("div",E,[t("table",F,[t("thead",H,[t("tr",null,[t("th",M,s(e(l)[e(r)].basketPanel),1)])]),t("tbody",null,[(n(!0),d(g,null,N(e(m),p=>(n(),d("tr",{key:p.id},[t("td",T,s(p.qty)+" x "+s(p.title),1),t("td",$,s(p.aspekt_price),1)]))),128)),t("tr",q,[t("td",A,s(e(l)[e(r)].subtotal),1),t("td",K,s(e(h)),1)])])])])):S("",!0),t("div",R,[t("table",Y,[t("thead",z,[t("tr",null,[t("th",G,s(e(l)[e(r)].infoPanel),1)])]),t("tbody",null,[t("tr",null,[I,t("td",J,s(e(o).primary_email),1)]),t("tr",null,[t("td",O,s(e(l)[e(r)].phoneAlt),1),t("td",Q,s(e(o).delivery_phone),1)]),t("tr",null,[t("td",U,s(e(l)[e(r)].deliveryPanel),1),t("td",W,[t("p",null,s(e(o).delivery_first_name)+" "+s(e(o).delivery_last_name),1),t("p",null,s(e(o).delivery_street1),1),t("p",null,s(e(o).delivery_city),1),t("p",null,s(e(o).delivery_postal_code),1),t("p",null,s(e(w)),1)])]),t("tr",null,[t("td",X,s(e(l)[e(r)].billingPanel),1),e(o).show_billing_panel?(n(),d("td",ee,[t("p",null,s(e(o).billing_first_name)+" "+s(e(o).billing_last_name),1),t("p",null,s(e(o).billing_street1),1),t("p",null,s(e(o).billing_city),1),t("p",null,s(e(o).billing_postal_code),1),t("p",null,s(e(x)),1)])):(n(),d("td",Z,s(e(l)[e(r)].billingPanelNote),1))]),t("tr",null,[t("td",te,s(e(l)[e(r)].notePanel),1),t("td",se,s(e(o).comment),1)]),t("tr",null,[t("td",oe,s(e(l)[e(r)].paymentMethod),1),t("td",le,s(e(l)[e(r)].paymentMethodDelivery),1)]),t("tr",null,[t("td",re,s(e(l)[e(r)].subtotal),1),t("td",ae,s(e(h)),1)])])])]),t("section",ne,[i(e(f),{href:_.route("shipping"),class:"rounded text-gray-500 text-center px-4 py-3 bg-gray-200 hover:bg-gray-300"},{default:b(()=>[i(e(V),{class:"w-5 h-5 inline"}),v(" "+s(e(l)[e(r)].backButtonShipping),1)]),_:1},8,["href"]),i(e(f),{href:_.route("thankYou"),class:"rounded text-white text-center px-4 py-3 mb-3 sm:mb-0 w-full sm:w-auto shadow-md bg-pink-500 hover:bg-pink-600"},{default:b(()=>[v(s(e(l)[e(r)].orderConfirmationButton)+" ",1),i(e(j),{class:"w-5 h-5 inline"})]),_:1},8,["href"])]),t("section",de,[t("p",ie,s(e(l)[e(r)].postageNote),1)])])]),_:1})],64))}};export{ge as default};
