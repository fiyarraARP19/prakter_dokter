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
                                <strong>Pasien</strong>
                            </div>
                            <?php $sql1 = mysqli_query($conn,"SELECT * FROM pasien where id='$_GET[list]' ") or die (mysqli_error());   
                                            $pasien= mysqli_fetch_array($sql1)
                                            ?>
                            <div class="card-body card-block">
                                <form action="aksipasien.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <input type="hidden" name="id" id="id" value=<?php echo $_GET['list'] ?>>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nik" class=" form-control-label">NIK</label></div>
                                        <?php if ($_GET['list']=="") { ?>
                                        <div class="col-12 col-md-9"><input type="text" id="nik" name="nik" placeholder="NIK" class="form-control"></div>
                                        <?php }else{ ?>
                                        <div class="col-12 col-md-9"><input type="text" id="nik" name="nik" placeholder="NIK" class="form-control" value=<?php echo $pasien['nik'] ?>></div>
                                        <?php } ?>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nama_pasien" class=" form-control-label">Nama Pasien</label></div>
                                        <?php if ($_GET['list']=="") { ?>
                                        <div class="col-12 col-md-9"><input type="text" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" class="form-control"></div>
                                        <?php }else{ ?>
                                        <div class="col-12 col-md-9"><input type="text" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" class="form-control" value=<?php echo $pasien['nama_pasien'] ?>></div>
                                        <?php } ?>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tempat_lahir" class=" form-control-label">Tempat Lahir</label></div>
                                        <?php if ($_GET['list']=="") { ?>
                                        <div class="col-12 col-md-9"><input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control"></div>
                                        <?php }else{ ?>
                                        <div class="col-12 col-md-9"><input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" value=<?php echo $pasien['tempat_lahir_pasien'] ?>></div>
                                        <?php } ?>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tanggal_lahir" class=" form-control-label">Tanggal Lahir</label></div>
                                        <?php if ($_GET['list']=="") { ?>
                                        <div class="col-12 col-md-9"><input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control"></div>
                                        <?php }else{ ?>
                                        <div class="col-12 col-md-9"><input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control" value=<?php echo $pasien['tanggal_lahir_pasien'] ?>></div>
                                        <?php } ?>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="alamat_pasien" class=" form-control-label">Alamat</label></div>
                                        <?php if ($_GET['list']=="") { ?>
                                        <div class="col-12 col-md-9"><textarea name="alamat_pasien" id="alamat_pasien" rows="3" placeholder="Alamat" class="form-control"></textarea></div>
                                        <?php }else{ ?>
                                        <div class="col-12 col-md-9"><textarea name="alamat_pasien" id="alamat_pasien" rows="3" placeholder="Alamat" class="form-control"><?php echo $pasien['alamat_pasien'] ?></textarea></div>
                                        <?php } ?>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Kelamin</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="jk_pasien" id="jk_pasien" class="form-control">
                                                <?php if ($_GET['list']=="") { ?>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                                <?php }else{ ?>
                                                    <?php if ($pasien['jk_pasien']=="Laki-laki") { ?>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option> 
                                                    <?php }else{ ?>
                                                        <option value="Perempuan">Perempuan</option> 
                                                        <option value="Laki-laki">Laki-laki</option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Status Pernikahan</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="st_pernikahan" id="st_pernikahan" class="form-control">
                                            <?php if ($_GET['list']=="") { ?>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Lajang">Lajang</option>
                                                <option value="Duda">Duda</option>
                                                <option value="Janda">Janda</option>
                                                <?php }else{ ?>
                                                    <?php if ($pasien['status_perkawinan_pasien']=="Menikah") { ?>
                                                        <option value="Menikah">Menikah</option>
                                                        <option value="Lajang">Lajang</option>
                                                        <option value="Duda">Duda</option>
                                                        <option value="Janda">Janda</option>
                                                    <?php }elseif($pasien['status_perkawinan_pasien']=="Lajang"){ ?>
                                                        <option value="Lajang">Lajang</option>
                                                        <option value="Menikah">Menikah</option>
                                                        <option value="Duda">Duda</option>
                                                        <option value="Janda">Janda</option>
                                                    <?php }elseif($pasien['status_perkawinan_pasien']=="Duda"){ ?>
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
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="pekerjaan" class=" form-control-label">Pekerjaan</label></div>
                                        <?php if ($_GET['list']=="") { ?>
                                        <div class="col-12 col-md-9"><input type="text" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" class="form-control"></div>
                                        <?php }else{ ?>
                                        <div class="col-12 col-md-9"><input type="text" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" class="form-control" value=<?php echo $pasien['pekerjaan_pasien'] ?>></div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-actions form-group">
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit" value="submit">Submit</button>
                                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                    </div>
                                </form>
                                
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