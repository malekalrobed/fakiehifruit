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
    
    @if (count($sliders) > 0)
        <div class="panel-body">                                      
            <div class="slider">
                @foreach ($sliders as $slider)
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <img src="{{ asset('storage/images/sliders').'/'.$slider->image }}" alt="{{ $slider->title }}" class="img-responsive">
                        </div>                        
                        <div class="col-sm-6 col-md-8 col-lg-9">
                            <h3>العنوان : {{ $slider->title }}</h3>
                            <p>الوصف : {{ $slider->desc }}</p>
                        </div>                    
                    </div>
                @endforeach
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
                {{ $sliders->links('includes.pagination') }}
            </div>
            <div class="pull-left page-info">
                <span class="row-count">عدد السجلات : {{ $sliders->count() }}</span>                                
            </div>
        </div>
    @else 
        <p class="text-center">لا توجد بيانات</p>
    @endif    

@endsection

