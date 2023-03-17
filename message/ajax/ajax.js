let lastMessageInput = $("#lastmessage");
const chatBox = $("#chatBox");

sessionStorage.setItem('lastmessage', lastMessageInput.val());

const scrollDown = () => {
  chatBox.scrollTop(chatBox.prop('scrollHeight'));
};

scrollDown();

$("#sendBtn").on('click', () => {
  const message = $("#message").val().trim();
  const canId = $("#can_id").val();
  const recId = $("#rec_id").val();
  const choix = $("#choix").val();

  if (message === "") return;

  $.ajax({
    url: "app/ajax/insert.php",
    method: "POST",
    data: { can_id: canId, rec_id: recId, message, choix },
    success: (response) => {
      const res = jQuery.parseJSON(response);
      $("#message").val("");
      chatBox.append(res.message.html);
      sessionStorage.setItem('lastmessage', res.idlastmessage);
      scrollDown();
    },
    error: (jqXHR, textStatus, errorThrown) => {
      console.log(textStatus, errorThrown);
    }
  });
});

const fetchData = () => {
  const canId = $("#can_id").val();
  const recId = $("#rec_id").val();
  const choix = $("#choix").val();
  const receive = choix == 1 ? 0 : 1;

  $.ajax({
    url: "app/ajax/getMessage.php",
    method: "POST",
    data: { can_id: canId, rec_id: recId, choix: receive, idlastmessage: sessionStorage.getItem('lastmessage') },
    success: (response) => {
      if (response.includes("status")) {
        const res = jQuery.parseJSON(response);
        chatBox.append(res.message.html);
        sessionStorage.setItem('lastmessage', res.idlastmessage);
        scrollDown();
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      console.log(textStatus, errorThrown);
    }
  });
};

setInterval(fetchData, 500);