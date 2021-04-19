<?php
require("koneksi.php");
$respons = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST["nik"];
    $nama_admin = $_POST["nama_admin"];
    $username_admin = $_POST["username_admin"];
    $pass_admin = $_POST["pass_admin"];
    $email_admin = $_POST["email_admin"];
    $alamat_admin = $_POST["alamat_admin"];
    $telepon_admin = $_POST["telepon_admin"];
    $kelamin_admin = $_POST["kelamin_admin"];
    $jabatan = $_POST["jabatan"];
    $waktu = time();

    $perintah = "INSERT INTO tbl_admin(nik, nama_admin, username_admin, pass_admin, email_admin, alamat_admin, telepon_admin, kelamin_admin, jabatan, waktu) VALUES('$nik','$nama_admin','$username_admin','$pass_admin', '$email_admin', '$alamat_admin','$telepon_admin','$kelamin_admin','$jabatan','$waktu')";
    $eksekusi = mysqli_query($konek, $perintah);
    $chek = mysqli_affected_rows($konek);

    if ($chek > 0) {
        $respons["pesan"] = "Data berhasil disimpan";
    }else {
        $respons["pesan"] = "Data gagal disimpan";
    }
}else {
    $respons["pesan"] = "Database tidak terhubung";
}

echo json_encode(array("server_response"=>$respons));
mysqli_close($konek);