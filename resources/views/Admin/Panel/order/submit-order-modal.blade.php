<div class="modal fade" id="submit-order" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="submit-order" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Submit Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.orders.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <input type="hidden" name="order_id" value="{{ $order->id }}">

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Instruction</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Upload Source files(eg: zip, image,
                                videos etc)*</label>
                            <input class="form-control" type="file" name="attachments[]" id="formFileMultiple"
                                multiple required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Order</button>
                </div>
            </form>
        </div>
    </div>
</div>
