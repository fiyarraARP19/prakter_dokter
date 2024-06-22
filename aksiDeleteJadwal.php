<?php
include("config/conn.php");
session_start();
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM jadwal WHERE id='$id'")or die(mysqli_error());
 
header("location:masterJadwal.php");
                  
?>
