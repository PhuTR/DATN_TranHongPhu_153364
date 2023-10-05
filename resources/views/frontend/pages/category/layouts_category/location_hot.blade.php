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
                       
                    </a>
                    <p class="txt-title">
                        @if(isset($category->name))
                            {{$category->name}} 
                        @endif
                        {{$item->name}}
                    </p>
                </div>
                  
       
            </div>
           
            @endforeach
       
           
        </div>
    </div>
</section>