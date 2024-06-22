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
                        <b><h2 class="card-title text-center">Master Jadwal</h2></b>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Tambah Jadwal</button>
                    </div>
                    <div class="card-body">  
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nama Dokter</th>
                                    <th scope="col">Jadwal Dokter</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sql1 = mysqli_query($conn,"SELECT a.*,b.nama_dokter from jadwal a left join dokter b on a.id_dokter=b.id") or die (mysqli_error());   ?>
                            <?php $no=1;
                                while($result= mysqli_fetch_assoc($sql1)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $result['nama_dokter'] ?></td>
                                        <td><?php echo $result['hari_jam'] ?></td>
                                        <td><button type="button" class="btn btn-warning btn xs" data-toggle="modal" data-target="#modalEdit<?php echo $result['id'] ?>">Edit</button>
                                        <a href='aksiDeleteJadwal.php?id=<?php echo $result['id'] ?>' class='btn btn-danger btn xs' onclick="return confirm('Apakah Yakin Kamu Hapus Data Ini ?')">Delete</a></td>
                                    </tr>
                                    <!-- MODAL Edit -->
                                    <div class="modal fade" id="modalEdit<?php echo $result['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal Dokter</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                                <form action="aksiJadwal.php" method="post" class="form-horizontal">
                                                <input type="hidden" value="<?php echo $result['id'] ?>" name="id">
                                                    <div class="modal-body">
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="kat_barang" class=" form-control-label">Nama Dokter</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <select name="dokter" id="dokter" class="form-control">
                                                                    <option value=<?php echo $result['id_dokter'] ?> ><?php echo $result['nama_dokter'] ?></option>
                                                                    <?php $sql22 = mysqli_query($conn,"SELECT * from dokter where id=$result[id_dokter] ") or die (mysqli_error());   ?>
                                                                    <?php while($resulta= mysqli_fetch_assoc($sql22)){ ?>
                                                                        <option value=<?php echo $resulta['id'] ?> ><?php echo $resulta['nama_dokter'] ?></option>
                                                                    <?php  } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="jadwal" class=" form-control-label">Jadwal Dokter</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <input type="input" name="jadwal" placeholder="Jadwal Dokter" value="<?php echo $result['hari_jam'] ?>" class="form-control">
                                                                <small>Format Penulisan : hari, jam (ex: Minggu, 12.00 s/d 14.00)</small>
                                                            </div>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="aksiJadwal.php" method="post" class="form-horizontal">
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="kat_barang" class=" form-control-label">Nama Dokter</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="dokter" id="dokter" class="form-control">
                        <?php $sql1 = mysqli_query($conn,"SELECT * from dokter") or die (mysqli_error());   ?>
                        <?php while($resulta= mysqli_fetch_assoc($sql1)){ ?>
                            <tr>
                            <option value=<?php echo $resulta['id'] ?> ><?php echo $resulta['nama_dokter'] ?></option>
                        <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="jadwal" class=" form-control-label">Jadwal Dokter</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="input" name="jadwal" placeholder="Jadwal Dokter" class="form-control">
                        <small>Format Penulisan : hari, jam (ex: Minggu, 12.00 s/d 14.00)</small>
                    </div>
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