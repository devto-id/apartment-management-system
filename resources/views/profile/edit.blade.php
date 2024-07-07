@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('profile.update') }}">
                @method('patch')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Edit Profile
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name"
                                name="name" required value="{{ $data->name ?? '' }}">
                        </div>


                        <div class="form-group">
                            <label for="role">Role <span class="text-danger">*</span></label>
                            <select class="form-control" id="role" name="role" placeholder="Select role" required>
                                <option value>Select role</option>
                                <option {{ isset($data) && $data->role == 'sales' ? 'selected' : '' }} value="sales">
                                    Sales
                                </option>
                                <option {{ isset($data) && $data->role == 'manager' ? 'selected' : '' }} value="manager">
                                    Manager
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email"
                                name="email" required value="{{ $data->email ?? '' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success ml-2">
                                <i class="fa fa-check mr-2"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <form method="POST" action="{{ route('password.update') }}">
                @method('put')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Update Password
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="current_password">Current Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="current_password"
                                placeholder="Enter current password" name="current_password" required value="">
                        </div>

                        <div class="form-group">
                            <label for="password">New Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" placeholder="Enter new password"
                                name="password" required value="">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">New Password Confirmation <span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password_confirmation"
                                placeholder="Enter new password" name="password_confirmation" required value="">
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success ml-2">
                                <i class="fa fa-check mr-2"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
