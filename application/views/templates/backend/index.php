<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url(); ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">

    <!-- load CSS from trumbowyg WYSIWYG -->
    <link href="<?php echo base_url(); ?>assets/css/trumbowyg.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo base_url(); ?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
      #editor {
        max-height: 250px;
        height: 250px;
        background-color: white;
        border-collapse: separate; 
        border: 1px solid rgb(204, 204, 204); 
        padding: 4px; 
        box-sizing: content-box; 
        -webkit-box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset; 
        box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset;
        border-top-right-radius: 3px; border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px; border-top-left-radius: 3px;
        overflow: scroll;
        outline: none;
      }

    </style>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">MYFIRSTCMS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#"><?php echo $this->ion_auth->user()->row()->username; ?></a></li>
            <li><a href="<?php echo site_url('auth/logout'); ?>">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            
            <?php

            $posts_active = '';
            $categories_active = '';
            $users_active = '';

            if ($this->uri->segment(1, 0)=='posts') {
                $posts_active = 'active';
            }
            else if ($this->uri->segment(1, 0)=='categories') {
                $categories_active = 'active';
            }
            else if ($this->uri->segment(1, 0)=='auth') {
                $users_active = 'active';
            }

            ?>


            <li class="<?php echo $posts_active; ?>"><a href="<?php echo site_url('posts/index'); ?>">Manage Posts <span class="sr-only">(current)</span></a></li>
            <li class="<?php echo $categories_active; ?>"><a href="<?php echo site_url('categories/index'); ?>">Manage Categories</a></li>

            <li class="<?php echo $users_active; ?>"><a href="<?php echo site_url('auth/index'); ?>">Manage Users</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <?php echo $content; ?>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/vendor/jquery.min.js"><\/script>')</script>
    


    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!-- load JS for trumboyg -->

    <script src="<?php echo base_url(); ?>assets/js/trumbowyg.min.js"></script>

    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<script type="text/javascript">

$('#editor').trumbowyg();

</script>
