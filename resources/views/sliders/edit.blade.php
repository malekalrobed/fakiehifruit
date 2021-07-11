@extends('layouts.app')

@section('content')
    @php
        $pag_ar = 'سليدر';
        $page_ar = 'السليدر';
        $pages_ar = 'السليدرات';
        $pages = 'sliders';
        $page = 'slider';
    @endphp
    <div class="panel-heading">
        <div class="short-cut">
            <a href="/" class="link">لوحة التحكم</a> &#10095; <a href="/{{ $pages }}" class="link">إدارة {{ $pages_ar }}</a> &#10095; <span class="link"> تعديل {{ $page_ar }} </span>
        </div>              								
    </div>
    <div class="panel-body">          
        <form action="/{{ $pages }}/{{ $slider->id }}" method="POST" class="form-horizontal Mycontainer" enctype="multipart/form-data">
            @csrf
            @method('PUT')            
            <!-- Start image Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right"> صورة المنتج </label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" placeholder="Image">
                    <input type="hidden" name="old_image" value="{{ $slider->image }}">
                </div>
            </div>
            <!-- End image Fild -->
            <!-- Start title Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">العنوان</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" value="{{ $slider->title }}" placeholder="Title" data-title="">
                </div>
            </div>
            <!-- End title Fild -->
            <!-- Start description Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">الوصف</label>
                <div class="col-sm-10">
                    <input type="text" name="desc" class="form-control" value="{{ $slider->desc }}" placeholder="Description" data-title="">
                </div>
            </div>
            <!-- End description Fild -->

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
