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
<?php $this->assign('title', "Member"); ?>
<div class="users view large-12 medium-11 columns content">
    <h3 class="pageTitle"><i class="fas fa-user fa-lx fa-fw"></i>&nbsp;&nbsp;
        <?= h("All CWX Members") ?>

        <div class="btn-toolbar pull-right" role="toolbar" aria-label="...">
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    Member Reports <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <?= $this->Html->link("<i class='fas fa-download fa-fw'></i>&nbsp;&nbsp;Active Members", [
                          'plugin' => false,
                          'controller' => 'users', 'action' => 'members', 1
                        ], ['escape' => false, 'title' => 'Download Active Members']) ?>
                    </li>
                    <li>
                        <?= $this->Html->link("<i class='fas fa-download fa-fw'></i>&nbsp;&nbsp;All Members", [
                          'plugin' => false,
                          'controller' => 'users', 'action' => 'members', 0
                        ], ['escape' => false, 'title' => 'Download All Members']) ?>
                    </li>
                    <li>
                        <?= $this->Html->link("<i class='fas fa-download fa-fw'></i>&nbsp;&nbsp;CWX Phonebook", [
                          'plugin' => false,
                          'controller' => 'users', 'action' => 'phoneBook'
                        ], ['escape' => false, 'title' => 'Download Phonebook']) ?>
                    </li>
                    <li>
                        <?= $this->Html->link("<i class='fas fa-download fa-fw'></i>&nbsp;&nbsp;Attestation/ABC", [
                          'plugin' => false,
                          'controller' => 'users', 'action' => 'harassmentABC'
                        ], ['escape' => false, 'title' => 'Download Harassment/ABC']) ?>
                    </li>
                </ul>
            </div>
        </div>
    </h3>

    <?php echo $this->element('Usermgmt.all_members'); ?>


</div>