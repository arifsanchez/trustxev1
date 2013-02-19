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
if(!isset($totolText)) {
	$totolText=__('Total Records');
}
?>
<div id="pgBox">
	<div id="pg">
		<div class="box-with-border" style="display: inline-block;"><?php echo $this->Paginator->counter(array('format' => $totolText.' %count%'));  ?></div>
		<div class="box-without-border" style="display: inline-block;"><?php echo $this->Paginator->first(__('First'), null, null, array('class' => 'disabled')); ?></div>
		<div class="box-without-border" style="display: inline-block;"><?php echo $this->Paginator->prev(__('Previous'), null, null, array('class' => 'disabled')); ?></div>
		<div class="box-without-border pages" style="display: inline-block; margin-left:5px"><?php echo $this->Paginator->numbers(array('separator'=>'')); ?></div>
		<div class="box-without-border" style="display: inline-block;"><?php echo $this->Paginator->next(__('Next'), null, null,array('class' => 'disabled')); ?></div>
		<div class="box-without-border" style="display: inline-block;"><?php echo $this->Paginator->last(__('Last'), null, null, array('class' => 'disabled')); ?></div>
		<div class="box-with-border" style="display: inline-block;"><?php echo $this->Paginator->counter(array('format' => __('Page %s of %s', '%page%', '%pages%')));  ?></div>
		<div style="display: inline-block;width:32px;"><?php echo $this->Html->image(SITE_URL.'usermgmt/img/loading-indicator.gif', array('id' => 'busy-indicator')); ?></div>
	</div>
</div>
<?php echo $this->Js->writeBuffer();  ?>