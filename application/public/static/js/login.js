$.material.init();

function changeColor(c1, c2) {
    $(".navbar.navbar-inverse").animate({
        "backgroundColor": c1,

    });
    $(".header-panel").animate({
        "backgroundColor": c1,

    });

    $(".btn.btn-primary").animate({
        "backgroundColor": c1,

    });
    $(".top-color").animate({
        "backgroundColor": c2,

    });
    $("[data-change='true']").animate({
        "color": c2,

    });
}

changeColor("#4e64d9", "#3f51b5");
$(".captcha_img").click(function () {
    $("[alt='captcha']:visible").attr('src', "/captcha");
})

function updateMetaThemeColor(themeColor) {
    $('meta[name=theme-color]').remove();
    $('head').append('<meta name="theme-color" content="' + themeColor + '">');
}

function switchToReg() {
    changeColor("#46adff", "#2196F3");
    updateMetaThemeColor("#2196F3");
    $("#logForm").hide();
    $("#regForm").show();
    $("[alt='captcha']:visible").attr('src', "/captcha");
    $("#regForm").removeClass("animated zoomIn");
    $("#regForm").addClass("animated zoomIn");
}

function switchToLog() {
    changeColor("#4e64d9", "#3f51b5");
    updateMetaThemeColor("#3f51b5");
    $("#regForm").hide();
    $("#forgetForm").hide();
    $("#logForm").show();
    $("[alt='captcha']:visible").attr('src', "/captcha");
    $("#logForm").removeClass("animated zoomIn");
    $("#logForm").addClass("animated zoomIn");
}

function switchToEmail() {
    changeColor("#009688", "#4CAF50");
    updateMetaThemeColor("#4CAF50");
    $("#regForm").hide();
    $("#emailCheck").show();
    $("#emailCheck").removeClass("animated zoomIn");
    $("#emailCheck").addClass("animated zoomIn");
}

function switchToForget() {
    changeColor("#FF9800", "#F44336");
    updateMetaThemeColor("#F44336");
    $("#regForm").hide();
    $("#logForm").hide();
    $("#forgetForm").show();
    $("[alt='captcha']:visible").attr('src', "/captcha");
    $("#forgetForm").removeClass("animated zoomIn");
    $("#forgetForm").addClass("animated zoomIn");
}

var oName = document.getElementsByName('user_name-r')[0];
var oPass = document.getElementsByName('password-r')[0];
var oPassRepeat = document.getElementsByName('password-repeat-r')[0];
var oEmail = document.getElementsByName('email-r')[0];

function validate() {
    var r1 = checkEmail();
    var r2 = checkPassWord();
    var r3 = checkUserName();
    if (r1 && r2 && r3){
        return true;
    } else{
        return false;
    }

}

function checkEmail() {
    var reg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    var result = reg.test(oEmail.value);
    if (result) {
        return true;
    } else {
        sweetAlert("邮箱不符合规则", "请重新添写邮箱", "error");
        return false;
    }

}

function checkUserName() {
    var reg = /^[a-zA-Z][\w-_]{5,29}$/;
    var result = reg.test(oName.value);
    if (result) {
        return true;
    } else {
        sweetAlert("用户名不符合规则", "请重新添写", "error");
        return false;
    }

}

function checkPassWord() {
    if (oPass.value === oPassRepeat.value) {
        var reg = /^[\w!@#$%%^&*(*)_+-=]{6,15}$/;
        var result = reg.test(oPass.value);
        if (result) {
            return true;
        } else {
            sweetAlert("密码不符合规则", "请重新添写", "error");
            return false;
        }
    } else {
        sweetAlert("两次密码不一致", "请重新添写", "error");
        return false;
    }

}

$("#create").click(function () {
    switchToReg()
});
$("#forgetSwitch,#forgetSwitch2").click(function () {
    switchToForget()
});
$("#loginSwitch2,#loginSwitch,#loginSwitch3").click(function () {
    switchToLog()
});
