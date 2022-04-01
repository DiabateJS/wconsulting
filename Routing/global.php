<?php 

    function ErrorPage($title, $comment)
    {
        include ROUTEMODULEGLOBALVIEW.'Error.php'; 

    }

    function Error404()
    {

        
        $Action='404';

        include  ROUTEMODULEGLOBALVIEW.'Error.php';


      
    }


    function ContactView()
    {
 
         
         $Action='Contact';
        include  ROUTEMODULEGLOBAL;


    }


    function HeaderHTML($title)
    {
        echo "<head>
        <meta charset='utf-8'>
        <title>".$title."</title>
        <meta name='description' content='Wonder Consulting est un cabinet de conseil spécialisé en Recrutement et dans l’Accompagnement Professionnel.'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta name='author' content='Merveille Mputu'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css' integrity='sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l' crossorigin='anonymous'>
    
        
        <link rel='stylesheet' href='assets/bootstrapEnt/css/bootstrap.min.css'>
      
        
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css'>


        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel='shortcut icon' href='assets/img/favicon.png'>
        <!-- Retina iPad Touch Icon-->
        <link rel='apple-touch-icon' sizes='144x144' href='assets/img/favicon-retina-ipad.png'>
        <!-- Retina iPhone Touch Icon-->
        <link rel='apple-touch-icon' sizes='114x114' href='assets/img/favicon-retina-iphone.png'>
        <!-- Standard iPad Touch Icon--> 
        <link rel='apple-touch-icon' sizes='72x72' href='assets/img/favicon-standard-ipad.png'>
        <!-- Standard iPhone Touch Icon--> 
        <link rel='apple-touch-icon' sizes='57x57' href='assets/img/favicon-standard-iphone.png'>
    
        <!-- <link rel='stylesheet' href='assets/bootstrap/css/bootstrap.min.css'> -->
        <link rel='stylesheet' href='assets/fonts/fontawesome-all.min.css'>
        <link rel='stylesheet' href='assets/fonts/font-awesome.min.css'>
        <link rel='stylesheet' href='assets/fonts/ionicons.min.css'>
        <link rel='stylesheet' href='assets/fonts/fontawesome5-overrides.min.css'>
        <link rel='stylesheet' href='assets/css/Bold-BS4-Animated-Back-To-Top.css'>
        <link rel='stylesheet' href='assets/css/Features-Boxed.css'>
        <link rel='stylesheet' href='assets/css/Footer-Dark.css'>
        <link rel='stylesheet' href='assets/css/gradient-navbar.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css'>
        <link rel='stylesheet' href='assets/css/Slider-laptop-1.css'>
        <link rel='stylesheet' href='assets/css/Slider-laptop.css'>
        <link rel='stylesheet' href='assets/css/styles.css'>
        <link rel='stylesheet' href='assets/css/Swiper-Slider-Card-For-Blog-Or-Product-1.css'>
        <link rel='stylesheet' href='assets/css/Swiper-Slider-Card-For-Blog-Or-Product.css'>
        <link rel='stylesheet' href='assets/css/Waves---Techonomics.css'>
        <link rel='stylesheet' href='assets/css/WonderAnimation.css'>
    
    
    
    
        <link rel=stylesheet href='css/style.css' type=text/css media=all>
        <link rel=stylesheet href='plugins/superfish/css/superfish.css' type=text/css media=all>
        <link rel=stylesheet href='plugins/dl-menu/component.css' type=text/css media=all>
        <link rel=stylesheet href='plugins/font-awesome-new/css/font-awesome.min.css' type=text/css media=all>
        <link rel=stylesheet href='plugins/fancybox/jquery.fancybox.css' type=text/css media=all>
        <link rel=stylesheet href='plugins/flexslider/flexslider.css' type=text/css media=all>
        <link rel=stylesheet href='css/style-responsive.css' type=text/css media=all>
        <link rel=stylesheet href='css/style-custom.css' type=text/css media=all>
        <link rel=stylesheet href='plugins/masterslider/public/assets/css/masterslider.main.css' type=text/css media=all>
        <link rel=stylesheet href='css/master-custom.css' type=text/css media=all>
    
        <!-- <link rel=stylesheet href='https://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900&amp;subset=latin&amp;ver=5e348039466ee2df77d142cdeeca1221' type=text/css media=all>
        <link rel=stylesheet href='https://fonts.googleapis.com/css?family=Montserrat%3Aregular%2C700&amp;subset=latin&amp;ver=5e348039466ee2df77d142cdeeca1221' type=text/css media=all>
        <link rel=stylesheet href='https://fonts.googleapis.com/css?family=Droid+Serif%3Aregular%2Citalic%2C700%2C700italic&amp;subset=latin&amp;ver=5e348039466ee2df77d142cdeeca1221' type=text/css media=all>-->
    
    </head>";
    }

    function Footer($filestojs)
    {
        echo "<footer class='footer-wrapper'>
        
        <div class=copyright-wrapper>
            <div class='copyright-container container'>
                <div class=copyright-left> © Copyright Wonder Consulting RH, All Right Reserved</div>
                <div class=copyright-right> Suivez-nous : <a href='#'><i class='icon ion-social-linkedin'></i></a><a href='#'><i class='icon ion-social-facebook'></i></a><a href='#'><i class='icon ion-social-twitter'></i></a><a href='#'><i class='icon ion-social-instagram'></i></a> |<a href=index.php?Module=AboutUs&Action=AboutUs>A propos</a> | <a href=index.php?Module=Entreprise&Action=Entreprise>Préparer sa candidature</a> | <a href=index.php?Module=Particulier&Action=Particulier>Faire le point sur ses compétences</a> |<a href=index.php?Module=Academy&Action=Academy>Nos Accompagnements</a> | <a href=index.php?Module=Contact&Action=Contact>Contactez-nous</a></div>
                <div class=clear></div>
            </div>
        </div>
    </footer>
    <a class='cd-top js-cd-top cd-top--fade-out cd-top--show' style='background-image:url(&quot;assets/img/cd-top-arrow.svg&quot;);' href='#0'>Top</a>
    <!-- <script src='assets/bootstrap/js/bootstrap.min.js'></script> -->
    <script src='assets/js/bs-init.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js'></script>
    <script src='assets/js/Bold-BS4-Animated-Back-To-Top.js'></script>
    <script src='assets/js/Slider-laptop.js'></script>
    <script src='assets/js/Swiper-Slider-Card-For-Blog-Or-Product.js'></script>
    <script src='assets/js/WonderAnimmation.js'></script>


    <script src='js/jquery/jquery.js'></script>
    <script src='js/jquery/jquery-migrate.min.js'></script>


    <script src='plugins/superfish/js/superfish.js'></script>
    <script src='js/hoverIntent.min.js'></script>
    <script src='plugins/dl-menu/modernizr.custom.js'></script>
    <script src='plugins/dl-menu/jquery.dlmenu.js'></script>
    <script src='plugins/jquery.easing.js'></script>
    <script src='plugins/fancybox/jquery.fancybox.pack.js'></script>
    <script src='plugins/fancybox/helpers/jquery.fancybox-media.js'></script>
    <script src='plugins/fancybox/helpers/jquery.fancybox-thumbs.js'></script>
    <script src='plugins/flexslider/jquery.flexslider.js'></script>
    <script src='plugins/jquery.isotope.min.js'></script>
    <script src='js/plugins.min.js'></script>
    <script type='text/javascript' src='plugins/quform/js/plugins.js'></script>
    <script type='text/javascript' src='plugins/quform/js/scripts.js'></script>  


    <script src='js/jquery/jquery.js'></script>
    <script src='js/jquery/jquery-migrate.min.js'></script>
    <script src='plugins/superfish/js/superfish.js'></script>
    <script src='js/hoverIntent.min.js'></script>
    <script src='plugins/dl-menu/modernizr.custom.js'></script>
    <script src='plugins/dl-menu/jquery.dlmenu.js'></script>
    <script src='plugins/jquery.easing.js'></script>
    <script src='plugins/fancybox/jquery.fancybox.pack.js'></script>
    <script src='plugins/fancybox/helpers/jquery.fancybox-media.js'></script>
    <script src='plugins/fancybox/helpers/jquery.fancybox-thumbs.js'></script>
    <script src='plugins/flexslider/jquery.flexslider.js'></script>
    <script src='plugins/jquery.isotope.min.js'></script>
    <script src='js/plugins.min.js'></script>

    <script src='http://code.jquery.com/jquery-3.3.1.min.js'></script>

    

<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js' integrity='sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p' crossorigin='anonymous'></script>
<!--<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js' integrity='sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF' crossorigin='anonymous'></script>-->

        <!-- javascript================================================== -->

        ". $filestojs ."";
    }



?>