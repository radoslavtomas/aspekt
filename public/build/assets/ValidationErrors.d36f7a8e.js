import{r as m,I as p,o as t,c as s,t as i,N as f,f as u,g,u as l,b as c,F as h,D as v,d as y}from"./app.b70aaf37.js";const b=["value"],I={__name:"Input",props:["modelValue"],emits:["update:modelValue"],setup(o){const e=m(null);return p(()=>{e.value.hasAttribute("autofocus")&&e.value.focus()}),(a,r)=>(t(),s("input",{class:"border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",value:o.modelValue,onInput:r[0]||(r[0]=n=>a.$emit("update:modelValue",n.target.value)),ref_key:"input",ref:e},null,40,b))}},k={class:"block font-medium text-sm text-gray-700"},$={key:0},x={key:1},N={__name:"Label",props:["value"],setup(o){return(e,a)=>(t(),s("label",k,[o.value?(t(),s("span",$,i(o.value),1)):(t(),s("span",x,[f(e.$slots,"default")]))]))}},V={key:0},w=c("div",{class:"font-medium text-red-600"},"Whoops! Something went wrong.",-1),B={class:"mt-3 list-disc list-inside text-sm text-red-600"},S={__name:"ValidationErrors",setup(o){const e=u(()=>g().props.value.errors),a=u(()=>Object.keys(e.value).length>0);return(r,n)=>l(a)?(t(),s("div",V,[w,c("ul",B,[(t(!0),s(h,null,v(l(e),(d,_)=>(t(),s("li",{key:_},i(d),1))),128))])])):y("",!0)}};export{S as _,N as a,I as b};
