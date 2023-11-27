@extends('frontend.pages.category.layouts_category.master_category')

@section('content_category')
       <!-- START SECTION PROPERTIES LISTING -->
    <section class="properties-right list featured portfolio blog pt-5">
        <div class="container">
          @include('frontend.pages.category.layouts_category.form_search')
          <section class="headings-2 pt-0 pb-0">
            <div class="pro-wrapper">
                <div class="detail-wrapper-body">
                    <div class="listing-title-bar">
                        <div class="text-heading text-left">
                            <p><a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp; <span>Tìm kiếm</span></p>
                        </div>
                        <h3>Kết quả tìm kiếm</h3>
                    </div>
                </div>
            </div>
        </section>  
                <div class="row">
                    <div class="col-lg-8 col-md-12 blog-pots">
                        <section class="headings-2 pt-0">
                            <div class="pro-wrapper">
                                <div class="detail-wrapper-body">
                                    <div class="listing-title-bar">
                                        <div class="text-heading text-left">
                                            <p class="font-weight-bold mb-0 mt-3" style="font-size:18px;">Tổng: {{$rooms->total()}} kết quả</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="cod-pad single detail-wrapper mr-2 mt-0 d-flex justify-content-md-end align-items-center grid">
                                    <div class="input-group border rounded input-group-lg w-auto mr-4">
                                        <label class="input-group-text bg-transparent border-0 text-uppercase {
                                            letter-spacing-093 pr-1 pl-3" for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>Sắp xếp:</label>
                                        <select class=" form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby" data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3" id="inputGroupSelect01" name="sortby">
                                            <option value="1" >Mặc định</option>
                                            <option value="2">Mới nhất</option>
                                            <option value="3">Xem nhiều nhất</option>
                                           
                                        </select>
                                     
                                        
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
                   @include('frontend.pages.category.layouts_category.sidebar')
                </div>
         
            <nav aria-label="..." class="pt-3">
               {{$rooms->links()}}
            </nav>
        </div>
    </section>
  
    <<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var savedOption = localStorage.getItem('selectedOption'); 
            var selectElement = $('#inputGroupSelect01');
    
            if (savedOption) {
                selectElement.val(savedOption);
            }
            selectElement.on('change', function() {
                var selectedValue = $(this).val(); 
    
             
                if (selectedValue == 1) {
                    window.location.href = '?sort=asc'; 
                    localStorage.setItem('selectedOption', selectedValue);
                } else if (selectedValue == 2) {
                    window.location.href = '?sort=desc';
                    localStorage.setItem('selectedOption', selectedValue);
                }
            });
        });
    </script>
    

  
    
    
    
    


@endsection