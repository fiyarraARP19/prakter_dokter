<?php

include("config/conn.php");
session_start();

if (isset($_GET['list'])) {
    // echo $_GET['list'];
    $query = "SELECT distinct id, hari_jam FROM jadwal where id_dokter='$_GET[list]' and hari_jam like '%$_GET[tanggal_pendaftaran]%'";
    $option1='';
    // echo $query;
    $pelanggan=mysqli_query($conn,$query);
    if ($pelanggan->num_rows>=1) {
        while($result = mysqli_fetch_array($pelanggan))
        {
            $id = $result['id'] ;
            $hari_jam = $result['hari_jam'] ;
            $option1.= "<option class='option_jadwal' value='$id'>$hari_jam </option>";
        }
        echo $option1;
    }else{
        $option1.= "<option class='option_jadwal' value=0>Jadwal Tidak Tersedia</option>";
        echo $option1;
    }
    
   
}



 ?>