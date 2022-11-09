<?php
//cek sesi
session_start();
//include('dbconnected.php');
require 'koneksi.php';
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
} else {

    $id = $_GET['id_pengeluaran'];

    //query update
    $query = mysqli_query($koneksi, "DELETE FROM `pengeluaran` WHERE id_pengeluaran = '$id'");

    if ($query) {
        # credirect ke page index
        header("location:pengeluaran.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}
//mysql_close($host);
?>