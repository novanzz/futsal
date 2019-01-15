<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
  <div class="row" style="margin-left:36%; margin-top:1%;">
    <div class="jumbotron" style="background-color:#C8C8C8;">
      <h2 class="text-center">Booking Lapangan</h2>
      <hr>
      <form action="<?php echo site_url('UserHome/postBooking')?>" method="post">
          <input name="id_lapangan" value="<?php echo $no_lap ?>" hidden>
          <input name="id_user" value="<?php echo $this->session->id_user ?>" hidden>
        <label for="date">Tanggal Booking :</label>
        
        <div class="form-group">
          <div class='input-group date' id='datepicker'>
            <input type='text' class="form-control" name="tanggal" />
            <span class="input-group-addon">
            <span class="fa fa-calendar" style="font-size:30px; margin-left:10px;"></span>
            </span>
          </div>
        </div>

        <div class="form-group status">
								<label for="enableSelect">Jumlah Jam : </label>
								<select id="choice" class="form-control"required>
                  <option>1 Jam</option>
									<option>2 Jam</option>
                  <option>3 Jam</option>
								</select>
							</div>

        

        <div class="form-group">
										<label>Jam Booking 1 : </label>
										<select name="id_jadwal" class="form-control">
										<?php
											$jam_booking = $jam_main;
											$items = array(
                        array("jam"=>"--","value"=>""),
                        array("jam"=>"07.00 - 08.00 WIB","value"=>1),
												array("jam"=>"08.00 - 09.00 WIB","value"=>2),
                        array("jam"=>"09.00 - 10.00 WIB","value"=>3),
                        array("jam"=>"10.00 - 11.00 WIB","value"=>4),
                        array("jam"=>"11.00 - 12.00 WIB","value"=>5),
                        array("jam"=>"12.00 - 13.00 WIB","value"=>6),
                        array("jam"=>"13.00 - 14.00 WIB","value"=>7),
                        array("jam"=>"14.00 - 15.00 WIB","value"=>8),
                        array("jam"=>"15.00 - 16.00 WIB","value"=>9),
                        array("jam"=>"16.00 - 17.00 WIB","value"=>10),
                        array("jam"=>"17.00 - 18.00 WIB","value"=>11),
                        array("jam"=>"18.00 - 19.00 WIB","value"=>12),
                        array("jam"=>"19.00 - 20.00 WIB","value"=>13),
                        array("jam"=>"20.00 - 21.00 WIB","value"=>14),
                        array("jam"=>"21.00 - 22.00 WIB","value"=>15),
                        array("jam"=>"22.00 - 23.00 WIB","value"=>16),
                        array("jam"=>"23.00 - 24.00 WIB","value"=>17),
											);
												foreach ($items as $item ):
													if($item['value'] == $jam_booking){
														echo '<option value="' . $item['value'] . '" selected>' . $item['jam'] . '</option>';
													}else{
														echo '<option value="' . $item['value'] . '">' . $item['jam'] . '</option>';
													}
												endforeach;
											?>
										</select>

									</div>
                  <div class="form-group group1">
										<label>Jam Booking 2 : </label>
										<select name="id_jadwal1" class="form-control ">
										<?php
											$jam_booking = $jam_main;
											$items = array(
                        array("jam"=>"--","value"=>""),
                        array("jam"=>"07.00 - 08.00 WIB","value"=>1),
												array("jam"=>"08.00 - 09.00 WIB","value"=>2),
                        array("jam"=>"09.00 - 10.00 WIB","value"=>3),
                        array("jam"=>"10.00 - 11.00 WIB","value"=>4),
                        array("jam"=>"11.00 - 12.00 WIB","value"=>5),
                        array("jam"=>"12.00 - 13.00 WIB","value"=>6),
                        array("jam"=>"13.00 - 14.00 WIB","value"=>7),
                        array("jam"=>"14.00 - 15.00 WIB","value"=>8),
                        array("jam"=>"15.00 - 16.00 WIB","value"=>9),
                        array("jam"=>"16.00 - 17.00 WIB","value"=>10),
                        array("jam"=>"17.00 - 18.00 WIB","value"=>11),
                        array("jam"=>"18.00 - 19.00 WIB","value"=>12),
                        array("jam"=>"19.00 - 20.00 WIB","value"=>13),
                        array("jam"=>"20.00 - 21.00 WIB","value"=>14),
                        array("jam"=>"21.00 - 22.00 WIB","value"=>15),
                        array("jam"=>"22.00 - 23.00 WIB","value"=>16),
                        array("jam"=>"23.00 - 24.00 WIB","value"=>17),
											);
												foreach ($items as $item ):
													if($item['value'] == $jam_booking){
														echo '<option value="' . $item['value'] . '" selected>' . $item['jam'] . '</option>';
													}else{
														echo '<option value="' . $item['value'] . '">' . $item['jam'] . '</option>';
													}
												endforeach;
											?>
										</select>
									</div>

                  <div class="form-group group2">
										<label>Jam Booking 3 : </label>
										<select name="id_jadwal2" class="form-control ">
										<?php
											$jam_booking = $jam_main;
											$items = array(
                        array("jam"=>"--","value"=>""),
                        array("jam"=>"07.00 - 08.00 WIB","value"=>1),
												array("jam"=>"08.00 - 09.00 WIB","value"=>2),
                        array("jam"=>"09.00 - 10.00 WIB","value"=>3),
                        array("jam"=>"10.00 - 11.00 WIB","value"=>4),
                        array("jam"=>"11.00 - 12.00 WIB","value"=>5),
                        array("jam"=>"12.00 - 13.00 WIB","value"=>6),
                        array("jam"=>"13.00 - 14.00 WIB","value"=>7),
                        array("jam"=>"14.00 - 15.00 WIB","value"=>8),
                        array("jam"=>"15.00 - 16.00 WIB","value"=>9),
                        array("jam"=>"16.00 - 17.00 WIB","value"=>10),
                        array("jam"=>"17.00 - 18.00 WIB","value"=>11),
                        array("jam"=>"18.00 - 19.00 WIB","value"=>12),
                        array("jam"=>"19.00 - 20.00 WIB","value"=>13),
                        array("jam"=>"20.00 - 21.00 WIB","value"=>14),
                        array("jam"=>"21.00 - 22.00 WIB","value"=>15),
                        array("jam"=>"22.00 - 23.00 WIB","value"=>16),
                        array("jam"=>"23.00 - 24.00 WIB","value"=>17),
											);
												foreach ($items as $item ):
													if($item['value'] == $jam_booking){
														echo '<option value="' . $item['value'] . '" selected>' . $item['jam'] . '</option>';
													}else{
														echo '<option value="' . $item['value'] . '">' . $item['jam'] . '</option>';
													}
												endforeach;
											?>
										</select>
									</div>
        <div class='input-group'>
          <input class="form-control" id='exp' name="exp" hidden/>
        </div>
        <h5>Batas Pembayaran</h5>
        <h5 id="demo"></h5>
      
        <button type="submit" class="btn btn-primary btn-block" id="post">Booking</button>
      </form>
     
    </div>
  </div>
</div>

<script> 
$(document).ready(function () { 
    $('.group1').hide(); 
    $('.group2').hide(); 
    $('#choice').change(function () { 
         if($('#choice').val() == '2 Jam') { 
            $('.group1').show(); 
            $('.group2').hide(); 
        } else if ($('#choice').val() == '3 Jam') { 
           $('.group1').show(); 
           $('.group2').show(); 
        } else { 
            $('.group1').hide(); 
            $('.group2').hide(); 
        } 

    }) 
}); 
</script>

<!-- datepicker just 2 weeks -->
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


