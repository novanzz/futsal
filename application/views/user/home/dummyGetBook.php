<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
?> 
    
<div class="container"> 
  <div class="clearfix" style="margin-top:30px;"> 
    <span class="float-left"> 
      <h3 class="text-muted">List Jadwal Pemesanan</h3> 
    </span> 
  </div>   
  <table class="table table-bordered table-striped" style="text-align: center;" id="bidsTable"> 
    <thead> 
      <tr> 
      <div>
        <th >No</th> 
        <th>Tanggal Main</th> 
        <th>Jam Mulai</th> 
        <th>Status</th> 
        <th> Batas Waktu Pembayaran</th>
        <th>Bukti Bayar</th> 
      </tr> 
    </thead> 
    <tbody> 
    <?php $nomor = 1; ?>
      <?php foreach ($db_book as $book) { ?> 
      <tr> 
        <td> 
          <?php echo $nomor; ?> 
        </td> 
        <td> 
          <?php echo $book->tanggal_booking; ?> 
        </td> 
        <td> 
          <?php echo $book->id_jadwal; ?> 
        </td>  
        <td> 
          <?php if ($book->status_booking == 1): ?> 
            <p>Booked</p> 
          <?php else: ?> 
            <p>Booking</p> 
          <?php endif ?> 
        </td> 
        <td  style="display:none">
        <?php $expi= $book->waktu_expired; ?>  
          <?php echo $expi?>
        </td>
        <td><h5 id="demo"></h5></td>
        <td> 
        <a href="<?php echo site_url('UserHome/selectBookbyId/'.$book->id_booking)?>" class="btn btn-warning"><i class=" fa fa-edit"></i></a>
        </td>
      </tr> 
      <?php $nomor = $nomor + 1; ?>
      <?php }?> 
    </tbody> 
  </table> 

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

<script>
var table = document.getElementById("bidsTable");

var x = setInterval(
    function () {
        for (var i = 1, row; row = table.rows[i]; i++) {
            //iterate through rows
            //rows would be accessed using the "row" variable assigned in the for loop
            var countDownDate = row.cells[4].innerHTML;
            // countDownDate = new Date(endDate.innerHTML.replace(/-/g, "/")).getTime();
            var countDown = row.cells[5];
            // Update the count down every 1 second

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element
            countDown.innerHTML = ( hours + "h "+ minutes + "m " + seconds + "s ");

            //If the count down is finished, write some text 
            if (distance < 0) {
                // clearInterval(x);
                countDown.innerHTML = "Expired";
            }
        }
    }, 1000);
 </script>