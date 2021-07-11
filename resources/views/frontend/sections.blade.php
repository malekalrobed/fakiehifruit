@extends('frontend.layouts.frontend')

@section('content')
<div class="section-page">
    
    <div class="caption" style="background-image: url({{ asset('storage/images/sections'.'/'.$section->image) }})">
        <div class="overlay">
            <h1>{{ $section->name }}</h1>
        </div>
    </div>
    
    {{-- <section class="short-cut">
        <div class="container">
            <a href="/" class="link">الرئيسية  </a> &#10095; <span class="link"> {{ $section->name }} </span>
        </div>            								
    </section>

    <section class="collections">
        <div class="container">                      
            <h3 class="main-title">{{ $section->name }}</h3>                        
            <div class="row">
                @foreach ($collections as $collection)                                  
                    <div class="col-sm-6 col-md-3 pull-right">
                        <div class="box-collection">
                            <a href="/collection/{{ $collection->id }}" class="">                            
                                <div class="box-content">
                                    <img src="{{ asset('storage/images/collections').'/'.$collection->image }}" alt="section" class="image">
                                    <div class="overlay">                                                                
                                    </div> 
                                    <div class="text"><h1>{{ $collection->name }}</h1></div>                           
                                </div>
                            </a>
                        </div>                                                    
                    </div>                                 
                @endforeach
            </div>
            {{ $collections->links('frontend.includes.pagination') }}
        </div>
    </section> --}}

    {{-- <section class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-10 pull-right">
                    <div class="row">                           
                        @foreach ($section->collections as $collection)
                            @foreach ($collection->products as $product)
                                
                            @endforeach
                            <div class="col-md-2 pull-right">                
                                <div class="card-product">                            
                                    <div class="product-body">
                                        <img class="card-img-top" src="{{ asset('storage/images/products/'.$product['image']) }}" alt="{{ $product['name'] }}" width="180">
                                        <span class="discount"> وفر  % </span>                                
                                    </div>
                                    <div class="product-footer">
                                        <h4 class="text-center">{{ $product->name }}</h4>
                                        <span class="price">
                                            <span class="old-price" style="text-decoration: line-through"></span>
                                            @php
                                                // $newPrice = ($stock->price) - (($stock->price) / 100) * ($stock->discount);
                                            @endphp
                                            <span class="old-price"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach                    
                    </div>
                </div>
                <div class="col-md-2 pull-right">

                </div>
            </div>
        </div>
    </section> --}}

        @if(count($collections) > 0)
    
        <section class="short-cut">
            <div class="container">
                <a href="/" class="link">الرئيسية  </a> &#10095; <span class="link"> بحث </span>
            </div>            								
        </section>
        {{-- @include('frontend.includes.shurt_cut_filter') --}}
        <section class="collections">
            <div class="container">                      
                <div class="row">
                    @foreach ($collections as $collection)
                        

                    @foreach ($collection->products as $product)
                        <div class="col-xs-6 col-md-3 pull-right">
                            <div class="box-product">
                                <div class="box-content">
                                    <img src="{{ asset('storage/images/products').'/'.$product->image }}" alt="section" class="image img-responsive" width="30">
                                    <div class="overlay">
                                        <div class="control">                                    
                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="btn btn-green" data-toggle="modal" data-target="#myModal{{ $product->id }}">عرض مختصر</button>
                                        </div>                                
                                    </div>                                 
                                </div>                            
                                <a href="/product/{{ $product->id }}" class="btn btn-block"><h3 class="name">{{ $product->name }} - {{ $product->unit }}</h3></a>
                                <p class="desc">{{ $product->desc }}</p>
                                <div class="price">
                                    <span class="old-price">{{ $product->price }} RS</span>
                                    @php
                                        $newPrice = ($product->price) - (($product->price) / 100) * ($product->discount);
                                    @endphp
                                    <span class="new-price">{{ $newPrice }} RS</span>
                                </div> 
                            </div>
                            <div class="divider"></div>
                            
                            <!-- Modal -->
                            <div id="myModal{{ $product->id }}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>                                        
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-6 pull-left">
                                                    <img src="{{ asset('storage/images/products').'/'.$product->image }}" alt="section" class="img-responsive" width="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <h3 class="name">{{ $product->name }} - {{ $product->unit }}</h3>                                                
                                                    <div class="price">
                                                        <span class="old-price">{{ $product->price }} RS</span>
                                                        @php
                                                            $newPrice = ($product->price) - (($product->price) / 100) * ($product->discount);
                                                        @endphp
                                                        <span class="new-price">{{ $newPrice }} RS</span>
                                                    </div>
                                                    <p class="desc">{{ $product->desc }}</p>
                                                    <a href="/product/{{ $product->id }}" class="btn btn-primary">تفاصيل أكثر</a>
                                                </div>
                                            </div>
    
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                        </div>                                                
                    @endforeach
                    
                    @endforeach
                </div>
                {{ $collections->links('frontend.includes.pagination') }}
            </div>
        </section>
        @endif

</div>
@endsection
