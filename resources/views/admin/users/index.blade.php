@extends('admin.layouts.master')
@section('title', 'Users List')
@section('content')
    <style>
        .table td,
        .table th {
            vertical-align: initial;
        }
    </style>
    <section class="content-header"></section>

    <section class="content">
        <div class="car">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title ml-2"><b>Users</b></div>
                            @can('create-admin-user')
                                <a href="{{ URL::to('admin/user-management/create') }}" class="btn btn-info float-right"><i
                                        class="fa fa-plus"></i> Add New Users</a>
                            @endcan
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>PhoneNo</th>
                                        <th>Role</th>
                                        @canAny('update-admin-user', 'delete-admin-user')
                                            <th>Action</th>
                                        @endcanAny
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->full_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                <span class="text-success font-weight-bold">
                                                    @if ($user->roles->isNotEmpty())
                                                    {{ explode('-',$user->roles[0]->name)[1] }}
                                                @else
                                                    You don't have a role
                                                @endif
                                                </span>
                                            </td>
                                            <td>
                                                @can('update-admin-user')
                                                    <a href="{{ URL::to('admin/user-management/' . $user->id . '/edit') }}"
                                                        class=" btn-sm"><svg width="36" height="36" viewBox="0 0 36 36"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="36" height="36" rx="4" fill="#0084D4" />
                                                            <g clip-path="url(#clip0_2564_2711)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M23.25 11.3787C23.0699 11.3787 22.8916 11.4141 22.7252 11.483C22.5589 11.552 22.4077 11.653 22.2803 11.7803L12.2962 21.7645L11.5689 24.4311L14.2355 23.7038L24.2197 13.7197C24.347 13.5923 24.448 13.4411 24.517 13.2748C24.5859 13.1084 24.6213 12.9301 24.6213 12.75C24.6213 12.5699 24.5859 12.3916 24.517 12.2252C24.448 12.0588 24.347 11.9077 24.2197 11.7803C24.0923 11.653 23.9412 11.552 23.7748 11.483C23.6084 11.4141 23.4301 11.3787 23.25 11.3787ZM22.1512 10.0972C22.4996 9.95293 22.873 9.87866 23.25 9.87866C23.6271 9.87866 24.0005 9.95293 24.3488 10.0972C24.6972 10.2415 25.0137 10.453 25.2803 10.7197C25.547 10.9863 25.7585 11.3028 25.9028 11.6512C26.0471 11.9995 26.1213 12.3729 26.1213 12.75C26.1213 13.127 26.0471 13.5004 25.9028 13.8488C25.7585 14.1972 25.547 14.5137 25.2803 14.7803L15.1553 24.9053C15.0631 24.9976 14.9483 25.0642 14.8224 25.0986L10.6974 26.2236C10.4377 26.2944 10.16 26.2206 9.96969 26.0303C9.77937 25.84 9.70563 25.5623 9.77644 25.3026L10.9014 21.1776C10.9358 21.0517 11.0024 20.9369 11.0947 20.8447L21.2197 10.7197C21.4863 10.453 21.8028 10.2415 22.1512 10.0972Z"
                                                                    fill="white" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_2564_2711">
                                                                    <rect width="18" height="18" fill="white"
                                                                        transform="translate(9 9)" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg></a>
                                                @endcan
                                                @can('delete-admin-user')
                                                    <a href="javascript:void(0)" class=" remove-user"
                                                        name="{{ $user->id }}"><svg width="36" height="36"
                                                            viewBox="0 0 36 36" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="36" height="36" rx="4" fill="#FF7E7E" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.66602 12.9998C9.66602 12.5396 10.0391 12.1665 10.4993 12.1665H25.4993C25.9596 12.1665 26.3327 12.5396 26.3327 12.9998C26.3327 13.4601 25.9596 13.8332 25.4993 13.8332H10.4993C10.0391 13.8332 9.66602 13.4601 9.66602 12.9998Z"
                                                                fill="white" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M16.334 10.5002C16.113 10.5002 15.901 10.588 15.7447 10.7442C15.5884 10.9005 15.5007 11.1125 15.5007 11.3335V13.0002C15.5007 13.4604 15.1276 13.8335 14.6673 13.8335C14.2071 13.8335 13.834 13.4604 13.834 13.0002V11.3335C13.834 10.6705 14.0974 10.0346 14.5662 9.56573C15.0351 9.09689 15.6709 8.8335 16.334 8.8335H19.6673C20.3304 8.8335 20.9662 9.09689 21.4351 9.56573C21.9039 10.0346 22.1673 10.6705 22.1673 11.3335V13.0002C22.1673 13.4604 21.7942 13.8335 21.334 13.8335C20.8737 13.8335 20.5007 13.4604 20.5007 13.0002V11.3335C20.5007 11.1125 20.4129 10.9005 20.2566 10.7442C20.1003 10.588 19.8883 10.5002 19.6673 10.5002H16.334ZM12.1673 12.1668C12.6276 12.1668 13.0007 12.5399 13.0007 13.0002V24.6668C13.0007 24.8878 13.0884 25.0998 13.2447 25.2561C13.401 25.4124 13.613 25.5002 13.834 25.5002H22.1673C22.3883 25.5002 22.6003 25.4124 22.7566 25.2561C22.9129 25.0998 23.0007 24.8878 23.0007 24.6668V13.0002C23.0007 12.5399 23.3737 12.1668 23.834 12.1668C24.2942 12.1668 24.6673 12.5399 24.6673 13.0002V24.6668C24.6673 25.3299 24.4039 25.9658 23.9351 26.4346C23.4662 26.9034 22.8304 27.1668 22.1673 27.1668H13.834C13.1709 27.1668 12.5351 26.9034 12.0662 26.4346C11.5974 25.9658 11.334 25.3299 11.334 24.6668V13.0002C11.334 12.5399 11.7071 12.1668 12.1673 12.1668Z"
                                                                fill="white" />
                                                        </svg>
                                                    </a>
                                                @endcan
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
        <div class="card-footer clearfix rights">
            {!! $users->links('pagination::bootstrap-5') !!}
        </div>
    </section>
@endsection
@section('scripts')
    <!-- User Remove | Swal Notification-->
    <script>
        $(document).ready(function() {
            $(document).on('click', '.remove-user', function() {
                let id = $(this).attr('name');
                Swal.fire({
                    title: "Are You Sure?",
                    text: "Are you sure you want to delete this user?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    confirmButtonColor: '#28A745',
                    cancelButtonText: 'No, cancel!',
                    cancelButtonColor: '#DC3545',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = `{{ URL::to('admin/user-management/destroy/${id}') }}`;
                    }
                });
            });
        });
    </script>
@endsection
