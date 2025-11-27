@extends('backend.admin.master')

@section('title', 'LMS Admins Dashboard')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', ['title' => 'Instructor', 'sub_title' => 'All-Instructor'])
        {{-- end breadcrumb --}}
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0 text-uppercase">Active Instructor</h5>
            <a href="{{ route('admin.instructor.index') }}"
                class="btn btn-danger btn-sm d-flex align-items-center gap-1 px-3 py-2 shadow-sm">
                <i class="bi bi-arrow-left-circle fs-6"></i>
                <span>Back</span>
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
                            <th>Action</th>
                        </tr>

                    </thead>

                    <body>
                        {{-- all categories --}}
                        @foreach ($active_instructors as $index => $item)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ $item->photo ? asset($item->photo) : asset('backend/assets/images/avatars/avatar-1.png') }}"
                                        width="40" height="40" style="border-radius: 10px" alt="Image">
                                </td>

                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
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
    </script>
@endpush
