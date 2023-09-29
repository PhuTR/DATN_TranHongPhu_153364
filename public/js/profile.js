import ('toastr')
var Auth = {
    init : function (){
        this.sendCodeNumber();
        console.log("Ruuning");
    },
    sendCodeNumber(){

        
        $(".js-get-code-phone").click(function(event){
            
            event.preventDefault();
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            let $phoneNew = $('#phone_new').val();

            if ($phoneNew.length !== 10) {
                toastr.error('Số điện thoại không hợp lệ!', 'Thất bại', { positionClass: 'toast-bottom-right' });
                return;
            } else {
                
                toastr.success('Mã xác thực đã gửi về số điện thoại hoặc email của bạn!', 'Thành công', { positionClass: 'toast-bottom-right' });
                
                return;
            }
        });
    },
};

$(function () {
    Auth.init();
});