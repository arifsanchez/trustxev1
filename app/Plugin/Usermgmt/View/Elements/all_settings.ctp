
<?php echo $this->Search->searchForm('UserSetting', array('legend' => 'Search', "updateDivId" => "updatePermissionIndex")); ?>
<?php echo $this->element('paginator', array("useAjax" => true, "updateDivId" => "updatePermissionIndex")); ?>
<div class="row-fluid">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th><?php echo __('Sr. No.');?></th>
				<th><?php echo __('Setting Name');?></th>
				<th><?php echo __('Setting Value');?></th>
				<th style="width:75px;"><?php echo __('Action');?></th>
			</tr>
		</thead>
		<tbody>
	<?php   if(!empty($userSettings))   {
				$page = $this->request->params['paging']['UserSetting']['page'];
				$limit = $this->request->params['paging']['UserSetting']['limit'];
				$i=($page-1) * $limit;
				foreach ($userSettings as   $row) {
					$i++;
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".h($row['UserSetting']['name_public'])."</td>";
					echo "<td>";
					if ($row['UserSetting']['type']=='input') {
						echo h($row['UserSetting']['value']);
					} elseif($row['UserSetting']['type']=='checkbox') {
						if(!empty($row['UserSetting']['value'])) {
							echo __('Yes');
						} else {
							echo __('No');
						}
					}
					echo"</td>";
					echo "<td>";
						echo "<span class='icon'><a href='".$this->Html->url('/editSetting/'.$row['UserSetting']['id'].'/page:'.$page)."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='".__('Edit')."' title='".__('Edit')."'></a></span>";
					echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan=4><br/><br/>".__('No Data')."</td></tr>";
			} ?>
		</tbody>
	</table>
</div>
<?php if(!empty($userSettings)) { echo $this->element('pagination', array("totolText" => __('Number of Settings'))); } ?>