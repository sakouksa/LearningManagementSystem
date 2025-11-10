<!-- Modal -->
<div class="modal fade modal-container" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header border-bottom-gray">
                <div class="pr-2">
                    <p class="pb-2 font-weight-semi-bold">Course Preview</p>
                    <h5 class="modal-title fs-19 font-weight-semi-bold lh-24" id="previewModalTitle">
                        {{ $course->course_name }}
                    </h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Hidden input with video URL -->
                <input type="hidden" class="form-control video_url" name="url"
                    value="{{ old('url', $course->video_url) }}" placeholder="Video URL">

                <!-- Video Preview -->
                <div class="video-preview-box mt-3">
                    <div class="video-preview-container">
                        <iframe class="video-preview-iframe w-100" height="400" src="" title="Video Player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const iframe = document.querySelector('#previewModal iframe');
            const videoInput = document.querySelector('.video_url');

            function getEmbedURL(url) {
                if (!url) return '';
                // If YouTube URL, convert to embed
                const youtubeMatch = url.match(
                /(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([\w-]{11})/);
                if (youtubeMatch) {
                    return `https://www.youtube.com/embed/${youtubeMatch[1]}?autoplay=1`;
                }
                // If already an embed URL, use it directly
                return url;
            }

            $('#previewModal').on('show.bs.modal', function() {
                iframe.src = getEmbedURL(videoInput.value.trim());
            });

            $('#previewModal').on('hidden.bs.modal', function() {
                iframe.src = '';
            });
        });
    </script>
@endpush
