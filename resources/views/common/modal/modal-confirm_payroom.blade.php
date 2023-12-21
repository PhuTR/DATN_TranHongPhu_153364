<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="container">
          <div class="row align-items-center">
            <div class="col">
              <div class="p-4">
                <h3 class="text-primary h4">Bạn có muốn thanh toán dịch vụ không?</h3>
                <p class="mt-3 text-secondary"><i class="fas fa-check-circle me-2 text-warning"></i> Mọi thông tin thanh toán sẽ được gửi về email: {{Auth::user()->email}}.</p>
 
                <div class="mb-3 mt-4">
                </div>
                <div>
                  <button type="button" data-bs-dismiss="modal" class="px-4 btn btn-danger rounded-pill">Huỷ</button>
                  <button type="submit" class="px-4 btn btn-danger rounded-pill">Xác nhận</button>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="p-4">
                <img src="{{asset('images/image-email.jpg')}}" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>