<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" @yield('angular')>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="jiu jitsu, martial arts, grappler's elite, michael pease">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('meta')
        
        <title>@yield('title')</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/template.css') }}" rel="stylesheet">
        @yield('stylesheets')
    </head>
    <body>
        @yield('content-super')
        <div class="container-fluid" id="wrapper">
            <nav class="sidebar">
                <h1 class="site-title">
                    <a href="/home"><img src="{{ asset('images/logo-alpha-white.png') }}" alt="Grappler's Elite logo" width="100%" id="menu-image"/></a>
                </h1>
                <a href="#" class="" id="menu-toggle"><em class="fa fa-bars fa-2x"></em></a>
                <ul class="nav nav-pills flex-column sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/home"><em class="fa fa-home"></em> HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule"><em class="far fa-calendar"></em> SCHEDULE</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="/tournaments"><em class="fa fa-chess"></em> TOURNAMENTS</a>
                        </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="adults">ADULTS <em class="fa fa-caret-right" id="adults-caret"></em></a>
                    </li>
                    <div id="adults-dropdown">
                        <li class="nav-item">
                            <a class="nav-link dropdown-link" href="/program/adult">Adult Program</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-link" href="/belt-ranks/adult">Adult Belt Ranks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-link" href="/rates/adult">Adult Rates</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-link" href="/faq/adult">Adult FAQ</a>
                        </li>
                    </div>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="kids">KIDS/YOUTH <em class="fa fa-caret-right" id="kids-caret"></em></a>
                    </li>               
                    <div id="kids-dropdown">
                        <li class="nav-item">
                            <a class="nav-link dropdown-link" href="/program/junior">Junior Program</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-link" href="/belt-ranks/junior">Junior Belt Ranks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-link" href="/rates/junior">Junior Rates</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-link" href="/faq/junior">Junior FAQ</a>
                        </li>
                    </div>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="about">MORE <em class="fa fa-caret-right" id="about-caret"></em></a>
                    </li>    
                    <div id="about-dropdown">
                        <li class="nav-item">
                            <a class="nav-link dropdown-link" href="/about">About Grapplers Elite</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-link" href="/team">Our Team</a>
                        </li>           
                        <li class="nav-item">
                            <a class="nav-link dropdown-link" href="/policies">Academy Policies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-link" href="/university">University Classes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-link" href="/outreach">Grapplers Outreach</a>
                        </li>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact"><em class="fa fa-envelope"></em> CONTACT</a>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="/register"><em class="fa fa-plus"></em> Add Administrator</a>
                        </li>
                    @endif
                </ul>
                @if(Auth::check())
                    <div class="text-center mt-5 logout-wrapper">
                        <a href="/logout" class="btn-square"><em class="fa fa-power-off"></em> Sign Out</a>
                    </div>
                @else
                    <div class="text-center mt-5 logout-wrapper">
                        <a href="/login" class="btn-square"><em class="fa fa-power-off"></em> Sign In</a>
                    </div>
                @endif
            </nav>
            <main>
                @yield('content')
            </main>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/template.js') }}"></script>
        <script src="{{ asset('js/fontawesome-all.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        @yield('scripts')
    </body>
</html>