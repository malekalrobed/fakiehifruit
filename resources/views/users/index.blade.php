@extends('layouts.app')
@php
    $title = 'Users';
    $pag_ar = 'مستخدم';
    $page_ar = 'المستخدم';
    $pages_ar = 'المستخدمون';
    $pages = 'users';
    $page = 'user';
@endphp
@section('content')
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

    @if (count($users) >0)                       
        <div class="panel-body">                                      
            <div class="main-table">
                <div class="table-responsive ">
                    <table id="main-table" class="text-center table table-bordered table-hover table-striped table-condensed">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)" class="sort">#ID</th>
                                <th> الصورة </th>
                                <th onclick="sortTable(2)" >اسم {{ $pag_ar }}</th>
                                <th onclick="sortTable(3)" >الإيميل</th>                                
                                <td>تحكم</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>                                
                                    <td>{{ $user->avatar }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>                                    
                                    <td>
                                        <a href="/{{ $pages }}/{{ $user->id }}" class="btn btn-info"><i class="fa fa-eye"></i> التفاصيل </a>
                                        <a href="/{{ $pages }}/{{ $user->id }}/edit" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                                        @if ($user->email != 'info@fakiehifruit.com')
                                            <button type="button" 
                                                data-sender="/{{ $pages }}/{{ $user->id }}" 
                                                data-name="{{ $user->name }}"
                                                class="btn-sender btn btn-danger" 
                                                data-toggle="modal" 
                                                data-target="#Modal-delete">
                                                <i class="fa fa-trash-o"></i> حذف
                                            </button>
                                        @endif                                        
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
                            <h4 class="modal-title">حذف {{ $pag_ar }}</h4>
                        </div>
                        <div class="modal-body">
                            <p>هل تريد حذف {{ $page_ar }} : <label class="lable-user-name">الحالية</label></p>
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
                {{ $users->links('includes.pagination') }}
            </div>
            <div class="pull-left page-info">
                <span class="row-count">عدد السجلات : {{ $users->count() }}</span>                                
            </div>
        </div>
    @else 
        <p class="text-center">لا توجد بيانات</p>
    @endif    

@endsection
