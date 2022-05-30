<?php
	// Connect to database
	include("db_connect.php");
	$request_method = $_SERVER["REQUEST_METHOD"];
	setComment();

	function setComment(){
		global $conn;
		$response = array();
		$req = $conn->prepare("INSERT INTO commentaire (comment_text, fk_user_id) VALUES (:commentary, :id)");
        $req->bindValue("commentary", $_GET['commentary'], PDO::PARAM_STR);
        $req->bindValue("id", $_GET['id'], PDO::PARAM_INT);
        $req->execute();
		
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		http_response_code(200);

        echo json_encode($response, JSON_PRETTY_PRINT);
	}