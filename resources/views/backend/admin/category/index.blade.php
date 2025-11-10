@extends('backend.admin.master')

@section('title', 'LMS Admins Dashboard')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', ['title' => 'Category', 'sub_title' => 'All-Categories'])
        {{-- end breadcrumb --}}
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0 text-uppercase">All Categories</h5>
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle-fill"></i> Add Category
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
                            <th>Action</th>
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
                                        <img src="{{ asset($item->image) }}" width="60" height="60"
                                            style="border-radius: 10px" alt="">
                                    @else
                                        <span>no image found</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                {{-- edit --}}
                                <td>
                                    <a href="{{ route('admin.category.edit', $item->id) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger delete-category"
                                        data-id="{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                        </svg>
                                    </a>
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
