
function view(){
   
    if(localStorage.getItem('data')!=null){
        var data = JSON.parse(localStorage.getItem('data'));
      
        data.reverse();
        // document.getElementById('').style.overflow = 'scroll';
        // document.getElementById('').style.height = 'auto';
        $('#row_wishlist').append(data.length);
        for(var i=0; i<data.length; i++){
            var id = data[i].id;
            $('#row_wishlist').append(id);
        }
    }
}

view();
function add_wistlist(clicked_id){

    var id = clicked_id;
    var name = document.getElementById('name'+id).textContent;
    var price = document.getElementById('price'+id).textContent;
    var image = document.getElementById('output1'+id).src;
    var url = document.getElementById('link-room'+id).href;
    var created_at = new Date();
    var newItem = {
        'url':url,
        'id':id,
        'name':name,
        'price':price,
        'image':image,
        'created_at':created_at,
    }
    
    
    if(localStorage.getItem('data') ==null){
        localStorage.setItem('data','[]');
    }
    var old_data = JSON.parse(localStorage.getItem('data'));
   
    var indexToDelete = old_data.findIndex(function (room) {
        return room.id === id;
    });

    var mathches = $.grep(old_data,function(obj){
        return obj.id === id;
    });

    if(mathches.length && indexToDelete !== -1){
        $('#row_wishlist').find('#' + id).remove();
        old_data.splice(indexToDelete, 1);
        // $('#icon-heart'+id).css('color','white');
        // location.reload();
       
    }else{
       
        old_data.push(newItem);
        // $('#icon-heart'+id).css('color','red');
        $('#row_wishlist').append(newItem.id);
   
    }

    localStorage.setItem('data', JSON.stringify(old_data));

}

