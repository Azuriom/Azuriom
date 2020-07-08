function confirmDelete(url) {
    $('#confirmDeleteForm').attr('action', url);
    $('#confirmDeleteModal').modal('show');
}

function createAlert(color, message, dismiss) {
    const button = dismiss ? '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' : '';
    let icon;

    switch (color) {
        case 'success':
            icon = 'check-circle';
            break;
        case 'danger':
            icon = 'exclamation-circle';
            break;
        case 'info':
            icon = 'info-circle';
            break;
    }

    icon = icon ? '<i class="fas fa-' + icon + '"></i> ' : '';

    $('#status-message').html('<div class="alert alert-' + color + ' alert-dismissible fade show" role="alert">' + icon + message + button + '</div>');
}

$('[data-password-toggle]').on('click', function (e) {
    e.preventDefault();

    const input = $(document.getElementById($(this).data('passwordToggle')));
    const icon = $($(this).find('.fas'));

    if (input.attr('type') === 'text') {
        input.attr('type', 'password');
        icon.removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
        input.attr('type', 'text');
        icon.removeClass('fa-eye-slash').addClass('fa-eye');
    }
});

$('[data-image-preview]').on('change', function (e) {
    if (e.currentTarget.files && e.currentTarget.files[0]) {
        const reader = new FileReader();
        const preview = document.getElementById($(this).data('image-preview'));

        reader.onload = function (e) {
            if (preview) {
                preview.src = e.currentTarget.result;
                preview.classList.remove('d-none');
            }
        };

        reader.readAsDataURL(e.currentTarget.files[0]);
    }
});

$('[data-toggle="tooltip"]').tooltip();

$('[data-confirm="delete"]').on('click', function (e) {
    e.preventDefault();

    confirmDelete($(this).attr('href'));
});

$('[data-route="theme"]').on('click', function (e) {
    e.preventDefault();

    $('#themeForm').submit();
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

function updateToggleSelect(selector, el) {
    const value = el.val() !== '' ? el.val() : 'undefined';

    $('[' + selector + ']').addClass('d-none');
    $('[' + selector + '~="' + value + '"]').removeClass('d-none');
}

$('[data-toggle-select]').each(function () {
    const el = $(this);

    const selector = 'data-' + el.data('toggleSelect');

    updateToggleSelect(selector, el);

    el.on('change', function () {
        updateToggleSelect(selector, $(this));
    });
});

let readingNotifications = false;

$('#readNotifications').on('click', function (e) {
    e.preventDefault();

    if (readingNotifications) {
        return;
    }

    const $this = $(this);

    readingNotifications = true;

    $this.find('.loader').removeClass('d-none');

    axios.post($this.attr('href'))
        .then(function () {
            $('#notifications').remove();
            $('#notificationsCounter').fadeOut();
            $('#noNotificationsLabel').removeClass('d-none');
        })
        .catch(function () {
            $this.find('.loader').addClass('d-none');

            readingNotifications = false;
        });
});

// SB Admin 2 uses jQuery easing, but Azuriom don't include it
// so just fallback to swing if it's not defined.
if (!$.easing.easeInOutExpo) {
    $.easing.easeInOutExpo = $.easing.swing;
}

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
