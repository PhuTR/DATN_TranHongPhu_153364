@extends('frontend.pages.category.layouts_category.master_category')
@section('content_category')
    
<section class="properties-right list featured portfolio blog pt-4">
    <div class="container">
        @include('frontend.pages.category.layouts_category.form_search')
        @include('frontend.pages.location.info_location')
        @if(isset($category->id))
            @include('frontend.pages.location.grid_location_category')
        @else
            @include('frontend.pages.location.grid_location')
        @endif
      
        <div class="row">
            <div class="col-lg-8 col-md-12 blog-pots cotent">
              <section class="headings-2 pt-0" style="background-color: #fff">
                <div class="pro-wrapper">
                    <div class="detail-wrapper-body">
                        <div class="listing-title-bar">
                            <div class="text-heading text-left">
                                <p class="font-weight-bold mb-0 mt-3" style="font-size:18px;">Tổng: {{$rooms->total()}} kết quả</p>
                            </div>
                            <div class="text-heading text-left">
                                <p class="font-weight-bold mb-0 mt-3" style="font-size:18px;">Sắp xếp:
                                    <a class="sort-link active" href="">Mặc định</a>
                                    <a class="sort-link" href="">Mới nhất</a>
                                    <a class="sort-link" href="">Xem nhiều nhất</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                 
                </div>
            </section>
                <div class="row featured portfolio-items">
                    @foreach ($rooms ?? [] as $item )
                        @include('common.grid_list')
                             
                    @endforeach
                </div>
            </div>
      
           @include('frontend.pages.home.sidebar_home')
        </div>
 
    <nav aria-label="..." class="pt-3">
       {{$rooms->links()}}
    </nav>    

    </div>
</section>

@endsection