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
                        <b><h2 class="card-title text-center">Report Pendaftaran</h2></b>
                    </div>
                    <div class="card-body">
                    <table border="0" cellspacing="5" cellpadding="5">
									<tbody>
									<tr>
										<td>Start Date:</td>
										<td><input type="text" id="min" name="min"></td>
									<tr>
                                        
                                    </tr>
										<td>End Date:</td>
										<td><input type="text" id="max" name="max"></td>
									</tr>
									</tbody>
								</table>
								<br>
                        <table id="datatable1" class="table table-striped table-bordered">
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
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sql1 = mysqli_query($conn,"SELECT a.keluhan,a.status,a.id,b.nik,b.nama_pasien,c.nama_poli,d.nama_dokter,e.hari_jam,a.created_time,a.tanggal_pendaftaran,a.no_urut,b.id as no_pasien FROM `pendaftaran` A
                                                                left join pasien b on a.id_pasien=b.id
                                                                left join poli c on a.id_poli=c.id
                                                                left join dokter d on a.id_dokter=d.id
                                                                left join jadwal e on a.id_jadwal=e.id 
                                                                order by a.status asc,no_urut asc" ) or die (mysqli_error());   ?>
                            <?php $no=1;
                                while($result= mysqli_fetch_assoc($sql1)){
                                    ?>
                                    <tr>
                                        <td><?php echo $result['no_urut'] ?></td>
                                        <td><?php echo $result['no_pasien'] ?></td>
                                        <td><?php echo date("d M Y", strtotime($result['tanggal_pendaftaran'])) ?></td>
                                        <td><?php echo $result['nik'] ?></td>
                                        <td><?php echo $result['nama_pasien'] ?></td>
                                        <td><?php echo $result['nama_poli'] ?></td>
                                        <td><?php echo $result['nama_dokter'] ?></td>
                                        <td><?php echo $result['hari_jam'] ?></td>
                                        <td><?php echo $result['keluhan'] ?></td>
                                        <td><?php echo $retVal = ($result['status']==1) ? "Open" : "Closed" ;  ?></td>
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
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;
    if (year===1970) {
         return null;
    } else {
         return [year, month, day].join('-');
        
    }
}
let minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
DataTable.ext.search.push(function (settings, data, dataIndex) {
    let min = formatDate(minDate.val());
    let max = formatDate(maxDate.val());
    let date = formatDate(data[2]);
    console.log(min);
    console.log(max);
    console.log(date);
    if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
});
 
// Create date inputs
minDate = new DateTime('#min', {
    format: 'DD MMM YYYY'
});
maxDate = new DateTime('#max', {
    format: 'DD MMM YYYY'
});
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
						title :'Report Pendaftaran Pasien'
					},
					{
						extend: 'print',
						text: 'Print',
						exportOptions: {
							modifier: {
								page: 'current'
							}
						},
						title :'Report Pendaftaran Pasien'
					},
				]
    } );
 
// Refilter the table
document.querySelectorAll('#min, #max').forEach((el) => {
    el.addEventListener('change', () => table.draw());
});
</script>