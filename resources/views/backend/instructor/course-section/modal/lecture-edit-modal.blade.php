<div class="modal fade" id="course-edit-{{ $lecture->id }}" tabindex="-1"
    aria-labelledby="editLectureLabel{{ $lecture->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLectureLabel{{ $lecture->id }}">Edit Lecture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('instructor.lecture.update', $lecture->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <input type="hidden" name="section_id" value="{{ $lecture->section_id }}">

                    <div class="mb-3">
                        <label for="lecture_title_{{ $lecture->id }}" class="form-label">Lecture Title</label>
                        <input type="text" class="form-control" id="lecture_title_{{ $lecture->id }}"
                            name="lecture_title" value="{{ old('lecture_title', $lecture->lecture_title) }}"
                            placeholder="Enter lecture title" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="video_url_{{ $lecture->id }}" class="form-label">YouTube Video URL</label>
                        <input type="url" class="form-control" name="url" id="video_url_{{ $lecture->id }}"
                            placeholder="Enter the Video URL" value="{{ old('url', $lecture->url) }}" required>

                        <iframe id="videoPreview_{{ $lecture->id }}"
                            style="margin-top:15px; display:none; width:100%; height:400px" src=""
                            frameborder="0" allowfullscreen></iframe>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="video_duration" class="form-label"> Video Duration</label>
                        <input type="number"step="0.01" class="form-control" name="video_duration" id="video_duration"
                        value="{{ old('video_duration', $lecture->video_duration) }}" placeholder="Enter the Video Duration" required>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="content_{{ $lecture->id }}" class="form-label">Content</label>
                        <textarea class="form-control editor" name="content" id="content_{{ $lecture->id }}">{{ old('content', $lecture->content) }}</textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save me-2"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('[id^="video_url_"]').forEach(input => {
                const lectureId = input.id.split('_')[2];
                const preview = document.getElementById(`videoPreview_${lectureId}`);

                function extractYouTubeID(url) {
                    const regExp = /^.*(?:youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#&?]*).*/;
                    const match = url.match(regExp);
                    return (match && match[1].length === 11) ? match[1] : null;
                }

                function showVideoPreview(url) {
                    const videoId = extractYouTubeID(url);
                    if (videoId) {
                        preview.src = `https://www.youtube.com/embed/${videoId}`;
                        preview.style.display = 'block';
                    } else {
                        preview.src = '';
                        preview.style.display = 'none';
                    }
                }

                // បង្ហាញ preview ពេលបញ្ចូល
                input.addEventListener("input", () => showVideoPreview(input.value.trim()));

                // បង្ហាញ preview ពេល modal បើកឡើង (មាន URL រួច)
                const modal = input.closest('.modal');
                modal.addEventListener('shown.bs.modal', () => {
                    if (input.value.trim() !== '') {
                        showVideoPreview(input.value.trim());
                    }
                });

                // clear video ពេល modal បិទ
                modal.addEventListener('hidden.bs.modal', () => {
                    preview.src = '';
                    preview.style.display = 'none';
                });
            });
        });
    </script>
@endpush
