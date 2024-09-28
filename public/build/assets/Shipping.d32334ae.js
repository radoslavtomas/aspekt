import{o as f,c as x,b as a,t as v,e as U,f as h,g as M,y as I,a as s,d as C,F as L,M as N,m as P,D as q,u as e,w as b,H as F,O as T,B as O,L as j,h as k,Q as D}from"./app.cbd766b5.js";import{b as E,u as H,_ as z,r as y,e as K,m as d,c as g}from"./MainLayout.1cf7f02c.js";import{a as u,_ as S}from"./FormSelect.2aa68748.js";import{r as Q}from"./ArrowLeftCircleIcon.52c27812.js";import{r as R}from"./ArrowRightCircleIcon.ea1a2dc3.js";import"./NavigationBar.f96d381e.js";import"./plugin-vue_export-helper.21dcd24c.js";const A={class:"inline-flex items-center"},G=["checked"],J={class:"ml-2 text-sm"},W={__name:"FormCheckbox",props:{title:String,modelValue:Boolean},emits:["update:modelValue"],setup(p,{emit:_}){const i=p,n=_,c=m=>{n("update:modelValue",m.target.checked)};return(m,l)=>(f(),x("label",A,[a("input",{type:"checkbox",checked:p.modelValue,onInput:c,class:"rounded border-gray-300 text-fuchsia-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"},null,40,G),a("span",J,v(i.title),1)]))}},X={class:"block"},Y={class:"text-gray-700 text-sm"},Z=["value"],ee={key:0},le={__name:"FormTextarea",props:{title:String,name:String,errors:Object|null,placeholder:String,modelValue:String},emits:["update:modelValue"],setup(p,{emit:_}){const i=_,n=U();h(()=>n.getters.lang),h(()=>M().props.value.locale);const c=l=>{i("update:modelValue",l.target.value)},m=p;return(l,w)=>(f(),x(L,null,[a("label",X,[a("span",Y,v(m.title),1),a("textarea",{onInput:c,value:p.modelValue,class:I(["mt-1 text-sm block w-full rounded-md border-gray-300 shadow-sm",m.errors?"border-red-500 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50":"border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"]),rows:"3"},null,42,Z)]),m.errors?(f(),x("span",ee,[s(E,{error:m.errors.$uid},null,8,["error"])])):C("",!0)],64))}},te={class:"border border-pink-500 bg-white shadow-md mb-4"},re={class:"py-3 px-2 text-pink-600 font-bold text-center"},oe={class:"border-b-2 border-pink-600 p-1"},ie={class:"p-4"},$={__name:"Card",props:{title:String},setup(p){const _=p;return(i,n)=>(f(),x("article",te,[a("header",re,[a("span",oe,v(_.title),1)]),a("main",ie,[N(i.$slots,"default")])]))}},ne={class:"max-w-xl mx-auto pt-8"},se={class:"text-2xl text-center text-pink-600 font-semibold mb-4"},ae=a("br",null,null,-1),ue=a("br",null,null,-1),de={class:"my-8 flex flex-col sm:flex-row flex-col-reverse justify-between items-center text-sm sm:text-base"},me={class:"rounded text-white text-center px-4 py-3 mb-3 sm:mb-0 w-full sm:w-auto shadow-md bg-pink-500 hover:bg-pink-600",type:"submit"},_e={class:""},pe={class:"text-xs"},Ve={__name:"Shipping",props:{category:String,slug:String|null},setup(p){const _=U(),i=h(()=>_.getters.lang),n=h(()=>M().props.value.locale),c=h(()=>_.getters.customer),m=[{value:"703",description:"Slovensko"},{value:"203",description:"\u010Cesk\xE1 republika"},{value:"276",description:"Nemecko"},{value:"616",description:"Po\u013Esko"},{value:"826",description:"Ve\u013Ek\xE1 Brit\xE1nia"},{value:"40",description:"Rak\xFAsko"},{value:"840",description:"Spojen\xE9 \u0161t\xE1ty"},{value:"124",description:"Kanada"}];let l=P({primary_email:"",delivery_phone:"",delivery_first_name:"",delivery_last_name:"",delivery_company:"",delivery_street1:"",delivery_street2:"",delivery_city:"",delivery_postal_code:"",delivery_country:"703",billing_first_name:"",billing_last_name:"",billing_company:"",billing_street1:"",billing_street2:"",billing_city:"",billing_postal_code:"",billing_country:"703",comment:"",show_billing_panel:!1});const w=h(()=>({primary_email:{required:y,email:K,maxLength:d(100)},delivery_phone:{required:y,maxLength:d(100)},delivery_first_name:{required:y,maxLength:d(100)},delivery_last_name:{required:y,maxLength:d(100)},delivery_company:{maxLength:d(100)},delivery_street1:{required:y,maxLength:d(100)},delivery_city:{required:y,maxLength:d(100)},delivery_postal_code:{required:y,maxLength:d(100)},delivery_country:{required:y,maxLength:d(100)},billing_first_name:{requiredIf:g(l.show_billing_panel),maxLength:d(100)},billing_last_name:{requiredIf:g(l.show_billing_panel)},billing_company:{requiredIf:g(l.show_billing_panel)},billing_street1:{requiredIf:g(l.show_billing_panel)},billing_city:{requiredIf:g(l.show_billing_panel)},billing_postal_code:{requiredIf:g(l.show_billing_panel)},billing_country:{requiredIf:g(l.show_billing_panel)},comment:{maxLength:d(1800)},show_billing_panel:{}})),r=H(w,l,{$scope:!1}),B=async()=>{if(!await r.value.$validate()){const t=document.getElementsByClassName("focus:border-red-300")[0];setTimeout(()=>{t.scrollIntoView({behavior:"smooth"})},100);return}await _.dispatch("setCustomer",l),D.Inertia.visit("/eshop/summary",{method:"get"})};return q(()=>{if(c.value.hasOwnProperty("primary_email"))for(const V in c.value)l[V]=c.value[V]}),(V,t)=>(f(),x(L,null,[s(e(F),{title:i.value[n.value].eshopShippingTitle},null,8,["title"]),s(z,null,{default:b(()=>[a("div",ne,[a("h1",se,v(i.value[n.value].eshopShippingTitle),1),a("form",{onSubmit:T(B,["prevent"])},[s($,{title:i.value[n.value].eshopInfoPanel},{default:b(()=>[s(u,{modelValue:e(l).primary_email,"onUpdate:modelValue":t[0]||(t[0]=o=>e(l).primary_email=o),modelModifiers:{trim:!0},errors:e(r).primary_email.$errors.length?e(r).primary_email.$errors[0]:null,placeholder:i.value[n.value].eshopOrderConfirmation,name:"primary_email",title:"Email *",type:"email"},null,8,["modelValue","errors","placeholder"]),s(u,{modelValue:e(l).delivery_phone,"onUpdate:modelValue":t[1]||(t[1]=o=>e(l).delivery_phone=o),modelModifiers:{trim:!0},errors:e(r).delivery_phone.$errors.length?e(r).delivery_phone.$errors[0]:null,title:i.value[n.value].eshopPhone,name:"delivery_phone"},null,8,["modelValue","errors","title"])]),_:1},8,["title"]),s($,{title:i.value[n.value].eshopDeliveryPanel},{default:b(()=>[s(u,{modelValue:e(l).delivery_first_name,"onUpdate:modelValue":t[2]||(t[2]=o=>e(l).delivery_first_name=o),modelModifiers:{trim:!0},errors:e(r).delivery_first_name.$errors.length?e(r).delivery_first_name.$errors[0]:null,title:i.value[n.value].eshopName,name:"delivery_first_name",type:"text"},null,8,["modelValue","errors","title"]),s(u,{modelValue:e(l).delivery_last_name,"onUpdate:modelValue":t[3]||(t[3]=o=>e(l).delivery_last_name=o),modelModifiers:{trim:!0},errors:e(r).delivery_last_name.$errors.length?e(r).delivery_last_name.$errors[0]:null,title:i.value[n.value].eshopSurname,name:"delivery_last_name",type:"text"},null,8,["modelValue","errors","title"]),s(u,{modelValue:e(l).delivery_company,"onUpdate:modelValue":t[4]||(t[4]=o=>e(l).delivery_company=o),modelModifiers:{trim:!0},errors:e(r).delivery_company.$errors.length?e(r).delivery_company.$errors[0]:null,title:i.value[n.value].eshopCompany,name:"delivery_company",type:"text"},null,8,["modelValue","errors","title"]),s(u,{modelValue:e(l).delivery_street1,"onUpdate:modelValue":t[5]||(t[5]=o=>e(l).delivery_street1=o),modelModifiers:{trim:!0},errors:e(r).delivery_street1.$errors.length?e(r).delivery_street1.$errors[0]:null,title:i.value[n.value].eshopStreet,name:"delivery_street1",type:"text"},null,8,["modelValue","errors","title"]),s(u,{modelValue:e(l).delivery_city,"onUpdate:modelValue":t[6]||(t[6]=o=>e(l).delivery_city=o),modelModifiers:{trim:!0},errors:e(r).delivery_city.$errors.length?e(r).delivery_city.$errors[0]:null,title:i.value[n.value].eshopCity,name:"delivery_city",type:"text"},null,8,["modelValue","errors","title"]),s(u,{modelValue:e(l).delivery_postal_code,"onUpdate:modelValue":t[7]||(t[7]=o=>e(l).delivery_postal_code=o),modelModifiers:{trim:!0},errors:e(r).delivery_postal_code.$errors.length?e(r).delivery_postal_code.$errors[0]:null,title:i.value[n.value].eshopPostcode,name:"delivery_postal_code",type:"text"},null,8,["modelValue","errors","title"]),s(S,{modelValue:e(l).delivery_country,"onUpdate:modelValue":t[8]||(t[8]=o=>e(l).delivery_country=o),errors:e(r).delivery_country.$errors.length?e(r).delivery_country.$errors[0]:null,options:m,title:i.value[n.value].eshopCountry,name:"delivery_country"},null,8,["modelValue","errors","title"]),ae,s(W,{modelValue:e(l).show_billing_panel,"onUpdate:modelValue":t[9]||(t[9]=o=>e(l).show_billing_panel=o),title:i.value[n.value].eshopBillingCheckbox,name:"delivery_company"},null,8,["modelValue","title"])]),_:1},8,["title"]),e(l).show_billing_panel?(f(),O($,{key:0,title:i.value[n.value].eshopBillingPanel},{default:b(()=>[s(u,{modelValue:e(l).billing_first_name,"onUpdate:modelValue":t[10]||(t[10]=o=>e(l).billing_first_name=o),modelModifiers:{trim:!0},errors:e(r).billing_first_name.$errors.length?e(r).billing_first_name.$errors[0]:null,title:i.value[n.value].eshopName,name:"billing_first_name",type:"text"},null,8,["modelValue","errors","title"]),s(u,{modelValue:e(l).billing_last_name,"onUpdate:modelValue":t[11]||(t[11]=o=>e(l).billing_last_name=o),modelModifiers:{trim:!0},errors:e(r).billing_last_name.$errors.length?e(r).billing_last_name.$errors[0]:null,title:i.value[n.value].eshopSurname,name:"billing_last_name",type:"text"},null,8,["modelValue","errors","title"]),s(u,{modelValue:e(l).billing_company,"onUpdate:modelValue":t[12]||(t[12]=o=>e(l).billing_company=o),modelModifiers:{trim:!0},errors:e(r).billing_company.$errors.length?e(r).billing_company.$errors[0]:null,title:i.value[n.value].eshopCompany,name:"billing_company",type:"text"},null,8,["modelValue","errors","title"]),s(u,{modelValue:e(l).billing_street1,"onUpdate:modelValue":t[13]||(t[13]=o=>e(l).billing_street1=o),modelModifiers:{trim:!0},errors:e(r).billing_street1.$errors.length?e(r).billing_street1.$errors[0]:null,title:i.value[n.value].eshopStreet,name:"billing_street1",type:"text"},null,8,["modelValue","errors","title"]),s(u,{modelValue:e(l).billing_city,"onUpdate:modelValue":t[14]||(t[14]=o=>e(l).billing_city=o),modelModifiers:{trim:!0},errors:e(r).billing_city.$errors.length?e(r).billing_city.$errors[0]:null,title:i.value[n.value].eshopCity,name:"billing_city",type:"text"},null,8,["modelValue","errors","title"]),s(u,{modelValue:e(l).billing_postal_code,"onUpdate:modelValue":t[15]||(t[15]=o=>e(l).billing_postal_code=o),modelModifiers:{trim:!0},errors:e(r).billing_postal_code.$errors.length?e(r).billing_postal_code.$errors[0]:null,title:i.value[n.value].eshopPostcode,name:"billing_postal_code",type:"text"},null,8,["modelValue","errors","title"]),s(S,{modelValue:e(l).billing_country,"onUpdate:modelValue":t[16]||(t[16]=o=>e(l).billing_country=o),errors:e(r).billing_country.$errors.length?e(r).billing_country.$errors[0]:null,options:m,title:i.value[n.value].eshopCountry,name:"billing_country"},null,8,["modelValue","errors","title"]),ue]),_:1},8,["title"])):C("",!0),s($,{title:i.value[n.value].eshopNotePanel},{default:b(()=>[s(le,{modelValue:e(l).comment,"onUpdate:modelValue":t[17]||(t[17]=o=>e(l).comment=o),errors:e(r).comment.$errors.length?e(r).comment.$errors[0]:null,name:"comment"},null,8,["modelValue","errors"])]),_:1},8,["title"]),a("section",de,[s(e(j),{href:V.route("basket"),class:"rounded text-gray-500 text-center px-4 py-3 bg-gray-200 hover:bg-gray-300"},{default:b(()=>[s(e(Q),{class:"w-5 h-5 inline"}),k(" "+v(i.value[n.value].eshopBackButtonShipping),1)]),_:1},8,["href"]),a("button",me,[k(v(i.value[n.value].eshopForwardButtonShipping)+" ",1),s(e(R),{class:"w-5 h-5 inline"})])])],32),a("section",_e,[a("p",pe,v(i.value[n.value].postageNote),1)])])]),_:1})],64))}};export{Ve as default};