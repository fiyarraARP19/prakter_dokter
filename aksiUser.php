<?php
include("config/conn.php");
session_start();
if (isset($_POST['signup'])) {
	$id =@$_POST['id'];
	$email =$_POST['email'];
	$username =$_POST['username'];
	$nama =$_POST['nama'];
	$nik =$_POST['nik'];
	$password =$_POST['password'];
	$create_time=date('Y-m-d h:m:s');
	if ($id==null) {
		$user=mysqli_query($conn,"INSERT INTO pasien VALUES (NULL,'$nik','$nama',NULL,NULL,NULL,NULL,NULL,NULL,'$create_time','$username',NULL,NULL)");
		$last_id_pasien = mysqli_insert_id($conn);
		if($user){
			$user_login=mysqli_query($conn,"INSERT INTO login VALUES (NULL,'$email','$username','$password',2,'$nama',NULL,$last_id_pasien)");
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "index.php"</script>
			<?php 
		}else{
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "index.php"</script>
			<?php 
		}
	}
}else{  
	?>
	<script type="text/javascript">alert("FAILED : Silahkan Cek Kembali !!!");</script>
	<script type="text/javascript">window.location = "index.php"</script>
	<?php 
}
?>
