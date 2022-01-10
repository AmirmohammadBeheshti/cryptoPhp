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
        کاربران
    </div>
    <div class="container">
        <div class="card text-center d-block mr-auto ml-auto mt-5 cardColor shdow box-shadow text-white">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"> شماره کاربری</th>
                            <th scope="col">نام کاربری</th>
                            <th scope="col">نام </th>

                            <th scope="col">نام خانوادگی</th>
                            <th scope="col">تاریخ تولد</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $userId = $_COOKIE["userid"];
                        $sql = function () use (&$userId) {
                            return "SELECT * FROM `users`";
                        };
                        $finalSql = $sql();
                        $getResult = $conn->query($finalSql);
                        $i = 0;
                        foreach ($getResult as $row) {
                            $i++;
                            if (!$row['isAdmin']) {

                        ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <th><?php echo $row['username'] ?></th>
                                    <th scope="row"><?php echo $row['name'] ?></th>
                                    <td><?php echo $row['family'] ?></td>
                                    <td><?php echo $row['birth'] ?></td>


                                </tr>

                        <? }
                        }
                        ?>



                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <a class="btn btn-primary w-100" href="all_order.php">همه سفارشات</a>
                    </div>
                    <div class="col-md-6 col-12">
                        <a class="btn btn-success w-100" href="all_trade.php">همه معاملات</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>