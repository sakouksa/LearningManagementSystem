@extends('backend.instructor.master')

@section('title', 'LMS Instructor Dashboard')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', ['title' => 'Cours', 'sub_title' => 'All-Cours'])
        {{-- end breadcrumb --}}

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0 text-uppercase">All Courses</h5>
            {{-- Button to create new course --}}
            <a href="{{ route('instructor.course.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle-fill"></i> Add Course
            </a>
        </div>
        <hr>

        <div class="card-body">
            <div class="table-responsive">
                {{-- Data Table for Courses --}}
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#No</th>
                            <th>Thumbnail</th>
                            <th>Course Name</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Selling Price</th>
                            <th>Discount Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Iterate through all courses passed from the controller --}}
                        @foreach ($all_courses as $index => $item)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if ($item->course_image)
                                        <img src="{{ asset($item->course_image) }}" width="110" height="60"
                                            style="border-radius: 10px" alt="Course Thumbnail">
                                    @else
                                        <span>no image found</span>
                                    @endif
                                </td>
                                <td>
                                    {{ \Illuminate\Support\Str::limit($item->course_name, 30, '...') }}
                                </td>
                                <td>
                                    {{ $item->category->name ?? '-' }}
                                </td>
                                <td>
                                    {{ $item->subcategory->name ?? '-' }}
                                </td>
                                <td>
                                    ${{ number_format($item->selling_price, 2) }}
                                </td>
                                <td>
                                    ${{ $item->discount_price ? number_format($item->discount_price, 2) : 'N/A' }}
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">

                                        {{-- 1. View Details (Eye Icon - Tabler Icons) --}}
                                        <span style="cursor: pointer;">
                                            <a role="button" tabindex="0" href="javascript:void(0)"
                                                class="rounded-circle btn btn-ghost btn-icon btn-sm text-info show-course-modal"
                                                data-id="{{ $item->id }}"
                                                data-url="{{ route('instructor.course.show', $item->id) }}"
                                                title="View Details">
                                                {{-- Tabler Icon: Eye --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="tabler-icon tabler-icon-eye">
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                    <path
                                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                                    </path>
                                                </svg>
                                            </a>
                                        </span>

                                        {{-- 2. Edit Button (Edit Icon - Tabler Icons) --}}
                                        <span style="cursor: pointer;">
                                            <a role="button" tabindex="0"
                                                href="{{ route('instructor.course.edit', $item->id) }}"
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

                                        {{-- 3. Manage Sections Button (List Icon - Replaced with Tabler Icon equivalent) --}}
                                        <span style="cursor: pointer;">
                                            <a role="button" tabindex="0"
                                                href="{{ route('instructor.course-section.show', $item->id) }}"
                                                class="rounded-circle btn btn-ghost btn-icon btn-sm text-success"
                                                title="Manage Sections">
                                                {{-- Tabler Icon: List Check (Similar to bi-card-checklist) --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="tabler-icon tabler-icon-list-check">
                                                    <path d="M3.5 5.5l1.5 1.5l2.5 -2.5"></path>
                                                    <path d="M3.5 11.5l1.5 1.5l2.5 -2.5"></path>
                                                    <path d="M3.5 17.5l1.5 1.5l2.5 -2.5"></path>
                                                    <path d="M11 6l9 0"></path>
                                                    <path d="M11 12l9 0"></path>
                                                    <path d="M11 18l9 0"></path>
                                                </svg>
                                            </a>
                                        </span>

                                        {{-- 4. Delete Button (Trash Icon - Tabler Icons) --}}
                                        <span style="cursor: pointer;">
                                            <a role="button" tabindex="0" href="javascript:void(0)"
                                                class="rounded-circle btn btn-ghost btn-icon btn-sm text-danger delete-course"
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
                                    <form action="{{ route('instructor.course.destroy', $item->id) }}" method="POST"
                                        id="delete-form-{{ $item->id }}" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- End Page Content --}}

    {{-- 🛑 Course Details Modal Structure --}}
    <div class="modal fade" id="courseDetailsModal" tabindex="-1" aria-labelledby="courseDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="courseDetailsModalLabel">Course Details: <span id="modal-course-name"
                            class="text-primary"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="course-details-content">
                    {{-- Content will be loaded here via AJAX --}}
                    <div class="text-center p-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Loading course details...</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Structure --}}

@endsection

@push('scripts')
    <script>
        // Use jQuery for simplicity with SweetAlert2 and AJAX
        $(document).ready(function() {

            // --- 1. SweetAlert2 Delete Confirmation ---
            $(document).on('click', '.delete-course', function(e) {
                e.preventDefault();
                let courseId = $(this).data('id');

                // SweetAlert2 Configuration for Deletion
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
                        // Submit the hidden DELETE form
                        $('#delete-form-' + courseId).submit();
                    }
                });
            });

            // --- 2. AJAX Load Course Details into Modal ---
            $(document).on('click', '.show-course-modal', function(e) {
                e.preventDefault();
                let courseUrl = $(this).data('url');
                const modalBody = $('#course-details-content');

                // Initialize the Bootstrap Modal
                const modal = new bootstrap.Modal(document.getElementById('courseDetailsModal'));

                // Show spinner while loading
                modalBody.html(`
                    <div class="text-center p-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Loading course details...</p>
                    </div>
                `);

                // Fetch details via AJAX
                $.ajax({
                    url: courseUrl,
                    type: 'GET',
                    beforeSend: function() {
                        // Ensure the modal is visible before loading content
                        modal.show();
                    },
                    success: function(response) {
                        // Assuming the response is the HTML content of the course details
                        modalBody.html(response);

                        // Update the modal title with the course name (assumes course name is found in the fetched HTML content)
                        // Note: A more robust method would be to return the course name in the JSON response
                        const courseName = modalBody.find('.fw-bold:first').text();
                        $('#modal-course-name').text(courseName || 'Course');
                    },
                    error: function(xhr) {
                        modalBody.html(
                            '<div class="alert alert-danger">Error loading course details. Please try again.</div>'
                        );
                        $('#modal-course-name').text('Error');
                        console.error("AJAX Error:", xhr);
                    }
                });
            });
        });
    </script>
@endpush
