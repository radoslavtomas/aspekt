import{f as t,g as v,o as e,c as o,b as f,a as B,w as p,h as d,t as l,u as h,L as m,B as x,d as s}from"./app.42ee52da.js";const S={class:"flex my-2 py-1 space-x-2 text-xs md:text-sm flex-wrap"},$=f("li",null," > ",-1),N={key:0},V={key:2},w={key:0},b={key:0},C={key:1},E={__name:"Breadcrumbs",props:{id:String,article:String},setup(y){const r=t(()=>v().props.value.category),u=t(()=>v().props.value.locale),g=t(()=>v().props.value.navigation),n=t(()=>v().props.value.slug),c=t(()=>r.value?r.value[`name_${u.value}`]:""),k=t(()=>g.value.find(a=>a.route==="home")[`name_${u.value}`]),_=t(()=>g.value.find(a=>a.route===i.id)),i=y;return(a,L)=>(e(),o("ul",S,[f("li",null,[B(h(m),{href:a.route("home"),class:"text-red-600 hover:text-red-700"},{default:p(()=>[d(l(k.value),1)]),_:1},8,["href"])]),$,f("li",null,[n.value&&r.value?(e(),x(h(m),{key:0,href:a.route(i.id,[r.value.url]),class:"text-red-600 hover:text-red-700"},{default:p(()=>[d(l(_.value[`name_${u.value}`])+" ",1),c.value?(e(),o("span",N,"- "+l(c.value),1)):s("",!0)]),_:1},8,["href"])):s("",!0),n.value&&!r.value?(e(),x(h(m),{key:1,href:a.route(i.id),class:"text-red-600 hover:text-red-700"},{default:p(()=>[d(l(_.value[`name_${u.value}`]),1)]),_:1},8,["href"])):s("",!0),!n.value&&r.value?(e(),o("span",V,[d(l(_.value[`name_${u.value}`])+" ",1),c.value?(e(),o("span",w,"- "+l(c.value),1)):s("",!0)])):s("",!0)]),n.value?(e(),o("li",b," > ")):s("",!0),n.value?(e(),o("li",C,l(i.article),1)):s("",!0)]))}};export{E as _};
