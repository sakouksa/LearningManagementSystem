@extends('backend.admin.master')

@section('title', 'Update Slider')

@section('content')
    <div class="page-content">
        @include('backend.section.breadcrumb', ['title' => 'Slider', 'sub_title' => 'Update-Sliders'])

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-4">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <h5 class="mb-4">Update Slider</h5>
                            <a href="{{ route('admin.slider.index') }}"
                                class="btn btn-danger btn-sm d-flex align-items-center gap-1 px-3 py-2 shadow-sm">
                                <i class="bi bi-arrow-left-circle fs-6"></i>
                                <span>Back</span>
                            </a>
                        </div>

                        <form class="row g-3" method="POST" action="{{ route('admin.slider.update', $slider->id) }}"
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

                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label">Slider Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" placeholder="Slider Title"
                                    value="{{ old('title', $slider->title) }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="short_description" class="form-label">Short Description</label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description"
                                    id="short_description" rows="5" placeholder="Enter Short Description">{{ old('short_description', $slider->short_description) }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-12">
                                <label for="video_url" class="form-label">Video URL</label>
                                <input type="text" class="form-control @error('video_url') is-invalid @enderror"
                                    name="video_url" id="video_url" placeholder="Enter Video URL"
                                    value="{{ old('video_url', $slider->video_url) }}">
                                @error('video_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <iframe id="videoPreview" style="margin-top:15px; width:50%; height:400px" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>

                            <div class="col-md-12">
                                <label for="image" class="form-label">Background Image</label>
                                <input type="file" class="form-control" name="image" id="Photo">
                            </div>

                            <div class="col-md-12">
                                <img id="photoPreview" width="100%" height="" src="{{ asset($slider->image) }}"
                                    style="margin-top:15px; border:1px solid #ddd; border-radius:6px; padding:4px;">

                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary btn-sm d-flex align-items-center gap-1 px-3 py-2 shadow-sm">
                                    <i class="bi bi-pencil-square fs-6"></i>
                                    <span>Update</span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function extractYouTubeID(url) {
            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#&?]*).*/;
            const match = url.match(regExp);
            return (match && match[2].length === 11) ? match[2] : null;
        }

        const videoInput = document.getElementById('video_url');
        const videoPreview = document.getElementById('videoPreview');

        function updateVideoPreview(url) {
            const videoId = extractYouTubeID(url);
            if (videoId) {
                videoPreview.src = `https://www.youtube.com/embed/${videoId}`;
            } else {
                videoPreview.src = '';
            }
        }

        // Initial preview on page load
        updateVideoPreview(videoInput.value);

        videoInput.addEventListener('input', function() {
            updateVideoPreview(this.value);
        });

        // Optional: preview new image selection
        const photoInput = document.getElementById('Photo');
        const photoPreview = document.getElementById('photoPreview');

        photoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                photoPreview.src = URL.createObjectURL(file);
            }
        });
    </script>
@endpush
