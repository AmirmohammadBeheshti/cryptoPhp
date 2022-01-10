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
        سفارشات
    </div>
    <div class="container">
        <div class="card text-center d-block mr-auto ml-auto mt-5 cardColor shdow box-shadow text-white">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">شماره سفارش</th>
                            <th scope="col">نام ارز</th>
                            <th scope="col">مقدار ارز</th>
                            <th scope="col">موجودی کیف پول</th>
                            <th scope="col">وضعیت</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $userId = $_COOKIE["userid"];
                        $sql = function () use (&$userId) {
                            return "SELECT * FROM `order` WHERE user_id=$userId ORDER By order_id DESC LIMIT 25";
                        };
                        $finalSql = $sql();
                        $getResult = $conn->query($finalSql);
                        $i = 0;
                        foreach ($getResult as $row) {
                            $i++;
                        ?>
                            <tr>
                                <th scope="row"><?php echo $row['order_id'] ?></th>
                                <td><?php echo $row['coin_name'] ?></td>
                                <td><?php echo $row['value'] ?></td>
                                <td><?php echo $row['price'] ?></td>

                                <td>
                                    <div class="status_label">
                                        <?php
                                        $getStatus = $row['status'];
                                        switch ($getStatus) {
                                            case 1:
                                                echo 'در انتظار تایید';
                                                break;
                                            case 2:
                                                echo 'تایید شده';
                                                break;
                                            case 3:
                                                echo 'رد شده';
                                                break;
                                            default:
                                                break;
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>

                        <? }
                        ?>



                    </tbody>
                </table>
                <a href="add_order.php" class="btn btn-primary w-100">ثبت سفارش جدید</a>
            </div>
        </div>
    </div>
</body>

</html>