var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];


$(document).ready(function () {

});

$("#ship_id").change(function () {
    get_price($("#ship_id").val());
});

function get_price(id) {
    $.ajax({
        url: baseUrl + '/get_price',
        data: {
            'id': id,
        },
        type: 'POST',
        cache: false,
        dataType: 'json',
        success: function (data) {
            $("#price_ship").val(data.price_per_day);
            $("#pricing_id").val(data.id);
        }
    });
}