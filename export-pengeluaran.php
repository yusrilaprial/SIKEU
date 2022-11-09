    <?php
	//jika id ada maka
	if($_GET['id']!=1){
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data_Pengeluaran.xls");
	}
	?>
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
	// Load file koneksi.php  
	include "koneksi.php";    
	// Buat query untuk menampilkan semua data 
	if(isset($_GET['dari']) && isset($_GET['ke'])){
		// tampilkan data yang sesuai dengan range tanggal yang dicari
		$query = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE tgl_pengeluaran BETWEEN '".$_GET['dari']."' and '".$_GET['ke']."'");
	}else{
		$query = mysqli_query($koneksi,"SELECT * FROM pengeluaran ORDER BY tgl_pengeluaran DESC");
	}
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