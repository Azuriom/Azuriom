<div class="modal fade" id="logDataModal" tabindex="-1" role="dialog" aria-labelledby="notificationLabel"
     aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="notificationLabel">
                    {{ __('messages.notifications.info') }}
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <pre id="modal-data"></pre>
            </div>
        </div>
    </div>
</div>

<script>
    let myModalEl = document.getElementById('logDataModal');

    myModalEl.addEventListener('show.bs.modal', function (event) {
        document.getElementById('modal-data').innerHTML = JSON.stringify(
            JSON.parse(
                event.relatedTarget.dataset.log
            ), null, 2
        );
    })
</script>