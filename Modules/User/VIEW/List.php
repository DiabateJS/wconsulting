<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Senga - Home</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="Assets/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="Assets/vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="Assets/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="Assets/vendors/linericon/style.css">
  <link rel="stylesheet" href="Assets/vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="Assets/vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="Assets/css/style1.css">
</head>
<body>
   
  <!--================Header Menu Area =================-->


  <main class=" container ">
    <section class=" row">
    <div class="table-responsive">
      <a class="btn btn-info" href="index.php?Module=User&Action=Deconnexion">Deconnexion</a>
      <span>  <?php echo $_SESSION['id']." ". $_SESSION['username']; ?></span>

      <br>
      <span>  <?php echo $message; ?></span>
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                            <th>Utilisateur</th>
                                            <th>Mot de passee</th> 
                                            <th>Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php GetUserList(); ?>
                                    
                                    </tbody>
                                </table>
                            </div>
    </section>
     
    </main>


  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="#">Drc planner</a></li>
						<li><a href="#">Samrt co</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				
				<div class="col-xl-4 col-md-8 mb-4 mb-xl-0 single-footer-widget">
					<h4>Newsletter</h4>
					<p>Vous pouvez nous faire confiance.Nous envoyons uniquement des offres promotionnelles</p>
					<div class="form-wrap" id="mc_embed_signup">
						<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
						 method="get" class="form-inline">
							<input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
							 required="" type="email">
							<button class="click-btn btn btn-default">subscribe</button>
							<div style="position: absolute; left: -5000px;">
								<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
							</div>

							<div class="info"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="footer-bottom row align-items-center text-center text-lg-left">
				<p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | By <a href="https://twelvecorporationrdc.com" target="_blank">Twelve corporation</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				<div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-dribbble"></i></a>
					<a href="#"><i class="fab fa-behance"></i></a>
				</div>
			</div>
		</div>
	</footer>
  <!-- ================ End footer Area ================= -->

  <script src="Assets/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="Assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="Assets/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="Assets/js/jquery.ajaxchimp.min.js"></script>
  <script src="Assets/js/mail-script.js"></script>
  <script src="Assets/js/main.js"></script>
</body>
</html>