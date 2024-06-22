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
                        <b><h2 class="card-title text-center">Master Poli</h2></b>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Tambah Poli</button>
                    </div>
                    <div class="card-body">  
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nama Poli</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sql1 = mysqli_query($conn,"SELECT * from poli") or die (mysqli_error());   ?>
                            <?php $no=1;
                                while($result= mysqli_fetch_assoc($sql1)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $result['nama_poli'] ?></td>
                                        <td><?php echo $result['keterangan'] ?></td>
                                        <td><button type="button" class="btn btn-warning btn xs" data-toggle="modal" data-target="#modalEdit<?php echo $result['id'] ?>">Edit</button>
                                        <a href='aksiDeletePoli.php?id=<?php echo $result['id'] ?>' class='btn btn-danger btn xs' onclick="return confirm('Apakah Yakin Kamu Hapus Data Ini ?')">Delete</a></td>
                                    </tr>
                                    <!-- MODAL Edit -->
                                    <div class="modal fade" id="modalEdit<?php echo $result['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Poli</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                                <form action="aksiPoli.php" method="post" class="form-horizontal">
                                                <input type="hidden" value="<?php echo $result['id'] ?>" name="id">
                                                    <div class="modal-body">
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="poli" class=" form-control-label">Nama Poli</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <input type="input" name="poli" placeholder="Nama Poli" value="<?php echo $result['nama_poli'] ?>" class="form-control">
                                                            </div>
                                                        </div>   
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="keterangan" class=" form-control-label">Keterangan</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <input type="input" name="keterangan" placeholder="Keterangan" value="<?php echo $result['keterangan'] ?>" class="form-control">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Poli</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="aksiPoli.php" method="post" class="form-horizontal">
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="poli" class=" form-control-label">Nama Poli</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="input" name="poli" placeholder="Nama Poli" class="form-control">
                    </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="keterangan" class=" form-control-label">Keterangan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="input" name="keterangan" placeholder="Keterangan" class="form-control">
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

