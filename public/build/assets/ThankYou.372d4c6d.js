import{o as h,c as d,b as e,r as _,f as u,D as x,a as l,u as c,w as m,F as f,e as v,H as w,t as o,L as k,h as b,g}from"./app.1d20f6a6.js";import{_ as T}from"./MainLayout.a16c18f8.js";import"./NavigationBar.ff3ae742.js";import"./plugin-vue_export-helper.21dcd24c.js";function B(p,a){return h(),d("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor","aria-hidden":"true","data-slot":"icon"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"})])}const y={class:"max-w-xl mx-auto pt-8"},N={class:"text-2xl text-center text-pink-600 font-semibold mb-4"},S={class:"mb-4 text-center"},V={class:"mb-2"},Y={class:"mb-2 text-sm"},H={class:"mb-10 text-sm font-bold"},L=e("section",{class:"my-6 flex flex-col sm:flex-row flex-col-reverse justify-between items-center text-sm sm:text-base"},null,-1),E={__name:"ThankYou",setup(p){const a=v(),i=_(""),t=u(()=>a.getters.lang),s=u(()=>g().props.value.locale);return x(()=>{let n=window.location.search;const r=new URLSearchParams(n);i.value=r.has("email")?r.get("email"):"",a.dispatch("resetBasket"),a.dispatch("resetCustomer")}),(n,r)=>(h(),d(f,null,[l(c(w),{title:t.value[s.value].eshopThankYouTitle},null,8,["title"]),l(T,null,{default:m(()=>[e("div",y,[e("h1",N,o(t.value[s.value].eshopThankYouTitle),1),e("div",S,[e("p",V,o(t.value[s.value].eshopThankYouNote),1),e("p",Y,o(t.value[s.value].eshopThankYouStatusNote),1),e("p",H,o(i.value),1),l(c(k),{href:n.route("home"),class:"rounded text-white text-center px-4 py-3 mb-3 sm:mb-0 w-full sm:w-auto shadow-md bg-pink-500 hover:bg-pink-600"},{default:m(()=>[b(o(t.value[s.value].eshopGoHomeButton)+" ",1),l(c(B),{class:"mb-0.5 w-5 h-5 ml-1 inline"})]),_:1},8,["href"])]),L])]),_:1})],64))}};export{E as default};