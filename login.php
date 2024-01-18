<?
    require "inc/init.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $conn = require "inc/db.php";

        if($conn){
            // echo "Kết nối thành công <br/>";
             $rs = User::authenticate($conn, $username, $password);
             if($rs){
                   header('location: index.php');
             }else{
                 die("Thông tin đăng nhập không đúng");
             }
         }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylelogin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <div id="main">
        <div class="logo">MyProject</div>
        <form name="frmLOGIN" method="post">
            <div class="container">
                <div class="title_login"><i class='bx bxs-user'></i>   Vui lòng đăng nhập</div>
                <div class="box">
                    <label for="username">Tên đăng nhập:</label>
                    <input name="username" id="username"type="text" placeholder="Nhập tên đăng nhập" />
                </div>

                <div class="box">
                    <label class="distance" for="password">Mật khẩu:</label>
                    <input name="password" id="pasword"type="password" placeholder="Nhập mật khẩu"/>
                </div>

                <div class="register"><a href="">Chưa có tài khoản?</a></div>

                <div class="signin">
                    <input class="login" type="submit" value="Đăng nhập">
                </div>

            </div>
        </form>
    </div>
</body>
</html>