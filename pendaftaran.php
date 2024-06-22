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
                            <div class="card-body card-block">
                                <form action="aksisearchpasien.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Search By</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="st_pernikahan" id="st_pernikahan" class="form-control">
                                                <option value="1">NIK</option>
                                                <option value="2">No Pasien</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="search" class=" form-control-label"></label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="search" name="search" placeholder="Masukan...." class="form-control"></div>
                                    </div>
                                    <div class="form-actions form-group">
                                        <button type="submit" class="btn btn-primary btn-sm" name="cari" value="cari">cari</button>
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