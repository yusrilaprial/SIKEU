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
        $id = $_GET['id_catatan'];
        $catatan = $_GET['catatan'];

        if (isset($id) && isset($catatan)) {
            //query update
            $query = mysqli_query($koneksi, "UPDATE catatan SET catatan='$catatan' WHERE id_catatan='$id' ");

            if ($query) {
                # credirect ke page index
                header("location:mention.php");
            } else {
                echo "ERROR, data gagal diupdate" . mysqli_error($Koneksi);
            }
        } else {
            header("location:mention.php?pesan=data_belum_lengkap");
        }
    }
}
//mysql_close($host);
?>