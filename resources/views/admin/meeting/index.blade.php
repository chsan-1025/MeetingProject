@extends('admin.layouts.app')
@section('title', 'Categories List')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"></section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Meeting Table</h3>
                            </div>
                            <div class="card-body">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="myTable"
                                                class="table table-bordered table-hover dataTable dtr-inline"
                                                aria-describedby="example2_info">
                                                <thead>
                                                    <tr>
                                                        <th>Meeting Title</th>
                                                        <th>Organizer</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Actions</th>
                                              
                                                    </tr>
                                                </thead>
                                               <tbody>
                                                @forelse ($meetings as $meeting)
                                                <tr>
                                                    <td>{{ $meeting->title }}</td>
                                                    <td>{{ $meeting->organizer }}</td>
                                                    <td>{{ $meeting->start_time }}</td>
                                                    <td>{{ $meeting->end_time }}</td>
                                               
                                                    <td>
                                                    
                                                        <button type="button" name="{{ $meeting->id }}" class="btn btn-danger btn-sm remove-category"><i class="fa fa-times"></i></button>
                                                        <a href="{{ route('admin.meetings.edit',$meeting->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil text-white"></i></a>                           
                                                    </td>
                                                </tr>
                                                @empty
                                                @endforelse
                                               </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')

<script>
    let table = new DataTable('#myTable');
    $(document).ready(function() {
        $(document).on('click', '.remove-category', function() {
            let id = $(this).attr('name');
            Swal.fire({
                title: "Are You Sure?",
                text: "Are you sure you want to delete this Meeting?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                confirmButtonColor: '#28A745',
                cancelButtonText: 'No, cancel!',
                cancelButtonColor: '#DC3545',
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = `{{ URL::to('admin/meetings/destroy/${id}') }}`;
                }
            });
        });
    });

</script>
@endsection
