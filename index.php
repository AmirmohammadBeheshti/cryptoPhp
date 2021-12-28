<?php
include('dbconfig.php');
include('authenticateUser.php');


$getUserId = $_COOKIE['userid'];
$sql = function () use (&$getUserId) {
    return "SELECT * FROM  `users` WHERE id=$getUserId";
};


// echo $nameValue;
$finalSql = $sql();
$getResult = $conn->query($finalSql);
$username = '';
$status = '';
$userId = '';
$name = '';
$family = '';
$birth = '';
$i = 0;
foreach ($getResult as $row) {
    $i++;
    $username =  $row['username'];
    if ($row['isAdmin'] == true) {
        $status = 'ادمین';
    } else {
        $status = 'کاربر';
    }
    $userId = $row['id'];
    $birth = $row['birth'];
    $name = $row['name'];
    $family = $row['family'];
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
    <title>Amirmohammad Beheshti _ Index</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg cardColor">
        <a class="text-gray ml-4 nav-title-font " href="/">صرافی دیجیتال امیر
            <span class="border-left mr-3"></span>
        </a>
        <div class=""></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link nav-item-size" href="index.php">خانه <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link nav-item-size" href="wallet.php">کیف پول</a>
                <a class="nav-item nav-link nav-item-size" href="add_order.php">ثبت سفارش</a>
                <a class="nav-item nav-link nav-item-size" href="order.php">سفارشات</a>
                <a class="nav-item nav-link nav-item-size" href="trade.php">معاملات</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card text-center d-block mr-auto ml-auto mt-5 cardColor shdow box-shadow text-white">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 ">
                        <span>نام : </span>
                        <span class="primart-text name_inpt"><?php echo $name ?> </span>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-md-0 mt-5">
                        <span>نام خانوادگی : </span>
                        <span class="primart-text family_inpt"><?php echo $family ?> </span>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-5">
                        <span>نام کاربری : </span>
                        <span class="primart-text name_inpt"><?php echo $username ?> </span>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-5">
                        <span> وضعیت حساب :</span>
                        <span class="primart-text family_inpt"><?php echo $status ?> </span>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-5">
                        <span>شماره کاربری :</span>
                        <span class="primart-text phone_inpt"><?php echo $userId ?> </span>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-5">
                        <span>تاریخ تولد : </span>
                        <span class="primart-text gender_inpt"><?php echo $birth ?> </span>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-5">
                        <a href="add_order.php" class="btn btn-success w-100">ثبت سفارش</a>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-5">
                        <a href="wallet.php" class="btn btn-primary w-100">کیف پول</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>