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
<?php echo $this->Html->css('normalize.css') ?>
<?php echo $this->Html->css('bootstrap-united.min', null, array('data-extra' => 'theme')) ?>
<?php echo $this->Html->css('bootstrap-responsive.min') ?>
<?php echo $this->Html->css('style') ?>

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

<div class="navbar navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
<?php echo $this->Html->link(Configure::read('Application.name') ,"/",array('class' => 'brand')) ?>
<div class="nav-collapse">

<ul class="nav">

<?php if ($this->UserAuth->isLogged()) { ?>
	<li class="<?php echo $this->params->controller == 'users' && $this->action == 'home' ? 'active' : ''; ?>">
		<?php echo $this->Html->link('Dashboard',array('plugin' => 'usermgmt','controller' => 'users','action' => 'dashboard')) ?>
	</li>
	<li class="<?php echo $this->params->controller == 'users' && $this->action == 'home' ? 'active' : ''; ?>">
		<?php echo $this->Html->link('Buy',array('controller' => 'orders','action' => 'buy')) ?>
	</li>
	<li class="<?php echo $this->params->controller == 'users' && $this->action == 'home' ? 'active' : ''; ?>">
		<?php echo $this->Html->link('Sell',array('controller' => 'orders','action' => 'sell')) ?>
	</li>
<?php } else { ?>
	<li class="<?php echo $this->params->controller == 'users' && $this->action == 'home' ? 'active' : ''; ?>">
		<?php echo $this->Html->link('Home',array('controller' => 'pages','action' => 'home')) ?>
	</li>
	<li class="<?php echo $this->action == 'register' ? 'active' : ''; ?>">
		<?php echo $this->Html->link(__('Register'),array('controller' => 'users','action' => 'register')) ?>
	</li>
<?php }?>
</ul>

<?php if ($this->UserAuth->isLogged()) { ?>
<ul class="nav pull-right">
	<li id="fat-menu" class="dropdown">
		<a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
		<i class="icon-black icon-briefcase"></i>
		<?php echo __('Hello').' '.h($var['User']['username']); ?> <b class="caret"></b></a>
		
		<ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
			<li class="">
			<?php echo $this->Html->link(
				'<i class="icon-black icon-user"></i> My Account','/dashboard',
				array(
				  'tabindex' => '-1',
				  'escape' => false
				  )
			) ?>
			</li>
			<li>
			<?php echo $this->Html->link(
				'<i class="icon-black icon-list-alt"></i> My Orders','/history',
				array(
				  'tabindex' => '-1',
				  'escape' => false
				  )
			) ?>
			</li>
			<li>
			<?php echo $this->Html->link(
				'<i class="icon-black icon-plus-sign"></i> My eCurrency','/myec',
				array(
				  'tabindex' => '-1',
				  'escape' => false
				  )
			) ?>
			</li>
			<li>
			<?php echo $this->Html->link(
				'<i class="icon-black icon-off"></i> Logout','/users/logout',
				array(
				  'tabindex' => '-1',
				  'escape' => false
				  )
			) ?>
			</li>
		</ul>
	</li>
</ul>
<?php } else { ?>
<ul class="nav pull-right">
	<li id="fat-menu" class="dropdown">
		<a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
		<i class="icon-black icon-user"></i>
		<?php echo $this->Html->link(
				'<i class="icon-black icon-off"></i> Login','/users/login',
				array(
				  'tabindex' => '-1',
				  'escape' => false
				  )
			) ?>
	</li>
</ul>
<?php } ?>
</div><!--/.nav-collapse -->
</div>
</div>
</div>

<div class="container" role="main" id="main">

<?php echo $this->Session->flash();?>
<?php echo $this->fetch('content'); ?>

<hr>

<footer>
<p>&copy; Copyright <?php echo Configure::read('Application.name') ?> 2012 - 2013 . Wholly Owned by IK Worldwide Solution . All Rights Reserved. <span class="pull-right">Join us on&nbsp;
		<a href="https://www.facebook.com/pages/Trust-XE-Trust-Exchange/415589978472347" target="_blank">
			<img src="/img/layout/fb.png" alt="Facebook - TrustXE" style="vertical-align:middle" height="26" width="26"></p>
</footer>

</div> <!-- /container -->

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

<!-- Google Analytics -->
<script type="text/javascript">

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

<!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
f[z]=function(){
(a.s=a.s||[]).push(arguments)};var a=f[z]._={
},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
0:+new Date};a.P=function(u){
a.p[u]=new Date-a.p[0]};function s(){
a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
b.contentWindow[g].open()}catch(w){
c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('6475-491-10-1860');/*]]>*/</script><noscript><a href="https://www.olark.com/site/6475-491-10-1860/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<!-- end olark code -->

<script type="text/javascript"> olark('api.chat.updateVisitorNickname', {
snippet: "<?php echo $var['User']['username']; ?>"
});
</script> 

</body>
</html>