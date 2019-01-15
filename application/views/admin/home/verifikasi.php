<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h2>Verifikasi Pembayaran</h2>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jam</th>
                  <th>Lapangan</th>
                  <th>Tanggal Main</th>
                  <th>Nama Tim</th>
                  <th>Status</th>
                  <th>Verifikasi</th>
                  <th>Bukti Bayar</th>
                </tr>
              </thead>
              <tbody>
              <?php $nomor = 1; ?>
                <?php foreach ($Booking as $book) { ?>
                <tr>
                  <td>
                    <?php echo $nomor; ?>
                  </td>
                  
                  <td>
                    <?php echo $book->jam_main; ?>
                    <br/>
                    <?php if ($book->id_jadwal1 == true): ?> 
                      <?php foreach ($Booking1 as $book1) { ?> 
                        <?php if ($book->id_booking == $book1->id_booking): ?> 
                          <?php echo $book1->jam_main;?>
                        <br>
                        <?php endif ?>
                      <?php }?>
                    <?php endif ?>
                    <?php if ($book->id_jadwal2 == true): ?> 
                      <?php foreach ($Booking2 as $book2) { ?> 
                        <?php if ($book->id_booking == $book2->id_booking): ?>  
                        <?php echo $book2->jam_main;?>
                        <br>
                        <?php endif ?>
                      <?php }?>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php echo $book->id_lapangan; ?>
                  </td>
                  <td>
                    <?php echo $book->tanggal_booking; ?>
                  </td>
                  <td>
                    <?php echo $book->nama_tim; ?>
                  </td>
                  <td style="color:#ffa500">
                    Waiting Verify
                  </td>
                  <td>
                    <form action="<?php echo site_url('AdminHome/updateBookByAdmin/'.$book->id_booking)?>" method="post" enctype="multipart/form-data">
                    <button class = "btn btn-success">Verifikasi</button>
                    </form>
                  </td>
                  <td>
                    <a href="<?php echo site_url('assets/uploads/'.$book->bukti_bayar)?> "class = "btn btn-primary">Detail</a>
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

    <!-- Graphs -->
    <script type="text/javascript">
      $(function () {
        $('input[name=tanggal]').val("<?php echo $tgl_book ?>");
        $('#datepicker').datetimepicker({
          // locale: moment(),
          // format: 'l',
          format: "YYYY-MM-DD" ,
          defaultDate: moment(),
          maxDate: moment().add(14, 'days'),
          minDate: moment().subtract(1, 'days')
        });

      });
    </script>

  </body>
</html>
