$(document).ready(function () {
    $('#pswForm input[type="text"]').focus(function () {
        //$(this).siblings('.error').hide();
    });
    //验证表单
    $("#pswForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                required: "请输入注册时使用的邮箱地址",
                email: "请输入有效的邮箱地址，如：example@54yongf.com"
            }
        },
        submitHandler: function (form) {
            form.submit();
            //$(form).find(":submit").attr("disabled", true);
        }
    });
});