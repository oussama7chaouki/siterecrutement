
    // $('.apply-button').on('click'
    $(document).on('click', '.apply-button', function() {
      // Get the data from the offer element
      var offer = $(this).closest('.offer');
      var offerId = offer.data('id');
      var offerName = offer.data('title');
      var offercompany = offer.data('company');
      var score=offer.data('score');
      console.log(score)
    //   var offerDate = offer.data('date');

      // Send the data to the server using AJAX
      $.ajax({
            type: "POST",
            url: "codecandida.php",
        data: {
          id: offerId,
          title: offerName,
        company:offercompany,
        save_apply:true,
      score:score
      }
          //   date: offerDate
        
       ,success: function(response) {
           var res = jQuery.parseJSON(response);
          //  console.log(response)
                if(res.status == 422) {
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);

                }else if(res.status == 200){
    
                    // $('#errorMessageUpdate').addClass('d-none');
    
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);
    
                  $('#body').load(location.href + " #body");
    
                }
                else if(res.status == 500) {
 alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);  
                              }
                }
      });
    });
