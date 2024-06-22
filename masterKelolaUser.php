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
                        <b><h2 class="card-title text-center">Master Kelola User</h2></b>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Tambah User</button>
                    </div>
                    <div class="card-body">  
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $query = mysqli_query($conn,"SELECT * FROM login where status in ('1','3')") or die (mysqli_error());   ?>
                            <?php $no_urut=1;
                                while($result= mysqli_fetch_assoc($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no_urut ?></td>
                                        <td><?php echo $result['nama'] ?></td>
                                        <td><?php echo $result['username'] ?></td>
                                        <td><?php echo $val = ($result['status']==1) ? "Admin" : "Pimpinan" ;  ?></td>
                                        <td><button type="button" class="btn btn-warning btn xs" data-toggle="modal" data-target="#modalEdit<?php echo $result['id_user'] ?>">Edit</button>
                                        <a href='aksiDeleteDokter.php?id=<?php echo $result['id_user'] ?>' class='btn btn-danger btn xs' onclick="return confirm('Apakah Yakin Kamu Hapus Data Ini ?')">Delete</a></td>
                                    </tr>
                                    <!-- MODAL Edit -->
                                    <div class="modal fade" id="modalEdit<?php echo $result['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                                <form action="aksiKelolaUser.php" method="post" class="form-horizontal">
                                                <input type="hidden" value="<?php echo $result['id_user'] ?>" name="id">
                                                    <div class="modal-body">
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="nama" class=" form-control-label">Nama</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <input type="input" name="nama" placeholder="Nama" value="<?php echo $result['nama'] ?>" class="form-control">
                                                            </div>
                                                        </div>   
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="username" class=" form-control-label">Username</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <input type="input" name="username" placeholder="username" value="<?php echo $result['username'] ?>" class="form-control">
                                                            </div>
                                                        </div> 
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="password" class=" form-control-label">Password</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <input type="password" name="password" placeholder="password" value="<?php echo $result['password'] ?>" class="form-control">
                                                            </div>
                                                        </div> 
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="kat_barang" class=" form-control-label">Role</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <select name="role" id="role" class="form-control">
                                                                    <?php if ($result['status']==1) { ?>
                                                                        <option value=1>Admin</option>
                                                                        <option value=3>Pimpinan</option>
                                                                    <?php }else{ ?>
                                                                        <option value=3>Pimpinan</option>
                                                                        <option value=1>Admin</option>
                                                                    <?php } ?>
                                                                </select>
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
                                    <?php $no_urut++;
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="aksiKelolaUser.php" method="post" class="form-horizontal">
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="nama" class=" form-control-label">Nama</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="input" name="nama" placeholder="Nama" class="form-control">
                    </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="username" class=" form-control-label">Username</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="input" name="username" placeholder="username"  class="form-control">
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="password" class=" form-control-label">Password</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" name="password" placeholder="password"  class="form-control">
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="kat_barang" class=" form-control-label">Role</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="role" id="role" class="form-control">
                                <option value=1>Admin</option>
                                <option value=3>Pimpinan</option>
                        </select>
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