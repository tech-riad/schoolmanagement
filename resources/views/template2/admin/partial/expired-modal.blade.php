<!-- expired modal starts here -->
<div class="modal fade" id="adminExpiredModal" tabindex="-1" role="dialog" aria-labelledby="adminExpiredModal"
     aria-hidden="true">
    <div class="modal-dialog" id="modal-dialog" role="document">
        <div class="modal-content relative">
            <div class="modal-body">
                <div class="row" style="padding: 20px">
                    <div class="col-md-8 offset-2">
                        <div class="content">
                            <h6 class="text-center text-danger" id="msg_head"></h6>
                            <div class="icon mt-2" style="text-align: center;font-size: 22px">
                                <i class="fas fa-hourglass-end"></i>
                            </div>
                            <p  class="expire-pera mt-2" id="msg_body" style="text-align: justify;padding: 0 8px"></p>
                            <div class="btn-wrapper-bottom text-center mt-3" id="pay-btn-wraper">
                                <a href="#">
                                    <form action="{{route('pay-with-shurjo')}}" method="GET">
                                        @csrf
                                        <button class="btn btn-danger px-4 py-2 bold" >Pay Now</button>
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- expired modal ends here -->
