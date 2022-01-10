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
        همه سفارشات
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
                            <th scope="col">رد کردن</th>
                            <th scope="col">قبول کردن</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $userId = $_COOKIE["userid"];
                        $sql = function () use (&$userId) {
                            return "SELECT * FROM `order` WHERE status = 1";
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
                                <td> <a class="btn btn-danger table_btn_icon" href="change_order_status.php?status=reject&order=<?php echo $row['order_id'] ?>">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg>

                                    </a></td>
                                <td> <a class="btn btn-success table_btn_icon" href="change_order_status.php?status=accept&order=<?php echo $row['order_id'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>

                                    </a></td>

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