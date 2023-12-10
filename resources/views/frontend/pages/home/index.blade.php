@extends('frontend.pages.category.layouts_category.master_category')
@section('content_category')
       <!-- START SECTION PROPERTIES LISTING -->
    <section class="properties-right list featured portfolio blog pt-4">
        <div class="container">
            @include('frontend.pages.category.layouts_category.form_search')

            @include('frontend.pages.category.layouts_category.info_category')
            
            @include('frontend.pages.category.layouts_category.location_hot')
            
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
                                            <a class="sort-link df" href="?sort=desc">Mặc định</a>
                                            <a class="sort-link" href="?new=asc">Mới nhất</a>
                                            <a class="sort-link" href="?view=desc">Xem nhiều nhất</a>
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
  
    <<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var active = location.search;
            if(active == ''||active =='?sort=desc'){
                $('.sort-link.df').addClass('active');
            }
            console.log(active);
            $('.sort-link[href="' + active + '"]').addClass('active');
         })

        $(document).ready(function() {
            var sortLinks = $('.sort-link');

            sortLinks.on('click', function(e) {
                e.preventDefault();
                var selectedValue = $(this).attr('href');
                if(selectedValue !=0){
                    var url = selectedValue;
                    window.location.replace(url);
                }else{
                    alert('Please select');
                }
            });
        });
    </script>        

    
@endsection