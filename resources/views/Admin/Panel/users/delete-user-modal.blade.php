<div class="modal fade" id="deleteUser" data-bs-backdrop="static" tabindex="-1" aria-labelledby="deleteUserLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserLabel">Delete Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="myForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="fw-bold" for="">Are you sure you want to delete?</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="deleteButton">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('js-script')
    <script>
        $(document).ready(function() {
            $('#deleteButton').on('click', function() {
                event.preventDefault();

                var id = $(this).data('id');
                alert(id);
                console.log("Retrieved data-id:", id);

                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('users.destroy', ':id') }}".replace(':id', id),
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.statusText);
                    }
                });

            });
        });
    </script>
@endsection
