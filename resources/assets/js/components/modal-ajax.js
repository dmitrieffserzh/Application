// MODAL WINDOW
$(function () {
    $('.ajax-modal').on('click', function (event) {

        event.preventDefault();

        // MODAL
        var modal_window    = $('.modal');
        var modal_container = $('.modal-dialog');
        var modal_content   = '.modal-body';

        // DATA
        var url   = $(this).data('url');
        var data  = $(this).data('name');
        var size  = $(this).data('modal-size');

        if (size) {
            modal_window.find(modal_container).addClass(size);
        }

        modal_window.find(modal_container).append(
             '<div class="modal-content">' +
             '<div class="modal-header">' +
             '<h5 class="modal-title">' + data + '</h5>' +
             '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
             '<span aria-hidden="true">&times;</span>' +
             '</button>' +
             '</div>' +
             '<div class="modal-body">' +
             '</div>' +
             '</div>');

        $.ajax({
            url: url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            success: function (data) {
                modal_window.find(modal_content).append(data.html);
            },
            complete: function () {
                modal_window.modal('show');
            }
        });

        // CLEAR MODAL CONTENT
        modal_window.on('hidden.bs.modal', function () {
            $(this).find(modal_container).text('');
        });
    });
});