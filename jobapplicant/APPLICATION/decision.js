$('.accept').click(function() {
  var row = $(this).closest('tr');
  var decisionCell = row.find('.decision');
    var id_candidature = $(this).data('id_candidature');
    var user_id = $(this).data('user_id');
    console.log(id_candidature);
    console.log(user_id);


    // Call AJAX endpoint to accept candidate
    $.ajax({
      url: 'accept_candidate.php',
      type: 'POST',
      data: { id_candidature: id_candidature,user_id:user_id},
      dataType: 'json',
      success: function(response) {
        // Display success message
        if(response.status==200){
          decisionCell.text('Accepted');
        }
        alert(response.message);
        // Update decision in table
        // $('button[data-id="' + candidateId + '"]').closest('tr').find('.decision').text('Accepted');
      },
      error: function(xhr, status, error) {
        // Display error message
        alert('Error: ' + error);
      }
    });
  });
  
  $('.reject').click(function() {
    var row = $(this).closest('tr');
    var decisionCell = row.find('.decision');
    var id_candidature = $(this).data('id_candidature');
    var user_id = $(this).data('user_id');
        // Call AJAX endpoint to reject candidate
    $.ajax({
      url: 'reject_candidate.php',
      type: 'POST',
      data: { id_candidature: id_candidature,user_id:user_id},
      dataType: 'json',
      success: function(response) {
        // Display success message
        // $('#myTable4').load(location.href+ " #myTable4");
        if(response.status==200){
          decisionCell.text('Rejected');
        }
        alert(response.message);
        // Update decision in table
        // $('button[data-id="' + candidateId + '"]').closest('tr').find('.decision').text('Rejected')

      },
      error: function(xhr, status, error) {
        // Display error message
        alert('Error: ' + error);
      }
    });
  });
