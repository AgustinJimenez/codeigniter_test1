 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">

      <li class="header">SETTINGS</li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-user-circle" aria-hidden="true" style="color:white;"></i> <span><?= $this->lang->line('index_heading') ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active">
              <a href="<?= site_url('admin/users') ?>">
                <i class="fa fa-users" aria-hidden="true"></i> 
                <?= $this->lang->line('index_heading') ?>
              </a>
              <a href="<?= site_url('admin/users/create') ?>">
                <i class="fa fa-user-plus" aria-hidden="true"></i> 
                <?= $this->lang->line('create_user_heading') ?>
              </a>
              <a href="<?= site_url('admin/groups/create') ?>">
                <i class="fa fa-users" aria-hidden="true"></i> 
                <?= $this->lang->line('create_group_title') ?>
              </a>
              
              </li>
          </ul>
        </li>s
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>