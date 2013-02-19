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
<?php echo $this->element('Usermgmt.ajax_validation', array("formId" => "contactForm", "submitButtonId" => "contactSubmitBtn")); ?>
<div id="umContactUs">
	<div class='title'><?php echo __('Contact Us');?></div>
	<?php echo $this->Form->create('UserContact', array('url'=>array('controller' => 'user_contacts', 'action' => 'contactUs', 'plugin'=>'usermgmt'), 'id'=>'contactForm')); ?>
	<div class="umstyle4" ><?php echo $this->Form->input("name" ,array('label' => false,'div' => false,'class'=>"umstyle5", 'placeholder'=>__('Name'), 'title'=>__('Name')))?></div>
	<div class="umstyle4" ><?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"umstyle5", 'placeholder'=>__('Email'), 'title'=>__('Email')))?></div>
	<div class="umstyle4" ><?php echo $this->Form->input("phone" ,array('label' => false,'div' => false,'class'=>"umstyle5", 'placeholder'=>__('Contact No'), 'title'=>__('Contact No')))?></div>
	<div class="umstyle4" ><?php echo $this->Form->textarea("requirement" ,array('label' => false,'div' => false,'class'=>"umstyle5 umstyle6", 'placeholder'=>__('Requirement'), 'title'=>__('Requirement')))?></div>
	<div class="umstyle4" ><?php echo $this->Form->Submit(__('Submit'), array('id'=>'contactSubmitBtn'));?></div>
	<?php echo $this->Form->end(); ?>
</div>