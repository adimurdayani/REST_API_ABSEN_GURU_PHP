<?php

require("koneksi.php");
$response = array();

$perintah = "SELECT * FROM tbl_user";
$eksekusi = mysqli_query($konek,$perintah);
$chek = mysqli_affected_rows($konek);

if ($chek > 0) {
    $response["data"] = array();

    while ($ambil = mysqli_fetch_object($eksekusi)) {
        $F["id"]   = $ambil->id;
        $F["nik"]   = $ambil->nik;
        $F["nama"]   = $ambil->nama;
        $F["username"]   = $ambil->username;
        $F["email"]   = $ambil->email;
        $F["pass"]   = $ambil->pass;
        $F["telepon"]   = $ambil->telepon;
        $F["alamat"]   = $ambil->alamat;
        $F["waktu"]   = date('D, d M Y H:i:s',$ambil->waktu);
        $F["jabatan"]   = $ambil->jabatan;
        $F["kelamin"]   = $ambil->kelamin;

        array_push($response["data"], $F);
    }
}else {
        $response["data"] = "Database gagal tampil";
    }
echo json_encode($response);
mysqli_close($konek);