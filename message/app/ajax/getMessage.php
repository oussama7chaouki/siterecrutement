<?php 

session_start();

# check if the user is logged in

if(isset($_POST['idlastmessage'])){

        # database connection file
        include "../../../config.php";
        $con=config::connect();
        $id_1  = $_POST['can_id'];
        $id_2  = $_POST['rec_id'];
        $choix  = $_POST['choix'];
        $idlastmessage=$_POST['idlastmessage'];
		//  print_r($_POST);

        $sql = "SELECT * FROM messages
                WHERE can_id=?
                AND   rec_id= ? and receive=?
                ORDER BY id ASC";
        $stmt = $con->prepare($sql);
        $stmt->execute([$id_1, $id_2,$choix]);
        if ($stmt->rowCount() > 0) {
            $chats = $stmt->fetchAll();
            foreach ($chats as $chat) {
                if($chat['id']>$idlastmessage){
                    $res = [
                        'status' => 200,
                        'message' => [
                            'html' => '<div style="text-align:leftt;">
							<p style="background-color: yellow; word-wrap: break-word; display:inline-block;
							padding:5px; border-radius:10px; max width:70%;">
							'.$chat["message"].'
							</p>
							</div>'
                        ],
                        'idlastmessage'=> $chat['id']
                    ];
                    echo json_encode($res);
                }
            }
        }}
    // } else {
    //     header("Location: ../../index.php");
    //     exit;
    // }

