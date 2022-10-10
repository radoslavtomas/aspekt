import{h as k,e as b,f as $,i as E,j as M,o,c as i,b as t,g as f,t as h,u as r,a as v,w as c,L as m,d as x,r as C,k as L,v as j,n as _,T as N,l as y,F as p,m as w}from"./app.65626cce.js";const D={class:"absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto lg:ml-6 lg:pr-0"},S={class:"relative ml-3"},z=t("span",{class:"sr-only"},"Open language menu",-1),O=f("SK"),V=f("EN"),T={__name:"LanguageSelector",setup(g){const n=k(!1),l=k(null),d=k(null),s=b(()=>$().props.value.locale),u=()=>{n.value=!n.value},e=a=>{n.value&&!d.value.contains(a.target)&&!l.value.contains(a.target)&&(n.value=!1)};return E(()=>document.addEventListener("click",e)),M(()=>document.removeEventListener("click",e)),(a,oe)=>(o(),i("div",D,[t("div",S,[t("div",null,[t("button",{onClick:u,ref_key:"langButton",ref:d,type:"button",class:"flex justify-center items-center w-6 h-6 rounded-full bg-red-600 text-white hover:bg-red-700 text-xs focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-red-700",id:"user-menu-button","aria-expanded":"false","aria-haspopup":"true"},[z,f(" "+h(r(s).toUpperCase()),1)],512)]),n.value?(o(),i("div",{key:0,ref_key:"langDiv",ref:l,class:"absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none",role:"menu","aria-orientation":"vertical","aria-labelledby":"user-menu-button",tabindex:"-1"},[v(r(m),{href:a.route("language","sk"),class:"block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200",role:"menuitem",tabindex:"-1",id:"user-menu-item-0"},{default:c(()=>[O]),_:1},8,["href"]),v(r(m),{href:a.route("language","en"),class:"block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200",role:"menuitem",tabindex:"-1",id:"user-menu-item-1"},{default:c(()=>[V]),_:1},8,["href"])],512)):x("",!0)])]))}},A={class:"relative flex flex-col justify-center items-center"},F={__name:"MenuDropdown",props:{align:{default:"right"},width:{default:"48"},contentClasses:{default:()=>["py-1","bg-white"]}},setup(g){const n=g,l=u=>{s.value&&u.key==="Escape"&&(s.value=!1)};E(()=>document.addEventListener("keydown",l)),M(()=>document.removeEventListener("keydown",l));const d=b(()=>({48:"w-48",52:"w-52",58:"w-58",64:"w-64"})[n.width.toString()]);b(()=>n.align==="left"?"origin-top-left left-0":n.align==="center"?"origin-top-right -left-1/3":n.align==="right"?"origin-top-right right-0":"origin-top");const s=k(!1);return(u,e)=>(o(),i("div",A,[t("div",{onClick:e[0]||(e[0]=a=>s.value=!s.value)},[C(u.$slots,"trigger")]),L(t("div",{class:"fixed inset-0 z-40",onClick:e[1]||(e[1]=a=>s.value=!1)},null,512),[[j,s.value]]),v(N,{"enter-active-class":"transition ease-out duration-200","enter-from-class":"transform opacity-0 scale-95","enter-to-class":"transform opacity-100 scale-100","leave-active-class":"transition ease-in duration-75","leave-from-class":"transform opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-95"},{default:c(()=>[L(t("div",{class:_(["absolute top-full z-50 mt-2 rounded-md shadow-lg",[r(d)]]),style:{display:"none"},onClick:e[2]||(e[2]=a=>s.value=!1)},[t("div",{class:_(["rounded-md ring-1 ring-black ring-opacity-5",g.contentClasses])},[C(u.$slots,"content")],2)],2),[[j,s.value]])]),_:3})]))}},U={class:"text-red-600 border-b-4 border-transparent hover:border-red-600 hover:text-red-700transition duration-50 ease-in-out"},B={__name:"MenuDropdownLink",props:{mobile:{default:!1}},setup(g){const n=g,l=b(()=>n.mobile?"text-left ml-3 text-xs py-1":"text-center text-sm py-3 uppercase");return(d,s)=>(o(),y(r(m),{class:_(["block w-full px-4 leading-5 font-bold focus:outline-none focus:bg-red-100 transition duration-150 ease-in-out",r(l)])},{default:c(()=>[t("span",U,[C(d.$slots,"default")])]),_:3},8,["class"]))}},K={class:"tracking-widest"},P={class:"mx-auto max-w-7xl px-2 md:px-6 lg:px-8"},q={class:"relative flex h-16 items-center justify-between"},G={class:"absolute inset-y-0 left-0 flex items-center lg:hidden"},H={type:"button",class:"inline-flex items-center justify-center rounded-md p-2 text-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500","aria-controls":"mobile-menu","aria-expanded":"false"},J=t("span",{class:"sr-only"},"Open main menu",-1),Q=t("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"},null,-1),R=[Q],W=t("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6 18L18 6M6 6l12 12"},null,-1),X=[W],Y={class:"flex flex-1 items-center justify-center lg:items-stretch lg:justify-start"},Z={class:"flex flex-shrink-0 items-center"},I=t("img",{class:"h-12 w-auto",src:"/assets/img/aspekt_logo.jpg",alt:"Aspekt"},null,-1),ee={class:"hidden lg:ml-6 lg:block"},te={class:"flex items-center justify-between space-x-3.5 h-full"},se={key:0,class:"lg:hidden bg-gray-100 absolute w-full z-10",id:"mobile-menu"},ne={class:"space-y-1 px-2 pt-2 pb-3"},ae={__name:"NavigationBar",setup(g){const n=k(!1),l=b(()=>$().props.value.locale),d=b(()=>$().props.value.navigation);return(s,u)=>(o(),i("nav",K,[t("div",P,[t("div",q,[t("div",G,[t("button",H,[J,n.value?x("",!0):(o(),i("svg",{key:0,onClick:u[0]||(u[0]=e=>n.value=!0),class:"h-6 w-6",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor","aria-hidden":"true"},R)),n.value?(o(),i("svg",{key:1,onClick:u[1]||(u[1]=e=>n.value=!1),class:"h-6 w-6",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor","aria-hidden":"true"},X)):x("",!0)])]),t("div",Y,[t("div",Z,[v(r(m),{href:s.route("home")},{default:c(()=>[I]),_:1},8,["href"])])]),t("div",ee,[t("div",te,[(o(!0),i(p,null,w(r(d),e=>(o(),i(p,null,[e.categories.length?(o(),y(F,{key:1,align:"center",width:"52"},{trigger:c(()=>[t("button",{class:_([{"border-b-4 border-red-600":s.$page.component===e.component},"font-bold text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium uppercase"])},h(e[`name_${r(l)}`]),3)]),content:c(()=>[(o(!0),i(p,null,w(e.categories,a=>(o(),y(B,{href:s.route(e.route)+"/"+a.url,as:"button"},{default:c(()=>[f(h(a[`name_${r(l)}`]),1)]),_:2},1032,["href"]))),256))]),_:2},1024)):(o(),y(r(m),{key:0,href:s.route(e.route),class:_([{"border-b-4 border-red-600":s.$page.component===e.component},"inline-block font-bold text-red-600 uppercase hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium"]),"aria-current":"page"},{default:c(()=>[f(h(e[`name_${r(l)}`]),1)]),_:2},1032,["href","class"]))],64))),256))])]),v(T)])]),n.value?(o(),i("div",se,[t("div",ne,[(o(!0),i(p,null,w(r(d),e=>(o(),i(p,null,[v(r(m),{href:s.route(e.route),class:_([{"border-b-4 border-red-600":s.$page.component===e.component},"block font-bold uppercase text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium"]),"aria-current":"page"},{default:c(()=>[f(h(e[`name_${r(l)}`]),1)]),_:2},1032,["href","class"]),e.categories.length?(o(!0),i(p,{key:0},w(e.categories,a=>(o(),y(B,{href:s.route(e.route)+"/"+a.url,as:"button",mobile:!0},{default:c(()=>[f(h(a[`name_${r(l)}`]),1)]),_:2},1032,["href"]))),256)):x("",!0)],64))),256))])])):x("",!0)]))}};export{ae as _};
