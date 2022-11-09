<?php
//cek sesi
session_start();
//include('dbconnected.php');
require 'koneksi.php';
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
} else {
    $jumlah = $_GET['jumlah'];
    $tgl_hutang = $_GET['tgl_hutang'];
    $penghutang = $_GET['penghutang'];
    $alasan = $_GET['alasan'];

    if (isset($tgl_hutang) && isset($jumlah) && isset($penghutang) && isset($alasan)) {

        //query update
        $query = mysqli_query($koneksi, "INSERT INTO `hutang` (`jumlah`, `tgl_hutang`, `alasan`, `penghutang`) VALUES ('$jumlah', '$tgl_hutang', '$alasan','$penghutang')");

        if ($query) {
            # credirect ke page index
            header("location:hutang.php");
        } else {
            echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
        }
    } else {
        header("location:hutang.php?pesan=data_belum_lengkap");
    }
}
//mysql_close($host);
?>