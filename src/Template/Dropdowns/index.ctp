<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dropdown[]|\Cake\Collection\CollectionInterface $dropdowns
 */
?>
<?= $this->Html->script('custom.js');?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dropdown'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Shows'), ['controller' => 'Shows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Show'), ['controller' => 'Shows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dropdowns index large-9 medium-8 columns content">


<div class="col-md-4 hideDiv" >
    <select class="company">
          <option value=''><strong>Name</strong></option>
          <option value="Company A">Company A</option>
          <option value="Company B">Company B</option>
    </select>
</div>

<button onclick="appendText()">Append text</button>

      <?php       echo $this->Form->control('product',['type'=>'select', 'class'=>'product']);?>


<!-- this is first dropdown, second dropdown will be based on selection from this dropdown -->
<form method="post" action="" style="display:none">
<select name="first_dropdown">
<option value="a">a</option>
<option value="b">b</option>
<option value="c">c</option>
</select>
<input type="submit" />
</form>
<?php
if (isset($_POST['first_dropdown']) && !empty($_POST['first_dropdown']) ):
?>


<select name="second_dropdown">

<?php
//if user select a
if ($_POST['first_dropdown'] == "a"):
?>
<option value="a1">a1</option>
<option value="a2">a2</option>
<option value="a3">a3</option>
<?php endif; ?>

<?php
//if user select b
if ($_POST['first_dropdown'] == "b"):
?>
<option value="b1">b1</option>
<option value="b2">b2</option>
<option value="b3">b3</option>
<?php endif; ?>

<?php
//if user select c
if ($_POST['first_dropdown'] == "c"):
?>
<option value="c1">c1</option>
<option value="c2">c2</option>
<option value="c3">c3</option>
<?php endif; ?>

</select>

<?php endif; ?>




















    <h3><?= __('Dropdowns') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dropdowns as $dropdown): ?>
            <tr>
                <td><?= $this->Number->format($dropdown->id) ?></td>
                <td><?= h($dropdown->name) ?></td>
                <td><?= h($dropdown->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dropdown->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dropdown->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dropdown->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dropdown->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
