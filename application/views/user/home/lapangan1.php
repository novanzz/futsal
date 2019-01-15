<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
  <div class="clearfix" style="margin-top:30px;">
    <span class="clearfix">
      <center>
        <h3 style="margin-bottom:40px;">List Tabel Booking Lapangan
          <?php echo $lapangan_book ?>
        </h3>
      </center>
    </span>
    <span class="float-right">
    </span>
  </div>
  <form action="<?php echo site_url('UserHome/lapangan/'.$no_lap)?>" method="post">
    <div class="form-group float-right">
      <div class='input-group date' id='datepicker'>
        <input id='gettanggal' type='text' class="form-control" name="tanggal" />
        <span class="input-group-addon">
          <span class="fa fa-calendar " style="font-size:25px; margin-left:10px; margin-top:5px;"></span>
        </span>
        <button type="submit" class="btn btn-success" id="post" style="margin-left:20px;">Cari Jadwal</button>
      </div>
      <a href="<?php echo site_url('UserHome/viewBooking/'.$no_lap)?>" class="btn btn-primary btn-block" style="margin-top:20px;">Booking</a>
    </div>
  </form>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Jam Mulai</th>
        <th>Status</th>
        <th>Nama Tim</th>
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
                <p style="color:#FF0000">Booking</p>
              <?php elseif ($BookingLap->status_booking == 1): ?>
                <p style="color:#ffa500">Waiting Verify</p>
              <?php elseif ($BookingLap->status_booking == 2): ?>
                <p style="color:#008000">Booked</p>
              <?php else: ?>
            <?php endif; ?>
          <?php endif; ?>
          <?php if ($BookingLap->id_jadwal1 == $book->id_jadwal): ?>
              <?php if ($BookingLap->status_booking == 0): ?>
                <p style="color:#FF0000">Booking</p>
              <?php elseif ($BookingLap->status_booking == 1): ?>
                <p style="color:#ffa500">Waiting Verify</p>
              <?php elseif ($BookingLap->status_booking == 2): ?>
                <p style="color:#008000">Booked</p>
              <?php else: ?>
            <?php endif; ?>
          <?php endif; ?>
          <?php if ($BookingLap->id_jadwal2 == $book->id_jadwal): ?>
              <?php if ($BookingLap->status_booking == 0): ?>
                <p style="color:#FF0000">Booking</p>
              <?php elseif ($BookingLap->status_booking == 1): ?>
                <p style="color:#ffa500">Waiting Verify</p>
              <?php elseif ($BookingLap->status_booking == 2): ?>
                <p style="color:#008000">Booked</p>
              <?php else: ?>
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
                <?php echo $BookingLap->nama_tim ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php if ($BookingLap->id_jadwal1 == $book->id_jadwal):?>
              <?php if ($BookingLap->status_booking == 0): ?>
                <?php echo $BookingLap->nama_tim ?>
              <?php elseif ($BookingLap->status_booking == 1): ?>
                <?php echo $BookingLap->nama_tim ?>
              <?php else: ?>
                <?php echo $BookingLap->nama_tim ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php if ($BookingLap->id_jadwal2 == $book->id_jadwal):?>
              <?php if ($BookingLap->status_booking == 0): ?>
                <?php echo $BookingLap->nama_tim ?>
              <?php elseif ($BookingLap->status_booking == 1): ?>
                <?php echo $BookingLap->nama_tim ?>
              <?php else: ?>
                <?php echo $BookingLap->nama_tim ?>
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

<script type="text/javascript">
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })
</script>

<script type="text/javascript">
  $(function () {
    $('input[name=tanggal]').val("<?php echo $tgl_book ?>");
    $('#datepicker').datetimepicker({

      format: "YYYY-MM-DD",
      defaultDate: moment(),
      maxDate: moment().add(14, 'days'),
      minDate: moment().subtract(7, 'days')
    });
  });
</script>

<script>