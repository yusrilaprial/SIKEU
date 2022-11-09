	<!-- cek apakah admin -->
	<?php 
	session_start();
	require 'koneksi.php';
	if($_SESSION['id'] != 1){
		header("location:index.php?pesan=bukan_admin");
	}
	?>