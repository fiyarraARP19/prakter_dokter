<?php
include("config/conn.php");
if (isset($_POST['cari'])) {
	$search =$_POST['search'];
	@$search_1=mysqli_query($conn,"SELECT id FROM pasien where id='$search' or nik='$search' ");
	@$result=mysqli_fetch_assoc($search_1);
	if($result['id']!=""){	
		?>
	<script type="text/javascript">window.location = "pendaftaran_pasien_final.php?search=<?php echo $result['id'] ?>"</script>
	<?php 
	}else{
		?>
	<script type="text/javascript">window.location = "pendaftaran.php?search=0"</script>
	<?php 
	}
}else{  //jika tidak terdeteksi tombol tambah di klik
echo 'Gagal mengubah data! '; 
}
?>
