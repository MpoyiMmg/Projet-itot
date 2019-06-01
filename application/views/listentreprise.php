<!doctype html>
<!--[if IE 9]> <html class="ie9 no-js supports-no-cookies" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js supports-no-cookies" lang="en">
<!--<![endif]-->

<!-- Mirrored from materialize-shopify-themes.myshopify.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Apr 2019 07:16:54 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="theme-color" content="#7db557">
	<link rel="canonical" href="index.html">

	<title>
	TakeDate
	</title>


	<link href="<?php echo base_url('')?>assets/css/gallery-materialize.mincfcd.css" rel="stylesheet" type="text/css" media="all" />

	<link href="<?php echo base_url('')?>assets/css/theme.scsscfcd.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/20302737/digital_wallets/dialog">

	<script integrity="sha256-ZGMHgi9G7WU+Z7WiP2suSn84yzoN83sGf9nMWJhVHAw=" defer="defer" src="<?php echo base_url('')?>assets/js/express_buttons-646307822f46ed653e67b5a23f6b2e4a7f38cb3a0df37b067fd9cc5898551c0c.js" crossorigin="anonymous"></script>
	<script integrity="sha256-6HOSr+Kf4wcoL05qrRLLS8wq/v1rf+vwtw7f0xX5aEw=" defer="defer" src="<?php echo base_url('')?>assets/js/features-e87392afe29fe307282f4e6aad12cb4bcc2afefd6b7febf0b70edfd315f9684c.js" crossorigin="anonymous"></script>
	<style>
		#shopify-section-header > nav, .gradient-back{
			background: rgb(221,135,182);
			background: linear-gradient(90deg, rgba(221,135,182,1) 0%, rgba(4,195,159,1) 100%);
		}
		.viollet{
			color: rgb(221,135,182);
		}
		.greener{
			color: #04c39f;
		}

		#semaine{
			height: 300px;
		}
		*{
			font-family: 'Quicksand', sans-serif;
		}
		#p{
			background : rgba(221,135,182,0.4);
		}

		#p p{
			color: #fff;
			size: 30px;
		}
	</style>
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>

<body id="materialize-shopify-themes" class="template-index white">
	<div id="shopify-section-header" class="shopify-section">

		<nav class="nav-extended">


			<div class="nav-background">
				<div class="pattern active"
					style="background-image: url('<?php echo base_url('')?>assets/img/icon-seamless_ef568d79-394b-49ab-a3c5-128827d788e837cb.png?v=1496294246');">
				</div>
			</div>
			<div class="nav-wrapper container">
				<a href="index" itemprop="url" class="brand-logo site-logo">
					TakeDate
				</a>


				<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">

					<li class="site-nav--active active">
						<a href="welcome" class="site-nav__link">Acceuil</a>
					</li>

					<li>
						<a href="entreprise">
							Entreprises
						</a>
					</li>
				
					<li>
						<a href="login" id="customer_login_link">Se connecter</a>
					</li>
					<li>
						<a href="register" id="customer_register_link">S'inscrire</a>
					</li>

				</ul>
			</div>
		</nav>


		
		<div class="row" >
			<div class="col s12 center">
			<?php foreach($randomEntreprise as $row){?>
				<h2 class="collection-title"><?php echo $row['nomEntreprise']?> est l'entreprise de la semaine</h2>
				<div class="card" style="background-image : url('<?php echo base_url('')?>assets/img/google-wallpaper-11.jpg');" id="semaine">
					<!-- <div class="card-image">
						 <-- <img src="google-wallpaper-11.jpg">  
						<span class="card-title">Google</span>
					</div> -->
					<div class="card-content center" id="p">
						
						
						<p><?php echo $row['description']?></p>
						
					</div>
				</div>
				<?php }?>
				</div>
		</div>
		
		
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col s12 center">
					<h4 class="collection-title">Les prestataires inscrits</h4>
				</div>
			<?php foreach($dataEntreprise as $row){?>
				<div class="col s12 m6 l4">
					<a href="welcome/entreprise?id=<?php echo $row['idEntreprise']?>">
					<div class="card">
						<div class="card-image">
							<img src="<?php echo base_url('')?>assets/img/rumeur-apple-realite-augmentee-conduite-autonome.jpg">
							<span class="card-title"><?php echo $row['nomEntreprise']?></span>
						</div>
						<div class="card-content">
							<p><?php echo $row['description']?></p>
						</div>
					</div>
			      </a>
				</div>
			<?php }?>
			</div>
		</div>
	</div>

	<div id="shopify-section-footer" class="shopify-section">
		<footer class="page-footer" style="background-color: #04c39f">
			<div class="footer-copyright">
				<div class="container center">
					<small class="white-text">Copyright © 2019, <a href="index.html" class="white-text" title="">Meet
							All</a>. <a class="white-text" target="_blank" rel="nofollow"
							href="https://www.shopify.com/?utm_campaign=poweredby&amp;utm_medium=shopify&amp;utm_source=onlinestore">
							Powered
							by ITOT-Afica</a></small>
				</div>
			</div>
		</footer>
	</div>

	<!-- Javascript -->


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