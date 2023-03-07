$(document).on('submit', '#saveformation', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append("save_formation", true);
    console.log([ ...formData ])

    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            
            var res = jQuery.parseJSON(response);
            if(res.status == 422) {
                $('#errorMessage').removeClass('d-none');
                $('#errorMessage').text(res.message);

            }else if(res.status == 200){


                $('#errorMessage').addClass('d-none');
        $('#formationAddModal').removeClass('fade');
                
                $('#formationAddModal').modal('hide');     
                
                $('#saveformation')[0].reset();

                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);

                $('#myTable').load(location.href + " #myTable");

            }else if(res.status == 500) {
                alert(res.message);
            }
        }
    });

});

$(document).on('click', '.editformationBtn', function () {

    var formation_id = $(this).val();
    
    $.ajax({
        type: "GET",
        url: "code.php?formation_id=" + formation_id,
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 404) {

                alert(res.message);
            }else if(res.status == 200){

                $('#formation_id').val(res.data.id_formation);
                $('#formation').val(res.data.formation);
                $('#school').val(res.data.school);
                $('#startyear').val(res.data.startyear);
                $('#endyear').val(res.data.endyear);

                $('#formationEditModal').modal('show');
            }

        }
    });

});

$(document).on('submit', '#updateformation', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("update_formation", true);
    console.log([ ...formData ])
    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            
            var res = jQuery.parseJSON(response);
            if(res.status == 422) {
                $('#errorMessageUpdate').removeClass('d-none');
                $('#errorMessageUpdate').text(res.message);

            }else if(res.status == 200){

                $('#errorMessageUpdate').addClass('d-none');

                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);
                
                $('#formationEditModal').modal('hide');
                $('#updateformation')[0].reset();

                $('#myTable').load(location.href + " #myTable");

            }else if(res.status == 500) {
                alert(res.message);
            }
        }
    });

});

$(document).on('click', '.viewformationBtn', function () {

    var formation_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "code.php?formation_id=" + formation_id,
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 404) {

                alert(res.message);
            }else if(res.status == 200){

                $('#view_formation').text(res.data.formation);
                $('#view_school').text(res.data.school);
                $('#view_startyear').text(res.data.startyear);
                $('#view_endyear').text(res.data.endyear);

                $('#formationViewModal').modal('show');
            }
        }
    });
});

$(document).on('click', '.deleteformationBtn', function (e) {
    e.preventDefault();

    if(confirm('Are you sure you want to delete this data?'))
    {
        var formation_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                'delete_formation': true,
                'formation_id': formation_id
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
