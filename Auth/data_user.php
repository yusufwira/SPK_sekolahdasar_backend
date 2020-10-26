<?php
header("Access-Control-Allow-Origin: *");
require('../connection.php');

$username = $_GET['username'];
$sql = "SELECT * from users";
$result = $conn->query($sql);
$check = false;
if ($result->num_rows > 0) {		
    $detail_data = array();
    $i=0;
	while ($obj = $result->fetch_assoc()) {               
        if($username == addslashes(htmlentities($obj['username']))){
            $check = true;
        }    
        $i++ ;
    }
    	
    echo json_encode($check);
	
} else {  
	echo "Unable to process you request, please try again";
	die();
}

?>