<?php
session_start();

include_once ('admin/user.php');
$user = new User();
if (isset($_REQUEST['submit'])){
    extract($_REQUEST);
    $login = $user->userLogin($email,$password);
    if ($login) {
        // Registration Success
        header("location: /project/index.php");
    } else {
        // Registration Failed
        echo "<div class='alert alert-danger alert-dismissible text-center'>
                    Wrong username or password.
            </div>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MWS Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/vendors/feather/feather.css">

    <link rel="stylesheet" href="admin/vendors/feather/feather.css">
    <link rel="stylesheet" href="admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="admin/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script >

        function submitlogin() {
            var form = document.getElementById("form");
            console.log(form);
            if(form.email.value == ""){
                alert("Enter email or username." );
                return false;
            }
            else if(form.password.value == ""){
                alert("Enter password." );
                return false;
            }
        }

    </script>
</head>

<body>


<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                            <h1 class="m-0 display-5 font-weight-semi-bold mb-3">
              <span class="text-primary font-weight-bold  px-3 mr-1">
                  MWS Login </span>
                            </h1>
                        </div>
                        <h4>Hello! Let's get started</h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>
                        <form class="pt-3" method="post" name="login" id="form" action="">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" autocomplete="off" class="form-control form-control-lg"  placeholder="Password" required>
                            </div>
                            <div class="mt-3">
                                <button onclick="return(submitlogin());" type="submit" name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">SIGN IN</button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        Keep me signed in
                                    </label>
                                </div>
                                <a href="#" class="auth-link text-black">Forgot password?</a>
                            </div>

                            <div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="./register.php" class="text-primary">Create</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="admin/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="admin/js/off-canvas.js"></script>
<script src="admin/js/hoverable-collapse.js"></script>
<script src="admin/js/template.js"></script>
<script src="admin/js/settings.js"></script>
<script src="admin/js/todolist.js"></script>
<!-- endinject -->
</body>

</html>
