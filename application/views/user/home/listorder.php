<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>MfC futsal</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?php echo site_url('AdminHome/index') ?>">MFC Futsal</a>

      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="<?php echo site_url('AdminHome/logout') ?>">Sign out</a>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo site_url('AdminHome/index') ?>">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                </a>
              </li>
            </li>
            <li class="nav-item dropdown">
            <?php $lap1 = 1; ?>
            <?php $lap2 = 2; ?>
            <?php $lap3 = 3; ?>
            <?php $lap4 = 4; ?>
            <?php $lap5 = 5; ?>
            <?php $lap6 = 6; ?>
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">  <span data-feather="list"></span>List Order</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo site_url('AdminHome/listorder/'.$lap1) ?>">Lapangan 1</a>
              <a class="dropdown-item" href="<?php echo site_url('AdminHome/listorder/'.$lap2) ?>">Lapangan 2</a>
              <a class="dropdown-item" href="<?php echo site_url('AdminHome/listorder/'.$lap3) ?>">Lapangan 3</a>
              <a class="dropdown-item" href="<?php echo site_url('AdminHome/listorder/'.$lap4) ?>">Lapangan 4</a>
              <a class="dropdown-item" href="<?php echo site_url('AdminHome/listorder/'.$lap5) ?>">Lapangan 5</a>
              <a class="dropdown-item" href="<?php echo site_url('AdminHome/listorder/'.$lap6) ?>">Lapangan 6</a>
          </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('AdminHome/listorder') ?>">
                  <span data-feather="list"></span>
                  List Orders
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('admin/grafic') ?>">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('admin/sop') ?>">
                  <span data-feather="layers"></span>
                  update SOP
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h2>List Order Lapangan <?php echo $lapangan_book ?></h2>
          <form action="<?php echo site_url('AdminHome/listorder/'.$no_lap)?>" method="post">
          <div class="form-group float-left" style="margin-top:20px;">
            <div class='input-group date' id='datepicker'>
              <input type='text' class="form-control" name="tanggal" />
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
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
                    <!-- <?php echo $hasil= $book->id_jadwal; ?>
                    <?php echo '<script>console.log('.json_encode($hasil).')</script>'; ?> -->
                    <?php if ($BookingLap->id_jadwal == $book->id_jadwal): ?>
                      <?php if ($BookingLap->status_booking == 0): ?>
                      <?php echo $BookingLap->tanggal_booking; ?>
                    <?php elseif ($BookingLap->status_booking == 1): ?>
                      <?php echo $BookingLap->tanggal_booking; ?>
                      <?php else: ?>
                        <p>Free</p>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php }?>
                  </td>
                  <td>
                    <?php foreach($Booking as $BookingLap){ ?>
                    <!-- <?php echo $hasil= $book->id_jadwal; ?>
                    <?php echo '<script>console.log('.json_encode($hasil).')</script>'; ?> -->
                    <?php if ($BookingLap->id_jadwal == $book->id_jadwal):?>
                      <?php if ($BookingLap->status_booking == 0): ?>
                        <?php echo $BookingLap->nama_tim ?>
                    <?php elseif ($BookingLap->status_booking == 1): ?>
                      <?php echo $BookingLap->nama_tim ?>
                      <?php else: ?>
                        <p>Free</p>
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
                      <p style="color:#008000">Booked</p>
                      <?php else: ?>
                        <p>Free</p>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php }?>
                  </td>
                </tr>
                <?php $nomor = $nomor + 1; ?>
                <?php }?>


              </tbody>
                <!-- <tr>
                  <td>1</td>
                  <td>19:00-20:00</td>
                  <td>selasa</td>
                  <td>27-09-2014</td>
                  <td>harry</td>
                  <td>Fc Kupa</td>
                  <td></td>
                  <td><a href="<?php echo site_url('admin/detail'); ?>" title="Detail" class="btn btn-sm"><span data-feather="minus-square" aria-hidden="true"></span></a></td>
                  <td><a href="edit.php" title="Update" class="btn btn-sm"><span data-feather="repeat" aria-hidden="true"></span></a></td>
                  <td><a href="" title="Print" class="btn btn-sm"><span data-feather="printer" aria-hidden="true"></span></a></td>
                </tr> -->
            </table>
          </div>
        </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/moment.js" /></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/moment.min.js" /></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js" /></script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

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
