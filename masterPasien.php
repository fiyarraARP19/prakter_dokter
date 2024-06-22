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
                        <b><h2 class="card-title text-center">Master Pasien</h2></b>
                        <a href='pasien.php' class='btn btn-info'>Tambah</a>
                    </div>
                    <div class="card-body">  
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Tempat Lahir</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Status Pernikahan</th>
                                    <th scope="col">Pekerjaan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sql1 = mysqli_query($conn,"SELECT * from pasien") or die (mysqli_error());   ?>
                            <?php $no=1;
                                while($result= mysqli_fetch_assoc($sql1)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $result['nik'] ?></td>
                                        <td><?php echo $result['nama_pasien'] ?></td>
                                        <td><?php echo $result['tempat_lahir_pasien'] ?></td>
                                        <td><?php echo date("d M Y", strtotime($result['tanggal_lahir_pasien'])) ?></td>
                                        <td><?php echo $result['alamat_pasien'] ?></td>
                                        <td><?php echo $result['jk_pasien'] ?></td>
                                        <td><?php echo $result['status_perkawinan_pasien'] ?></td>
                                        <td><?php echo $result['pekerjaan_pasien'] ?></td>
                                        <td><a href='pasien.php?list=<?php echo $result['id'] ?>' class='btn btn-warning btn xs'>Edit</a></td>
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