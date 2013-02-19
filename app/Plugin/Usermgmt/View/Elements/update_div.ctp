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
if($funcName=="makeActiveInactive") {
	$updateText="";
	if($result==1) {
		echo $this->Js->link($this->Html->image(SITE_URL.'usermgmt/img/dis-approve.png', array("alt" => __('Make Active'), "title" => __('Make Active'))), array('action' => 'makeActiveInactive', $userId, 1), array('update' => '#makeActiveInactiveId'.$userId, 'escape' => false, 'confirm' => __('Are you sure you want to make this user active?')));
		$updateText=__('Inctive', true);
	} else if($result==0) {
		echo $this->Js->link($this->Html->image(SITE_URL.'usermgmt/img/approve.png', array("alt" => __('Make Inactive'), "title" => __('Make Inactive'))), array('action' => 'makeActiveInactive', $userId, 0), array('update' => '#makeActiveInactiveId'.$userId, 'escape' => false, 'confirm' => __('Are you sure you want to make this user inactive?')));
		$updateText=__('Active', true);
	}
?><script language="JavaScript">
	if('<?php echo $updateText ?>') {
		$('#activeInactive<?php echo $userId ?>').html('<?php echo $updateText ?>');
	}
	alert('<?php echo $updateMsg ?>');
</script><?php
} else if($funcName=="deleteUser") {
	if($result==1) { ?>
		<script language="JavaScript">
			$('#rowId<?php echo $userId ?>').remove();
		</script>
<?php } else {
		echo $this->Js->link($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deleteUser', $userId), array('update' => '#doDeleteId'.$userId, 'escape' => false, 'confirm' => __('Are you sure you want to delete this user?')));
	}
?><script language="JavaScript">
	alert('<?php echo $updateMsg ?>');
</script><?php
} else if($funcName=="verifyEmail") {
	$updateText="";
	if($result==1) {
		$updateText=__('Yes', true);
?><script language="JavaScript">
			$('#doEmailVerifyId<?php echo $userId ?>').remove();
		</script>
<?php } else {
		echo $this->Js->link($this->Html->image(SITE_URL.'usermgmt/img/email-verify.png', array("alt" => __('Verify Email'), "title" => __('Verify Email'))), array('action' => 'verifyEmail', $userId), array('update' => '#doEmailVerifyId'.$userId, 'escape' => false, 'confirm' => __('Are you sure you want to verify email of this user?')));
		$updateText=__('No', true);
	}
?><script language="JavaScript">
	if('<?php echo $updateText ?>') {
		$('#emailVerified<?php echo $userId ?>').html('<?php echo $updateText ?>');
	}
	alert('<?php echo $updateMsg ?>');
</script><?php
}
echo $this->Js->writeBuffer();