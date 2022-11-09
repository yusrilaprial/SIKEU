<?php
//cek sesi
session_start();
//include('dbconnected.php');
require 'koneksi.php';
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
} else {

    $id = $_GET['id_pengeluaran'];
    $tgl = $_GET['tgl_pengeluaran'];
    $jumlah = $_GET['jumlah'];
    $sumber = $_GET['id_sumber'];
    $keterangan = $_GET['keterangan'];

    if (isset($id) &&isset($tgl) && isset($jumlah) && isset($sumber) && isset($keterangan)) {
        //query update
        $query = mysqli_query($koneksi, "UPDATE pengeluaran SET tgl_pengeluaran='$tgl' , jumlah='$jumlah', id_sumber='$sumber', keterangan='$keterangan' WHERE id_pengeluaran='$id' ");

        if ($query) {
            # credirect ke page index
            header("location:pengeluaran.php");
        } else {
            echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
        }
    } else {
        header("location:pengeluaran.php?pesan=data_belum_lengkap");
    }
}
//mysql_close($host);
?>