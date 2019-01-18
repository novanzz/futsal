<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h2>Tambah Lapangan</h2>
          <div class="form-group float-right">
            <a href="<?php echo site_url('AdminHome/tambahLapangan/')?>" class="btn btn-primary btn-block" >Tambah Lapangan</a>
          </div>
          <div class="table-responsive" style="padding-bottom : 100px; padding-top : 10px;">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Lapangan</th>
                  <th>Foto Lapangan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $nomor = 1; ?>
              <?php foreach ($data as $lap) { ?>
                <tr>
                  <td>
                    <?php echo $nomor; ?>
                  </td>
                  <td>
                    <?php echo $lap->nama_lapangan; ?>  
                  </td>
                  <td>
                    <img class="zoom" src= "<?php echo base_url('assets/uploads/'.$lap->url)?>" class="img-thumbnail" style="width:250;height:150;" />
                  </td>
                  <td>
                    <form action="<?php echo site_url('AdminHome/updateLap/'.$lap->id_lapangan)?>" method="post" enctype="multipart/form-data">
                    <button class = "btn btn-warning">Edit</button>
                    </form>
                     <form action="<?php echo site_url('AdminHome/delLap/'.$lap->id_lapangan)?>" method="post" enctype="multipart/form-data">
                    <button class = "btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                <?php $nomor = $nomor + 1; ?>
              <?php }?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>