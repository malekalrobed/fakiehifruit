<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            {{ config('app.name') }}
        </title>            
        <link rel="shortcut icon" href="{{ asset('css/favicon.png') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">    		
        <!-- -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/ar.css') }}">
        <style>
            .custom-form{
                max-width: 400px;
                margin: 100px auto
            }

            .custom-form h1 {
                margin-bottom: 30px;
            }
            .is-invalid:focus,
            .is-invalid {
                border-color: red;
            }
            .invalid-feedback {
                color: red;
            }
        </style>
    </head>
    <body dir="rtl">
        <header>
            @include('includes.messages')
        </header>

            <div class="container">
                <div class="custom-form">                                        
                    @yield('content')
                </div>                      
            </div>
        <!-- End Container -->        
        
        <footer>
            @include('includes.footer')
        </footer>            
    </body>
</html>


