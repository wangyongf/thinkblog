$(document).ready(function (e) {
    $('.register_radio li input').click(function (e) {
        $(this).parent('li').addClass('current').append('<em></em>').siblings().removeClass('current').find('em').remove();
    });
    $('#email').focus(function () {
        $('#beError').hide();
    });
    //验证表单
    $("#loginForm").validate({
        rules: {
            type: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                rangelength: [6, 16]
            },
            checkbox: {
                required: true
            }
        },
        messages: {
            type: {
                required: "请选择使用ThinkBlog的目的"
            },
            email: {
                required: "请输入常用邮箱地址",
                email: "请输入有效的邮箱地址，如：example@54yongf.com"
            },
            password: {
                required: "请输入密码",
                rangelength: "请输入6-16位密码，字母区分大小写"
            },
            checkbox: {
                required: "请接受ThinkBlog用户协议"
            }
        },
        errorPlacement: function (label, element) {
            /*
             if(element.attr("type") == "radio"){
             label.insertAfter($(element).parents('ul')).css('marginTop','-20px');
             }else if(element.attr("type") == "checkbox"){
             label.inserresult.contenttAfter($(element).parent()).css('clear','left');
             }else{
             label.insertAfter(element);
             } */
            /*modify nancy*/
            if (element.attr("type") == "radio") {
                label.insertAfter($(element).parents('ul')).css('marginTop', '-20px');
            } else if (element.attr("type") == "checkbox") {
                label.insertAfter($(element).parent()).css('clear', 'left');
            } else {
                label.insertAfter(element);
            }
            ;
        },
        submitHandler: function (form) {
            var type = $('input[type="radio"]:checked', form).val();
            var email = $('#email').val();
            var password = $('#password').val();
            var resubmitToken = $('#resubmitToken').val();
            var callback = $('#callback').val();
            var authType = $('#authType').val();
            var signature = $('#signature').val();
            var timestamp = $('#timestamp').val();
            $(form).find(":submit").attr("disabled", true);
            $.ajax({
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                    type: type,
                    resubmitToken: resubmitToken,
                    callback: callback,
                    authType: authType,
                    signature: signature,
                    timestamp: timestamp
                },
                url: ctx + '/user/register.json',
                dataType: 'json'
            }).done(function (result) {
                $('#resubmitToken').val(result.resubmitToken);
                if (result.success) {
                    window.location.href = result.content;
                } else {
                    $('#beError').text(result.msg).show();
                }
                $(form).find(":submit").attr("disabled", false);
            });
        }
    });
});