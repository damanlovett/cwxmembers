<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice[]|\Cake\Collection\CollectionInterface $practices
 */
?>
<div
    class="practices index large-12 medium-12 columns content">
    <h3>
        <i class="fas fa-chalkboard fa-l fa-fw"></i>&nbsp;&nbsp;
        <?= __('Practices') ?>
    </h3>

    <?php foreach ($information as $information) : ?>

    <div class="alert alert-success" role="alert">
        <i class="fas fa-info-circle fa-3x fa-fw fa-pull-left"></i>
        <?= $information->page_content ?>
    </div>

    <?php endforeach; ?>








    <?php 
    $i = 0;
// Establish the output variable
    echo '<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">'; ?>


    <?php foreach ($practices as $practice) {

        if ($i % 2 == 0) { // if $i is divisible by our target number (in this case "3")
            echo '<tr><td>' . $practice->title . '&nbsp;&nbsp;' . $practice->schedule->format('F j, Y') . '</td>';
        } else {
            echo '<td>' . $practice->title . '&nbsp;&nbsp;' . $practice->schedule->format('F j, Y') . '</td>';
        }
        $i++;
    }
    echo '</tr></table>';
    ?>

</div>
</div>
</div>