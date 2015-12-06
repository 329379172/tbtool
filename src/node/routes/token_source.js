function focusTxtSelect() {
    $("#txtNick").select()
}
function handlerTime(a, b) {
    this.time = miao, this.controlID = a, this.timeID = null, this.errorStatusTxt = b
}
function GetTaobaoNickInfo() {
    var reg, myTime, startTime = (new Date).getTime(), nick = $.trim($("#txtNick").val());
    return "" == nick || null == nick || nick == isNaN ? ($("#divResult").html("请输入淘宝帐号..."), void 0) : (reg = /^[A-Za-z0-9\u4e00-\u9fa5_.]+$/, 0 != searchTime ? ($("#divResult").html("亲,您的查询频率太高了吧，请休息<b><font color='red'>1</font></b>秒后查询！"), void 0) : (currentSubmitStatus || (myTime = new handlerTime("#divResult", "数据载入延迟,请[<a href='#' style='color:blue;' onclick='GetTaobaoNickInfo()'>点击重试</a>]。<b style=' margin-left:20px;'>您还可以使用备用网站查询：<a href='http://cha.kukatao.com/'>点击进入查询</a></b>"), myTime.showTime(), currentSubmitStatus = !0, nick = nick.replace(/­/g, ""), $.ajax({
        type: "post",
        url: "handler/load.aspx/Load",
        data: "{'nick':'" + escape(nick) + "'}",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (data) {
            _token = $.To(data.d + c + "8") + "_" + data.d, $.ajax({
                type: "get",
                url: "handler/TaobaoInfo.ashx",
                data: "nickCode=" + escape(nick) + "&token=" + _token,
                cache: !1,
                dataType: "text",
                timeout: 5e4,
                beforeSend: function () {
                    $("#divResult").html(searchStatusTxt)
                },
                success: function (data) {
                    var json, tbInfoMoban, tbNickInfo, isError, endTime, yongshi;
                    myTime.stopTime(), "" != data ? (data = zhuangma(data), json = eval(data), tbInfoMoban = json[0]["tbInfoMoban"], tbNickInfo = json[0]["tbNickInfo"], isError = json[0]["isError"], endTime = (new Date).getTime(), yongshi = (endTime - startTime) / 1e3, $("#divResult").html(decodeURIComponent(tbInfoMoban)), $("#checkTime").html(yongshi + "秒"), insertAds(), "false" == isError && (GetTaobaoRateNumber(tbNickInfo, nick), GetJubaoInfo(tbNickInfo, nick))) : ($("#divResult").html("亲,请CTRl+F5刷新页面,如多次尝试无效，请联系管理员。"), WriteError1(nick)), currentSubmitStatus = !1
                },
                error: function () {
                    myTime.stopTime(), $("#divResult").html("获取信息失败，请重新提交！<b style=' margin-left:20px;'>可以使用备用网站查询：<a href='http://cha.kukatao.com/'>点击进入查询</a></b>"), currentSubmitStatus = !1
                }
            })
        },
        error: function () {
            myTime.stopTime(), $("#divResult").html("亲,请CTRl+F5刷新页面,如多次尝试无效，<b style=' margin-left:20px;'>可以使用备用网站查询：<a href='http://cha.kukatao.com/'>点击进入查询</a></b>"), currentSubmitStatus = !1
        }
    })), searchTime = 1, setTimeout(function () {
        searchTime = 0
    }, 1200), void 0))
}
function GetTaobaoRateNumber(tbNickInfoJson, nick) {
    var myTime, token;
    _tbNickInfoJson = tbNickInfoJson, myTime = new handlerTime("#rateLoad", "数据载入失败,请[<a href='#' style='color:blue;' onclick='RefreshTaobaoRateNumber()'>点击重试</a>]."), myTime.showTime(), token = $("#t").val(), $.ajax({
        type: "get",
        url: "handler/TaobaoInfo.ashx",
        data: "tbNickInfoJson=" + encodeURIComponent(nick) + "&token=" + _token,
        dataType: "json",
        timeout: 4e4,
        cache: !1,
        beforeSend: function () {
            $("#rateLoad").show(), $("#giveRateInfo").hide(), $("#rateLoad").html(searchStatusTxt)
        },
        success: function (msg) {
            var json, zpNumber, cpNumber, zcpBL, SecurityLevel, isSeller, nick;
            myTime.stopTime(), "" != msg ? (json = eval(msg), zpNumber = json[0]["zhongping"], cpNumber = json[0]["chaping"], zcpBL = json[0]["zcpBL"], SecurityLevel = json[0]["SecurityLevel"], isSeller = json[0]["isSeller"], nick = json[0]["nick"], $("#rateLoad").hide(), $("#giveRateInfo").show(), $("#zhongpingNumber").html(zpNumber), $("#chapingNumber").html(cpNumber), $("#zcbl").html(zcpBL), $("#anquanlevelMsg").hide(), $("#anquanLevel").show(), $("#anquanLevel").html(decodeURIComponent(SecurityLevel)), ("True" == isSeller || "true" == isSeller) && ($("#shopInfo").show(), GetShopInfo(nick))) : ($("#rateLoad").show(), $("#giveRateInfo").hide(), $("#rateLoad").html("亲,请CTRl+F5刷新页面,如多次尝试无效，请联系我们。"))
        },
        error: function () {
            myTime.stopTime(), $("#rateLoad").show(), $("#giveRateInfo").hide();
            var c = '数据载入失败,请[<a href="#" style="color:blue;" onclick="RefreshTaobaoRateNumber()">点击重试</a>].';
            $("#rateLoad").html(c)
        }
    })
}
function RefreshTaobaoRateNumber() {
    null != _tbNickInfoJson && GetTaobaoRateNumber(_tbNickInfoJson)
}
function showGoTop() {
    var a = "返回顶部", b = $('<div class="gotop" id="gotop" style="display:none;"></div> ').appendTo($("body")).text(a).attr("title", a).click(function () {
        $("html, body").animate({scrollTop: 0}, 800)
    }), c = function () {
        var a = $(document).scrollTop(), c = $(window).height();
        a > 0 ? b.show() : b.hide(), window.XMLHttpRequest || b.css("top", a + c - 166)
    };
    $(window).bind("scroll", c), $(function () {
        c()
    })
}
function gotopMoveCss() {
    $("#gotop").addClass("gotop_2"), $("#gotop").removeClass("gotop")
}
function gotopOutCss() {
    $("#gotop").addClass("gotop"), $("#gotop").removeClass("gotop_2")
}
function WriteError(a) {
    $.ajax({
        type: "get",
        url: "handler/Error.ashx",
        data: "nick=" + escape(a),
        cache: !1,
        dataType: "text",
        beforeSend: function () {
        },
        success: function () {
        },
        error: function () {
        }
    })
}
function WriteError1(a) {
    $.ajax({
        type: "get",
        url: "handler/Error.ashx?errorType=true&nick=" + escape(a),
        cache: !1,
        dataType: "text",
        beforeSend: function () {
        },
        success: function () {
        },
        error: function () {
        }
    })
}
function zhuangma(a) {
    return a = encodeURIComponent(a), a = a.replace("*number1*", "[{"), a = a.replace("*number2*", '"tbInfoMoban"'), a = a.replace("*number3*", ':"'), a = a.replace("*number4*", '",'), a = a.replace("*number5*", '"isError"'), a = a.replace("*number6*", ':"'), a = a.replace("*number7*", '",'), a = a.replace("*number8*", '"tbNickInfo"'), a = a.replace("*number9*", ':"'), a = a.replace("*number10*", '"}]')
}
function GetShopInfo(a) {
    var b = $.To(a + c + "8");
    $.ajax({
        type: "get",
        url: "handler/ShopInfo.ashx?nick=" + escape(a) + "&token=" + b,
        cache: !1,
        dataType: "text",
        beforeSend: function (a) {
            a.setRequestHeader("text", "true")
        },
        success: function (a) {
            $("#shopInfoHtml").html(a)
        },
        error: function () {
        }
    })
}
function WriteError2(a, b, c) {
    $.ajax({
        type: "get",
        url: "handler/Error.ashx?yongshi=" + b + "&nick=" + escape(a) + "&isError=" + c,
        cache: !1,
        dataType: "text",
        beforeSend: function () {
        },
        success: function () {
        },
        error: function () {
        }
    })
}
function GetJubaoInfo(a, b) {
    var c = new handlerTime("#jubaoInfo", "数据载入失败,请[<a href='#' style='color:blue;' onclick='GetJubaoInfo(" + a + "," + b + ")'>点击重试</a>].");
    c.showTime(), $.ajax({
        type: "get",
        contentType: "application/json",
        url: "http://www.7jubao.com/API/GetJBInfoByNickAPI.ashx",
        data: "nick=" + escape(b) + "&token=" + a,
        dataType: "jsonp",
        jsonp: "jsonpCallback",
        cache: !1,
        beforeSend: function () {
            $("#jubaoInfo").html(searchStatusTxt)
        },
        success: function (a) {
            c.stopTime(), $("#jubaoInfo").html(decodeURIComponent(a.info))
        },
        error: function () {
            c.stopTime();
            var d = "获取举报信息失败，请刷新页面重新获取！11";
            $("#jubaoInfo").html(d)
        }
    })
}
function btn_CheckCode() {
    var a = $("#CheckCode").val();
    $.ajax({
        type: "get", url: "handler/JyCode.ashx?code=" + a, cache: !1, dataType: "text", beforeSend: function () {
        }, success: function (a) {
            "false" == a ? (alert("验证码输入错误"), document.getElementById("imgcode").src = "handler/CheckCode.ashx?" + Math.random()) : "true" == a ? GetTaobaoNickInfo() : (alert(a), document.getElementById("imgcode").src = "handler/CheckCode.ashx?" + Math.random())
        }, error: function () {
        }
    })
}
var currentSubmitStatus, miao, searchStatusTxt, searchTime, _token, _tbNickInfoJson, c = "vvl";
$(function () {
    $("#gongGaoContent").html('<a style="color:#333;" href="#" target="_blank">亲，本站只免费提供淘宝账号信用查询，凡是第三方网站广告需要交纳费用才能兼职工作的，请自行判断真伪！本站不承担任何法律责任！</a>'), $("#txtNick").focus(), $(".weixinHover").bind("mouseout", function () {
        $(".qrcode-show").hide()
    }), $(".weixinHover").bind("mouseover", function () {
        $(".qrcode-show").show()
    }), $(".qrcode-show").bind("mouseout", function () {
        $(".qrcode-show").hide()
    }), $(".qrcode-show").bind("mouseover", function () {
        $(".qrcode-show").show()
    }), $("#btnSearchTB").bind("click", function () {
        GetTaobaoNickInfo()
    }), $("#txtNick").bind("focus  ", function () {
        focusTxtSelect()
    }), showGoTop(), $("#gotop").bind("mousemove", function () {
        gotopMoveCss()
    }), $("#gotop").bind("mouseout", function () {
        gotopOutCss()
    })
}), $(document).keydown(function (a) {
    13 == a.keyCode && GetTaobaoNickInfo()
}), currentSubmitStatus = !1, miao = 40, searchStatusTxt = "正在载入数据,请稍候，如超过<font color='red'><b>" + miao + "</b></font>秒无响应请重新查询...", handlerTime.prototype.showTime = function () {
    var b, a = "正在载入数据,请稍候，如超过<font color='red'><b>" + this.time + "</b></font>秒无响应请重新查询...";
    $(this.controlID).html(a), b = this, this.timerID = setTimeout(function () {
        b.showTime()
    }, 1e3), this.time = this.time - 1, this.time < 0 && ($(this.controlID).html(this.errorStatusTxt), clearTimeout(this.timerID), currentSubmitStatus = !1)
}, handlerTime.prototype.stopTime = function () {
    clearTimeout(this.timerID)
}, searchTime = 0, _token = 0, _tbNickInfoJson = null;
function insertAds() {
    html = "<a href=\"http://www.7jubao.com/?f=131458  \"  target=\"_blank\" title=\"11.20\"><img  src=\"union/images/7jubao.jpg?ver=1\" /></a>";
    html += "<a href=\"http://www.eliuliang.com/?r=2\"  target=\"_blank\" title=\"10.26\"><img style=\"margin-top:6px;\" src=\"union/images/eliuliang18072.gif?ver=1212\" /></a>";
    $(".inq_02_R").html(html);
}
