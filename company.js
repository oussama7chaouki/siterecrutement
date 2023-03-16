

let cname=document.getElementById('companynom');
let nom=document.getElementById('nom');
 let email=document.getElementById('email');
 let tel=document.getElementById('tel');
let address=document.getElementById('address');
 let suivant=document.getElementById('suivant');


let span1=document.getElementById('span1');
let span2=document.getElementById('span2');
let span3=document.getElementById('span3');
let span4=document.getElementById('span4');
let span5=document.getElementById('span5');

function hicham(element,span) {
    element.addEventListener('keyup', function() {
      element.style.border = "1px solid #dee2e6";
      span.innerHTML = "";
    });
  }
  
  hicham(cname,span1);
  hicham(nom,span2);
  hicham(email,span3);
  hicham(tel,span4);
  hicham(address,span5);
 
    
  




suivant.addEventListener('click',function(e){

    if(cname.value === ""){
        cname.style.border="2px solid red ";
        span1.innerHTML="company name is required";
        span1.style.color="red"
        e.preventDefault();//stop form submit
    }
    else if(nom.value === ""){
        nom.style.border="2px solid red ";
        span2.innerHTML="person name is required";
        span2.style.color="red"
        e.preventDefault();//stop form submit
    
    } if(email.value === ""){
        email.style.border="2px solid red ";
        span3.innerHTML="email is required";
        span3.style.color="red"
        e.preventDefault();//stop form submit
    }else if(tel.value === ""){
        tel.style.border="2px solid red ";
        span4.innerHTML="tel  is required";
        span4.style.color="red"
        e.preventDefault();//stop form submit
    }else if(address.value === ""){
        address.style.border="2px solid red ";
        span5.innerHTML=" address is required";
        span5.style.color="red"
        e.preventDefault();//stop form submit
    }


});

