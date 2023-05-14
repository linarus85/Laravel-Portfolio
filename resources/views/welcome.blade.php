<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!--- basic page needs
        ================================================== -->
    <meta charset="utf-8">
    <title>Portfolio</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
        ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
        ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/vendor.css">

    <!-- script
        ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="https://kit.fontawesome.com/631e49e796.js" crossorigin="anonymous"></script>
    <!-- favicons
        ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/svg" sizes="32x32" href="images/logo.svg">
    <link rel="icon" type="image/svg" sizes="16x16" href="images/logo.svg">
    <link rel="manifest" href="site.webmanifest">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body id="top">
    <div>
        <div id="preloader">
            <div id="loader" class="dots-fade">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>

        <header class="s-header">
            @foreach ($header as $h)
                <div class="header-logo">
                    <a href="https://github.com/linarus85?tab=repositories" target="_blank">
                        <i class="{{ $h->icon }}"></i>
                    </a>
                </div>
            @endforeach

            <div class="header-content">

                <nav class="row header-nav-wrap">
                    <ul class="header-nav">
                        @foreach ($menu as $m)
                            <li><a class="smoothscroll" href="#{{ $m->scroll }}"
                                    title="{{ $m->title }}">{{ $m->title }}</a></li>
                        @endforeach


                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/dashboard') }}">Админка</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Войти</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Регистрация</a></li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </nav> <!-- end header-nav-wrap -->
            </div> <!-- end header-content -->

            <a class="header-menu-toggle" href="#0"><span>Menu</span></a>

        </header>


        @foreach ($header as $h)
            <section id="hero" class="s-hero target-section" data-parallax="scroll"
                data-image-src="{{ 'storage/' . $h->image }}" data-position-y=center>
                <div class="row hero-content">

                    <div class="column large-full">
                        <h1>
                            {{ $h->title }}
                        </h1>
                    </div>

                </div> <!-- end hero-content -->

                <div class="hero-scroll">
                    <a href="#about" class="scroll-link smoothscroll">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M12 24l-8-9h6v-15h4v15h6z" />
                        </svg>
                    </a>
                </div> <!-- end hero-scroll -->

            </section> <!-- end s-hero -->
        @endforeach



        <!-- about
            ================================================== -->
        <section id="about" class="s-about target-section">

            <div class="s-about__section s-about__section--profile">

                <div class="right-vert-line"></div>

                <div class="row">
                    <div class="column large-6 medium-8 tab-full">
                        @foreach ($about as $a)
                            <div class="section-intro" data-num="01" data-aos="fade-up">
                                <h3 class="subhead">О себе</h3>
                                <h1 class="display-1">{{ $a->bigtitle }}</h1>
                            </div>

                            <div class="profile-pic" data-aos="fade-up">
                                <img src="{{ 'storage/' . $a->image }}" srcset="{{ 'storage/' . $a->image }}"
                                    alt="">
                            </div>

                            <h3 data-aos="fade-up">{{ $a->title }}</h3>

                            <p data-aos="fade-up">
                                {{ $a->content }}
                            </p>
                        @endforeach

                    </div>
                </div>

            </div> <!-- end s-about__section--profile -->

        </section> <!-- end s-about -->


        <!-- services
            ================================================== -->
        <section id="services" class="s-services target-section h-dark-bg">

            <div class="row s-services__content">

                <div class="vert-line"></div>

                <div class="column large-6 s-services__leftcol">
                    <div class="section-intro" data-num="02" data-aos="fade-up">
                        <h3 class="subhead">Скиллы</h3>
                        @foreach ($skill as $s)
                            <h1 class="display-1">
                                {{ $s->bigtitle }}
                            </h1>
                        @endforeach
                    </div>
                    @foreach ($skill as $s)
                        <p class="lead" data-aos="fade-up">
                            {{ $s->content }}
                        </p>
                    @endforeach

                </div> <!-- end  s-services--leftcol -->
                @foreach ($skill as $s)
                    <div class="column large-6">
                        <ul class="services-list" data-aos="fade-up">
                            <li class="services-list__item is-active">
                                <div>
                                    <h5>{{ $s->skilltitle }}</h5>
                                </div>
                                <div>
                                    <p>
                                        {{ $s->text }}
                                    </p>
                                </div>
                        </ul> <!-- end services-list -->
                    </div>
                @endforeach


            </div> <!-- s-services__content -->

        </section> <!-- end s-services -->


        <!-- portfolio
            ================================================== -->
        <section id="portfolio" class="s-portfolio target-section">

            <div class="row s-portfolio__header">
                <div class="column large-6 medium-8 tab-full">
                    <div class="section-intro" data-num="03" data-aos="fade-up">
                        <h3 class="subhead">Мои работы</h3>
                        @foreach ($work as $w)
                            <h1 class="display-1">
                                {{ $w->bigtitle }}
                            </h1>
                        @endforeach
                    </div>
                </div>
            </div> <!-- s-porfolio__header -->

            @foreach ($work as $w)
                <div class="row s-porfolio__list block-tab-full collapse">

                    <div class="column" data-aos="fade-up">
                        <div class="folio-item">
                            <div class="folio-item__thumb">
                                <a class="folio-item__thumb-link" href="{{ 'storage/' . $w->image }}"
                                    title="{{ $w->title }}" data-size="1050x700">
                                    <img src="{{ 'storage/' . $w->image }}" srcset="{{ 'storage/' . $w->image }}"
                                        alt="">
                                </a>
                            </div>
                            <div class="folio-item__info">
                                <div class="folio-item__cat">{{ $w->program }}</div>
                                <h4 class="folio-item__title">{{ $w->title }}</h4>
                            </div>
                            <a target="_blank" href="{{ $w->link }}" title="Ссылка на репозитории"
                                class="folio-item__project-link">Ссылка на репозитории</a>
                            <div class="folio-item__caption">
                                <p>{{ $w->description }}</p>
                            </div>
                        </div>
                    </div> <!-- end column -->
                </div> <!-- folio-list -->
            @endforeach

        </section> <!-- end portfolio -->



        <!-- footer
            ================================================== -->
        <footer id="footer" class="s-footer h-dark-bg">

            <div class="right-vert-line"></div>
            @foreach ($contact as $c)
                <div class="row s-footer__main">
                    <div class="column large-6">
                        <div class="section-intro" data-aos="fade-up">
                            <h3 class="subhead">Связаться со мной</h3>

                            <h1 class="display-1">
                                {{ $c->title }}
                            </h1>
                        </div>

                        <div class="footer-email-us">
                            <a href="mailto:#0" class="btn btn--primary h-full-width">Напишите мне</a>
                        </div>
                    </div>

                    <div class="column large-5">
                        <div class="footer-contacts">
                            <div class="footer-contact-block" data-aos="fade-up">
                                <h5 class="footer-contact-block__header">
                                    Email
                                </h5>
                                <p class="footer-contact-block__content">
                                    <a href="mailto:#0">{{ $c->email }}</a>
                                </p>
                            </div> <!-- end footer-contact-block -->
                            <div class="footer-contact-block" data-aos="fade-up">
                                <h5 class="footer-contact-block__header">
                                    WhatsApp
                                </h5>
                                <p class="footer-contact-block__content">
                                    <a href="tel:+1975432345">{{ $c->phone }}</a>
                                </p>
                            </div> <!-- end footer-contact-block -->
            @endforeach

            <br>
            <div class="footer-contact-block" data-aos="fade-up">
                <h5 class="footer-contact-block__header">
                    Социальные сети
                </h5>
                <ul class="footer-contact-block__list">
                    @foreach ($social as $s)
                        <li><a target="_blank" href="{{ $s->link }}">{{ $s->name }}</a></li>
                    @endforeach
                </ul>
            </div> <!-- end footer-contact-block -->
    </div>
    </div>
    </div> <!-- end s-footer__main -->

    <div class="row s-footer__bottom">
        <div class="column large-full ss-copyright">
            <span>© Copyright</span>
            <span>Design by <a target="_blank" href="https://github.com/linarus85">Linar Gainetdinov</a></span>
        </div> <!-- end ss-copyright -->

        <div class="ss-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 0l8 9h-6v15h-4v-15h-6z" />
                </svg>
            </a>
        </div> <!-- end ss-go-top -->
    </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->


    <!-- photoswipe background
            ================================================== -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close"
                        title="Close (Esc)"></button> <button class="pswp__button pswp__button--share"
                        title="Share"></button> <button class="pswp__button pswp__button--fs"
                        title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom"
                        title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>

        </div>

    </div> <!-- end photoSwipe background -->


    <!-- Java Script
            ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    </div>
</body>

</html>
