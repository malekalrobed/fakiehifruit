<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            @if (isset($title))
                {{ $title }}
            @else
                Defualt
            @endif
        </title>            
        <link rel="shortcut icon" href="{{ asset('css/favicon.png') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/frontend/reset.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/frontend/frontend.css') }}">
    
        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="{{ asset('engine1/style.css') }}" />
        <!-- End WOWSlider.com HEAD section -->

    </head>
    <body dir="rtl">
        <header>
            @include('frontend.includes.navbar')                                
        </header>

        <!-- Start Content -->
        
        @yield('content')                
        <!-- End Content -->
        
        <footer>
            @include('frontend.includes.footer')
        </footer>

        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Nice SelectBoxIt --> 
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <script src="{{ asset('js/frontend/navbarfrontend.js') }}"></script>


        <!-- Start WOWSlider.com BODY section -->
        <script type="text/javascript" src="{{ asset('engine1/wowslider.js') }}"></script>
        <script type="text/javascript" src="{{ asset('engine1/script.js') }}"></script>
        <!-- End WOWSlider.com BODY section -->
        
    </body>
</html>