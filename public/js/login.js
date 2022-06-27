const form = document.forms['log_form'];
form.addEventListener('submit', log);
const errore = document.querySelector('.errori');
const e2=document.querySelector('.errori2');

function log(event){
event.preventDefault();
if(form.username.value.length == 0 || form.password.value.length == 0){
e2.textContent="";
errore.textContent="Riempire tutti i campi";
}else {
    e2.textContent="";
    errore.textContent="";
    fetch('/hwk2/public/login/username/' + encodeURIComponent(form.username.value) +'/password/' + encodeURIComponent(form.password.value)).then(gest).then(res);
}

function gest(response) {

    const r = response.text();
    return r;
}

function res(r){
console.log(r); 
const e_reg=document.querySelector('.hidden');
e2.textContent="";
errore.textContent="";
if (r == 'nonesiste') { e2.textContent="Account non esistente";
e_reg.classList.remove('hidden');
e_reg.classList.add('es');
}
if(r == 'pwsbagliata') {
    e_reg.classList.add('hidden');
    e2.textContent="Password errata";
}
if(r == 'esiste'){form.submit();} 
} 
}