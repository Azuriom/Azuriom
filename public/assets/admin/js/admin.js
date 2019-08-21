$('[data-toggle="tooltip"]').tooltip();

$('a[disabled]').on('click', function (e) {
    e.stopImmediatePropagation();
    e.preventDefault();
});

$('[data-confirm="delete"]').on('click', function (e) {
    e.preventDefault();

    $('#confirmDeleteForm').attr('action', $(this).attr('href'));
    $('#confirmDeleteModal').modal('show');
});

$('[data-route="logout"]').on('click', function (e) {
    e.preventDefault();

    $('#logoutForm').submit();
});

$('.custom-file-input').on('change', function () {
    const file = $(this).val().replace("C:\\fakepath\\", "");

    if (file !== undefined || file !== "") {
        $(this).next(".custom-file-label").text(file);
    }
});
