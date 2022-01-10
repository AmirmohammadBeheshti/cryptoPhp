<?php
include('dbconfig.php');
include('authenticateUser.php');
$getStatus =  $_REQUEST['status'];
$getOrderId =  $_REQUEST['order'];
if (isset($_REQUEST['status'])) {
    $sql = function () use (&$getOrderId, &$getStatus) {
        // tatus {
        //     1- pending 
        //     2- confirmed
        //     3-reject
        // }
        $statusId = 0;
        if ($getStatus == 'reject') {
            $statusId = 3;
        } else {
            $statusId = 2;
        }
        return "UPDATE `order` SET `status`=$statusId WHERE order_id=$getOrderId";
    };
    $finalSql = $sql();
    $conn->query($finalSql);
    $getUserSql = function () use (&$getOrderId) {
        return "SELECT * FROM  `order` WHERE order_id = $getOrderId ";
    };
    $getOrder = $getUserSql();
    $getOrderResult = $conn->query($getOrder);
    $coin_name = '';
    $userId = 0;
    $price = 0;
    $value = 0;
    $i = 0;
    foreach ($getOrderResult as $row) {
        $i++;
        $coin_name = $row['coin_name'];
        $userId = $row['user_id'];
        $price = $row['price'];
        $value = $row['value'];
    }
    $insertTradeSql = function () use (&$getOrderId, &$coin_name, &$userId, &$price, &$value) {
        return "INSERT INTO `trade`(`order_id`, `value`, `price`, `user_id`, `coin_name`) VALUES ($getOrderId , $value ,$price , $userId , '$coin_name' )";
    };
    $insertTrade = $insertTradeSql();
    $conn->query($insertTrade);
    
}else{
    echo '<script>
    alert("ورود غیر مجاز");
    window.location.href = "index.php";
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
    <title>Amirmohammad Beheshti _ Login</title>
</head>

<body>
    <div class="container">
        <div class="card element-center cardColor shdow box-shadow w-50 text-white ">
            <div class="card-body d-block mr-auto ml-auto">
                <!-- accept -->
                <?php if ($getStatus == 'accept') { ?>
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="green" class="bi bi-check2-all" viewBox="0 0 16 16">
                            <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z" />
                            <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z" />
                        </svg>
                    </div>
                    <div class="mt-3">
                        <h5>
                            عملیات قبول سفارش با موفقیت انجام شد
                        </h5>
                    </div><? } ?>
                <?php if ($getStatus == 'reject') { ?>
                    <!-- Reject -->
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                        </svg>
                    </div>
                    <div class="mt-3">
                        <h5>
                            عملیات رد سفارش با موفقیت انجام شد
                        </h5>
                    </div>
                <? } ?>
            </div>
            <div class="container mb-3">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <a href="all_order.php" class="btn btn-primary w-100">همه سفارشات</a>
                    </div>
                    <div class="col-md-6 col-12">
                        <a href="all_trade.php" class="btn btn-success w-100">همه معاملات</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>