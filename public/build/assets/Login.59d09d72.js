import{f as k,z as w,U as x,o as d,c as g,S as y,B as u,w as m,a as o,u as s,H as v,t as V,d as p,b as r,L as B,h as f,y as $,O as C}from"./app.e79a48e0.js";import{_ as L,a as U}from"./Guest.4bfbab23.js";import{_ as N,a as _,b}from"./ValidationErrors.deb8166d.js";import"./ApplicationLogo.eed68435.js";import"./plugin-vue_export-helper.21dcd24c.js";const S=["value"],q={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{default:null}},emits:["update:checked"],setup(l,{emit:e}){const i=e,n=l,t=k({get(){return n.checked},set(a){i("update:checked",a)}});return(a,c)=>w((d(),g("input",{type:"checkbox",value:l.value,"onUpdate:modelValue":c[0]||(c[0]=h=>t.value=h),class:"rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"},null,8,S)),[[x,t.value]])}},F={key:0,class:"mb-4 font-medium text-sm text-green-600"},P={class:"mt-4"},R={class:"block mt-4"},z={class:"flex items-center"},D=r("span",{class:"ml-2 text-sm text-gray-600"},"Remember me",-1),E={class:"flex items-center justify-end mt-4"},T={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(l){const e=y({email:"",password:"",remember:!1}),i=()=>{e.post(route("login"),{onFinish:()=>e.reset("password")})};return(n,t)=>(d(),u(L,null,{default:m(()=>[o(s(v),{title:"Log in"}),o(N,{class:"mb-4"}),l.status?(d(),g("div",F,V(l.status),1)):p("",!0),r("form",{onSubmit:C(i,["prevent"])},[r("div",null,[o(_,{for:"email",value:"Email"}),o(b,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":t[0]||(t[0]=a=>s(e).email=a),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"])]),r("div",P,[o(_,{for:"password",value:"Password"}),o(b,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":t[1]||(t[1]=a=>s(e).password=a),required:"",autocomplete:"current-password"},null,8,["modelValue"])]),r("div",R,[r("label",z,[o(q,{name:"remember",checked:s(e).remember,"onUpdate:checked":t[2]||(t[2]=a=>s(e).remember=a)},null,8,["checked"]),D])]),r("div",E,[l.canResetPassword?(d(),u(s(B),{key:0,href:n.route("password.request"),class:"underline text-sm text-gray-600 hover:text-gray-900"},{default:m(()=>[f(" Forgot your password? ")]),_:1},8,["href"])):p("",!0),o(U,{class:$(["ml-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:m(()=>[f(" Log in ")]),_:1},8,["class","disabled"])])],32)]),_:1}))}};export{T as default};