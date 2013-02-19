<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<meta name="viewport" content="width=device-width">
  	<title><?php echo Configure::read('Application.name') .' | '. Configure::read('Application.slogan');?></title>
  	
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<!--[if lt IE 9]>
	            <link rel="stylesheet" href="font/font-awesome-ie7.css">
	            <script src="js/ambrosia/html5-3.6-respond-1.1.0.min.js"></script>
	<![endif]-->
	<?php 
		echo $this->Html->css('ambrosia/bootstrap.min.css');
		echo $this->Html->css('ambrosia/font-awesome.css');
		echo $this->Html->css('ambrosia/base.css');
		echo $this->Html->css('ambrosia/red.css');
		echo $this->Html->css('custompaihz');
		echo $this->Html->script('lib/modernizr');
			
		echo $this->Html->meta(
		    'keywords',
		    'trustxe, trust xe,E-Currency Exchange Money , ecurrency exchanger, Paypal, Payza, Alertpay, Liberty Reserve,Bank Wire'
		);

		echo $this->Html->meta(
		    'description',
		    'Independent E-Currencies Exchanger, Selling & Buying Liberty Reserve'
		);
	?>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

</head>
<body>
	<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
	<![endif]-->

	<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <i class="icon icon-reorder"></i> Menu
                </a>
                <a class="brand" href="/"><?php echo $this->Html->image('ambrosia/txelogo.png', array('alt' => 'Trust XE Logo', 'width' => '70px'));?></a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li><?php echo $this->Html->link('Home', array('plugin' => '', 'controller' => 'pages' , 'action' => 'home'));?></li>
                        <li><?php echo $this->Html->link('About', array('plugin' => '', 'controller' => 'pages' , 'action' => 'about_us'));?></li>
                        <li><?php echo $this->Html->link('Contact', array('plugin' => '', 'controller' => 'pages' , 'action' => 'contact_us'));?></li>
					</ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        
		<div class="sub-navbar">
			<div class="container">
				<p>
				<?php if ($this->UserAuth->isLogged()) { ?> 
				
				<?php 
					echo $this->Html->link('Dashboard', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard'), array('class' => 'btn-small btn-inverse')).'&nbsp;';		
					echo $this->Html->link('Buy', array('plugin' => '', 'controller' => 'orders', 'action' => 'buy'), array('class' => 'btn-small btn-success')).'&nbsp;';
					echo $this->Html->link('Sell', array('plugin' => '', 'controller' => 'orders', 'action' => 'sell'), array('class' => 'btn-small btn-warning')).'&nbsp;';
					echo $this->Html->link('Transactions', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'history'), array('class' => 'btn-small btn-inverse')).'&nbsp;';
					echo $this->Html->link('Logout', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-login pull-right')).'&nbsp;';
			
				} else { ?>
				
				<i class="icon icon-user"></i> &nbsp;
				<?php
					echo "Hello, Guest&nbsp;";
					echo $this->Html->link('Sign Up Now', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'register'), array('class' => 'btn btn-login')).'&nbsp;';
					echo $this->Html->link('Login', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-login pull-right'));
				} ?>
				</p>
			</div>
		</div>
    </div>
    
    <!-- Start - Slideshow -->
    <?php if($this->request->params['action'] == 'home' || $this->request->params['action'] == 'display'){ ?>
        <?php echo $this->element('home_slider'); ?>
    <?php }?>
    <!-- Start - Slideshow -->

    <!-- Start - Content Section -->
    <div class="main">
    	<div class="container">

      
			

    		
			<?php echo $this->fetch('content'); ?>
			<hr>
			<?php echo $this->Session->flash();?>
			<div class="alert alert-info centered">
				<a href="https://www.facebook.com/pages/Trust-XE-Trust-Exchange/415589978472347"><i class="icon icon-facebook"></i> Friend us on facebook</a>
			</div>
    	</div>
    </div>
	<!-- End - Content Section -->

	<footer>
	    <div class="container">
			<div class="row">
	            <div class="span12">
	    			<p>&copy; Copyright <?php echo Configure::read('Application.name') ?> 2012 - 2013 . Wholly Owned by IK Worldwide Solution . All Rights Reserved.  </p>
	            </div>
			</div>
		</div>
	</footer>
	
	<?php echo $this->element('footer_script'); ?>

	<?php echo $this->Js->writeBuffer();?>
</body>
</html>