axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (el) {
    new bootstrap.Tooltip(el);
});

document.querySelectorAll('[data-confirm="delete"]').forEach(function (el) {
    el.addEventListener('click', function (ev) {
        ev.preventDefault();

        const url = el.getAttribute('href');

        document.getElementById('confirmDeleteForm').setAttribute('action', url);
        new bootstrap.Modal(document.getElementById('confirmDeleteModal')).show();
    })
});

window.createAlert = function (color, message, dismiss) {
    const button = dismiss ? ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' : '';
    let icon;

    switch (color) {
        case 'info':
            icon = 'info-circle';
            break;
        case 'success':
            icon = 'check-circle';
            break;
        case 'danger':
            icon = 'exclamation-circle';
            break;
    }

    icon = icon ? '<i class="bi bi-' + icon + '"></i> ' : '';

    document.getElementById('status-message').innerHTML
        = '<div class="alert alert-' + color + ' alert-dismissible fade show" role="alert">' + icon + message + button + '</div>';
}

/*
 * Logout
 */
const logoutLink = document.getElementById('logoutLink');

if (logoutLink) {
    logoutLink.addEventListener('click', function (e) {
        e.preventDefault();

        document.getElementById('logout-form').submit();
    });
}

/*
 * Post likes
 */
let likeLoading = false;

document.querySelectorAll('[data-like-url]').forEach(function (el) {
    el.addEventListener('click', function (e) {
        e.preventDefault();

        if (likeLoading) {
            return;
        }

        likeLoading = true;

        const likeSpinner = el.querySelector('.load-spinner');
        const likeIcon = el.querySelector('[data-liked=true]');
        const unlikeIcon = el.querySelector('[data-liked=false]');

        if (likeSpinner) {
            likeSpinner.classList.remove('d-none');
        }

        axios.request({
            url: el.dataset['likeUrl'],
            method: el.classList.contains('active') ? 'delete' : 'post'
        }).then(function (json) {
            if (json.data.liked === true) {
                el.classList.add('active');

                if (likeIcon && unlikeIcon) {
                    likeIcon.classList.add('d-none');
                    unlikeIcon.classList.remove('d-none');
                }
            } else {
                el.classList.remove('active');

                if (likeIcon && unlikeIcon) {
                    likeIcon.classList.remove('d-none');
                    unlikeIcon.classList.add('d-none');
                }
            }

            const likesCount = el.querySelector('.likes-count');

            if (likesCount) {
                likesCount.innerText = json.data.likes;
            }
        }).finally(function () {
            likeSpinner.classList.add('d-none');
            likeLoading = false;
        });
    });
});

/*
 * Notifications
 */
const readNotificationsBtn = document.getElementById('readNotifications');
let readingNotifications = false;

if (readNotificationsBtn) {
    readNotificationsBtn.addEventListener('click', function (e) {
        e.preventDefault();

        if (readingNotifications) {
            return;
        }

        readingNotifications = true;

        const notificationsSpinner = readNotificationsBtn.querySelector('.load-spinner');

        if (notificationsSpinner) {
            notificationsSpinner.classList.remove('d-none');
        }

        notificationsSpinner.classList.remove('d-none');

        axios.post(readNotificationsBtn.href)
            .then(function () {
                document.getElementById('notificationsCounter').remove();
                document.getElementById('notifications').remove();
                document.getElementById('noNotificationsLabel').classList.remove('d-none');
            })
            .catch(function () {
                notificationsSpinner.classList.add('d-none');

                readingNotifications = false;
            });
    });
}

/*
 * Theme switcher
 */
document.querySelectorAll('[data-theme-value]').forEach(function (el) {
    el.addEventListener('click', function (ev) {
        ev.preventDefault()

        const theme = el.getAttribute('data-theme-value')

        document.body.setAttribute('data-bs-theme', theme)

        document.querySelectorAll('[data-theme-value]').forEach(function (child) {
            const childTheme = child.getAttribute('data-theme-value')

            if (childTheme === theme) {
                child.classList.add('d-none')
            } else {
                child.classList.remove('d-none')
            }
        })

        axios.post(el.href, { theme: theme })
    })
});
