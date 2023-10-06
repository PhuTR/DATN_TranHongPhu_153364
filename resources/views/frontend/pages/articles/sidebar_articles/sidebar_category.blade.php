<div class="widget-boxed popular mt-5 " style="margin-bottom: 20px;">
    <section class="section section-sublink">
        <div class="widget-boxed-header ">
            <h4>Danh mục cho thuê</h4>
        </div>
        <ul class="list-links price clearfix">
            @foreach ($categoriesGlobal ?? [] as $item)
            @if ($item->status == 1)
            <li style="width:100%">
                <i class="fa-solid fa-angle-right icon" style="font-size:12px"></i> 
                <a href="{{route('get.category.item',['slug' => $item->slug,'id' => $item->id])}}">{{$item->name}} </a>
                {{-- <span style="color:#333;line-height:1.4;font-size:14px;font-weight:400">({{$rooms->total()}})</span> --}}
            </li>

            @endif
           
        @endforeach
           

        </ul>
    </section>
</div>