<header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          
          <!-- Tasks Menu -->
          <li>
            <a href="#" id="template-back-button">
              <i class="fa fa-arrow-left fa-1x" aria-hidden="true"></i>
            </a>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user-circle fa-1x" aria-hidden="true" style="color:white;"></i>
              <!-- The user image in the navbar-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">
                <?= $this->ion_auth->user()->row()->username ?>
                <i class="caret"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                  <i class="fa fa-user-circle fa-5x" aria-hidden="true" style="color:white;"></i>
                <p>
                  <?= $this->ion_auth->user()->row()->last_name . " " . $this->ion_auth->user()->row()->first_name ?>
                  <small><?= $this->ion_auth->user()->row()->email ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">

                  <a href="<?= site_url('/auth/logout') ?>" class="btn btn-danger" style="background-color: #dd4b39!important; color: white!important;">Sign out</a>

              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>