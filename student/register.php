<?php


require_once "../database.php";
session_start();

if (isset($_SESSION['students_login'])) {
    header('location:index.php');
}

?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS - Register Form</title>
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

                <?php

                if (isset($_POST['signup'])) {

                    $fname      = $_POST['fname'];
                    $lname      = $_POST['lname'];
                    $email      = $_POST['email'];
                    $username   = $_POST['username'];
                    $password   = $_POST['password'];
                    $roll       = $_POST['roll'];
                    $register   = $_POST['register'];
                    $phone      = $_POST['phone'];




                    $input_errors = array();

                    if (empty($fname)) {
                        $input_errors['fname'] = "<p class='text-danger text-bold'>First name is required*</p>";
                    }
                    if (empty($lname)) {
                        $input_errors['lname'] = "<p class='text-danger text-bold'>Last name is required*</p>";
                    }
                    if (empty($email)) {
                        $input_errors['email'] = "<p class='text-danger text-bold'>Email is required*</p>";
                    }
                    if (empty($username)) {
                        $input_errors['username'] = "<p class='text-danger text-bold'>Username is required*</p>";
                    }
                    if (empty($password)) {
                        $input_errors['password'] = "<p class='text-danger text-bold'>Password is required*</p>";
                    }
                    if (empty($roll)) {
                        $input_errors['roll'] = "<p class='text-danger text-bold'>Roll is required*</p>";
                    }
                    if (empty($register)) {
                        $input_errors['register'] = "<p class='text-danger text-bold'>Registration number is required*</p>";
                    }
                    if (empty($phone)) {
                        $input_errors['phone'] = "<p class='text-danger text-bold'>Phone number is required*</p>";
                    }

                    if (count($input_errors) == 0) {



                        $email_check = mysqli_query($conn, "SELECT * FROM `students` WHERE `email` = '$email' ");

                        $email_rows = mysqli_num_rows($email_check);

                        if ($email_rows == 0) {


                            $username_check = mysqli_query($conn, "SELECT * FROM `students` WHERE `username` = '$username' ");

                            $username_rows = mysqli_num_rows($username_check);

                            if ($username_rows == 0) {
                                if (strlen($username) > 7) {
                                    if (strlen($password) > 5) {

                                        $result = mysqli_query($conn, "INSERT INTO `students`(`fname`, `lname`, `roll`, `register`, `email`, `username`, `password`, `phone`, `status`) VALUES ('$fname', '$lname', '$roll', '$register', '$email', '$username', '$password', '$phone', '0') ");

                                        if ($result) {
                                            echo "<p class='alert alert-success'>
                                        Registration successfully.Please Login now
                                           <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                                           <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </p>";
                                        } else {
                                            echo "<p class='alert alert-danger'>
                                         Sorry! Registration error !
                                           <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                                            <span aria-hidden='true'>&times;</span>
                                            </button>
                                         </p>";
                                        }
                                    } else {
                                        $password_length = "<p class='text-danger text-bold'>Password more then 5 character!</p>";
                                    }
                                } else {
                                    $username_length = "<p class='text-danger text-bold'>Username more then 8 character!</p>";
                                }
                            } else {
                                $username_exist = "<p class='text-danger text-bold'>Username already exists!</p>";
                            }
                        } else {
                            $email_exist = "<p class='text-danger text-bold'>Email address already exists!</p>";
                        }
                    }
                }

                ?>

                <div class="panel mb-none">
                    <div class="panel-content bg-scale-0">
                        <form action="" method="POST">
                            <?php if (isset($input_errors['fname'])) {
                                echo $input_errors['fname'];
                            } ?>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?= isset($fname) ? $fname : '' ?>">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <?php if (isset($input_errors['lname'])) {
                                echo $input_errors['lname'];
                            } ?>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?= isset($lname) ? $lname : '' ?>">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <?php if (isset($input_errors['email'])) {
                                echo $input_errors['email'];
                            } ?>
                            <?php if (isset($email_exist)) {
                                echo $email_exist;
                            } ?>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?= isset($email) ? $email : '' ?>">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                            <?php if (isset($input_errors['username'])) {
                                echo $input_errors['username'];
                            } ?>
                            <?php if (isset($username_exist)) {
                                echo $username_exist;
                            } ?>
                            <?php if (isset($username_length)) {
                                echo $username_length;
                            } ?>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?= isset($username) ? $username : '' ?>">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <?php if (isset($input_errors['password'])) {
                                echo $input_errors['password'];
                            } ?>
                            <?php if (isset($password_length)) {
                                echo $password_length;
                            } ?>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="password" class="form-control" name="password" placeholder="Password" value="<?= isset($password) ? $password : '' ?>">
                                    <i class="fa fa-key"></i>
                                </span>
                            </div>
                            <?php if (isset($input_errors['roll'])) {
                                echo $input_errors['roll'];
                            } ?>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" name="roll" placeholder="Roll" pattern="[0-9]{6}" value="<?= isset($roll) ? $roll : '' ?>">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </div>
                            <?php if (isset($input_errors['register'])) {
                                echo $input_errors['register'];
                            } ?>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" name="register" placeholder="Register number" pattern="[0-9]{6}" value="<?= isset($register) ? $register : '' ?>">
                                    <i class="fa fa-sort-numeric-asc"></i>
                                </span>
                            </div>
                            <?php if (isset($input_errors['phone'])) {
                                echo $input_errors['phone'];
                            } ?>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" name="phone" placeholder="01*******" pattern="01[1|5|6|7|8|9][0-9]{8}" value="<?= isset($phone) ? $phone : '' ?>">
                                    <i class="fa fa-phone"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Register" name="signup" class="btn btn-primary btn-block">
                            </div>
                            <div class="form-group text-center">
                                Have an account?, <a href="login.php">Sign In</a>
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