<div class="modal fade" id="deleteCategory" data-bs-backdrop="static" tabindex="-1" aria-labelledby="deleteCategoryLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCategoryLabel">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('delete.category') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="delete-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="fw-bold" for="">Are you sure you want to delete?</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
