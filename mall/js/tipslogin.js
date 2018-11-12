$(function () {
    $('#loginText').submit(function () {
        var userName = $('#userName').val(),
            password = $('#password').val();
        if (userName == '' || userName.length <= 0) {
            layer.tips('用户名不能为空', '#userName',{time: 3000, tips:[2,'#3595cc']});
            $('#userName').focus();
            return false;
        }

        if (password == '' || password.length <= 0) {
            layer.tips('密码不能为空', '#password', {time: 3000, tips:[2,'#3595cc']});
            $('#password').focus();
            return false;
        }
        return true;
    })

})