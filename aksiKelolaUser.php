<?php
include("config/conn.php");
session_start();
if (isset($_POST['submit'])) {
	$id =@$_POST['id'];
	$username =$_POST['username'];
	$nama =$_POST['nama'];
	$password =$_POST['password'];
	$role =$_POST['role'];
	$create_time=date('Y-m-d h:m:s');
	if ($id==null) {
		$kelolaUser=mysqli_query($conn,"INSERT INTO login VALUES (NULL,'$username','$password',$role,'$nama',NULL,0)");
		if($kelolaUser){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "masterKelolaUser.php"</script>
			<?php 
		}else{
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "masterKelolaUser.php"</script>
			<?php 
		}
	}else{
		$kelolaUser=mysqli_query($conn,"UPDATE login SET `username`='$username',`password`='$password',`status`='$role',`nama`='$nama'  where id_user='$id'");
		if($kelolaUser){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "masterKelolaUser.php"</script>
			<?php 
		}else{	
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "masterKelolaUser.php"</script>
			<?php 
		}
	}
}else{  
	?>
	<script type="text/javascript">alert("FAILED : Silahkan Cek Kembali !!!");</script>
	<script type="text/javascript">window.location = "masterKelolaUser.php"</script>
	<?php 
}
?>
