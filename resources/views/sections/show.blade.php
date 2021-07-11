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
            <a href="/" class="link">لوحة التحكم</a> &#10095; <a href="/{{ $pages }}" class="link"> إدارة {{ $pages_ar }} </a> &#10095; <span class="link"> قسم {{ $section->name }} </span>
            <a href="/{{ $pages }}/create" class="btn-add btn btn-primary"><i class="fa fa-plus"></i>إضافة {{ $pag_ar }}</a>
        </div>
        <div class="form-search">
            <form post="GET" action="/{{ $pages }}/" class="form-inline">
                <input type="search" name="search" class="form-control search-input" id="inputSearch" onkeyup="searchItem2()" placeholder="بحث ...">
            </form>
        </div>
        <div class="control">
            <a href="/{{ $pages }}" class="btn btn-primary"><i class="fa fa-print"></i> عرض الكل</a>
        </div>									
    </div>
    
    <div class="panel-body">
        @if (count($section->collections) > 0)
        <div class="row">                   
            @forelse ($section->collections as $collection)
                <div class="col-xs-12">
                    <h3>{{ $collection->name }}</h3>                    
                    @forelse ($collection->products as $product)                                                                                    
                        <div class="card-product">
                            <div class="product-header">
                                <h4 class="text-center">{{ $product['name'] }}</h4>
                            </div>
                            <div class="product-body">
                                <img class="card-img-top" src="{{ asset('storage/images/products/'.$product['image']) }}" alt="{{ $product['name'] }}" width="180">
                                <span class="descount"> خصم 20% </span>
                                <div class="control">
                                    <a href="collections/{{ $product['id'] }}/edit" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                                    <button type="button" 
                                            data-sender="collections/{{ $product['id'] }}" 
                                            data-name="{{ $product['name'] }}"
                                            class="btn-sender btn btn-danger" 
                                            data-toggle="modal" 
                                            data-target="#Modal-delete">
                                        <i class="fa fa-trash-o"></i> حذف
                                    </button>
                                </div>
                            </div>
                            <div class="product-footer">
                                <p class="desc"></p>
                                <span class="price">10 SR</span>
                            </div>
                        </div>                                                                            
                    @empty
                        <p class="text-center">
                            لا توجد بيانات
                        </p>
                    @endforelse                     
                </div>
            @empty
                
            @endforelse           
        </div>
        @else
            <p class="text-center">لا توجد بيانات</p>
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
