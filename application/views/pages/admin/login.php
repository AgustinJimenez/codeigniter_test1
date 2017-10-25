<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/css/iCheck/square/blue.css') ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <?php if( ! isset( $on_hold_message ) ):?>
  
    <?php if( isset( $login_error_mesg ) ):?>
      <div style="border:1px solid red;">
        <p class="login-box-msg">
          <?= 'Login Error #' . $this->authentication->login_errors_count . '/' . config_item('max_allowed_attempts') . ': Invalid Username, Email Address, or Password.' ?>
        </p>
        <p class="login-box-msg">
          Username, email address and password are all case sensitive.
        </p>
      </div>
    <?php endif;?>

    <?php if( $this->input->get(AUTH_LOGOUT_PARAM) ):?>

      <div style="border:1px solid green">
        <p class="login-box-msg">
          You have successfully logged out.
        </p>
      </div>

    <?php endif;?>
    <div class="login-box-body">

      <?= form_open($login_url , ['class' => 'std-form']) ?>

        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="login_string" id="login_string" placeholder="Username or Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" class="form-control password" id="login_pass" name="login_pass" placeholder="Password" <?php 
        if( config_item('max_chars_for_password') > 0 )
          echo 'maxlength="' . config_item('max_chars_for_password') . '"'; 
      ?>  autocomplete="off" readonly="readonly" onfocus="this.removeAttribute('readonly');" >
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="row">
          <div class="col-xs-8">
            <a href="register.html" class="text-center">Register a new membership</a>
            <?php if( config_item('allow_remember_me') ): ?>
              <label for="remember_me" class="form_label">Remember Me</label>
              <input type="checkbox" id="remember_me" name="remember_me" value="yes" />
            <?php endif; ?>
            
        <?php $link_protocol = USE_SSL ? 'https' : NULL; ?>
        <p>
          <a href="<?php echo site_url('examples/recover', $link_protocol); ?>">
            Can't access your account?
          </a>
        </p>
          </div>

          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
        <?= form_close() ?>
      <?php else:?>
        <div style="border:1px solid red;">
          <p>
            Excessive Login Attempts
          </p>
          <p>
            You have exceeded the maximum number of failed login<br />
            attempts that this website will allow.
          <p>
          <p>
            Your access to login and account recovery has been blocked for ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes.
          </p>
          <p>
            Please use the <a href="/examples/recover">Account Recovery</a> after ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes has passed,<br />
            or contact us if you require assistance gaining access to your account.
          </p>
        </div>
      

    </div>
  <?php endif;?>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?= base_url('assets/js/icheck.min.js') ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
