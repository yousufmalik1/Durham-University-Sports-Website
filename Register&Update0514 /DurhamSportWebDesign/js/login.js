
$("#btn_login").click(function(event){
    event.preventDefault();

    $('form').fadeOut(500);
    $('.wrapper').addClass('form-success');
});

function check()
    {
        if(form.username.value == "")//如果用户名为空
        {
            alert("please input your username");
            form.username.focus();
            return false;
        }
        if(form.pass.value == "")//如果密码为空
        {
            alert("please input your password");
            myform.pass.focus();
            return false;
        }
    }

