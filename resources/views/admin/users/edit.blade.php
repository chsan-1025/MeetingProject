@extends('admin.layouts.master')
@section('title', 'Edit User')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ URL::to('admin/user-management/' . $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">


                            <div class="d-flex justify-content-start align-items-center m-2">
                                <a class="btn btn-info mr-2" href="{{ route('admin.user-management.index') }}">
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                                <div class="card-title"><b>User Management</b>/<small>Edit user</small></div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="first_name">First Name *</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control"
                                            autofocus required placeholder="First Name" value="{{ $user->first_name }}">
                                        @error('first_name')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="last_name">Last Name *</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control"
                                            placeholder="Last Name" required value="{{ $user->last_name }}">
                                        @error('last_name')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <label for="email">Email Address *</label>
                                        <input type="email" name="email" id="email" class="form-control" required
                                            placeholder="example@example.com" value="{{ $user->email }}" disabled>
                                        @error('email')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <label for="phone">Phone Number *</label>
                                        <input type="text" name="phone" id="phone" class="form-control" required
                                            placeholder="Phone Number" value="{{ $user->phone }}">
                                        @error('phone')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <label for="new_password">New Password</label>
                                        <input type="text" name="new_password" id="new_password" class="form-control"
                                            placeholder="Enter New Password">
                                        @error('new_password')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <label for="role">Role *</label>
                                        <select name="role" id="role" class="form-control select2" required>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}"
                                                    {{ $role->name == $user->role ? 'selected' : '' }}>
                                                    {{ explode("-",$role->name)[1] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info pl-5 pr-5" name="action" value="update">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('content')
    <script>
        // --------------------- Only Numbers are allowed in PhoneNo ------------------------
        $(document).ready(function() {
            $('#phone').on('keydown', function(e) {
                // Allow: backspace, delete, tab, escape, enter, and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A/Ctrl+C/Ctrl+V
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    (e.keyCode == 67 && e.ctrlKey === true) ||
                    (e.keyCode == 86 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }

                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode >
                        105)) {
                    e.preventDefault();
                }
            });
        });
        // --------------------- Only Numbers are allowed in PhoneNo End Here ------------------------
    </script>
@endsection
