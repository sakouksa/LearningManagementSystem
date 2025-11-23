@extends('backend.admin.master')

@section('title', 'LMS Admins Dashboard')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', [
            'title' => 'SubCategories',
            'sub_title' => 'All-SubCategories',
        ])
        {{-- end breadcrumb --}}
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0 text-uppercase">All SubCategories</h5>
            <a href="{{ route('admin.subcategory.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle-fill"></i> Add SubCategory
            </a>
        </div>
        <hr>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th>Create At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <body>
                        @foreach ($all_subcategories as $index => $item)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $item['category']['name'] }}
                                    </span>
                                </td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>
                                    {{-- Edit --}}
                                    <a href="{{ route('admin.subcategory.edit', $item->id) }}"
                                        class="icon-btn text-primary me-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <a href="javascript:void(0)" class="icon-btn text-danger delete-subcategory"
                                        data-id="{{ $item->id }}">
                                        <i class="bi bi-trash3-fill"></i>
                                    </a>

                                    <form action="{{ route('admin.subcategory.destroy', $item->id) }}" method="POST"
                                        id="delete-form-{{ $item->id }}" style="display: none;">
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
        $(document).on('click', '.delete-subcategory', function(e) {
            e.preventDefault();
            let subcategoryId = $(this).data('id');
            Swal.fire({
                html: `
            <div style="text-align:center;">
                <div style="background:rgba(255, 76, 76, 0.1);
                            width:90px; height:90px; border-radius:50%;
                            display:flex; align-items:center; justify-content:center;
                            margin:0 auto 20px;">
                    <i class="bi bi-trash-fill text-danger" style="font-size:3rem;"></i>
                </div>
                <h2 style="font-weight:700; color:#222;">Delete SubCategory?</h2>
                <p style="color:#666; font-size:15px; margin-top:10px;">
                    This action cannot be undone. Are you sure you want to delete this SubCategory?
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
                    confirmButton: 'btn btn-danger', // pink/red button
                    cancelButton: 'btn btn-dark ms-2', // black button with margin
                    popup: 'swal2-border-radius'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form-' + subcategoryId).submit();
                }
            });
        });
    </script>
@endpush
