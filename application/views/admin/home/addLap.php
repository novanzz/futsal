<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
  <div class="row" style="margin-left:36%; margin-top:1%;">
    <div class="jumbotron" style="background-color:#C8C8C8;">
      <h2 class="text-center">Tambah Lapangan</h2>
      <hr>
      <form action="<?php echo site_url('AdminHome/postLap')?>" method="post" enctype="multipart/form-data">
      <label for="nama_lapangan">Nama Lapangan :</label>
      <br>
          <input name="nama_lapangan">
          <br/>
        <label for="url">Upload Foto :</label>
          <input type="file" name="url" class="form-control">
          <br>
          <button type="submit" class="btn btn-primary btn-block" id="post">Tambahkan</button>
      </form>
     
    </div>
  </div>
</div>



