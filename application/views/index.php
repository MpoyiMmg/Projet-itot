
		<!-- <ul class="side-nav" id="nav-mobile">
			<li> <a href="login" id="customer_login_link">Se connecter</a> </li>
			<li> <a href="register" id="customer_register_link">S'inscrire</a> </li>

			<li class="site-nav--active active">
				<a href="index" class="site-nav__link">Acceuil</a>
			</li>
			
			<li>
				<a href="listentreprise">Entreprises</a>
			</li>
			
		</ul>

		<div data-section-id="header" data-section-type="header-section">
			<header role="banner">
				<div class="popup-search-wrapper">
					<form action="https://materialize-shopify-themes.myshopify.com/search" method="get" role="search">
						<label for="Search" class="label-hidden">
							Taper un mot clé
						</label>
						<input type="search" name="q" id="Search" value="" placeholder="Taper un mot clé">
						<button type="submit" class="btn-flat btn-floating waves-effect">
							<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-search"
								viewBox="0 0 20 20">
								<path fill="#444"
									d="M18.64 17.02l-5.31-5.31c.81-1.08 1.26-2.43 1.26-3.87C14.5 4.06 11.44 1 7.75 1S1 4.06 1 7.75s3.06 6.75 6.75 6.75c1.44 0 2.79-.45 3.87-1.26l5.31 5.31c.45.45 1.26.54 1.71.09.45-.36.45-1.17 0-1.62zM3.25 7.75c0-2.52 1.98-4.5 4.5-4.5s4.5 1.98 4.5 4.5-1.98 4.5-4.5 4.5-4.5-1.98-4.5-4.5z" />
							</svg>
							<span class="icon-fallback-text">Search</span>
						</button>
					</form>
					<i class="popup-close material-icons">close</i>
				</div>
			</header>
		</div>
	</div> -->

	<div class="row"></div>
	<div class="row"></div>

	<div class="row">
		<div class="container">
			<div class="col s12">
				<div class="row">
					<div class="col s12 m6 center">
						<h4 class="viollet">Arretez de courir</h4>
						<i class="large material-icons viollet" style="font-size:9rem;">directions_run</i>
						<p>
							Économisez vos forfaits (appels/SMS) . Ne vous déplacer pas jusqu'au lieu de service de votre prestataire pour prendre
							rendez-vous
						</p>
					</div>
					<div class="col s12 m6 center">
						<h4 class="viollet">Gardez le sourire</h4>
						<i class="large material-icons" style="font-size:9rem; color:#dd87b6">sentiment_very_satisfied</i>
						<p>
							Suivez l'évolution de l'état de vos rendez-vous. Sachez à tout instant si un rendez-vous est accepté ou décliné,
							reporté
							ou décliné
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col s12 m6 center">
						<h4 class="viollet">Réorganisez-vous</h4>
						<i class="large material-icons viollet" style="font-size:9rem;">event_available</i>
						<p>
							Gardez à l'œil et organisez votre emploi de temps, vos heures de visite et tous vos rendez-vous facilement et en toute
							simplicité
						</p>
					</div>
					<div class="col s12 m6 center">
						<h4 class="viollet">Améliorez votre image</h4>
						<i class="large material-icons viollet" style="font-size:9rem;">wallpaper</i>
						<p>
							Trouvez du temps pour vos clients et vos partenaires. Construisez une belle image pour votre business et
							fidéliser vos
							clients grâce aux rendez-vous
						</p>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col s12 center">
					<h2 class="collection-title viollet">Les prestataires déjà inscrits</h2>
					<div class="rte">
						<span>
							D'autres prestataires sont déjà inscrits et voient leurs visibiltés et leurs taux d'activté augmenter de manière exponentielle. <br>
							Il ne reste plus que vous. Oui, vous aussi vous pouvez devenir l'un de nos nombreux prestataires ou <br> prendre rendez-vous avec l'un d'entre eux.
						</span>
						<div class="row"></div>
						<div class="row"></div>
					</div>
				</div>
				<?php foreach($dataEntreprise as $row){?>
				<div class="col s12 m6 l4">
				<?php
					$id = $row['idEntreprise'];
				?>
				<a href="welcome/entreprise?id=<?php echo $id?>">
					<div class="card">
						<div class="card-image">
							<img src="<?php echo base_url('')?>assets/img/google-wallpaper-11.jpg">
							<span class="card-title"><?php echo $row['nomEntreprise'];?></span>
						</div>
						<div class="card-content">
							<p><?php echo $row['description'];?></p>
						</div>
					</div>
				<a>
				</div>
				<?php } ?>
				
			</div>
			<div class="row">
				<div class=" s12 center">
					<a href="entreprise" title="Voir toutes les entreprises inscrite" class="btn-large gradient-back">les voir toutes</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Javascript -->

	<div id="shopify-section-footer" class="shopify-section">
		<footer class="page-footer" style="background-color: #04c39f">
			<div class="footer-copyright">
				<div class="container center">
					<small class="white-text">Copyright © 2019, <a href="index.html" class="white-text" title="">Meet All</a>. <a class="white-text"
							target="_blank" rel="nofollow"
							href="https://www.shopify.com/?utm_campaign=poweredby&amp;utm_medium=shopify&amp;utm_source=onlinestore">
							Powered
							by ITOT-Afica</a></small>
				</div>
			</div>
		</footer>
	</div>
	<script
		src="<?php echo base_url('')?>assets/js/option_selection-fe6b72c2bbdd3369ac0bfefe8648e3c889efca213baefd4cfb0dd9363563831f.js" type="text/javascript"></script>

	<script
		src="<?php echo base_url('')?>assets/js/api.jquery-e94e010e92e659b566dbc436fdfe5242764380e00398907a14955ba301a4749f.js" type="text/javascript"></script>

	<!--[if (gt IE 9)|!(IE)]><!-->
	<script src="<?php echo base_url('')?>assets/js/vendorcfcd.js" defer="defer"></script>
	<!--<![endif]-->
	<!--[if lt IE 9]><script src="//cdn.shopify.com/s/files/1/2030/2737/t/6/assets/vendor.js?0"></script><![endif]-->

	<!--[if (gt IE 9)|!(IE)]><!-->
	<script src="<?php echo base_url('')?>assets/js/themecfcd.js" defer="defer"></script>
	<!--<![endif]-->
	<!--[if lt IE 9]><script src="//cdn.shopify.com/s/files/1/2030/2737/t/6/assets/theme.js?0"></script><![endif]-->



	<script>
		$(document).ready(function () {
			var categories = $('nav .categories-container');
			if (categories.length) {
				categories.pushpin({ top: categories.offset().top });
			}
		});
	</script>

</body>
</html>