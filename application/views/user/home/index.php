<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
?> 
<div class="album py-5 bg-light"> 
  <div class="container"> 
  <div class="row"> 
  <?php foreach ($data as $lap) { ?>
        <div class="col-md-4"> 
          <a href="<?php echo site_url('UserHome/lapangan/'.$lap->id_lapangan) ?>"> 
            <div class="card mb-4 box btn btn-sm btn-outline-secondary"> 
              <img class="card-img-top" src="<?php echo base_url('assets/uploads/'.$lap->url) ?>" alt="Card image cap" style="width : 332px; height:170px;"> 
              <div class="card-body"> 
                <h2 class="heading"><?php echo $lap->nama_lapangan?></h2> 
                <p class="card-text" </p> <div class="d-flex justify-content-between align-items-center"> 
              </div> 
            </div> 
        </div> 
        </a> 
      </div> 
  <?php } ?>
</div> 
</div> 
</div>