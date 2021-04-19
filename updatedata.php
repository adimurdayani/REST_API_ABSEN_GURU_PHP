<?php
require("koneksi.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST["id"];
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $telepon = $_POST["telepon"];
    $alamat = $_POST["alamat"];
    $waktu = time();
    $jabatan = $_POST["jabatan"];
    $kelamin = $_POST["kelamin"];
    $level_user = $_POST["level_user"];

    $tampil = "SELECT * FROM tbl_user";
    $perintah = "UPDATE tbl_user SET nik = '$nik', nama = '$nama', username = '$username', email = '$email', pass = '$pass', telepon = '$telepon', alamat = '$alamat', waktu= '$waktu', jabatan = '$jabatan', kelamin = '$kelamin', level_user = '$level_user' WHERE id = '$id' ";
    $eksekusi = mysqli_query($konek, $perintah);
    $eks = mysqli_query($konek, $tampil);
    $chek = mysqli_affected_rows($konek);

    if ($chek > 0) {
        $response["pesan"] = "Data berhasil di update";
    }else {
        $response["pesan"]  = "Data gala di update";
    }
    
}else {
        $response["pesan"]  = "Database dalam gangguan!";
}

echo json_encode($response);
mysqli_close($konek);