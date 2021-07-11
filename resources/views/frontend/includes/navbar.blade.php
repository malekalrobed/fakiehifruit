{{-- Start Section Logo --}}
<section class="section-logo">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pull-right">
                <a href="/">
                    <img src="{{ asset('storage/setting/logo.png') }}" alt="logo">
                </a>                
            </div>
            <div class="col-xs-9 col-md-4 pull-right">
                @php
                    if(!isset($search)){
                        $search = '';
                    }
                @endphp
                <form class="form-header" action="/filter" method="GET">
                    <div class="input-group form-group-lg">
                        <input type="text" name="search" value="{{ $search }}" class="form-control input-header" placeholder="ما الذي تبحث عنه ؟">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-header" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-xs-3 col-md-4 pull-right">
                {{-- <ul class="nav navbar-nav lang-drop">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LANGUAGE <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><img class="icon pull-right" width="25" src="{{ asset('css/images/saudi_arabia.png') }}" />اللغة العربية </a></li>                            
                            <li><a href="#"><img class="icon pull-right" width="25" src="{{ asset('css/images/united_kingdom.png') }}" /> Englich </a></li>                            
                        </ul>
                    </li>
                </ul> --}}
                <div class="mobile-menu">
                    <i class="fa fa-bars fa-3x js-menu-icon"></i>
                </div>
            </div>            
        </div>
    </div>
</section>
{{-- End Section Logo --}}

<!-- Start Navigation Bar -->
<section class="sections" style="height: 20px">
    <nav class="navbar js-navbar">
        <div class="main-boxing">
            <div class="container">
                @if (count($sections) > 0)                                                   
                    <ul class="menu">                
                        @foreach ($sections as $section)
                            <li>
                                <a class="link hasDropdown" href="#"> {{ $section->name }} <i class="fa fa-angle-down"></i></a>
                                <ul class="boxing">
                                    <div class="row">

                                    {{-- <div class="boxing__list"> --}}
                                        @foreach ($section->collections as $collection)
                                        <div class="main-box-collection col-xs-6 col-md-2 pull-right">
                                            <div class="box-collection">
                                                <a href="/collection/{{ $collection['id'] }}" class="inline-block">
                                                    <div class="box-content">
                                                        <img src="{{ asset('storage/images/collections').'/'.$collection['image'] }}" alt="section" class="image">
                                                        <div class="overlay">                                                                
                                                        </div> 
                                                        <div class="text"><h1>{{ $collection['name'] }}</h1></div>                           
                                                    </div>
                                                </a>
                                            </div>                       
                                        </div>
                                        @endforeach                                                                 
                                    </div>
                                </ul>
                            </li>
                        @endforeach     
                    </ul>                           
                @endif
            </div>
        </div>
    </nav>
</section>
<div class="clear-fix"></div>
<!-- End Navigation Bar -->
