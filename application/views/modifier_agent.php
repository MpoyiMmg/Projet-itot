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

<body id="materialize-shopify-themes" class="template-index white">
    <head>
        <script src="https://use.fontawesome.com/484df5253e.js"></script>
    </head>
    <div id="shopify-section-header" class="shopify-section">
        <nav class="nav-extended">
            <div class="nav-background">
                <div class="pattern active"
                    style="background-image: url('<?= base_url('') ?>assets/img/icon-seamless_ef568d79-394b-49ab-a3c5-128827d788e837cb.png?v=1496294246');">
                </div>
            </div>
            <div class="nav-wrapper container">
                <a href="index2.html" itemprop="url" class="brand-logo site-logo">
                    TakeDate
                </a>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">

                    <li class="site-nav--active active">
                        <a href="<?= base_url()?>" class="site-nav__link">Acceuil</a>
                    </li>
                    <li>
                        <a href="" class="site-nav__link">Rendez-Vous</a>
                    </li>
                    <li>
                        <a href="<?= base_url('entreprise')?>">
                            Entreprises
                        </a>
                    </li>
                    <li>
                        <a class="fullscreen-search" href="#">
                            <i class="material-icons">search</i>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('login'); ?>" id="customer_login_link">Se deconnecter</a>
                    </li>
                    <li>
                        <a href="#profil" class="modal-trigger btn-floating right waves-effect btn-flat" style="margin-top: 20px;">
                            <div class="circle" style="background: rgba(15,15,15,0.3); margin-top: 2pxpx;">
                                <img src="<?= base_url('assets/img/avatar/avatar-7.png');?>" alt="" srcset="" class="circle right" style="margin-top: 0px;">
                            </div>
                            <i style="background-color : #00E676; height:7px; width : 7px; float:right; border-radius:100%; margin-top:-8px; margin-left:-20px;"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
            <div id="add_agent_form">
            <div class="modal-content">
                <h5>Ajouter un agent</h5>
                <form method="post" action="<?= base_url('ajouter_agent');?>" id="create_customer" accept-charset="UTF-8">
                    <input type="hidden" name="idEntreprise" value="" />
                    <input type="hidden" name="idDpt" value="✓" />
                    <div class="input-field">
                        <label for="name">
                            Nom
                        </label>
                        <input type="text" name="name" id="name" value="">
                    </div>
                
                    <div class="input-field">
                        <label for="phone">
                            Numero de téléphone
                        </label>
                        <input type="text" name="customer[last_name]" id="LastName">
                    </div>
                
                    <div class="input-field">
                        <label for="Email">
                            Email
                        </label>
                        <input type="email" name="email" id="Email" class="" value="" spellcheck="false" autocomplete="off"
                            autocapitalize="off">
                    </div>
                
                    <div class="input-field">
                        <label for="pwd">
                            Mot de passe
                        </label>
                        <input type="password" name="pwd" id="pwd" class="">
                    </div>
                
                    <div class="modal-footer">
                        <input type="submit" value="Créer" class="btn-flat waves-effect waves-light white-text" style="background-color: #04C39F;">
                        <a href="#!" class="modal-close waves-effect waves-red btn-flat">Fermer</a>
                    </div>
                </form>
            </div>
        </div>
            </div>
        </div>
        

       
        
        <div id="aside_modal" class="modal">
            <div class="modal-content">
                <h5>Modal Header</h5>
                <p>A bunch of text</p>
                </div>
                <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>
        <!-- Javascript -->


        <script
            src="../cdn.shopify.com/s/assets/themes_support/option_selection-fe6b72c2bbdd3369ac0bfefe8648e3c889efca213baefd4cfb0dd9363563831f.js"
            type="text/javascript"></script>

        <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
        <script src='https://npmcdn.com/react@15.3.0/dist/react.min.js'></script>
        <script src='https://npmcdn.com/react-dom@15.3.0/dist/react-dom.min.js'></script>

        <script
            src="../cdn.shopify.com/s/assets/themes_support/api.jquery-e94e010e92e659b566dbc436fdfe5242764380e00398907a14955ba301a4749f.js"
            type="text/javascript"></script>

        <!--[if (gt IE 9)|!(IE)]><!-->
        <script src="../cdn.shopify.com/s/files/1/2030/2737/t/6/assets/vendorcfcd.js?0" defer="defer"></script>
        <!--<![endif]-->
        <!--[if lt IE 9]><script src="//cdn.shopify.com/s/files/1/2030/2737/t/6/assets/vendor.js?0"></script><![endif]-->

        <!--[if (gt IE 9)|!(IE)]><!-->
        <script src="../cdn.shopify.com/s/files/1/2030/2737/t/6/assets/themecfcd.js?0" defer="defer"></script>
        <!--<![endif]-->
        <!--[if lt IE 9]><script src="//cdn.shopify.com/s/files/1/2030/2737/t/6/assets/theme.js?0"></script><![endif]-->

        <script src="<?php echo base_url('')?>assets/calendar/js/index.js"></script>

        <script src="<?php echo base_url('')?>assets/js/agent.js"></script>

        <script>
            $(document).ready(function () {
                var categories = $('nav .categories-container');
                if (categories.length) {
                    categories.pushpin({ top: categories.offset().top });
                }

                var elems = document.querySelectorAll('.modal');
                var instances = M.Modal.init(elems);
            });
            var base_url = '<?php echo base_url('')?>';
            
        </script>

</body>

</html>