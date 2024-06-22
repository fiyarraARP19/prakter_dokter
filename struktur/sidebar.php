<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <?php if ($_SESSION['status']==1)  {?>
                    <li>
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="masterpasien.php"><i class="menu-icon fa fa-laptop"></i>Master Pasien</a>
                    </li>
                    <li>
                        <a href="pendaftaran.php"><i class="menu-icon fa fa-laptop"></i>Pendaftaran</a>
                    </li>
                    <li>
                        <a href="masterpendaftaran.php"><i class="menu-icon fa fa-laptop"></i>Master Pendaftaran</a>
                    </li>
                    <li>
                        <a href="masterpoli.php"><i class="menu-icon fa fa-laptop"></i>Master Poli</a>
                    </li>
                    <li>
                        <a href="masterDokter.php"><i class="menu-icon fa fa-laptop"></i>Master Dokter</a>
                    </li>
                    <li>
                        <a href="masterjadwal.php"><i class="menu-icon fa fa-laptop"></i>Master Jadwal Dokter</a>
                    </li>
                    <li>
                        <a href="reportPasien.php"><i class="menu-icon fa fa-laptop"></i>Report Pasien</a>
                    </li>
                    <li>
                        <a href="reportPendaftaran.php"><i class="menu-icon fa fa-laptop"></i>Report Pendaftaran</a>
                    </li>
                    <li>
                        <a href="ReportJadwalDokter.php"><i class="menu-icon fa fa-laptop"></i>Report Jadwal Dokter</a>
                    </li>
                    <li>
                        <a href="masterKelolaUser.php"><i class="menu-icon fa fa-laptop"></i>Kelola User</a>
                    </li>
                <?php } elseif ($_SESSION['status']==2) {?>
                    <li>
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                    </li>
                    <?php $sql = mysqli_query($conn,"SELECT * from pasien where id=$_SESSION[id_pasien]") or die (mysqli_error());   
                            $cek= mysqli_fetch_array($sql);
                            if ($cek['nama_pasien']=="" || $cek['tempat_lahir_pasien']=="" || $cek['nik']=="" 
                            || $cek['tanggal_lahir_pasien']=="" || $cek['alamat_pasien']==""
                            || $cek['jk_pasien']=="" ) { ?>
                                                
                            <?php }else{ ?>
                                <li>
                                    <a href="pendaftaran_pasien_final.php"><i class="menu-icon fa fa-laptop"></i>Pendaftaran</a>
                                </li>
                                <li>
                                    <a href="masterpendaftaran.php"><i class="menu-icon fa fa-laptop"></i>Riwayat Pendaftaran</a>
                                </li>

                            <?php } ?>
                    
                    </ul>
                <?php } elseif ($_SESSION['status']==3) {?>
                    <li>
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="reportPasien.php"><i class="menu-icon fa fa-laptop"></i>Report Pasien</a>
                    </li>
                    <li>
                        <a href="reportPendaftaran.php"><i class="menu-icon fa fa-laptop"></i>Report Pendaftaran</a>
                    </li>
                    <li>
                        <a href="ReportJadwalDokter.php"><i class="menu-icon fa fa-laptop"></i>Report Jadwal Dokter</a>
                    </li>
                <?php }?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->