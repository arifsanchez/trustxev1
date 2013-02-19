
<?php echo $this->Search->searchForm('UserContact', array('legend' => 'Search', "updateDivId" => "updateContactIndex")); ?>
<?php echo $this->element('paginator', array("useAjax" => true, "updateDivId" => "updateContactIndex")); ?>
<div class="tableContainer">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th><?php echo __('SL');?></th>
				<th><?php echo $this->Paginator->sort('UserContact.name', __('Name')); ?></th>
				<th><?php echo $this->Paginator->sort('UserContact.email', __('Email')); ?></th>
				<th><?php echo $this->Paginator->sort('UserContact.phone', __('Contact No')); ?></th>
				<th><?php echo __('Requirement');?></th>
				<th><?php echo __('Reply Message');?></th>
				<th><?php echo $this->Paginator->sort('UserContact.created', __('Date')); ?></th>
				<th><?php echo __('Action');?></th>
			</tr>
		</thead>
		<tbody>
<?php       if (!empty($userContacts)) {
				$page = $this->request->params['paging']['UserContact']['page'];
				$limit = $this->request->params['paging']['UserContact']['limit'];
				$i=($page-1) * $limit;
				foreach ($userContacts as $row) {
					$i++;
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".h($row['UserContact']['name'])."</td>";
					echo "<td>".h($row['UserContact']['email'])."</td>";
					echo "<td>".h($row['UserContact']['phone'])."</td>";
					echo "<td>".nl2br($row['UserContact']['requirement'])."</td>";
					echo "<td>".$row['UserContact']['reply_message']."</td>";
					echo "<td>".date('d-M-Y',strtotime($row['UserContact']['created']))."</td>";
					echo "<td class='action'>";
						echo "<a href='".$this->Html->url('/sendMails/'.$row['UserContact']['id'].'/contact')."'><img src='".SITE_URL."usermgmt/img/mail-reply.png' border='0' alt='".__('Send Reply')."' title='".__('Send Reply')."'></a>";
					echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan=7><br/><br/>".__('No Data')."</td></tr>";
			} ?>
		</tbody>
	</table>
</div>
<?php if(!empty($userContacts)) { echo $this->element('pagination', array("totolText" => __('Number of Enquiries'))); } ?>