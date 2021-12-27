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
                <form autocomplete="false">
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام کاربری را وارد کنید</label>
                        <input autocomplete="false" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام کاربری">
                        <small id="emailHelp" class="form-text text-muted"> لطفا نام کاربری را با دقت پر کنید</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">سال تولد خود را وارد کنید</label>
                        <input autocomplete="false" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام کاربری">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">رمز عبور را وارد کنید</label>
                        <input type="password" autocomplete="false" class="form-control" id="exampleInputPassword1" placeholder="رمز عبور">
                        <small id="emailHelp" class="form-text text-muted"> لطفا رمز عبور خود را وارد کنید</small>
                    </div>

                    <input type="submit" class="btn btn-success w-100" value="ثبت نام"/>
                    <a href="login.php" class="btn btn-primary mt-3">ورود</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>