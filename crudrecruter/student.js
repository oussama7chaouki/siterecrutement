$(document).on('submit', '#savejob', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append("save_job", true);
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
        $('#jobAddModal').removeClass('fade');
                
                $('#jobAddModal').modal('hide');     
                
                $('#savejob')[0].reset();

                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);

                $('#myTable').load(location.href + " #myTable");

            }else if(res.status == 500) {
                alert(res.message);
            }
        }
    });

});

$(document).on('click', '.editjobBtn', function () {

    var job_id = $(this).val();
    
    $.ajax({
        type: "GET",
        url: "code.php?job_id=" + job_id,
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 404) {

                alert(res.message);
            }else if(res.status == 200){

                $('#job_id').val(res.data.id_job);
                $('#editjob_title').val(res.data.job_title);
                $('#editjob_description').val(res.data.job_description);
                $('#editjob_salaire').val(res.data.job_salaire);
                $('#editdomain').val(res.data.domain);
                $('#editformationreq').val(res.data.formationreq);
                $('#editexpreq').val(res.data.expreq);
                $('#editskillreq').val(res.data.skillreq);

                $('#jobEditModal').modal('show');
            }

        }
    });

});

$(document).on('submit', '#updatejob', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("update_job", true);
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
                
                $('#jobEditModal').modal('hide');
                $('#updatejob')[0].reset();

                $('#myTable').load(location.href + " #myTable");

            }else if(res.status == 500) {
                alert(res.message);
            }
        }
    });

});

$(document).on('click', '.viewjobBtn', function () {

    var job_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "code.php?job_id=" + job_id,
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 404) {

                alert(res.message);
            }else if(res.status == 200){
console.log(res.data);
bac=["","bac","bac+2","bac+3","bac+5","bac+8"]
                $('#view_job_title').text(res.data.job_title);
                $('#view_job_description').text(res.data.job_description);
                $('#view_job_salaire').text(res.data.job_salaire);
                $('#view_domain').text(res.data.domain);
                $('#view_formationreq').text(bac[res.data.formationreq]);
                $('#view_expreq').text(res.data.expreq);
                $('#view_skillreq').text(res.data.skillreq);

                $('#jobViewModal').modal('show');
            }
        }
    });
});

$(document).on('click', '.deletejobBtn', function (e) {
    e.preventDefault();

    if(confirm('Are you sure you want to delete this data?'))
    {
        var job_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                'delete_job': true,
                'job_id': job_id
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
