
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Media Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo e(asset('dist/img/avator.jpg')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">My Media Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="<?php echo e(route('dashboard')); ?>" class="nav-link active">
              <i class="nav-icon fas fa-user-circle "></i>
              <p>
                My Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(route('admin#list')); ?>" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
              <p>
                User List
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(route('admin#category')); ?>" class="nav-link">
                <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(route('admin#post')); ?>" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
              <p>
                Post
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(route('admin#trendPost')); ?>" class="nav-link">
                <i class="nav-icon fas fa-bookmark"></i>
              <p>
                Trend Post
              </p>
            </a>
          </li>

          <li class="nav-item">
              <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button class="btn btn-dark nav-link text-left text-white">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                      Logout
                    </p>
                  </button>
              </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content -->
    <div class="container-fluid">
        <?php echo $__env->yieldContent('content'); ?>

    </div>
    <!--/. Content -->
  </div>
  <!-- /.content-wrapper -->




</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH /home/triplekay/Desktop/My_Workspace/My_Media_Project/My_Media_Admin/resources/views/admin/layout/app.blade.php ENDPATH**/ ?>