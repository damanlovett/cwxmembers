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
    </h3>






    <div id="updateUsersIndex">



        <?php 
        $i = 0;
// Establish the output variable
        echo '<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">'; ?>


        <?php foreach ($users as $row) {


            if ($i % 2 == 0) { // if $i is divisible by our target number (in this case "3")




                echo '<tr><td class="galleryHeader"> <img alt="' . $row['first_name'] . ' ' . $row['last_name'] . '" src="' . $this->Image->resize('library/' . IMG_DIR, $row['photo'], 100, null, true) . '" ><h4>' . $row['first_name'] . '&nbsp;&nbsp;' . $row['last_name'] . '</h4><div  class="gallery"><br />' . $row['user_detail']['nickname'] . '<br/>' . $row['jersey'] . '<br/>' . $row['email'] . '<br/>' . $row['cellphone'] . '</div></td>';
                echo '';


            } else {
                echo '<td class="galleryHeader"> <img alt="' . $row['first_name'] . ' ' . $row['last_name'] . '" src="' . $this->Image->resize('library/' . IMG_DIR, $row['photo'], 100, null, true) . '" ><h4>' . $row['first_name'] . '&nbsp;&nbsp;' . $row['last_name'] . '</h4><div  class="gallery"><br />' . $row['user_detail']['nickname'] . '<br/>' . $row['jersey'] . '<br/>' . $row['email'] . '<br/>' . $row['cellphone'] . '</div></td>';
            }
            $i++;
        }
        echo '</tr></table>';
        ?>


































        <?php if (!empty($users)) {
            echo $this->element('Usermgmt.pagination', ['paginationText' => __('Number of Users')]);
        } ?>
    </div>

</div>