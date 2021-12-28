<?php
include('dbconfig.php');


if (isset($_POST['loginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = function () use (&$username, &$password) {
        return "SELECT * FROM  `users` WHERE username = '$username' && password='$password'";
    };
    $finalSql = $sql();
    $getResult = $conn->query($finalSql);
    $i = 0;
    foreach ($getResult as $row) {
        $i++;
        setcookie("userid", $row['id'], time() + 2 * 24 * 60 * 60);
    }
    if ($i !== 0) {
        setcookie("userAuth", "true", time() + 2 * 24 * 60 * 60);
        echo '
        <script>
        alert("ورود با موفقیت انجام شد");
        window.location.href = "index.php";
        </script>
        ';
    } else {
        setcookie("userAuth", "false", time() + 2 * 24 * 60 * 60);
        echo '
        <script>
        alert("نام کاربری یا رمز عبور اشتباه است");
        </script>
        ';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style/bootstrap.css" />
    <link rel="stylesheet" href="./assets/style/style.css" />
    <title>Amirmohammad Beheshti _ Login</title>
</head>

<body>
    <div class="container">
        <div class="card element-center cardColor shdow box-shadow w-75 text-white">
            <div class="card-body">
                <h5 class="text-color border-bottom pt-1 pb-3">ورود</h5>
                <div class="pt-2"></div>
                <form autocomplete="false" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام کاربری را وارد کنید</label>
                        <input autocomplete="false" name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام کاربری">
                        <small id="emailHelp" class="form-text text-muted"> لطفا نام کاربری را با دقت پر کنید</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">رمز عبور را وارد کنید</label>
                        <input type="password" autocomplete="false" name="password" class="form-control" id="exampleInputPassword1" placeholder="رمز عبور">
                        <small id="emailHelp" class="form-text text-muted"> لطفا رمز عبور خود را وارد کنید</small>
                    </div>

                    <input type="submit" class="btn btn-success w-100" name="loginBtn" value="ورود" />
                    <a href="register.php" class="btn btn-primary mt-3">ثبت نام</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>