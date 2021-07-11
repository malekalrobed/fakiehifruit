@extends('layouts.app')

@section('content')
    <div class="panel-heading">
        <div class="short-cut">
            <a href="{{ URL('/') }}" class="link">لوحة التحكم</a> &#10095; <span class="link"> إدارة الوحدات </span>
            <a href="{{ URL('units/create') }}" class="btn-add btn btn-primary"><i class="fa fa-plus"></i>إضافة وحدة</a>
        </div>
        <div class="form-search">
            <form post="GET" action="/collections" class="form-inline">
                <input type="search" name="search" class="form-control search-input" id="inputSearch" onkeyup="searchItem2()" placeholder="بحث ...">
            </form>
        </div>
        <div class="control">
            <a href="/units" class="btn btn-primary"><i class="fa fa-print"></i> عرض الكل</a>
        </div>									
    </div>
    
    @if (count($units) > 0)                       
        <div class="panel-body">                                      
            <div class="main-table">
                <div class="table-responsive ">
                    <table id="main-table" class="text-center table table-bordered table-hover table-striped table-condensed">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)" class="sort">#ID</th>
                                <th onclick="sortTable(1)" >اسم الوحدة</th>
                                <th onclick="sortTable(2)" >تاريخ الإنشاء</th>
                                <th onclick="sortTable(3)" >تاريخ التعديل</th>                       
                                <td>تحكم</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($units as $unit)
                                <tr>
                                    <td>{{ $unit->id }}</td>
                                    <td>{{ $unit->name }}</td>
                                    <td>{{ $unit->created_at }}</td>
                                    <td>{{ $unit->updated_at }}</td>
                                    <td>
                                        <a href="/units/{{ $unit->id }}/edit" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                                        <button type="button" 
                                                data-sender="/units/{{ $unit->id }}" 
                                                data-name="{{ $unit->name }}"
                                                class="btn-sender btn btn-danger" 
                                                data-toggle="modal" 
                                                data-target="#Modal-delete">
                                            <i class="fa fa-trash-o"></i> حذف
                                        </button>
                                    </td>
                                </tr>                            
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
                            <h4 class="modal-title">حذف الوحدة</h4>
                        </div>
                        <div class="modal-body">
                            <p>هل تريد حذف الوحدة <label class="lable-user-name">الحالية</label></p>
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
                {{ $units->links('includes.pagination') }}
            </div>            
            <div class="pull-left page-info">
                <span class="row-count">عدد السجلات : {{ $units->count() }}</span>
            </div>
        </div>
    @else 
        <p class="text-center">لا توجد بيانات</p>
    @endif    

@endsection
