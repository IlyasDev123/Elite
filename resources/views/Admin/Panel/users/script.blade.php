<!-- Your modal and form HTML remains the same -->

<script>
    $(document).ready(function() {
        $('#registrationForm').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var confirmPassword = $('#confirmPassword').val();
            var role = $('#role').val();
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '{{ route('users.store') }}', // Replace with your backend endpoint
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: {
                    name: name,
                    email: email,
                    password: password,
                    password_confirmation: confirmPassword,
                    type: role
                },
                success: function(response) {
                    toastr.success(response.message);
                    $('#registrationModal').modal('hide');
                },
                error: function(xhr, status, error) {
                    if (xhr.status ===
                        422) {
                        var errors = xhr.responseJSON.errors;
                        $('.text-danger').remove();
                        $.each(errors, function(field, messages) {
                            var inputField = $('#' + field);
                            inputField.after('<span class="text-danger">' +
                                messages[0] + '</span>');
                        });
                    } else {
                        toastr.error(xhr.statusText);
                    }
                }
            });
        });

        $("#datatable").DataTable({
            "filter": true,
            "length": false
        });

        function deleteUser(id) {
            $('#delete-id').val(id)
        }
    });
</script>
