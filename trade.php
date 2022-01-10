<?php

include('dbconfig.php');
include('authenticateUser.php');
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
        معاملات
    </div>
    <div class="container">
        <div class="card text-center d-block mr-auto ml-auto mt-5 cardColor shdow box-shadow text-white">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">شماره معامله</th>
                        <th scope="col">شماره سفارش</th>
                        <th scope="col">شماره کاربری</th>
                          
                            <th scope="col">نام ارز</th>
                            <th scope="col">نام ارز</th>
                            <th scope="col">مقدار ارز</th>
                        </tr>
                    </thead>
                    <tbody>
                       

                    <?php
                        $userId = $_COOKIE["userid"];
                        $sql = function () use (&$userId) {
                            return "SELECT * FROM `trade` WHERE user_id=$userId ORDER By trade_id DESC LIMIT 25";
                        };
                        $finalSql = $sql();
                        $getResult = $conn->query($finalSql);
                        $i = 0;
                        foreach ($getResult as $row) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $row['trade_id'] ?></td>
                                <th><?php echo $row['order_id'] ?></th>
                                <th scope="row"><?php echo $row['user_id'] ?></th>
                                <td><?php echo $row['value'] ?></td>
                                <td><?php echo $row['coin_name'] ?></td>
                                <td><?php echo $row['price'] ?></td>

                         
                            </tr>

                        <? }
                        ?>



                    </tbody>
                </table>
                <a class="btn btn-primary w-100" href="order.php">سفارشات</a>
            </div>
        </div>
    </div>
</body>

</html>