function adduser(){
// var formation=document.getElementById("inputformation");
// var school=document.getElementById("inputschool");
// var styear=document.getElementById("inputstyear");
// var endyear=document.getElementById("inputendyear");
//using jquery:
var formationjs=$("#inputformation").val()
var schooljs=$("#inputschool").val()
var styearjs=$("#inputstyear").val()
var endyearjs=$("#inputendyear").val()

console.log("helllo")
//ajax function take three parametre url type(methode) data option
$.ajax({
url:"crud/insert.php",
type:"post",
data:{
    formation:formationjs,
    school:schooljs,
    styear:styearjs,
    endyear:endyearjs
}
,success:function(data,status){
    console.log(status);
}
})
}