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
                        <b><h2 class="card-title text-center">Report Jadwal Dokter</h2></b>
                    </div>
                    <div class="card-body">  
                        <table id="datatable1" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Dokter</th>
                                    <th scope="col">Poli</th>
                                    <th scope="col">Jadwal</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sql1 = mysqli_query($conn,"SELECT nama_poli,nama_dokter,hari_jam from poli a
                                                            left join dokter b on a.id=b.id_poli
                                                            left join jadwal c on b.id=c.id_dokter;") or die (mysqli_error());   ?>
                            <?php $no=1;
                                while($result= mysqli_fetch_assoc($sql1)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $result['nama_dokter'] ?></td>
                                        <td><?php echo $result['nama_poli'] ?></td>
                                        <td><?php echo $result['hari_jam'] ?></td>
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

<script type="text/javascript" >


let table =  $('#datatable1').DataTable( {
        dom: 'Bfrtip',
        buttons: [{
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    },
                    title :'Report Jadwal Dokter'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    },
                    title :'Report Jadwal Dokter'
                }
        ]   
    } );
</script>