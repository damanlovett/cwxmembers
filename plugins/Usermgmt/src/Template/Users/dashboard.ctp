<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\dashboard[]|\Cake\Collection\CollectionInterface $dashboard
 */
?>


    <!-- Header Carousel -->


    <!-- Page Content -->
    <div class="container">



		<div class="row products">

			<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail">
					<img src="https://placehold.it/320x150" alt="">
					<div class="caption">
					<h4 class="pull-left myBlue"><i class="fas fa-calendar fa-3x fa-fw"></i></h4>
						<h4><?= $this->Html->link(__('Shows'), ['controller' => 'shows', 'action' => 'index','plugin'=>false]);?></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<div class="ratings">
						<p class="pull-right">&nbsp;</p>
						<p>&nbsp;</span>
						</p>
					</div>
				</div>
			</div>

			<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail">
					<img src="https://placehold.it/320x150" alt="">
					<div class="caption">
					<h4 class="pull-left myRed"><i class="fas fa-chalkboard fa-3x fa-fw"></i></h4>
						<h4><?= $this->Html->link(__('Practice'), ['controller' => 'practices', 'action' => 'index','plugin'=>false]);?></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<div class="ratings">
						<p class="pull-right">&nbsp;</p>
						<p>&nbsp;</span>
						</p>
					</div>
				</div>
			</div>

			<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail">
					<img src="https://placehold.it/320x150" alt="">
					<div class="caption">
					<h4 class="pull-left myGreen"><i class="fas fa-user-circle fa-3x fa-fw"></i></h4>
						<h4><?= $this->Html->link(__('My Stuff'), ['controller' => 'users', 'action' => 'me','plugin'=>false]);?></li></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<div class="ratings">
						<p class="pull-right">&nbsp;</p>
						<p>&nbsp;</span>
						</p>
					</div>
				</div>
			</div>

		</div>







		<?php	echo "<hr/>";

			if($this->UserAuth->isAdmin()) {
				echo "<h4><span class='label label-default'>User Management</span></h4><br/>";
				if($this->UserAuth->HP('Users', 'addUser', 'Usermgmt')) {
					echo $this->Html->link(__('Add User'), ['controller'=>'Users', 'action'=>'addUser', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('Users', 'addMultipleUsers', 'Usermgmt')) {
					echo $this->Html->link(__('Add Multiple Users'), ['controller'=>'Users', 'action'=>'addMultipleUsers', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('Users', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('All Users'), ['controller'=>'Users', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('Users', 'online', 'Usermgmt')) {
					echo $this->Html->link(__('Online Users'), ['controller'=>'Users', 'action'=>'online', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserGroups', 'add', 'Usermgmt')) {
					echo $this->Html->link(__('Add Group'), ['controller'=>'UserGroups', 'action'=>'add', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserGroups', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('All Groups'), ['controller'=>'UserGroups', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				echo "<hr/>";

				echo "<h4><span class='label label-default'>Group Permissions</span></h4><br/>";
				if($this->UserAuth->HP('UserGroupPermissions', 'permissionGroupMatrix', 'Usermgmt')) {
					echo $this->Html->link(__('Group Permissions'), ['controller'=>'UserGroupPermissions', 'action'=>'permissionGroupMatrix', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserGroupPermissions', 'permissionSubGroupMatrix', 'Usermgmt')) {
					echo $this->Html->link(__('Subgroup Permissions'), ['controller'=>'UserGroupPermissions', 'action'=>'permissionSubGroupMatrix', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				echo "<hr/>";

				echo "<h4><span class='label label-default'>Email Communication</span></h4><br/>";
				if($this->UserAuth->HP('UserEmails', 'send', 'Usermgmt')) {
					echo $this->Html->link(__('Send Mail'), ['controller'=>'UserEmails', 'action'=>'send', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserEmails', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('View Sent Mails'), ['controller'=>'UserEmails', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('ScheduledEmails', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('Scheduled Mails'), ['controller'=>'ScheduledEmails', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserContacts', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('Contact Enquiries'), ['controller'=>'UserContacts', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserEmailTemplates', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('Email Templates'), ['controller'=>'UserEmailTemplates', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserEmailSignatures', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('Email Signatures'), ['controller'=>'UserEmailSignatures', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				echo "<hr/>";

				echo "<h4><span class='label label-default'>Static Pages Management</span></h4><br/>";
				if($this->UserAuth->HP('StaticPages', 'add', 'Usermgmt')) {
					echo $this->Html->link(__('Add Page'), ['controller'=>'StaticPages', 'action'=>'add', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('StaticPages', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('All Pages'), ['controller'=>'StaticPages', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				echo "<hr/>";

				echo "<h4><span class='label label-default'>Admin Settings</span></h4><br/>";
				if($this->UserAuth->HP('UserSettings', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('All Settings'), ['controller'=>'UserSettings', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserSettings', 'cakelog', 'Usermgmt')) {
					echo $this->Html->link(__('Cake Logs'), ['controller'=>'UserSettings', 'action'=>'cakelog', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('Users', 'deleteCache', 'Usermgmt')) {
					echo $this->Html->link(__('Delete Cache'), ['controller'=>'Users', 'action'=>'deleteCache', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				echo "<hr/>";
			}
		 ?>

</div>
    <div id="footer">
        <div class="container">
            <p class="muted">Copyright &copy; <?php echo date('Y');?> CWX Membership Portal. All Rights Reserved. Developed By  <a href="http://www.lovettcreations.org/" target='_blank'>Lovett Creations</a>.</p>
        </div>
    </div>
</body>
</html>
