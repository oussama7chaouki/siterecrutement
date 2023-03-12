let tabs=document.querySelectorAll(".tabs li");
let tabsArray=Array.from(tabs);//make  a array with elemnt exist

let divs=document.querySelectorAll(".content > div");
let divsArray=Array.from(divs);//make  a array with elemnt exist

tabsArray.forEach(function(ele){

 ele.addEventListener("click",function(e){

  console.log(ele);
  tabsArray.forEach(function(ele){
   
  ele.classList.remove("active1");

  });

  e.currentTarget.classList.add("active1");
  divsArray.forEach(function(div){
     
    div.style.display="none";

  });
  document.querySelector(e.currentTarget.dataset.cont).style.display="block";

 });


});




































