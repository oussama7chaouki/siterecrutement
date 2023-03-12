let myform=document.getElementById('myform');
let nom=document.getElementById('nom');
let prenom=document.getElementById('prenom');
let tel=document.getElementById('tel');
let ville=document.getElementById('ville');
let date=document.getElementById('date');
let suivant=document.getElementById('suivant');
let select=document.getElementById('select');


let span1=document.getElementById('span1');
let span2=document.getElementById('span2');
let span3=document.getElementById('span3');
let span4=document.getElementById('span4');
let span5=document.getElementById('span5');
let span6=document.getElementById('span6');


function hicham(element,span) {
  element.addEventListener('keyup', function() {
    element.style.border = "1px solid #dee2e6";
    span.innerHTML = "";
  });
}

hicham(nom,span1);
hicham(prenom,span2);
hicham(tel,span3);
hicham(ville,span4);
hicham(date,span5);
function resetSelectError(selectElement, spanElement) {
    selectElement.addEventListener('change', function() {
      selectElement.style.border = "1px solid #dee2e6";
      spanElement.innerHTML = "";
    });
  }
  

  resetSelectError(select,span6);

suivant.addEventListener('click',function(e){
  if(nom.value === ""){
    nom.style.border="2px solid red ";
    span1.innerHTML="name is required";
    span1.style.color="red";
    e.preventDefault();
  }
  else if(prenom.value === ""){
    prenom.style.border="2px solid red ";
    span2.innerHTML="prenom is required";
    span2.style.color="red";
    e.preventDefault();
  }
  else if(date.value === "") {
    date.style.border="2px solid red ";
    span5.innerHTML="date is required";
    span5.style.color="red";
    e.preventDefault();
  }
  else if(ville.value === ""){
    ville.style.border="2px solid red ";
    span4.innerHTML="ville is required";
    span4.style.color="red";
    e.preventDefault();
  }
  else if(tel.value === "") {
    tel.style.border="2px solid red ";
    span3.innerHTML="tel  is required";
    span3.style.color="red";
    e.preventDefault();
  }
  else if(tel.value.length<10) {
    tel.style.border="2px solid red ";
    span3.innerHTML="tel must be  10 characters long";
    span3.style.color="red";
    e.preventDefault();
  }
  
  else if(select.value === "") {
    select.style.border="2px solid red ";
    span6.innerHTML="Choose an option";
    span6.style.color="red";
    e.preventDefault();
  }

});
