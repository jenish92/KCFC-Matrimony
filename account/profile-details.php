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
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c menu-pop-soci pr-bio-soc">
                                <h3>Social media</h3>
                                <ul>
                                    <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                    <li><a href="#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->


                        </div>

                        <!-- PROFILE lHS -->
                        <div class="rhs">
                            <!-- HELP BOX -->
                            <div class="prof-rhs-help">
                                <div class="inn">
                                    <h3>Tell us your Needs</h3>
                                    <p>Tell us what kind of service or experts you are looking.</p>
                                    <a href="sign-up.html">Register for free</a>
                                </div>
                            </div>
                            <!-- END HELP BOX -->
                            <!-- RELATED PROFILES -->
                            <div class="slid-inn pr-bio-c wedd-rel-pro">
                                <h3>Related profiles</h3>
                                <ul class="slider3">
                                    <li>
                                        <div class="wedd-rel-box">
                                            <div class="wedd-rel-img">
                                                <img src="<?php echo $base_url; ?>images/profiles/1.jpg" alt="">
                                                <span class="badge badge-success">21 Years old</span>
                                            </div>
                                            <div class="wedd-rel-con">
                                                <h5>Christine</h5>
                                                <span>City: <b>New York City</b></span>
                                            </div>
                                            <a href="profile-details.html" class="fclick"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="wedd-rel-box">
                                            <div class="wedd-rel-img">
                                                <img src="<?php echo $base_url; ?>images/profiles/2.jpg" alt="">
                                                <span class="badge badge-success">21 Years old</span>
                                            </div>
                                            <div class="wedd-rel-con">
                                                <h5>Christine</h5>
                                                <span>City: <b>New York City</b></span>
                                            </div>
                                            <a href="profile-details.html" class="fclick"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="wedd-rel-box">
                                            <div class="wedd-rel-img">
                                                <img src="<?php echo $base_url; ?>images/profiles/3.jpg" alt="">
                                                <span class="badge badge-success">21 Years old</span>
                                            </div>
                                            <div class="wedd-rel-con">
                                                <h5>Christine</h5>
                                                <span>City: <b>New York City</b></span>
                                            </div>
                                            <a href="profile-details.html" class="fclick"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="wedd-rel-box">
                                            <div class="wedd-rel-img">
                                                <img src="<?php echo $base_url; ?>images/profiles/4.jpg" alt="">
                                                <span class="badge badge-success">21 Years old</span>
                                            </div>
                                            <div class="wedd-rel-con">
                                                <h5>Christine</h5>
                                                <span>City: <b>New York City</b></span>
                                            </div>
                                            <a href="profile-details.html" class="fclick"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="wedd-rel-box">
                                            <div class="wedd-rel-img">
                                                <img src="<?php echo $base_url; ?>images/profiles/6.jpg" alt="">
                                                <span class="badge badge-success">21 Years old</span>
                                            </div>
                                            <div class="wedd-rel-con">
                                                <h5>Christine</h5>
                                                <span>City: <b>New York City</b></span>
                                            </div>
                                            <a href="profile-details.html" class="fclick"></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- END RELATED PROFILES -->
                        </div>
                        <!-- END PROFILE lHS -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PROFILE -->

    <!-- INTEREST POPUP -->
    <div class="modal fade" id="sendInter">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title seninter-tit">Send interest to <span class="intename">Jolia</span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body seninter">
                    <div class="lhs">
                        <img src="<?php echo $base_url; ?>images/profiles/1.jpg" alt="" class="intephoto1">
                    </div>
                    <div class="rhs">
                        <h4><span class="intename1">Jolia</span> Can able to view the below details</h4>
                        <ul>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_about" checked="">
                                    <label for="pro_about">About section</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_photo">
                                    <label for="pro_photo">Photo gallery</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_contact">
                                    <label for="pro_contact">Contact info</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_person">
                                    <label for="pro_person">Personal info</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_hobbi">
                                    <label for="pro_hobbi">Hobbies</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_social">
                                    <label for="pro_social">Social media</label>
                                </div>
                            </li>
                        </ul>
                        <div class="form-floating">
                            <textarea class="form-control" id="comment" name="text"
                                placeholder="Comment goes here"></textarea>
                            <label for="comment">Write some message to <span class="intename"></span></label>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Send interest</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>
    <!-- END INTEREST POPUP -->

    <!--- CHAT CONVERSATION BOX START --->
    <div class="chatbox">
        <span class="comm-msg-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>

        <div class="inn">
            <form name="new_chat_form" method="post">
                <div class="s1">
                    <img src="<?php echo $base_url; ?>images/profiles/2.jpg" class="intephoto2" alt="">
                    <h4><b>Angelina Jolie</b>,</h4>
                    <span class="avlsta avilyes">Available online</span>
                </div>
                <div class="s2 chat-box-messages">
                    <span class="chat-wel">Start a new chat!!! now</span>
                    <div class="chat-con">
                        <div class="chat-lhs">Hi</div>
                        <div class="chat-rhs">Hi</div>
                    </div>
                    <!--<span>Start A New Chat!!! Now</span>-->
                </div>
                <div class="s3">
                    <input type="text" name="chat_message" placeholder="Type a message here.." required="">
                    <button id="chat_send1" name="chat_send" type="submit">Send <i class="fa fa-paper-plane-o"
                            aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!--- END --->
    
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