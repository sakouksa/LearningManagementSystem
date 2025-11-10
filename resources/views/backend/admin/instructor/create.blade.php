@extends('backend.admin.master')

@section('title', 'Add Instructor')

@section('content')
    <div class="page-content">
        @include('backend.section.breadcrumb', ['title' => 'Instructor', 'sub_title' => 'Add Instructor'])

        <div class="card">
            <div class="card-body p-4">
                {{-- Header --}}
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5 class="mb-0">Add Instructor</h5>
                    <a href="{{ route('admin.instructor.index') }}"
                        class="btn btn-danger btn-sm d-flex align-items-center gap-1 px-3 py-2 shadow-sm">
                        <i class="bi bi-arrow-left-circle fs-6"></i>
                        <span>Back</span>
                    </a>
                </div>

                {{-- Form --}}
                <form action="{{ route('admin.instructor.store') }}" method="POST" enctype="multipart/form-data"
                    class="row g-3">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- First Name --}}
                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control">
                    </div>

                    {{-- Last Name --}}
                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control">
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    {{-- Phone --}}
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                    </div>

                    {{-- Gender --}}
                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select">
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    {{-- Profile Photo --}}
                    <div class="col-md-6">
                        <label class="form-label">Profile Photo</label>
                        <input type="file" name="photo" class="form-control" id="photo">
                        <img id="photoPreview" src="" alt="No image" class="img-fluid mt-2"
                            style="max-width: 200px; display: none;">
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    {{-- Bio --}}
                    <div class="col-md-12">
                        <label class="form-label">Bio</label>
                        <textarea name="bio" rows="3" class="form-control editor">{{ old('bio') }}</textarea>
                    </div>

                    {{-- Experience --}}
                    <div class="col-md-12">
                        <label class="form-label">Experience</label>
                        <input type="text" name="exprience" value="{{ old('exprience') }}" class="form-control"
                            class="form-control" placeholder="Example: Web Developer, Designer, Teacher">
                    </div>

                    {{-- Submit --}}
                    <div class="col-12 d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary d-flex align-items-center gap-1">
                            <i class="bi bi-floppy-fill fs-6"></i>
                            <span>Save</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        // Image Preview
        document.getElementById('photo').addEventListener('change', function(e) {
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
@endpush
