
<?php echo $this->Search->searchForm('User', array('legend' => 'Search', "updateDivId" => "updateGroupIndex")); ?>
<?php echo $this->element('paginator', array("useAjax" => true, "updateDivId" => "updateGroupIndex")); ?>
<div class="tableContainer">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th><?php echo __('Group Id');?></th>
				<th><?php echo __('Name');?></th>
				<th><?php echo __('Alias Name');?></th>
				<th><?php echo __('Allow Registration');?></th>
				<th><?php echo __('Created');?></th>
				<th><?php echo __('Action');?></th>
			</tr>
		</thead>
		<tbody>
	<?php   if(!empty($userGroups)) {
				$page = $this->request->params['paging']['UserGroup']['page'];
				$limit = $this->request->params['paging']['UserGroup']['limit'];
				$i=($page-1) * $limit;
				foreach ($userGroups as $row) {
					echo "<tr>";
					echo "<td>".$row['UserGroup']['id']."</td>";
					echo "<td>".h($row['UserGroup']['name'])."</td>";
					echo "<td>".h($row['UserGroup']['alias_name'])."</td>";
					echo "<td>";
					if ($row['UserGroup']['allowRegistration']) {
						echo __('Yes');
					} else {
						echo __('No');
					}
					echo"</td>";
					echo "<td>".date('d-M-Y',strtotime($row['UserGroup']['created']))."</td>";
					echo "<td>";
						echo "<span class='icon'><a href='".$this->Html->url('/editGroup/'.$row['UserGroup']['id'].'/page:'.$page)."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='".__('Edit')."' title='".__('Edit')."'></a></span>";
						if ($row['UserGroup']['id']!=1) {
							echo $this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deleteGroup', $row['UserGroup']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this group? Delete it your own risk')));
						}
					echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan=6><br/><br/>".__('No Data')."</td></tr>";
			} ?>
		</tbody>
	</table>
</div>
<?php if(!empty($userGroups)) { echo $this->element('pagination', array("totolText" => __('Number of Groups'))); } ?>