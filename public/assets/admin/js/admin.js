function confirmDelete(url) {
    $('#confirmDeleteForm').attr('action', url);
    $('#confirmDeleteModal').modal('show');
}

function createAlert(color, message, dismiss) {
    const button = dismiss ? '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' : '';

    $('#status-message').html('<div class="alert alert-' + color + ' alert-dismissible fade show" role="alert">' + message + button + '</div>');
}

$('[data-toggle="tooltip"]').tooltip();

$('[data-confirm="delete"]').on('click', function (e) {
    e.preventDefault();

    confirmDelete($(this).attr('href'));
});

$('[data-route="logout"]').on('click', function (e) {
    e.preventDefault();

    $('#logoutForm').submit();
});

$('a.disabled').on('click', function (e) {
    e.stopImmediatePropagation();
    e.preventDefault();
});

$('.custom-file-input').on('change', function () {
    const file = $(this).val().replace("C:\\fakepath\\", "");

    if (file !== undefined || file !== "") {
        $(this).next(".custom-file-label").text(file);
    }
});

if ($(window).width() < 450 || localStorage.getItem('azuriom-toggle-admin-sidebar') === 'true') {
    $('#sidebarToggleTop').trigger('click');
}

$('#sidebarToggle, #sidebarToggleTop').on('click', function (e) {
    if ($('.sidebar').hasClass('toggled')) {
        localStorage.setItem('azuriom-toggle-admin-sidebar', 'true');
    } else {
        localStorage.removeItem('azuriom-toggle-admin-sidebar');
    }
});

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
