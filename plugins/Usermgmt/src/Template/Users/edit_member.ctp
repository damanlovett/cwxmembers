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
<script type="text/javascript">
$(document).ready(function(e) {
	if($.fn.chosen) {
		$("#users-user-group-id").chosen();
	}
});
</script>
<?php $this->assign('title','Edit Member');?>
<div class="users view large-12 medium-11 columns content">
    <h3><i class="fas fa-user fa-lx fa-fw"></i>&nbsp;&nbsp;<?= h("Edit ".$userEntity->first_name." ".$userEntity->last_name) ?><span class="pull-right">
            <?php echo $this->Html->link(__('Back', true), ['action'=>'members', 'plugin'=>'usermgmt'], ['class'=>'btn btn-default btn-sm']); ?>
        </span></h3>



	<div class="panel-body">
		<?php echo $this->element('Usermgmt.ajax_validation', ['formId'=>'editUserForm', 'submitButtonId'=>'editUserSubmitBtn']); ?>
		<h4>Portal Information</h4>
		<?php echo $this->Form->create($userEntity, ['id'=>'editUserForm', 'class'=>'form-horizontal', 'type'=>'file']);?>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Group');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_group_id', ['type'=>'select', 'label'=>false, 'div'=>false, 'multiple'=>true, 'class'=>'form-control', 'data-placeholder'=>'Select Group(s)']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Username');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.username', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']);?>
			</div>
		</div>
		<h4 class="pageTitle">Personal</h4>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('First Name');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.first_name', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Last Name');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.last_name', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label required"><?php echo __('Email');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.email', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Gender');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.gender', ['type'=>'select', 'label'=>false, 'div'=>false, 'options'=>$genders]);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Birthday');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.bday', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control datepicker']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Address');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.location', ['type'=>'textarea', 'label'=>false, 'div'=>false, 'class'=>'form-control']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Phone');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.cellphone', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']);?>
			</div>
		</div>
		<h4>Membership</h4>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Starting Date');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.starting_year', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control datepicker']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Nickname');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.nickname', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Referee');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.referee', ['label'=>false, 'div'=>false]);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Host');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.host', ['label'=>false, 'div'=>false]);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Voice');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.voice', ['label'=>false, 'div'=>false]);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Member Standing');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.member_standing_id', ['type'=>'select', 'label'=>false, 'options'=> $memberStandings, 'div'=>false]);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Club Standing');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.club_standing_id', ['type'=>'select', 'label'=>false, 'options'=> $clubStandings, 'div'=>false]);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('ABC Certification');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.abc', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control datepicker']);?>
			</div>
		</div>
		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Harassment Policy');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.user_detail.harassment', ['type'=>'text', 'label'=>false, 'div'=>false, 'class'=>'form-control datepicker']);?>
			</div>
		</div>



		<div class="um-form-row form-group">
			<label class="col-sm-2 control-label"><?php echo __('Photo');?></label>
			<div class="col-sm-3">
				<?php echo $this->Form->input('Users.photo_file', ['type'=>'file', 'label'=>false, 'div'=>false]);?>
			</div>
		</div>



		<div class="um-button-row">
			<?php echo $this->Form->Submit(__('Edit Member'), ['div'=>false, 'class'=>'btn btn-primary text-success', 'id'=>'editUserSubmitBtn']);?>
		</div>
		<?php echo $this->Form->end();?>




	</div>
</div>
