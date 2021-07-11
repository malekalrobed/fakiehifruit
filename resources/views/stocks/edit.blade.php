@extends('layouts.app')

@section('content')
    @php
        $pag_ar = 'منتج';
        $page_ar = 'منتج للمخزن';
        $pages_ar = 'المنتجات المخزنة';
        $pages = 'stocks';
        $page = 'stock';
    @endphp
    <div class="panel-heading">
        <div class="short-cut">
            <a href="/" class="link">لوحة التحكم</a> &#10095; <a href="/{{ $pages }}" class="link">إدارة {{ $pages_ar }}</a> &#10095; <span class="link"> تعديل المنتج {{ $product->name }} </span>
        </div>              								
    </div>
    <div class="panel-body">    
        <form action="/{{ $pages }}/{{ $stock->id }}" method="POST" class="form-horizontal Mycontainer">
            @csrf
            @method('PUT')            
            <!-- Start count Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">الكمية</label>
                <div class="col-sm-10">
                    <input type="number" name="count" value="{{ $stock->count }}" class="form-control" required placeholder="Count" >
                </div>
            </div>
            <!-- End count Fild -->
            <!-- Start price Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">السعر</label>
                <div class="col-sm-10">
                    <input type="number" name="price" value="{{ $stock->price }}" class="form-control" required placeholder="price" >
                </div>
            </div>
            <!-- End price Fild -->
            <!-- Start discount Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">التخفيض</label>
                <div class="col-sm-10">
                    <input type="number" name="discount" value="{{ $stock->discount }}" class="form-control" required placeholder="discount" >                    
                </div>
            </div>
            <!-- End discount Fild -->


            <!-- Start Submit Fild -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label pull-right"></label>
                <div class="col-sm-10">
                    <input type="submit" value="&#10004; حفظ" class="btn btn-primary pull-left">
                    <input type="reset" value="&#8635; تراجع" class="btn btn-warning btn-reset">
                    <a href="/{{ $pages }}" class="btn btn-primary  pull-right">&#10094; الصفحة السابقة</a>
                </div>
            </div>
            <!-- End Submit Fild -->
        </form>
    </div>    
@endsection
