import{B as d,o as l,x as m,w as t,a,u as o,H as c,b as e,k as u,n as p,C as f}from"./app.db67b4b4.js";import{_,a as w}from"./Guest.06f9c4be.js";import{_ as b,a as x,b as h}from"./ValidationErrors.2d6b3ac6.js";import"./ApplicationLogo.40e81a1e.js";import"./plugin-vue_export-helper.21dcd24c.js";const C=e("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),V=["onSubmit"],v={class:"flex justify-end mt-4"},F={__name:"ConfirmPassword",setup(y){const s=d({password:""}),i=()=>{s.post(route("password.confirm"),{onFinish:()=>s.reset()})};return($,r)=>(l(),m(_,null,{default:t(()=>[a(o(c),{title:"Confirm Password"}),C,a(b,{class:"mb-4"}),e("form",{onSubmit:f(i,["prevent"])},[e("div",null,[a(x,{for:"password",value:"Password"}),a(h,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:o(s).password,"onUpdate:modelValue":r[0]||(r[0]=n=>o(s).password=n),required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"])]),e("div",v,[a(w,{class:p(["ml-4",{"opacity-25":o(s).processing}]),disabled:o(s).processing},{default:t(()=>[u(" Confirm ")]),_:1},8,["class","disabled"])])],40,V)]),_:1}))}};export{F as default};
