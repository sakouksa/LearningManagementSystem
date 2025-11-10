$(document).ready(function () {
    $('#name').on('input', function () {
        var name = $(this).val();
        var slug = name.toLowerCase() // បម្លែងអក្សរទាំងអស់ទៅជាតួអក្សរតូច
            .replace(/ /g, '-')        // ប្តូរទីតាំងដែលមាន space ជា dash "-"
            .replace(/[^\w-]+/g, '')    // ត្រូវការលុបអក្សរដែលមិនត្រឹមត្រូវ
        $('#slug').val(slug);
    })
})

/*Dynamic dependent jQuery */
$(document).ready(function () {
    $('#category').on('change', function () {
        var categoryId = $(this).val();
        if (categoryId) {
            $.ajax({
                url: '/instructor/get-subcategories/' + categoryId,
                type: 'GET',
                success: function (data) {
                    $('#subcategory').empty();
                    $('#subcategory').append('<option value="" selected disabled>Select a SubCategory</option>');
                    $.each(data, function (key, value) {
                        $('#subcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function () {
                    alert('Failed to load SubCategory!');
                }
            });
        } else {
            $('#subcategory').empty();
            $('#subcategory').append('<option value="" selected disabled>Select a SubCategory</option>');
        }
    });
});

/*Course Goal Script */
$(document).ready(function () {
    $('#addGoalInput').on('click', function (e) {
        e.preventDefault();
        $('#goalContainer').append(`
            <div class="input-group mt-2">
                <input type="text" class="form-control" name="course_goals[]" placeholder="Enter a course goal">
                <button type="button" class="btn btn-danger removeGoalInput">
                    <i class="bi bi-dash-lg"></i>
                </button>
            </div>
        `);
    });

    // Remove a goal input
    $(document).on('click', '.removeGoalInput', function () {
        $(this).closest('.input-group').remove();
    });
});


