@extends('admin.layouts.app')
@section('title', 'Edit Category')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"></section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Employee</h3>
                            </div>
                            <form action="{{ route('admin.employees.update', [$employee->id]) }}" method="post">
                                @csrf <!-- Add CSRF token for security -->
                                @method('PATCH') <!-- Use PATCH method for updating -->
                            
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" 
                                               value="{{ old('name', $employee->user->name) }}" 
                                               class="form-control" 
                                               placeholder="Name" 
                                               autofocus 
                                               required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            
                                    <div class="row mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" 
                                               value="{{ old('email', $employee->user->email) }}" 
                                               class="form-control" 
                                               placeholder="Email" 
                                               required>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            
                                    <div class="row mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <select name="department" id="department" class="form-control" required>
                                            <option value="">Select Department</option>
                                            @foreach (App\Enums\DepartmentEnum::getValues() as $value)
                                                <option value="{{ $value }}" {{ old('department', $employee->department) == $value ? 'selected' : '' }}>
                                                    {{ ucfirst($value) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary px-5">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
