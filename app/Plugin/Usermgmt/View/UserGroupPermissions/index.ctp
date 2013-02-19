<?php echo $this->Html->script(array('/usermgmt/js/umupdate.js?q='.QRDN));?>

<h2><span>Controller &amp; Action Permissions</span></h2>

<div class="row-fluid">
	<div class="span3 alert">
		<?php echo $this->element('dashboard'); ?>
	</div>

	<div class="span9" id="permissions">

		<div class="row-fluid">
			<div class="span12 well">
				<div class="form-inline">
					<label>Select Controllers</label>
					<?php echo $this->Form->input("controller",array('type'=>'select','div'=>false,'options'=>$allControllers,'selected'=>$c,'label'=>false,"onchange"=>"window.location='".SITE_URL."permissions/?c='+(this).value"))?>
				</div>
			</div>
		</div>
		<?php if (!empty($controllers)) { ?>
			<input type="hidden" id="BASE_URL" value="<?php echo SITE_URL?>">
			<input type="hidden" id="groups" value="<?php echo $groups?>">
			<table cellspacing="0" cellpadding="0" width="100%" border="0" class="umtable colored">
				<thead>
					<tr>
						<th> <?php echo __("Controller");?> </th>
						<th> <?php echo __("Action");?> </th>
						<th> <?php echo __("Permission");?> </th>
						<th> <?php echo __("Operation");?> </th>
					</tr>
				</thead>
				<tbody>
		<?php
				$k=1;
				foreach ($controllers as $key=>$value) {
					if (!empty($value)) {
						for ($i=0; $i<count($value); $i++) {
							if (isset($value[$i])) {
								$action=$value[$i];
								echo $this->Form->create();
								echo $this->Form->hidden('controller',array('id'=>'controller'.$k,'value'=>$key));
								echo $this->Form->hidden('action',array('id'=>'action'.$k,'value'=>$action));
								echo "<tr>";
								echo "<td>".$key."</td>";
								echo "<td>".$action."</td>";
								echo "<td>";
								foreach ($user_groups as $user_group) {
									$ugname=$user_group['name'];
									$ugname_alias=$user_group['alias_name'];
									if (isset($value[$action][$ugname_alias]) && $value[$action][$ugname_alias]==1) {
										$checked=true;
									} else {
										$checked=false;
									}
									echo $this->Form->input($ugname,array('id'=>$ugname_alias.$k,'type'=>'checkbox','checked'=>$checked));
								}
								echo "</td>";
								echo "<td>";
								echo $this->Form->button('Update', array('type'=>'button','id'=>'mybutton123','name'=>$k,'onClick'=>'javascript:update_fields('.$k.');', 'class'=>'umbtn'));
								echo "<div id='updateDiv".$k."' align='right' class='updateDiv'>&nbsp;</div>";
								echo "</td>";
								echo "</tr>";
								echo $this->Form->end();
								$k++;
							}
						}
					}
				} ?>
				</tbody>
			</table>
		<?php   }   ?>
	</div>
</div>

<?php #echo $this->Html->script(array('/usermgmt/js/umupdate.js?q='.QRDN));?>
<!--div class="umtop">
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<div class="umstyle1"  align="left" style="float:left"><?php echo __('User Group Permissions');?></div>
				<div style="float:right">
					<span  class="umstyle2"><?php __('Select Controller');?></span>  <?php echo $this->Form->input("controller",array('type'=>'select','div'=>false,'options'=>$allControllers,'selected'=>$c,'label'=>false,"onchange"=>"window.location='".SITE_URL."permissions/?c='+(this).value"))?>
				</div>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid" id="permissions">
		<?php   if (!empty($controllers)) { ?>
					<input type="hidden" id="BASE_URL" value="<?php echo SITE_URL?>">
					<input type="hidden" id="groups" value="<?php echo $groups?>">
					<table cellspacing="0" cellpadding="0" width="100%" border="0" class="umtable colored">
						<thead>
							<tr>
								<th> <?php echo __("Controller");?> </th>
								<th> <?php echo __("Action");?> </th>
								<th> <?php echo __("Permission");?> </th>
								<th> <?php echo __("Operation");?> </th>
							</tr>
						</thead>
						<tbody>
			<?php
					$k=1;
					foreach ($controllers as $key=>$value) {
						if (!empty($value)) {
							for ($i=0; $i<count($value); $i++) {
								if (isset($value[$i])) {
									$action=$value[$i];
									echo $this->Form->create();
									echo $this->Form->hidden('controller',array('id'=>'controller'.$k,'value'=>$key));
									echo $this->Form->hidden('action',array('id'=>'action'.$k,'value'=>$action));
									echo "<tr>";
									echo "<td>".$key."</td>";
									echo "<td>".$action."</td>";
									echo "<td>";
									foreach ($user_groups as $user_group) {
										$ugname=$user_group['name'];
										$ugname_alias=$user_group['alias_name'];
										if (isset($value[$action][$ugname_alias]) && $value[$action][$ugname_alias]==1) {
											$checked=true;
										} else {
											$checked=false;
										}
										echo $this->Form->input($ugname,array('id'=>$ugname_alias.$k,'type'=>'checkbox','checked'=>$checked));
									}
									echo "</td>";
									echo "<td>";
									echo $this->Form->button('Update', array('type'=>'button','id'=>'mybutton123','name'=>$k,'onClick'=>'javascript:update_fields('.$k.');', 'class'=>'umbtn'));
									echo "<div id='updateDiv".$k."' align='right' class='updateDiv'>&nbsp;</div>";
									echo "</td>";
									echo "</tr>";
									echo $this->Form->end();
									$k++;
								}
							}
						}
					} ?>
					</tbody>
				</table>
		<?php   }   ?>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div-->