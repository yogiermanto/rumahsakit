<?php include_once('../_header.php'); ?>

    <!-- Membuat tampilan utama -->
    <div class="box">
        <h1>Pasien</h1>
        <h4>
            <small>Data Pasien</small>
            <div class="pull-right">
              <!-- membuat button refresh -->
              <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
              <!-- membuat button tambah data -->
              <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Pasien</a>
              </div>
        </h4>      
				<!-- Membuat table-->
					<div class="table-responsive">
						<!-- Cara memanggil datatable, tentukan ID di table nya. -->
							<table class="table table-striped table-bordered table-hover" id="pasien">
									<thead>
										<tr>
											<!-- <th>No</th> -->
											<th class="">Nomor Identitas</th>
											<th>Nama Pasien</th>
											<th>Jenis Kelamin</th>
											<th>Alamat</th>
											<th>No. Telepon</th>
											<!--  -->
											<th class=""><i class="glyphicon glyphicon-cog"></i></th>
										</tr>
									</thead>
							</table>
					</div>
			</div>
			<script>
						$(document).ready(function() {
							$('#pasien').DataTable( {
							"processing": true,
							"responsive":true,
							"serverSide": true,
							// "scrollX": false,
							"ajax": "pasien_data.php",
							// scrollY: '250px',
							//untuk membuat button 
							dom : 'lBFrtip',
							buttons: [
								// custom untuk button PDF
								{
									extend : 'pdf',
									orientation : 'potrait',
									pageSize : 'Legal',
									title : 'Data Pasien',
									download : 'open',
								},
								'csv', 'excel', 'print', 'copy', 
								
							],

							// Membuat Button edit dan delete
							columnDefs: [
								{
										"searchable" : false,
										"orderable": false,
										"targets":5, 
										"render": function(data, type, row) {
											var btn= "<center>\
																	<a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a>\
																	<a href=\"del.php?id="+data+"\" onclick=\"return confirm('Yakin menghapus data')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a>\
																</center>";
											return btn;
										}
								}
							]
							} );
						} );
					</script>
				</div>



<?php include_once('../_footer.php'); ?>
