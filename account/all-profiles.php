<?php 
    require_once("../lib/variables.php");  
    require_once (BASE_PATH."/lib/db-connections.php");
    require_once(BASE_PATH."/lib/Profile.php");
    require_once(BASE_PATH."/lib/Master.php");
    $database = new Database();
    $db = $database->getConnection();
    $profile = new Profile($db);    
    $master = new Master($db);
    $relegion = $master->MasterTable("religion");

    $profileList = $profile->ProfileLists();
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
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/animate.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
</head>

<body>
<?php include_once(BASE_PATH."/master/header.php"); ?>
    <!-- SUB-HEADING -->
    <section>
        <div class="all-pro-head">
            <div class="container">
                <div class="row">
                    <h1>Lakhs of Happy Marriages</h1>
<!--                    <a href="sign-up.html">Join now for Free <i class="fa fa-handshake-o" aria-hidden="true"></i></a>-->
                </div>
            </div>
        </div>
        <!--FILTER ON MOBILE VIEW-->
        <div class="fil-mob fil-mob-act">
            <h4>Profile filters <i class="fa fa-filter" aria-hidden="true"></i> </h4>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="all-weddpro all-jobs all-serexp chosenini">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 fil-mob-view">
                        <span class="filter-clo">+</span>
                        <!-- START -->
                        <div class="filt-com lhs-cate">
                            <h4><i class="fa fa-search" aria-hidden="true"></i> I'm looking for</h4>
                            <div class="form-group">
                                <select class="chosen-select" id="gender">
                                    <option value="">I'm looking for</option>
                                    <option value="1">Men</option>
                                    <option value="2">Women</option>
                                    <option value="3">Others</option>
                                </select>
                            </div>
                        </div>
                        <!-- END -->
                        <!-- START -->
                        <div class="filt-com lhs-cate">
                            <h4><i class="fa fa-clock-o" aria-hidden="true"></i>Age</h4>
                            <div class="form-group">
                                <select class="chosen-select" id="age">
                                    <option value="">Select age</option>
                                    <option value="18-30">18 to 30</option>
                                    <option value="31-40">31 to 40</option>
                                    <option value="41-50">41 to 50</option>
                                    <option value="51-60">51 to 60</option>
                                    <option value="61-70">61 to 70</option>
                                    <option value="71-80">71 to 80</option>
                                    <option value="81-90">81 to 90</option>
                                    <option value="91-100">91 to 100</option>
                                </select>
                            </div>
                        </div>
                        <!-- END -->
                        <!-- START -->
                        <div class="filt-com lhs-cate">
                            <h4><i class="fa fa-bell-o" aria-hidden="true"></i>Select Religion</h4>
                            <div class="form-group">
                                <select class="chosen-select" id="relegion">
                                    <?php
                                    
                                        foreach($relegion as $key => $value){
                                            echo "<option value='".$value['id']."'>".$value['description']."</option>";
                                        }
                                    
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- END -->
                        <!-- START -->
<!--
                        <div class="filt-com lhs-cate">
                            <h4><i class="fa fa-map-marker" aria-hidden="true"></i>Location</h4>
                            <div class="form-group">
                                <select class="chosen-select" name="addjbmaincate">
                                    <option value="Chennai">Chennai</option>
                                    <option value="Bangaluru">Bangaluru</option>
                                    <option value="Delhi">Delhi</option>
                                </select>
                            </div>
                        </div>
-->
                        <!-- END -->
                    </div>
                    <div class="col-md-9">
                        <div class="short-all">
                            <div class="short-lhs">
                                Showing <b><?php echo count($profileList); ?></b> profiles
                            </div>
                            <div class="short-rhs">
                                <ul>
                                    <li>
                                        Sort by:
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <select class="chosen-select">
                                                <option value="">Most relative</option>
                                                <option value="Men">Date listed: Newest</option>
                                                <option value="Men">Date listed: Oldest</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sort-grid sort-grid-1">
                                            <i class="fa fa-th-large" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sort-grid sort-grid-2 act">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="all-list-sh">
                            <ul>
                                <?php
                                
                                foreach($profileList as $profile){  ?>
                                <li>
                                    <div class="all-pro-box">
                                        <!--PROFILE IMAGE-->
                                        <div class="pro-img">
                                            <a href="profile-details.php?id=<?php echo $profile['id']; ?>">
                                                <img src="<?php echo $base_url; ?>documents/<?php echo $profile["photo_1"]; ?>" alt="">
                                            </a>
                                            <div class="pro-ave" title="User currently available">
<!--                                                <span class="pro-ave-yes"></span>-->
                                            </div>
                                            <div class="pro-avl-status">
                                                <h5>Available Online</h5>
                                            </div>
                                        </div>
                                        <!--END PROFILE IMAGE-->

                                        <!--PROFILE NAME-->
                                        <div class="pro-detail">
                                            <h4><a href="profile-details.php?id=<?php echo $profile['id']; ?>"><?php echo $profile["first_name"]." ".$profile["last_name"]; ?></a></h4>
                                            <div class="pro-bio">
                                                <span><?php echo $profile["education"]; ?></span>
                                                <span><?php echo $profile["qualification"]; ?></span>
                                                <span><?php echo $profile["age"]; ?> Yeard old</span>
                                                <span>Height: <?php echo $profile["height"]; ?></span>
                                            </div>
                                            <div class="links">
                                                                                                <a href="profile-details.php?id=<?php echo $profile['id']; ?>">More detaiils</a>
                                            </div>
                                        </div>
                                        <!--END PROFILE NAME-->
                                        <!--SAVE-->
<!--
                                        <span class="enq-sav" data-toggle="tooltip"
                                            title="Click to save this provile."><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span>
-->
                                        <!--END SAVE-->
                                    </div>
                                </li>
                                                    <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

<?php include_once(BASE_PATH."/master/footer.php"); ?>
        <!-- END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo $base_url; ?>js/jquery.min.js"></script>
    <script src="<?php echo $base_url; ?>js/popper.min.js"></script>
    <script src="<?php echo $base_url; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $base_url; ?>js/select-opt.js"></script>
    <script src="<?php echo $base_url; ?>js/custom.js"></script>
</body>

</html>