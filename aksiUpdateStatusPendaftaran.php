<?php
include("config/conn.php");
session_start();
$id =$_GET['list'];
$input=mysqli_query($conn,"UPDATE pendaftaran set status=2 where id='$id'");
?>
<script type="text/javascript">window.location = "masterpendaftaran.php"</script>