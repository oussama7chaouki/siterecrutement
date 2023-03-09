let avatarId = document.getElementById("name").innerText
let svvg=document.getElementById("avatarapi");
fetch('https://api.multiavatar.com/'
+JSON.stringify("oussama chaouki"))
  .then(res => res.text())
  .then(svg => svvg.innerHTML =svg)