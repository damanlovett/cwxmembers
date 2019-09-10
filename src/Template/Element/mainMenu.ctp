<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-center fa-ul" style="margin-left:20px">
        <p class="navbar-text pull-right">
            <span class="hidden-xs hidden-sm"> <?= $var['first_name']; ?>, welcome to your CWX portal</span>
            <span style="margin-left:15px">
                <?= $this->Html->link(__('Sign Out'), ['controller' => 'Users', 'action' => 'logout', 'plugin' => 'Usermgmt'], ['class' => 'btn btn-sm btn-default']); ?>
            </span>
        </p>
        <li>
            <?= $this->Html->link(__('  My Profile'), ['controller' => 'users', 'action' => 'mview', 'plugin' => false], ['class' => 'fas fa-user menuIcon', 'title' => 'my Profile']); ?>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle fas fa-pen-alt menuIcon" data-toggle="dropdown" role="button"
                aria-haspopup="true" aria-expanded="false" style="font-weight:600"> Sign Ups
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">

                <li>
                    <?= $this->Html->link(__('  Sign Up For Shows'), ['controller' => 'months', 'action' => 'index', 'plugin' => false], ['title' => 'Sign up For Shows']); ?>

                    <?= $this->Html->link(__('  Available Shows'), ['controller' => 'shows', 'action' => 'dashboard', 'plugin' => false], ['title' => 'Available Shows']); ?>

                </li>
            </ul>
        </li>
        <li>
            <?= $this->Html->link(__('  Practices'), ['controller' => 'practices', 'action' => 'index', 'plugin' => false], ['class' => 'fas fa-chalkboard menuIcon', 'title' => 'View Practices']); ?>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle fas fa-address-book menuIcon" data-toggle="dropdown" role="button"
                aria-haspopup="true" aria-expanded="false" style="font-weight:600"> Directory
                <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">

                <li>
                    <?= $this->Html->link(__('  Player Gallery'), ['controller' => 'users', 'action' => 'gallery', 'plugin' => 'Usermgmt'], ['title' => 'CWX Gallery']); ?>
                </li>
                <li>
                    <?= $this->Html->link(__('  Player Phone List'), ['controller' => 'users', 'action' => 'players', 'plugin' => 'Usermgmt'], ['title' => 'CWX Phone List']); ?>
                </li>
            </ul>
        </li>
        </li>
        <li>
            <?= $this->Html->link(__('  My Activities'), ['controller' => 'users', 'action' => 'me', 'plugin' => false], ['class' => 'fas fa-user menuIcon', 'title' => 'My Activities']); ?>
        </li>
        <!-- Beginning of System Manager -->
        <?php if ($this->UserAuth->HP('Shows', 'manager', false)) {
            ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false" style="font-weight:600">System Manager
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="disabled">
                    <?= $this->Html->link(__('Dashboard'), ['controller' => 'ClubStandings', 'action' => 'index', 'plugin' => false]); ?>
                </li>
                <li>
                    <?= $this->Html->link(__('  Table Manager'), ['controller' => 'dropdowns', 'action' => 'manager', 'plugin' => false], ['class' => 'text-success', 'title' => 'Table Manager']); ?>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                    <?= $this->Html->link(__('Shows'), ['controller' => 'months', 'action' => 'manager', 'plugin' => false]); ?>
                </li>
                <li>
                    <?= $this->Html->link(__('Practice'), ['controller' => 'practices', 'action' => 'manager', 'plugin' => false]); ?>
                </li>
                <li class="disabled">
                    <?= $this->Html->link(__('Check ins'), ['controller' => 'checkins', 'action' => 'index', 'plugin' => false]); ?>
                </li>
                <li style="font-weight:bold; color:green">
                    <?= $this->Html->link(__('Members'), ['controller' => 'users', 'action' => 'members', 'plugin' => 'Usermgmt'], ['class' => 'text-success']); ?>
                </li>
                <li class="disabled">
                    <?= $this->Html->link(__('Membership'), ['controller' => 'UserDetails', 'action' => 'index', 'plugin' => false]); ?>
                </li>
                <?php if ($this->UserAuth->HP('Users', 'online', 'Usermgmt')) {
                            echo "<li>" . $this->Html->link(__('System Admin'), ['controller' => 'Users', 'action' => 'index', 'plugin' => 'Usermgmt']) . "</li>";
                        } ?>

                <?php
                }; ?>
                <!-- End of System Manager -->
            </ul>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->