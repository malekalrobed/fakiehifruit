<section class="short-cut">
    @php
        if(isset($product)){
            $name = $product->name;
        }else {
            $name = '';
        }
        if(!isset($search)){
            $search = '';
        }
    @endphp
    <div class="row">
        <div class="col-sm-4">    
            <div class="container">
                <a href="/" class="link">الرئيسية  </a> &#10095; <span class="link"> {{ $name }} </span>
            </div>            								
        </div>
        <div class="col-sm-8">            
            <form class="form-header" action="/filter" method="GET">
                <div class="input-group form-group-lg">
                    <input type="text" name="search" value="{{ $search }}" class="form-control input-header" placeholder="ما الذي تبحث عنه ؟">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-header" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</section>