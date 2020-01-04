<!-- kita looping inputannya -->
<?php include_once('../_header.php'); ?>
<div class="box">
  <h1>Poliknik</h1>
  <h4>
    <small>Tambah Data Poliknik</small>
    <div class="pull-right">
      <!-- membuat button kembali -->
      <a href="data.php" class="btn btn-info btn-xs">Data</a>
      <a href="generate.php" class="btn btn-primary btn-xs">Tambah Data Lagi</a>
      </div>
  </h4>
  <!-- Menambah inputan data  -->
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <form action="proses.php" method="post">
        <!-- input hidden untuk menampung banyak data dari variabel count_add -->
        <input type="hidden" name="total" value="<?=@$_POST['count_add']?>">
        <!-- buat table -->
        <table class="table">
          <tr>
            <th>#</th>
            <th>Nama Poliklinik</th>
            <th>Gedung</th>
          </tr>
          <!-- setelah membuat th, lalu kita looping -->
          <?php
            //i dimulai dari 1, kurang dari samadengan <= inputan count_add 
            for ($i=1; $i <=$_POST['count_add'] ; $i++) {  ?>
              <!-- membuat inputannya -->
              <tr>
                <td><?=$i?></td>
                <td>
                  <input type="text" name="nama-<?=$i?>" class="form-control" required>
                </td>
                <td>
                  <input type="text" name="gedung-<?=$i?>" class="form-control" required>
                </td>
            <?php
            }
            ?>
        </table>
        <!-- Membuat button -->
        <div class="form-group pull-right">
          <input type="submit" name="add" value="Simpan Semua" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>




<?php include_once('../_footer.php'); ?>