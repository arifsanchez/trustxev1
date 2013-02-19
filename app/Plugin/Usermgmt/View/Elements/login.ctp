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
<?php echo $this->Html->script(array('/usermgmt/js/ajaxValidation.js?q='.QRDN)); ?>
<?php echo $this->element('Usermgmt.ajax_validation', array("formId" => "cloginForm", "submitButtonId" => "cloginSubmitBtn")); ?>
<div id="umLogin">
	<div class='title'><?php echo __('Sign In');?></div>
	<?php echo $this->Form->create('User', array('url'=>array('controller' => 'users', 'action' => 'login', 'plugin'=>'usermgmt'), 'id'=>'cloginForm')); ?>
	<div class="umstyle4"><?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"umstyle5", 'placeholder'=>__('Email / Username'), 'title'=>__('Email / Username')))?></div>
	<div class="umstyle4"><?php echo $this->Form->input("password" ,array("type"=>"password", 'label' => false,'div' => false,'class'=>"umstyle5", 'placeholder'=>__('Password'), 'title'=>__('Password')))?></div>
	<?php if(!isset($this->request->data['User']['remember'])) { $this->request->data['User']['remember']=true; } ?>
	<div class="umstyle4"><?php echo $this->Form->input("remember" ,array("type"=>"checkbox", 'label' => false,'div' => false, 'title'=>__('Remember Me')))?><?php echo __('Remember Me');?></div>
	<div class="umstyle4"><?php echo $this->Form->Submit(__('Sign In'), array('id'=>'cloginSubmitBtn'));?></div>
	<?php echo $this->Form->end(); ?>
	<div  align="left"><?php echo $this->Html->link(__("Register"),"/register",array("class"=>"style30")) ?></div>
	<div  align="left"><?php echo $this->Html->link(__("Forgot Password?"),"/forgotPassword",array("class"=>"style30")) ?></div>
	<div  align="left"><?php echo $this->Html->link(__("Email Verification"),"/emailVerification",array("class"=>"style30")) ?></div>
</div>