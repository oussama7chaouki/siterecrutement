
oussama=document.getElementById("och")
oussama1=document.getElementById("ouch")
setInterval(change, 2500);
function change(){
    // oussama.style.transition= "opacity 10s";  
    // oussama.style.opacity = 0;

          if(oussama.innerText==="JOB"){
        oussama.innerText="EMPLOYE";
        oussama1.innerText="SEARCH";
    }
    else{oussama.innerText="JOB";
    oussama1.innerText="PASSION";
}
// oussama.style.opacity = 1;


}
// function toggleTransitionWithTimeout() {
//     console.log("hello")
//     const content =     oussama.innerText === "JOB" ? "EMPLOYE" : "JOB";
//     oussama.classList.remove("fade"); // removing the class
//     setTimeout(() => {
//       requestAnimationFrame(() => {
//         // We are manually adding new content and adding class again to node
//         oussama.innerHTML = content;
//         oussama.classList.add("fade");
//       });
//     }, 225); // timeout
//   }