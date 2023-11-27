@extends('frontend.pages.category.layouts_category.master_category')
@section('title', $article->name)
@section('content_category')
<style>
h1{
    font-family: Arial,Helvetica,sans-serif;
    margin-bottom:0px;font-size: 29px;color:#000;text-transform: none;font-weight:700;
}
h2{
    font-family: Arial,Helvetica,sans-serif;
    margin-bottom:0px;font-size: 1.6em;color:#000;text-transform: none;font-weight:700;
    padding-bottom: 12px; 
}
p{
    font-size: 1.2em;
    font-weight: 200;
    font-family: Arial,Helvetica,sans-serif;
    color: #333;

}
</style>
<section class="blog blog-section">
    <div class="container" style="min-width: 1200px">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="dashborad-box">
                            <div class="news-item details no-mb2">
                               
                                <div class="news-item-text details pb-0">
                                    <a href="blog-details.html"><h1  style="">{{$article->name}}</h1></a>
                                    <div class="dates">
                                        <span class="date">{{$article->created_at->format('d/m/Y')}}</span>
                                    </div>
                                    <div class="dates">
                                        <p style="font-style:italic">{{$article->description}}</p>
                                    </div>
                                    <div class=" visib mb-0">
                                       {!!$article->contents!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
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
      
    </div>
</section>


@endsection