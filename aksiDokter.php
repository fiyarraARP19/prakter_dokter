<?php
include("config/conn.php");
session_start();
if (isset($_POST['submit'])) {
	$id =@$_POST['id'];
	$nama_dokter =$_POST['nama_dokter'];
	$alamat =$_POST['alamat'];
	$poli =$_POST['poli'];
	if ($id==null) {
		$result=mysqli_query($conn,"INSERT INTO dokter VALUES (NULL,'$nama_dokter','$alamat','$poli')");
		if($result){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "masterDokter.php"</script>
			<?php 
		}else{
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "masterDokter.php"</script>
			<?php 
		}
	}else{
		$result=mysqli_query($conn,"UPDATE dokter SET `nama_dokter`='$nama_dokter',`alamat`='$alamat',`id_poli`='$poli' where id='$id'");
		if($result){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "masterDokter.php"</script>
			<?php 
		}else{	
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "masterDokter.php"</script>
			<?php 
		}
	}
}else{ 
	?>
	<script type="text/javascript">alert("FAILED : Silahkan Cek Kembali !!!");</script>
	<script type="text/javascript">window.location = "masterDokter.php"</script>
	<?php  
}
?>
