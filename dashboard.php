<?php include"struktur/head.php"; ?>
<?php include"struktur/sideBar.php"; ?>
<?php include"struktur/topNavigation.php"; ?>


        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                
                <?php if ($_SESSION['status']==2) {?>
                <?php $sql = mysqli_query($conn,"SELECT * from pasien where id=$_SESSION[id_pasien]") or die (mysqli_error());   
                                        // where tanggal_pendaftaran='$tanggal_pendaftaran
                                            $cek= mysqli_fetch_array($sql);
                                            if ($cek['nama_pasien']=="" || $cek['tempat_lahir_pasien']=="" || $cek['nik']=="" 
                                            || $cek['tanggal_lahir_pasien']=="" || $cek['alamat_pasien']==""
                                            || $cek['jk_pasien']=="" ) { ?>
                                                <div class="alert alert-danger" role="alert">Mohon Lengkapi Data Diri anda !!!</div>
                                            <?php }else{ ?>
                                                <div class="alert alert-info" role="alert">Selamat Datang </div>
                                            <?php } ?>
                <?php } ?>
                
                <?php if ($_SESSION['status']==1) {?>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="fa fa-stethoscope" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                        <?php $sql1 = mysqli_query($conn,"SELECT count(*) as total FROM pendaftaran ") or die (mysqli_error());   
                                        // where tanggal_pendaftaran='$tanggal_pendaftaran
                                            $Pendaftaran= mysqli_fetch_array($sql1)
                                            ?>
                                            <div class="stat-text"><span class="count"><?php echo $Pendaftaran['total'] ?></span></div>
                                            <div class="stat-heading">Pendaftaran Hari ini</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="fa fa-user-md" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                        <?php $sql1 = mysqli_query($conn,"SELECT count(*) as total FROM dokter ") or die (mysqli_error());   
                                        // where tanggal_pendaftaran='$tanggal_pendaftaran
                                            $Dokter= mysqli_fetch_array($sql1)
                                            ?>
                                            <div class="stat-text"><span class="count"><?php echo $Dokter['total'] ?></span></div>
                                            <div class="stat-heading">Dokter</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="fa fa-heartbeat" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                        <?php $sql1 = mysqli_query($conn,"SELECT count(*) as total FROM pasien ") or die (mysqli_error());   
                                        // where tanggal_pendaftaran='$tanggal_pendaftaran
                                            $pasien= mysqli_fetch_array($sql1)
                                            ?>
                                            <div class="stat-text"><span class="count"><?php echo $pasien['total'] ?></span></div>
                                            <div class="stat-heading">Pasien</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="fa fa-hospital-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                        <?php $sql1 = mysqli_query($conn,"SELECT count(*) as total FROM poli ") or die (mysqli_error());   
                                        // where tanggal_pendaftaran='$tanggal_pendaftaran
                                            $poli= mysqli_fetch_array($sql1)
                                            ?>
                                            <div class="stat-text"><span class="count"><?php echo $poli['total'] ?></span></div>
                                            <div class="stat-heading">Poli</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php }?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Jadwal Dokter</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Poli</th>
                                            <th scope="col">Dokter</th>
                                            <th scope="col">Jadwal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $sql1 = mysqli_query($conn,"SELECT nama_poli,nama_dokter,hari_jam from poli a
                                                            left join dokter b on a.id=b.id_poli
                                                            left join jadwal c on b.id=c.id_dokter;") or die (mysqli_error());   ?>
                                    <?php $no=1;
                                        while($ya= mysqli_fetch_assoc($sql1)){
                                            ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $ya['nama_poli'] ?></td>
                                                <td><?php echo $ya['nama_dokter'] ?></td>
                                                <td><?php echo $ya['hari_jam'] ?></td>
                                            </tr>
                                            <?php $no++;
                                                }
                                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
 


    
<?php include"struktur/footer.php"; ?>