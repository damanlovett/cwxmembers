<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php $this->assign('title', 'My Activities'); ?>
<div class="users view large-12 medium-11 columns content">
    <h3>
        <i class="fas fa-user-circle fa-1x fa-fw"></i>&nbsp;&nbsp;
        <?= $user->first_name . "'s  Signups" ?>
        <div class="btn-toolbar pull-right" role="toolbar" aria-label="...">
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    My Activity Reports <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <?= $this->Html->link("<i class='fab fa-google-drive fa-fw'></i>&nbsp;&nbsp;Shortform Attestation", "https://goo.gl/ZMLffs", ['escape' => false, 'target' => '_blank', 'title' => 'Download Attestation Form']) ?>
                        <?= $this->Html->link("<i class='fab fa-google-drive fa-fw'></i>&nbsp;&nbsp;Shortform Guide", "https://goo.gl/WAH1E6", ['escape' => false, 'target' => '_blank', 'title' => 'Download Shortform Guide']) ?>
                        <?= $this->Html->link("<i class='fab fa-google-drive fa-fw'></i>&nbsp;&nbsp;Harassment Policy", "https://goo.gl/Lt1VeW", ['escape' => false, 'target' => '_blank', 'title' => 'Download Harassment Policy']) ?>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <?= $this->Html->link("<i class='fas fa-download fa-fw'></i>&nbsp;&nbsp;Practice Check Ins", [
                            'controller' => 'users', 'action' => 'practiceReport', $var['id']
                        ], ['escape' => false, 'title' => 'Download My Checkins']) ?>
                    </li>
                    <li>
                        <?= $this->Html->link("<i class='fas fa-download fa-fw'></i>&nbsp;&nbsp;Shows Sign Ups", [
                            'controller' => 'users', 'action' => 'signupReport', $var['id']
                        ], ['escape' => false, 'title' => 'Download My Sign Ups']) ?>
                    </li>
                    <li>
                        <?= $this->Html->link("<i class='fas fa-download fa-fw'></i>&nbsp;&nbsp;My Shows", ['controller' => 'users', 'action' => 'assignmentReport', $var['id']], ['escape' => false, 'title' => 'Download My Assignments']) ?>
                    </li>
                </ul>
            </div>
            <?= $this->Html->link(__('My Profile'), ['controller' => 'users', 'action' => 'mview'], ['class' => 'btn btn-sm', 'title' => 'My Profile']) ?>


        </div>

    </h3>


    <h4>
        <?= __('Club Membership') ?>
    </h4>
    <?php if (!empty($user->user_details)) : ?>
    <table class="table table-striped" cellpadding="0" cellspacing="0">

        <?php foreach ($user->user_details as $userDetails) : ?>
        <tr>
            <td class="cellHeader" scope="col">
                <?= __('Nickname') ?>
            </td>
            <td>
                <?= h($userDetails->nickname) ?>
            </td>
        <tr>
            <td class="cellHeader" scope="col">
                <?= __('Jersey') ?>
            </td>
            <td>
                <?= h($userDetails->jersey) ?>
            </td>
        <tr>
            <td class="cellHeader" scope="col">
                <?= __('Starting Year') ?>
            </td>
            <td>
                <?= $userDetails->has('starting_year') ? $userDetails->starting_year->format('Y') : '' ?>
            </td>
        <tr>
            <td class="cellHeader" scope="col">
                <?= __('Referee') ?>
            </td>
            <td>
                <?= $userDetails->referee ? "<span class='text-success'><i class='fas fa-check-circle fa-fw'></i></span>" : "No" ?>
            </td>
        <tr>
            <td class="cellHeader" scope="col">
                <?= __('Host') ?>
            </td>
            <td>
                <?= $userDetails->host ? "<span class='text-success'><i class='fas fa-check-circle fa-fw'></i></span>" : "No" ?>
            </td>
        <tr>
            <td class="cellHeader" scope="col">
                <?= __('Voice') ?>
            </td>
            <td>
                <?= $userDetails->voice ? "<span class='text-success'><i class='fas fa-check-circle fa-fw'></i></span>" : "No" ?>
            </td>
        <tr>
            <td class="cellHeader" scope="col">
                <?= __('Member Standing') ?>
            </td>
            <td>
                <?= $userDetails->member_standing['title'] ?>
            </td>
        </tr>
        <tr>
            <td class="cellHeader" scope="col">
                <?= __('Club Standing') ?>
            </td>
            <td>
                <?= $standing ?>
            </td>
        </tr>
        <tr>
            <td class="cellHeader" scope="col">

                <!-- ABC Training modal -->
                <?php echo $this->Html->link('', '/#', ['data-toggle' => 'modal', 'data-target' => ".bs-abc-modal-lg", 'class' => 'fas fa-info-circle fa-l  fa-fw text-success', 'title' => 'ABC Information']); ?>

                <div class="modal fade bs-abc-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col-md-12" style="padding:30px;">
                                    <h3>ABC CERTIFICATION:</h3>
                                    <p>As you all know by now, we had a visit from the ALE
                                        (awww) a few weeks ago and we need to make sure
                                        that
                                        anyone who works selling alcohol at our concession
                                        has their ABC Certification. If you have not yet
                                        been
                                        certified, here is what you need to do:</p>
                                    <ul>
                                        <li>Go to the ABC Website</li>
                                        <li>Click on “Register for Seller/Server Training
                                            Program”</li>
                                        <li>Click on the “Search for a business that I
                                            represent that currently holds permits OR has
                                            applied for permits”
                                            radio button</li>
                                        <li>Type “Worx Comedy Theatre” in the “Trade Name”
                                            field and click on the “Search” button.</li>
                                        <li>Select the club, register on the site and take
                                            the test</li>
                                        <li>When you are done, you’ll be able to download a
                                            PDF copy of the ABC Certificate. Please e-mail
                                            your certification
                                            to myself, Ashley and Michael Teague.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- End ABC Training modal -->
                <?= __('ABC Training') ?>
            </td>
            <td>
                <?= $userDetails->abc ? "<span class='text-success'><i class='fas fa-check-circle fa-fw'></i>Completed: " . $this->Switches->date($userDetails->abc) . "</span> " : "<span class='text-muted'>Not Completed</span>" ?>



            </td>
        </tr>
        <tr>
            <td class="cellHeader" scope="col">
                <!-- Harrassment modal -->
                <?php echo $this->Html->link('', '/#', ['data-toggle' => 'modal', 'data-target' => ".bs-harassment-modal-lg", 'class' => 'fas fa-info-circle fa-l  fa-fw text-success', 'title' => 'Shortform Guide And Harassment Policy']); ?>

                <div class="modal fade bs-harassment-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col-md-12" style="padding:30px;">
                                    <h3>SHORTFORM GUIDE & HARASSEMENT POLICY SIGNOFFS</h3>
                                    <p>In order to be eligible to practice, play or support
                                        any of our shows you will need to have signed off
                                        on
                                        the ComedyWorx Shortform Guide Attestation Form. It
                                        requires that you have read and agree to the
                                        policies
                                        in Shortform Guide and Harassment Policy. </p>
                                    <div class="list-group">
                                        <span class="list-group-item active">
                                            Important Documents
                                        </span>
                                        <span class="list-group-item">Shortform Attestation
                                            Form - [
                                            <a href="https://goo.gl/ZMLffs" target="_blank">https://goo.gl/ZMLffs</a>
                                            ]</span>
                                        <span class="list-group-item">Shortform Guide: [
                                            <a href="https://goo.gl/WAH1E6" target="_blank">https://goo.gl/WAH1E6</a>
                                            ]</span>
                                        <span class="list-group-item">Harassment Policy: [
                                            <a href="https://goo.gl/Lt1VeW" target="_blank">https://goo.gl/Lt1VeW</a>
                                            ]</span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- End Harrassment modal -->
                <?= __('Harassment Policy') ?>
            </td>
            <td>
                <?= $userDetails->harassment ? "<span class='text-success'><i class='fas fa-check-circle fa-fw'></i>Completed: " . $this->Switches->date($userDetails->harassment) . "</span> " : "<span class='text-muted'>Not Completed</span>" ?>

            </td>
    </table>
    <?php endforeach; ?>
    <?php endif; ?>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h2>&nbsp;</h2>
        <span class="pull-left">
            <!-- Tabs -->

        </span>
    </div>
    <hr />
    <div class="panel-body">

        <div class="users view large-12 medium-11">
            <table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">
                            <i class="fas fa-cog fa-l fa-fw"></i>
                            <?= __('Show') ?>
                        </th>
                        <th scope="col">
                            <i class="fas fa-clock fa-l fa-fw"></i>
                            <?= __('Date') ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($signups as $signup) : ?>
                    <tr>
                        <td>
                            <?php if (!empty($signup->Dropdowns['name'])) {
                                        echo $signup->Dropdowns['name'];
                                    } ?>
                        </td>
                        <td>
                            <?php if (!empty($signup->show->schedule)) {
                                        echo $this->Switches->dateTime($signup->show->schedule);
                                    } ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p>
                    <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
                </p>
            </div>
        </div>



    </div>
</div>
</div>
</div>