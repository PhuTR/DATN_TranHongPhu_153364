<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="flex:0 0 98%" id="staticBackdropLabel">
            <section class="headings-2 pt-0" style="background: #fff">
              <div class="pro-wrapper">
                  <div class="detail-wrapper-body" style="width:65%">
                      <div class="listing-title-bar">
                        <div >
                          <span style="float: none; margin-top:0px; " id="star"></span>
                          <h3 style="display:inline" id="name"></h3>
                        </div>
                          
                          <div class="mt-0">
                              <a  class="listing-address d-flex">
                                  <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>
                                  <span style="margin-top: 0px" id="address"></span>
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="single  mr-2">
                      <div class="detail-wrapper-body">
                          <div class="listing-title-bar">
                              <h4 style="color: #16c784"><i class="fa-solid fa-tag"></i> <span style="margin-top:0px;float: none;font-weight: 500;color: #16c784;" id="price"></span> triệu/tháng </h4>
                              <div class="mt-0">
                                  <a href="" class="listing-address">
                                      <p><i class="fa fa-object-group"></i><span id="area" style="margin-top:0px;float: none;"></span> m²</p>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </section>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @include('common.modal.modal-detail_room')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <span style="margin-top: 0px;float: none;" id="href">
        </span>
      </div>
    </div>
  </div>
</div>