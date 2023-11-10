@extends('Admin.Layouts.master')

@section('content')
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <div class="card-header py-3">
                    <h3 class="m-0 d-inline">Employees </h3>

                    <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#registrationModal"><i class="fas fa-plus"></i>
                        Add Employee</a>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table id="datatable" class="table mt-0 table-striped table-card table-nowrap">
                            <thead class="text-uppercase small text-muted">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th data-orderable="false">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        @php
                                            $userType = match ($data->type) {
                                                1 => 'designer',
                                                3 => 'producation',
                                            };
                                        @endphp
                                        <td>{{ $userType }}</td>
                                        <td>

                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteUser"
                                                data-id="{{ $data->id }}" title="Delete Business"><i
                                                    class="text-danger ms-2 delete-user" data-feather="trash-2"></i></a>
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
    @include('Admin.Panel.users.user-form')
    @include('Admin.Panel.users.delete-user-modal')
@endsection


@section('js-script')
    @include('Admin.Panel.users.script')
@endsection
