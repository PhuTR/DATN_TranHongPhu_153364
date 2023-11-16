<script type="text/javascript">

    function view(){
        if(localStorage.getItem('data') != null){
            var data  = JSON.parse(localStorage.getItem('data'));
            for(i=0;i<data.length;i++){
                var id = data[i].id
                var name = data[i].name;
                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;
                var area = data[i].area;
                var description = data[i].description;
                var time_start = data[i].time_start;
                var view = data[i].view;
                var avatar = data[i].avatar;
                var address = data[i].address;
                var phone = data[i].phone;
                var username = data[i].username;
                var service_hot = data[i].service_hot;

                if(service_hot == 5){
                    $("#row_wishlist5").append(' \
                        <div class = "d-flex"> \
                            <div class="item col-lg-5 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 item-margin"> \
                                <div class="project-single mb-0 bb-0" data-aos="fade-up"> \
                                    <div class="project-inner project-head"> \
                                        <div class="homes">  \
                                            <a class="homes-img"> \
                                                <div  class="homes-price"></div> \
                                                    <img  class="img-responsive"  src="'+image+'"> \
                                            </a> \
                                        </div> \
                                        <div class="button-effect"> \
                                            <a class="img-poppu btn btn-close delete_wishlist" data-id="'+id+'"><i id="icon-heart"  class="fa-solid fa-heart"></i></a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            <div class="col-lg-7 col-md-12 homes-content pb-0 mb-44 item-margin" data-aos="fade-up" style="background-color: #FFF9F3"> \
                                <h3> \
                                    <a style="color: #FF385C" href="'+url+'"> \
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span> \
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span> \
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span> \
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span> \
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span> \
                                    <span class="title-long">'+name+'</span> \
                                    </a> \
                                </h3> \
                                <p class="homes-address mb-3"> \
                                    <a> \
                                        <i class="fa fa-map-marker"></i><span>'+address+'</span> \
                                    </a> \
                                    <a style="float: right"> \
                                        <span>'+time_start+'</span> \
                                    </a> \
                                </p> \
                                <ul class="homes-list clearfix pb-2" > \
                                    <li class="the-icons" style="margin-top: -5%"> \
                                        <span style="font-size: 1rem;font-weight: 700;color: #16c784;">'+price+'</span> \
                                    </li> \
                                    <li class="the-icons" style="margin-top: -5%"> \
                                        <i class="fa fa-object-group mr-1" aria-hidden="true"></i> \
                                        <span>'+area+'</span> \
                                    </li> \
                                    <li class="the-icons" style="margin-top: -5%"> \
                                        <i class="fa-solid fa-eye"></i> \
                                        <span>'+view+'</span> \
                                    </li> \
                                    <li class="the-icons" style="width:100% !important; margin-top:-3%;margin-bottom:-4%"> \
                                        <i class="flaticon-square mr-2" aria-hidden="true"></i> \
                                        <span class="ellipsis">'+description+'</span> \
                                    </li> \
                                </ul> \
                                <div class="footer"> \
                                    <a href="agent-details.html"> \
                                        <img src="'+avatar+'" alt="" class="mr-2"> \
                                        '+username+'\
                                    </a> \
                                    <a href="https://zalo.me/'+phone+'" target="_blank" class="btn-contact-zalo">Nhắn Zalo</a> \
                                    <br /> \
                                    <a href="tel:'+phone+'" target="_blank" class="btn-contact-phone">Gọi '+phone+' </a> \
                                </div>\
                            </div> \
                        </div>\
                    ')
                }
                else if(service_hot == 4){
                    $("#row_wishlist4").append('\
                        <div class="d-flex">\
                            <div class="item col-lg-5-3 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 item-margin" style="max-height:200px">\
                                <div class="project-single mb-0 bb-0" data-aos="fade-up">\
                                    <div class="project-inner project-head" style="max-height:200px">\
                                        <div class="homes">\
                                            <a href="single-property-1.html" class="homes-img" style="max-height:200px">\
                                                <img style="max-height:200px" class="img-responsive" id="output1" src="'+image+'">\
                                            </a>\
                                        </div>\
                                        <div class="button-effect">\
                                            <a class="img-poppu btn btn-close delete_wishlist" data-id="'+id+'"><i id="icon-heart" class="fa-solid fa-heart"></i></a>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="col-lg-7-7 col-md-12 homes-content pb-0 mb-44 vip0 item-margin" data-aos="fade-up" >\
                                <h3>\
                                    <a style="font-size:0.9em;color:#ea2e9d" href="'+url+'">\
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>\
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>\
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>\
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>\
                                        <span  class="title-long">'+name+' </span>\
                                    </a>\
                                </h3>\
                                <p class="homes-address mb-3">\
                                    <ul class="homes-list clearfix pb-2" >\
                                        <li class="the-icons" style="margin-top: -5%">\
                                            <span style="font-size: 1rem;font-weight: 700;color: #16c784;"> '+price+'</span>\
                                        </li>\
                                        <li class="the-icons" style="margin-top: -5%">\
                                            <i class="fa fa-object-group mr-1" aria-hidden="true"></i>\
                                            <span>'+area+'</span>\
                                        </li>\
                                        <li class="the-icons" style="margin-top: -5%">\
                                            <i class="fa fa-map-marker"></i><span>'+address+'</span> \
                                        </li>\
                                        <li class="the-icons" style="width:100% !important; margin-top:-3%;margin-bottom:-4%">\
                                            <i class="flaticon-square mr-2" aria-hidden="true"></i>\
                                            <span class="ellipsis">'+description+'</span>\
                                        </li>\
                                    </ul>\
                                </p>\
                                <div style="padding-top: 0px" class="footer">\
                                    <a >\
                                        <img src="'+avatar+'" alt="" class="mr-2">\
                                        '+username+'\
                                    </a>\
                                    <span>'+time_start+'</span>\
                                </div>\
                            </div>\
                        </div>\
                    ');
                }
                else if(service_hot == 3){
                    $("#row_wishlist3").append('\
                        <div class="d-flex">\
                            <div class="item col-lg-5-3 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 item-margin" style="max-height:200px">\
                                <div class="project-single mb-0 bb-0" data-aos="fade-up">\
                                    <div class="project-inner project-head" style="max-height:200px">\
                                        <div class="homes">\
                                            <a href="single-property-1.html" class="homes-img" style="max-height:200px">\
                                                <img style="max-height:200px" class="img-responsive" id="output1" src="'+image+'">\
                                            </a>\
                                        </div>\
                                        <div class="button-effect">\
                                            <a class="img-poppu btn btn-close delete_wishlist" data-id="'+id+'"><i id="icon-heart" class="fa-solid fa-heart"></i></a>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="col-lg-7-7 col-md-12 homes-content pb-0 mb-44 vip0 item-margin" data-aos="fade-up" >\
                                <h3>\
                                    <a style="font-size:0.9em;color:#f60" href="'+url+'">\
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>\
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>\
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>\
                                        <span  class="title-long">'+name+' </span>\
                                    </a>\
                                </h3>\
                                <p class="homes-address mb-3">\
                                    <ul class="homes-list clearfix pb-2" >\
                                        <li class="the-icons" style="margin-top: -5%">\
                                            <span style="font-size: 1rem;font-weight: 700;color: #16c784;"> '+price+'</span>\
                                        </li>\
                                        <li class="the-icons" style="margin-top: -5%">\
                                            <i class="fa fa-object-group mr-1" aria-hidden="true"></i>\
                                            <span>'+area+'</span>\
                                        </li>\
                                        <li class="the-icons" style="margin-top: -5%">\
                                            <i class="fa fa-map-marker"></i><span>'+address+'</span> \
                                        </li>\
                                        <li class="the-icons" style="width:100% !important; margin-top:-3%;margin-bottom:-4%">\
                                            <i class="flaticon-square mr-2" aria-hidden="true"></i>\
                                            <span class="ellipsis">'+description+'</span>\
                                        </li>\
                                    </ul>\
                                </p>\
                                <div style="padding-top: 0px" class="footer">\
                                    <a >\
                                        <img src="'+avatar+'" alt="" class="mr-2">\
                                        '+username+'\
                                    </a>\
                                    <span>'+time_start+'</span>\
                                </div>\
                            </div>\
                        </div>\
                    ');
                }
                else if(service_hot == 2){
                    $("#row_wishlist2").append('\
                        <div class="d-flex">\
                            <div class="item col-lg-5-3 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 item-margin" style="max-height:200px">\
                                <div class="project-single mb-0 bb-0" data-aos="fade-up">\
                                    <div class="project-inner project-head" style="max-height:200px">\
                                        <div class="homes">\
                                            <a href="single-property-1.html" class="homes-img" style="max-height:200px">\
                                                <img style="max-height:200px" class="img-responsive" id="output1" src="'+image+'">\
                                            </a>\
                                        </div>\
                                        <div class="button-effect">\
                                            <a class="img-poppu btn btn-close delete_wishlist" data-id="'+id+'"><i id="icon-heart" class="fa-solid fa-heart"></i></a>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="col-lg-7-7 col-md-12 homes-content pb-0 mb-44 vip0 item-margin" data-aos="fade-up" >\
                                <h3>\
                                    <a style="font-size:0.9em;color:#3763e0" href="'+url+'">\
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>\
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>\
                                        <span  class="title-long">'+name+' </span>\
                                    </a>\
                                </h3>\
                                <p class="homes-address mb-3">\
                                    <ul class="homes-list clearfix pb-2" >\
                                        <li class="the-icons" style="margin-top: -5%">\
                                            <span style="font-size: 1rem;font-weight: 700;color: #16c784;"> '+price+'</span>\
                                        </li>\
                                        <li class="the-icons" style="margin-top: -5%">\
                                            <i class="fa fa-object-group mr-1" aria-hidden="true"></i>\
                                            <span>'+area+'</span>\
                                        </li>\
                                        <li class="the-icons" style="margin-top: -5%">\
                                            <i class="fa fa-map-marker"></i><span>'+address+'</span> \
                                        </li>\
                                        <li class="the-icons" style="width:100% !important; margin-top:-3%;margin-bottom:-4%">\
                                            <i class="flaticon-square mr-2" aria-hidden="true"></i>\
                                            <span class="ellipsis">'+description+'</span>\
                                        </li>\
                                    </ul>\
                                </p>\
                                <div style="padding-top: 0px" class="footer">\
                                    <a >\
                                        <img src="'+avatar+'" alt="" class="mr-2">\
                                        '+username+'\
                                    </a>\
                                    <span>'+time_start+'</span>\
                                </div>\
                            </div>\
                        </div>\
                    ');
                }
                else if(service_hot == 1){
                    $("#row_wishlist1").append('\
                        <div class="d-flex">\
                            <div class="item col-lg-5-3 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 item-margin" style="max-height:200px">\
                                <div class="project-single mb-0 bb-0" data-aos="fade-up">\
                                    <div class="project-inner project-head" style="max-height:200px">\
                                        <div class="homes">\
                                            <a href="single-property-1.html" class="homes-img" style="max-height:200px">\
                                                <img style="max-height:200px" class="img-responsive" id="output1" src="'+image+'">\
                                            </a>\
                                        </div>\
                                        <div class="button-effect">\
                                            <a class="img-poppu btn btn-close delete_wishlist" data-id="'+id+'" ><i id="icon-heart" class="fa-solid fa-heart"></i></a>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class="col-lg-7-7 col-md-12 homes-content pb-0 mb-44 vip0 item-margin" data-aos="fade-up" >\
                                <h3>\
                                    <a style="font-size:0.9em;color:#055699" href="'+url+'">\
                                        <span  class="title-long">'+name+' </span>\
                                    </a>\
                                </h3>\
                                <p class="homes-address mb-3">\
                                    <ul class="homes-list clearfix pb-2" >\
                                        <li class="the-icons" style="margin-top: -5%">\
                                            <span style="font-size: 1rem;font-weight: 700;color: #16c784;"> '+price+'</span>\
                                        </li>\
                                        <li class="the-icons" style="margin-top: -5%">\
                                            <i class="fa fa-object-group mr-1" aria-hidden="true"></i>\
                                            <span>'+area+'</span>\
                                        </li>\
                                        <li class="the-icons" style="margin-top: -5%">\
                                            <i class="fa fa-map-marker"></i><span>'+address+'</span> \
                                        </li>\
                                        <li class="the-icons" style="width:100% !important; margin-top:-3%;margin-bottom:-4%">\
                                            <i class="flaticon-square mr-2" aria-hidden="true"></i>\
                                            <span class="ellipsis">'+description+'</span>\
                                        </li>\
                                    </ul>\
                                </p>\
                                <div style="padding-top: 0px" class="footer">\
                                    <a >\
                                        <img src="'+avatar+'" alt="" class="mr-2">\
                                        '+username+'\
                                    </a>\
                                    <span>'+time_start+'</span>\
                                </div>\
                            </div>\
                        </div>\
                    ');
                }


            }
        }else{
            $('#no-favourite').append('\
                <img style="max-width: 100px; display: block; margin: 15px auto;" src="{{asset('/images/favourite.svg')}}">\
                <p style="color: #ee664c; text-align: center; font-size: 1.2rem; font-weight: bold;">Danh sách rỗng.</p>\
            ');
        }
        count=JSON.parse(localStorage.getItem('data')).length;
        $('#total-favourite').append(count);
       
    }
    view();




    function add_wistlist(clicked_id){
        $('#icon-heart').css('color','red');
        var id = clicked_id;
        var url = $('#link-room' + id).attr('href');
        var image = $('#output1' + id).attr('src');
        var name = $('#name' + id).text();
        var address = $('#address' + id).text();
        var time_start = $('#time_start' + id).text();
        var price = $('#price' + id).text();
        var area = $('#area' + id).text();
        var view = $('#view' + id).text();
        var description = $('#description' + id).text();
        var avatar = $('#avatar' + id).attr('src');
        var phone = $('#phone' + id).text();
        var username = $('#username' + id).text();
        var service_hot = $('#service_hot' + id).text();
        var newItem = {
            'id' : id,
            'url': url,
            'image': image,
            'name': name,
            'address': address,
            'time_start': time_start,
            'price': price,
            'area': area,
            'view': view,
            'description': description,
            'avatar': avatar,
            'phone': phone,
            'username': username,
            'service_hot':service_hot,
        }
        
        if(localStorage.getItem('data') == null) {
            localStorage.setItem('data','[]')
        }

        var old_data = JSON.parse(localStorage.getItem('data'));        
        
        var matches = $.grep(old_data,function(obj){
            return obj.id == id;
        })

        if(matches.length) {
            toastr.warning('Thông tin đã có trong danh sách yêu thích', 'Thông báo', { positionClass: 'toast-bottom-right' });
        }else {
            toastr.success('Thông tin đã được thêm vào danh sách yêu thích', 'Thông báo', { positionClass: 'toast-bottom-right' });
            old_data.push(newItem);
            count=JSON.parse(localStorage.getItem('data')).length;
            $('#total-favourite').append(count);
           
        }
        localStorage.setItem('data',JSON.stringify(old_data));
    }
    $(document).on('click','.delete_wishlist',function(event){
        event.preventDefault();
        var id = $(this).data('id');
        if (localStorage.getItem('data') != null) {
            var data = JSON.parse(localStorage.getItem('data'));
            if (data.length) {
                    for (i = 0; i < data.length; i++) {
                        if (data[i].id == id) {
                            data.splice(i,1);
                        }
                    }
            }   
            localStorage.setItem('data',JSON.stringify(data));  
            window.location.reload();
        }
    });
</script>