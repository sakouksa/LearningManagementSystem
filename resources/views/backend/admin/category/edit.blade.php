@extends('backend.admin.master')

@section('title', 'LMS Admins Dashboard')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', ['title' => 'Category', 'sub_title' => 'Update-Categories'])
        {{-- end breadcrumb --}}
        <div class="row">
            <div class="col-md-8">
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
                            {{-- image --}}
                            <div class="col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="Photo">
                            </div>
                            <div class="col-md-6">
                                <img src="{{ $category->image ? asset($category->image) : '' }}" id="photoPreview"
                                    width="80" height="80"
                                    style="margin-top:15px; border:1px solid #ddd; border-radius:6px; padding:4px;">
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
