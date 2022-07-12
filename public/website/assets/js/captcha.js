
$('#reload-captcha').click(function () {

$.ajax({
type: 'GET',
url: '/cod-dash/reload-captcha',
success: function (data) {
    
$(".captcha span").html(data.captcha);
}
});
});
