<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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
                <a class="nav-link" href="<?php echo site_url('AdminHome/verifikasi') ?>">
                  <span data-feather="check"></span>
                  Verifikasi Booking
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