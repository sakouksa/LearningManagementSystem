@extends('backend.instructor.master')

@section('title', 'LMS instructor Dashboard')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', ['title' => 'Cours', 'sub_title' => 'All-Cours'])
        {{-- end breadcrumb --}}
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0 text-uppercase">All Cours</h5>
            <a href="{{ route('instructor.course.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle-fill"></i> Add Course
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
                            <th>Thumbnail</th>
                            <th>Cours Name</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Selling Price</th>
                            <th>Discount Price</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <body>
                        {{-- all cours --}}
                        @foreach ($all_courses as $index => $item)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if ($item->course_image)
                                        <img src="{{ asset($item->course_image) }}" width="110" height="60"
                                            style="border-radius: 10px" alt="">
                                    @else
                                        <span>no image found</span>
                                    @endif
                                </td>
                                <td>
                                    {{ \Illuminate\Support\Str::limit($item->course_name, 30, '...') }}
                                </td>
                                <td>
                                    {{ $item->category->name }}
                                </td>
                                <td>
                                    {{ $item->subcategory->name }}
                                </td>
                                <td>
                                    {{ $item->selling_price }}
                                </td>
                                <td>
                                    {{ $item->discount_price }}
                                </td>
                                {{-- Edit Button --}}
                                <td>
                                    {{-- show course list --}}
                                    <a href="{{ route('instructor.course.show', $item->id) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M8 3c-3.5 0-6.5 3-8 5s4.5 5 8 5 6.5-3 8-5-4.5-5-8-5zm0 8a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                        </svg>
                                    </a>
                                    {{-- Delete Button --}}
                                    {{-- Edit Button --}}
                                    <a href="{{ route('instructor.course.edit', $item->id) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                        </svg>
                                    </a>
                                    {{-- Delete Button --}}
                                    <a href="javascript:void(0)" class="btn btn-danger delete-course"
                                        data-id="{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                        </svg>
                                    </a>
                                    {{-- Section Button --}}
                                    <a href="{{ route('instructor.course-section.show', $item->id) }}"
                                        class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-card-heading" viewBox="0 0 16 16">
                                            <path
                                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                                            <path
                                                d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('instructor.course.destroy', $item->id) }}" method="POST"
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
    {{-- End Page Content --}}

    </div>

@endsection
@push('script')
    <script>
        // Delete Course with SweetAlert2
        $(document).on('click', '.delete-course', function(e) {
            e.preventDefault();
            let courseId = $(this).data('id');
            Swal.fire({
                html: `
            <div style="text-align:center;">
                <div style="background:rgba(255, 76, 76, 0.1);
                            width:90px; height:90px; border-radius:50%;
                            display:flex; align-items:center; justify-content:center;
                            margin:0 auto 20px;">
                    <i class="bi bi-trash-fill text-danger" style="font-size:3rem;"></i>
                </div>
                <h2 style="font-weight:700; color:#222;">Delete Course?</h2>
                <p style="color:#666; font-size:15px; margin-top:10px;">
                    This action cannot be undone. Are you sure you want to delete this Course?
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
                    $('#delete-form-' + courseId).submit();
                }
            });
        });
    </script>
@endpush
