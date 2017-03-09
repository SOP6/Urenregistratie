var CSRF_TOKEN = $("#token").attr("value");

function postAjax(userData){

$.ajax({
    url: '/profile',
    type: 'POST',
    data: [{_token: CSRF_TOKEN}, userData ],
    dataType: 'JSON',
    success: function (data) {
        console.log('sucess');
    }
})};

$(function() {
    $('#profilebutton').click(post());
});

function post(){
    $('#profilebutton').click(this.postAjax($('form').serializeArray()));
}

