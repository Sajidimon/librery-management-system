<?php

require_once "../database.php";

session_start();
if (isset($_SESSION['librerian_login'])) {
    header('location:index.php');
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];




    $result = mysqli_query($conn, "SELECT * FROM `librerian` WHERE `email` = '$email' or `username` = '$email'; ");



    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['password'] == $password) {
            $_SESSION['librerian_login'] = $email;
            $_SESSION['librerian_username'] = $row['username'];
            header('location:index.php');
        } else {
            $error = "<p class='alert alert-danger'>
                     Wrong password
            <button type='button' class='close' data-dismiss='alert' aria-label='close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </p>";
        }
    } else {
        $error = "<p class='alert alert-danger'>
                   Email or username is invalid!
                <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                 <span aria-hidden='true'>&times;</span>
                 </button>
                 </p>";
    }
}

?>


<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS - Login Form</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
    <div class="wrap">
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body animated slideInDown">
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--LOGO-->
            <div class="logo">
                <h2 class="text-primary text-center">Librery Management System</h2>
            </div>
            <div class="box">
                <!--SIGN IN FORM-->
                <?php if (isset($error)) {
                    echo $error;
                }
                ?>
                <div class="panel mb-none">
                    <div class="panel-content bg-scale-0">
                        <form action="" method="POST">
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" name="email" placeholder="Email or Username" value="<?php if (isset($email)) {
                                                                                                                                    echo $email;
                                                                                                                                } ?>">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <i class="fa fa-key"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-custom checkbox-primary">
                                    <input type="checkbox" id="remember-me" value="option1" checked>
                                    <label class="check" for="remember-me">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Sign in" name="login" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->
    <script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="../assets/javascripts/template-script.min.js"></script>
    <script src="../assets/javascripts/template-init.min.js"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
</body>

</html>