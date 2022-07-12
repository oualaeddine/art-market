<div class="md-modal md-effect-4" id="modal-4">
    <div class="md-content">
        <h3 class="bg-danger ">{{$title}}</h3>
        {{-- <div>
              <h5>{{$content}}</h5>

            <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
        </div> --}}
        <div class="modal-body">
            <p>{{$content}}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger waves-effect md-close" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
        </div>
    </div>
</div>
<div class="md-overlay"></div>