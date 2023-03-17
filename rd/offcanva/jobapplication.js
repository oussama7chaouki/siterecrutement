    $('.viewcandidatureBtn').click(function() {
      // Get user ID from data attribute
      var id_candidature = $(this).data('id_candidature');
      // var tableBody = document.querySelector('#myTable tbody');
      // var table1Body = document.querySelector('#myTable1 tbody');
// Get the element with both classes
var element = $('.passedskills.d-none');

// Set its text to the string you want to pass
// element.text('Your string here');

      // Send AJAX request to fetch user details
      $.ajax({
        url: 'offcanva/fetch_can_details.php',
        type: 'POST',
        data: { id_candidature: id_candidature },
        dataType: 'json',
        success: function(response) {
          var myArray0=response.array0
          // console.log(myArray0);
          //   var myArray = response.array1;
          //   var myArray1 = response.array2;
          //   var myArray2 = response.array3;
          //   console.log(myArray0.nom)
            var html = '';
            var div1 = $('.summary-item:has(span#formationr)');
            var div2 = $('.summary-item:has(span#experiencer)');
            var div3 = $('.summary-item:has(span#skillr)');
            console.log(div1)
$('#score').text(myArray0.score)
if(myArray0.score>=50){
  $('.result-rank').text("Great")
}
else{
  $('.result-rank').text("Passable")
}
if(myArray0.reqfor=='true'){
  $('#formationr').text("PASSED")
  div1.css("background-color", "hsl(var(--clr-accent-3), .1)");

}
else{
  
  $('#formationr').text("NOT PASSED")
  div1.css("background-color", "hsl(var(--clr-accent-1), .1)");

}

$('#skillr').text(myArray0.reqskill)
if(myArray0.reqskill>=50){

  div3.css("background-color", "hsl(var(--clr-accent-3), .1)");
}
else{
  div3.css("background-color", "hsl(var(--clr-accent-1), .1)");
}
if(myArray0.reqexp=='true'){
  $('#experiencer').text("PASSED")
  div2.css("background-color", "hsl(var(--clr-accent-3), .1)");
}
else{
  $('#experiencer').text("NOT PASSED")
  div2.css("background-color", "hsl(var(--clr-accent-1), .1)");
}




          

          // Show offcanvas
          var userOffcanvas = new bootstrap.Offcanvas(document.querySelector('#offcanvasRight'));
          userOffcanvas.show();
        },
        error: function(error) {
          console.log(error.responseText);
        }
      });
    });
 ;