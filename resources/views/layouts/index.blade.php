<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7 ltie8 ltie9" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="ie ie8 ltie9" lang="en-US"><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->


<!-- index19:10 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="initial-scale=1.0" />

    <title>{{ config('app.name') }}</title>


    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic&amp;subset=latin&amp;' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Noto+Sans%3Aregular%2Citalic%2C700%2C700italic&amp;subset=greek%2Ccyrillic-ext%2Ccyrillic%2Clatin%2Clatin-ext%2Cvietnamese%2Cgreek-ext&amp;' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Merriweather%3A300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic&amp;subset=latin%2Clatin-ext&amp;' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Mystery+Quest%3Aregular&amp;subset=latin%2Clatin-ext&amp;' type='text/css' media='all' />


    <link rel='stylesheet' href='{{asset("css/style.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset("plugins/superfish/css/superfish.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset("plugins/dl-menu/component.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset("plugins/font-awesome-new/css/font-awesome.min.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset("plugins/elegant-font/style.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset("plugins/fancybox/jquery.fancybox.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset("plugins/flexslider/flexslider.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset("css/style-responsive.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset("css/style-custom.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset("plugins/masterslider/public/assets/css/masterslider.main.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset("css/master-custom.css")}}' type='text/css' media='all' />


</head>

<body data-rsssl=1 class="home page-template-default page page-id-5680 _masterslider _msp_version_3.2.7 woocommerce-no-js">
    <div class="body-wrapper  float-menu">
        <header class="greennature-header-wrapper header-style-5-wrapper greennature-header-with-top-bar">
            <!-- top navigation -->
            {{-- <div class="top-navigation-wrapper">
                <div class="top-navigation-container container">
                    <div class="top-navigation-left">
                        <div class="top-navigation-left-text">
                            Phone : +1800-222-3333      Email : contact@yourdomain.com </div>
                    </div>
                    <div class="top-navigation-right">
                        <div class="top-social-wrapper">
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-facebook"></i></a>
                            </div>
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-flickr"></i></a>
                            </div>
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-linkedin"></i></a>
                            </div>
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-tumblr"></i></a>
                            </div>
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-twitter"></i></a>
                            </div>
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-vimeo"></i></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div> --}}
            <div id="greennature-header-substitute"></div>
            <div class="greennature-header-inner header-inner-header-style-5">
                <div class="greennature-header-container container">
                    <div class="greennature-header-inner-overlay"></div>
                    <!-- logo -->
                    <div class="greennature-logo">
                        <div class="greennature-logo-inner">
                            <a href="/">
                                <img src="images/logo.png" alt="" /> </a>
                        </div>
                        <div class="greennature-responsive-navigation dl-menuwrapper" id="greennature-responsive-navigation">
                            <button class="dl-trigger">Open Menu</button>
                            <ul id="menu-main-menu" class="dl-menu greennature-main-mobile-menu">
                                <li class="menu-item menu-item-home current-menu-item page_item page-item-5680 current_page_item"><a href="{{ url('/landingHome') }}" aria-current="page">Inicio</a></li>
                                <li class="menu-item menu-item-has-children menu-item-15"><a href="{{ url('/landingMaps') }}">Mapa</a></li>
                                <li class="menu-item menu-item-has-children"><a href="{{ url('/landingAdopt') }}">Adoptar</a></li>
                                <li class="menu-item menu-item-has-children">
                                    {{-- <a href="blog-full-with-right-sidebar.html">
                                    </a> --}}
                                    @auth
                                        <a href="{{ url('/home') }}">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}">Log in</a>
                                    @endauth
                                </li>
                                @if (Route::has('register'))
                                    <li class="menu-item menu-item-has-childrenmenu-item menu-item-has-children greennature-normal-menu">
                                        <a href="{{ route('register') }}">Registro</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!-- navigation -->
                    <div class="greennature-navigation-wrapper">
                        <nav class="greennature-navigation" id="greennature-main-navigation">
                            <ul id="menu-main-menu-1" class="sf-menu greennature-main-menu">
                                <li class="menu-item menu-item-home current-menu-item greennature-normal-menu"><a href="/"><i class="fa fa-home"></i>Inicio</a></li>
                                <li class="menu-item menu-item-has-children greennature-normal-menu"><a href="/maps" class="sf-with-ul-pre"><i class="fa fa-file-text-o"></i>Mapa</a></li>
                                <li class="menu-item menu-item-has-childrenmenu-item menu-item-has-children greennature-mega-menu"><a href="/adopt" class="sf-with-ul-pre"><i class="fa fa-globe"></i>Adoptar</a></li>
                                <li class="menu-item menu-item-has-childrenmenu-item menu-item-has-children greennature-normal-menu">
                                    @auth
                                        <a href="{{ url('/home') }}" class="{{ url('/home') }}">Home</a>
                                    @else
                                        <a href="{{ route('login') }}" class="{{ route('login') }}">Log in</a>
                                    @endauth
                                    {{-- <a href="blog-full-with-right-sidebar.html" class="sf-with-ul-pre">
                                    Login
                                    </a> --}}
                                </li>
                                @if (Route::has('register'))
                                    <li class="menu-item menu-item-has-childrenmenu-item menu-item-has-children greennature-normal-menu">
                                        <a href="{{ route('register') }}" class="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                        <div class="greennature-navigation-gimmick" id="greennature-navigation-gimmick"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </header>
        <!-- is search -->
        @yield('content')


        <footer class="footer-wrapper">
            <div class="footer-container container">
                <div class="footer-column three columns" id="footer-widget-1">
                    <div id="text-5" class="widget widget_text greennature-item greennature-widget">
                        <div class="textwidget">
                            <p><img src="upload/logo-light.png" style="width: 170px;" alt="" /></p>
                            <p>Adopt A Tree es una iniciativa para crear una fundación que obtiene árboles y realiza su respetivo mantenimiento, para que la ciudadanía pueda adoptar árboles.</p>
                        </div>
                    </div>
                </div>
                <div class="footer-column three columns" id="footer-widget-2">
                    <div id="text-9" class="widget widget_text greennature-item greennature-widget">
                        <h3 class="greennature-widget-title">Datos De Contacto</h3>
                        <div class="clear"></div>
                        <div class="textwidget"><span class="clear"></span><span class="greennature-space" style="margin-top: -6px; display: block;"></span> Address: Mariquita Tolima

                            <span class="clear"></span><span class="greennature-space" style="margin-top: 10px; display: block;"></span>

                            <i class="greennature-icon fa fa-phone" style="vertical-align: middle; color: #fff; font-size: 16px; "></i> +57 601 244 5164

                            <span class="clear"></span><span class="greennature-space" style="margin-top: 10px; display: block;"></span>

                            <i class="greennature-icon fa fa-mobile" style="vertical-align: middle; color: #fff; font-size: 20px; "></i> +57 300 111 2222

                            <span class="clear"></span><span class="greennature-space" style="margin-top: 10px; display: block;"></span>

                            <i class="greennature-icon fa fa-envelope-o" style="vertical-align: middle; color: #fff; font-size: 16px; "></i> contact@adoptatree.com</div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            {{-- <div class="copyright-wrapper">
                <div class="copyright-container container">
                    <div class="copyright-left">
                        <a href="#"><i class="greennature-icon fa fa-facebook" style="vertical-align: middle;color: #bbbbbb;font-size: 20px"></i></a> <a href="#"><i class="greennature-icon fa fa-twitter" style="vertical-align: middle;color: #bbbbbb;font-size: 20px"></i></a> <a href="#"><i class="greennature-icon fa fa-dribbble" style="vertical-align: middle;color: #bbbbbb;font-size: 20px"></i></a> <a href="#"><i class="greennature-icon fa fa-pinterest" style="vertical-align: middle;color: #bbbbbb;font-size: 20px"></i></a> <a href="#"><i class="greennature-icon fa fa-google-plus" style="vertical-align: middle;color: #bbbbbb;font-size: 20px"></i></a> <a href="#"><i class="greennature-icon fa fa-instagram" style="vertical-align: middle;color: #bbbbbb;font-size: 20px"></i></a>
                    </div>
                </div>
            </div> --}}
        </footer>

    </div>
    <!-- body-wrapper -->

    <script type='text/javascript' src='js/jquery/jquery.js'></script>
    <script type='text/javascript' src='js/jquery/jquery-migrate.min.js'></script>
    <script>
        var ms_grabbing_curosr = 'plugins/masterslider/public/assets/css/common/grabbing.html',
            ms_grab_curosr = 'plugins/masterslider/public/assets/css/common/grab.html';
    </script>
    <script type='text/javascript' src='plugins/superfish/js/superfish.js'></script>
    <script type='text/javascript' src='js/hoverIntent.min.js'></script>
    <script type='text/javascript' src='plugins/dl-menu/modernizr.custom.js'></script>
    <script type='text/javascript' src='plugins/dl-menu/jquery.dlmenu.js'></script>
    <script type='text/javascript' src='plugins/jquery.easing.js'></script>
    <script type='text/javascript' src='plugins/fancybox/jquery.fancybox.pack.js'></script>
    <script type='text/javascript' src='plugins/fancybox/helpers/jquery.fancybox-media.js'></script>
    <script type='text/javascript' src='plugins/fancybox/helpers/jquery.fancybox-thumbs.js'></script>
    <script type='text/javascript' src='plugins/flexslider/jquery.flexslider.js'></script>
    <script type='text/javascript' src='plugins/jquery.isotope.min.js'></script>
    <script type='text/javascript' src='js/plugins.js'></script>
    <script type='text/javascript' src='plugins/masterslider/public/assets/js/masterslider.min.js'></script>
    <script type='text/javascript' src='plugins/jquery.transit.min.js'></script>
    <script type='text/javascript' src='plugins/gdlr-portfolio/gdlr-portfolio-script.js'></script>
    @yield('script')
    <script type='text/javascript'>
        @yield('inScript')
    </script>


    <script>
    (function ( $ ) {
        "use strict";

        $(function () {
            var masterslider_d1da = new MasterSlider();

            // slider controls
			masterslider_d1da.control('arrows'     ,{ autohide:true, overVideo:true  });
			masterslider_d1da.control('bullets'    ,{ autohide:false, overVideo:true, dir:'h', align:'bottom', space:6 , margin:25  });
            // slider setup
            masterslider_d1da.setup("slider_1", {
				width           : 1140,
				height          : 800,
				minHeight       : 0,
				space           : 0,
				start           : 1,
				grabCursor      : false,
				swipe           : true,
				mouse           : false,
				keyboard        : true,
				layout          : "fullwidth",
				wheel           : false,
				autoplay        : false,
                instantStartLayers:false,
				mobileBGVideo:false,
				loop            : true,
				shuffle         : false,
				preload         : 0,
				heightLimit     : true,
				autoHeight      : false,
				smoothHeight    : true,
				endPause        : false,
				overPause       : true,
				fillMode        : "fill",
				centerControls  : true,
				startOnAppear   : false,
				layersMode      : "center",
				autofillTarget  : "",
				hideLayers      : false,
				fullscreenMargin: 0,
				speed           : 20,
				dir             : "h",
				parallaxMode    : 'swipe',
				view            : "basic"
            });
            

            
            $("head").append( "<link rel='stylesheet' id='ms-fonts'  href='http://fonts.googleapis.com/css?family=Montserrat:regular,700%7CCrimson+Text:regular' type='text/css' media='all' />" );

            window.masterslider_instances = window.masterslider_instances || {};
            window.masterslider_instances["5_d1da"] = masterslider_d1da;
         });
        
    })(jQuery);
    </script> 
</body>

<!-- index19:10 GMT -->
</html>