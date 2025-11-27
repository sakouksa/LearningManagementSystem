@extends('backend.admin.master')

@section('title', 'LMS Admins Dashboard')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', ['title' => 'Category', 'sub_title' => 'All-Categories'])
        {{-- end breadcrumb --}}
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0 text-uppercase">All Categories</h5>
            <a href="{{ route('admin.category.create') }}" class="d-md-flex align-items-center gap-2 btn btn-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="tabler-icon tabler-icon-plus ">
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>
                Add Category
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>

                    </thead>

                    <body>
                        {{-- all categories --}}
                        @foreach ($all_categories as $index => $item)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset($item->image) }}" width="40" height="40"
                                            style="border-radius: 10px" alt="">
                                    @else
                                        <span>no image found</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        {{-- 1. Edit Button (Edit Icon - Tabler Icons) --}}
                                        <span style="cursor: pointer;">
                                            <a role="button" tabindex="0"
                                                href="{{ route('admin.category.edit', $item->id) }}"
                                                class="rounded-circle btn btn-ghost btn-icon btn-sm text-primary"
                                                title="Edit">
                                                {{-- Tabler Icon: Edit --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="tabler-icon tabler-icon-edit">
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                    </path>
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                    </path>
                                                    <path d="M16 5l3 3"></path>
                                                </svg>
                                            </a>
                                        </span>

                                        {{-- 2. Delete Button (Trash Icon - Tabler Icons) --}}
                                        <span style="cursor: pointer;">
                                            <a role="button" tabindex="0" href="javascript:void(0)"
                                                class="rounded-circle btn btn-ghost btn-icon btn-sm text-danger delete-category"
                                                data-id="{{ $item->id }}" title="Delete">
                                                {{-- Tabler Icon: Trash --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="tabler-icon tabler-icon-trash">
                                                    <path d="M4 7l16 0"></path>
                                                    <path d="M10 11l0 6"></path>
                                                    <path d="M14 11l0 6"></path>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                            </a>
                                        </span>
                                    </div>

                                    {{-- Hidden Delete Form (Still required for delete functionality) --}}
                                    <form action="{{ route('admin.category.destroy', $item->id) }}" method="POST"
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
        $(document).on('click', '.delete-category', function(e) {
            e.preventDefault();
            let categoryId = $(this).data('id');
            Swal.fire({
                html: `
            <div style="text-align:center;">
                <div style="background:rgba(255, 76, 76, 0.1);
                            width:90px; height:90px; border-radius:50%;
                            display:flex; align-items:center; justify-content:center;
                            margin:0 auto 20px;">
                    <i class="bi bi-trash-fill text-danger" style="font-size:3rem;"></i>
                </div>
                <h2 style="font-weight:700; color:#222;">Delete Category?</h2>
                <p style="color:#666; font-size:15px; margin-top:10px;">
                    This action cannot be undone. Are you sure you want to delete this Category?
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
                    $('#delete-form-' + categoryId).submit();
                }
            });
        });
    </script>
@endpush
