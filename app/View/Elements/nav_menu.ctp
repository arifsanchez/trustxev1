<?php $base = $this->webroot;?>
<div id="navi">
	<div id="navi-cm">
		<?php echo $this->Html->link(
			$this->Html->image('layout/txe-menu-home.gif', array('id' => 'Image2', 'name' => 'Image2')), 
			"/pages/home",
			array('escape' => false,'onmouseout' => 'MM_swapImgRestore()',
			'onmouseover' => 'MM_swapImage(\'Image2\', \'\', \'/TrustXE/core/img/layout/txe-menu-homeON.gif\',1)')
		);?>
	</div>
	
	<div id="navi-cm">
		<?php echo $this->Html->link(
			$this->Html->image('layout/txe-menu-buy.gif', array('id' => 'Image3', 'name' => 'Image3')), 
			"/pages/buy_liberty_reserve",
			array('escape' => false,'onmouseout' => 'MM_swapImgRestore()',
			'onmouseover' => 'MM_swapImage(\'Image3\', \'\', \'/TrustXE/core/img/layout/txe-menu-buyON.gif\',1)')
		);?>
	</div>
	
	<div id="navi-cm">
		<?php echo $this->Html->link(
			$this->Html->image('layout/txe-menu-sell.gif', array('id' => 'Image4', 'name' => 'Image4')), 
			"/pages/sell_liberty_reserve",
			array('escape' => false,'onmouseout' => 'MM_swapImgRestore()',
			'onmouseover' => 'MM_swapImage(\'Image4\', \'\', \'/TrustXE/core/img/layout/txe-menu-sellON.gif\',1)')
		);?>
	</div>

	<div id="navi-cm">
		<?php echo $this->Html->link(
			$this->Html->image('layout/txe-menu-about.gif', array('id' => 'Image5', 'name' => 'Image5')), 
			"/pages/about_us",
			array('escape' => false,'onmouseout' => 'MM_swapImgRestore()',
			'onmouseover' => 'MM_swapImage(\'Image5\', \'\', \'/TrustXE/core/img/layout/txe-menu-aboutON.gif\',1)')
		);?>
	</div>
	
	<div id="navi-cm">
		<?php echo $this->Html->link(
			$this->Html->image('layout/txe-menu-contact.gif', array('id' => 'Image6', 'name' => 'Image6')), 
			"/pages/contact_us",
			array('escape' => false,'onmouseout' => 'MM_swapImgRestore()',
			'onmouseover' => 'MM_swapImage(\'Image6\', \'\', \'/TrustXE/core/img/layout/txe-menu-contactON.gif\',1)')
		);?>
	</div>
	
	<div id="navi-cm">
		<?php echo $this->Html->link(
			$this->Html->image('layout/txe-menu-support.gif', array('id' => 'Image7', 'name' => 'Image7')), 
			"/pages/support",
			array('escape' => false,'onmouseout' => 'MM_swapImgRestore()',
			'onmouseover' => 'MM_swapImage(\'Image7\', \'\', \'/TrustXE/core/img/layout/txe-menu-supportON.gif\',1)')
		);?>
	</div>

	<div id="navi-cm"><img src="<?php echo $base; ?>/img/layout/txe-menu-right.jpg" /></div> 

</div>