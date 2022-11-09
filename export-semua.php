    <?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data_Pemasukan_Pengeluaran.xls");
	?>
	<h3>Data Pemasukan</h3>    
	<table border="1" cellpadding="5"> 
	<tr>    
	<th>ID Pemasukan</th>
    <th>Tgl Pemasukan</th>
    <th>Jumlah</th>    
	<th>ID Sumber</th>
	<th>Nama Sumber</th>
	<th>Keterangan</th>
	</tr>  
	<?php  
	// Load file koneksi.php  
	include "koneksi.php";    
	// Buat query untuk menampilkan semua data siswa 
$query = mysqli_query($koneksi, "SELECT * FROM pemasukan ORDER BY tgl_pemasukan DESC");
	// Untuk penomoran tabel, di awal set dengan 1 
	while($data = mysqli_fetch_array($query)){ 
	// Ambil semua data dari hasil eksekusi $sql 
	echo "<tr>";    
	echo "<td>".$data['id_pemasukan']."</td>";   
	echo "<td>".$data['tgl_pemasukan']."</td>";    
	echo "<td>".$data['jumlah']."</td>";    
	echo "<td>".$data['id_sumber']."</td>";
	if ($data['id_sumber'] == 1){
		$querynama1 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=1");
		$querynama1 = mysqli_fetch_array($querynama1);
	  echo "<td>".$querynama1['nama']."</td>";
	} else if ($data['id_sumber'] == 2){
		$querynama2 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=2");
		$querynama2 = mysqli_fetch_array($querynama2);
	  echo "<td>".$querynama2['nama']."</td>";
	} else if ($data['id_sumber'] == 3){
		$querynama3 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=3");
		$querynama3 = mysqli_fetch_array($querynama3);
	  echo "<td>".$querynama3['nama']."</td>";
	} else if ($data['id_sumber'] == 4){
		$querynama4 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=4");
		$querynama4 = mysqli_fetch_array($querynama4);
	  echo "<td>".$querynama4['nama']."</td>";
	}
	 else if ($data['id_sumber'] == 5){
		$querynama5 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=5");
		$querynama5 = mysqli_fetch_array($querynama5);
	  echo "<td>".$querynama5['nama']."</td>";
	}   
	echo "<td>".$data['keterangan']."</td>";            
	echo "</tr>";        
	}  ?></table>
	<br>
	<br>
		<h3>Data Pengeluaran</h3>    
	<table border="1" cellpadding="5"> 
	<tr>    
	<th>ID Pengeluaran</th>
    <th>Tgl Pengeluaran</th>
    <th>Jumlah</th>    
	<th>ID Sumber</th>    
	<th>Nama Sumber</th>    
	<th>Keterangan</th>
	</tr>  
	<?php     
	// Buat query untuk menampilkan semua data siswa 
$query = mysqli_query($koneksi, "SELECT * FROM pengeluaran ORDER BY tgl_pengeluaran DESC");
	// Untuk penomoran tabel, di awal set dengan 1 
	while($data = mysqli_fetch_array($query)){ 
	// Ambil semua data dari hasil eksekusi $sql 
	echo "<tr>";    
	echo "<td>".$data['id_pengeluaran']."</td>";   
	echo "<td>".$data['tgl_pengeluaran']."</td>";    
	echo "<td>".$data['jumlah']."</td>";    
	echo "<td>".$data['id_sumber']."</td>";
	if ($data['id_sumber'] == 6){
	  $querynama1 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=6");
	  $querynama1 = mysqli_fetch_array($querynama1);
	  echo "<td>".$querynama1['nama']."</td>";
	} else if ($data['id_sumber'] == 7){
	  $querynama2 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=7");
	  $querynama2 = mysqli_fetch_array($querynama2);
	  echo "<td>".$querynama2['nama']."</td>";
	} else if ($data['id_sumber'] == 8){
	  $querynama3 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=8");
	  $querynama3 = mysqli_fetch_array($querynama3);
	  echo "<td>".$querynama3['nama']."</td>";
	} else if ($data['id_sumber'] == 9){
	  $querynama4 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=9");
	  $querynama4 = mysqli_fetch_array($querynama4);
	  echo "<td>".$querynama4['nama']."</td>";
	}
	else if ($data['id_sumber'] == 10){
	  $querynama5 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=10");
	  $querynama5 = mysqli_fetch_array($querynama5);
	  echo "<td>".$querynama5['nama']."</td>";
	}            
	echo "<td>".$data['keterangan']."</td>";     
	echo "</tr>";        
	}  ?></table>
	<br>
	<br>
	<h3>Data Hutang</h3>    
	<table border="1" cellpadding="5"> 
	<tr>    
	<th>ID Hutang</th>
    <th>Tgl Hutang</th>
    <th>Jumlah</th>    
	<th>Kreditur</th>    
	<th>Alasan</th>   
	</tr>  
	<?php  
	// Load file koneksi.php  
	include "koneksi.php";    
	// Buat query untuk menampilkan semua data 
$query = mysqli_query($koneksi,"SELECT * FROM hutang where jumlah > 1000 ORDER BY tgl_hutang DESC");
	// Untuk penomoran tabel, di awal set dengan 1 
	while($data = mysqli_fetch_array($query)){ 
	// Ambil semua data dari hasil eksekusi $sql 
	echo "<tr>";    
	echo "<td>".$data['id_hutang']."</td>";   
	echo "<td>".$data['tgl_hutang']."</td>";    
	echo "<td>".$data['jumlah']."</td>";
	echo "<td>".$data['penghutang']."</td>";
	echo "<td>".$data['alasan']."</td>";
	echo "</tr>";        
	}  ?></table>