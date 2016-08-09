var login = $(function () {
    $("#loginBtn").on("click", function () {
        var Login = React.createClass({
            handleLogin: function () {
                var email = $("input[name = 'email']").val();
                var password = $("input[name = 'password']").val();
                if(email && password){
                    $.ajax({
                        async: true,
                        type: "post",
                        data: {"email": email, "password": password},
                        url: "/my/web/app_dev.php/login",
                        dataType: "jsonp"},
                        function(data, status){
                            alert(data + status);
                        }
                    );
                }
            },
            render: function () {
                return (
                    <div>
                        <span className="fa fa-times-circle fa-lg" id="close"> </span>
                        <form method="post" autoComplete="off">
                            <label>邮箱：</label><input name="email" type="email" /><br/>
                            <label>密码：</label><input name="password" type="password" /><br/>
                            <span onClick={this.handleLogin}>登录</span><span>忘记密码=。=</span>
                        </form>
                    </div>
                )
            }
        });
        ReactDOM.render(
           <Login/>,
           $("#login-container")[0]
        );
        $("#login-container").fadeIn(500);
        $(".mask").fadeIn(500);
        $("#close").on("click", function () {
            $("#login-container").fadeOut(500);
            $(".mask").fadeOut(500);
        })
    });
});


// var LogIn = React.createClass({
//     getInitialState:function () {
//         return {a:"", b:""};
//     },
//     handleChangeA:function (event) {
//         this.setState({a: event.target.value});
//     },
//     handleChangeB:function (event) {
//         this.setState({b: event.target.value});
//     },
//     handleSubmit:function () {
//         var a = $("input[name = 'user']").val();
//         var b = $("input[name = 'password']").val();
//         $.ajax({
//             // (json.succ) ? this.setState({success: 0}): this.setState({success: 1});async: false,
//             async: false,
//             type: "POST",
//             url: "controllers/confirm.php?action=in",
//             data: {"user": a, "password": b},
//             dataType: "jsonp",
//             error: function (json) {
//                 alert(json.user);
//             }
//         });
//     },
//     render:function () {
//         // var text = (json.succ) ? "": "用户名或密码错误！";
//         return(
//             <div>
//                 <form id="in" name="flogin" method="post" autoComplete="off" onSubmit={this.handleSubmit}>
//                     {/*<input type="text" value={this.state.a} method="post" required="required" autoComplete="off" />*/}
//                     <label>用户名：<input type="text" name="user" value={this.state.a} onInput={this.handleChangeA} required="required" /></label>
//                     <label>密码：<input type="password" name="password" value={this.state.b} onInput={this.handleChangeB} required="required"  /></label>
//                     <input type="submit" value={"登录"} />
//                     {/*<p>{text}</p>*/}
//                 </form>
//             </div>
//         );
//     }
// });
// var LogOut = React.createClass({
//     handleClick:function () {
//         $.ajax({
//             async: false,
//             url:  "controllers/confirm.php?action=out",
//         });
//         location.reload();
//     },
//     render:function () {
//         return(
//             <div>
//                 <p>XX：您好！您已登录本站</p>
//                 <button onClick={this.handleClick}>退出登录</button>
//             </div>
//         )
//     }
// });
// //一个JSX文件里只会有一个REACTDOM.RENDER生效，就是最开始的那个=。=
// ReactDOM.render(
//     (logging) ? <LogOut/>: <LogIn />,
//     document.getElementById('log')
// );
// var data = [
//     {author: "Pete Hunt", text: "This is one comment"},
//     {author: "Jordan Walke", text: "This is *another* comment"}
// ];
// var Comment = React.createClass({
//     rawMarkup: function() {
//         var rawMarkup = marked(this.props.children.toString(), {sanitize: true});
//         return { __html: rawMarkup };
//     },
//     render: function() {
//         return (
//             <div className="comment">
//                 <h2 className="commentAuthor">
//                     {this.props.author}
//                 </h2>
//                 <span dangerouslySetInnerHTML={this.rawMarkup()} />
//             </div>
//         );
//     }
// });
// var CommentList = React.createClass({
//     render: function() {
//         var commentNodes = this.props.data.map(function (comment) {
//             return (
//                 <Comment author={comment.author}>
//                     {comment.text}
//                 </Comment>
//             );
//         });
//         return (
//             <div className="commentList">
//                 {commentNodes}
//             </div>
//         );
//     }
// });
// var CommentBox = React.createClass({
//     render: function() {
//         return (
//             <div className="commentBox">
//                 <h1>Comments</h1>
//                 <CommentList/>
//                 {/*<CommentForm />*/}
//             </div>
//         );
//     }
// });
// ReactDOM.render(
//     <CommentBox data={data} />,
//     document.getElementById('login')
// );
// var B = React.createClass({
//     render:function () {
//         return(
//             <div id="222"><p>无语</p></div>
//         )
//     }
// })
// $.ajax({
//     async: false,
//     url: "controllers/confirm.php",
//     dataType: "json",
//     success: function (data) {
//             alert(data.succ);
//     }
// });
// $.getJSON("controllers/confirm.php", function (json) {
//     alert(json.succ);
// });