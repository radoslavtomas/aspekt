import{f as t,g as l,C as k,o as s,c,b as u,a as S,w as g,h,t as o,u as e,L as f,A as B,d as v}from"./app.32798085.js";const N={class:"flex my-2 py-1 space-x-2 text-xs md:text-sm flex-wrap"},V=u("li",null," > ",-1),$={key:1},w={key:0},C={key:1},A={__name:"Breadcrumbs",props:{id:String,article:String},setup(x){const r=x,d=t(()=>l().props.value.category),n=t(()=>l().props.value.locale),p=t(()=>l().props.value.navigation),i=t(()=>l().props.value.slug),_=t(()=>d.value[`name_${n.value}`]),y=t(()=>p.value.find(a=>a.route==="home")[`name_${n.value}`]),m=t(()=>p.value.find(a=>a.route===r.id));return k(()=>console.log(r)),(a,b)=>(s(),c("ul",N,[u("li",null,[S(e(f),{href:a.route("home"),class:"text-red-600 hover:text-red-700"},{default:g(()=>[h(o(e(y)),1)]),_:1},8,["href"])]),V,u("li",null,[e(i)?(s(),B(e(f),{key:0,href:a.route(r.id,[e(d).url]),class:"text-red-600 hover:text-red-700"},{default:g(()=>[h(o(e(m)[`name_${e(n)}`])+" - "+o(e(_)),1)]),_:1},8,["href"])):(s(),c("span",$,o(e(m)[`name_${e(n)}`])+" - "+o(e(_)),1))]),e(i)?(s(),c("li",w," > ")):v("",!0),e(i)?(s(),c("li",C,o(r.article),1)):v("",!0)]))}};export{A as _};
