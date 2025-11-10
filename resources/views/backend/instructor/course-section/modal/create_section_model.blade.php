<!-- Modal -->
<div class="modal fade" id="addSectionModal" tabindex="-1" aria-labelledby="addSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="addSectionModalLabel">Add Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('instructor.course-section.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <div class="mb-3">
                        <label for="sectionTitle" class="form-label">Section Title</label>
                        <input type="text" class="form-control rounded-3" id="sectionTitle" name="section_title"
                            placeholder="Enter section title" required>
                    </div>
                </div>
                <div class="modal-footer text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-2"></i>
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
