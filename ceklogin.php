<?php

require("koneksi.php");
$response = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $nik = $_POST["nik"];
        $password = $_POST["pass"];

        $perintah = "SELECT nama FROM tbl_user WHERE nik = '$nik' AND pass = '$password'";
        $tampil = "SELECT * FROM tbl_user";
        $eks = mysqli_query($konek,$tampil);
        $eksekusi = mysqli_query($konek, $perintah);
        $cek = mysqli_affected_rows($konek);

        if ($cek > 0) {
            $response["pesan"] = "Login berhasil";
        }else{
            $response["pesan"] = "Login gagal!.";
        }
    }else {
            $response["pesan"] = "Database tidak terhubung!.";
    }

    echo json_encode(array("server_response"=>$response));
    mysqli_close($konek);