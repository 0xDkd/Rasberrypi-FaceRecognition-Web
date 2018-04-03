$("#saveNick").click(function () {
    var newNick = $("#nick").val();
    $("#saveNick").attr("disabled", "true");
    $.post("/Member/Nick", {
        nick: newNick
    }, function (data) {
        if (data.error == "1") {
            toastr["warning"](data.msg);
            $("#saveNick").removeAttr("disabled");
        } else if (data.error == "200") {
            location.reload();
        }
    });
})

$("#homePage").change(function () {
    if ($(this).prop("checked")) {
        postData = "true";
    } else {
        postData = "false";
    }
    $.post("/Member/HomePage", {
        status: postData
    }, function (data) {
        if (data.error == "1") {
            toastr["warning"](data.msg);
        } else if (data.error == "200") {
            toastr["success"](data.msg);
        }
    });
})

$("#twoStep").click(function () {
    $("#two_step_modal").modal();
    $("#qrcode").attr("src", "/Member/EnableTwoFactor");
})

$("#setWebdavPwd").click(function () {
    $("#set_webdav_pwd").modal();
})

$("#confirm").click(function () {
    $vCode = $("#vCode").val();
    $("#confirm").attr("disabled", "true");
    $.post("/Member/TwoFactorConfirm", {
        code: $vCode
    }, function (data) {
        if (data.error == "1") {
            $("#confirm").removeAttr("disabled");
            toastr["warning"](data.msg);
        } else if (data.error == "200") {
            toastr["success"](data.msg);
            location.reload();
        }
    });
})

$("#confirmWebdav").click(function () {
    pwd = $("#webdav_pwd").val();
    $("#confirmWebdav").attr("disabled", "true");
    $.post("/Member/setWebdavPwd", {
        pwd: pwd
    }, function (data) {
        if (data.error == "1") {
            $("#confirmWebdav").removeAttr("disabled");
            toastr["warning"](data.msg);
        } else if (data.error == "200") {
            toastr["success"](data.msg);
            $("#confirmWebdav").removeAttr("disabled");
            $("#set_webdav_pwd").modal('hide');
        }
    });
})

$("#savePwd").click(function () {
    $("#savePwd").attr("disabled", "true");
    var pwdOrigin = $("#passOrigin").val();
    var pwdNew = $("#passNew").val();
    var pwdNewRepet = $("#passNewRepet").val();
    if (pwdNew != pwdNewRepet) {
        toastr["warning"]("两次密码输入不一致");
        $("#savePwd").removeAttr("disabled");
        return 0;
    }
    $.post("/Member/ChangePwd", {origin: pwdOrigin, new: pwdNew}, function (data) {
        if (data.error == "1") {
            $("#savePwd").removeAttr("disabled");
            toastr["warning"](data.msg);
        } else if (data.error == "200") {
            toastr["success"](data.msg);
            location.reload();
        }
    })
})

$("#useGravatar").click(function () {
    $("#useGravatar").attr("disabled", "true");
    $.post("/Member/SetGravatar", {
        "t": "confirmed"
    }, function (data) {
        location.reload();
    });
})