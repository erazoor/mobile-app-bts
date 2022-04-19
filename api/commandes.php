<?php
	// Connect to database
	include("db_connect.php");
	$request_method = $_SERVER["REQUEST_METHOD"];
	getCommandes();

	function getCommandes(){
		global $conn;
		$req = $conn->prepare("SELECT label FROM commande C INNER JOIN user U WHERE C.user_id = U.id");
		$req->execute();
		$response = $req->fetchAll(PDO::FETCH_ASSOC);
		
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
        
		foreach($response as $aCommand)
		{
			$array = array('label' => array(implode(" ", $aCommand)));
            
		}

        $req->closeCursor();

		echo json_encode($array, JSON_UNESCAPED_UNICODE);
	}