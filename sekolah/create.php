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
$lulus = $_POST['lulus'];
$kurikulum = $_POST['kurikulum'];
$jam = $_POST['jam'];



$internet = $_POST['internet'];
$ruangAc = $_POST['ruangAc'];
$listrik = $_POST['listrik'];
$daya_listrik = $_POST['dayalistrik'];
$luas_tanah = $_POST['luastanah'];
$besar_bangunan = $_POST['besar_bangunan'];
$jumlahKelas = $_POST['jumlahkelas'];
$jumlah_kelas_ac = $_POST['jumlah_kelas_ac'];
$jumlahLab= $_POST['jumlahlab'];
$jumlahPerpus= $_POST['jumlahperpus'];
$uang_gedung = $_POST['uang_gedung'];
$uang_daftar_ulang = $_POST['uang_daftar_ulang'];
$uang_spp = $_POST['uang_spp'];
$uang_seragam = $_POST['uang_seragam'];
$X = $_POST['koorX'];
$Y = $_POST['koorY'];
$ket = $_POST['ket'];

$iduser = $_POST['iduser'];

if($ruangAc == "sebagian"){
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
    jumlah_lulusan_siswa, 
    kurikulum,
    jam_sekolah,
    internet,
    ruang_ac,
    listrik,
    daya_listrik,
    luas_tanah,
    besar_bangunan,
    jumlah_kelas,
    jumlah_kelas_ac,
    jumlah_laboratorium,
    jumlah_perpustakaan,
    uang_gedung,
    uang_daftar_ulang,
    uang_spp,
    uang_seragam,
    koordinat_X,
    koordinat_Y,
    keterangan,
    status_sekolah,
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
    $lulus,
    '$kurikulum',
    '$jam',
    '$internet',
    '$ruangAc',
    '$listrik',
    '$daya_listrik',
    '$luas_tanah',
    '$besar_bangunan',
    $jumlahKelas,
    $jumlah_kelas_ac,
    $jumlahLab,
    $jumlahPerpus,
    $uang_gedung,
    $uang_daftar_ulang,
    $uang_spp,
    $uang_seragam,
    '$X',
    '$Y',
    '$ket',
    'Belum Tervalidasi',
    $iduser)";
}
else if($ruangAc == 'semua'){
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
    jumlah_lulusan_siswa,
    kurikulum,
    jam_sekolah,
    internet,
    ruang_ac,
    listrik,
    daya_listrik,
    luas_tanah,
    besar_bangunan,
    jumlah_kelas,
    jumlah_kelas_ac,
    jumlah_laboratorium,
    jumlah_perpustakaan,
    uang_gedung,
    uang_daftar_ulang,
    uang_spp,
    uang_seragam,
    koordinat_X,
    koordinat_Y,
    keterangan,
    status_sekolah,
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
    $lulus,
    '$kurikulum',
    '$jam',
    '$internet',
    '$ruangAc',
    '$listrik',
    '$daya_listrik',
    '$luas_tanah',
    '$besar_bangunan',
    $jumlahKelas,
    $jumlahKelas,
    $jumlahLab,
    $jumlahPerpus,
    $uang_gedung,
    $uang_daftar_ulang,
    $uang_spp,
    $uang_seragam,
    '$X',
    '$Y',
    '$ket',
    'Belum Tervalidasi',
    $iduser)";
}
else if($ruangAc == 'tidak'){
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
    jumlah_lulusan_siswa,
    kurikulum,
    jam_sekolah,
    internet,
    ruang_ac,
    listrik,
    daya_listrik,
    luas_tanah,
    besar_bangunan,
    jumlah_kelas,
    jumlah_kelas_ac,
    jumlah_laboratorium,
    jumlah_perpustakaan,
    uang_gedung,
    uang_daftar_ulang,
    uang_spp,
    uang_seragam,
    koordinat_X,
    koordinat_Y,
    keterangan,
    status_sekolah,
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
    $lulus,
    '$kurikulum',
    '$jam',
    '$internet',
    '$ruangAc',
    '$listrik',
    '$daya_listrik',
    '$luas_tanah',
    '$besar_bangunan',
    $jumlahKelas,
    0,
    $jumlahLab,
    $jumlahPerpus,
    $uang_gedung,
    $uang_daftar_ulang,
    $uang_spp,
    $uang_seragam,
    '$X',
    '$Y',
    '$ket',
    'Belum Tervalidasi',
    $iduser)";
}


if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo json_encode($last_id);
} else {
     echo json_encode("Error: " . $sql . "<br>" . $conn->error);
}


$conn->close();




?>