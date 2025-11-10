@extends('backend.instructor.master')

@section('title', 'LMS Instructor Dashboard')

<style>

</style>
@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', ['title' => 'Course', 'sub_title' => 'Add-Courses'])
        {{-- end breadcrumb --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-4">
                        {{-- Header --}}
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="mb-0">Add Course</h5>
                            <a href="{{ route('instructor.course.index') }}"
                                class="btn btn-danger btn-sm d-flex align-items-center gap-1 px-3 py-2 shadow-sm">
                                <i class="bi bi-arrow-left-circle fs-6"></i>
                                <span>Back</span>
                            </a>
                        </div>

                        {{-- form start --}}
                        <form class="row g-3" method="POST" action="{{ route('instructor.course.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- Validation Errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center"
                                    role="alert">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    <div>
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            {{-- end Validation Errors --}}
                            <input type="hidden" name="instructor_id" value="{{ auth()->user()->id }}">
                            {{-- Course name --}}
                            <div class="col-md-6">
                                <label for="name" class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="course_name" id="name"
                                    placeholder="Enter the course name" value="{{ old('course_name') }}" required>
                            </div>
                            {{-- course_name_slug --}}
                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="course_name_slug" id="slug"
                                    placeholder="Enter the slug" value="{{ old('course_name_slug') }}" required>
                            </div>
                            {{-- course_title --}}
                            <div class="col-md-12">
                                <label for="course_title" class="form-label">Course Title</label>
                                <input type="text" class="form-control" name="course_title" id="course_title"
                                    placeholder="Enter the course title" value="{{ old('course_title') }}" required>
                            </div>
                            {{-- Select Category --}}
                            <div class="col-md-6">
                                <label for="category" class="form-label">Select Category</label>
                                <select name="category_id" class="form-select" id="category">
                                    <option value="" selected disabled>Select a Category</option>
                                    @foreach ($all_categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Select Subcategory --}}
                            <div class="col-md-6">
                                <label for="subcategory" class="form-label">Select Subcategory</label>
                                <select name="subcategory_id" class="form-select" id="subcategory">
                                    <option value="" selected disabled>Select a SubCategory</option>
                                    {{-- Dynamically populated via AJAX --}}

                                </select>
                            </div>
                            {{-- image --}}
                            <div class="col-md-6">
                                <label for="course_image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="course_image" id="Photo"
                                    accept="image/">
                                <div style="margin-top: 10px">
                                    <img src="" id="photoPreview" class="img-fuid" alt="No image"
                                        style="margin-top: 15px; display:none;  width:100%; height:auto;">
                                </div>
                            </div>
                            {{-- Resources --}}
                            <div class="col-md-6">
                                <label for="resources" class="form-label">Resources</label>
                                <input class="form-control" type="number" name="resources" id="resources"
                                    placeholder="Enter the Number of download resources" value="{{ old('resources') }}">
                            </div>
                            {{-- Description --}}
                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control editor" required>{{ old('description') }}</textarea>
                            </div>
                            {{-- Youtube Video URL --}}
                            <div class="col-md-6">
                                <label for="video_url" class="form-label">Youtube Video URL</label>
                                <input type="url" class="form-control" name="video_url" id="video_url"
                                    placeholder="Enter the Youtube URL" value="{{ old('video_url') }}" required>
                                <iframe src="" id="videoPriview"
                                    style="margin-top: 15px; display:none; width:100%; height:400px;" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                            {{-- Label --}}
                            <div class="col-md-6">
                                <label for="label" class="form-label">Course Label</label>
                                <select name="label" id="label" class="form-select" required>
                                    <option value="" selected disabled>Select Course Level</option>
                                    <option value="beginner">Beginner</option>
                                    <option value="medium">Medium</option>
                                    <option value="advanced">Advanced</option>
                                </select>
                            </div>
                            {{-- Certificate --}}
                            <div class="col-md-12">
                                <label for="certificate" class="form-label">Certificate</label>
                                <select name="certificate" id="certificate" class="form-select"
                                    data-placeholder="Choose one thing">
                                    <option value="" selected disabled>Select Certificate Option</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            {{-- Selling --}}
                            <div class="col-md-6">
                                <label for="selling_price" class="form-label">Selling Price ($)</label>
                                <input type="number" step="0.01" class="form-control" name="selling_price"
                                    id="selling_price" value="{{ old('selling_price') }}"
                                    placeholder="Enter selling price">
                            </div>
                            {{-- Discount Price --}}
                            <div class="col-md-6">
                                <label for="discount_price" class="form-label">Discount Price ($)</label>
                                <input type="number" step="0.01" class="form-control" name="discount_price"
                                    id="discount_price" value="{{ old('discount_price') }}"
                                    placeholder="Enter discount price">
                            </div>
                            {{-- Prerequisites --}}
                            <div class="col-md-12">
                                <label for="prerequisites" class="form-label">Course Prerequisites</label>
                                <textarea name="prerequisites" id="prerequisites" class="form-control editor"
                                    placeholder="Enter course prerequisites">{{ old('prerequisites') }}</textarea>
                            </div>
                            {{-- course_goal --}}
                            <div class="col-md-12">
                                <label class="form-label">Course Goals</label>
                                <div id="goalContainer" class="d-flex flex-column gap-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="course_goals[]"
                                            placeholder="Enter a course goal">
                                        <button type="button" class="btn btn-primary" id="addGoalInput">
                                            <i class="bi bi-plus-lg"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{-- Options --}}
                            <div class="d-flex align-items-center gap-3 mt-3">

                                {{-- Bestseller --}}
                                <div class="form-check form-check-success">
                                    <input type="hidden" name="bestseller" value="no">
                                    <input class="form-check-input border-success" type="checkbox" id="flexCheckSuccess"
                                        name="bestseller" value="yes"
                                        {{ old('bestseller') == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckSuccess">Bestseller</label>
                                </div>

                                {{-- Featured --}}
                                <div class="form-check form-check-danger">
                                    <input type="hidden" name="featured" value="no">
                                    <input class="form-check-input border-danger" type="checkbox" id="flexCheckDanger"
                                        name="featured" value="yes" {{ old('featured') == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDanger">Featured</label>
                                </div>

                                {{-- Highest Rated --}}
                                <div class="form-check form-check-warning">
                                    <input type="hidden" name="highestrated" value="no">
                                    <input class="form-check-input border-warning" type="checkbox" id="flexCheckWarning"
                                        name="highestrated" value="yes"
                                        {{ old('highestrated') == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckWarning">Highest Rated</label>
                                </div>

                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary btn-sm d-flex align-items-center gap-2 px-3 py-2 shadow-sm">
                                    <i class="bi bi-plus-circle fs-5"></i>
                                    <span>Create </span>
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        @endsection
        @push('scripts')
            <script src="{{ asset('customjs/instructor/course.js') }}"></script>

            <script>
                // YouTube video preview
                document.getElementById('video_url').addEventListener('input', function() {
                    const video_url = this.value.trim();
                    const videoPreview = document.getElementById('videoPriview'); // iframe ID matches HTML

                    if (video_url) {
                        const videoId = extractYouTubeID(video_url);

                        if (videoId) {
                            videoPreview.src = `https://www.youtube.com/embed/${videoId}`;
                            videoPreview.style.display = 'block';
                        } else {
                            alert('Invalid YouTube URL!');
                            videoPreview.style.display = 'none';
                            videoPreview.src = '';
                        }
                    } else {
                        videoPreview.style.display = 'none';
                        videoPreview.src = '';
                    }
                });

                function extractYouTubeID(url) {
                    const regExp = /^.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#&?]*).*/;
                    const match = url.match(regExp);
                    return (match && match[1].length === 11) ? match[1] : null;
                }

                // Image preview
                document.getElementById('Photo').addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    const preview = document.getElementById('photoPreview');

                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        }
                        reader.readAsDataURL(file);
                    } else {
                        preview.src = '';
                        preview.style.display = 'none';
                    }
                });
            </script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Loop all checkboxes
                    document.querySelectorAll(".form-check-input").forEach(function(checkbox) {
                        checkbox.addEventListener("change", function() {
                            // Hidden input is the previous sibling element
                            let hiddenInput = this.previousElementSibling;
                            hiddenInput.value = this.checked ? "yes" : "no";
                        });
                    });
                });
            </script>
        @endpush
