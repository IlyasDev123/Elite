@extends('Admin.Layouts.master')

@section('content')
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h3 class="m-0 d-inline">Users</h3>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table id="datatable" class="table mt-0 table-striped table-card table-nowrap">
                            <thead class="text-uppercase small text-muted">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th data-orderable="false">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>
                                            @if ($data->checkTaskStatus->isEmpty())
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteUser"
                                                    onclick="deleteUser({{ $data->id }})" title="Delete Business"><i
                                                        class="text-danger ms-2" data-feather="trash-2"></i></a>
                                            @else
                                                <p class="text-danger">Task is in Progress</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Admin.Panel.Users.delete-user-modal')
@endsection


@section('js-script')
    <script>
        function deleteUser(id) {
            $('#delete-id').val(id)
        }
    </script>
@endsection
