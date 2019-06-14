
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#7db557">
    <link rel="canonical" href="index.html">

    <title>

    </title>


    <link href="<?php echo base_url('')?>assets/css/gallery-materialize.mincfcd.css?0" rel="stylesheet"
        type="text/css" media="all" />

    <link href="<?php echo base_url('')?>assets/css/theme.scsscfcd.css?0" rel="stylesheet" type="text/css"
        media="all" />

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/20302737/digital_wallets/dialog">


    <script integrity="sha256-ZGMHgi9G7WU+Z7WiP2suSn84yzoN83sGf9nMWJhVHAw=" defer="defer"
        src="../cdn.shopify.com/s/assets/storefront/express_buttons-646307822f46ed653e67b5a23f6b2e4a7f38cb3a0df37b067fd9cc5898551c0c.js"
        crossorigin="anonymous"></script>
    <script integrity="sha256-6HOSr+Kf4wcoL05qrRLLS8wq/v1rf+vwtw7f0xX5aEw=" defer="defer"
        src="../cdn.shopify.com/s/assets/storefront/features-e87392afe29fe307282f4e6aad12cb4bcc2afefd6b7febf0b70edfd315f9684c.js"
        crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/materialize/js/materialize.min.js');?>"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>
    <link rel="stylesheet" href="<?php echo base_url('')?>assets/calendar/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/materialize/css/materialize.min.css');?>">

    <style>
        #shopify-section-header>nav,
        .gradient-back {
            background: rgb(221, 135, 182);
            background: linear-gradient(90deg, rgba(221, 135, 182, 1) 0%, rgba(4, 195, 159, 1) 100%);
        }

        .viollet {
            color: rgb(221, 135, 182);
        }

        .greener {
            color: #04c39f;
        }

        #semaine {
            height: 300px;
        }

        * {
            font-family: 'Quicksand', sans-serif;
        }

        #p {
            background: rgba(221, 135, 182, 0.4);
        }
        .mt-1{
            margin-top: 15px;
        }

        #p p {
            color: #fff;
            size: 30px;
        }

        #dates {
            padding: 10px 8px;
            position: relative;
            top: 35px;
        }

        #dates > div > ul > li {

            margin-left: 10%;

        }

        #arrows {
            position: relative;
            top: 10px;

        }

        .enter_entry > input {
            border: none;
        }

        textarea{
            border-color: #CACACA;
            padding: 10px;
            border-radius: 8px;
        }

        .fa-pencil {

            line-height: 0px;
            margin-top: -70px;

        }
        #not-all-day{
            margin-top: 20px;
        }
        #all-days-label, #all-days-icon{
            display: none;
        }

        input[type="number"]{
            height: 35px;
            border-radius: 8px;
        }

        #ignoreOverflow .btn{
            color: #04C39F;
            background: transparent;
            box-shadow: none;
            top: -17px;
            border-radius: 50%;
        }

        .entry {
            height: initial;
        }

        .delete_entry {
            text-align: right;
        }

        .enter_entry > input {
            padding: 0px 10px;
            margin: 0 20px auto;
        }
        .warning {
            padding: 7px 15px;
            background: #ff5353;
            border-radius: 10px;
            margin: 10px;

        }
    </style>
</head>
<div id="shopify-section-header" class="shopify-section">

		<nav class="nav-extended">
			<div class="nav-background">
				<div class="pattern active"
					style="background-image: url('<?php echo base_url('')?>assets/img/icon-seamless_ef568d79-394b-49ab-a3c5-128827d788e837cb.png');">
				</div>
			</div>
			<div class="nav-wrapper container">
				<a href="index" itemprop="url" class="brand-logo site-logo">
				TakeDate
				</a>
				<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li class="site-nav--active active">
						<a href="../welcome" class="site-nav__link">Acceuil</a>
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

		
			<ul class="side-nav" id="nav-mobile">
		<li> <a href="account/login.html" id="customer_login_link">Se connecter</a> </li>
		<li> <a href="account/register.html" id="customer_register_link">S'inscrire</a> </li>

		<li class="site-nav--active active">
			<a href="welcome" class="site-nav__link">Acceuil</a>
		</li>
		<li>
			<a href="blogs/news.html" class="site-nav__link">Rendez-Vous</a>
		</li>
		<li>
			<a href="cart.html">
				Entreprises
			</a>
		</li>
		
	</ul>

		</nav>
		</div>
	<main role="main" id="MainContent">
		<div class="section container">
			<div class="row">
				<div class="col s12 m6 offset-m3">
					<div class="card login-wrapper">
						<div class="card-content">
						<form method="post" action="../Prendre_Rdv" id="create_customer" accept-charset="UTF-8"><input type="hidden" name="form_type" value="create_customer" /><input type="hidden" name="utf8" value="✓" />
									<h4 class="center">Prendre Rendez-vous</h4>
									<div class="input-field">
										<label for="NomComplet">Nom Complet</label>
										<input type="text" name="nom_complet" id="FirstName" autofocus>
									</div>
								
									<div class="input-field">
										<label for="Telephone">Telephone</label>
										<input type="text" name="telephone" id="Telephone">
									</div>
									<div class="input-field">
										<label for="Email">Email</label>
										<input type="text" name="email" id="Email">
									</div>
									<div class="input-field ">
										<label for="Motif">Motif</label>
										<textarea id="motif" name='motif' class="materialize-textarea"></textarea>
									</div>
									
									<div class="input-field ">
										<select name="reservation">
										<?php foreach ($reserve as $row) {?>
												<option value="<?php echo $row['nom']?>"><?php echo $row['nom'] ?></option>
										<?php }?>
									
										</select>
										<label>Reservation</label>
									</div>
								
										<label>
											<input type="checkbox" class="filled-in"  />
											<span>Filled in</span>
										</label>
									
									
									
									<div class="input-field">
										<input type="hidden" name="idhoraire" id="Idhoraire" class="" value="<?php echo $idRdv?>" spellcheck="false" autocomplete="off" autocapitalize="off">
									</div>
									<div class="input-field">
										<input type="hidden" name="etat" id="Etat" class="" value="0" spellcheck="false" autocomplete="off" autocapitalize="off">
									</div>
									<div class="input-field">
										<input type="hidden" name="jour" id="jour" class="" value="<?php echo $jour?>" spellcheck="false" autocomplete="off" autocapitalize="off">
									</div>
									<p>
										<input type="submit" value="Enregistrer" class="btn-large z-depth-0">
									</p>
								</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</main>

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

	<script src="<?php echo base_url('')?>assets/js/jquery.min.js"></script>

	<script
		src="<?php echo base_url('')?>assets/js/option_selection-fe6b72c2bbdd3369ac0bfefe8648e3c889efca213baefd4cfb0dd9363563831f.js"
		type="text/javascript"></script>

	<script
		src="<?php echo base_url('')?>assets/js/api.jquery-e94e010e92e659b566dbc436fdfe5242764380e00398907a14955ba301a4749f.js"
		type="text/javascript"></script>

	<!--[if (gt IE 9)|!(IE)]><!-->
	<script src="<?php echo base_url('')?>assets/js/vendorcfcd.js" defer="defer"></script>
	<!--<![endif]-->
	<!--[if lt IE 9]><script src="//cdn.shopify.com/s/files/1/2030/2737/t/6/assets/vendor.js?0"></script><![endif]-->

	<!--[if (gt IE 9)|!(IE)]><!-->
	<script src="<?php echo base_url('')?>assets/js/themecfcd.js?" defer="defer"></script>
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

<!-- Mirrored from materialize-shopify-themes.myshopify.com/account/register by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Apr 2019 07:19:46 GMT -->

</html>