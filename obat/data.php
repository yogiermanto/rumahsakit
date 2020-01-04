<?php include_once('../_header.php'); ?>

    <!-- Membuat tampilan utama -->
    <div class="box">
        <h1>Obat</h1>
        <h4>
            <small>Data Obat</small>
            <div class="pull-right">
              <!-- membuat button refresh -->
              <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
              <!-- membuat button tambah data -->
              <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah</a>
              </div>
        </h4>

         <!-- Membuat Search -->
        <div style="margin-bottom: 20px;">
          <form class="form-inline" action="" method="post">
            <div class="form-group">
              <input type="text" name="pencarian" class="form-control" placeholder="pencarian">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </div>
          </form>
        </div>
        
        <!-- Membuat table-->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                      <th>No</th>
                      <th>Nama Obat</th>
                      <th>Keterangan</th>
                      <th class="text-center"><i class="glyphicon glyphicon-cog"></i></th>
                </thead>
                <!-- Mengeluarkan Data -->
                <tbody>
                  <?php
                  // Membuat pagination & Search
                  //batas awal
                  $batas = 3;
                  //membuat variabel hal dengan nilai dari $_GET['hal]
                  $hal = @$_GET['hal'];
                  // jika $hal kosong maka
                  if (empty($hal)) {
                    $posisi = 0;
                    $hal = 1;
                  } else {
                    $posisi = ($hal - 1) * $batas;
                  }

                  $no = 1;
                  if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
                    // Jika variabel pencarian tidak kosong maka :
                    if ($pencarian != '') {
                        $sql = "SELECT * FROM tb_obat WHERE nama_obat LIKE '%$pencarian%'";
                        $query = $sql;
                        $queryJml = $sql;

                    } else {
                      //di limit dengan mulai dari $posisi, sebanyak $batas.
                      $query = "SELECT * FROM tb_obat LIMIT $posisi, $batas";
                      $queryJml = "SELECT * FROM tb_obat";
                      $no = $posisi + 1;
                    }
                  } else {
                    $query = "SELECT * FROM tb_obat LIMIT $posisi,$batas";
                    $queryJml = "SELECT * FROM tb_obat";
                    $no = $posisi + 1;
                      
                  }
                  // Mengeluarkan Data
                  $sql_obat = mysqli_query($con, $query) or die(mysqli_eror($con));
                  // Jika ada datanya maka akan dilooping
                  if(mysqli_num_rows($sql_obat) > 0) {
                    while ($data = mysqli_fetch_array($sql_obat)) { ?>
                      <tr>
                        <td><?= $no++?></td>
                        <td><?= $data['nama_obat']?></td>
                        <td><?= $data['ket_obat']?></td>
                        <td class="text-center">
                          <a href="edit.php?id=<?=$data['id_obat']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                          <a href="del.php?id=<?=$data['id_obat']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>

                        </td>
                      </tr>
                      <?php
                    }
                  } else {
                    echo "<tr><td colspan=\"4\" align=\"center\">Daata tidak ditemukan</td></tr>";
                  }
                  ?>
                </tbody>
            </table>
        </div>
        <div>
          <?php 
          // Fungsi pagination
          // jika ada 'Pencarian'kosong
          if (@$_POST['pencarian'] == '' ) { ?>
            <div style="float: left">
              <?php
              $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
              echo "Jumlah Data : <b>$jml<b>";
              ?>
            </div>
            <div style="float:right;">
              <ul class="pagination pagination-sm" style="margin:0">
                <?php 
                  $jml_hal = ceil($jml / $batas);
                  for ($i=1; $i <= $jml_hal ; $i++) { 
                    if ($i != $hal) {
                      echo "<li><a href=\"?hal=$i\">$i</a></li>";
                    } else {
                      echo "<li class=\"active\"><a>$i</a></li>";
                    }
                  }
                ?>
              </ul> 
            </div>
            <?php 
          } else { 
              echo "<div style=\"float:left;\">";
              $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
              echo "Data Hasil Pencarian : <b>$jml</b>";
              echo "</div>";
            } ?>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>
