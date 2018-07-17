<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = "Lovett Creations :: You'll Love What We Do";
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->fetch('title');?> CWX Membership Portal | Lovett Creations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language="javascript">
        var urlForJs="<?php echo SITE_URL ?>";
    </script>
<?= $this->Html->meta(
    'favicon.ico',
    '/cakeicon.ico',
    ['type' => 'icon']
);
?>

    <?php

        /* Bootstrap CSS */
        echo $this->Html->css('/plugins/bootstrap/css/bootstrap.min.css');

        /* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */
        echo $this->Html->css('/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css');

        /* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
        echo $this->Html->css('/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css');

        /* Chosen is taken from https://github.com/harvesthq/chosen/releases/ */
        echo $this->Html->css('/plugins/chosen/chosen.min.css');

        /* Jquery latest version taken from http://jquery.com */
        echo $this->Html->script('/plugins/jquery-3.1.1.min.js');

        /* Toastr is taken from https://github.com/CodeSeven/toastr */
        echo $this->Html->css('/plugins/toastr/build/toastr.min.css');

        /* Jquery latest version taken from http://jquery.com */
        //echo $this->Html->css('/plugins/blitz/jquery-ui.theme.min.css');
        echo $this->Html->script('/plugins/jquery-3.1.1.min.js');
        //echo $this->Html->script('/plugins/blitz/jquery-ui.min.js');

        /* Bootstrap JS */
        echo $this->Html->script('/plugins/bootstrap/js/bootstrap.min.js');

        /* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */
        echo $this->Html->script('/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');

        /* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
        echo $this->Html->script('/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js');

        echo $this->Html->script('umscript.js');
        echo $this->Html->script('custom.js');

                /* Usermgmt Plugin JS */
        echo $this->Html->script('/usermgmt/js/umscript.js?q='.QRDN);
        echo $this->Html->script('/usermgmt/js/ajaxValidation.js?q='.QRDN);


    ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('custom.css') ?>
    <?= $this->Html->css('all.css') ?>
    <!--
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> -->




    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="background"></div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header navbar-center" style="margin-left:50px">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" " href="/"><?= $this->Html->image('CWXRedBrand.png', ['alt' => 'CWX Brand', 'class'=>'brandImg']); ?>ComedyWorx Membership Portal</a>
    </div>

 <!--- Portal Manager -> months/index ( reroute name )
        ( add nav bar for access all the below page title )
        ( wishlist add count for shows / practices on index             page )
    -> months/mview
        ( add CRUD icons )
        ( wishlist add pagnation for shows )
 Table Manager -> dropdown/index


 ------- Separator ---------
 show -> shows/manager
        ( add CRUD icons )
    -> shows/edit
        ( format page / remove nav / correct date field )
    -> shows/mview ( add icon )

 practice -> practices/manager
        ( remove nav / make icons for CRUD )
    -> practices/mview
        ( create page from checkin / add Delete / add user              form with date )
 checkins -> checkins/index
        ( remove nav / remove view&edit / format displayname /          move user first )
 players -> users/index
        ( format page / remove nav )
    -> users/mview
 memberships ->user-details
        ( format page )
-->
<?php echo $this->element('mainMenu');?>
</nav>
<div class="header"></div>
    <div class="container clearfix">
    <?= $this->Flash->render() ?>
           <?php /*         <?php if($this->UserAuth->isLogged()) { echo $this->element('Usermgmt.dashboard'); } ?> -->
                    <?php if($this->UserAuth->isLogged()) { echo $this->element('menu'); } ?> */?>
            <?php echo $this->element('Usermgmt.message_notification'); ?>

        <?= $this->fetch('content') ?>
    </div>
    <div id="footer">
        <div class="container">
            <p class="muted">Copyright &copy; <?php echo date('Y');?> CWX Membership Portal. All Rights Reserved. Developed By  <a href="http://www.lovettcreations.org/" target='_blank'>Lovett Creations</a>.</p>
        </div>
    </div>
</body>
</html>
