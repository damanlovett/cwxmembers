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

<div id="updateUsersIndex">
    <?php echo $this->Search->searchForm('Users', ['legend' => false, 'updateDivId' => 'updateUsersIndex']); ?>
    <?php echo $this->element('Usermgmt.paginator', ['updateDivId' => 'updateUsersIndex']); ?>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th style="width:40px;">
                    <?php echo __('#'); ?>
                </th>
                <th scope="col">
                    <?php echo $this->Paginator->sort('Users.last_name', __('Name')); ?>
                </th>
                <th scope="col">
                    <?php echo $this->Paginator->sort('Users.username', __('Username')); ?>
                </th>
                <th>
                    <?php echo __('Groups(s)'); ?>
                </th>
                <th scope="col">
                    <?php echo $this->Paginator->sort('Users.last_login', __('Last Login')); ?>
                </th>
				<th>
				<?php echo __('Status'); ?>
				</th>
                <th style="width:100px;">
                    <?php echo __('Action'); ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php	if (!empty($users)) {
												$page = $this->request->params['paging']['Users']['page'];
												$limit = $this->request->params['paging']['Users']['perPage'];
												$i = ($page - 1) * $limit;
												foreach ($users as $row) {
													$i++;
													echo "<tr>";
													echo "<td>" . $i . "</td>";
													echo "<td>" . h($row['last_name']) . ', ' . h($row['first_name']) . "</td>";
													echo "<td>" . h($row['username']) . "</td>";
													echo "<td>" . $row['user_group_name'] . "</td>";
													echo "<td>";
													echo ($row['last_login']) ? $row['last_login']->timeAgoInWords(['accuracy' => 'hours']) : 'N/A';
													echo "</td>";
													echo "<td>";
													if ($row['active']) {
														echo "<span class='text-success'>" . __('Active') . "</span>";
													} else {
														echo "<span class='text-danger'>" . __('Inactive') . "</span>";
													}
													echo "</td>";
													echo "<td>";
													echo "<div class='btn-group'>";
													echo "<button class='btn btn-primary btn-sm dropdown-toggle' data-toggle='dropdown'>" . __('Action') . " <span class='caret'></span></button>";
													echo "<ul class='dropdown-menu'>";
													echo "<li>" . $this->Html->link(__('View Member'), ['controller' => 'Users', 'action' => 'viewMember', $row['id'], 'page' => $page], ['escape' => false]) . "</li>";
													echo "<li>" . $this->Html->link(__('Edit Member'), ['controller' => 'Users', 'action' => 'editMember', $row['id'], 'page' => $page], ['escape' => false]) . "</li>";
													if ($row['id'] != 1 && strtolower($row['username']) != 'admin') {
														if ($row['active']) {
															echo "<li>" . $this->Form->postLink(__('Inactivate'), ['controller' => 'Users', 'action' => 'setInactive', $row['id'], 'page' => $page], ['escape' => false, 'confirm' => __('Are you sure you want to inactivate this user?')]) . "</li>";
														} else {
															echo "<li>" . $this->Form->postLink(__('Activate'), ['controller' => 'Users', 'action' => 'setActive', $row['id'], 'page' => $page], ['escape' => false, 'confirm' => __('Are you sure you want to activate this user?')]) . "</li>";
														}
														if (!$row['email_verified']) {
															echo "<li>" . $this->Form->postLink(__('Verify Email'), ['action' => 'verifyEmail', $row['id'], 'page' => $page], ['escape' => false, 'confirm' => __('Are you sure you want to verify email of this user?')]) . "</li>";
														}
													}
													echo "<li role='separator' class='divider'></li>";
													echo "<li>" . $this->Html->link("<i class='fas fa-download fa-fw'></i> Practices", [
														'plugin' => false, 'controller' => 'users', 'action' => 'practiceReport', $row['id']
													], ['escape' => false, 'title' => 'Download Practices']) . "</li>";
													echo "<li>" . $this->Html->link("<i class='fas fa-download fa-fw'></i> Sign Ups", [

														'plugin' => false, 'controller' => 'users', 'action' => 'signupReport', $row['id']
													], ['escape' => false, 'title' => 'Download Sign Ups']) . "</li>";
													echo "<li>" . $this->Html->link("<i class='fas fa-download fa-fw'></i> Assignments", [
														'plugin' => false, 'controller' => 'users', 'action' => 'assignmentReport', $row['id']
													], ['escape' => false, 'title' => 'Download Assignments']) . "</li>";
													echo "</ul>";
													echo "</div>";
													echo "</td>";
													echo "</tr>";
												}
											} else {
												echo "<tr><td colspan=10><br/><br/>" . __('No Records Available') . "</td></tr>";
											} ?>
        </tbody>
    </table>
    <?php if (!empty($users)) {
				echo $this->element('Usermgmt.pagination', ['paginationText' => __('Number of Users')]);
			} ?>
</div>