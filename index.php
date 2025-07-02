<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STMIK PAMITRAN | LOGIN</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
</head>
<!-- style="background-image: url('app/dist/img/gedung.jpg');" -->

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <p class="h1"><b>LOGIN</b></p>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login in to start your session</p>

                <form action="config/authentication.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
                <!-- /.social-auth-links -->

                <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
                <!-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="app/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="app/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- AdminLTE App -->
    <script src="app/dist/js/adminlte.min.js"></script>
</body>
<?php
if (isset($_GET['error'])) {
  $x = ($_GET['error']);
  if ($x == 1) {
    echo "
    <script>
        var Toast = Swal.mixin({
        toast: true,
        position: 'center-top',
        showConfirmButton: false,
        timer: 3000
      });
    Toast.fire({
      icon: 'error',
      title: 'Incorrect Username or Password'
    });
    window.history.replaceState(null, null, window.location.pathname);
    </script>
    ";
  } else if ($x == 2) {
    echo "
    <script>
        var Toast = Swal.mixin({
        toast: true,
        position: 'center-top',
        showConfirmButton: false,
        timer: 3000
      });
    Toast.fire({
      icon: 'warning',
      title: 'Input Username or Password'
    });
    window.history.replaceState(null, null, window.location.pathname);
    </script>
    ";
  } else {
    echo '';
  }
}
?>

</html>