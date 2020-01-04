<?php include_once('../_header.php'); ?>

    <!-- Membuat tampilan utama -->
    <div class="box">
        <h1>Dokter</h1>
        <h4>
            <small>Data Dokter</small>
            <div class="pull-right">
              <!-- membuat button refresh -->
              <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
              <!-- membuat button tambah data -->
              <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Dokter</a>
              </div>
        </h4>      
				<!-- Membuat table-->
				<!-- membuat form untuk mengambil value yang tercentang -->
				<form method="post" name="proses">
					<div class="table-responsive">
						<!-- Cara memanggil datatable, tentukan ID di table nya. -->
							<table class="table table-striped table-bordered table-hover" id="dokter">
									<thead>
										<tr>
											<!-- !-- MEMBUAT CHECK BOX Multiple data -->
											<th>
												<center>
													<input type="checkbox" id="select_all" value="">
												</center>
											</th>

											<th>No</th>
											<th>Nama Dokter</th>
											<th>Spesialis</th>
											<th>Alamat</th>
											<th>No. Telepon</th>
											<!--  -->
											<th><i class="glyphicon glyphicon-cog"></i></th>
										</tr>
									</thead>
									<!-- Mengeluarkan Data -->
									<tbody>
									<?php
										$no = 1;
										//membuat Query
										$sql_poli = mysqli_query($con, "SELECT * FROM tb_dokter") OR DIE (mysqli_error($con));
											// melakukan perulangan / mengeluarkan data
											while($data = mysqli_fetch_array($sql_poli)) { ?>
												<tr>
													<!-- MEMBUAT CHECK BOX Multiple data -->
													<td align="center">
														<input type="checkbox" name="checked[]" class="check" value="<?=$data['id_dokter'];?>">
													</td>
													
													<td><?=$no++?>.</td>
													<td><?=$data['nama_dokter'];?></td>
													<td><?=$data['spesialis'];?></td>
													<td><?=$data['alamat'];?></td>
													<td><?=$data['no_telp'];?></td>
													<td align="center">
														<a href="edit.php?id=<?=$data['id_dokter'];?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
													</td>
													
												
												</tr>
											<?php
											}
										?>
									</tbody>
							</table>
					</div>
				</form>
				
				<!--Membuat button hapus dan edit -->
				<div class="box pull-right">
					<!-- onclick bearti kita akan menjalankan function edit java script -->
				  <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
				</div>
			<script>
		//  Membuat JQuery untuk select all data 
		$(document).ready(function() {

			$('#dokter').DataTable({
				// digunakan untuk menghilangkan/mematikan searchable dan orderable pada target ke array0 dan 6.
				columnDefs: [
					{
						"searchable": false,
						"orderable": false,
						"targets":[0,6]
					}
				],
				"order": [1, "asc"]
			});

			$('#select_all').on('click', function() {
				// jika id di centang maka, akan mencheck semua id checked
				if (this.checked) {
					$('.check').each(function() {
						this.checked = true;
					});
				} else {
					$('.check').each(function() {
						this.checked = false;
					});
				}
			});
			// untuk membuat fungsi apabila checkbox terselect semua(panjang checkbox yang tercheck  = panjang total check yang ada)
			// jika id checked
			$('.check').on('click', function() {
				if($('.check:checked').length == $('.check').length) {
					// prop befungsi untuk mengambil nilai dari propety elemen
					$('#select_all').prop('checked', true);
				} else {
					$('#select_all').prop('checked', false);
				}
			});
		});

		function hapus () {
			//diberi return hapus/peringatan
			var conf = confirm('Yakin akan menghapus data?');
			if(conf) {
				document.proses.action = 'del.php';
				document.proses.submit();
			}
		}
		</script>

<?php include_once('../_footer.php'); ?>
