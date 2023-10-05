@include('frontend.pages.category.layouts_category.form_search')


<section class="headings-2 pt-0 pb-0">
    <div class="pro-wrapper">
        <div class="detail-wrapper-body">
            <div class="listing-title-bar">
                <div class="text-heading text-left">
                    <p><a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp; <span>{{$category->name}}</span></p>
                </div>
                <h3>{{$category->title}}</h3>
            </div>
        </div>
    </div>
</section>
<section class="visited-cities rec-pro" style="padding: 1em 0;">
    <div class="container-fluid">
        <div class="row sp-1">
            {{-- <div class="col-lg-0"></div> --}}
            @foreach ($locaties as $item )
            <div class="col-lg-3-1 col-md-6 " data-aos="zoom-in" data-aos-delay="150" style="margin-bottom: 3px" >
                <!-- Image Box -->
                <div class="bg-location">
                    <a href="listing-details.html" class="img-box hover-effect" style="height: 180px">
                        @if(empty($item->avatar) || is_null($item->avatar) || $item->avatar == 'no-avatar.jpg')
                            <img   class="img-responsive" id="output1" src="{{ asset('images/no-avatar.jpg') }}">
                        @else
                            <img  class="img-responsive" id="output1" src="{{ asset('uploads/avatars/' . $item->avatar) }}">
                        @endif
                        {{-- <img src="images/popular-places/7.jpg" class="img-responsive" alt=""> --}}
                        <!-- Badge -->
                    </a>
                    <p class="txt-title">{{$category->name}} {{$item->name}}</p>
                </div>
                  
       
            </div>
           
            @endforeach
       
           
        </div>
    </div>
</section>