{{-- resources/views/backend/instructor/course/partials/show_modal_content.blade.php (English - Simple & Clean) --}}

<div class="card shadow-lg border-0 rounded-4">
    <div class="card-body p-4">

        {{-- Row for Basic Details & Pricing --}}
        <div class="row g-4 mb-4 pb-3 border-bottom">

            {{-- Left Column: Basic Info --}}
            <div class="col-md-6 border-end">
                <h5 class="mb-3 fw-bold text-primary"><i class="bi bi-book me-2"></i> Core Information</h5>

                {{-- Course Name --}}
                <div class="mb-3">
                    <h6 class="text-muted small mb-1 fw-medium">Course Name</h6>
                    <p class="fw-bold mb-0 text-dark">{{ $course->course_name }}</p>
                </div>

                {{-- Course Title --}}
                <div class="mb-3">
                    <h6 class="text-muted small mb-1 fw-medium">Short Title</h6>
                    <p class="mb-0 text-dark">{{ $course->course_title }}</p>
                </div>

                {{-- Category --}}
                <div class="mb-3">
                    <h6 class="text-muted small mb-1 fw-medium">Category</h6>
                    <span class="badge bg-info text-dark rounded-pill">{{ $course->category->name ?? 'N/A' }}</span>
                </div>

                {{-- Subcategory --}}
                <div>
                    <h6 class="text-muted small mb-1 fw-medium">Subcategory</h6>
                    <span class="badge bg-secondary rounded-pill">{{ $course->subcategory->name ?? 'N/A' }}</span>
                </div>
            </div>

            {{-- Right Column: Pricing & Status --}}
            <div class="col-md-6 ps-md-4">
                <h5 class="mb-3 fw-bold text-success"><i class="bi bi-tag me-2"></i> Pricing & Features</h5>

                <div class="row g-3">
                    {{-- Selling Price --}}
                    <div class="col-4">
                        <h6 class="text-muted small mb-1">Selling Price</h6>
                        <p class="text-success fw-bolder mb-0 fs-5">${{ number_format($course->selling_price, 2) }}</p>
                    </div>
                    {{-- Discount price --}}
                    <div class="col-4">
                        <h6 class="text-muted small mb-1">Discount Price</h6>
                        @if ($course->discount_price > 0)
                            <p class="text-danger fw-bolder mb-0 fs-5">${{ number_format($course->discount_price, 2) }}</p>
                        @else
                             <p class="text-muted fw-bolder mb-0 fs-5">N/A</p>
                        @endif
                    </div>
                    {{-- Discount % (Calculated) --}}
                    <div class="col-4">
                        <h6 class="text-muted small mb-1">Discount %</h6>
                        <p class="text-danger fw-bolder mb-0 fs-5">
                            @php
                                $discountPercent = 0;
                                if ($course->discount_price && $course->selling_price > 0) {
                                    $discountPercent = round((($course->selling_price - $course->discount_price) / $course->selling_price) * 100);
                                }
                            @endphp
                            {{ $discountPercent }}%
                        </p>
                    </div>
                </div>

                <hr class="mt-4 mb-3">
                
                {{-- Badges/Features --}}
                <h6 class="text-muted small mb-2 fw-medium">Status & Features</h6>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge {{ $course->label ? 'bg-warning text-dark' : 'bg-light text-muted border' }}"><i class="bi bi-bookmark-fill me-1"></i> Label: {{ ucfirst($course->label ?? 'N/A') }}</span>
                    <span class="badge {{ $course->certificate == 1 ? 'bg-success' : 'bg-light text-muted border' }}"><i class="bi bi-award-fill me-1"></i> Certificate: {{ $course->certificate == 1 ? 'Yes' : 'No' }}</span>
                    <span class="badge {{ $course->bestseller == 1 ? 'bg-danger' : 'bg-light text-muted border' }}"><i class="bi bi-fire me-1"></i> Bestseller: {{ $course->bestseller == 1 ? 'Yes' : 'No' }}</span>
                    <span class="badge {{ $course->featured == 1 ? 'bg-primary' : 'bg-light text-muted border' }}"><i class="bi bi-star-fill me-1"></i> Featured: {{ $course->featured == 1 ? 'Yes' : 'No' }}</span>
                </div>
            </div>
        </div>

        {{-- Row for Description & Prerequisites --}}
        <div class="row g-4 mb-4 pb-3 border-bottom">
            {{-- Description --}}
            <div class="col-lg-6">
                <h6 class="text-muted small mb-2 fw-bold"><i class="bi bi-file-text-fill text-info me-1"></i> Description</h6>
                <div class="border rounded p-3 bg-light" style="max-height: 200px; overflow-y: auto;">
                    {!! $course->description ? $course->description : '<p class="text-muted fst-italic mb-0">No description provided.</p>' !!}
                </div>
            </div>

            {{-- Prerequisites --}}
            <div class="col-lg-6">
                <h6 class="text-muted small mb-2 fw-bold"><i class="bi bi-tools text-warning me-1"></i> Prerequisites</h6>
                <div class="border rounded p-3 bg-light" style="max-height: 200px; overflow-y: auto;">
                    {!! $course->prerequisites ? $course->prerequisites : '<p class="text-muted fst-italic mb-0">No prerequisites mentioned.</p>' !!}
                </div>
            </div>
        </div>

        {{-- Row for Media --}}
        <div class="row g-4">
            {{-- Course Image --}}
            <div class="col-md-6">
                <h6 class="text-muted small mb-2 fw-bold"><i class="bi bi-image-fill me-1"></i> Course Image</h6>
                @if ($course->course_image)
                    <img src="{{ asset($course->course_image) }}" alt="Course Image"
                        class="img-fluid rounded shadow-sm border" style="max-height: 180px; object-fit: cover; width: 100%;">
                @else
                    <div class="p-3 bg-light rounded text-center text-muted">N/A</div>
                @endif
            </div>

            {{-- Youtube Video --}}
            <div class="col-md-6">
                <h6 class="text-muted small mb-2 fw-bold"><i class="bi bi-play-btn-fill me-1"></i> Promo Video (Youtube)</h6>
                @if ($course->video_url)
                    @php
                        // Enhanced logic to extract YouTube ID
                        $url = $course->video_url;
                        $videoId = '';
                        // Regex to handle standard, short, and embed URLs
                        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|\w*?v=)|youtu\.be\/)([\w-]{11})/', $url, $matches)) {
                            $videoId = $matches[1];
                        }
                    @endphp
                    @if ($videoId)
                        <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm">
                            <iframe
                                src="https://www.youtube.com/embed/{{ $videoId }}"
                                title="Course Video" allowfullscreen></iframe>
                        </div>
                    @else
                        <div class="p-3 bg-light rounded text-center text-muted">Invalid YouTube URL</div>
                    @endif
                @else
                    <div class="p-3 bg-light rounded text-center text-muted">N/A</div>
                @endif
            </div>
        </div>

    </div>
</div>