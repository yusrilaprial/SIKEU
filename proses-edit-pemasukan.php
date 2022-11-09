<?php
//cek sesi
session_start();
//include('dbconnected.php');
require 'koneksi.php';
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
} else {
    define('LOG', 'log.txt');
    function write_log($log)
    {
        $time = @date('[Y-d-m:H:i:s]');
        $op = $time . ' ' . $log . "\n" . PHP_EOL;
        $fp = @fopen(LOG, 'a');
        $write = @fwrite($fp, $op);
        @fclose($fp);
    }

    $id = (int) $_GET['id_pemasukan'];
    $tgl = $_GET['tgl_pemasukan'];
    $jumlah = abs((int) $_GET['jumlah']);
    $sumber = abs((int) $_GET['id_sumber']);
    $keterangan = $_GET['keterangan'];
    if (isset($id) && isset($tgl) && isset($jumlah) && isset($sumber) && isset($keterangan)) {

        //query update
        $query = mysqli_query($koneksi, "UPDATE pemasukan SET tgl_pemasukan='$tgl' , jumlah='$jumlah', id_sumber='$sumber', keterangan='$keterangan' WHERE id_pemasukan='$id' ");

        $namaadmin = $_SESSION['nama'];
        if ($query) {
            write_log("Nama Admin : " . $namaadmin . " => Edit Pemasukan => " . $id . " => Sukses Edit");
            # credirect ke page index
            header("location:pendapatan.php");
        } else {
            write_log("Nama Admin : " . $namaadmin . " => Edit Pemasukan => " . $id . " => Gagal Edit");
            echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
        }
    } else {
        header("location:pendapatan.php?pesan=data_belum_lengkap");
    }
}
//mysql_close($host);
?>