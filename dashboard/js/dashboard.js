$(document).ready(function () {
    $('#pauseModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const subscriptionId = button.data('subscription-id');
        $(this).find('#pause-sub-id').val(subscriptionId);
        console.log("Pause modal: ID = " + subscriptionId);
    });

    $('#cancelModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const subscriptionId = button.data('subscription-id');
        $(this).find('#cancel-sub-id').val(subscriptionId);
        console.log("Cancel modal: ID = " + subscriptionId);
    });

    flatpickr("#pauseDateRange", {
        mode: "range",
        dateFormat: "Y-m-d",
        minDate: "today",
        maxDate: new Date().fp_incr(30),
        locale: {
            firstDayOfWeek: 1
        }
    });
});

