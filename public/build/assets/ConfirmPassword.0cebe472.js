import{S as l,B as d,w as t,o as m,a,u as o,H as c,b as e,h as p,y as u,O as f}from"./app.cbd766b5.js";import{_,a as w}from"./Guest.5ba1cbd2.js";import{_ as b,a as h,b as x}from"./ValidationErrors.33e21cbf.js";import"./ApplicationLogo.bc54ad6f.js";import"./plugin-vue_export-helper.21dcd24c.js";const y=e("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),V={class:"flex justify-end mt-4"},N={__name:"ConfirmPassword",setup(v){const s=l({password:""}),i=()=>{s.post(route("password.confirm"),{onFinish:()=>s.reset()})};return(C,r)=>(m(),d(_,null,{default:t(()=>[a(o(c),{title:"Confirm Password"}),y,a(b,{class:"mb-4"}),e("form",{onSubmit:f(i,["prevent"])},[e("div",null,[a(h,{for:"password",value:"Password"}),a(x,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:o(s).password,"onUpdate:modelValue":r[0]||(r[0]=n=>o(s).password=n),required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"])]),e("div",V,[a(w,{class:u(["ml-4",{"opacity-25":o(s).processing}]),disabled:o(s).processing},{default:t(()=>[p(" Confirm ")]),_:1},8,["class","disabled"])])],32)]),_:1}))}};export{N as default};