<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h2>List Order Lapangan <?php echo $lapangan_book ?></h2>
          <form action="<?php echo site_url('AdminHome/listorder/'.$no_lap)?>" method="post">
          <div class="form-group float-right" style="margin-top:20px;">
            <div class='input-group date' id='datepicker'>
              <input type='text' class="form-control" name="tanggal" />
              <span class="input-group-addon">
                <span class="fa fa-calendar" style="font-size:30px; margin-left:10px;"></span>
              </span>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="post" style="margin-top:20px;"> Cari Jadwal</button>
          </div>
          </form>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jadwal Jam</th>
                  <th>Tanggal Main</th>
                  <th>Nama Tim</th>
                  <th>Status</th>
          
                </tr>
              </thead>
              <tbody>
              <?php $nomor = 1; ?>
                <?php foreach ($data as $book) { ?>
                <tr>
                  <td>
                    <?php echo $nomor; ?>
                  </td>
                  <td>
                    <?php echo $book->jam_main; ?>
                  </td>
                  <td>
                    <?php foreach($Booking as $BookingLap){ ?>
                    <?php if ($BookingLap->id_jadwal == $book->id_jadwal): ?>
                      <?php if ($BookingLap->status_booking == 0): ?>
                      <?php echo $BookingLap->tanggal_booking; ?>
                    <?php elseif ($BookingLap->status_booking == 1): ?>
                      <?php echo $BookingLap->tanggal_booking; ?>
                      <?php else: ?>
                      <?php echo $BookingLap->tanggal_booking; ?>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php }?>
                  </td>
                  <td>
                    <?php foreach($Booking as $BookingLap){ ?>
                    <?php if ($BookingLap->id_jadwal == $book->id_jadwal):?>
                      <?php if ($BookingLap->status_booking == 0): ?>
                        <?php echo $BookingLap->nama_tim ?>
                    <?php elseif ($BookingLap->status_booking == 1): ?>
                      <?php echo $BookingLap->nama_tim ?>
                      <?php else: ?>
                        <p>Booked</p>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php }?>
                  </td>
                  <td>
                    <?php foreach($Booking as $BookingLap){ ?>
                    <!-- <?php echo $hasil= $book->id_jadwal; ?>
                    <?php echo '<script>console.log('.json_encode($hasil).')</script>'; ?> -->
                    <?php if ($BookingLap->id_jadwal == $book->id_jadwal): ?>
                      <?php if ($BookingLap->status_booking == 0): ?>
                      <p  style="color:#FF0000">Booking</p>
                    <?php elseif ($BookingLap->status_booking == 1): ?>
                      <p style="color:#ffa500">Waiting Verify</p>
                      <?php else: ?>
                        <p style="color:#008000">Booked</p>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php }?>
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
          format: "YYYY-MM-DD" ,
          defaultDate: moment(),
          maxDate: moment().add(14, 'days'),
          minDate: moment().subtract(7, 'days')
        });
         
      });
    </script>

  </body>
</html>
