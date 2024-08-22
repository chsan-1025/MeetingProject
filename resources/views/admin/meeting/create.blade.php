@extends('admin.layouts.app')
@section('title', 'Add New Category')
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
                                <h3 class="card-title">Add New Meeting</h3>
                            </div>
                            <form action="{{ route('admin.meetings.store') }}" method="post">
                                @csrf 
                            
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title" 
                                               value="{{ old('title') }}" 
                                               class="form-control" 
                                               placeholder="Title" 
                                               autofocus 
                                               required>
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            
                                    <div class="row mb-3">
                                        <label for="start_time" class="form-label">Start Time</label>
                                        <input type="datetime-local" name="start_time" id="start_time" 
                                               value="{{ old('start_time') }}" 
                                               class="form-control" 
                                               placeholder="Start Time" 
                                               required>
                                        @error('start_time')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                   
                                    <div class="row mb-3">
                                        <label for="end_time" class="form-label">Start Time</label>
                                        <input type="datetime-local" name="end_time" id="end_time" 
                                               value="{{ old('end_time') }}" 
                                               class="form-control" 
                                               placeholder="End Time" 
                                               required>
                                        @error('end_time')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            
                                    <div class="row mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <select name="department" id="department" class="form-control" required>
                                            <option value="">Select Department</option>
                                            @foreach (App\Enums\DepartmentEnum::getValues() as $value)
                                                <option value="{{ $value }}">{{ ucfirst($value) }}</option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            
                                    <div class="row mb-3">
                                        <label for="participants" class="form-label">Participants</label>
                                        <select name="participants[]" id="participants" class="form-control select2" multiple required>
                                            <!-- Participants will be dynamically populated based on the department -->
                                        </select>
                                        @error('participants')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary px-5" name="action" value="create">Submit</button>
                                </div>
                            </form>
                         
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const departmentSelect = $('#department');
            const participantsSelect = $('#participants');

            departmentSelect.on('change', function () {
                const departmentId = this.value;

                if (departmentId) {
                    $.ajax({
                        url: `/admin/departments/${departmentId}/employees`,
                        method: 'GET',
                        success: function (data) {
                            // Clear previous options
                            participantsSelect.empty();

                            // Populate new options
                            data.forEach(employee => {
                                participantsSelect.append(new Option(employee.name, employee.id));
                            });
                        },
                        error: function (xhr, status, error) {
                            console.error('Error fetching participants:', error);
                        }
                    });
                } else {
                    // Clear participants if no department is selected
                    participantsSelect.empty();
                }
            });
        });
    </script>
@endsection
