<div class="modal fade" id="submit-order" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="submit-order" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Submit Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.orders.shipment-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="order_id" value="" id="order_id">

                        <div class="mb-3">
                            <label>Please Add Tracking id</label>
                            <input type="text" class="form-control rounded" name="tracker_id" value=""
                                required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('js-script')
    <script>
        $(".submit-order").click(function() {
            var ids = $(this).attr('data-id');
            $("#order_id").val(ids);
        })
    </script>
@endsection
