<?php
include("config/conn.php");
session_start();
if (isset($_POST['submit'])) {
	$id =@$_POST['id'];
	$poli =$_POST['poli'];
	$keterangan =$_POST['keterangan'];
	if ($id==null) {
		$result=mysqli_query($conn,"INSERT INTO poli VALUES (NULL,'$poli','$keterangan')");
		if($result){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "masterPoli.php"</script>
			<?php 
		}else{
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "masterPoli.php"</script>
			<?php 
		}
	}else{
		$result=mysqli_query($conn,"UPDATE poli SET `nama_poli`='$poli',`keterangan`='$keterangan' where id='$id'");
		if($result){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "masterPoli.php"</script>
			<?php 
		}else{	
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "masterPoli.php"</script>
			<?php 
		}
	}
}else{  
	?>
	<script type="text/javascript">alert("FAILED : Silahkan Cek Kembali !!!");</script>
	<script type="text/javascript">window.location = "masterPoli.php"</script>
	<?php 
}
?>
