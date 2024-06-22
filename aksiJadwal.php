<?php
include("config/conn.php");
session_start();
if (isset($_POST['submit'])) {
	$id =@$_POST['id'];
	$dokter =$_POST['dokter'];
	$jadwal =$_POST['jadwal'];
	if ($id==null) {
		$result=mysqli_query($conn,"INSERT INTO jadwal VALUES (NULL,'$dokter','$jadwal')");
		if($result){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "masterJadwal.php"</script>
			<?php 
		}else{
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "masterJadwal.php"</script>
			<?php 
		}
	}else{
		$result=mysqli_query($conn,"UPDATE jadwal SET `id_dokter`='$dokter',`hari_jam`='$jadwal' where id='$id'");
		if($result){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "masterJadwal.php"</script>
			<?php 
		}else{	
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "masterJadwal.php"</script>
			<?php 
		}
	}
}else{  
	?>
	<script type="text/javascript">alert("FAILED : Silahkan Cek Kembali !!!");</script>
	<script type="text/javascript">window.location = "masterJadwal.php"</script>
	<?php 
}
?>
