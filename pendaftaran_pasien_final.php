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
                                
                            <form action="aksipendaftaran.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <?php if ($_SESSION['status']==1) {?>
                                <?php 	
                                        $search=$_GET['search'];
                                        @$search_1=mysqli_query($conn,"SELECT * FROM pasien where id='$search' ");
                                        @$result=mysqli_fetch_assoc($search_1);
                                        ?>
                            <?php  } ?>
                            <?php if ($_SESSION['status']==2) {?>
                                <?php 	
                                        // $search=$_GET['search'];
                                        @$search_1=mysqli_query($conn,"SELECT * FROM pasien where id='$_SESSION[id_pasien]' ");
                                        @$result=mysqli_fetch_assoc($search_1);
                                        ?>
                                        
                                    <input type="hidden" value="<?php echo @$_SESSION['id_pasien'] ?>" name="search">
                                    <input type="hidden" name="nik" id="nik" value="<?php echo $result['nik'] ?>">
                                    <input type="hidden" name="nama_pasien" id="nama_pasien" value="<?php echo $result['nama_pasien'] ?>">
                                    <input type="hidden" name="tempat_lahir" id="tempat_lahir" value="<?php echo $result['tempat_lahir_pasien'] ?>">
                                    <input type="hidden" name="tempat_lahir" id="tempat_lahir" value="<?php echo $result['tanggal_lahir_pasien'] ?>">
                            <?php  } ?>
                                <?php if ($_SESSION['status']==1) {?>
                                <input type="hidden" value="<?php echo @$_GET['search'] ?>" name="search">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nik" class=" form-control-label">NIK</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nik" name="nik" placeholder="NIK" class="form-control" value="<?php echo $result['nik'] ?>" readonly></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nama_pasien" class=" form-control-label">Nama Pasien</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" class="form-control" value="<?php echo $result['nama_pasien'] ?>" readonly></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tempat_lahir" class=" form-control-label">Tempat Lahir</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" value="<?php echo $result['tempat_lahir_pasien'] ?>" readonly></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tanggal_lahir" class=" form-control-label">Tanggal Lahir</label></div>
                                        <div class="col-12 col-md-9"><input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control" value="<?php echo $result['tanggal_lahir_pasien'] ?>" readonly></div>
                                    </div>
                                    <?php }?>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tanggal_pendaftaran" class=" form-control-label">Tanggal Pendaftaran</label></div>
                                        <div class="col-12 col-md-9"><input type="date" id="tanggal_pendaftaran" name="tanggal_pendaftaran" placeholder="Tanggal Pendaftaran" class="form-control"></div>
                                    </div>
                                   <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Poli</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="poli" id="poli" class="form-control">
                                                <?php $sql1 = mysqli_query($conn,"SELECT * from poli") or die (mysqli_error());   ?>
                                                <?php while($yaa= mysqli_fetch_assoc($sql1)){ ?>
                                                    <option value=<?php echo $yaa['id'] ?> ><?php echo $yaa['nama_poli'] ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Dokter</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="dokter" id="dokter" class="form-control">
                                                <option value="0" class='option_dokter1'>Please select</option>
                                                <!-- <?php $sql1 = mysqli_query($conn,"SELECT * from dokter") or die (mysqli_error());   ?>
                                                <?php while($yaa= mysqli_fetch_assoc($sql1)){ ?>
                                                    <option id='option_dokter' value=<?php echo $yaa['id'] ?> ><?php echo $yaa['nama_dokter'] ?></option>
                                                <?php  } ?> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Jadwal</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="jadwal" id="jadwal" class="form-control">
                                                <option value="0" class='option_jadwal'>Please select</option>
                                                <!-- <?php $sql1 = mysqli_query($conn,"SELECT * from jadwal") or die (mysqli_error());   ?>
                                                <?php while($yaa= mysqli_fetch_assoc($sql1)){ ?>
                                                    <option id='option_jadwal' value=<?php echo $yaa['id'] ?> ><?php echo $yaa['hari_jam'] ?></option>
                                                <?php  } ?> -->
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="day" id="day">
                                    <input type="hidden" name="dokterCode" id="dokterCode">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tanggal_lahir" class=" form-control-label">Keluhan</label></div>
                                        <div class="col-12 col-md-9"><textarea id="keluhan" name="keluhan" placeholder="Keluhan" class="form-control" rows=3></textarea></div>
                                    </div>
                                    <div class="form-actions form-group">
                                        <button type="submit" class="btn btn-primary btn-sm" name="daftar" value="daftar">Daftar</button>
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
<script>
        
            $(document).ready(function() {
                $('#poli').on('change', function (e) {
                    var poli= document.getElementById('poli').value;
                    $.ajax({
                            url: "listDokter.php",
                            type:"get",
                            data:{list:poli},
                            success:function (resp){
                            console.log(resp) 
                            $(".option_dokter").remove();
                            $("#dokter").append(resp);
                            $(".option_jadwal").remove();
                            $("#jadwal").append(`<option class='option_jadwal' value=0>Jadwal Tidak Tersedia</option>`);
                            }
                        }); 
                        
                });
            } );
            
            $("#tanggal_pendaftaran").change(function(e){
                let date = new Date(e.target.value);
                console.log(date);
                var days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
                //First of month
                document.getElementById('day').value = days[date.getDay()];
                // alert(days[date.getDay()]);
                var poli= document.getElementById('poli').value;
                var tanggal_pendaftaran= document.getElementById('day').value;
                var dokterCode= document.getElementById('dokterCode').value;
                $.ajax({
                        url: "listDokter.php",
                        type:"get",
                        data:{list:poli},
                        success:function (resp){
                        console.log(resp) 
                        $(".option_dokter").remove();
                        $("#dokter").append(resp);
                        $(".option_jadwal").remove();
                        $("#jadwal").append(`<option class='option_jadwal' value=0>Jadwal Tidak Tersedia</option>`);
                        }
                    }); 
                    $.ajax({
                        url: "listjadwal.php",
                        type:"get",
                        data:{list:dokterCode,tanggal_pendaftaran:tanggal_pendaftaran},
                        success:function (resp){
                        console.log(resp) 
                        $(".option_jadwal").remove();
                        $("#jadwal").append(resp);
                        }
                    }); 
            });
        // function handler(e){
        //     let date = new Date(e.target.value);
        //     console.log(date);
        //     var days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        //     //First of month
        //     document.getElementById('day').value = days[date.getDay()];
        //     // alert(days[date.getDay()]);
        //     var tanggal_pendaftaran= document.getElementById('day').value;
        //     $("#option_jadwal").remove();
        //     $("#jadwal").append(resp);
        // }
            $(document).ready(function() {
                $('#dokter').on('change', function (e) {
                    var optionSelected = $("option:selected", this);
                    var dokter = this.value;
                    document.getElementById('dokterCode').value = dokter;
                    var poli= document.getElementById('poli').value;
                    var tanggal_pendaftaran= document.getElementById('day').value;
                    $.ajax({
                            url: "listjadwal.php",
                            type:"get",
                            data:{list:dokter,tanggal_pendaftaran:tanggal_pendaftaran,},
                            success:function (resp){
                            console.log(resp) 
                            $(".option_jadwal").remove();
                            $("#jadwal").append(resp);
                            }
                        }); 
                });
            } );
</script>

    
