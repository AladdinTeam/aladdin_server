$(document).ready(function () {
    setInterval(checkStatus($('#order').val()), 1000);
});

function checkStatus(id) {
    let csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        method: POST,
        url: '/check_status_order',
        data: {_token: csrf_token, id: id},
        success: function (res) {
            if(res){
                location.href = '/order/'+id;
            }
        }
    });
}