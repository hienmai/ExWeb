<!doctype html>
<html>
<head>
<title>my first web</title>
	<meta charset="UTF-8">
	<link rel = "stylesheet" href = "cssIndex1.css" type  = "text/css">
	<script language = "javascript" src = "jsContent.js"></script>
	<script src="snowstorm.js"></script>
	<script type="text/javascript">
		snowStorm.snowColor = 'yellow'; // blue-ish snow!?
		snowStorm.flakesMaxActive = 100;  // show more snow on screen at once
		snowStorm.useTwinkleEffect = true; // let the snow flicker in and out of view
	</script>
</head>
<body onload = "textLogin();">


<script>
 // [1] Load lên các thành phần cần thiết
        window.fbAsyncInit = function () {
            FB.init({
                appId: '1763580173668236',
                cookie: true,
                xfbml: true,
                version: 'v2.8'
            });
            // Kiểm tra trạng thái hiện tại
            FB.getLoginStatus(function (response) {
                statusChangeCallback(response);
            });

        };

        // [2] Xử lý trạng thái đăng nhập
        function statusChangeCallback(response) {
            // Người dùng đã đăng nhập FB và đã đăng nhập vào ứng dụng
            if (response.status === 'connected') {
              window.location.href = 'http://localhost/webhoa/Trangchu.php'; // ShowWelcome();
            }
            // Người dùng đã đăng nhập FB nhưng chưa đăng nhập ứng dụng
            else if (response.status === 'not_authorized') {
                ShowLoginButton();
            }
            // Người dùng chưa đăng nhập FB
            else {
                ShowLoginButton();
            }
        }

        // [3] Yêu cầu đăng nhập FB
        function RequestLoginFB() {
            window.location = 'http://graph.facebook.com/oauth/authorize?client_id=1763580173668236&scope=public_profile,email,user_likes&redirect_uri=http://localhost';
        }

        // [4] Hiển thị nút đăng nhập
        function ShowLoginButton() {
            document.getElementById('btb').setAttribute('style', 'display:block');
            document.getElementById('lbl').setAttribute('style', 'display:none');
        }

        // [5] Chào mừng người dùng đã đăng nhập
        function ShowWelcome() {
            document.getElementById('btb').setAttribute('style', 'display:none');            
            FB.api('/me', function (response) {
                var name = response.name;
                var username = response.username;
                var id = response.id;
                document.getElementById('lbl').innerHTML = 'Tên=' + name + ' | username=' + username + ' | id=' + id;
                document.getElementById('lbl').setAttribute('style', 'display:block');
            });
        }

    </script>




<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=966461330152588";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="opa">
<div id="content">
		<form method = "post" name ="f"action = "xuLyIndex.php">
		<div class="bang">
			<table>
				<tr>
					<td height="35px">
						<a class="a1"href = "index.php">User</a>
					</td>
					<td>
						<a class="a3"href = "create.php"><i>Đăng kí tại đây</i></a>
					</td>
				</tr>
				<tr>
					<td height = "40px" class="text" ><p>Tên Đăng Nhập</td></p>
					<td><input type="text"name="txtTaiKhoan" size = "15"style = "color:darkblue;font-size:120%" /></td>
				</tr>
					<td height = "59px" class="text"><p>Mật Khẩu</td></p>
					<td><input type="password" name="txtMatKhau"size = "15"style = "color:darkblue;font-size:120%" /></td>
				<tr>
				<tr>
					<td>
						<input type="button" value="Facebook Login" size = "13" style = "color:darkblue;font-size:110%" onclick="RequestLoginFB()">
					</td>
					<td>
						<a class= "forget" href = "xuLyQuen.php"><i>Quên mật khẩu</i></a>
					</td>
				</tr>
				</tr>
				<tr height = "40px"><td colspan = "2" class="nut"> 
					<button  type = "submit" onclick ="ktNhap();"name ="submit"><b> <span style = "color:darkblue;font-size:140%">Đăng Nhập</span></b></button>
					<button  type = "reset"><b><span style = "color:darkblue;font-size:140%">Xóa Làm Lại</span></b></button>
				</td></tr>
			</table>
			</div>
			<div class="fb-like" data-href="https://webmai.hol.es" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
		<div class="fb-comments" data-href="https://webmai.holl.es" data-numposts="10"></div>
		</form>
</div>
</div>
</body>
</html>