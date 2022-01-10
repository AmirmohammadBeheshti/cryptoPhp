<?php
include('dbconfig.php');
include('authenticateUser.php');


$getUserId = $_COOKIE['userid'];
$sql = function () use (&$getUserId) {
    return "SELECT * FROM  `wallet` WHERE user_id=$getUserId";
};

$finalSql = $sql();
$getResult = $conn->query($finalSql);
$coin_name = '';
$value = 0;
$userId = 0;
$username = '';

$i = 0;
foreach ($getResult as $row) {
    $i++;
    $coin_name =  $row['coin_name'];
    $value = $row['value'];
    $userId = $row['user_id'];
    $username = $row['username'];

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
    <title>Amirmohammad Beheshti _ Wallet</title>
</head>

<body>
<nav class="navbar navbar-expand-lg cardColor">
        <a class="text-gray ml-4 nav-title-font " href="index.php">صرافی دیجیتال امیر
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
                <?php if ($isAdmin) { ?>
                    <a class="nav-item nav-link nav-item-size" href="all_order.php">همه سفارشات</a>
                    <a class="nav-item nav-link nav-item-size" href="all_trade.php">همه معاملات</a>
                    <a class="nav-item nav-link nav-item-size" href="users.php">کاربران</a>
                <? }
                ?>
                <a class="nav-item nav-link nav-item-size text-danger" href="login.php">خروج</a>
            </div>
        </div>
    </nav>
    <div class="title_border">
        کیف پول 
    </div>
    <div class="container">
        <div class="card text-center d-block mr-auto ml-auto mt-5 cardColor shdow box-shadow text-white">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <span>نام ارز : </span>
                        <span class="primart-text"> <?php echo $coin_name ?> </span>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-md-0 mt-5">
                        <span>موجودی کیف پول :</span>
                        <span class="primart-text"><?php echo $value ?> </span>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-5">
                        <span>شماره کاربری :</span>
                        <span class="primart-text"><?php echo $userId ?> </span>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-5">
                        <span>نام کاربری :</span>
                        <span class="primart-text"><?php echo $username ?> </span>
                    </div>
            
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-5">
                        <a href="order.php" class="btn btn-success w-100">سفارشات</a>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 mt-5">
                    <a href="trade.php" class="btn btn-primary w-100">معاملات</a>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</body>

</html>