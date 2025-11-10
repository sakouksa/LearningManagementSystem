@extends('backend.instructor.master')

@section('title', 'LMS instructor Dashboard')
<link href="https://fonts.googleapis.com/css2?family=Battambang&display=swap" rel="stylesheet">

@section('content')

    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', ['title' => 'Cours', 'sub_title' => 'Sections'])
        {{-- end breadcrumb --}}
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0 text-uppercase">All Content Section</h5>
                    <a href="{{ route('instructor.course.index') }}" class="btn btn-danger">
                        <i class="bi bi-arrow-left-circle fs-6"></i>
                        <span>Back</span>
                    </a>
                </div>
                <hr>
                <div class="card radius-10 col-lg-12">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset($course->course_image) }}" class="rounded-circle p-1 border" width="90"
                                height="90" alt="Course image">
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mt-0">{{ $course->course_name }}</h6>
                                <p>{{\Illuminate\Support\Str::limit($course->course_title,125)}}</p>
                            </div>
                            <div>
                                {{-- Add modal section --}}
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSectionModal">
                                    <i class="bi bi-plus-circle"></i> Add Section
                                </button>
                            </div>
                        </div>
                        <!-- Include modal -->
                        @include('backend.instructor.course-section.modal.create_section_model')
                    </div>
                </div>
                @foreach ($course_wise_lecture as $data)
                    <div class="card radius-10">
                        <div class="card-body">
                            {{-- Secctin --}}
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <svg style="cursor: pointer" data-bs-toggle="collapse"
                                        data-bs-target="#demo{{ $data->id }}" fill="currentColor"
                                        class="bi bi-plus-circle" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                                        width="30" height="30" fill="currentColor" class="bi bi-plus-circle"
                                        viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                    </svg>
                                    <div class="ms-3">
                                        <h6 class="mt-0 mb-0">{{ $data->section_title }}</h6>
                                    </div>

                                </div>
                                <div style="display:flex; align-item:center;gap:10">
                                    {{-- Add Lecture Modal --}}
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#course-{{ $data->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                        </svg>
                                    </button>
                                    {{-- End Add Lecture Modal --}}
                                    {{-- Delete Course Secction --}}
                                    <div class="">
                                        <a href="javascript:void(0)" class="btn btn-danger delete-section"
                                            data-id="{{ $data->id }}" style="margin-left: 10px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                            </svg>
                                        </a>

                                        <form id="delete-form-{{ $data->id }}"
                                            action="{{ route('instructor.course-section.destroy', $data->id) }}"
                                            method="POST" style="display: none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                    {{-- End Delete Course Secction --}}
                                </div>
                            </div>
                            {{-- end Secctin --}}
                            {{-- Lecture --}}
                            <hr>
                            <div class="mt-3 collapse show" id="demo{{ $data->id }}">
                                @foreach ($data['lecture'] as $lecture)
                                    <div style="display:flex; align-item:center; justify-content:space-between">
                                        <div style="display:flex; gap:10px">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-play-fill text-primary"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                                                </svg>
                                            </span>
                                            <p>{{ $lecture->lecture_title }}</p>
                                        </div>

                                        {{-- Edit and Delete Lecture --}}
                                        <div>
                                            {{-- Edit Lecture --}}
                                            <a class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#course-edit-{{ $lecture->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg>
                                            </a>

                                            {{-- Delete Lecture --}}
                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-lecture"
                                                data-id="{{ $lecture->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                </svg>
                                            </a>

                                            {{-- Hidden Delete Form Lecture --}}
                                            <form id="delete-lecture-form-{{ $lecture->id }}"
                                                action="{{ route('instructor.lecture.destroy', $lecture->id) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                        @include('backend.instructor.course-section.modal.lecture-edit-modal')
                                        {{-- end Edit and Delete Lecture --}}
                                    </div>
                                @endforeach

                            </div>
                            {{-- Lecture --}}

                        </div>

                    </div>
                    {{-- Add Course modal --}}
                    @include('backend.instructor.course-section.modal.lecture-create-modal')
                @endforeach
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.delete-section', function(e) {
            e.preventDefault();
            let Id = $(this).data('id');

            Swal.fire({
                html: `
            <div style="text-align:center;">
                <div style="background:rgba(255, 76, 76, 0.1);
                            width:90px; height:90px; border-radius:50%;
                            display:flex; align-items:center; justify-content:center;
                            margin:0 auto 20px;">
                    <i class="bi bi-trash-fill text-danger" style="font-size:3rem;"></i>
                </div>
                <h2 style="font-weight:700; color:#222;">Delete Section?</h2>
                <p style="color:#666; font-size:15px; margin-top:10px;">
                    This action cannot be undone. Are you sure you want to delete this Course Section?
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
                    $('#delete-form-' + Id).submit();
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.delete-lecture', function(e) {
            e.preventDefault();
            let Id = $(this).data('id');

            Swal.fire({
                html: `
            <div style="text-align:center;">
                <div style="background:rgba(255, 76, 76, 0.1);
                            width:90px; height:90px; border-radius:50%;
                            display:flex; align-items:center; justify-content:center;
                            margin:0 auto 20px;">
                    <i class="bi bi-trash-fill text-danger" style="font-size:3rem;"></i>
                </div>
                <h2 style="font-weight:700; color:#222;">Delete Lecture?</h2>
                <p style="color:#666; font-size:15px; margin-top:10px;">
                    This action cannot be undone. Are you sure you want to delete this Course Lecture?
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
                    $('#delete-lecture-form-' + Id).submit();
                }
            });
        });
    </script>
@endpush
