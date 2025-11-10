{{-- course show list --}}
@extends('backend.instructor.master')
@section('title', 'LMS Instructor Dashboard - Course Details')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', [
            'title' => 'Course Details',
            'sub_title' => 'Course-Details',
        ])
        {{-- end breadcrumb --}}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-4">
                        {{-- Header --}}
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h5 class="mb-0">Course Details</h5>
                            <a href="{{ route('instructor.course.index') }}"
                                class="btn btn-danger btn-sm d-flex align-items-center gap-1 px-3 py-2 shadow-sm">
                                <i class="bi bi-arrow-left-circle fs-6"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        {{-- Course Details Card --}}
                        <div class="card shadow-sm mb-4 border-0">
                            <div class="card-body">
                                <div class="row g-4">

                                    {{-- Course Name --}}
                                    <div class="col-md-6">
                                        <h6 class="text-muted small mb-1">Course Name</h6>
                                        <p class="fw-bold mb-0">{{ $course->course_name }}</p>
                                    </div>

                                    {{-- Course Title --}}
                                    <div class="col-md-6">
                                        <h6 class="text-muted small mb-1">Course Title</h6>
                                        <p class="mb-0">{{ $course->course_title }}</p>
                                    </div>

                                    {{-- Category --}}
                                    <div class="col-md-6">
                                        <h6 class="text-muted small mb-1">Category</h6>
                                        <span class="badge bg-info text-dark">{{ $course->category->name ?? '-' }}</span>
                                    </div>

                                    {{-- Subcategory --}}
                                    <div class="col-md-6">
                                        <h6 class="text-muted small mb-1">Subcategory</h6>
                                        <span class="badge bg-secondary">{{ $course->subcategory->name ?? '-' }}</span>
                                    </div>

                                    {{-- Selling & Discount Price --}}
                                    <div class="col-md-4">
                                        <h6 class="text-muted small mb-1">Selling Price</h6>
                                        <p class="text-success fw-bold mb-0">${{ $course->selling_price }}</p>
                                    </div>
                                    {{-- Discount price --}}
                                    <div class="col-md-4">
                                        <h6 class="text-muted small mb-1">Discount Price</h6>
                                        <p class="text-danger fw-bold mb-0">${{ $course->discount_price }}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <h6 class="text-muted small mb-1">Discount %</h6>
                                        <p class="text-danger fw-bold mb-0">
                                            {{ $course->discount_price ? round((($course->selling_price - $course->discount_price) / $course->selling_price) * 100) : 0 }}%
                                        </p>
                                    </div>

                                    {{-- Description --}}
                                    <div class="col-12">
                                        <h6 class="text-muted small mb-1">Description</h6>
                                        <p class="border rounded p-3 bg-light mb-0">{!! $course->description !!}</p>
                                    </div>

                                    {{-- Prerequisites --}}
                                    <div class="col-12">
                                        <h6 class="text-muted small mb-1">Prerequisites</h6>
                                        <p class="border rounded p-3 bg-light mb-0">{!! $course->prerequisites !!}</p>
                                    </div>

                                    {{-- Course Image --}}
                                    <div class="col-md-6">
                                        <h6 class="text-muted small mb-1">Course Image</h6>
                                        @if ($course->course_image)
                                            <img src="{{ asset($course->course_image) }}" alt="Course Image"
                                                class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                                        @else
                                            <p class="text-muted mb-0">N/A</p>
                                        @endif
                                    </div>

                                    {{-- Youtube Video --}}
                                    <div class="col-md-6">
                                        <h6 class="text-muted small mb-1">Youtube Video</h6>
                                        @if ($course->video_url)
                                            <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm">
                                                <iframe
                                                    src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::afterLast($course->video_url, 'v=') }}"
                                                    title="Course Video" allowfullscreen></iframe>
                                            </div>
                                        @else
                                            <p class="text-muted mb-0">N/A</p>
                                        @endif
                                    </div>

                                    {{-- Badges --}}
                                    <div class="col-md-4">
                                        <h6 class="text-muted small mb-1">Label</h6>
                                        <span class="badge bg-warning text-dark">{{ ucfirst($course->label) }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="text-muted small mb-1">Certificate</h6>
                                        <span class="badge bg-success">{{ ucfirst($course->certificate) }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="text-muted small mb-1">Resources</h6>
                                        <span class="badge bg-info">{{ $course->resources }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="text-muted small mb-1">Bestseller</h6>
                                        <span class="badge bg-danger">{{ ucfirst($course->bestseller) }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="text-muted small mb-1">Featured</h6>
                                        <span class="badge bg-primary">{{ ucfirst($course->featured) }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="text-muted small mb-1">Highest Rated</h6>
                                        <span class="badge bg-secondary">{{ ucfirst($course->highestrated) }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Function to extract YouTube Video ID
            function extractYouTubeID(url) {
                const regExp = /^.*(?:youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#&?]*).*/;
                const match = url.match(regExp);
                return (match && match[1].length === 11) ? match[1] : null;
            }
        });
    </script>
@endpush
