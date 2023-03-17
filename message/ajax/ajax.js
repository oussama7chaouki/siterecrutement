;
sessionStorage.setItem('lastmessage',$("#lastmessage").val());

  var scrollDown = function(){
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
	}

	scrollDown();

	// $(document).ready(function(){
      
      $("#sendBtn").on('click', function(){
      	message = $("#message").val();
      	can_id = $("#can_id").val();
      	rec_id = $("#rec_id").val();
          choix = $("#choix").val();

      	if (message == "") return;

          $.ajax({
            url: "app/ajax/insert.php", // path to your PHP script to handle the insert
            method: "POST", // HTTP method used for the request
            data: { can_id: can_id, rec_id: rec_id, message: message,choix:choix }, // data to be sent in the request
            success: function(response) {
                console.log(response)
               var res = jQuery.parseJSON(response);
                  $("#message").val("");console.log($("#chatBox"))
                  $("#chatBox").append(res.message.html);
                  // sessionStorage.setItem('lastmessage',res.lastmessage);
                  console.log(res.message)
                  
        scrollDown();
            },
            error: function(jqXHR, textStatus, errorThrown) {
              // error callback function
              console.log(textStatus, errorThrown); // log the error to the console
            }
          });

      })
      /** 
      auto update last seen 
      for logged in user
      **/
    //   let lastSeenUpdate = function(){
    //   	$.get("app/ajax/update_last_seen.php");
    //   }
    //   lastSeenUpdate();
    //   /** 
    //   auto update last seen 
    //   every 10 sec
    //   **/
    //   setInterval(lastSeenUpdate, 10000);



    //   // auto refresh / reload
    //   let fechData = function(){
    //   	$.post("app/ajax/getMessage.php", 
    //   		   {
    //   		   	id_2: $chatWith['user_id']
    //   		   },
    //   		   function(data, status){
    //               $("#chatBox").append(data);
    //               if (data != "") scrollDown();
    //   		    });
    //   }

    //   fechData();
    //   /** 
    //   auto update last seen 
    //   every 0.5 sec
    //   **/
    //   setInterval(fechData, 500);
        // auto refresh / reload
      function fechData(){
               can_id = $("#can_id").val(),
                rec_id = $("#rec_id").val(),
                  choix = $("#choix").val()
                 receive= choix==1?0:1
                 $.ajax({
                  url: "app/ajax/getMessage.php", // path to your PHP script to handle the insert
                  method: "POST", // HTTP method used for the request
                  data: {can_id:can_id,
                    rec_id:rec_id,choix:receive,idlastmessage: sessionStorage.getItem('lastmessage') }, // data to be sent in the request
                  success: function(response) {
                      console.log(response)
                      if(response.search("status")>1){
                     var res = jQuery.parseJSON(response);
                     $("#chatBox").append(res.message.html);
                     if (res.message.html != "") scrollDown();
                        console.log(res.message)
                        sessionStorage.setItem('lastmessage',res.idlastmessage);

              scrollDown();}
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                    // error callback function
                    console.log(textStatus, errorThrown); // log the error to the console
                  }
                });
              }
  
  
        // fechData();
        /** 
        auto update last seen 
        every 0.5 sec
        **/
        setInterval(fechData, 500);
      
    
//  });
