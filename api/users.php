<?php
	// Connect to database
	include("db_connect.php");
	$request_method = $_SERVER["REQUEST_METHOD"];
	getUsers();

	function getUsers(){
		global $conn;
		$response = array();
		$req = $conn->prepare("SELECT COUNT(*) as count FROM user WHERE username=:login AND password=:password");
		$req->bindValue('login', $_GET['login'], PDO::PARAM_STR);
		$req->bindValue('password', $_GET['password'], PDO::PARAM_STR);
		$req->execute();
		$user = $req->fetchAll();
		foreach($user as $aUser) 
		{
			$count = $aUser['count'];
		}
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		if($count == 1){
						http_response_code(200);
		} else {
						http_response_code(400);
		}
		echo json_encode($response, JSON_PRETTY_PRINT);
	}