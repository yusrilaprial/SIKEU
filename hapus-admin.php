<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id_admin'];

//query update
$query = mysqli_query($koneksi,"DELETE FROM `admin` WHERE id_admin = '$id'");

if ($query) {
 # credirect ke page index
 header("location:admin.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>