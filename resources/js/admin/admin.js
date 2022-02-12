// AdminKit (required)
import '@adminkit/core/src/js/modules/bootstrap';
import '@adminkit/core/src/js/modules/sidebar';
import '@adminkit/core/src/js/modules/theme';

import axios from 'axios'
import alpinejs from 'alpinejs'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios = axios;
window.alpinejs = alpinejs;

alpinejs.start();

document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (el) {
    new bootstrap.Tooltip(el)
});

document.querySelectorAll('[data-confirm="delete"]').forEach(function (el) {
    el.addEventListener('click', function (ev) {
        ev.preventDefault();

        const url = el.getAttribute('href');

        document.getElementById('confirmDeleteForm').setAttribute('action', url);
        new bootstrap.Modal(document.getElementById('confirmDeleteModal')).show();
    })
});

document.querySelectorAll('[data-route="theme"]').forEach(function (el) {
    el.addEventListener('click', function (ev) {
        ev.preventDefault();

        document.getElementById('themeForm').submit();
    });
});

document.querySelectorAll('[data-route="logout"]').forEach(function (el) {
    el.addEventListener('click', function (ev) {
        ev.preventDefault();

        document.getElementById('logoutForm').submit();
    });
});

document.querySelectorAll('[data-image-preview]').forEach(function (el) {
    el.addEventListener('change', function (e) {
        if (el.files && el.files[0]) {
            const reader = new FileReader();
            const preview = document.getElementById(el.dataset['imagePreview']);

            reader.onload = function (e) {
                if (preview) {
                    preview.src = e.currentTarget.result;
                    preview.classList.remove('d-none');
                }
            };

            reader.readAsDataURL(e.currentTarget.files[0]);
        }
    });
});

const readNotifications = document.getElementById('readNotifications');
let readingNotifications = false;

readNotifications.addEventListener('click', function (ev) {
    ev.preventDefault();

    if (readingNotifications) {
        return;
    }

    readingNotifications = true;

    readNotifications.querySelector('.loader').classList.remove('d-none');

    axios.post(readNotifications.getAttribute('href'))
        .then(function () {
            document.getElementById('notificationsCounter').remove();
            document.getElementById('notifications').remove();
            document.getElementById('noNotificationsLabel').classList.remove('d-none');
        })
        .catch(function () {
            readNotifications.querySelector('.loader').classList.add('d-none');

            readingNotifications = false;
        });
});
