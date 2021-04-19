<?php
require("koneksi.php");
$response = array();


$perinah = "SELECT * FROM tbl_admin ";
$eksekusi = mysqli_query($konek, $perinah);
$chek = mysqli_affected_rows($konek);

if ($chek > 0) {
    $response["data"] = array();
    while ($ambil = mysqli_fetch_object($eksekusi)) {
        $F["id"]   = $ambil->id;
        $F["nama_admin"]   = $ambil->nama_admin;
        $F["username_admin"]   = $ambil->username_admin;
        $F["email_admin"]   = $ambil->email_admin;
        $F["pass_admin"]   = $ambil->pass_admin;
        $F["telepon_admin"]   = $ambil->telepon_admin;
        $F["alamat_admin"]   = $ambil->alamat_admin;
        $F["kelamin_admin"]   = $ambil->kelamin_admin;

        array_push($response["data"], $F);
    }
}else {
    $response["pesan"] = "Data tidak ada";
    }
    echo json_encode($response);
    mysqli_close($konek);