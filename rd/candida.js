
$(document).on('click', '.deletecandidatureBtn', function (e) {
    e.preventDefault();

    if(confirm('Are you sure you want to delete this data?'))
    {
        var candidature_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "codecan.php",
            data: {
                'delete_candidature': true,
                'candidature_id': candidature_id
            },
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if(res.status == 500) {

                    alert(res.message);
                }else{
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);

                    $('#myTable').load(location.href + " #myTable");
                }
            }
        });
    }
});
