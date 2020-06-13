<footer>
		<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				<h2 class="footer-top-head-w3l font-weight-bold mb-2"><?php echo lang('el'); ?> :</h2>
				<p class="footer-main mb-4">
					<?php echo lang('text'); ?></p>
				<!-- //footer first section -->
				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-dolly"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3><?php echo lang('free'); ?></h3>
								<p><?php echo lang('desfree'); ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3><?php echo lang('fast'); ?></h3>
								<p><?php echo lang('desfast'); ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-thumbs-up"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3><?php echo lang('big'); ?></h3>
								<p><?php echo lang('desbig'); ?></p>
							</div>
						</div>
					</div>
				</div>
				<!-- //footer second section -->
			</div>
		</div>
		<!-- footer third section -->
		<div class="w3l-middlefooter-sec">
			<div class="container py-md-5 py-sm-4 py-3">
				<div class="row footer-info w3-agileits-info">
					<!-- footer categories -->
					<div class="col-md-3 col-sm-6 footer-grids">
						<h3 class="text-white font-weight-bold mb-3"><?php echo lang('cat'); ?></h3>
						<ul>
						<?php 
						$info = data($con,'SELECT * FROM categories');
						foreach ($info as  $print) {
						?>
							<li class="mb-3">
								<a href="index.php?sk=products&dd=<?php echo $print['ID']; ?>"><?php echo $print['name']; ?> </a>
							</li>
					<?php } ?>
						</ul>
					</div>
					<!-- //footer categories -->
					<!-- quick links -->
					<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3"><?php echo lang('qklink'); ?></h3>
						<ul>
							<li class="mb-3">
								<a href="index.php?sk=about"><?php echo lang('about'); ?></a>
							</li>
							<li class="mb-3">
								<a href="index.php?sk=contact"><?php echo lang('contact'); ?></a>
							</li>

						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3"><?php echo lang('get'); ?></h3>
						<ul>
							<li class="mb-3">
								<i class="fas fa-map-marker"></i> Log cem attba djilali z06 chorfa chlef</li>
							<li class="mb-3">
								<i class="fas fa-mobile"></i> 0782903695 </li>
							<li class="mb-3">
							
							<li class="mb-3">
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:potency.football@gmail.com"> potency.football@gmail.com</a>
							</li>
							<li>
								
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
						<!-- newsletter -->
						<h3 class="text-white font-weight-bold mb-3"><?php echo lang('news'); ?></h3>
						<p class="mb-3"><?php echo lang('desnews'); ?></p>
						<form  method="post">
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email" name="email" required="">
								<input type="submit" value="Go">
							</div>
						</form>
						<!-- //newsletter -->
						<!-- social icons -->
						<div class="footer-grids  w3l-socialmk mt-3">
							<h3 class="text-white font-weight-bold mb-3"><?php echo lang('follow'); ?></h3>
							<div class="social">
								<ul>
									<li>
										<a class="icon fb" href="https://www.facebook.com/ynuzi">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a class="icon tw" href="https://twitter.com/elhousseynarab">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //social icons -->
					</div>
				</div>
				<!-- //quick links -->
			</div>
		</div>
		<!-- //footer third section -->

		<!-- footer fourth section -->
		<div class="agile-sometext py-md-5 py-sm-4 py-3">
			<div class="container">
				
				
				<div class="sub-some child-momu mt-4">
					<h5 class="font-weight-bold mb-3"><?php echo lang('payment'); ?></h5>
					<ul>
						<li><?php echo lang('cash'); ?></li>
					</ul>
				</div>
				<!-- //payment -->
			</div>
		</div>
		<!-- //footer fourth section (text) -->
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right py-3">
		<div class="container">
			<p class="text-center text-white">©  <script> var d = new Date(); document.write(d.getFullYear()); </script> 
				<a href="https://www.facebook.com/ynuzi"> Elhousseyn arab</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->
	

	<!-- js-files -->
	<!-- jquery -->
	<script src="<?php echo '../' .  $js  . 'jquery-2.2.3.min.js'; ?>"></script>
		<!-- //jquery -->

	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- popup modal (for location)-->
	<script src="<?php echo '../' .  $js . 'jquery.magnific-popup.js'; ?>"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //popup modal (for location)-->

	<!-- cart-js -->
	<script src="<?php echo '../' .  $js . 'minicart1.js';?>"></script>
	<script>
		paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

		paypals.minicarts.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->
	
	<!-- scroll seller -->
	<script src="<?php echo '../' .  $js . 'scroll.js'; ?>"></script>
	<!-- //scroll seller -->

	<!-- smoothscroll -->
	<script src="<?php echo '../' .  $js . 'SmoothScroll.min.js'; ?>"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="<?php echo '../' .  $js . 'move-top.js'; ?>"></script>
	<script src="<?php echo '../' .  $js . 'easing.js'; ?>"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
		$(document).ready(function(){
			var sha= $('#sha'),
		te = $('#te');
		te.keyup(function(){
			sha.fadeIn(1000);
		});
		te.focus(function(){
			sha.fadeOut(1000);
		});
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="<?php echo '../' .  $js . 'bootstrap.js'; ?>"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->


</body>

</html>