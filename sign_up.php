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
    <link rel="stylesheet" href="css/kcfc.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js" integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
    
    <style>
    
    .form-login .form-group input[type=radio]{
    height: 60% !important;
}

    
    </style>
</head>

<body ng-app="matrimony" ng-controller="matrimonyController">
    <?php include_once("master/header.php"); ?>

    <!-- REGISTER -->
    <section>
        <div class="login register">
            <div class="container">
                <div class="row">

                    <div class="inn">
                        <div class="lhs">
                            <div class="tit">
                                <h2>Now <b>Find your life partner</b> Easy and fast.</h2>
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
                                    <h1>Sign up to Matrimony</h1>
                                    <p>Already a member? <a href="login.php">Login</a></p>
                                </div>
                                <div class="form-login">
                                    <form name="registrationForm" action="controller/user-submit.php" method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="lb">Email:</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" ng-model="email" ng-pattern="/^[\w-\.]+@[\w-\.]+\.[a-zA-Z]{2,}$/" ng-class="{'is-invalid': registrationForm.email.$invalid && registrationForm.email.$touched}" required>
                                                    <div class="invalid-feedback">
                                                        <p ng-show="registrationForm.email.$touched && registrationForm.email.$invalid && registrationForm.email.$error.required">
                                                            Email ID is mandatory</p>
                                                        <span ng-show="registrationForm.email.$error.pattern">Please
                                                            enter a valid email id</span>
                                                        <p ng-show="registrationForm.email.$dirty && registrationForm.email.$error.maxlength">
                                                            Maximum 50 characters only allowed</p>
                                                        <p ng-if="mailExist">This email id is already registered</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="lb">Phone:</label>
                                                    <input type="number" class="form-control" id="phone" placeholder="Enter phone number" name="phone" ng-model="phone" id="phone" ng-maxlength="15" ng-minlength="6" ng-pattern="/^[0-9]*$/" required ng-class="{'is-invalid': registrationForm.phone.$invalid && registrationForm.phone.$touched}">
                                                    <div class="invalid-feedback">
                                                        <p ng-if="registrationForm.phone.$touched && registrationForm.phone.$error.required && !registrationForm.phone.$dirty">
                                                            Phone number is required</p>
                                                        <p ng-if="registrationForm.phone.$dirty && registrationForm.phone.$error.pattern || registrationForm.phone.$invalid" ng-hide="registrationForm.phone.$pristine">Please enter a
                                                            valid phone number</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="lb">Date Of Birth:</label>
                                                    <input type="date" class="form-control" name="date_of_birth" ng-model="date_of_birth" ng-class="{'is-invalid': registrationForm.date_of_birth.$invalid && registrationForm.date_of_birth.$touched}" required>
                                                    <div class="invalid-feedback">
                                                        <p ng-show="registrationForm.date_of_birth.$touched && registrationForm.date_of_birth.$invalid && registrationForm.date_of_birth.$error.required">
                                                            Date Of Birth is mandatory</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="lb">Password:</label>
                                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" ng-model="password" ng-maxlength="50" ng-pattern="/^(?=.{8,}$)(?=.*[a-z])(?=.*[0-9]).*$/" ng-class="{'is-invalid': registrationForm.password.$invalid && registrationForm.password.$touched}" required>
                                                    <div class="invalid-feedback">
                                                        <p ng-show="registrationForm.password.$touched && registrationForm.password.$invalid && registrationForm.password.$error.required">
                                                            Password is mandatory</p>
                                                        <p ng-show="registrationForm.password.$error.pattern">
                                                            Password should be at least 8 characters long and should contain atleast one number, one lowercase and one character</p>
                                                        <p ng-show="registrationForm.password.$dirty && registrationForm.password.$error.maxlength">
                                                            Password should be less than 50 characters</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="district" class="lb">Gender</label>
                                                    <div class="d-flex justify-content-between">
                                                        
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender" value="1" id="checkbox-male" ng-model="gender" ng-required="!gender">
                                                            <label class="form-check-label" for="checkbox-male">
                                                                Male
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender" value="2" id="checkbox-female" ng-model="gender" ng-required="!gender">
                                                            <label class="form-check-label" for="checkbox-female">
                                                                Female
                                                            </label>
                                                        </div>
                                                        
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender" value="3" id="checkbox-others" ng-model="gender" ng-required="!gender">
                                                            <label class="form-check-label" for="checkbox-others">
                                                                Others
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="country" class="lb">Country</label>
                                                    <select class="form-select" name="country" id="country" ng-model="country" ng-options="country.id as country.description for country in countryList" ng-class="{'is-invalid': registrationForm.country.$invalid && registrationForm.country.$touched}" required>
                                                        <option value="">-- select Country --</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        <p ng-show="registrationForm.country.$touched && registrationForm.country.$error.required">Country is mandatory</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="state" class="lb">State</label>
                                                    <select class="form-select" name="state" id="state" ng-model="state" ng-options="state.id as state.description for state in stateList" ng-change="getDistrict();" ng-class="{'is-invalid': registrationForm.state.$invalid && registrationForm.state.$touched}" required>
                                                        <option value="">-- select state --</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        <p ng-show="registrationForm.state.$touched && registrationForm.state.$error.required">State is mandatory</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="district" class="lb">District</label>
                                                    <select class="form-select" name="district" id="district" ng-model="district" ng-options="district.id as district.description for district in districtList" ng-class="{'is-invalid': registrationForm.district.$invalid && registrationForm.district.$touched}" required>
                                                        <option value="">-- select district --</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        <p ng-show="registrationForm.district.$touched && registrationForm.district.$error.required">District is mandatory</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="agree"> Creating
                                                an account means you’re okay with our <a href="#!">Terms of Service</a>,
                                                Privacy Policy, and our default Notification Settings.
                                            </label>
                                        </div>
                                        <input type="hidden" value="register" name="action">
                                        <button type="submit" class="btn btn-primary" ng-disabled="registrationForm.$invalid">Create Account</button>
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
            $scope.getState = function() {
                $http.get("controller/state-list.php")
                    .then(function(response) {
                        $scope.stateList = response.data;
                    }).catch(function(error) {
                        console.error(error)
                    }).finally(function() {

                    })
            }
            $scope.getCountry = function() {
                $http.get("controller/country-list.php")
                    .then(function(response) {
                    console.log(response);
                        $scope.countryList = response.data;
                    }).catch(function(error) {
                        console.error(error)
                    }).finally(function() {

                    })
            }
            $scope.getDistrict = function() {
                $http.get("controller/district-list.php", {
                    params: {
                        "state_id": $scope.state
                    }
                }).then(function(response) {
                    $scope.districtList = response.data;
                }).catch(function(error) {
                    console.error(error)
                }).finally(function() {

                })
            }

            $scope.districtList = [];
            $scope.getState();
            $scope.getCountry();
        });
    </script>
</body>

</html>