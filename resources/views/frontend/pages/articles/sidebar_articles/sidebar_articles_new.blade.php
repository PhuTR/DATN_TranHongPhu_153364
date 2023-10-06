<div class="widget-boxed popular mt-5 " style="margin-bottom: 20px;">
    <section class="section section-sublink">
        <div class="widget-boxed-header ">
            <h4>Bài viết mới</h4>
        </div>
        <ul class="list-links price clearfix">
            @foreach ($articles as $item )
            <li style="width:100%"><i class="fa-solid fa-angle-right icon" style="font-size:12px"></i> 
                <a href="{{route('get.articles.detail',['slug' => $item->slug,'id' => $item->id])}}">{{$item->name}}</a>
            </li>
            @endforeach
           

        </ul>
    </section>
</div>