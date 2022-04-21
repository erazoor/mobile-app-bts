<?php
	// Connect to database
	include("db_connect.php");
	$request_method = $_SERVER["REQUEST_METHOD"];

	function setComment($id = 1, $text = ""){
		global $conn;
		$req = $conn->prepare("INSERT INTO commentaire (comment_text, fk_user_id) VALUES (:comment, :id)");
        $sql = $conn->prepare($req);
        $sql->bindValue(":comment", $text, PDO::PARAM_STR);
        $sql->bindValue(":id", $id, PDO::PARAM_INT);
        $sql->execute();
		
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
        
        $req->closeCursor();
	}