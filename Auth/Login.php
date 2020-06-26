<?php 


header("Access-Control-Allow-Origin: *");

require('../connection.php');

$username = $_GET['username'];
$password = md5($_GET['password']);

$sql = "SELECT * from users where username ='".$username."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {		
	$detail_user = array();
	$i = 0;
	while ($obj = $result->fetch_assoc()) {
		if($username == $obj['username'] && $password == $obj['password']){	
			$detail_user[$i]['id_users'] = addslashes(htmlentities($obj['id_users']));			
			$detail_user[$i]['nama_user'] = addslashes(htmlentities($obj['nama_user']));
			$detail_user[$i]['alamat_user'] = addslashes(htmlentities($obj['alamat_user']));
			$detail_user[$i]['kecamatan'] = addslashes(htmlentities($obj['kecamatan']));
			$detail_user[$i]['notelp_user'] = addslashes(htmlentities($obj['notelp_user']));
			$detail_user[$i]['email_user'] = addslashes(htmlentities($obj['email_user']));
			$detail_user[$i]['photo'] = addslashes(htmlentities($obj['photo']));
			$detail_user[$i]['hak_akses'] = addslashes(htmlentities($obj['hak_akses']));
		}
		$i++;
	}	

	echo json_encode($detail_user);
} else {
	echo "Unable to process you request, please try again";
	die();
}
$conn->close();



 ?>