const im1= document.querySelector('#img1');
const im2= document.querySelector('#img2');
window.addEventListener("load", aggiungi);
const v= 'concerto';
const a ='stadio';

function aggiungi(){
    fetch("https://pixabay.com/api/?key=26954894-be96704e052e3e2792a685dbd&image_type=photo&lang=it&q="+ v).then(gest).then(res2);
    fetch("https://pixabay.com/api/?key=26954894-be96704e052e3e2792a685dbd&image_type=photo&lang=it&q="+ a).then(gest).then(res1);
    
}

function gest(response){
     return response.json();
   }

function res1(json){
    const hit =json.hits[0];
    const img_url=hit.webformatURL;
    const imm= document.createElement('img');
    imm.src=img_url;
    im1.appendChild(imm);
    }

function res2(json){
const hit =json.hits[6];
const img_url=hit.webformatURL;
const imm= document.createElement('img');
imm.src=img_url;
im2.appendChild(imm);
}

const form= document.forms['ricerca_evento'];
form.addEventListener('submit',gestione);
const e1 = document.querySelector('#err_p');
const e2 = document.querySelector('#errp2');


function gestione(event){
let d= form.data.value;
let b = 'T00:00:00Z';
let data_c = d.concat(b);
event.preventDefault();
let ev = encodeURIComponent(form.evento.value);
let nazione = encodeURIComponent(form.nazione.value);

if (ev == 0 ){
    e1.classList.remove('hidden');
}else{
    e1.classList.add('hidden');
}
 
if(nazione == 0){ nazione = 'no'};

fetch('/hwk2/public/cerca/'+ ev + '/' + nazione + '/' + data_c ).then(gest2).then(res);
}

function gest2(response){
    return response.json();
}

const ti =[]; const o=[];
const lu =[]; const imma=[];
const da =[]; const info=[];
let num_tot = undefined;

function res(json){
   // console.log(json);
    const res= document.querySelector('#sect');
    res.innerHTML="";
    let h = json.page.totalElements;
    console.log(h);
    if(json.page.totalElements===0){alert('Nessun evento trovato...')
    }else{
    if(h>10){h=10;}else if(h<10 && h>4){h=5;} else if(h>1 && h<5){h=2;} else{h=1;}
    num_tot = h;
    const div_t =document.createElement('div'); div_t.textContent="Eventi trovati"; 
    div_t.classList.add('Ris_t'); res.appendChild(div_t);
    for(let i = 0; i<h; i++){
    //div in colonna
    const divp= document.createElement('div');
    divp.classList.add('results');
    const elem= json._embedded.events[i];
    const titolo = elem.name;
    let luogo = elem.dates.timezone;
    if (!luogo){luogo = 'indefinito'; }
    let data = elem.dates.start.localDate;
    if (!data){data = 'indefinita'; }
    let ora = elem.dates.start.localTime;
    if (!ora){luogo = 'indefinita'; }
    let immag = elem.images[0].url;
    if (!immag){immag = 'indefinito'; }
    let ur = elem.url;
    if (!ur){ur = 'indefinito'; }
    const con_imm = document.createElement('div');
    const con_info = document.createElement('div');
    con_info.classList.add('contenitore');
    let d= form.data.value;
    //Salvo i dati del Json
    ti[i]= titolo; lu[i]= luogo; da[i]= data;
    o[i]= ora; imma[i]=immag; info[i]=ur;
    
    if(data !== d && d){
        console.log(d);
        const e = document.createElement('div');
        e.classList.add('Err');
        e.textContent="Ho trovato questo evento in un altra data";
        con_info.appendChild(e);
    }
    const im = document.createElement('img');
    im.src= immag;
    con_imm.appendChild(im);
    divp.appendChild(con_imm);
    const div1=document.createElement('div'); const div2=document.createElement('div'); const div6=document.createElement('div');
    const div3=document.createElement('div'); const div4=document.createElement('div');
    const div5=document.createElement('div'); const bu=document.createElement('button');
    const u =document.createElement('a'); u.textContent="Clicca qui per avere più informazioni";
    u.href=ur; bu.classList.add('bu'); bu.textContent="Aggiungi ai preferiti";

    const s1="Evento: "; const s2="Luogo: "; const s3= "Data: "; const s4= "Ora: ";
    
    div1.textContent= s1.concat(titolo); div2.textContent= s2.concat(luogo); div3.textContent= s3.concat(data);
    div4.textContent= s4.concat(ora); 
    

    con_info.appendChild(div1);
    con_info.appendChild(div2);
    con_info.appendChild(div3);
    con_info.appendChild(div4);
    div5.appendChild(u);
    con_info.appendChild(div5);
    div6.appendChild(bu);
    con_info.appendChild(div6);
    divp.appendChild(con_info);
    res.appendChild(divp);
    bu.addEventListener('click', pref);
    
}
    }
}

function pref(event){
    let num = undefined;
    const ev= event.currentTarget;
    ev.classList.add('hidden'); ev.classList.add('ident');
    const all =document.querySelectorAll('.bu');
    
for(let j=0; j<num_tot; j++){
    if(all[j].className === 'bu hidden ident'){num=j
    ev.classList.remove('ident');
    }
}

let parametri = { 
    'titolo': ti[num], 'luogo': lu[num],
    'data': da[num], 'ora': o[num],
    'immagine': imma[num], 'url':info[num],
};

const csrftoken= document.head.querySelector("[name~=csrf-token][content]").content;

fetch('/hwk2/public/pref', {
        method: 'POST',
        headers: {
           'Content-Type': 'application/json',
           "X-CSRF-TOKEN": csrftoken
        },
        body: JSON.stringify(parametri)
    }).then(ritorno).then(risultato);

}

function ritorno(response){
    return response.text();
}

function risultato(risp){
console.log(risp);

if(risp == 'gia preferito'){
    alert("Elemento già presente nei preferiti");
}
if(risp == 'aggiunto'){
    alert("Elemento aggiunto nei preferiti");
}
if(risp == 'er_inser'){
    alert("Errore durante l'inserimento nel database... Riprovare");
}
}

const b_pref = document.querySelector('#vis');
b_pref.addEventListener('click', preferiti);

const ti_pr =[]; const o_pr=[];
const lu_pr =[]; const imma_pr=[];
const da_pr =[]; const info_pr=[];

function preferiti(event){
fetch('/hwk2/public/numero').then(g).then(ge2);
event.preventDefault();
event.currentTarget.classList.add('hidden');

}

function g(response){

return response.json();
}
let n_p = undefined;

function ge2(r){
    console.log(r);
    n_p = r;
    fetch('/hwk2/public/gestionepref').then(g).then(ge);

function ge(r){

const lun = n_p;
console.log(r);
console.log(n_p);

if(lun === 0){
    alert("Non hai preferiti..");
    const b = document.querySelector('#vis');
    b.classList.remove('hidden');
 }
else{
const sez_pref= document.querySelector('#preferiti');
sez_pref.innerHTML="";
const blocco1= document.querySelectorAll('.blocco1');
const ris= document.querySelector('#sect');
for(let i of blocco1){
i.classList.add('hidden');
}
ris.innerHTML="";
for(let i=0; i<lun; i++){
ti_pr[i] = r[i].evento; da_pr[i] = r[i].data; lu_pr[i] = r[i].luogo;
o_pr[i]= r[i].ora; imma_pr[i] = r[i].immagine; info_pr[i] = r[i].info;
const divp= document.createElement('div');
divp.classList.add('results2');
const con_imm = document.createElement('div');
const con_info = document.createElement('div');
con_imm.classList.add('contenitore_i');
con_info.classList.add('contenitore');
const im = document.createElement('img');
im.src= r[i].immagine;
con_imm.appendChild(im);
divp.appendChild(con_imm);
 
const div1=document.createElement('div'); const div2=document.createElement('div'); const div6=document.createElement('div');
const div3=document.createElement('div'); const div4=document.createElement('div');
const div5=document.createElement('div');  const bu=document.createElement('button');

const u =document.createElement('a'); u.textContent="Clicca qui per avere più informazioni";
u.href=r[i].info; bu.classList.add('bu2'); bu.textContent="Rimuovi dai preferiti";

const s1="Evento: "; const s2="Luogo: "; const s3= "Data: "; const s4= "Ora: ";

div1.textContent= s1.concat(r[i].evento); div2.textContent= s2.concat(r[i].luogo); div3.textContent= s3.concat(r[i].data);
div4.textContent= s4.concat(r[i].ora); 

con_info.appendChild(div1);
con_info.appendChild(div2);
con_info.appendChild(div3);
con_info.appendChild(div4);
div5.appendChild(u);
con_info.appendChild(div5);
div6.appendChild(bu);
con_info.appendChild(div6);
divp.appendChild(con_info);
sez_pref.appendChild(divp);
bu.addEventListener('click', remove);
}
}
} 
}

let nu = undefined;
function remove(event){
    
    const ev= event.currentTarget;
    ev.classList.add('hidden2'); ev.classList.add('ident');
    const all =document.querySelectorAll('.bu2');
    let numtotali = all.length;
for(let j=0; j<numtotali; j++){
    if(all[j].className === 'bu2 hidden2 ident'){nu=j
    ev.classList.remove('ident');
    }
}

let parametri = { 
    'evento': ti_pr[nu], 'luogo': lu_pr[nu],
    'data': da_pr[nu], 'ora': o_pr[nu],
    'immagine': imma_pr[nu], 'url': info_pr[nu],
};

const cstoken= document.head.querySelector("[name~=csrf-token][content]").content;

fetch('/hwk2/public/rempref', {
        method: 'POST',
        headers: {
           'Content-Type': 'application/json',
           "X-CSRF-TOKEN": cstoken
        },
        body: JSON.stringify(parametri)
    }).then(ritorno).then(risultato_pr);
}

function risultato_pr(r){

console.log(r);
if(r === 'eliminato'){alert("Elemento eliminato dai preferiti");
const el = document.querySelectorAll('.results2');
const el1 = document.querySelectorAll('.contenitore'); 
const el2 = document.querySelectorAll('.contenitore_i');
el[nu].classList.add('hidden'); el1[nu].classList.add('hidden'); el2[nu].classList.add('hidden');
}else{alert("Errore..");
const b= document.querySelector('.bu2');
b.classList.remove('hidden2');
}
}



const ric= document.querySelector('#logo img' );
ric.addEventListener('click', ricarica);

function ricarica(event){
    window.location.reload();
} 
