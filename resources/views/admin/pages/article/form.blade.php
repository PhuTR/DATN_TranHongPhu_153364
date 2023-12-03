
<div class="col-8" style="margin:0 auto">
    <div class="white_card card_height_100 mb_30">
      <div class="white_card_header">
        <div class="box_header m-0">
          <div class="main-title">
            <h3 class="m-0">Thông tin</h3>
          </div>
        </div>
      </div>
      <form name="contact_form" action="" method="POST" autocomplete="off" enctype="multipart/form-data">  
        @csrf
        <div class="white_card_body">
          <div class="row"> 
              <div class="col-lg-12">
                <div class="common_input mb_15">
                    <label for="title">Tiêu đề</label>
                    <input type="text" name="name" id="title" placeholder="" value="{{$article->name ?? ""}}">
                    @if ($errors->first('name'))
                        <span class="text-error" style="color: #FF385C">{{$errors->first('name')}}</span>
                    @endif
                </div>
              </div>
              <div class="col-lg-12">
                  <div class="common_input mb_15">
                    <label for="title">Mô tả ngắn</label>
                    <br>
                    <textarea class="col-lg-12" style="min-height: 200px" type="text" name="description" id="title" placeholder="">{{$article->description ?? ""}}</textarea>
                    @if ($errors->first('name'))
                        <span class="text-error" style="color: #FF385C">{{$errors->first('name')}}</span>
                    @endif
                  </div>
              </div>
             
              <div class="col-lg-12">
                  <div class="common_input mb_15">
                    <label for="title">Mội dung</label>
                    <textarea id="summernote" name="contents">{{$article->contents ?? ""}}</textarea>
                    {{-- <textarea style="min-height: 300px" id="description" name="contents" placeholder="">{{$article->contents ?? ""}}</textarea> --}}
                    @if ($errors->first('description'))
                        <span class="text-error" style="color: #FF385C">{{$errors->first('description')}}</span>
                    @endif
                  </div>
              </div>
              <div class="col-lg-12">
                <div class="common_input mb_15">
                  <label for="area">Ảnh đại diện</label>
                  <br>
                  @if (isset($article->avatar))
                  <div class="row" style="margin-bottom: 15px;display: flex">
                     
                      <div class="col-sm-2" style="margin-right: 10px;">
                          <a href="" style="display: block;">
                              <img src="{{ pare_url_file($article->avatar) }}" style="width: 300px;height: auto">
                          </a>
                      </div>
       
                  </div>
                  @endif
                  <div class="file-loading">
                    <input id="file-5" type="file" class="file input_file" name="avatar"  multiple data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                  </div>
                </div>
              </div>
              
              <div class="col-6" style="margin: 0 auto">
                <div class="create_report_btn mt_30">
                  <button type="submit" class="btn btn-primary rounded-pill mb-3 col-12">Lưu thông tin</button >
                </div>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
<script>
	ClassicEditor
		.create( document.querySelector( '#description' ) )
		.catch( error => {
			console.error( error );
		} );
</script>
<script type="text/javascript">
    $('#file-5').fileinput({
      theme: 'fa',
      language: 'vi',
      showUpload: false,
      allowedFileExtensions: ['jpg', 'png', 'gif']
    });
  </script>
