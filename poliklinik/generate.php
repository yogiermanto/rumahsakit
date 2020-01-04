<?php include_once('../_header.php'); ?>
<div class="box">
  <h1>Poliknik</h1>
  <h4>
    <small>Tambah Data Poliknik</small>
    <div class="pull-right">
      <!-- membuat button kembali -->
      <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
      </div>
  </h4>
  <!-- Menambah inputan data  -->
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <form action="add.php" method="post">
        <div class="form-group">
          <label for="count_add">Banyak Record yang Akan Ditambahkan</label>
          <!-- pattern = validasi pada html5, jadi yang bisa dinput hanya angka dari 0-9 -->
          <input type="text" name="count_add" id="count_add" maxlength="2" pattern="[0-9]+" class="form-control" required>
        </div>
        <div class="form-group pull-right">
          <input type="submit" name="generate" value="Generate" class="btn btn-success" >
        </div>
      </form>
    </div>
  </div>




<?php include_once('../_footer.php'); ?>