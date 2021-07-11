@extends('layouts.app')

@section('content')
    @php
        $pag_ar = 'منتج';
        $page_ar = 'المنتج';
        $pages_ar = 'المنتجات';
        $pages = 'products';
        $page = 'product';
    @endphp

    <div class="panel-heading">
        <div class="short-cut">
            <a href="/" class="link">لوحة التحكم</a> &#10095; <a href="/{{ $pages }}" class="link"> إدارة {{ $pages_ar }} </a> &#10095; <span class="link"> {{ $product->name }} </span>
            <a href="/{{ $pages }}/create" class="btn-add btn btn-primary"><i class="fa fa-plus"></i>إضافة {{ $pag_ar }}</a>
        </div>               
    </div>
    
    <div class="panel-body">                  
        @if (isset($product) > 0)
            <div class="row">  
                <div class="col-xs-12 col-md-6">
                    <h3 class="text-center">قسم {{ $product->collection->section['name'] }} - مجموعة {{ $product->collection['name'] }}</h3>
                    <img src="{{ asset('storage/images/products').'/'.$product->image }}" alt="image" style="" class="img-responsive" width="500">
                </div>
                <div class="col-xs-12 col-md-6">
                    <h3>{{ $product->name }}</h3>
                    <p>اللون : {{ $product->color }}</p>
                    <p>الوحدة : {{ $product->unit }}</p>
                    <p>الكمية : {{ $product->count }}</p>
                    <p>السعر : {{ $product->price }}</p>
                    <p>التخفيض : {{ $product->discount }}</p>
                    <p>التقييم : {{ $product->rating }}</p>
                    <p>العلامة التجارية : {{ $product->trade_mark }}</p>
                    <p>بلد المنشأ : {{ $product->country_origin }}</p>
                    <p>تأريخ الإضافة : {{ $product->created_at }}</p>
                    <p>تاريخ التعديل : {{ $product->updated_at }}</p>
                </div>
            </div> 
            <div class="row">
                <div class="col-xs-12">
                    <h4>الوصف</h4>
                    <p>{{ $product->desc }}</p>
                </div>    
            </div>           
        @else
            <p class="text-center">
                لا توجد بيانات
            </p>
        @endisset        
    </div>

    <!-- Start Modal To Delete Class -->
    <div class="modal fade" id="Modal-delete" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">حذف المجموعة</h4>
                </div>
                <div class="modal-body">
                    <p>هل تريد حذف مجموعة <label class="lable-user-name">الحالية</label></p>
                </div>
                <div class="modal-footer">
                    <form action="" method="POST" id="form-delete" class="pull-left inlin-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> حذف </button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> إلغاء </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal To Delete Class -->  
@endsection
