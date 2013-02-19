<div class="main">
	<div class="container">
		
		<h2><span>Hello, <?php echo h($user['User']['username']); ?></span></h2>
		
		<?php   if (!empty($user)) { ?>
		<div class="row-fluid">
		    <div class="span3">
				<ul class="thumbnails">
					<li class="span">
						<a class="thumbnail">
							<img alt="<?php echo h($user['User']['first_name'].' '.$user['User']['last_name']); ?>" src="<?php echo $this->Image->resize('img/'.IMG_DIR, $user['UserDetail']['photo'], 260, null, true) ?>">
						</a>
						<h4><?php echo h($user['User']['first_name'].' '.$user['User']['last_name'])?></h4>
						<p>Member Since <?php echo date('d-M-Y',strtotime($user['User']['created']))?></p>
					</li>
				</ul>
			</div>
		    <div class="span5 well">
				<h3>Account Details<span class="pull-right"><a class="btn-mini btn-info" href="/editProfile"><i class="icon-edit"></i> Edit Profile</a></span></h3>				<table cellspacing="0" cellpadding="0" width="100%" border="0">
					<tbody>
						<!--tr>
							<td><strong><?php echo __('Group(s)');?></strong></td>
							<td><?php echo h($user['UserGroup']['name'])?></td>
						</tr-->
						<tr>
							<td><strong><?php echo __('Username');?></strong></td>
							<td><?php echo h($user['User']['username'])?></td>
						</tr>
						<tr>
							<td><strong><?php echo __('Email');?></strong></td>
							<td><?php echo h($user['User']['email'])?></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<?php
									$emver = $user['User']['email_verified'];
									if ($emver == 1){ echo '<span class="label label-success">Email Verified</span>';}
									else{ echo '<span class="label label-warning">Email Not Verified</span>';}
								?>
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Mobile Phone');?></strong></td>
							<td><?php 
								$mobilnum = $user['UserDetail']['cellphone'];
								if(!empty($mobilnum)){
									echo h($mobilnum);	
								} else {
									echo "No number registered!";
								}
								
							?></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<?php
									$mver = $user['User']['mobile_verified'];
									if ($mver == 1){ echo '<span class="label label-success">Mobile Verified</span>';}
									else{ echo '<span class="label label-warning">Mobile Not Verified</span>';}
								?>
							</td>
						</tr>
					</tbody>
				</table>
				
				<h3>Profile Details</h3>
				<table cellspacing="0" cellpadding="0" width="100%" border="0"
					<tbody>
						<tr>
							<td><strong><?php echo __('Gender');?></strong></td>
							<td><?php echo h(ucwords($user['UserDetail']['gender']))?></td>
						</tr>
						<tr>
							<td><strong><?php echo __('Marital Status');?></strong></td>
							<td><?php echo h(ucwords($user['UserDetail']['marital_status']))?></td>
						</tr>
						<tr>
							<td><strong><?php echo __('Birthday');?></strong></td>
							<td><?php if(!empty($user['UserDetail']['bday'])) { echo date('d-M-Y',strtotime($user['UserDetail']['bday'])); } ?></td>
						</tr>
						
						<tr>
							<td><strong><?php echo __('Account Status');?></strong></td>
							<td><?php
									if ($user['User']['active']) {
										echo __('Active');
									} else {
										echo __('Inactive');
									}
								?>
							</td>
						</tr>
		
					</tbody>
				</table>
			</div>
			
			<?php if($user['User']['user_group_id'] == '1'){ ?>
			<div class="span4">
				<div class="well">
					<?php echo $this->element('dashboard'); ?>
				</div>
			</div>
			<?php } else { ?>
			<div class="span4">
				<div class="well">
					<h4>Resent Transactions</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rhoncus sagittis eleifend. Pellentesque augue nisl, venenatis sagittis ultricies quis, ultrices vitae lectus.</p>
				</div>
				
				<div class="well">
					<h4>TrustXE News</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rhoncus sagittis eleifend. Pellentesque augue nisl, venenatis sagittis ultricies quis, ultrices vitae lectus.</p>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php } ;?>
	</div>
</div>