const form = document.forms['reg'];
form.addEventListener('submit', controllo);
const errore1 = document.querySelector('#errore1');
const errore2 = document.querySelector('#errore2');
const errore3 = document.querySelector('#errore3');
const errore4 = document.querySelector('#errore4');
let nu = document.querySelector('#nome_ut');
let pass = document.querySelector('#pass');
let nome = document.querySelector('#no');
let cognome = document.querySelector('#cogn');
let email = document.querySelector('#e_mail');
let v = [];
let x = 0;

function controllo(event)
{
event.preventDefault();
const ev = event.currentTarget;

if (form.nome.value.length == 0 || form.cognome.value.length == 0 || form.username.value.length == 0 || form.email.value.length == 0 || form.password.value.length == 0|| form.conf_password.value.length == 0 || form.password.value.length < 8|| form.password.value.length > 16) {
  err = document.querySelector('.errori');      
  err2 = document.querySelector('.errori2');
  if(form.password.value.length < 8 || form.password.value.length > 16){
    err.textContent="";
    err2.textContent="";
    err.textContent=" La password deve contenere da 8 a 16 caratteri ";
    }
        else {
          err.textContent="";
          err2.textContent="";
          err.textContent="Riempire tutti i campi";
        }
    }
    else {
      console.log(form.conf_password.value.length);

      if(form.password.value !== form.conf_password.value ){
        err.textContent="";
        err2.textContent="";
        err.textContent="La password e la sua conferma non corrispondono";
      }
      err = document.querySelector('.errori');      
      err2 = document.querySelector('.errori2');
      err.textContent="";
      err2.textContent="";
      fetch('/hwk2/public/regi/username/' + encodeURIComponent(form.username.value)).then(gest).then(res);
      fetch('/hwk2/public/regi/email/' + encodeURIComponent(form.email.value)).then(gest).then(res);
  }
 

function gest(response) {
  
  const r = response.text();
  return r;
}

function res(r) {
  x++;
  if( x=== 1){v[0]=r;}
  if( x=== 2){
    v[1]=r;
    x=0;
  }
  console.log(v);

  const e3=document.querySelector('.errori3');
  const e4=document.querySelector('.errori4');
  const e5=document.querySelector('.errori5');
  const e6=document.querySelector('.errori6');
  e3.textContent="";
  e4.textContent="";
  e5.textContent="";
  e6.textContent="";
  
  if(v[0] == 'ok' && v[1] == 'ok'){ form.submit();}
  if (v[0] == 'Usernamenonvalido' || v[1] == 'Usernamenonvalido') 
  { 
  e3.textContent="Username non valido";
  event.preventDefault;
  }
  if (v[0] == 'userutilizzato' || v[1] == 'userutilizzato') 
  { 
  e4.textContent="Username già utilizzato";
  event.preventDefault;
  }
  if (v[0] == 'Emailnonvalida' || v[1] == 'Emailnonvalida') 
  { 
  e5.textContent="Email non valida"; 
  event.preventDefault;
  }
  if (v[0]== 'emailutilizzata' || v[1]== 'emailutilizzata') 
  { 
  e5.textContent="Email già utilizzata";
  event.preventDefault;
  }
}
}