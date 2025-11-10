@extends('backend.instructor.master')

@section('title', 'LMS Instructor Dashboard')

<style>

</style>
@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', ['title' => 'Course', 'sub_title' => 'Update-Courses'])
        {{-- end breadcrumb --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-4">
                        {{-- Header --}}
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="mb-0">Updated Course</h5>
                            <a href="{{ route('instructor.course.index') }}"
                                class="btn btn-danger btn-sm d-flex align-items-center gap-1 px-3 py-2 shadow-sm">
                                <i class="bi bi-arrow-left-circle fs-6"></i>
                                <span>Back</span>
                            </a>
                        </div>

                        {{-- form start --}}
                        <form class="row g-3" method="POST" action="{{ route('instructor.course.update', $course->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                <input type="text" name="course_name" id="name" class="form-control"
                                    value="{{ old('course_name', $course->course_name) }}" required>
                            </div>
                            {{-- course_name_slug --}}
                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="course_name_slug" id="slug"
                                    placeholder="Enter the slug"
                                    value="{{ old('course_name_slug', $course->course_name_slug) }}" required>
                            </div>
                            {{-- course_title --}}
                            <div class="col-md-12">
                                <label for="course_title" class="form-label">Course Title</label>
                                <input type="text" class="form-control" name="course_title" id="course_title"
                                    placeholder="Enter the course title"
                                    value="{{ old('course_title', $course->course_title) }}" required>
                            </div>
                            {{-- Select Category --}}
                            <div class="col-md-6">
                                <label for="category" class="form-label">Select Category</label>
                                <select name="category_id" class="form-select" id="category">
                                    <option value="" selected disabled>--Select a Category--</option>
                                    @foreach ($all_categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $course->category_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                    @endforeach
                                </select>
                            </div>
                            {{-- Select Subcategory --}}
                            <div class="col-md-6">
                                <label for="subcategory" class="form-label">Select Subcategory</label>
                                <select name="subcategory_id" class="form-select" id="subcategory">
                                    <option value="{{ $course->subcategory_id }}" selected>
                                        {{ $course->subcategory['name'] }}</option>
                                    {{-- Dynamically populated via AJAX --}}

                                </select>
                            </div>
                            {{-- image --}}
                            {{-- image --}}
                            <div class="col-md-6">
                                <label for="course_image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="course_image" id="Photo"
                                    accept="image/">
                                <div style="margin-top: 10px">
                                    <img src="{{ asset($course->course_image) }}" id="photoPreview" class="img_fluid"
                                        style="margin-top: 15px" width="100%" height="auto"
                                        {{ $course->course_image ? '' : 'display:none' }} alt="">
                                </div>
                            </div>
                            {{-- Resources --}}
                            <div class="col-md-6">
                                <label for="resources" class="form-label">Resources</label>
                                <input class="form-control" type="number" name="resources" id="resources"
                                    placeholder="Enter the Number of download resources"
                                    value="{{ old('resources', $course->resources) }}">
                            </div>
                            {{-- Description --}}
                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control editor" required>{{ old('description', $course->description) }}</textarea>
                            </div>
                            {{-- Youtube Video URL --}}
                            <div class="col-md-6">
                                <label for="video_url" class="form-label">Youtube Video URL</label>
                                <input type="url" class="form-control" name="video_url" id="video_url"
                                    placeholder="Enter the Youtube URL"
                                    value="{{ old('video_url', $course->video_url) }}" required>
                                <iframe src="" id="videoPriview"
                                    style="margin-top: 15px; display:none; width:100%; height:400px;" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                            {{-- Label --}}
                            <div class="col-md-6">
                                <label for="label" class="form-label">Course Label</label>
                                <select name="label" id="label" class="form-select" required>
                                    <option value="" selected disabled>Select</option>

                                    <option value="beginner" {{ $course->label == 'beginner' ? 'selected' : '' }}>Beginner
                                    </option>
                                    <option value="medium" {{ $course->label == 'medium' ? 'selected' : '' }}>Medium
                                    </option>
                                    <option value="advanced" {{ $course->label == 'advanced' ? 'selected' : '' }}>Advanced
                                    </option>
                                </select>
                            </div>
                            {{-- Certificate --}}
                            <div class="col-md-12">
                                <label for="certificate" class="form-label">Certificate</label>
                                <select name="certificate" id="certificate" class="form-select"
                                    data-placeholder="Choose one thing">
                                    <option value="" selected disabled>Select</option>
                                    <option value="yes" {{ $course->certificate == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no" {{ $course->certificate == 'no' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                            {{-- Selling --}}
                            <div class="col-md-6">
                                <label for="selling_price" class="form-label">Selling Price ($)</label>
                                <input type="number" step="0.01" class="form-control" name="selling_price"
                                    id="selling_price" value="{{ old('selling_price', $course->selling_price) }}"
                                    placeholder="Enter selling price">
                            </div>
                            {{-- Discount Price --}}
                            <div class="col-md-6">
                                <label for="discount_price" class="form-label">Discount Price ($)</label>
                                <input type="number" step="0.01" class="form-control" name="discount_price"
                                    id="discount_price" value="{{ old('discount_price', $course->discount_price) }}"
                                    placeholder="Enter discount price">
                            </div>
                            {{-- Prerequisites --}}
                            <div class="col-md-12">
                                <label for="prerequisites" class="form-label">Course Prerequisites</label>
                                <textarea name="prerequisites" id="prerequisites" class="form-control editor"
                                    placeholder="Enter course prerequisites">{{ old('prerequisites', $course->prerequisites) }}</textarea>
                            </div>
                            {{-- course_goal --}}
                            <div class="col-md-12">
                                <label for="course_goal" class="form-label"
                                    style="display: flex; align-items: center justify-content: space-between">
                                    Course Goal
                                    <button type="button" class="btn btn-primary" id="addGoalInput"><i
                                            class="bi bi-plus-lg"></i></button>
                                </label>
                                <div id="goalContainer" class="d-flex flex-column gap-2">
                                    @foreach ($course_goals as $data)
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="course_goals[]"
                                                value="{{ $data->goal_name }}" placeholder="Enter a course goal">
                                            <button type="button" class="btn btn-primary" id="addGoalInput">
                                                <i class="bi bi-plus-lg"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- Options --}}
                            <div class="d-flex align-items-center gap-3 mt-3">

                                <div class="form-check form-check-success">
                                    <input type="hidden" name="bestseller" value="no">
                                    <input class="form-check-input border-success" type="checkbox" id="flexCheckSuccess"
                                        name="bestseller" value="yes"
                                        {{ old('bestseller', $course->bestseller ?? 'no') == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckSuccess">Bestseller</label>
                                </div>

                                <div class="form-check form-check-danger">
                                    <input type="hidden" name="featured" value="no">
                                    <input class="form-check-input border-danger" type="checkbox" id="flexCheckDanger"
                                        name="featured" value="yes"
                                        {{ old('featured', $course->featured ?? 'no') == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDanger">Featured</label>
                                </div>

                                <div class="form-check form-check-warning">
                                    <input type="hidden" name="highestrated" value="no">
                                    <input class="form-check-input border-warning" type="checkbox" id="flexCheckWarning"
                                        name="highestrated" value="yes"
                                        {{ old('highestrated', $course->highestrated ?? 'no') == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckWarning">Highest Rated</label>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary btn-sm d-flex align-items-center gap-2 px-3 py-2 shadow-sm">
                                    <i class="bi bi-pencil-square fs-5"></i>
                                    <span>Update</span>
                                </button>
                            </div>
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
                showVideoPreview(this.value);
            });

            function extractYouTubeID(url) {
                const regExp = /^.*(?:youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#&?]*).*/;
                const match = url.match(regExp);
                return (match && match[1].length === 11) ? match[1] : null;
            }

            function showVideoPreview(video_url) {
                const videoPreview = document.getElementById('videoPriview');

                if (video_url) {
                    const videoId = extractYouTubeID(video_url);
                    if (videoId) {
                        videoPreview.src = `https://www.youtube.com/embed/${videoId}`;
                        videoPreview.style.display = 'block';
                    } else {
                        videoPreview.style.display = 'none';
                        videoPreview.src = '';
                    }
                } else {
                    videoPreview.style.display = 'none';
                    videoPreview.src = '';
                }
            }

            // ✅ Auto preview when editing
            document.addEventListener("DOMContentLoaded", function() {
                const existingUrl = document.getElementById('video_url').value.trim();
                if (existingUrl !== '') {
                    showVideoPreview(existingUrl);
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
