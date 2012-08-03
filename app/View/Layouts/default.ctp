<?php

$txeDescription = __d('cake_dev', 'TXE3');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $txeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array(
			'nivo/nivo-slider',
			'home',
			'default_theme',
			'cake.generic',
		));
		echo $this->Html->css('/usermgmt/css/umstyle');
		
		echo $this->Html->script(array(
				'home',
				'jquery-1.7.2.min',
				'jquery.nivo.slider.pack',
		));
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
		
		effect:'fold', //Specify sets like: 'random,fold,fade,sliceDown'
		animSpeed:1200, //Slide transition speed
		slices: 50, // For slice animations
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false, //Next & Prev
		directionNavHide:true, //Only show on hover			directionNav:true, //Next & Prev
		controlNav:true, //1,2,3...
		
		});
    });
</script>

</head>
<body>
	<div id="wrapper">
	<div id="topwrapper">
		<div id="logo">
			<?php
			echo $this->Html->link(
			    $this->Html->image("layout/trustXE-logo.png", array("alt" => "TrustXE")),
			    array('controller' => 'pages', 'action' => 'home'),
			    array('escape' => false)
			);
			?>
		</div>
		
		<div id="top_menu">
			<?php   
				if ($this->UserAuth->getGroupName()=='') {
					echo $this->Html->link('REGISTER', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'register'), array('class' => 'register_top'));
					echo $this->Html->link('LOGIN', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'login'), array('class' => 'login_top'));
				} else {
					echo $this->Html->link('User Cabinet',  array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'myprofile'), array('class' => 'register_top'));
					echo $this->Html->link('My Orders',  array('plugin' => '', 'controller' => 'orders', 'action' => 'index'), array('class' => 'register_top'));
					echo $this->Html->link('LOGOUT',  array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'logout'), array('class' => 'login_top'));
				}
			?>
		</div>

		<?php echo $this->element('nav_menu'); ?>
	</div>

	<?php echo $this->element('sliding_banner'); ?>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
</div>
<div id="footer"> 

	<div id="ftrleft">
		<?php $base = $this->webroot; ?>
		<strong>&copy;</strong> 2012 TrustXE.com . Wholly Owned by IK Worldwide Solution . All Rights Reserved. <span style="text-align:right;">Join us on&nbsp;
		<a href="https://www.facebook.com/pages/Trust-XE-Trust-Exchange/415589978472347" target="_blank">
			<img src="<?php echo $base; ?>/img/layout/fb.png" alt="Facebook - TrustXE" width="26" height="26" style="vertical-align:middle">
		</a></span>
	</div>

	<div id="ftrright"><img src="<?php echo $base; ?>/img/layout/spacer.gif" width="1" height="1" alt="Developed by IK GLOBAL BERHAD" /></div>
</div>
	<?php 
		echo $this->element('analytics'); 
		echo $this->Js->writeBuffer();
	?>
</body>
</html>
