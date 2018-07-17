 <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav navbar-center fa-ul" style="margin-left:20px">
         <p class="navbar-text pull-right"><?= $var['first_name'];?>, welcome to your CWX portal <span style="margin-left:15px"><?= $this->Html->link(__('Sign Out'), ['controller'=>'Users', 'action'=>'logout', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-sm btn-default']);?></span></p>
        <li><?= $this->Html->link(__('  My Profile'), ['controller' => 'users', 'action' => 'mview','plugin'=>false], ['class'=>'fas fa-user menuIcon','title'=>'my Profile']);?></li>
        <li><?= $this->Html->link(__('  Shows'), ['controller' => 'months', 'action' => 'index','plugin'=>false], ['class'=>'fas fa-calendar menuIcon', 'title'=>'View Shows']);?></li>


        <li><?= $this->Html->link(__('  Practices'), ['controller' => 'practices', 'action' => 'index','plugin'=>false], ['class'=>'fas fa-chalkboard menuIcon', 'title'=>'View Practices']);?></li>
        <li><?= $this->Html->link(__('  My Activities'), ['controller' => 'users', 'action' => 'me','plugin'=>false], ['class'=>'fas fa-user-circle menuIcon', 'title'=>'My Activities']);?></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-weight:600">System Manager <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('Dashboard'), ['controller' => 'ClubStandings', 'action' => 'index','plugin'=>false]);?></li>
            <li><?= $this->Html->link(__('Table Manager'), ['controller' => 'dropdowns', 'action' => 'index','plugin'=>false]);?></li>
            <li><?= $this->Html->link(__('Club Standings'), ['controller' => 'dropdowns', 'action' => 'index','plugin'=>false]);?></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link(__('Shows'), ['controller' => 'shows', 'action' => 'manager','plugin'=>false]);?></li>
            <li><?= $this->Html->link(__('Practice'), ['controller' => 'practices', 'action' => 'manager','plugin'=>false]);?></li>
            <li><?= $this->Html->link(__('Check ins'), ['controller' => 'checkins', 'action' => 'index','plugin'=>false]);?></li>
            <li><?= $this->Html->link(__('Players'), ['controller' => 'users', 'action' => 'index','plugin'=>false]);?></li>
            <li><?= $this->Html->link(__('Membership'), ['controller' => 'UserDetails', 'action' => 'index','plugin'=>false]);?></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
