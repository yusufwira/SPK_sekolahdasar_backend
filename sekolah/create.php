<?php


header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');



$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$kecamatan = $_POST['kecamatan'];
$agama = $_POST['agama'];
$akreditasi = $_POST['akreditasi'];
$tahunAkre = $_POST['tahunAkre'];
$kepalaSekolah = $_POST['kepalaSekolah'];
$guru = $_POST['guru'];
$laki = $_POST['laki'];
$perempuan = $_POST['perempuan'];
$kurikulum = $_POST['kurikulum'];
$jam = $_POST['jam'];



$internet = $_POST['internet'];
$ruangAc = $_POST['ruangAc'];
$listrik = $_POST['listrik'];
$daya_listrik = $_POST['dayalistrik'];
$luas_tanah = $_POST['luastanah'];
$jumlahKelas = $_POST['jumlahkelas'];
$jumlahLab= $_POST['jumlahlab'];
$jumlahPerpus= $_POST['jumlahperpus'];
$X = $_POST['koorX'];
$Y = $_POST['koorY'];
$ket = $_POST['ket'];

$iduser = $_POST['iduser'];


$sql = "INSERT INTO info_sekolah (nama_sekolah,
alamat_sekolah, 
notelp_sekolah, 
kecamatan, 
agama, 
akreditasi, 
tahun_akreditasi,
nama_kepala_sekola, 
jumlah_guru, 
jumlah_siswa_laki, 
jumlah_siswa_perempuan, 
kurikulum,
jam_sekolah,
internet,
ruang_ac,
listrik,
daya_listrik,
luas_tanah,
jumlah_kelas,
jumlah_laboratorium,
jumlah_perpustakaan,
koordinat_X,
koordinat_Y,
keterangan,
users_id_users)
VALUES ('$nama' ,
'$alamat',
'$telp',
'$kecamatan',
'$agama',
'$akreditasi',
'$tahunAkre',
'$kepalaSekolah',
$guru,
$laki,
$perempuan,
'$kurikulum',
'$jam',
'$internet',
'$ruangAc',
'$listrik',
'$daya_listrik',
'$luas_tanah',
$jumlahKelas,
$jumlahLab,
$jumlahPerpus,
'$X',
'$Y',
'$ket',
$iduser)";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo json_encode($last_id);
} else {
     echo json_encode("Error: " . $sql . "<br>" . $conn->error);
}


$conn->close();




?>