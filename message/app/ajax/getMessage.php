<?php 

session_start();

# check if the user is logged in
if (isset($_SESSION['username'])) {

	if (isset($_POST['id_2'])) {
	
	# database connection file
	include "../../../config.php";
	$con=config::connect();
	$id_1  = $_POST['can_id'];
	$id_2  = $_POST['rec_id'];
	$choix  = $_POST['choix'];
	$opend = 0;

	$sql = "SELECT * FROM messages
	        WHERE can_id=?
	        AND   rec_id= ? and receive=?
	        ORDER BY id ASC";
	$stmt = $con->prepare($sql);
	try {$stmt->execute([$id_1, $id_2,$choix]);   } catch (PDOException $e) {
				   $res = [
					   'status' => 400,
					   'message' => "not inserted"
				   ];}
	if ($stmt->rowCount() > 0) {
	    $chats = $stmt->fetchAll();
		foreach ($chats as $chat) {
			if($chat['id']>$idmessage){

				$res = [
				   'status' => 200,
				   'message' => [
					   'html' => '<div style="text-align:right;">
								   <p style="background-color: lightblue; word-wrap: break-word; display:inline-block;
								   padding:5px; border-radius:10px; max width:70%;">
								   '.$chat['message'].'
								   </p>
								   </div>'
				   ]
			   
			   ];
			
			   
			   echo json_encode($res);
			}
		}
	    	}
	    }


else {
	header("Location: ../../index.php");
	exit;
}
}