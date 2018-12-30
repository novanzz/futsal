<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
  <div class="row" style="margin-top:10vh">
    <div class=" col-md-4 col-md-offset-4  jumbotron">
      <h2 class="text-center">Post Booking</h2>
      <hr>
      <form action="<?php echo site_url('UserHome/postBooking')?>" method="post">
        
          <input name="id_lapangan" value="<?php echo $no_lap ?>" hidden>      
          <input name="id_user" value="<?php echo $this->session->id_user ?>" hidden>

        <!-- <div class="form-group has-feedback">
          <label for="sts">status dummy</label>
          <br>
          <input name="status" type="number" min="1" max="1">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div> -->

        <label for="date">Tanggal Booking :</label>
        <!-- <input type="text" name="datetimes" /> -->
        <div class="form-group">
          <div class='input-group date' id='datepicker'>
            <input type='text' class="form-control" name="tanggal" />
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="jmn">Jam Main Ke :</label>
          <br>
          <input name="jam_main" type="number" min="1" max="13">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class='input-group'>
          <input class="form-control" id='exp' name="exp" hidden/>
        </div>
        <p id="demo"></p>
        <!-- <p id="exp"></p> -->
        <button type="submit" class="btn btn-primary btn-block" id="post">Post</button>
      </form>
      <!-- <button class="btn btn-primary btn-block" id="post" name="post">Post exp dan time</button> -->
    </div>
  </div>
</div>

<!-- datepicker just 2 weeks -->
<script type="text/javascript">
  $(function () {
    $('#datepicker').datetimepicker({
      // locale: moment(),
      // format: 'l',
      format: "YYYY-MM-DD",
      defaultDate: moment(),
      maxDate: moment().add(14, 'days'),
      minDate: moment().subtract(1, 'days')
    });
  });
</script>

<!-- timer countdown-->
<script type="text/javascript">
    var oldDate = new Date();
    var hour = oldDate.getHours();
    var countDownDate = oldDate.setHours(hour + 2);
    // Update the count down every 1 second
    var x = setInterval(function () {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = hours + "h "
        + minutes + "m " + seconds + "s ";

        $('input[name=exp]').val(countDownDate);

      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);

</script>

<!-- timer countdown
<script type="text/javascript">
  $("#post").click(function () {
    var oldDate = new Date();
    var hour = oldDate.getHours();
    var countDownDate = oldDate.setHours(hour + 2);
    // Update the count down every 1 second
    var x = setInterval(function () {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = hours + "h "
        + minutes + "m " + seconds + "s ";

        $('input[name=exp]').val(countDownDate);

      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
    // $.ajax({
    //   url: "<?php echo(base_url().'index.php/UserHome/postBooking')?>",
    //   dataType: "json",
    //   data: { "exp": countDownDate },
    //   type: "post"
    // });
  });
</script> -->