<?php
//cek sesi
session_start();
//include('dbconnected.php');
require 'koneksi.php';
if ($_SESSION['status'] != "login") {
	header("location:login.php?pesan=belum_login");
} else {

	$id = $_GET['id_hutang'];
	$jumlah = $_GET['jumlah'];
	$tgl = $_GET['tgl_hutang'];
	$alasan = $_GET['alasan'];
	$penghutang = $_GET['penghutang'];

	if (isset($id) && isset($jumlah) && isset($tgl) && isset($alasan) && isset($penghutang)) {
		//query update
		$query = mysqli_query($koneksi, "UPDATE hutang SET jumlah='$jumlah' , tgl_hutang='$tgl', alasan='$alasan', penghutang='$penghutang' WHERE id_hutang='$id' ");

		define('LOG', 'log.txt');
		function write_log($log)
		{
			$time = @date('[Y-d-m:H:i:s]');
			$op = $time . ' ' . $log . "\n" . PHP_EOL;
			$fp = @fopen(LOG, 'a');
			$write = @fwrite($fp, $op);
			@fclose($fp);
		}
		//jika benar

		$namaadmin = $_SESSION['nama'];


		if ($query) {
			write_log("Nama Admin : " . $namaadmin . " => Edit Hutang => " . $id . " => Sukses ");
			# credirect ke page index
			header("location:hutang.php?pesan=berhasil_update");
		} else {
			write_log("Nama Admin : " . $namaadmin . " => Edit hutang => " . $id . " => Gagal");
			echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
		}
	} else {
		header("location:hutang.php?pesan=data_belum_lengkap");
	}
}
//mysql_close($host);
?>