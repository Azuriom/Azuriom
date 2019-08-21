$('[data-confirm="delete"]').on('click', function (e) {
    e.preventDefault();

    $('#confirmDeleteForm').attr('action', $(this).attr('href'));
    $('#confirmDeleteModal').modal('show');
});
