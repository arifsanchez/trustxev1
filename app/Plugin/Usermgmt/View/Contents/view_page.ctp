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
<div class="umtop">
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Page Detail'); ?></span>
				<span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Home"),"/") ?></span>
				<?php $page= (isset($this->request->params['named']['page'])) ? $this->request->params['named']['page'] : 1; ?>
				<span style="float:right;padding-right:10px"><?php echo "<a href='".$this->Html->url(array('action'=>'index', 'page'=>$page))."'>".__('Back')."</a>"; ?></span>
				<span style="float:right;padding-right:10px"><?php echo "<a href='".$this->Html->url(array('action'=>'editPage/'.$pageId, 'page'=>$page))."'>".__('Edit')."</a>"; ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid">
	<?php   if (!empty($pageDetail)) { ?>
				<div>
					<table cellspacing="0" cellpadding="0" width="100%" border="0" class="umtable">
						<tbody>
							<tr>
								<td><strong><?php echo __('Page Name');?></strong></td>
								<td><?php echo h($pageDetail['Content']['page_name'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Url Name');?></strong></td>
								<td><?php echo h($pageDetail['Content']['url_name'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Page Link');?></strong></td>
								<td><a href='<?php echo SITE_URL.'contents/'.$pageDetail['Content']['url_name']?>'><?php echo SITE_URL.'contents/'.$pageDetail['Content']['url_name']?></a></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Page Title');?></strong></td>
								<td><?php echo h($pageDetail['Content']['page_title'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Page Content');?></strong></td>
								<td><?php echo $pageDetail['Content']['page_content']?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Created');?></strong></td>
								<td><?php echo $pageDetail['Content']['created']?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Modified');?></strong></td>
								<td><?php echo $pageDetail['Content']['modified']?></td>
							</tr>
						</tbody>
					</table>
				</div>
	<?php   } ?>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>