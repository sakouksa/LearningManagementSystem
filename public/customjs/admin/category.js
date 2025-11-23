$(document).ready(function () {
    $('#name').on('input', function () {
        var name = $(this).val();
        var slug = name.toLowerCase() // បម្លែងអក្សរទាំងអស់ទៅជាតួអក្សរតូច
            .replace(/ /g, '-') // ប្តូរទីតាំងដែលមាន space ជា dash "-"
            .replace(/[^\w-]+/g, '') // ត្រូវការលុបអក្សរដែលមិនត្រឹមត្រូវ
        $('#slug').val(slug);
    })
})

// Preview Script
document.getElementById('Photo').addEventListener('change', function (e) {
    const preview = document.getElementById('photoPreview');
    preview.src = URL.createObjectURL(e.target.files[0]);
    preview.style.display = "block";
});
