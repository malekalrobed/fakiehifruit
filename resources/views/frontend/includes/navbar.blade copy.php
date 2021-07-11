{{-- Start Section Logo --}}
<section class="section-logo">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pull-right">
                <img src="{{ asset('storage/setting/logo.png') }}" alt="">
            </div>
            <div class="col-xs-7 col-md-4 pull-right">
                <form class="form-header" action="">
                    <div class="input-group form-group-lg">
                        <input type="text" class="form-control input-header" placeholder="ما الذي تبحث عنه ؟">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-header" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-xs-5 col-md-4 pull-right">
                {{-- <ul class="nav navbar-nav lang-drop">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LANGUAGE <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><img class="icon pull-right" width="25" src="{{ asset('css/images/saudi_arabia.png') }}" />اللغة العربية </a></li>                            
                            <li><a href="#"><img class="icon pull-right" width="25" src="{{ asset('css/images/united_kingdom.png') }}" /> Englich </a></li>                            
                        </ul>
                    </li>
                </ul> --}}
            </div>            
        </div>
    </div>
</section>

{{-- End Section Logo --}}

{{-- Start section-nav  And Dropdown list --}}
{{-- <section class="section-nav">
    <nav class="navbar navbar-custom">
        <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header navbar-right">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">الرئيسية</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @foreach ($sections as $section)
                    <li class="sections">
                        <a href="/section">{{ $section->name }}</a>
                        <div class="box-collection">
                            @foreach ($section->collections as $collection)
                                <div class="box-collections pull-right">
                                    <a href="/collection">
                                        <div class="box-link">
                                            <img src="{{ asset('storage/images').'/'.$collection['image'] }}" width="150" alt="img">
                                            <h3 class="text-center">{{ $collection['name'] }}</h3>
                                        </div>
                                    </a>
                                </div>                           
                            @endforeach                                                                                              
                        </div>
                    </li>                 
                @endforeach                                                     
            </ul>        
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section> --}}
{{-- End section-nav  And Dropdown list --}}

<!-- Start Navigation Bar -->

<section class="sections">
    <div class="mobile-menu">
    <i class="fa fa-bars fa-3x js-menu-icon"></i>
    </div>
    
    <nav class="navbar js-navbar">
    <div class="container">
        <ul class="menu">
        @foreach ($sections as $section)
        <li>
            <a class="hasDropdown" href="/section/{{ $section->id }}">{{ $section->name }} <i class="fa fa-angle-down"></i></a>
            
            <ul class="collection">
                {{-- @php
                foreach ($section->collections as $collection) {
                    foreach ($collection->products as $product) {
                        $img = $product['image'];
                    }
                    break;
                }                    
                @endphp  --}}
                
                <div class="container__list">                       
                    <div class="box-collections">
                        @foreach ($section->collections as $collection)                                                
                            <div class="box-collection pull-right">
                                <a href="/collection">
                                    <div class="box-link">                                 
                                        @php
                                            foreach ($collection->products as $product) {
                                                $img = $product['image'];
                                                break;
                                            }
                                        @endphp                                   
                                        <div class="box-img">
                                            <img src="{{ asset('storage/images/collections').'/'.$collection['image'] }}" width="150" alt="img">
                                        </div>
                                        <h3 class="text-center">{{ $collection['name'] }}</h3>

                                    </div>
                                </a>
                            </div>                           
                        @endforeach                                                                                              
                    </div>                    
                </div>
            </ul>
        </li>        
        @endforeach       
        </ul>
    </div>
    </nav>
</section>

<!-- End Navigation Bar -->
