<?php
date_default_timezone_set('Asia/Jakarta');
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conn=mysqli_connect("localhost","root","","pendaftaran_klinik") or die (mysqli_error());
