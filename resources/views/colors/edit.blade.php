@extends('layouts.app')

@section('content')
    @php
        $pag_ar = 'لون';
        $page_ar = 'اللون';
        $pages_ar = 'الألوان';
        $pages = 'colors';
        $page = 'color';
    @endphp
    <div class="panel-heading">
        <div class="short-cut">
            <a href="/" class="link">لوحة التحكم</a> &#10095; <a href="/{{ $pages }}" class="link">إدارة {{ $pages_ar }}</a> &#10095; <span class="link"> تعديل {{ $page_ar }} </span>
        </div>              								
    </div>
    <div class="panel-body">          
        <form action="/{{ $pages }}/{{ $color->id }}" method="POST" class="form-horizontal Mycontainer">
            @csrf
            @method('PUT')
            <!-- Start Name Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">إسم {{ $page_ar }}</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" 
                        autofocus required data-title=""
                        placeholder="Name"
                        value="{{ $color->name }}">
                </div>
            </div>
            <!-- End Name Fild -->
            <!-- Start value Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">القيمة</label>
                <div class="col-sm-10">
                    <input type="color" name="value" class="form-control" required value="{{ $color->value }}">
                </div>
            </div>
            <!-- End value Fild -->
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
