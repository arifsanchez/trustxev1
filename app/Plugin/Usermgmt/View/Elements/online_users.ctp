
<?php echo $this->Search->searchForm('User', array('legend' => 'Search', "updateDivId" => "updateOnlineIndex")); ?>
<?php echo $this->element('paginator', array("useAjax" => true, "updateDivId" => "updateOnlineIndex")); ?>
<div class="tableContainer">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th><?php echo __('SL');?></th>
				<th><?php echo __('Name');?></th>
				<th><?php echo __('Email');?></th>
				<th><?php echo __('Last URL');?></th>
				<th><?php echo __('Browser');?></th>
				<th><?php echo __('Ip Address');?></th>
				<th><?php echo __('Last Action');?></th>
				<th style="width:55px;"><?php echo __('Action');?></th>
			</tr>
		</thead>
		<tbody>
<?php       if (!empty($users)) {
				$page = $this->request->params['paging']['UserActivity']['page'];
				$limit = $this->request->params['paging']['UserActivity']['limit'];
				$i=($page-1) * $limit;
				foreach ($users as $row) {
					$i++;
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>";
					echo ($row['UserActivity']['user_id'] ==null) ? 'Guest' : (h($row['User']['first_name'])." ".h($row['User']['last_name']));
					echo "</td>";
					echo "<td>".h($row['User']['email'])."</td>";
					echo "<td>".h($row['UserActivity']['last_url'])."</td>";
					echo "<td>".h($row['UserActivity']['user_browser'])."</td>";
					echo "<td>".h($row['UserActivity']['ip_address'])."</td>";
					echo "<td>".distanceOfTimeInWords(strtotime($row['UserActivity']['modified']))."</td>";
					echo "<td>";
					if (!empty($row['UserActivity']['user_id']) && $row['UserActivity']['user_id']!=1) {
						echo "<span class='icon'>".$this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/signout.jpg', array("alt" => __('Sign Out'), "title" => __('Sign Out'))), array('action' => 'logoutUser', $row['UserActivity']['user_id']), array('escape' => false, 'confirm' => __('Are you sure you want to sign out this user?')))."</span>";
						echo "<span class='icon'>".$this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/dis-approve.png', array("alt" => __('Make Inactive'), "title" => __('Make Inactive'))), array('action' => 'makeInactive', $row['UserActivity']['user_id']), array('escape' => false, 'confirm' => __('This user will signout and will not be able to login again')))."</span>";
					}
					echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan=8><br/><br/>".__('No Data')."</td></tr>";
			} ?>
		</tbody>
	</table>
</div>
<?php if(!empty($users)) { echo $this->element('pagination', array("totolText" => __('Number of Online Users'))); } ?>