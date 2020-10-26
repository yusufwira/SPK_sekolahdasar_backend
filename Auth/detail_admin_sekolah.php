<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$id_users = $_GET['id_users'];
$sql = "SELECT * FROM users u INNER JOIN info_sekolah s on u.id_users=s.users_id_users INNER JOIN foto_sekolah f on s.npsn = f.info_sekolah_idinfo_sekolah WHERE u.id_users =".$id_users." GROUP by u.id_users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {		
    $detail_data = array();
    $i=0;
	while ($obj = $result->fetch_assoc()) {
        $detail_data[$i]['id_user'] = addslashes(htmlentities($obj['id_users'])); 
        $detail_data[$i]['username'] = addslashes(htmlentities($obj['username']));
        $detail_data[$i]['hak_akses'] = addslashes(htmlentities($obj['hak_akses']));        
        $detail_data[$i]['nama_user'] = addslashes(htmlentities($obj['nama_user']));
        $detail_data[$i]['alamat_user'] = addslashes(htmlentities($obj['alamat_user']));  
        $detail_data[$i]['notelp_user'] = addslashes(htmlentities($obj['notelp_user']));
        $detail_data[$i]['email_user'] = addslashes(htmlentities($obj['email_user']));        
        $detail_data[$i]['kecamatan'] = addslashes(htmlentities($obj['kecamatan']));
        $detail_data[$i]['photo'] = addslashes(htmlentities($obj['photo']));

        $detail_data[$i]['idinfo_sekolah'] = addslashes(htmlentities($obj['npsn']));
        $detail_data[$i]['nama_sekolah'] = addslashes(htmlentities($obj['nama_sekolah']));
        $detail_data[$i]['alamat_sekolah'] = addslashes(htmlentities($obj['alamat_sekolah']));
        $detail_data[$i]['notelp_sekolah'] = addslashes(htmlentities($obj['notelp_sekolah']));
        $detail_data[$i]['kecamatan'] = addslashes(htmlentities($obj['kecamatan']));
        $detail_data[$i]['nama_foto'] = addslashes(htmlentities($obj['nama_foto']));
        $detail_data[$i]['extention'] = addslashes(htmlentities($obj['extention']));
        $i++ ;
    }
    	
    echo json_encode($detail_data);
	
} else {  
	echo "Unable to process you request, please try again";
	die();
}

?>