<?php
include("config/conn.php");
session_start();
if (isset($_POST['submit'])) {
	$id =@$_POST['id'];
	$nik =$_POST['nik'];
	$nama_pasien =$_POST['nama_pasien'];
	$tempat_lahir =$_POST['tempat_lahir'];
	$tanggal_lahir =$_POST['tanggal_lahir'];
	$alamat_pasien =$_POST['alamat_pasien'];
	$jk_pasien =$_POST['jk_pasien'];
	$st_pernikahan =$_POST['st_pernikahan'];
	$pekerjaan =$_POST['pekerjaan'];
	$create_time=date('Y-m-d h:m:s');
	$username =$_SESSION['username'];
	if ($id==null) {
		$result=mysqli_query($conn,"INSERT INTO pasien VALUES (NULL,'$nik','$nama_pasien','$tempat_lahir','$tanggal_lahir','$alamat_pasien','$jk_pasien','$st_pernikahan','$pekerjaan','$create_time','$username',NULL,NULL)");
		if($result){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "masterPasien.php"</script>
			<?php 
		}else{
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "masterPasien.php"</script>
			<?php 
		}
	}else{
		$result=mysqli_query($conn,"UPDATE pasien SET `nik`='$nik',`nama_pasien`='$nama_pasien',`tempat_lahir_pasien`='$tempat_lahir',`tanggal_lahir_pasien`='$tanggal_lahir',`alamat_pasien`='$alamat_pasien',`jk_pasien`='$jk_pasien',`status_perkawinan_pasien`='$st_pernikahan',`pekerjaan_pasien`='$pekerjaan',`updated_time`='$create_time',`updated_by`='$username' where id='$id'");
		if($result){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Terupdate !!!");</script>
			<?php if ($_SESSION['status']==2) {?>
				<script type="text/javascript">window.location = "dashboard.php"</script>
			<?php }else{?>
				<script type="text/javascript">window.location = "masterPasien.php"</script>
			<?php }?>
			<?php 
		}else{	
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "masterPasien.php"</script>
			<?php 
		}
	}
}else{ 
	?>
	<script type="text/javascript">alert("FAILED : Silahkan Cek Kembali !!!");</script>
	<script type="text/javascript">window.location = "masterPasien.php"</script>
	<?php  
}
?>
