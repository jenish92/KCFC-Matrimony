<?php 
    require_once("lib/variables.php");  
?>
<!doctype html>
<html lang="en">

<head>
    <title>Wedding Matrimony</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#f6af04">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js" integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
</head>

<body ng-app="matrimony" ng-controller="matrimonyController">
    <!-- PRELOADER -->

    <?php include_once("master/header.php"); ?>

    <!-- LOGIN -->
    <section>
        <div class="login">
            <div class="container">
                <div class="row">

                    <div class="inn">
                        <div class="lhs">
                            <div class="tit">
                                <h2>Now <b>Find <br> your life partner</b> Easy and fast.</h2>
                            </div>
                            <div class="im">
                                <img src="images/login-couple.png" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs">
                            <div>
                                <div class="form-tit">
                                    <h4>Start for free</h4>
                                    <h1>Sign in to KCFC Matrimony</h1>
                                    <p>Not a member? <a href="sign_up.php">Sign up now</a></p>
                                </div>
                                <div class="form-login">
                                    <form action="controller/user-submit.php" method="post" name="loginForm">
                                        <div class="form-group">
                                            <label class="lb">Email:</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" ng-model="email" ng-pattern="/^[\w-\.]+@[\w-\.]+\.[a-zA-Z]{2,}$/" ng-class="{'is-invalid': loginForm.email.$invalid && loginForm.email.$touched}" required>
                                            <div class="invalid-feedback">
                                                <p ng-show="loginForm.email.$touched && loginForm.email.$invalid && loginForm.email.$error.required">
                                                    Email ID is mandatory</p>
                                                <span ng-show="loginForm.email.$error.pattern">Please
                                                    enter a valid email id</span>
                                                <p ng-show="loginForm.email.$dirty && loginForm.email.$error.maxlength">
                                                    Maximum 50 characters only allowed</p>
                                                <p ng-if="mailExist">This email id is already registered</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Password:</label>
                                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" ng-model="password" ng-maxlength="50" ng-pattern="/^(?=.{8,}$)(?=.*[a-z])(?=.*[0-9]).*$/" ng-class="{'is-invalid': loginForm.password.$invalid && loginForm.password.$touched}" required>
                                            <div class="invalid-feedback">
                                                <p ng-show="loginForm.password.$touched && loginForm.password.$invalid && loginForm.password.$error.required">
                                                    Password is mandatory</p>
                                                <p ng-show="loginForm.password.$error.pattern">
                                                    Password should be at least 8 characters long and should contain atleast one number, one lowercase and one character</p>
                                                <p ng-show="loginForm.password.$dirty && loginForm.password.$error.maxlength">
                                                    Password should be less than 50 characters</p>
                                            </div>
                                        </div>
                                        <input type="hidden" value="login" name="action">
                                        <button type="submit" class="btn btn-primary" ng-disabled="loginForm.$invalid">Sign in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- FOOTER -->
    <?php include_once("master/footer.php"); ?>
    <!-- END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/select-opt.js"></script>
    <script src="js/custom.js"></script>
    <script>
        const app = angular.module('matrimony', []);
        app.controller('matrimonyController', function($scope, $http) {

        });
    </script>
</body>

</html>