<?php
//cek sesi
session_start();
//include('dbconnected.php');
require 'koneksi.php';
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
} else {
    if ($_SESSION['id'] != 1) {
        header("location:index.php?pesan=bukan_admin");
    } else {
        $id = $_GET['id_sumber'];
        $nama = $_GET['nama'];

        if (isset($id) && isset($nama)) {
            //query update
            $query = mysqli_query($koneksi, "UPDATE sumber SET nama='$nama' WHERE id_sumber='$id' ");

            if ($query) {
                # credirect ke page index
                header("location:sumber.php");
            } else {
                echo "ERROR, data gagal diupdate" . mysqli_error($Koneksi);
            }
        } else {
            header("location:sumber.php?pesan=data_belum_lengkap");
        }
    }
}
//mysql_close($host);
?>