    <?php
	//jika id ada maka
	if($_GET['id']!=1){
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data_Hutang.xls");
	}
	?>
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
	if(isset($_GET['dari']) && isset($_GET['ke'])){
		// tampilkan data yang sesuai dengan range tanggal yang dicari
		$query = mysqli_query($koneksi,"SELECT * FROM hutang WHERE tgl_hutang BETWEEN '".$_GET['dari']."' and '".$_GET['ke']."'");
		}else{
			$query = mysqli_query($koneksi,"SELECT * FROM hutang where jumlah > 1000 ORDER BY tgl_hutang DESC");
		} 
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