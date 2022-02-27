<x-app-layout>
    <!DOCTYPE html>
{{-- <html lang="en"> --}}
            {{-- "{{ asset('css/css-home01/*.css') }}" --}}
            {{-- "{{ asset('js/js-home01/*.js') }}" --}}
            {{-- "{{ asset('img/images-home01/*.*') }}" --}}
            {{-- "{{ asset('fonts/fonts-home01/*.*') }}" --}}

    <head>
        @push('css')
                <link rel="stylesheet" href="{{ asset('css/css-home01/animate.min.css') }}">
                {{-- <link rel="stylesheet" href="{{ asset('css/css-home01/bootstrap.min.css') }}"> --}}
                <link rel="stylesheet" href="{{ asset('css/css-home01/font-awesome.min.css') }}">
                <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
                <link rel="stylesheet" href="{{ asset('css/css-home01/templatemo-style.css') }}">
        @endpush

        @push('js')
                <script src="{{ asset('js/js-home01/jquery.js') }}"></script>
                <script src="{{ asset('js/js-home01/bootstrap.min.js') }}"></script>
                <script src="{{ asset('js/js-home01/jquery.singlePageNav.min.js') }}"></script>
                <script src="{{ asset('js/js-home01/typed.js') }}"></script>
                <script src="{{ asset('js/js-home01/wow.min.js') }}"></script>
                <script src="{{ asset('js/js-home01/custom.js') }}"></script>
        @endpush


        @stack('css')

        @stack('js')
    </head>


    <body>
        <div id="top">

            <!-- start preloader -->
            {{-- <div class="preloader">
                <div class="sk-spinner sk-spinner-wave">
                    <div class="sk-rect1"></div>
                    <div class="sk-rect2"></div>
                    <div class="sk-rect3"></div>
                    <div class="sk-rect4"></div>
                    <div class="sk-rect5"></div>
                </div>
            </div> --}}
            <!-- end preloader -->

            <!-- start header -->
            {{-- <header>
                <div class="container mx-auto sm:px-4">
                    <div class="flex flex-wrap ">
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/3 pr-4 pl-4 sm:w-full pr-4 pl-4">
                            <p><i class="fa fa-phone"></i><span> Phone</span>+91 94884 87853</p>
                        </div>
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/3 pr-4 pl-4 sm:w-full pr-4 pl-4">
                            <p><i class="fa fa-envelope-o"></i><span> Email</span><a href="mailto:giridesigns5@gmail.com">giridesigns5@gmail.com</a></p>
                        </div>
                        <div class="md:w-2/5 pr-4 pl-4 sm:w-1/3 pr-4 pl-4 sm:w-full pr-4 pl-4">
                            <ul class="social-icon">
                                <li><span>Meet us on</span></li>
                                <li><a href="#" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-instagram"></a></li>
                                <li><a href="https://www.youtube.com/channel/UC4yzoGuKkCL_8FzI-B-x83A" class="fa fa-youtube"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header> --}}
            <!-- end header -->

            <!-- start navigation -->
            {{-- <nav class="relative flex flex-wrap items-center content-between py-3 px-4 navbar-default templatemo-nav" role="navigation">
                <div class="container mx-auto sm:px-4">
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon icon-bar"></span>
                            <span class="icon icon-bar"></span>
                            <span class="icon icon-bar"></span>
                        </button>
                        <a href="#" class="inline-block pt-1 pb-1 mr-4 text-lg whitespace-no-wrap">Proyecto DEMTec</a>
                    </div>
                    <div class="hidden flex-grow items-center">
                        <ul class="flex flex-wrap list-none pl-0 mb-0 flex flex-wrap list-reset pl-0 mb-0 navbar-right">
                            <li><a href="login">LOGIN</a></li>
                        </ul>
                    </div>
                </div>
            </nav> --}}
            <!-- end navigation -->

            <!-- start home -->
            <div id="home">
                <div class="container mx-auto sm:px-4">
                    <div class="flex flex-wrap">
                        <div class="col-md-offset-2 md:w-2/3 pr-4 pl-4">
                            <h1 class="wow fadeIn" data-wow-offset="50" data-wow-delay="0.9s">La educación, como la luz del sol, puede y debe llegar a todos. &nbsp <span> José Pedro Varela </span></h1>
                            <div class="element">
                                <div class="sub-element">El aprendizaje en línea no será la siguiente gran cosa,</div>
                                <div class="sub-element">ya es la gran cosa ahora.</div>
                                <div class="sub-element">― Donna J. Abernathy</div>
                            </div>
                           {{--  <a data-scroll href="posts" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default wow fadeInUp" data-wow-offset="50" data-wow-delay="0.6s">CATALOGO</a> --}}
                            {{-- <a data-scroll href="activities" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default wow fadeInUp" data-wow-offset="50" data-wow-delay="0.6s">ACTIVIDADES</a> --}}
                            {{-- <a data-scroll href="#" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default wow fadeInUp" data-wow-offset="50" data-wow-delay="0.6s">GET STARTED</a> --}}
                        </div>

                        <div class="items-center col-md-offset-2 md:w-2/3 pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="2.9s">
                            {{-- <h1 class="wow fadeIn" data-wow-offset="50" data-wow-delay="0.9s">La educación, como la luz del sol, puede y debe llegar a todos. &nbsp <span> José Pedro Varela </span></h1>
                            <div class="element">
                                <div class="sub-element">El aprendizaje en línea no será la siguiente gran cosa,</div>
                                <div class="sub-element">ya es la gran cosa ahora.</div>
                                <div class="sub-element">― Donna J. Abernathy</div>
                            </div> --}}
                            <a data-scroll href="posts" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default wow fadeInUp" data-wow-offset="50" data-wow-delay="0.6s">CATALOGO</a>
                            <a data-scroll href="activities" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default wow fadeInUp" data-wow-offset="50" data-wow-delay="0.6s">ACTIVIDADES</a>
                            {{-- <a data-scroll href="#" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default wow fadeInUp" data-wow-offset="50" data-wow-delay="0.6s">GET STARTED</a> --}}
                        </div>

                    </div>
                </div>
            </div>
            <!-- end home -->

            <!-- start about -->
            {{-- <section id="about">
                <div class="container mx-auto sm:px-4">
                    <div class="flex flex-wrap ">
                        <div class="md:w-full pr-4 pl-4">
                            <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">WE ARE <span>AWESOME</span></h2>
                        </div>
                        <div class="md:w-1/3 pr-4 pl-4 sm:w-1/3 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeInLeft" data-wow-offset="50" data-wow-delay="0.6s">
                            <div class="flex items-start">
                                <div class="media-heading-wrapper">
                                    <div class="media-object pull-left">
                                        <i class="fa fa-mobile"></i>
                                    </div>
                                    <h3 class="media-heading">FULLY RESPONSIVE</h3>
                                </div>
                                <div class="flex-1">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molestie. Adipiscing vitae vel quam proin eget mauris eget. Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-1/3 pr-4 pl-4 sm:w-1/3 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeInUp" data-wow-offset="50" data-wow-delay="0.9s">
                            <div class="flex items-start">
                                <div class="media-heading-wrapper">
                                    <div class="media-object pull-left">
                                        <i class="fa fa-comment-o"></i>
                                    </div>
                                    <h3 class="media-heading">FREE SUPPORT</h3>
                                </div>
                                <div class="flex-1">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molestie. Adipiscing vitae vel quam proin eget mauris eget. Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-1/3 pr-4 pl-4 sm:w-1/3 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeInRight" data-wow-offset="50" data-wow-delay="0.6s">
                            <div class="flex items-start">
                                <div class="media-heading-wrapper">
                                    <div class="media-object pull-left">
                                        <i class="fa fa-html5"></i>
                                    </div>
                                    <h3 class="media-heading">HTML5 &AMP; CSS3</h3>
                                </div>
                                <div class="flex-1">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molestie. Adipiscing vitae vel quam proin eget mauris eget. Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!-- end about -->

            <!-- start team -->
            {{-- <section id="team">
                <div class="container mx-auto sm:px-4">
                    <div class="flex flex-wrap ">
                        <div class="md:w-full pr-4 pl-4">
                            <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>AWESOME</span> TEAM</h2>
                        </div>
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="1.3s">
                            <div class="team-wrapper">
                                <img src="img/images-home01/member-1.jpg" class="img-responsive" alt="team img 1">
                                    <div class="team-des">
                                        <h4>Giri Dharan</h4>
                                        <span>Designer</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molest.</p>
                                    </div>
                            </div>
                        </div>
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="1.6s">
                            <div class="team-wrapper">
                                <img src="img/images-home01/member-1.jpg" class="img-responsive" alt="team img 2">
                                    <div class="team-des">
                                        <h4>Giri Dharan</h4>
                                        <span>Developer</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molest.</p>
                                    </div>
                            </div>
                        </div>
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="1.3s">
                            <div class="team-wrapper">
                                <img src="img/images-home01/member-1.jpg" class="img-responsive" alt="team img 3">
                                    <div class="team-des">
                                        <h4>Giri Dharan</h4>
                                        <span>Director</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molest.</p>
                                    </div>
                            </div>
                        </div>
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="1.6s">
                            <div class="team-wrapper">
                                <img src="img/images-home01/member-1.jpg" class="img-responsive" alt="team img 4">
                                    <div class="team-des">
                                        <h4>Giri Dharan</h4>
                                        <span>Manager</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molest.</p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!-- end team -->

            <!-- start service -->
            {{-- <section id="service">
                <div class="container mx-auto sm:px-4">
                    <div class="flex flex-wrap ">
                        <div class="md:w-full pr-4 pl-4">
                            <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">OUR <span>AWESOME</span> THINGS</h2>
                        </div>
                        <div class="md:w-1/3 pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s">
                            <i class="fa fa-laptop"></i>
                            <h4>Web Design</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molestie. Adipiscing vitae vel quam proin eget mauris eget. Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molestie.</p>
                        </div>
                        <div class="md:w-1/3 pr-4 pl-4 active wow fadeIn" data-wow-offset="50" data-wow-delay="0.9s">
                            <i class="fa fa-cloud"></i>
                            <h4>Cloud Computing</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molestie. Adipiscing vitae vel quam proin eget mauris eget. Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molestie.</p>
                        </div>
                        <div class="md:w-1/3 pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s">
                            <i class="fa fa-cog"></i>
                            <h4>UX Design</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molestie. Adipiscing vitae vel quam proin eget mauris eget. Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molestie.</p>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!-- end servie -->

            <!-- start portfolio -->
            {{-- <section id="portfolio">
                <div class="container mx-auto sm:px-4">
                    <div class="flex flex-wrap ">
                        <div class="md:w-full pr-4 pl-4">
                            <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>AWESOME</span> PORTFOLIO</h2>
                        </div>
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s">
                            <div class="portfolio-thumb">
                            <img src="img/images-home01/portfolio-img1.jpg" class="img-responsive" alt="portfolio img 1">
                                    <div class="portfolio-overlay">
                                        <h4>Project One</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget dia.</p>
                                        <a href="#" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default">DETAIL</a>
                                    </div>
                            </div>
                        </div>
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s">
                            <div class="portfolio-thumb">
                            <img src="img/images-home01/portfolio-img2.jpg" class="img-responsive" alt="portfolio img 2">
                                    <div class="portfolio-overlay">
                                        <h4>Project Two</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget dia.</p>
                                        <a href="#" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default">DETAIL</a>
                                    </div>
                            </div>
                        </div>
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s">
                            <div class="portfolio-thumb">
                            <img src="img/images-home01/portfolio-img3.jpg" class="img-responsive" alt="portfolio img 3">
                                    <div class="portfolio-overlay">
                                        <h4>Project Three</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget dia.</p>
                                        <a href="#" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default">DETAIL</a>
                                    </div>
                            </div>
                        </div>
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s">
                            <div class="portfolio-thumb">
                            <img src="img/images-home01/portfolio-img4.jpg" class="img-responsive" alt="portfolio img 4">
                                    <div class="portfolio-overlay">
                                        <h4>Project Four</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget dia.</p>
                                        <a href="#" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default">DETAIL</a>
                                    </div>
                            </div>
                        </div>
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s">
                            <div class="portfolio-thumb">
                            <img src="img/images-home01/portfolio-img3.jpg" class="img-responsive" alt="portfolio img 3">
                                    <div class="portfolio-overlay">
                                        <h4>Project Five</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget dia.</p>
                                        <a href="#" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default">DETAIL</a>
                                    </div>
                            </div>
                        </div>
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s">
                            <div class="portfolio-thumb">
                            <img src="img/images-home01/portfolio-img4.jpg" class="img-responsive" alt="portfolio img 4">
                                    <div class="portfolio-overlay">
                                        <h4>Project Six</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget dia.</p>
                                        <a href="#" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default">DETAIL</a>
                                    </div>
                            </div>
                        </div>
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s">
                            <div class="portfolio-thumb">
                            <img src="img/images-home01/portfolio-img1.jpg" class="img-responsive" alt="portfolio img 1">
                                    <div class="portfolio-overlay">
                                        <h4>Project Seven</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget dia.</p>
                                        <a href="#" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default">DETAIL</a>
                                    </div>
                            </div>
                        </div>
                        <div class="md:w-1/4 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeIn" data-wow-offset="50" data-wow-delay="0.6s">
                            <div class="portfolio-thumb">
                            <img src="img/images-home01/portfolio-img2.jpg" class="img-responsive" alt="portfolio img 2">
                                    <div class="portfolio-overlay">
                                        <h4>Project Eight</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget dia.</p>
                                        <a href="#" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default">DETAIL</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!-- end portfolio -->

            <!-- start contact -->
            {{-- <section id="contact">
                <div class="container mx-auto sm:px-4">
                    <div class="flex flex-wrap ">
                        <div class="md:w-full pr-4 pl-4">
                            <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">CONTACT <span>AWESOME</span></h2>
                        </div>
                        <div class="md:w-1/2 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeInLeft" data-wow-offset="50" data-wow-delay="0.9s">
                            <form action="#" method="post">
                                <label>NAME</label>
                                <input name="fullname" type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" id="fullname">

                                <label>EMAIL</label>
                                <input name="email" type="email" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" id="email">

                                <label>MESSAGE</label>
                                <textarea name="message" rows="4" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" id="message"></textarea>

                                <input type="submit" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded">
                            </form>
                        </div>
                        <div class="md:w-1/2 pr-4 pl-4 sm:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4 wow fadeInRight" data-wow-offset="50" data-wow-delay="0.6s">
                            <address>
                                <p class="address-title">OUR ADDRESS</p>
                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molestie.</span>
                                <p><i class="fa fa-phone"></i> +91 94884 87853</p>
                                <p><i class="fa fa-envelope-o"></i> giridesigns5@gmail.com</p>
                                <p><i class="fa fa-map-marker"></i> 50, Thiruvoodal Street, Thiruvannamalai - 606 601.</p>
                            </address>
                            <ul class="social-icon">
                                <li><h4>WE ARE SOCIAL</h4></li>
                                <li><a href="#" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="https://www.youtube.com/channel/UC4yzoGuKkCL_8FzI-B-x83A" class="fa fa-youtube"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!-- end contact -->



        </div>
    </body>
            <!-- start copyright -->
            <footer id="copyright">
                <div class="container mx-auto sm:px-4">
                    <div class="flex flex-wrap ">
                        <div class="md:w-full pr-4 pl-4 text-center">
                            <p class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">
                            https://sima.uny.edu.ve &copy; 2021. Diseñado por el Equipo de DEMTec</p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end copyright -->

{{-- </html> --}}


</x-app-layout>


