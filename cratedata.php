<?php 
    require("koneksi.php");
    $response = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nik = $_POST["nik"];
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $telepon = $_POST["telepon"];
        $alamat = $_POST["alamat"];
        $jabatan = $_POST["jabatan"];
        $kelamin = $_POST["kelamin"];

        $perintah = "INSERT INTO tbl_user(nik,nama,email,pass,telepon,alamat,jabatan,kelamin) VALUES('$nik','$nama','$email','$pass','$telepon','$alamat','$jabatan','$kelamin')";
        $eksekusi = mysqli_query($konek, $perintah);
        $cek = mysqli_affected_rows($konek);

        if ($cek > 0) {
            $response["pesan"] = "Data berhasil di simpan";
        }else {
            $response["pesan"] = "Data gagal di simpan";
        }
    }else {
            $response["pesan"] = "Database tidak terhubung";
    }

    echo json_encode($response);
    mysqli_close($konek);