<?php
/*

Cakephp 2.x User Management Premium Version (a product of Ekta Softwares)
Ekta Softwares is a division of Ektanjali Softwares Pvt Ltd
Website- http://EktaSoftwares.com
Plugin Demo- http://umpremium.ektasoftwares.com
Author- Chetan Varshney (The Director of Ektanjali Softwares Pvt Ltd)
Plugin Copyright No- 11498/2012-CO/L

UMPremium is a copyrighted work of authorship. Chetan Varshney retains ownership of the product and any copies of it, regardless of the form in which the copies may exist. This license is not a sale of the original product or any copies.

By installing and using UMPremium on your server, you agree to the following terms and conditions. Such agreement is either on your own behalf or on behalf of any corporate entity which employs you or which you represent ('Corporate Licensee'). In this Agreement, 'you' includes both the reader and any Corporate Licensee and Chetan Varshney.

The Product is licensed only to you. You may not rent, lease, sublicense, sell, assign, pledge, transfer or otherwise dispose of the Product in any form, on
a temporary or permanent basis, without the prior written consent of Chetan Varshney.

The Product source code may be altered (at your risk)

All Product copyright notices within the scripts must remain unchanged (and visible).

If any of the terms of this Agreement are violated, Chetan Varshney reserves the right to action against you.

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Product.

THE PRODUCT IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE PRODUCT OR THE USE OR OTHER DEALINGS IN THE PRODUCT.

*/
?>
<?php echo $this->Search->searchForm('Content', array('legend' => 'Search', "updateDivId" => "updateContentIndex")); ?>
<?php echo $this->element('paginator', array("useAjax" => true, "updateDivId" => "updateContentIndex")); ?>
<div class="tableContainer">
	<table cellspacing="0" cellpadding="0" width="100%" border="0" class="umtable colored">
		<thead>
			<tr>
				<th><?php echo __('SL');?></th>
				<th><?php echo $this->Paginator->sort('Content.page_name', __('Page Name')); ?></th>
				<th><?php echo $this->Paginator->sort('Content.url_name', __('Url Name')); ?></th>
				<th><?php echo $this->Paginator->sort('Content.page_title', __('Page Title')); ?></th>
				<th><?php echo __('Page Link');?></th>
				<th><?php echo $this->Paginator->sort('Content.created', __('Created')); ?></th>
				<th><?php echo __('Action');?></th>
			</tr>
		</thead>
		<tbody>
<?php       if (!empty($contents)) {
				$page = $this->request->params['paging']['Content']['page'];
				$limit = $this->request->params['paging']['Content']['limit'];
				$i=($page-1) * $limit;
				foreach ($contents as $row) {
					$i++;
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".$row['Content']['page_name']."</td>";
					echo "<td>".$row['Content']['url_name']."</td>";
					echo "<td>".$row['Content']['page_title']."</td>";
					echo "<td><a href='".SITE_URL.'contents/'.$row['Content']['url_name']."'>".SITE_URL.'contents/'.$row['Content']['url_name']."</a></td>";
					echo "<td>".date('d-M-Y',strtotime($row['Content']['created']))."</td>";
					echo "<td class='action'>";
						echo "<a href='".$this->Html->url('/viewPage/'.$row['Content']['id'].'/page:'.$page)."'><img src='".SITE_URL."usermgmt/img/view.png' border='0' alt='".__('View Page')."' title='".__('View Page')."'></a>";
						echo "<a href='".$this->Html->url('/editPage/'.$row['Content']['id'].'/page:'.$page)."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='".__('Edit Page')."' title='".__('Edit Page')."'></a>";
						echo $this->Form->postLink("<img src='".SITE_URL."usermgmt/img/delete.png' border='0' alt='".__('Delete Page')."' title='".__('Delete Page')."'>", array('action' => 'deletePage', $row['Content']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this page?')));
					echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan=7><br/><br/>".__('No Data')."</td></tr>";
			} ?>
		</tbody>
	</table>
</div>
<?php if(!empty($contents)) { echo $this->element('pagination', array("totolText" => __('Number of Pages'))); } ?>