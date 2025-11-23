@extends('backend.admin.master')

@section('title', 'LMS Admins Dashboard')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', ['title' => 'Category', 'sub_title' => 'Update-Categories'])
        {{-- end breadcrumb --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-4">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <h5 class="mb-4">Update Category</h5>
                            <a href="{{ route('admin.category.index') }}"
                                class="btn btn-danger btn-sm d-flex align-items-center gap-1 px-3 py-2 shadow-sm">
                                <i class="bi bi-arrow-left-circle fs-6"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        {{-- form start --}}
                        <form class="row g-3" method="POST" action="{{ route('admin.category.update', $category->id) }}"
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
                            {{-- name --}}
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $category->name }}" placeholder="Category Name">
                            </div>
                            {{-- slug --}}
                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    value="{{ $category->slug }}" placeholder="Create Unique Slug">
                            </div>

                            {{-- Image Upload --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Category Image</label>

                                <div class="upload-box text-center p-4 rounded-4 border shadow-sm position-relative"
                                    style="cursor: pointer; transition: 0.3s;"
                                    onmouseover="this.style.background='#e9f5ff';"
                                    onmouseout="this.style.background='#fff';"
                                    onclick="document.getElementById('Photo').click()">

                                    <input type="file" name="photo" id="Photo" accept="image/*" class="d-none">

                                    <i class="bi bi-cloud-arrow-up-fill fs-1 text-primary"></i>

                                    <p class="mt-2 mb-0 fw-semibold text-secondary">Click to Upload Image</p>
                                    <span class="text-muted" style="font-size: 13px;">(JPG/PNG - Max 5MB)</span>

                                    {{-- Optional: Hover overlay icon --}}
                                    <div class="position-absolute top-0 start-0 w-100 h-100 rounded-4"
                                        style="pointer-events: none;"></div>
                                </div>
                            </div>

                            {{-- Image Preview --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Preview</label>
                                <div id="previewContainer"
                                    class="border rounded-4 p-2 shadow-sm d-flex justify-content-center align-items-center"
                                    style="width: 100%; height: 280px; background: #f8f9fa;">
                                    <img src="{{ $category->image ? asset($category->image) : '' }}" id="photoPreview"
                                        class="rounded-4"
                                        style="display: {{ $category->image ? 'block' : 'none' }}; width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
    

                            {{-- submit button --}}
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary btn-sm d-flex align-items-center gap-1 px-3 py-2 shadow-sm"
                                    style="transition: 0.3s;">
                                    <i class="bi bi-pencil-square fs-6"></i>
                                    <span>Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endsection
            @push('scripts')
                <script src="{{ asset('customjs/admin/category.js') }}"></script>
            @endpush
