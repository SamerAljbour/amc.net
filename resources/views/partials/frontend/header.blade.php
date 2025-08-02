            <!--NAVIGATION ******************************************************************************************-->
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top ts-separate-bg-element" style="background-color: black" data-bg-color="#1d1d1d">
                <div class="container">
                    <a class="navbar-brand" href="#page-top"
                    style="{{ app()->getLocale() == 'ar' ? 'margin-left: 10px;' : '' }}">
                            {{-- <img src="{{ asset('assets/img/AMC LOGO PNG 1.png') }}" width="50px" height="50px" alt=""> --}}
                            AMC
                            {{-- <img src="{{ asset('assets/img/amc logo.png') }}" alt=""> --}}

</a>

                    <!--end navbar-brand-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!--end navbar-toggler-->
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto {{ app()->getLocale() == 'ar' ? 'me-5' : '' }}">
                            <a class="nav-item nav-link active ts-scroll " href="#page-top">
                                {{ __('header.Home') }} <span class="sr-only">(current)</span>
                            </a>
                            <a class="nav-item nav-link ts-scroll" href="#about-us"> {{ __('header.About_us') }}</a>
                            {{-- <a class="nav-item nav-link ts-scroll" href="#advanced-features">Features</a>
                            <a class="nav-item nav-link ts-scroll" href="#pricing">Pricing</a>
                            <a class="nav-item nav-link ts-scroll" href="#our-clients">Our Clients</a>
                            <a class="nav-item nav-link ts-scroll" href="#our-team">Team</a> --}}
                            <a class="nav-item nav-link ts-scroll" href="#form-contact">{{ __('header.contact_us') }}</a>
                                @if (app()->getLocale() === 'ar')
                                <a class="nav-item nav-link ts-scroll" href="{{ route('lang.switch', 'en') }}">English</a>
                            @else
                                <a class="nav-item nav-link ts-scroll" href="{{ route('lang.switch', 'ar') }}">العربية</a>
                            @endif

                            {{-- <a class="ts-scroll btn btn-outline-light btn-sm m-1 px-3 ts-width__auto" href="#">
                                <i class="fas fa-sign-in-alt ts-opacity__80 pr-2"></i>
                                Log In
                            </a>
                            <a class="ts-scroll btn btn-primary btn-sm m-1 px-3 ts-width__auto" href="#">{{ __('home.Register') }}</a> --}}
                        </div>
                        <!--end navbar-nav-->
                    </div>
                    <!--end collapse-->
                </div>
                <!--end container-->
            </nav>
            <!--end navbar-->
