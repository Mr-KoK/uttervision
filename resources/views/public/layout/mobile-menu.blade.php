<div class="mobile-menu-overlay" id="mobile-menu-overlay">
    <div class="mobile-menu-overlay__inner">
        <div class="mobile-menu-overlay__header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8">
                        <!-- logo -->
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{asset('assets/images/svg/main-logo.svg')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-4">
                        <!-- mobile menu content -->
                        <div class="mobile-menu-content text-right">
                            <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu-overlay__body">
            <nav class="offcanvas-navigation">
                <ul>
                    <li class="has-children"><a href="{{ route('home') }}">Home</a></li>
                    <li class="has-children"><a href="{{ route('about') }}">About</a></li>
                    <li class="has-children"><a href="{{ route('services') }}">Services</a></li>
                    <li class="has-children"><a href="{{ route('contact') }}">Contact</a></li>
                    <li class="has-children"><a href="{{ route('dev') }}">Blogs</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
