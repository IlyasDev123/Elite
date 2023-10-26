<div class="modal fade" id="detailOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="detailOrder" aria-hidden="true" data-target=".bd-example-modal-lg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Submit Price</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.orders.price') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <input type="hidden" name="order_id" value="{{ $order->id }}" />
                        <div class="mb-3">
                            <label for="price" class="form-label">Price *</label>
                            <input type="number" class="form-control" placeholder="price" aria-label="price"
                                aria-describedby="basic-addon1" name="price">
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
