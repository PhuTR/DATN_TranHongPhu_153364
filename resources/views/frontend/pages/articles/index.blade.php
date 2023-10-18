@extends('frontend.pages.category.layouts_category.master_category')

@section('content_category')

<section class="blog blog-section">
    <div class="container" >
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="row">
                    <section class="headings-2 pt-0 pb-0">
                        <div class="pro-wrapper">
                            <div class="detail-wrapper-body">
                                <div class="listing-title-bar">
                                    <div class="text-heading text-left">
                                        <p><a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp;
                                             <span>Tin tức</span>
                                        </p>
                                    </div>
                                        <h3>Tin tức</h3>
                                   
                    
                                
                                </div>
                            </div>
                        </div>
                    </section>
                    @foreach ($articles as $item )
                    <div class="col-md-12 col-xs-12" style="margin-bottom: 20px;padding-left:0px">
                        <div class="news-item news-item-sm">
                            <a href="{{route('get.articles.detail',['slug' => $item->slug,'id' => $item->id])}}" class="news-img-link">
                                <div class="news-item-img">
                                    @if(empty($item->avatar) || is_null($item->avatar) || $item->avatar == 'no-avatar.jpg')
                                            <img src="{{ asset('images/no-avatar.jpg') }}" alt="home-1" class="resp-img">
                                    @else
                                            <img src="{{ asset('uploads/avatars/' . $item->avatar) }}" alt="home-1" class="resp-img">

                                    @endif   
                                    {{-- <img class="resp-img" src="images/blog/b-1.jpg" alt="blog image"> --}}
                                </div>
                            </a>
                            <div class="news-item-text">
                                <a href="{{route('get.articles.detail',['slug' => $item->slug,'id' => $item->id])}}"><h3>{{$item->name}}</h3></a>
                                <div class="dates">
                                    <span class="date">{{$item->updated_at->format('d/m/Y')}}</span>
                                   
                                </div>
                                <div class="news-item-descr">
                                    <p>{{$item->description}}</p>
                                </div>
                                <div class="news-item-bottom">
                                    <a href="{{route('get.articles.detail',['slug' => $item->slug,'id' => $item->id])}}" class="news-link">Đọc thêm...</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                    
                 
                    
                </div>
            </div>
            <aside class="col-lg-4 col-md-12">
                <div class="widget">
                    @include('frontend.pages.articles.sidebar_articles.sidebar_category')
                    @include('frontend.pages.category.layouts_category.sidebar_news')
                    @include('frontend.pages.articles.sidebar_articles.sidebar_articles_care')
                </div>
            </aside>
           
        </div>
        <nav aria-label="..." class="agents pt-55">
          {{$articles->links()}}
        </nav>
    </div>
</section>


@endsection