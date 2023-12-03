<section class="visited-cities rec-pro" style="padding: 1em 0;">
    <div class="container-fluid">
        <div class="row sp-1">
            {{-- <div class="col-lg-0"></div> --}}
            @foreach ($locaties as $item )
            <div class="col-lg-3-1 col-md-6 " data-aos="zoom-in" data-aos-delay="150" style="margin-bottom: 3px" >
                <!-- Image Box -->
                <div class="bg-location">
                    @if (isset($category->id))
                        <a href="{{route('get.room.by_city_category',['id' => $item->code, 'category_id'=>$category->id,])}}" class="img-box hover-effect" style="height: 180px">
                    @else
                        <a href="{{route('get.room.by_city',['id' => $item->code, 'slug' => $item->slug])}}" class="img-box hover-effect" style="height: 180px">
                    @endif
                    <img  class="img-responsive" id="output1" src="{{ pare_url_file($item->avatar) }}">
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