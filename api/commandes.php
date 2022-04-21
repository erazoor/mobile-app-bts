<?php
	// Connect to database
	include("db_connect.php");
	$request_method = $_SERVER["REQUEST_METHOD"];
	getCommandes();

	function getCommandes($id = 1){
		global $conn;
		$req = $conn->prepare("SELECT label, username FROM commande C INNER JOIN user U WHERE U.user_id = ".$id." AND C.fk_user_id = U.user_id");
		$req->execute();
		$response = $req->fetchAll(PDO::FETCH_ASSOC);
		
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
        
		foreach($response as $aCommand)
		{
			$array[] = $aCommand;
		}

        $req->closeCursor();

		echo json_encode($array, JSON_UNESCAPED_UNICODE);
	}