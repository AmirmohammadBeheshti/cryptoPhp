<?php
include('dbconfig.php');
include('authenticateUser.php');

$finalSql = "SELECT * FROM `coin`";
$getResult = $conn->query($finalSql);
$coin_name = '';
$amount = 0;
$price = 0;
$i = 0;
foreach ($getResult as $row) {
    $i++;
    $coin_name = $row['name'];
    $amount = (int)$row['amount'];
    $price = $row['price'];
}


if (isset($_POST['add_order'])) {

    $value = (int) $_POST['coin_value'];
    if ((int)$amount > (int)$value) {

        $userId = $_COOKIE["userid"];
        $sql = function () use (&$value, &$price, &$coin_name , &$userId) {
            return "INSERT INTO `order`(`value`, `price`, `coin_name`, `status` , `user_id`) VALUES ($value,$price,'$coin_name',1 , $userId)";
        };
        $coin_amount = (int)$amount - (int)$value;
        $decrease_coin = function () use (&$coin_amount) {
            return "UPDATE `coin` SET `amount`=$coin_amount WHERE id=1";
        };
        $changeOrderCount = function () use (&$coin_amount) {
            return "UPDATE `coin` SET `amount`=$coin_amount WHERE id=1";
        };
        $final_coin = $decrease_coin();
        $conn->query($final_coin);
        $finalSql = $sql();
        $conn->query($finalSql);
        echo '
     <script>
     alert("سفارش با موفقیت ثبت شد | به صفحه سفارشات هدایت می شوید");
     window.location.href = "order.php";
     </script>
     ';
    } else {
        echo '
    <script>
    alert("این مقدار از این ارز وجود ندارد");
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
        ثبت سفارش
    </div>
    <div class="container">
        <div class="card  d-block mr-auto ml-auto mt-5 cardColor shdow box-shadow text-white">
            <div class="card-body">
                <form method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">نام ارز</label>
                                <input autocomplete="false" type="text" class="form-control" id="exampleInputEmail1" disabled aria-describedby="emailHelp" value="<?php echo $coin_name ?>">
                                <small id="emailHelp" class="form-text text-muted"> نام ارزی که شما قصد خرید آن را دارید</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">مقدار موجود از این ارز</label>
                                <input autocomplete="false" type="text" class="form-control" id="exampleInputEmail1" disabled aria-describedby="emailHelp" value="<?php echo $amount ?>">
                                <small id="emailHelp" class="form-text text-muted"> مقدار موجودی که این ارز دارد</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">قیمت واحد ارز</label>
                                <input autocomplete="false" type="text" class="form-control" id="exampleInputEmail1" disabled aria-describedby="emailHelp" value="<?php echo $price ?>">
                                <small id="emailHelp" class="form-text text-muted"> قیمت خرید و فروش ارز</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">مقدار ارز مورد نیاز خود را وارد کنید</label>
                                <input autocomplete="false" value="0" name="coin_value" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted"> مقدار ارزی که نیاز دارید را وارد کنید</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" class="btn btn-success w-100" name="add_order" value="ثبت سفارش">
                        </div>



                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>