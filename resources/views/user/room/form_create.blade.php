<form  action="{{route('get_user.room.create_post')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="single-add-property">
        <h3>Địa chỉ cho thuê</h3>
        <div class="property-form-group">
                <div class="row">
                    <div class="col-lg-4 col-md-12 dropdown faq-drop">
                        <label for="area">Tỉnh/Thành phố</label>
                        <div class="form-group categories select-container ">
                            <select name="city_id" id="city_id" class="nice-select form-control wide">
                                <option value="" class="option">--Chọn Tỉnh/TP--</option>
                                @foreach ($citys ?? [] as $item)
                                    <option value="{{$item -> id}}" {{$item->id == ($room->city_id ?? 0) ? "selected" : ""}} class="option">{{$item -> name}}</option>
                                @endforeach
                            </select>
               
                            @if ($errors->first('city_id'))
                                <span class="text-error" style="color: #FF385C">{{$errors->first('city_id')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 dropdown faq-drop">
                        <label for="area">Quận/Huyện</label>
                        <div class="form-group categories">
                            <select name="district_id" id="district_id" class="nice-select form-control wide">
                                <option value="">Chọn quận huyện</option>
                                @foreach ($districts ?? [] as $item)
                                    <option value="{{$item -> id}}" {{$item->id == ($room->district_id ?? 0) ? "selected" : ""}} class="option">{{$item -> name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->first('district_id'))
                                 <span class="text-error" style="color: #FF385C">{{$errors->first('district_id')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 dropdown faq-drop">
                        <label for="area">Phường/Xã</label>
                        <div class="form-group categories">
                            <select name="wards_id" id="wards_id" class="nice-select form-control wide">
                                <option value="" class="option">Chọn phường xã</option>
                                @foreach ($wards ?? [] as $item)
                                    <option value="{{$item -> id}}"  {{$item->id == ($room->wards_id ?? 0) ? "selected" : ""}} class="option">{{$item -> name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->first('wards_id'))
                                <span class="text-error" style="color: #FF385C">{{$errors->first('wards_id')}}</span>
                            @endif
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <p class="no-mb">
                            <label for="apartment_number">Số nhà</label>
                            <input type="text" name="apartment_number" placeholder="" id="apartment_number" value="{{$room->apartment_number ?? ""}}">
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <p class="no-mb last">
                            <label for="full_address">Địa chỉ chính xác</label>
                            <input type="text" name="full_address" placeholder="" id="full_address">
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div  class="contact-map"></div>
                    </div>
                </div>
          
        </div>
    </div>
    <div class="single-add-property">
        <h3>Thông tin mô tả</h3>
        <div class="property-form-group">
                <div class="row">
                    <div class="col-lg-4 col-md-12 dropdown faq-drop">
                        <label for="area">Loại chuyên mục</label>
                        <div class="form-group categories">
                            <select name="category_id" id="" class="nice-select form-control wide">
                                <option value="0" class="option">--Chọn loại chuyên mục--</option>
                                @foreach ($categories ?? [] as $item)
                                    <option value="{{$item->id}}" {{$item->id == ($room->category_id ?? 0) ? "selected" : ""}} class="option">{{$item->name}}</option>   
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <p>
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="name" id="title" placeholder="" value="{{$room->name ?? ""}}">
                        </p>
                        @if ($errors->first('name'))
                              <span class="text-error" style="color: #FF385C">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            {{-- <label for="description">Mô tả</label> --}}
                            {{-- <div id="description" name="description"></div> --}}
                            <textarea id="description" name="description" placeholder="">{{$room->description ?? ""}}</textarea>
                        </p>
                        @if ($errors->first('description'))
                              <span class="text-error" style="color: #FF385C">{{$errors->first('description')}}</span>
                        @endif
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <p class="no-mb">
                            <label for="price">Thông tin liên hệ</label>
                            <input type="text" name="name" placeholder="" id="price" disabled value="{{Auth::user()->name}}">
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <p class="no-mb last">
                            <label for="area">Điện thoại</label>
                            <input type="text" name="area" placeholder="" id="area" disabled value="{{Auth::user()->phone}}">
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <p class="no-mb last">
                            <label for="area">Giá cho thuê ( Đồng )</label>
                            <input type="text" name="price" placeholder="" id="price" value="{{number_format($room->price ?? 0,0,',','.') ?? 0}}">
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <p class="no-mb last">
                            <label for="area">Diện tích <span style="text-transform:none;">( m2 )</span></label>
                            <input type="text" name="area" placeholder="" id="area" value="{{$room->area ?? 0}}">
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-12 dropdown faq-drop">
                        <label for="area">Đối tượng cho thuê</label>
                        <div class="form-group categories">
                            <select name="subject_id" id="" class="nice-select form-control wide">
                                <option value="3" class="option">--Tất cả--</option>
                                @foreach ($optisons ?? [] as $item)
                                    <option value="{{$item -> id}}"  {{$item->id == ($room->subject_id ?? 0) ? "selected" : ""}} class="option">{{$item -> name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                   
                </div>
         
        </div>
    </div>

    <div class="single-add-property">
        <h3>Hình ảnh</h3>
        <p  style="color: #333;display: inline-block;font-size: 15px;font-weight: 600;text-transform: capitalize;">
           Ảnh bìa
        </p>
        <div class="">
            @if(empty($room->avatar) || is_null($room->avatar) || $room->avatar == 'no-avatar.jpg')
                <img   class="image-bg" id="output1" src="{{ asset('images/no-avatar.jpg') }}">
             @else
             <img  class="image-bg" id="output1" src="{{ asset('uploads/avatars/' . $room->avatar) }}">
             @endif

            <div>
                <input style="width:14%" class="input-file" name="avatar" id="avatar" type="file" accept="image/*" onchange="loadFile(event)" style="display: none">
                        <script>
                          var loadFile = function(event) {
                            var output = document.getElementById('output1');
                            output.src = URL.createObjectURL(event.target.files[0]);
                          };
                        </script>
            </div>
        </div>
      

        <p style="margin-top:1%;color: #333;display: inline-block;font-size: 15px;font-weight: 600;text-transform: capitalize;">
            Ảnh chi tiết
         </p>
         {{-- <div class="file-loading">
            <input id="file-5" type="file" class="file" name="hinhanh[]" multiple data-preview-file-type="any" data-upload-url="#">
        </div> --}}
        <div class="form-group">
            <label for="comment">Thêm hình ảnh:</label>
            <div class="file-loading">
                <input id="file-5" type="file" class="file" name="hinhanh[]"  multiple 
                data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                {{-- <input id="file-5" type="file" class="file" name="hinhanh[]" multiple data-preview-file-type="any" data-upload-url="#"> --}}
            </div>
          </div>
          
    </div>

    <div class="add-property-button pt-5" >
        <div class="row">
            <div class="col-md-12">
                <div class="prperty-submit-button">
                    <button type="submit" style="margin-left: 25%;width: 50%">Tiếp tục</button>
                </div>
            </div>
        </div>
    </div>
</form>




<script>
    var URL_LOAD_DISTRICT = '{{route('get_user.load.district')}}'
    var URL_LOAD_WARDS = '{{route('get_user.load.wards')}}'
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(function() {
        $('#city_id').change(function() {
            let $this = $(this);
            let city_id = $this.val();
            console.log(city_id);

            $.ajax({
            url: URL_LOAD_DISTRICT,
                data:{
                    city_id: city_id
                },
                
            })
                .done(function( data ) {
                    if(data ) {
                        
                         let options = `<option value="0" >--Chọn Quận/Huyện--</option>`;
                         let option_name = ``;
                        data.map((item,index) =>{
                            options = options + `<option value="${item.id}" >${item.name}</option>`
                            option_name = option_name + `${item.name}`
                        });
                        $('#district_id').html(options);

                    }
                 
                    
                    
                });
            })

        $('#district_id').change(function() {
            let $this = $(this);
            let district_id = $this.val();
            console.log(district_id);

            $.ajax({
            url: URL_LOAD_WARDS,
                data:{
                    district_id: district_id
                },
                
            })
                .done(function( data ) {
                
                    if(data ) {
                        
                        let options = `<option value="0" >--Chọn Phường/Xã--</option>`;
                         let option_name = ``;
                        data.map((item,index) =>{
                            options = options + `<option value="${item.id}" >${item.name}</option>`
                            option_name = option_name + `${item.name}`
                        });
                        $('#wards_id').html(options);

                    }
                 
                    
                    
                });
            })


   
    })
</script>

<script>
	ClassicEditor
		.create( document.querySelector( '#description' ) )
		.catch( error => {
			console.error( error );
		} );
</script>
