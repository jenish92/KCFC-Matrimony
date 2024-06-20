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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
</head>

<body>
<?php include_once("master/header.php"); ?>
    <!-- BANNER -->
    <section>
        <div class="str">
            <div class="ban-inn ab-ban pg-cont">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <span>We are here to assist you.</span>
                                <h1>Contact us</h1>
                                <p>Most Trusted and premium Matrimony Service in Tamilnadu.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="ab-sec2 pg-cont">
            <div class="container">
                <div class="row">
                    <ul>
                        <li>
                            <div class="we-here">
                                <h3>Our office</h3>
                                <p>Most Trusted and premium Matrimony Service in Tamilnadu.</p>
                                <span><i class="fa fa-phone" aria-hidden="true"></i> +91 98400 51817</span>
                                <span><i class="fa fa-envelope-o" aria-hidden="true"></i> info@kcfcmatrimony.com</span>
                                <span><i class="fa fa-map-marker" aria-hidden="true"></i> 103, Balaji Nagar, Alwarthirunagar, Chennai - 600087, India</span>
                            </div>
                        </li>
                        <li>
                            <div class="we-cont">
                                <img src="images/icon/trust.png" alt="">
                                <h4>Customer Relations</h4>
                                <p>Most Trusted and premium Matrimony Service in Tamilnadu.</p>
                                <a href="#!" class="cta-rou-line">Get Support</a>
                            </div>
                        </li>
                        <li>
                            <div class="we-cont">
                                <img src="images/icon/telephone.png" alt="">
                                <h4>WhatsApp Support</h4>
                                <p>Most Trusted and premium Matrimony Service in Tamilnadu.</p>
                                <a href="#!" class="cta-rou-line">WhatsApp</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- REGISTER -->
    <section>
        <div class="login pg-cont">
            <div class="container">
                <div class="row">

                    <div class="inn">
                        <div class="lhs">
                            <div class="tit">
                                <h2>Now <b>Contact to us</b> Easy and fast.</h2>
                            </div>
                            <div class="im">
                                <img src="images/login-couple.png" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs">
                            <div>
                                <div class="form-tit">
                                    <h4>Let's talk</h4>
                                    <h1>Send your enquiry now </h1>
                                </div>
                                <div class="form-login">
                                    <form class="cform fvali" method="post" action="mail/mail-contact.php">
                                        <div class="alert alert-success cmessage" style="display: none" role="alert">
                                            Your message was sent successfully.
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Name:</label>
                                            <input type="text" id="name" class="form-control"
                                                placeholder="Enter your full name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Email:</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Phone:</label>
                                            <input type="number" class="form-control" id="phone"
                                                placeholder="Enter phone number" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="lb">Message:</label>
                                            <textarea name="message" class="form-control" id="message"
                                                placeholder="Enter message" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Send Enquiry</button>
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

<?php include_once("master/footer.php"); ?>    <!-- END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/mail.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>