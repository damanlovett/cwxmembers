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
    <table class="table table-striped rep allMembers" cellpadding="0" cellspacing="0">
        <thead>
            <tr class="hidden-xs hidden-sm">
                <th style="width:40px;">
                    <?php echo __('#'); ?>
                </th>
                <th scope="col" style="width:15%">
                    <?php echo $this->Paginator->sort('Users.first_name', __('Player')); ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)) {
                $page = $this->request->params['paging']['Users']['page'];
                $limit = $this->request->params['paging']['Users']['perPage'];
                $i = ($page - 1) * $limit;
                foreach ($users as $row) {
                    $i++;
                    echo "<tr>";
                    echo "<td class='hidden-xs hidden-sm'>" . $i . "</td>";
                    echo "<td>" . h($row['first_name']) . "&nbsp;" . h($row['last_name']) .  "&nbsp; - &nbsp" . $row['user_detail']['cellphone'] . "</td>";
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