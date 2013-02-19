<?php echo $this->Html->script(array('/usermgmt/js/ajaxValidation.js?q='.QRDN)); ?>
<?php echo $this->element('ajax_validation', array("formId" => "loginForm", "submitButtonId" => "loginSubmitBtn")); ?>


<h2><span>Start using our services</span></h2>
                
	<div class="row-fluid">
		<div class="span6 bordered">
            <strong>Log in:</strong>
            <br/>
            <br/>
			<?php echo $this->Form->create('Users', array('plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'login'),  array('class' => 'form-horizontal form-flexible')); ?>
                <div class="control-group">
                    <label class="control-label" for="loginEmail">Email or Username</label>
                    <div class="controls">
                        <input class="input-flexible" type="text" name="data[User][email]" id="loginEmail" placeholder="Email or Username">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="loginPassword">Password</label>
                    <div class="controls">
                        <input class="input-flexible" type="password" id="loginPassword" placeholder="Password" name="data[User][password]">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox"> Remember me
                        </label>
                        <button type="submit" class="btn">Log In</button>
                        <br/>                                 
                    </div>
                </div>
               <div class="control-group">
                    <div class="controls">
                        <?php echo $this->Html->link(__("Forgot Password?"),"/forgotPassword") ?> <br />
						<?php echo $this->Html->link(__("Email Verification"),"/emailVerification") ?> 
                    </div>
                </div>
				
            </form>
		</div><!--/span6-->
        
		<div class="span6">
            
 
                <strong>Or sign in with your social profiles:</strong><br /> <br />
                <a href="#" class="btn btn-facebook"><i class="icon icon-facebook"></i> Facebook</a> 
                <a href="#" class="btn btn-twitter"><i class="icon icon-twitter"></i> Twitter</a>
                
			
            
               
            
		</div><!--/span6-->
	</div><!--/row-fluid-->
    
<!--/container-->

<script>
	document.getElementById("loginEmail").focus();
</script>