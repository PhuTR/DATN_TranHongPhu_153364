<style>
    .location-district,
    .location-ward {
        padding: 15px;
        background-color: #fff;
        border-radius: 5px;
        border: 1px solid #dedede;
        list-style: none;
        margin-right: 15px
    }

    .location-district li .count {
        color: #999;
        margin-left: 5px;
        font-size: .9rem;
    }

    .location-district li a {
        display: inline-block;
        padding: 5px 0;
        font-size: 1.05rem;
        color: #1266dd;
        text-decoration: none;
    }

    .location-district li {
        min-width: 170px;
        float: left;
        margin-right: 10px;
        text-align: left;
    }
</style>
@if (isset($room_districts) && !$room_districts->IsEmpty())
<section class="section section-top-location">
    <ul class="location-district phongtro clearfix">
        @foreach($room_districts ?? [] as $item)
        <li>
            <a class="district-item" title="Phòng trọ" href=" {{ route('get.room.by_districts_category',['id' => $item->district_id, 'category_id'=>$category->id]) }}">{{ $item->district->name }}</a> 
            <span class="count">({{ $item->room_count ?? 0 }})</span> 
        </li>
        @endforeach
    </ul>
</section>
@endif
@if (isset($room_wards) && !$room_wards->IsEmpty())
<section class="section section-top-location">
    <ul class="location-district phongtro clearfix">
        @foreach($room_wards ?? [] as $item)
        <li>
            <a class="district-item" title="Phòng trọ {{ $item->name }}" href="{{ route('get.room.by_wards_category',['id' => $item->wards_id,'category_id'=>$category->id]) }}">{{ $item->wards->name }}</a>
            <span class="count">({{ $item->room_count ?? 0 }})</span>
        </li>
        @endforeach
    </ul>
</section>
@endif