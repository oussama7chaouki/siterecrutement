tabregister=document.getElementById("tab-register");
tablogin=document.getElementById("tab-login");
pillslogin=document.getElementById("pills-login");
pillsregistre=document.getElementById("pills-register");
if(!localStorage.get('testeur')){
  localStorage.setItem('testeur',false);
}
if (window.location.href.indexOf('?error') > -1) {
    if( localStorage.getItem('signup')==='true'){
        tablogin.classList.remove("active");
        tabregister.classList.add("active");
        // console.log("hello");
        pillslogin.classList.remove("show","active");
        pillsregistre.classList.add("show","active");
    }
    else{
        tabregister.classList.remove("active");
       tablogin.classList.add("active");
       pillslogin.classList.add("show","active");
       pillsregistre.classList.remove("show","active");

    }

  }
  else{
    tablogin.classList.add("active");
    pillslogin.classList.add("show","active");
  }


function outesteur(){
 if(tabregister.classList.contains("active")){
    localStorage.setItem('signup',true);
} 
else{
    localStorage.setItem('signup',false);
}
}




// outesteur();


