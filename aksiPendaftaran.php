<?php
include("config/conn.php");
session_start();
if (isset($_POST['daftar'])) {
	$id =@$_POST['id'];
	$search =$_POST['search'];
	$poli =$_POST['poli'];
	$dokter =$_POST['dokter'];
	$tanggal_pendaftaran =$_POST['tanggal_pendaftaran'];
	$jadwal =$_POST['jadwal'];
	$keluhan =$_POST['keluhan'];
	$create_time=date('Y-m-d h:m:s');
	$username =$_SESSION['username'];
	if ($jadwal!="0") {
		@$search_1=mysqli_query($conn,"SELECT max(no_urut)+1 as no_urut FROM pendaftaran where tanggal_pendaftaran='$tanggal_pendaftaran' and id_poli='$poli' and id_dokter='$dokter' and id_jadwal='$jadwal' ");
		@$result=mysqli_fetch_assoc($search_1);
		$no_urut = $result['no_urut']=="" ? 1 :  $result['no_urut'];
		if ($id==null) {
			$input=mysqli_query($conn,"INSERT INTO pendaftaran VALUES (NULL,$no_urut,'$tanggal_pendaftaran','$search','$poli','$dokter','$jadwal','$keluhan','1','$create_time','$username')");
				if($input){
					?><script type="text/javascript">alert("SUCCESS : data berhasil di simpan");
				</script>
				<script type="text/javascript">window.location = "masterpendaftaran.php"</script>
				<?php 
				}else{
					echo 'Gagal mengubah data! '; 
				}
		}else{
			// $input=mysqli_query($conn,"UPDATE pasien SET kd_barang='$kd_barang',kat_barang='$kat_barang',nm_barang='$nm_barang',updated_time='$create_time',updated_by='$username' where id='$id'");
			// if($input){
			// 	?><script type="text/javascript">alert("SUCCESS : data berhasil di update");
			// </script>
			// <script type="text/javascript">window.location = "masterPasien.php"</script>
			// <?php 

			// }else{
			// 	echo 'Gagal mengubah data! '; 
			// }
		
		}
	}else{
		?><script type="text/javascript">alert("Gagal : Jadwal Tidak Tersedia");
		</script>
		<script type="text/javascript">window.location = "pendaftaran_pasien_final.php?search=<?php echo $search ?>"</script>
		<?php 
	}
	
}else{  //jika tidak terdeteksi tombol tambah di klik
	echo 'Gagal mengubah data! '; 
}
?>
