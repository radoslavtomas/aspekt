import{f as _,g as f,o as r,c as o,b as s,a,w as m,d as c,u as n,L as u,t as i,y as b,h as p}from"./app.fe8975bb.js";import{_ as y}from"./BookSingleCtaButton.8ea20d8d.js";const g={class:"bg-white border border-gray-300 shadow-md p-4"},k=["alt","src"],x={class:"text-xl text-red-600"},v={key:0,class:"text-sm text-gray-500 italic mb-2"},w=["innerHTML"],L={key:0,class:"py-2 my-2 flex justify-between items-center"},B={class:"font-bold"},C={__name:"BookListItem",props:{item:Object},setup(d){const h=_(()=>{var l;const t=(l=f().props.value.category)==null?void 0:l.url;return t||"vsetko"}),e=d;return(t,l)=>(r(),o("article",g,[s("header",null,[a(n(u),{href:t.route("books",[h.value,e.item.slug])},{default:m(()=>[e.item.cover?(r(),o("img",{key:0,alt:d.item.title,src:`/storage/${e.item.cover}`,class:"w-48 h-auto mx-auto border border-gray-200 shadow-md mb-2 rounded-md hover:-translate-y-1 transition-transform duration-75 ease-out"},null,8,k)):c("",!0)]),_:1},8,["href"])]),s("main",null,[a(n(u),{href:t.route("books",[h.value,e.item.slug])},{default:m(()=>[s("h2",x,i(e.item.title),1)]),_:1},8,["href"]),e.item.subtitle?(r(),o("h3",v,i(e.item.subtitle),1)):c("",!0),s("h3",{class:b([e.item.subtitle?"":"mt-2","text-sm italic mb-4 text-red-600"])},[a(n(u),{href:t.route("search",{parameter:"author",query:e.item.authors})},{default:m(()=>[p(i(e.item.authors),1)]),_:1},8,["href"])],2),s("p",{class:"text-sm",innerHTML:e.item.teaser},null,8,w)]),e.item.is_product?(r(),o("footer",L,[s("p",B,i(e.item.aspekt_price),1),a(y,{book:e.item},null,8,["book"])])):c("",!0)]))}};export{C as _};
