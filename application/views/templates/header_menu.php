
<nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <!-- <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a> -->
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"> <?=$this->session->userdata('nama')?></i>
        <!-- <span class="badge badge-warning navbar-badge">15</span> -->
      </a>
      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <span class="dropdown-item dropdown-header"><?=$this->session->userdata('nama')?></span>
        <!-- <div class="dropdown-divider"></div> -->
        <!-- <li><a href="<?php echo base_url('auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li> -->
        <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>" >
          <i class="glyphicon glyphicon-log-out"></i> <span>Logout</span>
        </a>
        
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar