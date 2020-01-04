<?php include_once('../_header.php'); ?>

    <!-- Membuat tampilan utama -->
    <div class="box">
        <h1>Poliknik</h1>
        <h4>
            <small>Data Poliknik</small>
            <div class="pull-right">
              <!-- membuat button refresh -->
              <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
              <!-- membuat button tambah data -->
              <a href="generate.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Poli</a>
              </div>
        </h4>      
				<!-- Membuat table-->
				<!-- membuat form untuk mengambil value yang tercentang -->
				<form method="post" name="proses">
					<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="poliklinik">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Poli</th>
											<th>Gedung</th>
											<!-- !-- MEMBUAT CHECK BOX Multiple data -->
											<th>
												<center>
													<input type="checkbox" id="select_all" value="">
												</center>
											</th>
										</tr>
									</thead>
									<!-- Mengeluarkan Data -->
									<tbody>
									<?php
										$no = 1;
										//membuat Query
										$sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC") OR DIE (mysqli_error($con));
										//membuat fungsi apabila data lebih dari 1 maka
										if (mysqli_num_rows($sql_poli) > 0) { 
											// melakukan perulangan / mengeluarkan data
											while($data = mysqli_fetch_array($sql_poli)) { ?>
												<tr>
													<td><?=$no++?>.</td>
													<td><?=$data['nama_poli'];?></td>
													<td><?=$data['gedung'];?></td>

													<!-- MEMBUAT CHECK BOX Multiple data -->
													<td align="center">
															<input type="checkbox" name="checked[]" class="check" value="<?=$data['id_poli'];?>">
													</td>
												</tr>
											<?php
											}
										} else {
											echo "<tr>
															<td colspan=\"4\" align=\"center\">Data tidak ditemukan</td>
														</tr>" ;
										}
										?>
									</tbody>
							</table>
					</div>
				</form>
				
				<!--Membuat button hapus dan edit -->
				<div class="box pull-right">
					<!-- onclick bearti kita akan menjalankan function edit java script -->
				  <button class="btn btn-warning btn-sm" onclick="edit()"><i class="glyphicon glyphicon-edit"></i> Edit</button>
				  <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
				</div>
			<script>
		//  Membuat JQuery untuk select all data 
		$(document).ready(function() {

			$('#poliklinik').DataTable({
				// digunakan untuk menghilangkan/mematikan searchable dan orderable pada target ke array0 dan 6.
				columnDefs: [
					{
						"searchable": false,
						"orderable": false,
						"targets":[0,3]
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

		// fungsi edit
		function edit () {
			// document.(name dari form).(action)
			document.proses.action = 'edit.php';
			document.proses.submit();
		}

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
