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
          <th>No</th>
          <th>Tanggal Main</th>
          <th>Jam Mulai</th>
          <th>Status</th>
          <th> Batas Waktu Pembayaran</th>
          <th>Bukti Bayar</th>
          <th>Upload Preview</th>
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
          <?php if ($book->status_booking == 0): ?>
          <p style="color:#FF0000">Booking</p>
          <?php elseif ($book->status_booking == 1): ?>
          <p style="color:#ffa500">Waiting Verify</p>
          <?php else: ?>
          <p style="color:#008000">Booked</p>
          <?php endif ?>
        </td>
        <td style="display:none">
          <?php $expi= $book->waktu_expired; ?>
          <?php echo $expi?>
        </td>
        <td>
          <h5 id="demo"></h5>
        </td>
        <td>
          <form action="<?php echo site_url('UserHome/selectBookbyId/'.$book->id_booking)?>" method="post" enctype="multipart/form-data">
            <input type="file" name="gambar" class="form-control" onchange="readURL(this);">
            <Button type="submit" class="btn fa fa-upload btn-block btn-success" style="margin-top:20px;">Upload Bukti Bayar</Button>
          </form>
        </td>
        <td>
        <img class="zoom" src= "<?php echo base_url('assets/uploads/'.$book->bukti_bayar)?>" class="img-thumbnail" style="width:100;height:130;" />
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
        format: "YYYY-MM-DD",
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
          countDown.innerHTML = (hours + "h " + minutes + "m " + seconds + "s ");

          //If the count down is finished, write some text 
          if (countDownDate == 0) {
            // clearInterval(x);
            countDown.innerHTML = "Waiting Verify";
          }else if(distance < 0){
            countDown.innerHTML = "Expired";
            $.post({
              type: "POST",
              url: '<?php echo site_url("UserHome/deletebook/".$book->id_booking);?>',
              cache: false,
              success: function(response) {
                $(location).attr('href','<?php echo site_url("UserHome/deletebook/".$book->id_booking);?>');
              }
            });
          }
        }
      }, 1000);
  </script>