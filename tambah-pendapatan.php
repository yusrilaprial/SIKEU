<?php
//cek sesi
session_start();
//include('dbconnected.php');
require 'koneksi.php';
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
} else {
    $tgl_pemasukan = $_GET['tgl_pemasukan'];
    $jumlah = $_GET['jumlah'];
    $sumber = $_GET['sumber'];
    $keterangan = $_GET['keterangan'];
    if (isset($tgl_pemasukan) && isset($jumlah) && isset($sumber) && isset($keterangan)) {

        //query update
        $query = mysqli_query($koneksi, "INSERT INTO `pemasukan` (`tgl_pemasukan`, `jumlah`, `id_sumber`, `keterangan`) VALUES ('$tgl_pemasukan', '$jumlah', '$sumber', '$keterangan')");

        if ($query) {
            # credirect ke page index
            header("location:pendapatan.php");
        } else {
            echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
        }
    }else{
    header("location:pendapatan.php?pesan=data_belum_lengkap");
    }
}
//mysql_close($host);
?>