<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $pageTitle; ?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-responsive.min.css')?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/fullcalendar.css')?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/matrix-style.css')?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/matrix-media.css')?>" />
<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet" />

<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css')?>" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url('assets/css/uniform.css')?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.css') ?>" />
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/jquery.flot.min.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/js/excanvas.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/jquery.ui.custom.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/jquery.flot.resize.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/jquery.peity.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/fullcalendar.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/matrix.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/matrix.dashboard.js') ?>"></script> 
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.gritter.css')?>" />
<script src="<?php echo base_url('assets/js/jquery.gritter.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/matrix.chat.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/jquery.validate.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/matrix.form_validation.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/jquery.wizard.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/jquery.uniform.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/select2.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/matrix.popover.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/matrix.tables.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/matrix.interface.js') ?>"></script> 

<script src="<?php echo base_url('assets/js/custom.js') ?>"></script> 
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.3.5/bootstrap-select.css" integrity="sha512-RogdJOWDXUlfkfXryfVGdfxc601I2eJBLv1lFmsd1qTn8OZw2hew6mq0vaSjlskQMBhMjlvTXNZRPz2tsTgRNg==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.3.5/bootstrap-select.min.css" integrity="sha512-IGZX5ne1NRSe8kgljbN/Inbbh1qdHCp+qmF9U0IY5Qn4InW4nxhkCU+Ogexjv8UpcBGdGE39zJMNgONh9kbjMQ==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.3.5/bootstrap-select.js" integrity="sha512-zpJ8xLR5MvgEZSIucMhNi66KRqd2oIbkCdPG/AqoHnCYvauqHHbyawBJEuv6T8ASsH+T5XFQ2FdyBTOoFTvGmQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.3.5/bootstrap-select.min.js" integrity="sha512-l/kVwG/ygbXDl0Vkn778QH7eqYlU2HdBlFZSxsWTPSynRXy74XfnIWGBULujVZlUljOrHSAHBVjzlacGb+4AcQ==" crossorigin="anonymous"></script>
<!-- <script src="<?php echo base_url('assets/js/richeditor/ckeditor.js') ?>"></script> -->
</head>

<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <!-- <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li> -->
    <li class=""><a title="" href="<?php echo base_url(); ?>/admin/login/logoutadmin"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!-- <div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->