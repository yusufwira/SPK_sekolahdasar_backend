<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$id_sekolah=$_GET['id_sekolah'];
$id_users=$_GET['id_user'];
$rating=$_GET['rating'];

$sql = "SELECT * FROM rating";
$result = $conn->query($sql);
if ($result->num_rows > 0) {		
	while ($obj = $result->fetch_assoc()) {
        $iduser= addslashes(htmlentities($obj['users_id']));
        $idsekolah = addslashes(htmlentities($obj['info_sekolah_id']));  
        if($id_users == $iduser && $id_sekolah == $idsekolah){
            $sql3 = "DELETE FROM rating WHERE users_id =".$id_users." AND info_sekolah_id = ".$id_sekolah;
            $conn->query($sql3);
        }        
    }
	
} 

$sql2 = "INSERT INTO rating (users_id, info_sekolah_id, rating)
VALUES ($id_users,$id_sekolah,$rating)";
if ($conn->query($sql2) === TRUE) {
echo json_encode("Sukses");
} else {
echo json_encode("Error: " . $sql2 . "<br>" . $conn->error);
}

$conn->close();
?>