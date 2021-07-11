@extends('layouts.app')

@section('content')
    @php
        $page_ar = 'المجموعة';
        $pages_ar = 'المجموعات';
        $pages = 'collections';
        $page = 'collection';
    @endphp
    <div class="panel-heading">
        <div class="short-cut">
            <a href="/" class="link">لوحة التحكم</a> &#10095; <a href="/{{ $pages }}" class="link">إدارة {{ $pages_ar }}</a> &#10095; <span class="link"> تعديل {{ $page_ar }} </span>
        </div>              								
    </div>
    <div class="panel-body">          
        <form action="/{{ $pages }}/{{ $collection->id }}" method="POST" class="form-horizontal Mycontainer" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Start section Fild -->
            <div class="add-faster required-field">
                <div class="form-group">
                    <label class="col-sm-2 control-label pull-right">القسم</label>                                            
                    <div class="col-sm-10">
                        <select class="select2" name="section_id">
                            <option value="0" disabled selected>Section</option>
                            @foreach ($sections as $section)
                                <option 
                                    value="{{ $section->id }}"
                                    @if ($section->id == $collection->section_id) selected @endif>
                                    {{ $section->name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="asterisk">*</span>
                    </div>
                    <a href="/collections/create" class="add">إضافة سريعة</a>
                </div>
            </div>
            <!-- End section Fild -->
            <!-- Start Name Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">إسم {{ $page_ar }}</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" 
                        autofocus required data-title=""
                        placeholder="Name"
                        value="{{ $collection->name }}">
                </div>
            </div>
            <!-- End Name Fild -->
            <!-- Start image Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right"> صورة المنتج </label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" placeholder="Image">
                    <input type="hidden" name="old_image" value="{{ $collection->image }}">
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
