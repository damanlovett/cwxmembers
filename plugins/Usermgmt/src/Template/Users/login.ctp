<?php
/* Cakephp 3.x User Management Premium Version (a product of Ektanjali Softwares Pvt Ltd)
Website- http://ektanjali.com
Plugin Demo- http://cakephp3-user-management.ektanjali.com/
Author- Chetan Varshney (The Director of Ektanjali Softwares Pvt Ltd)
Plugin Copyright No- 11498/2012-CO/L

UMPremium is a copyrighted work of authorship. Chetan Varshney retains ownership of the product and any copies of it, regardless of the form in which the copies may exist. This license is not a sale of the original product or any copies.

By installing and using UMPremium on your server, you agree to the following terms and conditions. Such agreement is either on your own behalf or on behalf of any corporate entity which employs you or which you represent ('Corporate Licensee'). In this Agreement, 'you' includes both the reader and any Corporate Licensee and Chetan Varshney.

The Product is licensed only to you. You may not rent, lease, sublicense, sell, assign, pledge, transfer or otherwise dispose of the Product in any form, on a temporary or permanent basis, without the prior written consent of Chetan Varshney.

The Product source code may be altered (at your risk)

All Product copyright notices within the scripts must remain unchanged (and visible).

If any of the terms of this Agreement are violated, Chetan Varshney reserves the right to action against you.

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Product.

THE PRODUCT IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE PRODUCT OR THE USE OR OTHER DEALINGS IN THE PRODUCT. */
?>
<?php $this->assign('title', 'Log in For the');?>
      <div class="content">
      	<div class="form">
      		<h1>CWX Membership Portal</h1>

			<div class="panel-body">
				<?php echo $this->element('Usermgmt.ajax_validation', ['formId'=>'loginForm', 'submitButtonId'=>'loginSubmitBtn']); ?>
				<?php echo $this->Form->create($userEntity, ['id'=>'loginForm', 'class'=>'form-horizontal']); ?>
				<?php /* <div class="um-form-row form-group"> */ ?>
					<label class="control-label required"><?php echo __('Email or Username'); ?></label>
				<?php /*	<div class="col-sm-7"> */ ?>
						<?php echo $this->Form->input('Users.email', ['type'=>'text', 'label'=>false, 'div'=>false, 'placeholder'=>__('Email or Username'), 'class'=>'form-control']); ?>
				<?php /*	</div>
				</div>
				<div class="um-form-row form-group"> */?>
					<label class="control-label required"><?php echo __('Password'); ?></label>
			<?php /*		<div class="col-sm-7"> */?>
						<?php echo $this->Form->input('Users.password', ['type'=>'password', 'label'=>false, 'div'=>false, 'placeholder'=>__('Password'), 'class'=>'form-control']); ?>
			<?php /*		</div>
				</div> */?>
				<?php if(USE_REMEMBER_ME) { ?>
					<div class="um-form-row form-group">
						<?php if(!isset($userEntity['remember'])) {
								$userEntity['remember'] = false;
							} ?>
						<div class="col-sm-6">
							<?php echo $this->Form->input('Users.remember', ['type'=>'checkbox', 'label'=>'Remember Me', 'div'=>false, 'class'=>'my_checkbox']); ?>
						</div>
					</div>
				<?php } ?>
				<?php if($this->UserAuth->canUseRecaptha('login')) {
					$errors = $userEntity->errors();
					$error = "";
					if(isset($errors['captcha']['_empty'])) {
						$error = $errors['captcha']['_empty'];
					} else if(isset($errors['captcha']['mustMatch'])) {
						$error = $errors['captcha']['mustMatch'];
					}?>
					<div class="um-form-row form-group">
						<label class="col-sm-4 control-label required"><?php echo __('Prove you\'re not a robot');?></label>
						<div class="col-sm-8">
							<?php echo $this->UserAuth->showCaptcha($error);?>
						</div>
					</div>
				<?php } ?>
				<div class="um-button-row">
					<?php echo $this->Form->Submit(__('Sign In'), ['div'=>false, 'class'=>'btn btn-primary', 'id'=>'loginSubmitBtn']); ?>
					<hr />
									<?php if(SITE_REGISTRATION) { ?>
				<span>
					<?php echo $this->Html->link(__('Create Account', true), ['controller'=>'Users', 'action'=>'register', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-success btn-sm']); ?>
				</span>
				<?php } ?>
					<?php echo $this->Html->link(__('Forgot Password?'), '/forgotPassword', ['class'=>'btn btn-default pull-right um-btn btn-sm']); ?>
					<?php echo $this->Html->link(__('Email Verification'), '/emailVerification', ['class'=>'btn btn-default pull-left um-btn btn-sm']); ?>
				</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
