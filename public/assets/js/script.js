axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

$('[data-toggle="tooltip"]').tooltip();

$('[data-confirm="delete"]').on('click', function (e) {
    e.preventDefault();

    $('#confirmDeleteForm').attr('action', $(this).attr('href'));
    $('#confirmDeleteModal').modal('show');
});

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

        if (likeSpinner) {
            likeSpinner.classList.remove('d-none');
        }

        axios.request({
            url: el.dataset['likeUrl'],
            method: el.classList.contains('active') ? 'delete' : 'post'
        }).then(function (json) {
            el.classList.remove('active');

            if (json.data.liked === true) {
                el.classList.add('active');
            }

            const likesCount = el.querySelector('.likes-count');

            if (likesCount) {
                likesCount.innerHTML = json.data.likes;
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
                $('#notifications').remove();
                $('#notificationsCounter').remove();
                $('#noNotificationsLabel').removeClass('d-none');
            })
            .catch(function () {
                notificationsSpinner.classList.add('d-none');

                readingNotifications = false;
            });
    });
}
