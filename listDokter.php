<?php

include("config/conn.php");
session_start();

if (isset($_GET['list'])) {
    // echo $_GET['list'];
    $query = "SELECT distinct id, nama_dokter FROM dokter where id_poli='$_GET[list]' ";
    $option1='';
    $pelanggan=mysqli_query($conn,$query);
    if ($pelanggan->num_rows>=1) {
        while($result = mysqli_fetch_array($pelanggan))
        {
            $id = $result['id'] ;
            $nama_dokter = $result['nama_dokter'] ;
            $option1.= "<option class='option_dokter' value='$id'>$nama_dokter </option>";
        }
        echo $option1;
    }else{
        $option1.= "<option class='option_dokter'>tidak ada dokter</option>";
        echo $option1;
    }
    
   
}



 ?>