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
    <?= $this->Html->meta('icon') ?>


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
   <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">ComedyWorx Membership Portal</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Links <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="portfolio-1-col.html">Link 1</a></li>
                            <li><a href="portfolio-1-col.html">Link 1</a></li>
                            <li><a href="portfolio-1-col.html">Link 1</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Links <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="blog-home-1.html">Link 1</a></li>
                            <li><a href="blog-home-1.html">Link 2</a></li>
                            <li><a href="blog-home-1.html">Link 3</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="full-width.html">Full Width Page</a></li>
                            <li><a href="sidebar.html">Sidebar Page</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
           <!--         <?php if($this->UserAuth->isLogged()) { echo $this->element('Usermgmt.dashboard'); } ?> -->
                    <?php if($this->UserAuth->isLogged()) { echo $this->element('menu'); } ?>
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