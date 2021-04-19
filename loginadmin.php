<?php

require("koneksi.php");
$respons = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username_admin = $_POST["username_admin"];
    $pass_admin = $_POST["pass_admin"];

    $perintah = "SELECT nama_admin FROM tbl_admin WHERE username_admin = '$username_admin' AND pass_admin = '$pass_admin'";
    $eksekusi = mysqli_query($konek, $perintah);
    $chek = mysqli_affected_rows($konek);

    if ($chek > 0) {
        $respons["pesan"] = "Login berhasil!";
    }else {
        $respons["pesan"] = "Login gagal!";
    }
}else {
    $respons["pesan"] = "Database bermasalah!";
}

echo json_encode(array("server response"=>$respons));
mysqli_close($konek);