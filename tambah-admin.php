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
        $nama = $_GET['nama'];
        $email = $_GET['email'];
        $pass = $_GET['pass'];

        if (isset($nama) && isset($email) && isset($pass)) {

            //query update
            $query = mysqli_query($koneksi, "INSERT INTO `admin` (`nama`, `email`, `pass`) VALUES ('$nama', '$email', '$pass')");

            if ($query) {
                # credirect ke page index
                header("location:admin.php");
            } else {
                echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
            }
        } else {
            header("location:admin.php?pesan=data_belum_lengkap");
        }
    }
}
//mysql_close($host);
?>