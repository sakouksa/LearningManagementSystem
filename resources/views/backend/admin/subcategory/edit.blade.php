@extends('backend.admin.master')

@section('title', 'LMS Admins Dashboard')

@section('content')
    <div class="page-content">
        {{-- breadcrumb --}}
        @include('backend.section.breadcrumb', [
            'title' => 'SubCategory',
            'sub_title' => 'Update-SubCategories',
        ])
        {{-- end breadcrumb --}}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-4">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <h5 class="mb-4">Update SubCategory</h5>
                            <a href="{{ route('admin.subcategory.index') }}"
                                class="btn btn-danger btn-sm d-flex align-items-center gap-1 px-3 py-2 shadow-sm">
                                <i class="bi bi-arrow-left-circle fs-6"></i>
                                <span>Back</span>
                            </a>
                        </div>

                        <form action="{{ route('admin.subcategory.update', $subcategory->id) }}" method="POST">
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
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="category" class="form-label">Choose Category</label>
                                    <select name="category_id" class="form-select">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach ($all_categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $subcategory->category_id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">SubCategory Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $subcategory->name }}" placeholder="SubCategory Name">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug"
                                        value="{{ $subcategory->slug }}" placeholder="Create Unique Slug">
                                </div>
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
