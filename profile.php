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
                            <strong class="card-title">Profile</strong><br>
                            <button type="button" class="btn btn-info mt-2" data-toggle="modal" data-target="#exampleModal">Edit</button>
                        </div>        
                            <div class="col-lg-6">
                                <div class="card-body">  
                                    <table id="bootstrap-data-table" class="table table-borderless">
                                        <?php $sql1 = mysqli_query($conn,"SELECT * from pasien where id=$_SESSION[id_pasien]") or die (mysqli_error());   ?>
                                        <?php $no=1;
                                            while($result= mysqli_fetch_assoc($sql1)){ ?>
                                        <thead>
                                            <tr>
                                                <th scope="col">NIK</th>
                                                <th scope="col">:</th>
                                                <th scope="col"><?php echo $result['nik'] ?></th>
                                            </tr>
                                            <tr>
                                                <th scope="col">Nama Pasien</th>
                                                <th scope="col">:</th>
                                                <th scope="col"><?php echo $result['nama_pasien'] ?></th>
                                            </tr>
                                            <tr>
                                                <th scope="col">Tempat Lahir</th>
                                                <th scope="col">:</th>
                                                <th scope="col"><?php echo $result['tempat_lahir_pasien'] ?></th>
                                            </tr>
                                            <tr>
                                                <th scope="col">Tanggal Lahir</th>
                                                <th scope="col">:</th>
                                                <th scope="col"><?php echo $result['tanggal_lahir_pasien'] ?></th>
                                            </tr>
                                            <tr>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">:</th>
                                                <th scope="col"><?php echo $result['alamat_pasien'] ?></th>
                                            </tr>
                                            <tr>
                                                <th scope="col">Jenis Kelamin</th>
                                                <th scope="col">:</th>
                                                <th scope="col"><?php echo $result['jk_pasien'] ?></th>
                                            </tr>
                                            <tr>
                                                <th scope="col">Status Pernikahan</th>
                                                <th scope="col">:</th>
                                                <th scope="col"><?php echo $result['status_perkawinan_pasien'] ?></th>
                                            </tr>
                                            <tr>
                                                <th scope="col">Pekerjaan</th>
                                                <th scope="col">:</th>
                                                <th scope="col"><?php echo $result['pekerjaan_pasien'] ?></th>
                                            </tr>
                                        </thead>
                                        <!-- MODAL Edit -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Poli</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                            <form action="aksipasien.php" method="post" class="form-horizontal">
                                                            <input type="hidden" value="<?php echo $result['id'] ?>" name="id">
                                                                <div class="modal-body">
                                                                    <div class="row form-group">
                                                                        <div class="col col-md-3"><label for="nik" class=" form-control-label">NIK</label></div>
                                                                        <div class="col-12 col-md-9"><input type="text" id="nik" name="nik" placeholder="NIK" class="form-control" value=<?php echo $result['nik'] ?>></div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col col-md-3"><label for="nama_pasien" class=" form-control-label">Nama Pasien</label></div>
                                                                        <div class="col-12 col-md-9"><input type="text" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" class="form-control" value=<?php echo $result['nama_pasien'] ?>></div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col col-md-3"><label for="tempat_lahir" class=" form-control-label">Tempat Lahir</label></div>
                                                                        <div class="col-12 col-md-9"><input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" value=<?php echo $result['tempat_lahir_pasien'] ?>></div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col col-md-3"><label for="tanggal_lahir" class=" form-control-label">Tanggal Lahir</label></div>
                                                                        <div class="col-12 col-md-9"><input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control" value=<?php echo $result['tanggal_lahir_pasien'] ?> required></div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col col-md-3"><label for="alamat_pasien" class=" form-control-label">Alamat</label></div>
                                                                        <div class="col-12 col-md-9"><textarea name="alamat_pasien" id="alamat_pasien" rows="3" placeholder="Alamat" class="form-control"><?php echo $result['alamat_pasien'] ?></textarea></div>
                                                                    </div> 
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Kelamin</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="jk_pasien" id="jk_pasien" class="form-control">
                                                                                <?php if ($result['jk_pasien']=="Laki-laki") { ?>
                                                                                    <option value="Laki-laki">Laki-laki</option>
                                                                                    <option value="Perempuan">Perempuan</option> 
                                                                                <?php }else{ ?>
                                                                                    <option value="Perempuan">Perempuan</option> 
                                                                                    <option value="Laki-laki">Laki-laki</option>
                                                                                <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Status Pernikahan</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="st_pernikahan" id="st_pernikahan" class="form-control">
                                                                                <?php if ($result['status_perkawinan_pasien']=="Menikah") { ?>
                                                                                    <option value="Menikah">Menikah</option>
                                                                                    <option value="Lajang">Lajang</option>
                                                                                    <option value="Duda">Duda</option>
                                                                                    <option value="Janda">Janda</option>
                                                                                <?php }elseif($result['status_perkawinan_pasien']=="Lajang"){ ?>
                                                                                    <option value="Lajang">Lajang</option>
                                                                                    <option value="Menikah">Menikah</option>
                                                                                    <option value="Duda">Duda</option>
                                                                                    <option value="Janda">Janda</option>
                                                                                <?php }elseif($result['status_perkawinan_pasien']=="Duda"){ ?>
                                                                                    <option value="Duda">Duda</option>
                                                                                    <option value="Menikah">Menikah</option>
                                                                                    <option value="Lajang">Lajang</option>
                                                                                    <option value="Janda">Janda</option>
                                                                                <?php }else{ ?>
                                                                                    <option value="Janda">Janda</option>
                                                                                    <option value="Menikah">Menikah</option>
                                                                                    <option value="Lajang">Lajang</option>
                                                                                    <option value="Duda">Duda</option>
                                                                                <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="pekerjaan" class=" form-control-label">Pekerjaan</label></div>
                                                                    <div class="col-12 col-md-9"><input type="text" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" class="form-control" value=<?php echo $result['pekerjaan_pasien'] ?>></div>
                                                                </div>
                                                                
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- MODAL Edit -->
                                        <?php $no++; }  ?>
                                    </table>
                                </div>
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