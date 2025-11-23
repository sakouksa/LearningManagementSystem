@extends('backend.admin.master')

@section('title', 'LMS Admins Dashboard')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', ['title' => 'Instructor', 'sub_title' => 'All-Instructor'])
        {{-- end breadcrumb --}}
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0 text-uppercase">All Instructor</h5>
            </a>
            <a href="{{ route('admin.instructor.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle-fill"></i> Add Instructor
            </a>
        </div>
        <hr>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        {{-- file category --}}
                        <tr>
                            <th>#No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <body>
                        {{-- all categories --}}
                        @foreach ($all_instructors as $index => $item)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ $item->photo ? asset($item->photo) : asset('backend/assets/images/avatars/avatar-1.png') }}"
                                        width="40" height="40" style="border-radius: 40px" alt="Image">
                                </td>

                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                {{-- Status --}}
                                <td>

                                    @if ($item->status == 1)
                                        <span class="badge bg-primary">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                {{-- Change Status --}}
                                <td class="text-center" style="vertical-align: middle;">
                                    <div class="d-flex justify-content-center align-items-center" style="height:100%;">
                                        <div class="form-check form-switch m-0">
                                            <input type="checkbox" class="form-check-input toggle-status" role="switch"
                                                id="flexSwitchCheckDefault{{ $item->id }}"
                                                data-user-id="{{ $item->id }}"
                                                {{ $item->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </td>

                                {{-- Action --}}
                                <td>
                                    <a href="{{ route('admin.instructor.edit', $item->id) }}"
                                        class="icon-btn text-primary me-2">
                                        <i class="bi bi-pencil-square"></i>

                                    </a>
                                    <a href="javascript:void(0)" class="icon-btn text-danger delete-instructor"
                                        data-id="{{ $item->id }}">
                                        <i class="bi bi-trash3-fill"></i>
                                    </a>
                                    <form action="{{ route('admin.instructor.destroy', $item->id) }}" method="POST"
                                        id="delete-form-{{ $item->id }}" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </body>

                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('script')
    <script>
        $('.form-check-input').on('change', function() {
            const userId = $(this).data('user-id'); // Get userId
            const status = $(this).is(':checked') ? 1 : 0; // Get status (1 = Active, 0 = Inactive)
            const row = $(this).closest('tr'); // Get the current table row
            const statusBadge = row.find('td:nth-child(6) .badge'); // Select the badge in the 6th column

            $.ajax({
                url: '{{ route('admin.instructor.status') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: userId,
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        // update badge dynamically
                        if (status === 1) {
                            statusBadge
                                .removeClass('bg-danger')
                                .addClass('bg-primary')
                                .text('Active');
                        } else {
                            statusBadge
                                .removeClass('bg-primary')
                                .addClass('bg-danger')
                                .text('Inactive');
                        }

                        // show SweetAlert2 toast
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        window.location.reload();
                    } else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Error: ' + response.message,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'An error occurred while updating the status',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });
        });

        // Delete Instructor
        $(document).on('click', '.delete-instructor', function(e) {
            e.preventDefault();
            let instructorId = $(this).data('id');
            Swal.fire({
                html: `
            <div style="text-align:center;">
                <div style="background:rgba(255, 76, 76, 0.1);
                            width:90px; height:90px; border-radius:50%;
                            display:flex; align-items:center; justify-content:center;
                            margin:0 auto 20px;">
                    <i class="bi bi-trash-fill text-danger" style="font-size:3rem;"></i>
                </div>
                <h2 style="font-weight:700; color:#222;">Delete Instructor?</h2>
                <p style="color:#666; font-size:15px; margin-top:10px;">
                    This action cannot be undone. Are you sure you want to delete this Instructor?
                </p>
            </div>
        `,
                showCancelButton: true,
                confirmButtonText: '<i class="bi bi-check-circle"></i> Confirm Delete',
                cancelButtonText: '<i class="bi bi-x-circle"></i> Cancel',
                showCloseButton: true,
                focusConfirm: false,
                buttonsStyling: true,
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-dark ms-2',
                    popup: 'swal2-border-radius'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form-' + instructorId).submit();
                }
            });
        });
    </script>
@endpush
