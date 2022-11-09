<?php
//cek sesi
session_start();
//include('dbconnected.php');
require 'koneksi.php';
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
} else {

        $id = $_GET['id_admin'];
        $pass = $_GET['pass'];

        if (isset($id) && isset($pass)) {
        //query update
        $query = mysqli_query($koneksi, "UPDATE admin SET pass='$pass' WHERE id_admin='$id' ");

        if ($query) {
            # credirect ke page index
            header("location:profile.php");
        } else {
            echo "ERROR, data gagal diupdate" . mysqli_error($Koneksi);
        }
    } else {
        header("location:profile.php?pesan=data_belum_lengkap");
    }
}
//mysql_close($host);
?>