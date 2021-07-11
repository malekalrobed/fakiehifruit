@extends('layouts.app')

@section('content')
    @php
        $pag_ar = 'قسم';
        $page_ar = 'القسم';
        $pages_ar = 'الأقسام';
        $pages = 'sections';
        $page = 'section';
    @endphp
        
    <div class="panel-heading">
        <div class="short-cut">
            <a href="/" class="link">لوحة التحكم</a> &#10095; <a href="/{{ $pages }}" class="link">إدارة {{ $pages_ar }}</a> &#10095; <span class="link"> إضافة {{ $pag_ar }} </span>
        </div>              								
    </div>
    <div class="panel-body">          
        <form action="/{{ $pages }}" method="POST" class="form-horizontal Mycontainer" enctype="multipart/form-data">
            @csrf
            <!-- Start Name Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">إسم {{ $page_ar }}</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" autofocus required placeholder="Name" data-title="">
                </div>
            </div>
            <!-- End Name Fild -->
            <!-- Start image Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right"> صورة المنتج </label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" placeholder="Image">
                </div>
            </div>
            <!-- End image Fild -->
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
