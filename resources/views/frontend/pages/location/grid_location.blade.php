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
        width: 170px;
        float: left;
        text-align: left;
    }
</style>
@if (isset($districts) && !$districts->IsEmpty())
<section class="section section-top-location">
    <ul class="location-district phongtro clearfix">
        @foreach($districts ?? [] as $item)
        <li>
            @if (isset($category->id))
                <a class="district-item" title="Phòng trọ {{ $item->name }}" href="{{ route('get.room.by_districts',['id' => $item->id, 'slug' => $item->slug]) }}">{{ $item->name }}</a> 
                <span class="count">({{ $item->roomsD-> count() ?? 0 }})</span>
            @else
                <a class="district-item" title="Phòng trọ {{ $item->name }}" href="{{ route('get.room.by_districts',['id' => $item->id, 'slug' => $item->slug]) }}">{{ $item->name }}</a>
                <span class="count">({{ $item->roomsD-> count() ?? 0 }})</span>
            @endif
        </li>
        @endforeach
    </ul>
</section>
@endif
@if (isset($wards) && !$wards->IsEmpty())
<section class="section section-top-location">
    <ul class="location-district phongtro clearfix">
        @foreach($wards ?? [] as $item)
        <li>
            <a class="district-item" title="Phòng trọ {{ $item->name }}" href="{{ route('get.room.by_wards',['id' => $item->id, 'slug' => $item->slug]) }}">{{ $item->name }}</a>
            <span class="count">({{ $item->roomsW-> count() ?? 0 }})</span>
        </li>
        @endforeach
    </ul>
</section>
@endif