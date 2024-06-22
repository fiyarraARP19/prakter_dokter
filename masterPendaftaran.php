<?php include"struktur/head.php"; ?>
<?php include"struktur/sideBar.php"; ?>
<?php include"struktur/topNavigation.php"; ?>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <b><h2 class="card-title text-center">Master Pendaftaran</h2></b>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No Urut</th>
                                    <th scope="col">No Pasien</th>
                                    <th scope="col">Tanggal Pendaftaran</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Poli</th>
                                    <th scope="col">Dokter</th>
                                    <th scope="col">Jadwal</th>
                                    <th scope="col">Keluhan</th>
                                    <th scope="col">Status</th>
                                    <?php if ($_SESSION['status']==1) {?>
                                        <th scope="col">Aksi</th>
                                    <?php  } ?>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($_SESSION['status']==1) {?>
                            <?php $sql1 = mysqli_query($conn,"SELECT a.keluhan,a.status,a.id,b.nik,b.nama_pasien,c.nama_poli,d.nama_dokter,e.hari_jam,a.created_time,a.tanggal_pendaftaran,a.no_urut,b.id as no_pasien FROM `pendaftaran` A
                                                                left join pasien b on a.id_pasien=b.id
                                                                left join poli c on a.id_poli=c.id
                                                                left join dokter d on a.id_dokter=d.id
                                                                left join jadwal e on a.id_jadwal=e.id 
                                                                order by a.status asc,no_urut asc" ) or die (mysqli_error());   ?>
                            <?php  } ?>
                            <?php if ($_SESSION['status']==2) {?> 
                            <?php $sql1 = mysqli_query($conn,"SELECT a.keluhan,a.status,a.id,b.nik,b.nama_pasien,c.nama_poli,d.nama_dokter,e.hari_jam,a.created_time,a.tanggal_pendaftaran,a.no_urut,b.id as no_pasien FROM `pendaftaran` A
                                                                left join pasien b on a.id_pasien=b.id
                                                                left join poli c on a.id_poli=c.id
                                                                left join dokter d on a.id_dokter=d.id
                                                                left join jadwal e on a.id_jadwal=e.id 
                                                                where a.id_pasien='$_SESSION[id_pasien]'
                                                                order by a.status asc,no_urut asc" ) or die (mysqli_error());   ?>
                            <?php  } ?>
                            <?php $no=1;
                                while($result= mysqli_fetch_assoc($sql1)){
                                    ?>
                                    <tr>
                                        <td><?php echo $result['no_urut'] ?></td>
                                        <td><?php echo $result['no_pasien'] ?></td>
                                        <td><?php echo date("d M Y", strtotime($result['tanggal_pendaftaran']))  ?></td>
                                        <td><?php echo $result['nik'] ?></td>
                                        <td><?php echo $result['nama_pasien'] ?></td>
                                        <td><?php echo $result['nama_poli'] ?></td>
                                        <td><?php echo $result['nama_dokter'] ?></td>
                                        <td><?php echo $result['hari_jam'] ?></td>
                                        <td><?php echo $result['keluhan'] ?></td>
                                        <td><?php echo $retVal = ($result['status']==1) ? "Open" : "Closed" ;  ?></td>
                                        <?php if ($_SESSION['status']==1) {?>
                                            <?php if ($result['status']==1) {?>
                                                <td><a href='aksiUpdateStatusPendaftaran.php?list=<?php echo $result['id'] ?>' class='btn btn-warning btn xs'>Selesai</a></td>
                                            <?php }else{ ?>
                                                <td><a href='#' class='btn btn-danger btn xs'>CLOSED</a></td>
                                            <?php } ?>
                                        <?php } ?>
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