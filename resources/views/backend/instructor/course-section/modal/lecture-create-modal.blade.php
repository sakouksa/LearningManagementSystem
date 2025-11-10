<!-- ✅ HTML (សូមប្រាកដថា id មាន $data->id ផ្សេងគ្នា) -->
<div class="modal fade" id="course-{{ $data->id }}" tabindex="-1" aria-labelledby="addLectureLabel{{ $data->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLectureLabel{{ $data->id }}">Add Lecture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('instructor.lecture.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <input type="hidden" name="section_id" value="{{ $data->id }}">

                    <div class="col-md-12 mt-3">
                        <label for="lecture_title" class="form-label">Lecture Title</label>
                        <input type="text" class="form-control" name="lecture_title"
                            placeholder="Enter lecture title" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="video_url" class="form-label">YouTube Video URL</label>
                        <input type="url" class="form-control" id="video_url_{{ $data->id }}" name="url"
                            placeholder="Enter the Video URL" required>

                        <iframe id="videoPreview_{{ $data->id }}"
                            style="margin-top:15px;display:none;width:100%;height:400px" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="video_duration" class="form-label"> Video Duration</label>
                        <input type="number"step="0.01" class="form-control" name="video_duration" id="video_duration"
                            placeholder="Enter the Video Duration" value="{{ old('video_duration') }}" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="content">Content</label>
                        <textarea class="form-control editor" name="content"></textarea>
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-success"><i class="bi bi-save me-2"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // ✅ Function សម្រាប់ extract YouTube Video ID
            function extractYouTubeID(url) {
                const regExp = /^.*(?:youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#&?]*).*/;
                const match = url.match(regExp);
                return (match && match[1].length === 11) ? match[1] : null;
            }

            // ✅ Event ពេល modal ត្រូវបានបើក
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('shown.bs.modal', function() {
                    const modalId = modal.id.split('-')[1];
                    const videoInput = modal.querySelector(`#video_url_${modalId}`);
                    const videoPreview = modal.querySelector(`#videoPreview_${modalId}`);

                    if (!videoInput || !videoPreview) return;

                    // ពេលវាយ URL
                    videoInput.addEventListener('input', function() {
                        const videoUrl = videoInput.value.trim();
                        const videoId = extractYouTubeID(videoUrl);
                        if (videoId) {
                            videoPreview.src = `https://www.youtube.com/embed/${videoId}`;
                            videoPreview.style.display = 'block';
                        } else {
                            videoPreview.style.display = 'none';
                            videoPreview.src = '';
                        }
                    });
                });

                // ✅ Clear Video ពេល modal បិទ
                modal.addEventListener('hidden.bs.modal', function() {
                    const iframe = modal.querySelector('iframe');
                    if (iframe) {
                        iframe.src = '';
                        iframe.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endpush
