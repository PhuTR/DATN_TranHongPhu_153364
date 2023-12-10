   <!-- Search Form -->
   <form role="search" method="GET" action="{{ route('get.room.search') }}">
    <div class="col-12 px-0 parallax-searchs">
        <div class="banner-search-wrap">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tabs_1">
                    <div class="rld-main-search">
                        <div class="row">

                            <div class="rld-single-select ml-22">
                                <select class="select single-select " style="width:220px" name="category_id">

                                    @foreach($categoriesGlobal ?? [] as $item)
                                    <option value="{{ $item->id }}" {{ Request::get('category_id') == $item->id ? "selected" : "" }}>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="rld-single-select ml-22 scroll">
                                <select class="select single-select " name="city_id">
                                    <option value="">Chọn thành phố</option>
                                    @foreach($locationsCity ?? [] as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == ($room->city_id ?? (Request::get('city_id'))) ? "selected" : ""}}>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="rld-single-select ml-22">
                                <select class="select single-select " name="price">
                                    <option value="">Chọn mức giá</option>
                                    @foreach(config('config_search.price') as $key => $item)
                                    <option value="{{ $key }}" {{ Request::get('price') == $key ? "selected" : "" }}>{{ $item }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="rld-single-select ml-22">
                                <select class="select single-select " name="area">
                                    <option value="">Chọn diện tích</option>
                                    @foreach(config('config_search.area') as $key => $item)
                                    <option value="{{ $key }}" {{ Request::get('area') == $key ? "selected" : "" }}>{{ $item }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                <button type="submit" class="btn btn-yellow" ><i class="fa-solid fa-magnifying-glass icon  "></i>Tìm kiếm</button>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </form>
 
<!--/ End Search Form -->