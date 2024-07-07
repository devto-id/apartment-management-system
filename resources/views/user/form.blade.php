@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ isset($data) ? route('user.update', $data->id) : route('user.store') }}">
                @method(isset($data) ? 'PUT' : 'POST')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('user.index') }}" class="btn btn-dark">
                            <i class="fa fa-chevron-left mr-2"></i> Back
                        </a>
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

                        <div class="form-group">
                            <label for="password">{{ isset($data) ? 'New Password' : 'Password' }}
                                @if (!isset($data))
                                    <span class="text-danger">*</span>
                                @endif
                            </label>
                            <input type="password" class="form-control" id="password"
                                placeholder="{{ isset($data) ? 'Enter new password' : 'Enter password' }}" name="password"
                                {{ isset($data) ? '' : 'required' }}>

                            @if (isset($data))
                                <small>
                                    <em> *) Leave it blank if you don't want to change the password</em>
                                </small>
                            @endif
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('user.index') }}" class="btn btn-dark">
                                <i class="fa fa-chevron-left mr-2"></i> Back
                            </a>
                            <button type="submit" class="btn btn-success ml-2">
                                <i class="fa fa-check mr-2"></i> Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
