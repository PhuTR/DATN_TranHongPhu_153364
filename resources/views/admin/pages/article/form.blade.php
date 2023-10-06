<form method="POST" enctype="multipart/form-data">
    @csrf
 
    <div class="single-add-property">
        <h3>Thông tin </h3>
        <div class="property-form-group">
                <div class="row">
                    {{-- <div class="col-lg-4 col-md-12 dropdown faq-drop">
                        <label for="area">Loại tin tức</label>
                        <div class="form-group categories">
                            <select name="category_id" id="" class="nice-select form-control wide">
                                <option value="0" class="option">--Chọn loại chuyên mục--</option>
                                @foreach ($categories ?? [] as $item)
                                    <option value="{{$item->id}}" {{$item->id == ($room->category_id ?? 0) ? "selected" : ""}} class="option">{{$item->name}}</option>   
                                @endforeach
                            </select>
                        </div>
                    </div> --}}


                    <div class="col-md-12">
                        <p>
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="name" id="title" placeholder="" value="{{$article->name ?? ""}}">
                        </p>
                        @if ($errors->first('name'))
                              <span class="text-error" style="color: #FF385C">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <p>
                            <label for="title">Mô tả</label>
                            <textarea type="text" name="description" id="title" placeholder="">{{$article->description ?? ""}}</textarea>
                        </p>
                        @if ($errors->first('name'))
                              <span class="text-error" style="color: #FF385C">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <textarea style="min-height: 300px" id="description" name="contents" placeholder="">{{$article->contents ?? ""}}</textarea>
                        </p>
                        @if ($errors->first('description'))
                              <span class="text-error" style="color: #FF385C">{{$errors->first('description')}}</span>
                        @endif
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
            @if(empty($article->avatar) || is_null($article->avatar) || $article->avatar == 'no-avatar.jpg')
                <img   class="image-bg" id="output1" src="{{ asset('images/no-avatar.jpg') }}">
             @else
             <img  class="image-bg" id="output1" src="{{ asset('uploads/avatars/' . $article->avatar) }}">
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
