
@extends('admin.layouts.app')
@section('title', 'Edit Meeting')
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
                                <h3 class="card-title">Edit Meeting</h3>
                            </div>
                            <form action="{{ route('admin.meetings.update', $meeting->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title"
                                               value="{{ old('title', $meeting->title) }}"
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
                                               value="{{ old('start_time', $meeting->start_time) }}"
                                               class="form-control"
                                               placeholder="Start Time"
                                               required>
                                        @error('start_time')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                   
                                    <div class="row mb-3">
                                        <label for="end_time" class="form-label">End Time</label>
                                        <input type="datetime-local" name="end_time" id="end_time"
                                               value="{{ old('end_time', $meeting->end_time) }}"
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
                                                <option value="{{ $value }}" {{ $value == old('department', $meeting->department) ? 'selected' : '' }}>
                                                    {{ ucfirst($value) }}
                                                </option>
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const departmentSelect = $('#department');
        const participantsSelect = $('#participants');
        const selectedParticipants = @json($selectedParticipants ?? []); // Ensure this is passed from your controller

        // Function to load participants based on the department ID
        function loadParticipants(departmentId) {
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

                    // Retain the already selected participants
                    selectedParticipants.forEach(id => {
                        participantsSelect.find(`option[value="${id}"]`).prop('selected', true);
                    });

                    participantsSelect.trigger('change');
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching participants:', error);
                }
            });
        }

        // Load participants based on the department when the page loads
        const initialDepartmentId = departmentSelect.val();
        if (initialDepartmentId) {
            loadParticipants(initialDepartmentId);
        }

        // Update participants when department changes
        departmentSelect.on('change', function () {
            const departmentId = this.value;

            if (departmentId) {
                loadParticipants(departmentId);
            } else {
                // Clear participants if no department is selected
                participantsSelect.empty();
            }
        });
    });
</script>

@endsection
