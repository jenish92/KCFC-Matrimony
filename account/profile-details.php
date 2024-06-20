<?php 
    require_once("../lib/variables.php");  
    require_once (BASE_PATH."/lib/db-connections.php");
    require_once(BASE_PATH."/lib/Profile.php");
    require_once(BASE_PATH."/lib/Master.php");
    $database = new Database();
    $db = $database->getConnection();
    $profile = new Profile($db);
    $id = 0;
    if(isset($_GET["id"]) && $_GET["id"] !== ""){
        $id = $_GET["id"];
    }

    $filter["profile"] = $id;

    $profileList = $profile->ProfileLists($filter);

    //var_dump($profileList);
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

<?php foreach($profileList as $profile){  ?>
    <!-- PROFILE -->
    <section>
        <div class="profi-pg profi-ban">
            <div class="">
                <div class="">
                    <div class="profile">
                        <div class="pg-pro-big-im">
                            <div class="s1">
                                <img src="<?php echo $base_url; ?>documents/<?php echo $profile["photo_1"]; ?>" loading="lazy" class="pro" alt="">
                            </div>
                            <div class="s3">
<!--
                                <a href="#!" class="cta fol cta-chat">Chat now</a>
                                <span class="cta cta-sendint" data-toggle="modal" data-target="#sendInter">Send
                                    interest</span>
-->
                            </div>
                        </div>
                    </div>
                    <div class="profi-pg profi-bio">
                        <div class="lhs">
                            <div class="pro-pg-intro">
                                <h1><?php echo $profile["first_name"]." ".$profile["last_name"]; ?></h1>
                                <div class="pro-info-status">
<!--
                                    <span class="stat-1"><b>100</b> viewers</span>
                                    <span class="stat-2"><b>Available</b> online</span>
-->
                                </div>
                                <ul>
                                    <li>
                                        <div>
                                            <img src="<?php echo $base_url; ?>images/icon/pro-city.png" loading="lazy" alt="">
                                            <span>City: <strong><?php echo $profile["district"]; ?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="<?php echo $base_url; ?>images/icon/pro-age.png" loading="lazy" alt="">
                                            <span>Age: <strong><?php echo $profile["age"]; ?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="<?php echo $base_url; ?>images/icon/pro-city.png" loading="lazy" alt="">
                                            <span>Height: <strong><?php echo $profile["height"]; ?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="<?php echo $base_url; ?>images/icon/pro-city.png" loading="lazy" alt="">
                                            <span>Job: <strong><?php echo $profile["qualification"]; ?></strong></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-abo">
                                <h3>About</h3>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of a page when looking at its layout. The point of using Lorem Ipsum is that
                                    it has a more-or-less normal distribution of letters, as opposed to using 'Content
                                    here, content here', making it look like readable English. </p>
                                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                    default model text.</p>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-gal" id="gallery">
                                <h3>Photo gallery</h3>
                                <div id="image-gallery">
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img src="<?php echo $base_url; ?>images/profiles/1.jpg" class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img src="<?php echo $base_url; ?>images/profiles/6.jpg" class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img src="<?php echo $base_url; ?>images/profiles/14.jpg" class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-conta">
                                <h3>Contact info</h3>
                                <ul>
                                    <li><span><i class="fa fa-mobile"
                                                aria-hidden="true"></i><b>Phone:</b><?php echo $profile["contact_person_number"]; ?></span></li>
                                    <li><span><i class="fa fa-envelope-o"
                                                aria-hidden="true"></i><b>Email:</b><?php echo $profile["email"]; ?></span>
                                    </li>
                                    <li><span><i class="fa fa fa-map-marker" aria-hidden="true"></i><b>Address: </b><?php echo $profile["address"]; ?></span></li>
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-info">
                                <h3>Personal information</h3>
                                <ul>
                                    <li><b>Name:</b> <?php echo $profile["first_name"]." ".$profile["last_name"]; ?></li>
                                    <li><b>Gender:</b> <?php 
                                        if($profile["gender"] == 1){ echo "Male"; }
                                        else if ($profile["gender"] == 2){ echo "Female"; }
                                        else{ echo "Others"; }
                                        ?></li>
                                    <li><b>Marital Status:</b> <?php echo $profile["marital_status"]; ?></li>
                                    <li><b>Have Children:</b> <?php echo $profile["have_children"]; ?></li>
                                    <li><b>Body Type:</b> <?php echo $profile["body_type"]; ?></li>
                                    <li><b>Complextion:</b> <?php echo $profile["complextion"]; ?></li>
                                    <li><b>Mother Tounge:</b> <?php echo $profile["mother_tounge"]; ?></li>
                                    <li><b>Caste:</b> <?php echo $profile["caste"]; ?></li>
                                    <li><b>Sub Caste:</b> <?php echo $profile["sub_caste"]; ?></li>
                                    <li><b>Diet:</b> <?php echo $profile["diet"]; ?></li>
                                    <li><b>Smoke:</b> <?php echo $profile["smoke"]; ?></li>
                                    <li><b>Drink:</b> <?php echo $profile["drink"]; ?></li>
                                    <li><b>Blood Group:</b> <?php echo $profile["blood_group"]; ?></li>
                                    <li><b>Father's Name:</b> <?php echo $profile["father_name"]; ?></li>
                                    <li><b>Mother's Name:</b> <?php echo $profile["mother_name"]; ?></li>
                                    <li><b>Brothers (Married):</b> <?php echo $profile["brothers"]."(".$profile["married_brothers"].")"; ?></li>
                                    <li><b>Sisters (Married):</b> <?php echo $profile["sisters"]."(".$profile["married_sisters"].")"; ?></li>
                                    <li><b>Family Values:</b> <?php echo $profile["family_values"]; ?></li>
                                    <li><b>Age:</b> <?php echo $profile["age"]; ?></li>
                                    <li><b>Date of birth:</b><?php echo $profile["dob"]; ?></li>
                                    <li><b>Birth Time:</b><?php echo $profile["birth_hour"].":".$profile["birth_minute"].":".$profile["birth_sec"]; ?></li>
                                    <li><b>Raasi and Natchathiram:</b><?php echo $profile["rasi"]." - ".$profile["natchathram"]; ?></li>
                                    <li><b>Date of birth:</b><?php echo $profile["dob"]; ?></li>
                                    <li><b>Height:</b><?php echo $profile["height"]; ?></li>
                                    <li><b>Weight:</b><?php echo $profile["weight"]; ?></li>
                                    <li><b>Degree:</b> <?php echo $profile["education"]; ?></li>
                                    <li><b>Religion:</b> <?php echo $profile["religion"]; ?></li>
                                    <li><b>Position:</b> <?php echo $profile["qualification"]; ?></li>
                                    <li><b>Salary:</b> <?php echo $profile["income"]; ?></li>
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-hob">
                                <h3>Hobbies</h3>
                                <ul>
                                    <li><span>Modelling</span></li>
                                    <li><span>Watching movies</span></li>
                                    <li><span>Playing volleyball</span></li>
                                    <li><span>Hangout with family</span></li>
                                    <li><span>Adventure travel</span></li>
                                    <li><span>Books reading</span></li>
                                    <li><span>Music</span></li>
                                    <li><span>Cooking</span></li>
                                    <li><span>Yoga</span></li>
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PROFILE -->

    
    <?php } ?>
<?php include_once(BASE_PATH."/master/footer.php"); ?>
    <!-- END -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
        
    

    <script src="<?php echo $base_url; ?>js/jquery.min.js"></script>
    <script src="<?php echo $base_url; ?>js/popper.min.js"></script>
    <script src="<?php echo $base_url; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $base_url; ?>js/select-opt.js"></script>
    <script src="<?php echo $base_url; ?>js/slick.js"></script>
    <script src="<?php echo $base_url; ?>js/gallery.js"></script>
    <script src="<?php echo $base_url; ?>js/custom.js"></script>
</body>

</html>