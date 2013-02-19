
<?php echo $this->Search->searchForm('User', array('legend' => 'Search', "updateDivId" => "updateUserIndex")); ?>
<?php echo $this->element('paginator', array("useAjax" => true, "updateDivId" => "updateUserIndex")); ?>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th><?php echo __('SL');?></th>
				<th><?php echo $this->Paginator->sort('User.id', __('User Id')); ?></th>
				<th><?php echo $this->Paginator->sort('User.first_name', __('Name')); ?></th>
				<th><?php echo $this->Paginator->sort('User.username', __('Username')); ?></th>
				<th><?php echo $this->Paginator->sort('User.email', __('Email')); ?></th>
				<th><?php echo __('Groups(s)');?></th>
				<th><?php echo $this->Paginator->sort('User.email_verified', __('Email Verified')); ?></th>
				<th><?php echo $this->Paginator->sort('User.active', __('Status')); ?></th>
				<th><?php echo $this->Paginator->sort('User.created', __('Created')); ?></th>
				<th style="width:150px;"><?php echo __('Action');?></th>
			</tr>
		</thead>
		<tbody>
<?php       if (!empty($users)) {
				$page = $this->request->params['paging']['User']['page'];
				$limit = $this->request->params['paging']['User']['limit'];
				$i=($page-1) * $limit;
				foreach ($users as $row) {
					$i++;
					echo "<tr id='rowId".$row['User']['id']."'>";
					echo "<td>".$i."</td>";
					echo "<td>".$row['User']['id']."</td>";
					echo "<td>".h($row['User']['first_name'])." ".h($row['User']['last_name'])."</td>";
					echo "<td>".h($row['User']['username'])."</td>";
					echo "<td>".h($row['User']['email'])."</td>";
					echo "<td>".h($row['UserGroup']['name'])."</td>";
					echo "<td id='emailVerified".$row['User']['id']."'>";
					if ($row['User']['email_verified']==1) {
						echo __('Yes');
					} else {
						echo __('No');
					}
					echo"</td>";
					echo "<td id='activeInactive".$row['User']['id']."'>";
					if ($row['User']['active']==1) {
						echo __('Active');
					} else {
						echo __('Inactive');
					}
					echo"</td>";
					echo "<td>".date('d-M-Y',strtotime($row['User']['created']))."</td>";
					echo "<td class='action'>";
						echo "<a href='".$this->Html->url('/viewUser/'.$row['User']['id'].'/page:'.$page)."'><img src='".SITE_URL."usermgmt/img/view.png' border='0' alt='".__('View')."' title='".__('View')."'></a>";
						echo "<a href='".$this->Html->url('/editUser/'.$row['User']['id'].'/page:'.$page)."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='".__('Edit')."' title='".__('Edit')."'></a>";
						echo "<a href='".$this->Html->url('/changeUserPassword/'.$row['User']['id'].'/page:'.$page)."'><img src='".SITE_URL."usermgmt/img/password.png' border='0' alt='".__('Change Password')."' title='".__('Change Password')."'></a>";
						if ($row['User']['id']!=1 && $row['User']['username']!='Admin') {
							echo "<div style='display:inline' id='makeActiveInactiveId".$row['User']['id']."'>";
							if ($row['User']['active']==0) {
								echo $this->Js->link($this->Html->image(SITE_URL.'usermgmt/img/dis-approve.png', array("alt" => __('Make Active'), "title" => __('Make Active'))), array('action' => 'makeActiveInactive', $row['User']['id'], 1), array('update' => '#makeActiveInactiveId'.$row['User']['id'], 'escape' => false, 'confirm' => __('Are you sure you want to make this user active?')));
							} else {
								echo $this->Js->link($this->Html->image(SITE_URL.'usermgmt/img/approve.png', array("alt" => __('Make Inactive'), "title" => __('Make Inactive'))), array('action' => 'makeActiveInactive', $row['User']['id'], 0), array('update' => '#makeActiveInactiveId'.$row['User']['id'], 'escape' => false, 'confirm' => __('Are you sure you want to make this user inactive?')));
							}
							echo "</div>";
						}
						if ($row['User']['id']!=1 && $row['User']['username']!='Admin') {
							if ($row['User']['email_verified']==0) {
								echo "<div style='display:inline' id='doEmailVerifyId".$row['User']['id']."'>";
								echo $this->Js->link($this->Html->image(SITE_URL.'usermgmt/img/email-verify.png', array("alt" => __('Verify Email'), "title" => __('Verify Email'))), array('action' => 'verifyEmail', $row['User']['id']), array('update' => '#doEmailVerifyId'.$row['User']['id'], 'escape' => false, 'confirm' => __('Are you sure you want to verify email of this user?')));
								echo "</div>";
							}
						}
						if ($row['User']['id']!=1 && $row['User']['username']!='Admin') {
							echo "<div style='display:inline' id='doDeleteId".$row['User']['id']."'>";
							echo $this->Js->link($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deleteUser', $row['User']['id']), array('update' => '#doDeleteId'.$row['User']['id'], 'escape' => false, 'confirm' => __('Are you sure you want to delete this user?')));
							echo "</div>";
						}
						echo "<a href='".$this->Html->url('/viewUserPermissions/'.$row['User']['id'].'/page:'.$page)."'><img src='".SITE_URL."usermgmt/img/view-permission.png' border='0' alt='".__('View Permissions')."' title='".__('View Permissions')."'></a>";
						echo "<a href='".$this->Html->url('/sendMails/'.$row['User']['id'])."'><img src='".SITE_URL."usermgmt/img/send_mail.png' border='0' alt='".__('Send Mail')."' title='".__('Send Mail')."'></a>";
					echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan=10><br/><br/>".__('No Data')."</td></tr>";
			} ?>
		</tbody>
	</table>

<?php if(!empty($users)) { echo $this->element('pagination', array("totolText" => __('Number of Users'))); } ?>