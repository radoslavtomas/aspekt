import{f as a,g as i,o as e,c as t,b as k,a as V,w as p,h as _,t as s,u as m,L as y,B as g,d as r}from"./app.fe8975bb.js";const $={class:"flex my-2 py-1 space-x-2 text-xs md:text-sm flex-wrap"},N=k("li",null," > ",-1),w={key:0},b={key:0},q={key:2},C={key:0},L={key:1},D={key:2},E={key:3},j={__name:"Breadcrumbs",props:{id:String,article:String},setup(x){const o=a(()=>i().props.value.category),u=a(()=>i().props.value.locale),f=a(()=>i().props.value.navigation),n=a(()=>i().props.value.slug),v=a(()=>i().props.value.query),d=a(()=>o.value?o.value[`name_${u.value}`]:""),S={en:"Search",sk:"Vyh\u013Ead\xE1vanie"},B=a(()=>f.value.find(l=>l.route==="home")[`name_${u.value}`]),h=a(()=>f.value.find(l=>l.route===c.id)),c=x;return(l,P)=>(e(),t("ul",$,[k("li",null,[V(m(y),{href:l.route("home"),class:"text-red-600 hover:text-red-700"},{default:p(()=>[_(s(B.value),1)]),_:1},8,["href"])]),N,v.value?(e(),t("li",L,s(S[u.value]),1)):(e(),t("li",w,[n.value&&o.value?(e(),g(m(y),{key:0,href:l.route(c.id,[o.value.url]),class:"text-red-600 hover:text-red-700"},{default:p(()=>[_(s(h.value[`name_${u.value}`])+" ",1),d.value?(e(),t("span",b,"- "+s(d.value),1)):r("",!0)]),_:1},8,["href"])):r("",!0),n.value&&!o.value?(e(),g(m(y),{key:1,href:l.route(c.id),class:"text-red-600 hover:text-red-700"},{default:p(()=>[_(s(h.value[`name_${u.value}`]),1)]),_:1},8,["href"])):r("",!0),!n.value&&o.value?(e(),t("span",q,[_(s(h.value[`name_${u.value}`])+" ",1),d.value?(e(),t("span",C,"- "+s(d.value),1)):r("",!0)])):r("",!0)])),n.value||v.value?(e(),t("li",D," > ")):r("",!0),n.value||v.value?(e(),t("li",E,s(c.article?c.article:v.value),1)):r("",!0)]))}};export{j as _};
