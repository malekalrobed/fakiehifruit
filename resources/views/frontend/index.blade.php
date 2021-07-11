@extends('frontend.layouts.frontend')

@section('content')
    
    @include('frontend.includes.slider')
    
    <section class="new-products">
        @if (count($newProducts) > 0)
            <div class="container">
                <h3 class="main-title">وصل حديثاً</h3>            
                <div class="row">                
                    @foreach ($newProducts as $product)                   
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
                                    <span class="lable new"> جديد </span>
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
                </div>
            </div>
        @endif 
    </section>

    <section class="discount-products">
        @if (count($discountProducts) > 0)
            <div class="container">
                <h3 class="main-title">عروض دورية</h3>            
                <div class="row">                                          
                    @foreach ($discountProducts as $product)                   
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
                                    <span class="lable discount"> وفر {{ $product->discount }} % </span>
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
                </div>                
                {{ $discountProducts->links('frontend.includes.pagination') }}
            </div>        
        @endif 
    </section>

    <section class="sections-products">
        <div class="container">
            <h3 class="main-title">المنتجات حسب الأقسام</h3>
            @if (count($sections) > 0)
                <div class="row">               
                    @foreach ($sections as $section)                        
                        <div class="col-md-6 pull-right">
                            <a href="/section/{{ $section->id }}" class="">
                                <div class="box-content">
                                    <img src="{{ asset('storage/images/sections').'/'.$section->image }}" alt="section" class="image">
                                    <div class="overlay">                                                                
                                    </div> 
                                    <div class="text"><h1>{{ $section->name }}</h1></div>                           
                                </div>
                            </a>                        
                        </div>
                    @endforeach                    
                </div>
            @else
                <div class="alert alert-success">
                    <p>لا يوجد منتجات حالية</p>
                </div>
            @endif
        </div>
    </section>
@endsection