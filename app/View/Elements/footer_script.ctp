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
    )
);?>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

<!-- LIveChatINC -->
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

<script type="text/javascript">
var __lc = {};
__lc.license = 1656311;

(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
