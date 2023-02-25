<!DOCTYPE html>
<html lang="ar">

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="متجر الكتروني" content="Ogani Template">
    <meta name="الكترونيك" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(isset($title))
        {{ $title }}
        @endif
    </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;700&family=Tajawal&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="icon" type="image" href="{{asset('web-site/img/undraw_deliveries.svg')}}">
    <link rel="stylesheet" href="{{asset('web-site/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('web-site/css/style.css')}}" type="text/css">
    @toastr_css
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>

    </div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt="" /></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>

                <li>
                    <a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a>
                </li>
            </ul>
            <div class="header__cart__price"> <span></span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="" />
                <div> اللغة</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">العربية</a></li>

                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-heart"></i> عالمك واجمل</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{url('welcome')}}">الرئسية </a></li>

                <li><a href="{{url('shoping')}}">التسوق</a></li>

                <li><a href="#about">من نحن </a></li>

                <li><a href="{{url('contact')}}">تواصل معنا</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="https://web.facebook.com/American44shop"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="https://api.whatsapp.com/send?phone=0125993977&amp;textمرحبا بك في المتجر :)"><i class="fa fa-whatsapp"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> engrago26cosmetic@gmail.com</li>
                <li>رفاهية لاتسوق اريحية الاسعار</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> engrago26cosmetic@gmail.com</li>
                                <li>رفاهية لاتسوق اريحية الاسعار</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="https://web.facebook.com/American44shop"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="https://api.whatsapp.com/send?phone=0125993977&amp;textمرحبا بك في المتجر :)"><i class="fa fa-whatsapp"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="" />
                                <div>اللغة</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">العربية</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-heart"></i> عالمك واجمل</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{url('welcome')}}"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{url('welcome')}}">الرئسية </a></li>

                            <li><a href="{{url('shoping')}}">التسوق</a></li>

                            <li><a href="./shop-grid.html">من نحن </a></li>

                            <li><a href="{{url('contact')}}">تواصل معنا</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section End -->
    @yield('content')
    <div class="whatsapp-icon">
        <a href="https://api.whatsapp.com/send?phone=0125993977&amp;textمرحبا بك في المتجر :)"><img src=web-site/img/watsapp.jpg style="bottom: 80px;
        right: 10px;
     position: fixed;
     color: green;
  width:70px;" class="rounded-circle"></a>
    </div>

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{url('/')}}">رجو كولكشن</a>
                        </div>
                        <ul>
                            <li>العنوان: الخرطوم </li>
                            <li>الهاتف: .0125993977</li>
                            <li>الايميل:engrago26cosmetic@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>روابط سريعة</h6>
                        <ul>
                            <li><a href="{{url('welcome')}}">الرئسية</a></li>
                            <li><a href="{{url('shoping')}}">التسوق</a></li>


                        </ul>
                        <ul>
                            <li><a href="#about">من نحن </a></li>
                            <li><a href="{{url('contact')}}">اتصل بنا</a></li>


                        </ul>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>انضم الينا </h6>
                        <p>
                            ليصلك كل الجديد
                        </p>
                        <form action="#">
                            <input type="text" placeholder="ادخل الايميل" />
                            <button type="submit" class="site-btn">اشتراك</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="https://web.facebook.com/American44shop"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=0125993977&amp;textمرحبا بك في المتجر :)"><i class="fa fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                جميع الحقوق محفوظة
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <a href="https://colorlib.com" target="_blank">رجاء كولكشن</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment">
                            <img src="img/payment-item.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('web-site/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('web-site/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('web-site/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('web-site/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('web-site/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('web-site/js/mixitup.min.js')}}"></script>
    <script src="{{asset('web-site/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('web-site/js/main.js')}}"></script>
    @toastr_js
    @toastr_render



</body>

</html>