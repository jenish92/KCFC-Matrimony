    <!-- PRELOADER -->
    <div id="preloader">
        <div class="plod">
            <span class="lod1"><img src="<?=$base_url?>images/loder/1.png" alt="" loading="lazy"></span>
            <span class="lod2"><img src="<?=$base_url?>images/loder/2.png" alt="" loading="lazy"></span>
            <span class="lod3"><img src="<?=$base_url?>images/loder/3.png" alt="" loading="lazy"></span>
        </div>
    </div>
    <div class="pop-bg"></div>
    <!-- END PRELOADER -->
    <!-- END -->

    <!-- TOP MENU -->
    <div class="head-top">
        <div class="container">
            <div class="row">
                <div class="lhs">
                    <ul>
                        <li><a href="<?=$base_url?>tel:+919840051817"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;+91 98400 51817</a></li>
                        <li><a href="<?=$base_url?>mailto:info@kcfcmatrimony.com"><i class="fa fa-envelope-o"
                                    aria-hidden="true"></i>&nbsp; info@kcfcmatrimony.com</a></li>
                    </ul>
                </div>
                <div class="rhs">
                    <ul>
                        
                        <li><a href="<?=$base_url?>#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="<?=$base_url?>#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="<?=$base_url?>#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- MENU POPUP -->
    <!-- END -->

    <!-- CONTACT EXPERT -->

    <!-- END -->

    <!-- MAIN MENU -->
    <div class="hom-top">
        <div class="container">
            <div class="row">
                <div class="hom-nav">
                    <!-- LOGO -->
                    <div class="logo">
                        
                        <a href="<?=$base_url?>index.php" class="logo-brand"><img src="<?=$base_url?>images/logo-b.png" alt="" loading="lazy"
                                class="ic-logo"></a>
                    </div>

                    <!-- EXPLORE MENU -->
                    <div class="bl">
                        <ul>
                            <li>
                                <a href="<?=$base_url?>index.php">Home</a>
                            </li>
                            <li><a href="<?=$base_url?>plans.php">About Us</a></li>
                            
                            <li><a href="<?=$base_url?>sign-up.php">Testimonials</a></li>
                            
                            <li><a href="<?=$base_url?>contact.php">Contact</a></li>
                        </ul>
                    </div>

                    <!-- USER PROFILE -->
                    <?php
    
                        if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ""){
                            
                        
                        ?>
                        <div class="">
                        <div class="d-flex justify-content-around">
                            
                            <a href="#"><button type="button" class="btn btn-primary">My Profile</button></a>
                            
                            <a href="<?=$base_url?>logout.php"><button type="button" class="btn btn-primary">Logout</button></a>
                        </div>
                    </div>
                        <?php
                        }
                                 
                                    else{
                    ?>
                    
                    <div class="">
                        <div class="d-flex justify-content-around">
                            
                            <a href="<?=$base_url?>login.php"><button type="button" class="btn btn-primary">Sign In</button></a>
                            
                            <a href="<?=$base_url?>sign_up.php"><button type="button" class="btn btn-primary">Create Account</button></a>
                        </div>
                    </div>
                    
                    <?php
                        
                                    }
                                    
                    ?>

                    <!--MOBILE MENU-->
                    <div class="mob-menu">
                        <div class="mob-me-ic">
                            <span class="mobile-exprt" data-mob="dashbord">
                                <img src="<?=$base_url?>images/icon/users.svg" alt="">
                            </span>
                            <span class="mobile-menu" data-mob="mobile">
                                <img src="<?=$base_url?>images/icon/menu.svg" alt="">
                            </span>
                        </div>
                    </div>
                    <!--END MOBILE MENU-->
                </div>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- EXPLORE MENU POPUP -->
    <div class="mob-me-all mobile_menu">
        <div class="mob-me-clo"><img src="<?=$base_url?>images/icon/close.svg" alt=""></div>
        <div class="mv-bus">
            <h4><i class="fa fa-globe" aria-hidden="true"></i> Menu</h4>
            <ul>
                <li><a href="<?=$base_url?>all-profiles.php">Home</a></li>
                <li><a href="<?=$base_url?>wedding.php">About Us</a></li>
                <li><a href="<?=$base_url?>services.php">Testimonials</a></li>
                <li><a href="<?=$base_url?>contact.php">Contact</a></li>
            </ul>
            
            <div class="menu-pop-soci">
                <ul>
                    <li><a href="<?=$base_url?>#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="<?=$base_url?>#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="<?=$base_url?>#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                    <li><a href="<?=$base_url?>#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="<?=$base_url?>#!"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    <li><a href="<?=$base_url?>#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END MOBILE MENU POPUP -->

    <!-- MOBILE USER PROFILE MENU POPUP -->
    <div class="mob-me-all dashbord_menu">
        <div class="mob-me-clo"><img src="<?=$base_url?>images/icon/close.svg" alt=""></div>
        <div class="mv-bus">
            <div class="head-pro">
<!--                <button type="button" class="btn btn-primary">Create Account</button>-->
                <h4><i class="fa fa-globe" aria-hidden="true"></i> Join Now</h4>
            </div>
            <ul>
                <li><a href="<?=$base_url?>login.php">Login</a></li>
                <li><a href="<?=$base_url?>sign-up.php">Create Account</a></li>
            </ul>
        </div>
    </div>
    <!-- END USER PROFILE MENU POPUP -->