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
<div class="users view large-12 medium-11 columns content">
    <h3><i class="fas fa-user fa-lx fa-fw"></i>&nbsp;&nbsp;
        <?= h("Member Details") ?>
        <span class="pull-right">
            <?php $page = (isset($this->request->query['page'])) ? $this->request->query['page'] : 1; ?>
            <?php echo $this->Html->link(__('Back', true), ['action' => 'members', 'page' => $page], ['class' => 'btn btn-sm btn-default']); ?>
            <?php echo $this->Html->link(__('Edit', true), ['action' => 'editMember', $user->id, 'page' => $page], ['class' => 'btn btn-sm btn-default']); ?>
        </span>
    </h3>


    <div style="display:inline-block;" class="col-md-6">
        <?php if (!empty($user)) { ?>
        <table class="table-condensed" style="width:auto">
            <tbody>
                <tr>
                    <td>
                        <div class="profile">
                            <img alt="<?php echo h($user['first_name'] . ' ' . $user['last_name']); ?>" src="<?php echo $this->Image->resize('library/' . IMG_DIR, $user['photo'], 200, null, true); ?>">
                        </div>
                    </td>
                    <td>
                        <h1>
                            <?php echo h($user['first_name']) . ' ' . h($user['last_name']); ?>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Group(s)'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['group_name']); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Username'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['username']); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Email'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['email']); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Gender'); ?>:</strong></td>
                    <td>
                        <?php echo h(ucwords($user['gender'])); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Birthday'); ?>:</strong></td>
                    <td>
                        <?php if (!empty($user['bday'])) {
										echo $this->Switches->date($user['bday']);
									} ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Phone'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['user_detail']['cellphone']); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Address'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['user_detail']['location']); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Status'); ?>:</strong></td>
                    <td>
                        <?php echo ($user['active']) ? __('Active') : __('Inactive'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Email Verified'); ?></strong></td>
                    <td>
                        <?php echo ($user['email_verified']) ? __('Yes') : __('No'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Joined'); ?>:</strong></td>
                    <td>
                        <?php echo $this->Switches->date($user['created']); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Last Login'); ?>:</strong></td>
                    <td>
                        <?php echo ($user['last_login']) ? $user['last_login']->timeAgoInWords(['accuracy' => 'hours']) : '' ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php 
	} ?>
    </div>

    <div style="display:inline-block; padding-top:200px;" class="col-md-6">
        <table class="table-condensed" style="width:auto">
            <tbody>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Club Standing'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['Club'] ? $user['Club'] : "N/A"); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Membership Standing'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['Member'] ? $user['Member'] : "N/A"); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Nickname'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['user_detail']['nickname'] ? $user['user_detail']['nickname'] : "N/A"); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Jersey'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['user_detail']['jersey'] ? $user['user_detail']['jersey'] : "N/A"); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Starting Year'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['user_detail']['starting_year'] ? $user['user_detail']['starting_year']->format('Y') : "N/A"); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Voice'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['user_detail']['voice'] ? "Yes" : "N/A"); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Host'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['user_detail']['host'] ? "Yes" : "N/A"); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Referee'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['user_detail']['referee'] ? "Yes" : "N/A"); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('ABC Certification'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['user_detail']['abc'] ? "Yes" . $user['user_detail']['abc'] : "N/A"); ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>
                            <?php echo __('Harrassment Policy'); ?>:</strong></td>
                    <td>
                        <?php echo h($user['user_detail']['harrassment'] ? "Yes" . $user['user_detail']['harrassment'] : "N/A"); ?>
                    </td>
                </tr>
            </tbody>
        </table>


    </div>

</div>