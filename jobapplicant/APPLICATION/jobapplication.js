    $('.view-user').click(function() {
      // Get user ID from data attribute
      var userId = $(this).data('user-id');
      var tableBody = document.querySelector('#myTable tbody');
      var table1Body = document.querySelector('#myTable1 tbody');
// Get the element with both classes
var element = $('.passedskills.d-none');

// Set its text to the string you want to pass
element.text('Your string here');

      // Send AJAX request to fetch user details
      $.ajax({
        url: 'fetch_user_details.php',
        type: 'POST',
        data: { user_id: userId },
        dataType: 'json',
        success: function(response) {
            // console.log(response);
            var myArray = response.array1;
            var myArray1 = response.array2;
            var myArray2 = response.array3;
            var html = '';
            console.log(myArray.length)
            if(myArray.length>0){
            for (var i = 0; i < myArray.length; i++) {
              html += '<tr>';
              html += '<td>' + JSON.stringify(myArray[i].formation) + '</td>';
              html += '<td>' + JSON.stringify(myArray[i].school) + '</td>';
              html += '<td>' + JSON.stringify(myArray[i].startyear) + '</td>';
              html += '<td>' + JSON.stringify(myArray[i].endyear) + '</td>';
              html += '</tr>';
            }}
            tableBody.innerHTML = html;

////////////////////////////////////////
var html1 = '';
if(myArray1.length>0){
for (var j = 0; j < myArray1.length; j++) {
  html1 += '<tr>';
  html1 += '<td>' + JSON.stringify(myArray1[j].experience) + '</td>';
  html1 += '<td>' + JSON.stringify(myArray1[j].company) + '</td>';
  html1 += '<td>' + JSON.stringify(myArray1[j].startyear) + '</td>';
  html1 += '<td>' + JSON.stringify(myArray1[j].endyear) + '</td>';
  html1 += '</tr>';
}}
table1Body.innerHTML = html1;

// element.text(myArray2[0].skill
//     );
console.log(myArray2.length)
if(myArray2.length>0){

skilos=myArray2[0].skill.split(',')
console.log(skilos)
var skillsElement = document.querySelector('.skills');
skillsElement.innerHTML = '';
// Loop through the skills array and create a new HTML element for each skill
for (var i = 0; i < skilos.length; i++) {
  var skillElement = document.createElement('li');
  skillElement.innerText = skilos[i];
  skillElement.classList.add("list-group-item")
  skillsElement.appendChild(skillElement);
}}

          // Show offcanvas
          var userOffcanvas = new bootstrap.Offcanvas(document.querySelector('#user-details'));
          userOffcanvas.show();
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    });
 ;