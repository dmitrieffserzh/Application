// MODAL WINDOW
$(function () {
    $('.ajax-modal').on('click', function (event) {

        event.preventDefault();

        var url = $(this).data('url');
        var data = $(this).data('name');
        var size = $(this).data('modal-size');

        if (size) {
            $('#modal-container').find('.modal-dialog').addClass(size);
        }

        $('#modal-container').find('.modal-dialog').append(
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
            //dataType: 'JSON',
            success: function (data) {
                $('#modal-container').find('.modal-body').append(data.html);
            },
            complete: function () {
                $('#modal-container').modal('show');
            }
        });

        // CLEAR MODAL CONTENT
        $('#modal-container').on('hidden.bs.modal', function (e) {
            $(this).find('.modal-dialog').text('');
        });
    });
});