var search = $(function(){
    $("#search").on("click", function () {
        var a = $("#search").hasClass("active");
        if (!a) {
            $("#search0").css({
                "transform": "scale(1)",
                "opacity": "0.9",
                "transform-origin": "right top",
                "transition": "transform 0.75s ease-in-out, opacity 0.75s ease-in-out"
            });
            $("#search").addClass("active");
        } else {
            $("#search0").css({
                "transform": "scale(0)",
                "opacity": "0",
                "transform-origin": "right top",
                "transition": "transform 0.75s ease-in-out, opacity 0.75s ease-in-out"
            });
            $("#search").removeClass("active");
        }
    });
});

var newsshow = $(function () {
    // clearInterval(b);
    var b = setInterval(function () {
        var a = $("#ul0");
        if(!a.hasClass("active0")){
            a.css({"margin-left": "-20%"}).addClass("active0").removeClass("active1");return 0}
        if(!a.hasClass("active1")){
            a.css({"margin-left": "-40%"}).addClass("active1").removeClass("active2");return 0}
        if(!a.hasClass("active2")){
            a.css({"margin-left": "-60%"}).addClass("active2").removeClass("active3");return 0}
        if(!a.hasClass("active3")){
            a.css({"margin-left": "-80%"}).addClass("active3");return 0}
        if(!a.hasClass("active4")){
            a.css({"margin-left": "0%"}).removeClass("active3").removeClass("active0");return 0}
    }, 5500);
});

function comm() {
    try {
        var a = document.forms["fcomment"]["name"].value;
        var b = document.forms["fcomment"]["comment"].value;
        // $(document).ready(function () {
        //     $.post("controllers/comment.php", {user: a, comment: b}, function(result, status){
        //
        //     })
        // });
        $.ajax({
            //异步会导致没法写入数据库=。=卧槽啊
            async: false,
            type:"POST",
            dataType: "jsonp",
            url: "controllers/ccontroller.php",
            data: {"name": a, "comment": b},
            error: function () {
                alert("写入成功");
            }
        });
        // 为什么必须要alert才能载入？？？可能是请求时间的问题

    }catch (e){
        alert(e.message);
    }
}

var scroll = $(function () {
    $("#scroll").on("click", function () {
        $("html, body").animate({
            scrollTop: 0
        }, 400)
    });
    $(window).on("scroll", function () {
       if($(window).scrollTop() > ($(window).height() / 2)){
            $("#scroll").fadeIn(400);
       }else{
           $("#scroll").fadeOut(400);
       }
    });
    // addEventListener("wheel", function () {
    //     //定义在监听器外面不行，因为这是局部变量！
    //     var a = $(window).scrollTop();
    //         if (a > 100){
    //             $("#scroll").show()
    //                 .on("click",function () {
    //                 $("html").animate({
    //                     scrollTop: 0
    //                 },800)
    //             });
    //                 // return 0;
    //         }else {
    //             $("#scroll").hide();
    //             return 0;
    //         }
    //     });
});
$(function () {
    //实时监听INPUT
    $('#email').bind('input onpropertychange', function() {
        // $('#e').html($(this).val());

        //成功了！！
        var email = $("input[name='email']").val();
        $.ajax({
            async: true,
            type: "post",
            data: {"email": email},
            url: "/my/web/app_dev.php/login",
            dataType: "text",
            success: function (data) {
                $('#e').html(data);
            }
        });
    });

});
function a() {
    var comment = $("textarea[name = 'comment']").val();
    $.ajax({
        async: true,
        type: 'post',
        data: {'comment': comment},
        url: "/my/web/app_dev.php/comment/w",
        dataType: 'json',
        success: function (data) {
            $("#ncomment").html(data.c +" "+ data.d);
        },
        error:function () {
            alert("fail");
        }
    })
}
