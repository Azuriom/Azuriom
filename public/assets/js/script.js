$('[data-confirm="delete"]').on('click', function (e) {
    e.preventDefault();

    $('#confirmDeleteForm').attr('action', $(this).attr('href'));
    $('#confirmDeleteModal').modal('show');
});

let likeLoading = false;

document.querySelectorAll('[data-like-url]').forEach(function (el) {
    el.addEventListener('click', function (e) {
        e.preventDefault();

        if (likeLoading) {
            return;
        }

        likeLoading = true;

        const likeSpinner = el.querySelector('.like-spinner');

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
