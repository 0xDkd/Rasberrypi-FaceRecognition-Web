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


$("#create").click(function () {
    switchToReg()
});
$("#forgetSwitch,#forgetSwitch2").click(function () {
    switchToForget()
});
$("#loginSwitch2,#loginSwitch,#loginSwitch3").click(function () {
    switchToLog()
});
$("#qqLogin").click(function () {
    window.location.href = "/Member/QQLogin";
})