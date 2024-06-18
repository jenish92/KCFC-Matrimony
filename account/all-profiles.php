<?php 
    require_once("../lib/variables.php");  
    require_once ("../lib/db-connections.php");
    require_once("../lib/Profile.php");
require_once("../lib/Master.php");
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
                    <a href="sign-up.html">Join now for Free <i class="fa fa-handshake-o" aria-hidden="true"></i></a>
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
                                            <a href="profile-details.html">
                                                <img src="<?php echo $base_url; ?>photos/<?php echo $profile["photo_1"]; ?>" alt="">
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
                                            <h4><a href="profile-details.html"><?php echo $profile["first_name"]." ".$profile["last_name"]; ?></a></h4>
                                            <div class="pro-bio">
                                                <span><?php echo $profile["education"]; ?></span>
                                                <span><?php echo $profile["qualification"]; ?></span>
                                                <span><?php echo $profile["age"]; ?> Yeard old</span>
                                                <span>Height: <?php echo $profile["height"]; ?></span>
                                            </div>
                                            <div class="links">
                                                                                                <a href="profile-details.html">More detaiils</a>
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


    <!-- INTEREST POPUP -->
    <div class="modal fade" id="sendInter">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title seninter-tit">Send interest to <span class="intename2">Jolia</span></h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body seninter">
                    <div class="lhs">
                        <img src="images/profiles/1.jpg" alt="" class="intephoto2">
                    </div>
                    <div class="rhs">
                        <h4>Permissions: <span class="intename2">Jolia</span> Can able to view the below details</h4>
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

    <!-- CHAT CONVERSATION BOX START -->
    <div class="chatbox">
        <span class="comm-msg-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>

        <div class="inn">
            <form name="new_chat_form" method="post">
                <div class="s1">
                    <img src="images/user/2.jpg" class="intephoto2" alt="">
                    <h4><b class="intename2">Julia</b>,</h4>
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
    <!-- END -->


    <!-- FOOTER -->
    <section class="wed-hom-footer">
        <div class="container">
            <div class="row foot-supp">
                <h2><span>Free support:</span> +92 (8800) 68 - 8960 &nbsp;&nbsp;|&nbsp;&nbsp; <span>Email:</span>
                    info@example.com</h2>
            </div>
            <div class="row wed-foot-link wed-foot-link-1">
                <div class="col-md-4">
                    <h4>Get In Touch</h4>
                    <p>Address: 3812 Lena Lane City Jackson Mississippi</p>
                    <p>Phone: <a href="tel:+917904462944">+92 (8800) 68 - 8960</a></p>
                    <p>Email: <a href="mailto:info@example.com">info@example.com</a></p>
                </div>
                <div class="col-md-4">
                    <h4>HELP &amp; SUPPORT</h4>
                    <ul>
                        <li><a href="about-us.html">About company</a>
                        </li>
                        <li><a href="#!">Contact us</a>
                        </li>
                        <li><a href="#!">Feedback</a>
                        </li>
                        <li><a href="about-us.html#faq">FAQs</a>
                        </li>
                        <li><a href="about-us.html#testimonials">Testimonials</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 fot-soc">
                    <h4>SOCIAL MEDIA</h4>
                    <ul>
                        <li><a href="#!"><img src="images/social/1.png" alt=""></a></li>
                        <li><a href="#!"><img src="images/social/2.png" alt=""></a></li>
                        <li><a href="#!"><img src="images/social/3.png" alt=""></a></li>
                        <li><a href="#!"><img src="images/social/5.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="row foot-count">
                <p>Company name Site - Trusted by over thousands of Boys & Girls for successfull marriage. <a
                        href="sign-up.html" class="btn btn-primary btn-sm">Join us today !</a></p>
            </div>
        </div>
    </section>
    <!-- END -->
    <!-- COPYRIGHTS -->
    <section>
        <div class="cr">
            <div class="container">
                <div class="row">
                    <p>Copyright © <span id="cry">2017-2020</span> <a href="#!" target="_blank">Company.com</a> All
                        rights reserved.</p>
                </div>
            </div>
        </div>
    </section>
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