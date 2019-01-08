<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>

<head>
    <title>
        <?php echo $title; ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?php echo base_url() ?>assets/css/album.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Datetimepicker -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    
    <style type="text/css" media="screen">
        /*Font with internet*/
        @import url('https://fonts.googleapis.com/css?family=Pacifico');

        #form {
            margin: auto;
            width: 100%;
        }

    </style>
</head>

<Body>
    <!-- Punya Client --> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
    <!-- Datepickr -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/moment.js" /></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/moment.min.js" /></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js" /></script>

  
    <header class="masthead mb-auto">
        <?php $this->load->view('shared/user/header'); ?>
    </header>

    <main>
        <?php $this->load->view($page); ?>
    </main>

    <footer  class="text-muted text-center">
        <?php $this->load->view('shared/user/footer'); ?>
    </footer>

</Body>

</html>