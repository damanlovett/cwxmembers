<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<div class="shows view large-12 medium-11 columns content">
<h3><i class="fas fa-calendar fa-2x fa-fw"></i><?= __('Shows') ?></h3>
       <div class="fpageTitle">
            <h1><?= h($show->dropdown->name) ?></h1>
            <h2><?= h($show->schedule->format('F j, Y - g:i A')) ?></h2>
        </div>
<?php if (!empty($show->notes)) :?>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default" style="padding: .25rem">
        <div class="panel-heading" role="tab" id="headingOne">
          <h2 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <span class="glyphicon glyphicon-triangle-bottom" style="padding-right: 10px"></span>Show Information
            </a>
          </h2>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body" style="background-color:white;">
            <?= $this->Text->autoParagraph(h($show->notes)); ?>
          </div>
        </div>
      </div>
    </div>
<?php endif; ?>

    <div class="related">
        <h3><?= __('Line Ups') ?></h3>
        <?php if (!empty($inshows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Player') ?></th>
                <th scope="col"><?= __('Primary Role') ?></th>
                <th scope="col"><?= __('Secondary Role') ?></th>
            </tr>
            <?php foreach ($inshows as $inshows): ?>
            <tr>
                <td><?= h($inshows->user->fullName) ?></td>
                <td><?= h($inshows->role->name) ?></td>
                <td><?= h($inshows->roles2->name) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
<div>

  </div>
</div>
