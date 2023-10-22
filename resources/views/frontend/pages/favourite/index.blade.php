@extends('frontend.pages.category.layouts_category.master_category')
@section('content_category')
       <!-- START SECTION PROPERTIES LISTING -->
    <section class="properties-right list featured portfolio blog pt-4">
        <div class="container">
            @include('frontend.pages.category.layouts_category.form_search')
            <section class="headings-2 pt-0 pb-0">
                <div class="pro-wrapper">
                    <div class="detail-wrapper-body">
                        <div class="listing-title-bar">
                                <h3>Tin đã lưu</h3>
                        </div>
                    </div>
                </div>
            </section>
                <div class="row">
                    <div class="col-lg-8 col-md-12 blog-pots cotent">
                        <div class="row featured portfolio-items">
                            <div class="text-center" style="width: 100%">
                                <img style="max-width: 100px; display: block; margin: 15px auto;" src="{{asset('/images/favourite.svg')}}">
                                <p style="color: #ee664c; text-align: center; font-size: 1.2rem; font-weight: bold;">Danh sách rỗng.</p>
                            </div>
                            <div id="row_wishlist">

                            </div>
                        </div>
                    </div>
              
                    <aside class="col-lg-4 col-md-12 car">
                        <div class="widget">
                            @include('frontend.pages.articles.sidebar_articles.sidebar_category')
                            @include('frontend.pages.articles.sidebar_articles.sidebar_articles_new')
                            @include('frontend.pages.articles.sidebar_articles.sidebar_articles_care')
                        </div>
                    </aside>
                </div>
         
            <nav aria-label="..." class="pt-3">
               {{$rooms->links()}}
            </nav>
        </div>
    </section>
  
    <<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   

    
@endsection