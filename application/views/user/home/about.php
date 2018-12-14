<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="contLogin" class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <!-- form card login -->
        <div id="form" class="card rounded-0 well well-lg">
          <h2 class="text-center text-white mb-4">Authentikasi</h2>
          <a href="<?php echo site_url('UserHome/logout')?>" class="btn btn-warning btn-block">Logout</a>
          <label for="date">Date:</label>    
          <!-- <input type="text" name="datetimes" /> -->
          <div class="form-group">
                <div class='input-group date' id='datepicker'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <!-- /form card login -->
      </div>
    </div>
  </div>
</div>
