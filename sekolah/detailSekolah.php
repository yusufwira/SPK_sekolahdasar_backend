<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$idSekolah = $_GET['id_sekolah'];

$sql = "SELECT *, u.username FROM foto_sekolah f INNER JOIN info_sekolah s on 
f.info_sekolah_idinfo_sekolah = s.idinfo_sekolah INNER JOIN users u on s.users_id_users=u.id_users 
where s.idinfo_sekolah =".$idSekolah;

$result = $conn->query($sql);
if ($result->num_rows > 0) {		
    $list_sekolah = array();
    $i=0;
	while ($obj = $result->fetch_assoc()) {
        $list_sekolah['idinfo_sekolah'] = addslashes(htmlentities($obj['idinfo_sekolah']));
        $list_sekolah['nama_sekolah'] = addslashes(htmlentities($obj['nama_sekolah']));
        $list_sekolah['alamat_sekolah'] = addslashes(htmlentities($obj['alamat_sekolah']));
        $list_sekolah['notelp_sekolah'] = addslashes(htmlentities($obj['notelp_sekolah']));
        $list_sekolah['kecamatan'] = addslashes(htmlentities($obj['kecamatan']));
        $list_sekolah['agama'] = addslashes(htmlentities($obj['agama']));
        $list_sekolah['akreditasi'] = addslashes(htmlentities($obj['akreditasi']));
        $list_sekolah['tahun_akreditasi'] = addslashes(htmlentities($obj['tahun_akreditasi']));
        $list_sekolah['nama_kepala_sekolah'] = addslashes(htmlentities($obj['nama_kepala_sekola']));
        $list_sekolah['jumlah_guru'] = addslashes(htmlentities($obj['jumlah_guru']));
        $list_sekolah['jumlah_siswa_laki'] = addslashes(htmlentities($obj['jumlah_siswa_laki']));
        $list_sekolah['jumlah_siswa_perempuan'] = addslashes(htmlentities($obj['jumlah_siswa_perempuan']));
        $list_sekolah['kurikulum'] = addslashes(htmlentities($obj['kurikulum']));
        $list_sekolah['jam_sekolah'] = addslashes(htmlentities($obj['jam_sekolah']));
        $list_sekolah['internet'] = addslashes(htmlentities($obj['internet']));
        $list_sekolah['ruang_ac'] = addslashes(htmlentities($obj['ruang_ac']));
        $list_sekolah['listrik'] = addslashes(htmlentities($obj['listrik']));
        $list_sekolah['daya_listrik'] = addslashes(htmlentities($obj['daya_listrik']));
        $list_sekolah['luas_tanah'] = addslashes(htmlentities($obj['luas_tanah']));
        $list_sekolah['besar_bangunan'] = addslashes(htmlentities($obj['besar_bangunan']));
        $list_sekolah['jumlah_kelas'] = addslashes(htmlentities($obj['jumlah_kelas']));
        $list_sekolah['jumlah_kelas_ac'] = addslashes(htmlentities($obj['jumlah_kelas_ac']));
        $list_sekolah['jumlah_laboratorium'] = addslashes(htmlentities($obj['jumlah_laboratorium']));
        $list_sekolah['jumlah_perpustakaan'] = addslashes(htmlentities($obj['jumlah_perpustakaan']));
        $list_sekolah['koordinat_X'] = addslashes(htmlentities($obj['koordinat_X']));
        $list_sekolah['koordinat_Y'] = addslashes(htmlentities($obj['koordinat_Y']));
        $list_sekolah['keterangan'] = addslashes(htmlentities($obj['keterangan']));      
        $list_sekolah['username'] = addslashes(htmlentities($obj['username']));
        $list_sekolah['foto'][$i]['nama_foto'] = addslashes(htmlentities($obj['nama_foto'])); 
        $list_sekolah['foto'][$i]['extention'] = addslashes(htmlentities($obj['extention']));    
        $i++ ;
    }
    	
    echo json_encode($list_sekolah);
	
} else {  
	echo "Unable to process you request, please try again";
	die();
}


?>