$('#customerMailModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget); // Button that triggered the modal
    let name = button.data('customername'); // Extract info from data-* attributes
    let email = button.data('customeremail'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    let modal = $(this);
    modal.find('.modal-body #customerMailName').val(name);
    modal.find('.modal-body #customerMailEmail').val(email);
});