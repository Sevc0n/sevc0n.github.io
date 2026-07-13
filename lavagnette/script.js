
const pal=[[249,255,254],[249,128,29],[199,78,189],[58,179,218],[254,216,61],[128,199,31],[243,139,170],[71,79,82],[157,157,151],[22,156,156],[137,50,184],[60,68,170],[131,84,50],[94,124,22],[176,46,38],[29,29,33]];
let img=new Image();
f.onchange=e=>{let r=new FileReader();r.onload=()=>{img.onload=()=>{w.value=img.width;h.value=img.height;o.width=img.width;o.height=img.height;o.getContext('2d').drawImage(img,0,0)};img.src=r.result};r.readAsDataURL(e.target.files[0])}
function near(r,g,b){let bi=0,bd=1e9;pal.forEach((p,i)=>{let d=(r-p[0])**2+(g-p[1])**2+(b-p[2])**2;if(d<bd){bd=d;bi=i}});return pal[bi]}
go.onclick=()=>{c.width=+w.value;c.height=+h.value;let x=c.getContext('2d');x.drawImage(img,0,0,c.width,c.height);let id=x.getImageData(0,0,c.width,c.height),d=id.data,W=c.width,H=c.height;
for(let y=0;y<H;y++)for(let x0=0;x0<W;x0++){let i=(y*W+x0)*4,or=[d[i],d[i+1],d[i+2]],n=near(...or),er=[or[0]-n[0],or[1]-n[1],or[2]-n[2]];d[i]=n[0];d[i+1]=n[1];d[i+2]=n[2];
if(alg.value=="dither"){[[1,0,7/16],[-1,1,3/16],[0,1,5/16],[1,1,1/16]].forEach(a=>{let nx=x0+a[0],ny=y+a[1];if(nx>=0&&nx<W&&ny<H){let j=(ny*W+nx)*4;for(let k=0;k<3;k++)d[j+k]=Math.max(0,Math.min(255,d[j+k]+er[k]*a[2]))}})}
}
x.putImageData(id,0,0);dl.href=c.toDataURL("image/png");dl.download="converted.png";dl.textContent="Download PNG";}
