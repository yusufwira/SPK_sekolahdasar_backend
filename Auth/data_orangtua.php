<?php
header("Access-Control-Allow-Origin: *");
require('../connection.php');

$sql = "SELECT * from users where hak_akses='parent'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {		
    $detail_data = array();
    $i=0;
	while ($obj = $result->fetch_assoc()) {
        $detail_data[$i]['id_user'] = addslashes(htmlentities($obj['id_users'])); 
        $detail_data[$i]['username'] = addslashes(htmlentities($obj['username']));
        $detail_data[$i]['nama_user'] = addslashes(htmlentities($obj['nama_user']));     
        $detail_data[$i]['kecamatan'] = addslashes(htmlentities($obj['kecamatan']));
        $detail_data[$i]['photo'] = addslashes(htmlentities($obj['photo']));      
        $i++ ;
    }
    	
    echo json_encode($detail_data);
	
} else {  
	echo "Unable to process you request, please try again";
	die();
}

?>