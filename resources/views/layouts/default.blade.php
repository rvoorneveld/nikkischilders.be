<!doctype html>
<html class="" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Nikki Schilders - Wellness & Massages</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<link href="images/favicon.jpg" type="images/x-icon" rel="shortcut icon">--}}
    <link rel="stylesheet" href="/css/app.css">

    <script src="/js/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">je gebruikt een <strong>verouderde</strong> browser. <a href="http://browsehappy.com/">Upgrade jouw browser</a> om de ervaring te verbeteren.</p>
<![endif]-->


<!--Main navigation start-->
<header class="main-navigation ">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2 pos">
                <a class="logo" href="/"><img src="images/logo/logo5.png" alt=""></a>
            </div>
            <div class="col-md-7 col-sm-7 no-pad-right hidden-sm hidden-xs">
                <nav class="navbar">
                    <ul id="nav" class="nav navbar-nav navbar-right">
                        <li class="active" ><a href="/">home</a></li>
                        <li><a href="#">massages</a>
                            <ul class="drop-down">
                                <li><a href="/massages/relax-massage">relax massage</a></li>
                                <li><a href="/massages/sport-massage">sport massage</a></li>
                                <li><a href="/massages/wellness-massage">wellness massage</a></li>
                                <li><a href="/massages/hot-stone-massage">hot-stone-massage</a></li>
                            </ul>
                        </li>
                        <li><a href="/voeding">voeding</a></li>
                        <li><a href="/contact">contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3 col-sm-3 no-pad-left hidden-sm">
                <div class="appointment-button">
                    <a href="javascript:;" data-target="#productModal" data-toggle="modal"><i class="fa fa-calendar fa-fw"></i>Maak een afspraak</a>
                </div>
            </div>
        </div>
    </div>
</header><!--Main navigation end-->
<!--Mobile menu start-->
<div class="mobile-menu hidden-lg hidden-md hidden-sm">
    <div class="container">
        <div class="col-md-12">
            <div class="mobile-menu ">
                <nav class="mobile-menu-start">
                    <ul>
                        <li class="active" ><a href="/">home</a></li>
                        <li><a href="#">massages</a>
                            <ul>
                                <li><a href="/massages/relax-massage">relax massage</a></li>
                                <li><a href="/massages/sport-massage">sport massage</a></li>
                                <li><a href="/massages/wellness-massage">wellness massage</a></li>
                                <li><a href="/massages/hot-stone-massage">hot-stone-massage</a></li>
                            </ul>
                        </li>
                        <li><a href="/voeding">voeding</a></li>
                        <li><a href="/contact">contact</a></li>
                        <li><a href="javascript:;" data-target="#productModal" data-toggle="modal"><i class="fa fa-calendar fa-fw"></i>Maak een afspraak</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--Mobile menu start-->



<!--Start Banner Section -->
<div id="slider" class="banner carousel slide carousel-fade" data-ride="carousel" data-pause="false">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active slider-1" style="background-image: url('/images/istock/469916170-1024x1024.jpg');">
            <div class="caption-info">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-md-offset-1">
                            <div class="caption-info-inner text-center">
                                <h1 class="animated fadeInDown">Ultieme ontspanning!</h1>
                                <p class="animated photo-overlay--text fadeInUp">Deze ontspanningsmassage is een weldaad voor lichaam en geest. Deze massage helpt u om stress en spanningen te verminderen.</p>
                                <a href="#massages-relax" class="animated fadeInUp btn-primary page-scroll">Lees meer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="item slider-2" style="background-image: url('/images/istock/688144148-1024x1024.jpg');">
            <div class="caption-info">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-md-offset-1">
                            <div class="caption-info-inner text-center">
                                <h1 class="animated zoomIn">Druk bestaan of (top)sporter?</h1>
                                <p class="animated photo-overlay--text zoomIn">Een intensieve massage die to diep in de spieren doorwerkt. Ideaal voor de drukke persoon of (top)sporter.</p>
                                <a href="#massages-sport" class="animated zoomIn btn-primary page-scroll">Lees meer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!--end carousel-inner-->
    <!-- Controls -->
    <a class="control left" href="#slider" data-slide="prev"><i class="fa fa-arrow-left"></i></a>
    <a class="right control" href="#slider" data-slide="next"><i class="fa fa-arrow-right"></i></a>
</div>
<!--End Banner Section-->

<!--Service section start-->
<section  id="service-area" class="ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title text-center">
                    <h2>Mijn <span class="pink">competenties</span></h2>
                    <p>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim nostrud exercitation ullamco laboris nisi.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3 no-padding">

                <div class="sin-service">
                    <div class="ser-icon">
                        <i class="flaticon-spa"></i>
                    </div>
                    <h3>Kine</h3>
                    <p>Proin iaculis purus consequat sem cure digni ssim Donec porttitora entum suscipit  aenean rhoncus posuere odio</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 no-padding">
                <div class="sin-service">
                    <div class="ser-icon">
                        <i class="flaticon-relax-2"></i>

                    </div>
                    <h3>dry needling</h3>
                    <p>Proin iaculis purus consequat sem cure digni ssim Donec porttitora entum suscipit  aenean rhoncus posuere odio</p>
                </div>

            </div>
            <div class="col-sm-6 col-md-3 no-padding">
                <div class="sin-service">
                    <div class="ser-icon">
                        <i class="flaticon-relax-1"></i>

                    </div>
                    <h3>blessure revalidatie</h3>
                    <p>Proin iaculis purus consequat sem cure digni ssim Donec porttitora entum suscipit  aenean rhoncus posuere odio</p>
                </div>

            </div>
            <div class="col-sm-6 col-md-3 no-padding">
                <div class="sin-service">
                    <div class="ser-icon">
                        <i class="flaticon-spa"></i>

                    </div>
                    <h3>manueel therapie</h3>
                    <p>Proin iaculis purus consequat sem cure digni ssim Donec porttitora entum suscipit  aenean rhoncus posuere odio</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Service area end-->

<!--Our feature area start -->
<div class="our-feature ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title text-center">
                    <h2>de <span class="pink">prijzen</span></h2>
                    <p>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim nostrud exercitation ullamco laboris nisi.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-feature text-center">
                    <div class="feature-img">
                        <img src="/images/istock/665271020-1024x1024.jpg" alt="">
                    </div>
                    <div class="feature-desc">
                        <h3><a href="#">Gezicht massage</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                    </div>
                    <div class="feature-rate">
                        <p>&euro;50,-</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-feature text-center">
                    <div class="feature-img">
                        <img src="/images/istock/469916170-1024x1024.jpg" alt="">
                    </div>
                    <div class="feature-desc">
                        <h3><a href="#">Relax massage</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                    </div>
                    <div class="feature-rate">
                        <p>&euro;75,-</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-feature text-center">
                    <div class="feature-img">
                        <img src="/images/istock/688144148-1024x1024.jpg" alt="">
                    </div>
                    <div class="feature-desc">
                        <h3><a href="#">Sport massage</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                    </div>
                    <div class="feature-rate">
                        <p>&euro;120,-</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-feature text-center">
                    <div class="feature-img">
                        <img src="/images/istock/183798184-1024x1024.jpg" alt="">
                    </div>
                    <div class="feature-desc">
                        <h3><a href="#">Hot stone massage</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                    </div>
                    <div class="feature-rate">
                        <p>&euro;200,-</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--Our feature area end-->

<!--Purchase area start-->
<section class="fixed-bg-wrapper" style="background-image: url('/images/istock/891939558-1024x1024.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="fixed-bg">
                    <h2> Speciale aanbieding</h2>
                    <span><a data-target="#productModal" data-toggle="modal" href="javascript:;">Maak nu een afspraak</a></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Purchase area end-->

<!--Contact area start-->
<section id="contact" class="contact-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title text-center">
                    <h2>maak <span class="pink">contact</span></h2>
                    <p>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim nostrud exercitation ullamco laboris nisi.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 ">
                <div class="contact-address contact-wraper">
                    <div class="sin-add">
                        <div class="add-icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <p class="phone">Telefoon: <a href="tel:+32496727785">+32 (0) 496 72 77 85</a></p>
                    </div>
                    <div class="sin-add">
                        <div class="add-icon">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <p class="mail">
                            E-mailadres:<a href="mailto:nikki.schilders@gmail.com">nikki.schilders@gmail.com</a>
                        </p>
                    </div>
                    <div class="sin-add">
                        <div class="add-icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <p class="adress">Corluystraat 9<br>2160 Wommelgem<br>Antwerpen</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 ">
                <div class="contact-wraper">
                    <form class="contact-form" id="contact-form" action="mail.php" method="post" >
                        <div class="col-md-6">
                            <input  placeholder="Naam" name="name" type="text">
                        </div>

                        <div class="col-md-6">
                            <input placeholder="E-mailadres" name="email" type="text">
                        </div>

                        <div class="col-md-12">
                            <input placeholder="Onderwerp" name="subject" type="text">
                        </div>
                        <div class="col-md-12">
                            <textarea placeholder="Bericht" name="message"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="btn submit-btn btn-primary" type="submit" >Verstuur</button>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact area end-->

<!--Footer widget area start-->
<section class="footer-widget">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-footer">
                    <div class="sin-footer-head">
                        <h5>Over mij</h5> </div>
                    <div class="sin-footer-con">
                        <p>Lorem ipsum dolor sit amet, consectetuer adips Aiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-footer">
                    <div class="sin-footer-head">
                        <h5>Snelle links</h5> </div>
                    <div class="sin-footer-con">
                        <div class="quick-link-left">
                            <ul>
                                <li> <a href="#">Over mij</a></li>
                                <li> <a href="#">Service</a></li>
                                <li> <a href="#">Portfolio</a></li>
                                <li> <a href="#">Klanten</a></li>
                            </ul>
                        </div>
                        <div class="quick-link-right">
                            <ul>
                                <li> <a href="#">Prijzen</a></li>
                                <li> <a href="#">Maak contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="single-footer">
                    <div class="sin-footer-head">
                        <h5>Support</h5> </div>
                    <div class="sin-footer-con">
                        <div class="sin-sup-link">
                            <ul>
                                <li> <a href="#">Support</a></li>
                                <li> <a href="#">Terms & Service</a></li>
                                <li> <a href="#">Privace Policy</a></li>
                                <li> <a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-footer">
                    <div class="sin-footer-head">
                        <h5>Nieuwbrief</h5> </div>
                    <div class="sin-footer-con">
                        <p>Lorem ipsum dolor sit amet, consectetuer adips Aiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                        <div class="subscribe-link">
                            <input type="text" placeholder="E-mailadres">
                            <button class="mail-send">Meld je aan!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="footer-social">
                    <ul>
                        <li><a href="https://www.facebook.com/nikki.schilders" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://nl.pinterest.com/nikkitje12/" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <li><a href="https://twitter.com/NikkiSchilders" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/nikkischilders/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Footer Widget area end-->

<!--footer area start-->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p> &copy; 2018 ‐ Alle rechten voorbehouden. nikkischilders.be </p>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->

<!-- START APPOINTMENT -->
<div id="quickview-wrapper">
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="get-quate">
                <div class="get-quate-inner">
                    <p>MAAK EEN AFSPRAAK</p>
                    <p class="sub-tit">Type en datum</p>
                    <select class="float-left">
                        <option value="service-massage-relax">relax massage</option>
                        <option value="service-massage-sport">Sport massage</option>
                        <option value="service-massage-wellness">Wellness massage</option>
                        <option value="service-massage-hot-stone">Hot stone massage</option>
                    </select>

                    <input name="date-time" value="" class=" datetimepicker float-right" aria-invalid="false">
                    <p class="sub-tit">Persoonlijke informatie</p>
                    <input class="float-left" placeholder="Voornaam" type="text">
                    <input  type="text" placeholder="Achternaam">
                    <input class="float-left" placeholder="Telefoon" type="text">
                    <input  type="text" placeholder="E-mailadres">
                    <a href="" class="qbuuton">Maak afspraak</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END APPOINTMENT -->

<!-- All js plugins included in this file. -->
<script src="js/vendor/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/wow.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.mixitup.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/datetime.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.meanmenu.js"></script>
<script src="js/plugins.js"></script>
<script src="js/ajax-mail.js"></script>
<script src="js/main.js"></script>

</body>
</html>