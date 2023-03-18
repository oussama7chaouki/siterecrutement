
$(document).ready(function(){
 
    $('#language').tokenfield({
    //  autocomplete:{
    //   source: ['PHP','Codeigniter','HTML','JQuery','Javascript','CSS','Laravel','CakePHP','Symfony','Yii 2','Phalcon','Zend','Slim','FuelPHP','PHPixie','Mysql'],
    //   delay:100
    //  },
    //  showAutocompleteOnFocus: true
    });
    skilo=document.getElementsByClassName("passedlanguages")
    if(skilo.length>0){
        console.log(skilo)

    skilo=jQuery.map(skilo,function(num) {
        return num.innerText.trim();
      });
      skilo=skilo[0];
      skilos=skilo.split(',')
console.log(skilos)
    $('#language').tokenfield('setTokens',skilos);
}
    $('#programmer_form1').on('submit', function(event){
     event.preventDefault();
    if($.trim($('#language').val()).length == 0)
     {
        $('#success_message').html( "<div class='alert alert-danger'>Please Enter Atleast one language</div>" );
        setInterval(function(){
            $('#success_message').html('');
           }, 5000);
    //   alert("Please Enter Atleast one language");
      return false;
     }
     else
     {
      var form_data = $(this).serialize();
      console.log([...form_data])
   
      $('#submit').attr("disabled","disabled");
      $.ajax({
       url:"inputlanguage/insert.php",
       method:"POST",
       data:form_data,
       beforeSend:function(){
        $('#submit').val('Submitting...');
       },
       success:function(data){
        if(data != '')
        {
         $('#name').val('');
         console.log(data)
        //  $('#language').tokenfield('setTokens',[]);
        //  $('#success_message').html(data);
        // alertify.confirm('Confirm Title', 'data', function(){ alertify.success('Ok') }
        //         , function(){ alertify.error('Cancel')});
         alertify.set('notifier','position', 'top-right');
         alertify.success(data);
         $('#submit').attr("disabled", false);
         $('#submit').val('Submit');
        }
       }
      });
      setInterval(function(){
       $('#success_message').html('');
      }, 5000);
     }
    });
    
   });