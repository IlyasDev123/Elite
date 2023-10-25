<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center justify-center">
                <h1 class="table-title text-center" id="exampleModalLabel">ACCEPT PRICE REQUEST</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('accept-quote') }}" method="POST">
                @csrf
                <input type="hidden" name="quote_id" id="price" class="form-control" value="{{ $quote->id }}">
                <div class="modal-body m-4">
                    <h3>Are you sure you want to accept the quote request ?</h3>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Accept</button>
                </div>
            </form>

        </div>
    </div>
</div>
