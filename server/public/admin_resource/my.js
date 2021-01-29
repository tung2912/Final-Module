$(document).ready(function () {
    let origin = window.origin;

    $('.data-table').DataTable();
    $('.select2').select2();
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    //disable user
    $('.status-user').on('switchChange.bootstrapSwitch', function (e, data) {
        let userId = $(this).attr('data-id');
        console.log(userId)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: origin + '/admin/users/' + userId + '/change-status',
            method: 'POST',
            type: 'json',
            data: {
                status: data
            },
            success: function () {
                console.log('oke');
            }
        })
    });

});
