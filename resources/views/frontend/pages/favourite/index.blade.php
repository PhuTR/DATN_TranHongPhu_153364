@extends('frontend.pages.category.layouts_category.master_category')
@section('title', 'Tin quan tâm - DATN')
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
                            
                            <p id="change-item-favourite">
                                <p id="row_wishlist5" class="col-lg-12"></p>
                                <p id="row_wishlist4" class="col-lg-12"></p>
                                <p id="row_wishlist3" class="col-lg-12"></p>
                                <p id="row_wishlist2" class="col-lg-12"></p>
                                <p id="row_wishlist1" class="col-lg-12"></p>
                                <div id="no-favourite" class="text-center" style="width: 100%">
                                    
                                </div>    
                               
                            </p>
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
               {{-- {{$rooms->links()}} --}}
            </nav>
        </div>
    </section>
  
    

   

    
@endsection