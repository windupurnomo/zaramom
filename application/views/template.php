<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
	<title><?php echo $title;?></title>
		<link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>asset/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>asset/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>asset/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />    
    <style>
    body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
    }
    </style>
    
		<script src="<?php echo base_url();?>asset/js/jquery.js"></script>
		<script src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
		<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>asset/js/bootstrap-tooltip.js"></script>
		<script src="<?php echo base_url();?>asset/js/bootstrap-popover.js"></script>
		<script src="<?php echo base_url();?>asset/js/zaramom.js"></script>
		
<!--		<script src="http://code.jquery.com/jquery-latest.js"></script>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
    
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <a class="brand" href="#">zaramom.com</a>
    <div class="nav-collapse collapse">
        <ul class="nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <?php
                if($this->auth->is_logged_in() == true):
                $level = $this->session->userdata('level');
                $menu = $this->usermodel->get_menu_for_level($level);
								
                foreach ($menu->result() as $row){
                    echo '<li>'.anchor($row->menu_uri, $row->menu_nama).'</li>';
                }
            ?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Contact <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="#">Action</a></li>
                    <li><a tabindex="-1" href="#">Another action</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="icon-user icon-white"></i>&nbsp;
                    <?php echo $this->session->userdata('nama'); ?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="#"><i class="icon-edit"></i>&nbsp;View Provile</a></li>
                    <li><a tabindex="-1" href="#"><i class="icon-edit"></i>&nbsp;Change Password</a></li>
                    <li>
                        <?php 
                            $x = array('title' => 'Logout..');
                            echo anchor('home/logout', '<i class="icon-off"></i>&nbsp;Logout', $x); 
                        ?>
                    </li>
                </ul>
            </li>
        </ul>    
				<?php endif; ?>
			</div><!--/.nav-collapse -->
    </div>
</div>
</div>

<div class="container">
    <?php echo $contents ?>
    <div class="clear"></div>
</div>
</body>
</html>