@extends('layouts.app')
    @php
        $title = 'Products';
    @endphp
@section('content')
    @php
        $title = 'Users';
        $pag_ar = 'مستخدم';
        $page_ar = 'المستخدم';
        $pages_ar = 'المستخدمون';
        $pages = 'users';
        $page = 'user';
    @endphp

    <div class="panel-heading">
        <div class="short-cut">
            <a href="/" class="link">لوحة التحكم</a> &#10095; <a href="/{{ $pages }}" class="link">إدارة {{ $pages_ar }}</a> &#10095; <span class="link"> إضافة {{ $pag_ar }} </span>
        </div>              								
    </div>
    <div class="panel-body">          
        <form action="/{{ $pages }}" method="POST" class="form-horizontal Mycontainer" enctype="multipart/form-data">
            @csrf
            <!-- Start collections Fild -->
            <div class="add-faster required-field">
                <div class="form-group">
                    <label class="col-sm-2 control-label pull-right">المجموعة</label>                                            
                    <div class="col-sm-10">
                        <select class="select2" name="collection_id">
                            <option value="0" disabled selected>Collection</option>
                            @foreach ($collections as $collection)
                                <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                            @endforeach
                        </select>
                        <span class="asterisk">*</span>
                    </div>
                    <a href="/collections/create" class="add">إضافة سريعة</a>
                </div>
            </div>
            <!-- End collections Fild -->

            <!-- Start Name Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">إسم المنتج</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" autofocus required placeholder="Name" data-title="">
                </div>
            </div>
            <!-- End Name Fild -->
            <!-- Start Desc Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right"> الوصف</label>
                <div class="col-sm-10">
                    <input type="text" name="desc" class="form-control" placeholder="Description">
                </div>
            </div>
            <!-- End Desc Fild -->
            <!-- Start Color Fild -->            
            <div class="add-faster required-field">
                <div class="form-group">
                    <label class="col-sm-2 control-label pull-right">اللون</label>                                                                
                    <div class="col-sm-10">
                        <select class="select2" name="color">
                            <option value="0" disabled selected>Color</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->value }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="/colors/create" class="add">إضافة سريعة</a>
                </div>
            </div>
            <!-- End Color Fild -->            
            <!-- Start Unit Fild -->
            <div class="add-faster required-field">
                <div class="form-group">
                    <label class="col-sm-2 control-label pull-right">الوحدة</label>                                            
                    <div class="col-sm-10">
                        <select class="select2" name="unit">
                            <option value="0" disabled selected>Unit</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="/units/create" class="add">إضافة سريعة</a>
                </div>
            </div>
            <!-- End Unit Fild -->
             <!-- Start count Fild -->
             <div class="form-group">
                <label class="col-sm-2 control-label pull-right">الكمية</label>
                <div class="col-sm-10">
                    <input type="number" name="count" class="form-control"  placeholder="Count" >
                </div>
            </div>
            <!-- End count Fild -->
            <!-- Start price Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">السعر</label>
                <div class="col-sm-10">
                    <input type="number" name="price" class="form-control"  placeholder="price" >
                </div>
            </div>
            <!-- End price Fild -->
            <!-- Start discount Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">التخفيض</label>
                <div class="col-sm-10">
                    <input type="number" name="discount" class="form-control"  placeholder="discount" >
                </div>
            </div>
            <!-- End discount Fild -->
            <!-- Start trade_mark Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">العلامة التجارية</label>
                <div class="col-sm-10">
                    <input type="text" name="trade_mark" class="form-control" placeholder="Trade mark">
                </div>
            </div>
            <!-- End trade_mark Fild -->
            <!-- Start country_origin Fild -->
            <div class="form-group">
                <label class="col-sm-2 control-label pull-right">بلد المنشأ</label>
                <div class="col-sm-10">
                    <input type="text" name="country_origin" class="form-control" placeholder="Country origin">
                </div>
            </div>
            <!-- End country_origin Fild -->
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
