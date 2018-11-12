//js 弹窗

$(function () {
    $('#loginText').submit(function () {
        var userName = $('#userName').val(),
            password = $('#password').val(),
            repassword = $('#repassword').val();
        if (userName == '' || userName.length <= 0) {
            layer.tips('用户名不能为空', '#userName',{time: 3000, tips:[2,'#3595cc']});
            $('#userName').focus();
            return false;
        }else if(userName.length>11){
            layer.tips('用户名不能超过11位','#userName',{time:3000,tips:[2,'#3595cc']})
            $('#userName').focus();
            return false;
        }

        if (password == '' || password.length <= 0) {
            layer.tips('密码不能为空', '#password', {time: 3000, tips:[2,'#3595cc']});
            $('#password').focus();
            return false;
        }else if(password.length<6||password.length>16){
            layer.tips('密码为6-16位之间', '#password', {time: 3000, tips:[2,'#3595cc']});
            $('#password').focus();
            return false;
        }

        if (repassword == '' || repassword.length <= 0 || (password != repassword)) {
            layer.tips('两次密码输入不一致', '#repassword', {time: 3000, tips:[2,'#3595cc']});
            $('#repassword').focus();
            return false;
        }
        return true;
    })

})