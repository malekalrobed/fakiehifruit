@extends('layouts.app')

@section('content')
    @php
        $pag_ar = 'مجموعة';
        $page_ar = 'المجموعة';
        $pages_ar = 'المجموعات';
        $pages = 'collections';
        $page = 'collection';
    @endphp

    <div class="panel-heading">
        <div class="short-cut">
            <a href="/" class="link">لوحة التحكم</a> &#10095; <a href="/{{ $pages }}" class="link"> إدارة {{ $pages_ar }} </a> &#10095; <span class="link"> مجموعة {{ $collection->name }} </span>
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
        <div class="row">            
            @if (count($collection->products) > 0)
            @forelse ($collection->products as $product)        
                {{-- <div class="col-sm-6 col-md-3 col-lg-2">
                    <div class="card-product" style="">
                        <h4 class="card-title">{{ $product['name'] }}</h4>
                        <img class="card-img-top" src="{{ asset('storage/images/'.$product['id'].'.png') }}" alt="Card image" style="width:100%">
                        <div class="card-body">                            
                            <p class="card-text">{{ $product['desc'] }}</p>
                            <a href="#" class="btn btn-primary stretched-link">المزيد</a>
                            <a href="#" class="btn btn-danger stretched-link">حذف</a>
                        </div>
                    </div>
                </div>   --}}

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
                        <p class="desc">قرون الكاكاو هي المنتج الخام المستخدم في صناعة الشوكولاتة والكاكاو بأشكالها المتعددة. تم العثور على حبوب الكاكاو داخل القرون التي تنمو مباشرة من جذع شجرة الكاكاو. الطبقة الخارجية للشجرة أملس ورمادي يميل إلى البني مع أوراق خضراء داكنة وبحجم يد الإنسان الممدودة. الثمرة ، أو الكبسولة ، مستطيلة ، يتراوح طولها بين 4 و 12 بوصة ، ويتراوح لونها من الأصفر إلى البرتقالي إلى الأرجواني. تحتوي القرون على 20-40 بذرة تجلس داخل لب عصاري حمضي وحلو. عندما تنضج ، تهتز البذور داخل الثمرة عندما تهتز. يستغرق إنتاج حوالي نصف كيلو واحد من الفاصوليا من 7 إلى 14 قرونًا. تعتمد نكهة الفاصوليا على التنوع بالإضافة إلى ظروف النمو مثل درجة حرارة التربة وأشعة الشمس وهطول الأمطار.</p>
                        <span class="price">10 SR</span>
                    </div>
                </div>
                
            @empty
                <p class="text-center">
                    لا توجد بيانات
                </p>
            @endforelse
            @else
                <p class="text-center">
                    لا توجد بيانات
                </p>
            @endisset
        </div>
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
