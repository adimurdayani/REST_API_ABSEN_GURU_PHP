<?php
require("koneksi.php");
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
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

    $perintah = "UPDATE tbl_admin SET nik = '$nik', nama_admin = '$nama_admin', username_admin = '$username_admin', pass_admin = '$pass_admin', email_admin = '$email_admin', alamat_admin = '$alamat_admin', telepon_admin = '$telepon_admin', kelamin_admin = '$kelamin_admin', jabatan = '$jabatan', waktu = '$waktu' WHERE id = '$id'";
    $eksekusi = mysqli_query($konek, $perintah);
    $chek = mysqli_affected_rows($konek);

    if ($chek > 0) {
        $response["pesan"]  = "Data berhasil diupdate";
    }else {
        $response["pesan"]  = "Data gagal diupdate";
    }
}else {
    $response["pesan"]  = "Database dalam gangguan";
}

echo json_encode($response);
mysqli_close($konek);