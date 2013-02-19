<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo Configure::read('Application.name') .' | '. Configure::read('Application.slogan');?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<style>
body {
padding-top: 60px;
padding-bottom: 40px;
}
</style>
<!--[if lt IE 9]>
            <link rel="stylesheet" href="font/font-awesome-ie7.css">
            <script src="js/ambrosia/html5-3.6-respond-1.1.0.min.js"></script>
<![endif]-->
<?php echo $this->Html->css('ambrosia/bootstrap.min.css') ?>
<?php echo $this->Html->css('ambrosia/font-awesome.css') ?>
<?php echo $this->Html->css('ambrosia/base.css') ?>
<?php echo $this->Html->css('ambrosia/red.css') ?>

<?php echo $this->Html->css('custompaihz') ?>

<?php
  if (is_file(WWW_ROOT . 'css' . DS . $this->params->controller . '.css')) {
  echo $this->Html->css($this->params->controller);
  }
  if (is_file(WWW_ROOT . 'css' . DS . $this->params->controller . DS . $this->params->action . '.css')) {
  echo $this->Html->css($this->params->controller . '/' . $this->params->action);
  }
  ?>


<?php echo $this->Html->script('lib/modernizr') ?>
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
				<div class="container"><p>
				<?php if ($this->UserAuth->isLogged()) { ?> 
					<i class="icon icon-user"></i> &nbsp;<?php echo __('Hello, ').' '.h($var['User']['username']); ?> 
					<?php echo $this->Html->link('Logout', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-login pull-right')); ?>
				
					<?php } else { ?>
					
					<i class="icon icon-user"></i> &nbsp;<?php echo "Hello, Guest"; ?> 
					<?php echo $this->Html->link('Login', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-login pull-right')); ?>
					<?php } ?>
					
					</p>
					
					
				</div>
			</div>
        </div> 
		<!--Slideshow starts-->
		<div class="showcase">
        	<div class="container">
        		<div class="row">
        			<div class="span8 offset2">
                        <div id="myCarousel" class="carousel slide">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="active item"><?php echo $this->Html->image('ambrosia/assets/app-1.png', array('alt' => 'eCurrency Exchanger'));?></div>
                                <div class="item"><?php echo $this->Html->image('ambrosia/assets/app-2.png', array('alt' => 'Accept Wire Transfer'));?></div>
                            </div>
                            <!-- Carousel nav -->
                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                            <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                        </div>
                        <h1>Your #1 eCurrency Exchanger</h1>
        				<p><?php echo Configure::read('Application.slogan');?></p>
        			</div>
        		</div>
        	</div>
        </div>
		<!--Slideshow end-->

<div class="container" role="main" id="main">

<?php echo $this->Session->flash();?>
<?php echo $this->fetch('content'); ?>

<hr>



</div> <!-- /container -->
 <footer>
            <div class="container">
        		<div class="row">
                    <div class="span12">
            			<p>Copyright &copy; 2012 <?php echo Configure::read('Application.name') ?> All rights reserved.</p>
                    </div>
        		</div>
        	</div>
        </footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery.min.js"><\/script>')</script>

<?php
                  if (is_file(WWW_ROOT . 'js' . DS . $this->params->controller . '.js')) {
                  echo $this->Html->script($this->params->controller);
                  }
                  if (is_file(WWW_ROOT . 'js' . DS . $this->params->controller . DS . $this->params->action . '.js')) {
                  echo $this->Html->script($this->params->controller . '/' . $this->params->action);
                  }
                  ?>

<?php echo $this->Html->script(
                    array(
                      'lib/bootstrap.min',
                      'src/scripts.js'
                      ));
                      ?>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
 var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32954967-2']);
  _gaq.push(['_setDomainName', 'trustxe.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>