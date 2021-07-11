@extends('layouts.app')

@section('content')
    @php
        $pag_ar = 'منتج';
        $page_ar = 'المنتج';
        $pages_ar = 'المنتجات المخزنة';
        $pages = 'stocks';
        $page = 'stock';
    @endphp
    <div class="panel-heading">
        <div class="short-cut">
            <a href="/" class="link">لوحة التحكم</a> &#10095; <span class="link"> إدارة {{ $pages_ar }} </span>
            <a href="/{{ $pages }}/create" class="btn-add btn btn-primary"><i class="fa fa-plus"></i>إضافة {{ $pag_ar }}</a>
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
        <div class="panel-body">                                      
            <div class="main-table">
                <div class="table-responsive ">
                    <table id="main-table" class="text-center table table-bordered table-hover table-striped table-condensed">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)" class="sort">#ID</th>
                                <th onclick="sortTable(1)" >اسم {{ $page_ar }}</th>
                                <th onclick="sortTable(1)" >الكمية</th>
                                <th onclick="sortTable(1)" >السعر</th>
                                <th onclick="sortTable(1)" >التخفيض</th>
                                <th onclick="sortTable(2)" >تاريخ الإنشاء</th>
                                <th onclick="sortTable(3)" >تاريخ التعديل</th>                       
                                <td>تحكم</td>
                            </tr>
                        </thead>
                        <tbody>                                                           
                            @forelse ($products as $product)
                                @foreach ($product->stocks as $stock)
                                    <tr>
                                        <td>{{ $stock['id'] }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $stock['count'] }}</td>
                                        <td>{{ $stock['price'] }}</td>
                                        <td>{{ $stock['discount'] }}</td>
                                        <td>{{ $stock['created_at'] }}</td>
                                        <td>{{ $stock['updated_at'] }}</td>
                                        <td>                                        
                                            <a href="/stocks/{{ $stock['id'] }}/edit" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                                            <button type="button" 
                                                    data-sender="/stocks/{{ $stock['id'] }}" 
                                                    data-name="{{ $product->name }}"
                                                    class="btn-sender btn btn-danger" 
                                                    data-toggle="modal" 
                                                    data-target="#Modal-delete">
                                                <i class="fa fa-trash-o"></i> حذف
                                            </button>
                                        </td>
                                    </tr>                                                                                 
                                @endforeach                
                            @empty
                                لا يوجد بيانات
                            @endforelse   
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
                            <h4 class="modal-title">حذف {{ $page_ar }}</h4>
                        </div>
                        <div class="modal-body">
                            <p>هل تريد حذف {{ $page_ar }} <label class="lable-user-name">الحالية</label></p>
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
                {{-- {{ $products->stocks->links('includes.pagination') }} --}}
            </div>
            <div class="pull-left page-info">
                {{-- <span class="row-count">عدد السجلات : {{ $products->stocks->count() }}</span>                                 --}}
            </div>
        </div>
       

@endsection
