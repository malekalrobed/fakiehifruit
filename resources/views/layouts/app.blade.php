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
		<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
        <!-- -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/ar.css') }}">
    </head>
    <body dir="rtl">
        <header>
            @include('includes.navbar')            
            @include('includes.header')
            @include('includes.messages')
        </header>

        <!-- Start Container -->
        <div class="container-fluid">
            <!-- Start wrap container -->
            <div class="wrap-container custom-class">
                <div class="main-panel">
                    <div class="panel panel-default main-panel">                        
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- Start wrap container -->
        </div>
        <!-- End Container -->
        
        <footer>
            @include('includes.footer')
        </footer>

        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Nice SelectBoxIt --> 
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <!-- -->
        
        <script src="{{ asset('js/backend.js') }}"></script>

        
        
    </body>
</html>