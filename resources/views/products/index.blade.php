@extends('layouts.app')
@php
    $title = 'Products';
    $pag_ar = 'مجموعة';
    $page_ar = 'المجموعة';
    $pages_ar = 'المجموعات';
    $pages = 'products';
    $page = 'product';
@endphp
@section('content')
    <div class="panel-heading">        
        <div class="short-cut">
            <a href="/" class="link">لوحة التحكم</a> &#10095; <span class="link"> إدارة المنتجات </span>
            <a href="/{{ $pages }}/create" class="btn-add btn btn-primary"><i class="fa fa-plus"></i>إضافة منتج</a>
        </div>
        <div class="form-search">
            <form post="GET" action="/{{ $pages }}" class="form-inline">
                <input type="search" name="search" class="form-control search-input" id="inputSearch" onkeyup="searchItem2()" placeholder="بحث ...">
            </form>
        </div>
        <div class="control">
            <a href="/{{ $pages }}" class="btn btn-primary"><i class="fa fa-print"></i> عرض الكل</a>
        </div>									
    </div>

    @if (count($products) >0)                       
        <div class="panel-body">                                      
            <div class="main-table">
                <div class="table-responsive ">
                    <table id="main-table" class="text-center table table-bordered table-hover table-striped table-condensed">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)" class="sort">#ID</th>
                                {{-- <th onclick="sortTable(1)" >معلومات</th> --}}
                                <th onclick="sortTable(2)" >اسم المنتج</th>
                                <th onclick="sortTable(3)" >اللون</th>
                                <th onclick="sortTable(4)" >الوحدة</th>                     
                                <th onclick="sortTable(5)" >الكمية</th>
                                <th onclick="sortTable(6)" >السعر</th>
                                <th onclick="sortTable(7)" >التخفيض</th>
                                <th onclick="sortTable(8)" >العلامة التجارية</th>
                                <th onclick="sortTable(9)" >بلد المنشأ</th>
                                <td>تحكم</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    {{-- <td>قسم {{ $product->collection->section['name'] }} - مجموعة {{ $product->collection['name'] }}</td> --}}
                                    <td>{{ $product->name }}</td>
                                    <td style="background-color: {{ $product->color }}">{{ $product->color }}</td>
                                    <td>{{ $product->unit }}</td>
                                    <td>{{ $product->count }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount }}</td>
                                    <td>{{ $product->trade_mark }}</td>
                                    <td>{{ $product->country_origin }}</td>
                                    <td>
                                        <a href="/{{ $pages }}/{{ $product->id }}" class="btn btn-info"><i class="fa fa-eye"></i> التفاصيل </a>
                                        <a href="/{{ $pages }}/{{ $product->id }}/edit" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                                        <button type="button" 
                                                data-sender="/{{ $pages }}/{{ $product->id }}" 
                                                data-name="{{ $product->name }}"
                                                class="btn-sender btn btn-danger" 
                                                data-toggle="modal" 
                                                data-target="#Modal-delete">
                                            <i class="fa fa-trash-o"></i> حذف
                                        </button>
                                    </td>
                                </tr>                                                        
                            @endforeach                    
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Start Modal To Delete Class -->
            <div class="modal fade" id="Modal-delete" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">حذف المنتج</h4>
                        </div>
                        <div class="modal-body">
                            <p>هل تريد حذف المنتج : <label class="lable-user-name">الحالية</label></p>
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
        </div>
        <div class="panel-footer">            
            <div class="pull-right page-info">
                {{ $products->links('includes.pagination') }}
            </div>
            <div class="pull-left page-info">
                <span class="row-count">عدد السجلات : {{ $products->count() }}</span>                                
            </div>
        </div>
    @else 
        <p class="text-center">لا توجد بيانات</p>
    @endif    

@endsection
