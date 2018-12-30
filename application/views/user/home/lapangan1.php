<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
?> 
    
<div class="container"> 
  <div class="clearfix" style="margin-top:30px;"> 
    <span class="float-left"> 
      <h3 class="text-muted">List Jadwal Pemesanan</h3> 
    </span> 
    <span class="float-right">
    <a href="<?php echo site_url('UserHome/viewBooking/'.$no_lap)?>" class="btn btn-primary">Booking</a>
  </span> 
  </div> 
  <div class="form-group"> 
    <div class='input-group date' id='datepicker'> 
      <input type='text' class="form-control" name="tanggal" /> 
      <span class="input-group-addon"> 
        <span class="glyphicon glyphicon-calendar"></span> 
      </span> 
    </div> 
  </div>  
  <table class="table table-bordered table-striped"> 
    <thead> 
      <tr> 
        <th>No</th> 
        <th>Tanggal Main</th> 
        <th>Jam Mulai</th> 
        <th>Nama Tim</th> 
        <th>status</th> 
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
          <?php echo $book->tanggal_booking; ?> 
        </td> 
        <td> 
          <?php echo $book->jam_main; ?> 
        </td> 
        <td> 
          <?php echo $book->nama_tim; ?> 
        </td> 
        <td> 
          <?php if ($book->status_booking == 1): ?> 
            <p>Booked</p> 
          <?php else: ?> 
            <p>Booking</p> 
          <?php endif ?> 
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