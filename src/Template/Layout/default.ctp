<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $this->fetch('title');?> CWX Membership Portal | Lovett Creations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language="javascript">
        var urlForJs="<?php echo SITE_URL ?>";
    </script>
    <?php
        echo $this->Html->meta('icon');
        /* Bootstrap CSS */
        echo $this->Html->css('/plugins/bootstrap/css/bootstrap.min.css?q='.QRDN);

        /* Usermgmt Plugin CSS */
        echo $this->Html->css('/usermgmt/css/umstyle.css?q='.QRDN);

        /* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */
        echo $this->Html->css('/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css?q='.QRDN);

        /* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
        echo $this->Html->css('/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css?q='.QRDN);

        /* Chosen is taken from https://github.com/harvesthq/chosen/releases/ */
        echo $this->Html->css('/plugins/chosen/chosen.min.css?q='.QRDN);

        /* Toastr is taken from https://github.com/CodeSeven/toastr */
        echo $this->Html->css('/plugins/toastr/build/toastr.min.css?q='.QRDN);

        /* Jquery latest version taken from http://jquery.com */
        echo $this->Html->script('/plugins/jquery-3.1.1.min.js');

        /* Bootstrap JS */
        echo $this->Html->script('/plugins/bootstrap/js/bootstrap.min.js?q='.QRDN);

        /* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */
        echo $this->Html->script('/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js?q='.QRDN);

        /* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
        echo $this->Html->script('/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js?q='.QRDN);

        /* Bootstrap Typeahead is taken from https://github.com/biggora/bootstrap-ajax-typeahead */
        echo $this->Html->script('/plugins/bootstrap-ajax-typeahead/js/bootstrap-typeahead.min.js?q='.QRDN);

        /* Chosen is taken from https://github.com/harvesthq/chosen/releases/ */
        echo $this->Html->script('/plugins/chosen/chosen.jquery.min.js?q='.QRDN);

        /* Toastr is taken from https://github.com/CodeSeven/toastr */
        echo $this->Html->script('/plugins/toastr/build/toastr.min.js?q='.QRDN);

        /* Usermgmt Plugin JS */
        echo $this->Html->script('/usermgmt/js/umscript.js?q='.QRDN);
        echo $this->Html->script('/usermgmt/js/ajaxValidation.js?q='.QRDN);

        echo $this->Html->script('/usermgmt/js/chosen/chosen.ajaxaddition.jquery.js?q='.QRDN);

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>
    <?php echo $this->element('mainMenu');?>

    <div class="container">
        <div class="content">
            <?php if($this->UserAuth->isLogged()) { echo $this->element('Usermgmt.dashboard'); } ?>
            <?php if($this->UserAuth->isLogged()) { echo $this->element('menu'); } ?>
            <?php echo $this->element('Usermgmt.message_notification'); ?>
            <?php echo $this->fetch('content'); ?>
            <div style="clear:both"></div>
        </div>
    </div>
    <div id="footer">
        <div class="container">
            <p class="muted">Copyright &copy; <?php echo date('Y');?> CWX Membership Portal. All Rights Reserved. Developed By  <a href="http://www.lovettcreations.org/" target='_blank'>Lovett Creations</a>.</p>
        </div>
    </div>
</body>
</html>
