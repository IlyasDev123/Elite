<div class="modal fade" id="editorder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editorder" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Assign Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.orders.assign', $order->id) }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <label class="fw-bold required" for="">Designer Name</label>
                            <select class="form-select" aria-label="Default select example" name="user_id" required>
                                <option value="">Select Designer</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Instruction</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </form>
        </div>
    </div>
</div>
