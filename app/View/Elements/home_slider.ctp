<div class="showcase">
	<div class="container">
		<div class="row">
			<div class="span8 offset2">
                <div id="myCarousel" class="carousel slide"> 
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item"><?php echo $this->Html->image('ambrosia/slider/sliderfront1.png', array('alt' => 'offering the best'));?></div>
                        <div class="item"><?php echo $this->Html->image('ambrosia/slider/sliderfront2.png', array('alt' => 'Fast trustworthy'));?></div>
						<div class="item"><?php echo $this->Html->image('ambrosia/slider/sliderfront3.png', array('alt' => 'buyong & selling lr'));?></div>
						<div class="item"><?php echo $this->Html->image('ambrosia/slider/sliderfront4.png', array('alt' => 'official e-currency exchanger'));?></div>
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>
                <h1>Your #1 eCurrency Exchanger <p style="font-size:20px;font-weight:normal;text-transform:lowercase;"><?php echo Configure::read('Application.slogan');?></p></h1>
				<!--p><?php echo Configure::read('Application.slogan');?></p-->
			</div>
		</div>
	</div>
</div>
<div class="strip">
	<div class="container">
		<div class="row">
			<p>Exchanged more than $ 3,450 000.00 since 2005<?php echo $this->Html->link('SIGN UP NOW', array('plugin' => 'usermgmt', 'controller' => 'users' , 'action' => 'register'), array('class' =>'btn btn-primary'));?> <i class="icon icon-circle-arrow-right"></i></p>
		</div>
	</div>
</div> 

<!-- last update this image 12:12pm 25/1/13 -->