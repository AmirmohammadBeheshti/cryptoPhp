<?php
include('dbconfig.php');


$getUser = "SELECT * FROM `users`";
$getUsers = $conn->query($getUser);

if (isset($_POST['insert'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $birthDay = $_POST['birth'];
    $name = $_POST['name'];
    $family = $_POST['family'];
    $validUser = false;
    $i = 0;
    foreach ($getUsers as $row) {
        if($username == $row['username'] ){
            $validUser = true;
            echo '<script>alert("نام کاربری تکراری می باشد")</script>';
        }else{
            $validUser = false;
        }
    }

    $sql = function () use (&$username, &$password , &$birthDay  ,&$name , &$family) {
        return "INSERT INTO `users`(`isAdmin`, `username`, `password` , `birth` , `name` , `family`) VALUES (false , '$username' , '$password' , '$birthDay' , '$name' , '$family')";
    };

    $finalSql = $sql();
    $conn->query($finalSql);
    setcookie("userAuth", "false", time() + 2 * 24 * 60 * 60);
    echo '<script>
    alert("ثبت نام با موفقیت انجام شد");
    </script>';
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
    <title>Amirmohammad Beheshti _ Register</title>
</head>

<body>
    <div class="container">
        <div class="card element-center cardColor shdow box-shadow w-75 text-white">
            <div class="card-body">
                <h5 class="text-color border-bottom pt-1 pb-3">ثبت نام</h5>
                <div class="pt-2"></div>
                <form method="post" autocomplete="false" >
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام کاربری را وارد کنید</label>
                        <input autocomplete="false" type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام کاربری">
                        <small id="emailHelp" class="form-text text-muted"> لطفا نام کاربری را با دقت پر کنید</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام را وارد کنید</label>
                        <input autocomplete="false" type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام ">
                        <small id="emailHelp" class="form-text text-muted"> لطفا نام خود را با دقت پر کنید</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام خانوادگی را وارد کنید</label>
                        <input autocomplete="false" type="text" name="family" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام خانوادگی">
                        <small id="emailHelp" class="form-text text-muted"> لطفا نام خانوادگی خود ا با دقت پر کنید</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">تاریخ تولد خود را وارد کنید</label>
                        <input autocomplete="false" type="date" name="birth" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">رمز عبور را وارد کنید</label>
                        <input type="password" autocomplete="false" name="password" class="form-control" id="exampleInputPassword1" placeholder="رمز عبور">
                        <small id="emailHelp" class="form-text text-muted"> لطفا رمز عبور خود را وارد کنید</small>
                    </div>

                    <input type="submit" class="btn btn-success w-100" name="insert" value="ثبت نام"/>
                    <a href="login.php" class="btn btn-primary mt-3">ورود</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>