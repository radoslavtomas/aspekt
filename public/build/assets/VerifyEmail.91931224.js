import{y as u,h as f,o,m as _,w as s,a as i,u as e,H as p,c as h,d as g,b as a,k as n,n as y,L as b,z as k}from"./app.d72a6223.js";import{_ as v,a as x}from"./Guest.2a64bf99.js";import"./ApplicationLogo.253bbbd8.js";import"./plugin-vue_export-helper.21dcd24c.js";const w=a("div",{class:"mb-4 text-sm text-gray-600"}," Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. ",-1),V={key:0,class:"mb-4 font-medium text-sm text-green-600"},B=["onSubmit"],E={class:"mt-4 flex items-center justify-between"},z={__name:"VerifyEmail",props:{status:String},setup(r){const c=r,t=u(),d=()=>{t.post(route("verification.send"))},l=f(()=>c.status==="verification-link-sent");return(m,L)=>(o(),_(v,null,{default:s(()=>[i(e(p),{title:"Email Verification"}),w,e(l)?(o(),h("div",V," A new verification link has been sent to the email address you provided during registration. ")):g("",!0),a("form",{onSubmit:k(d,["prevent"])},[a("div",E,[i(x,{class:y({"opacity-25":e(t).processing}),disabled:e(t).processing},{default:s(()=>[n(" Resend Verification Email ")]),_:1},8,["class","disabled"]),i(e(b),{href:m.route("logout"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900"},{default:s(()=>[n("Log Out")]),_:1},8,["href"])])],40,B)]),_:1}))}};export{z as default};
