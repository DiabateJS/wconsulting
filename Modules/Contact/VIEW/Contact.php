<!DOCTYPE html>
<html lang="en">

<?php HeaderHTML("Wonder Consulting RH");?>

<body>
<?php include "Config/menu.php"?>

    <div class="gdlr-page-title-wrapper gdlr-page-title-wrapper3 gdlr-parallax-wrapper gdlr-title-normal" data-bgspeed=0.5>
        <div class=gdlr-page-title-overlay></div>
        <div class="gdlr-page-title-container container">
            <h1 class="gdlr-page-title">Contactez-nous</h1> <!--<span class=gdlr-page-caption>Pour toutes préocupations ou un eventuel demande de devis</span>--></div>
    </div>

    <div class=content-wrapper>
        <div class=gdlr-content>
            <div class="with-sidebar-wrapper gdlr-type-right-sidebar">
                <div class="with-sidebar-container container">
                    <div class="with-sidebar-left eight columns">
                        <div class="with-sidebar-content twelve columns">
                            <section id=content-section-2>
                                <div class="section-container container">
                                    <div class="gdlr-item gdlr-content-item" style="margin-bottom: 60px;">
                                        <div class=clear></div>
                                        <div class=gdlr-space style="margin-top: -22px;"></div>
                                        <!--<h5 class="gdlr-heading-shortcode " style="font-weight: bold; color:dimgray">Contactez-nous</h5>-->
                                        <!--<div id=text-6 class="widget widget_text gdlr-item gdlr-widget">
                                            <div class=clear></div>
                                         <div class=textwidget>Vous souhaitez nous faire part de votre demande, personnaliser votre accompagnement, <br>obtenir un devis ou pour toutes préoccupations , n’hésitez pas à nous contacter et nous répondrons dans les meilleurs délais</div>
                                         </div>-->
                                        <div class=clear></div>
                                        <div class=gdlr-space style="margin-top: 25px;"></div>
                                        <div role=form class=wpcf7 id=wpcf7-f6-o1 lang=en-US dir=ltr>
                                            <div class=screen-reader-response></div>
                                            <!-- <div class="alert alert-success" role="alert"></div> -->
                                                <h4 class="sent-notification"></h4>  
                                                
                                                <?php include_once('Global/mail.php')?>
                                                <?php include_once('Global/notifymail.php')?>
                                                
                                                <form class="" id="myForm" action="index.php?Module=Contact&Action=Contact" method="post" enctype="multipart/form-data" onclick="sendmail">

                                                <div class="quform-elements">
                                                    <div class="quform-element" style="margin-bottom: 20px;">

                                                        <span class="wpcf7-form-control-wrap your-name">
                                                            <input id="name" type="text" name="name" size="40" class="input1" aria-required="true" aria-invalid="false" required placeholder="Noms*">
                                                        </span> 
                                                    
                                                    </div>
                                                    <div class="quform-element" style="margin-bottom: 20px;">

                                                        <span class="wpcf7-form-control-wrap your-name">
                                                            <input id="subject" type="text" name="subject" size="40" class="input1" aria-required="true" aria-invalid="false" required placeholder="objet*">
                                                        </span> 
                                                    
                                                    </div>
                                                    <div class="quform-element" style="margin-bottom: 20px;">

                                                        <span class="wpcf7-form-control-wrap your-email">
                                                            <input id="email" type="text" name="email" size="40" class="input1" aria-required="true" aria-invalid="false" required placeholder="Email*">
                                                        </span> 
                                                    
                                                    </div>
                                                    <div class="quform-element" style="margin-bottom: 10px;">

                                                        <span class="wpcf7-form-control-wrap your-message">
                                                            <textarea  id="message" name="message" cols="40" rows="10" class="input1" aria-invalid="false" required placeholder="Message*"></textarea>
                                                        </span>
                                                    
                                                    </div>
                                                    <!-- Begin Submit button -->
                                                    <div class="quform-submit">
                                                        <div class="quform-submit-inner">
                                                            <button type="submit" onclick="sendEmail()" class="submit-button"><span>Envoyez</span></button>
                                                        </div>
                                                        <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class=clear></div>
                                </div>
                            </section>
                        </div>
                        <div class=clear></div>
                    </div>
                    <div class="gdlr-sidebar gdlr-right-sidebar four columns">
                        <div class="gdlr-item-start-content sidebar-right-item">
                            <div id=text-6 class="widget widget_text gdlr-item gdlr-widget">
                                <!--<h3 class="gdlr-widget-title">Note à savoir</h3>-->
                                <div class=clear></div>
                                <div class=textwidget>Vous souhaitez plus d’informations ? demander un devis ? externaliser ou faire l’audit de votre processus RH ?
N’hésitez pas à prendre contact avec nous. Nous nous ferons le plaisir de vous répondre et de vous apporter davantage de précision dans les meilleurs délais.
</div>
                            </div>
                            <div id=text-7 class="widget widget_text gdlr-item gdlr-widget">
                                <h3 class="gdlr-widget-title">Contact Information</h3>
                                <div class=clear></div>
                                <div class=textwidget>
                                    <!-- <p><i class="gdlr-icon fa fa-home" style="color: #04a2ca; font-size: 16px; "></i>Retrouver nous sur Paris</p> -->
                                    <!-- <p><i class="gdlr-icon fa fa-phone" style="color: #04a2ca; font-size: 16px; "></i> 0659613056</p> -->
                                    <p><i class="gdlr-icon fa fa-envelope" style="color: #04a2ca; font-size: 16px; "></i> contact@wonder-consultingrh.com</p>
                                    <!-- <p><i class="gdlr-icon fa fa-clock-o" style="color: #04a2ca; font-size: 16px; "></i> Du Lundi au Samedi De 9H00 à 19H00.</p> -->
                                </div>
                            </div>
                            <div id=text-8 class="widget widget_text gdlr-item gdlr-widget">
                                <h3 class="gdlr-widget-title">Social Media</h3>
                                <div class=clear></div>
                                <div class=textwidget><a href=#><i class="gdlr-icon fa fa-linkedin" style="color: #04a2ca; font-size: 28px; "></i></a> <a href=#><i class="gdlr-icon fa fa-facebook" style="color: #04a2ca; font-size: 28px; "></i></a> <a href=#><i class="gdlr-icon fa fa-twitter" style="color: #04a2ca; font-size: 28px; " ></i></a> <!--<a href=#><i class="gdlr-icon fa fa-dribbble" style="color: #04a2ca; font-size: 28px; " ></i></a> <a href=#><i class="gdlr-icon fa fa-pinterest" style="color: #04a2ca; font-size: 28px; " ></i></a> <a href=#><i class="gdlr-icon fa fa-google-plus" style="color: #04a2ca; font-size: 28px; " ></i></a>--> <a href=#><i class="gdlr-icon fa fa-instagram" style="color: #04a2ca; font-size: 28px; " ></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class=clear></div>
                </div>
            </div>
            <!--<div class=below-sidebar-wrapper>
                <section id=content-section-3>
                    <div class="gdlr-parallax-wrapper gdlr-background-image gdlr-show-all no-skin" id=gdlr-parallax-wrapper-1 data-bgspeed=0.2 style="background-image: url('../../../cdn.goodlayers.com/thekeynote/wp-content/uploads/2013/12/photodune-2613770-space-nebula-m.jpg'); padding-top: 100px; padding-bottom: 50px; ">
                        <div class=container>
                            <div class="four columns">
                                <div class="gdlr-box-with-icon-ux gdlr-ux">
                                    <div class="gdlr-item gdlr-box-with-icon-item pos-top type-circle">
                                        <div class=box-with-circle-icon style="background-color: #06cdff"><i class="fa fa-envelope" style=color:#ffffff;></i>
                                            <br>
                                        </div>
                                        <h4 class="box-with-icon-title">Contact par Email</h4>
                                        <div class=clear></div>
                                        <div class=box-with-icon-caption>
                                            <p>24h/24 ; Nous vous repondons dans 48 h</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="four columns">
                                <div class="gdlr-box-with-icon-ux gdlr-ux">
                                    <div class="gdlr-item gdlr-box-with-icon-item pos-top type-circle">
                                        <div class=box-with-circle-icon style="background-color: #06cdff"><i class="fa fa-phone" style=color:#ffffff;></i>
                                            <br>
                                        </div>
                                        <h4 class="box-with-icon-title">Contact par Phone</h4>
                                        <div class=clear></div>
                                        <div class=box-with-icon-caption>
                                            <p>Joingnable à partir de 9h00 à 19h00.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="four columns">
                                <div class="gdlr-box-with-icon-ux gdlr-ux">
                                    <div class="gdlr-item gdlr-box-with-icon-item pos-top type-circle">
                                        <div class=box-with-circle-icon style="background-color: #06cdff"><i class="fa fa-home" style=color:#ffffff;></i>
                                            <br>
                                        </div>
                                        <h4 class="box-with-icon-title">Adresse</h4>
                                        <div class=clear></div>
                                        <div class=box-with-icon-caption>
                                            <p>Retrouvez-nous sur paris.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=clear></div>
                        </div>
                    </div>
                    <div class=clear></div>
                </section>
            </div>-->
        </div>
        <div class=clear></div>
    </div>


    <?php Footer("");?>
</body>

</html>