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
        <div class="card  d-block mr-auto ml-auto mt-5 cardColor shdow box-shadow text-white">
            <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام ارز</label>
                            <input autocomplete="false" type="text" class="form-control" id="exampleInputEmail1" disabled aria-describedby="emailHelp"  value="امیر کوین">
                            <small id="emailHelp" class="form-text text-muted"> نام ارزی که شما قصد خرید آن را دارید</small>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">مقدار موجود از این ارز</label>
                            <input autocomplete="false" type="text" class="form-control" id="exampleInputEmail1" disabled aria-describedby="emailHelp" value="5345644564">
                            <small id="emailHelp" class="form-text text-muted"> مقدار موجودی که این ارز دارد</small>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">قیمت واحد ارز</label>
                            <input autocomplete="false" type="text" class="form-control" id="exampleInputEmail1" disabled aria-describedby="emailHelp" value="5345644564">
                            <small id="emailHelp" class="form-text text-muted"> قیمت خرید و فروش ارز</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">مقدار ارز مورد نیاز خود را وارد کنید</label>
                            <input autocomplete="false" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted"> مقدار ارزی که نیاز دارید را وارد کنید</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" class="btn btn-success w-100" value="ثبت سفارش">
                    </div>



                </div>
</form>
            </div>
        </div>
    </div>
</body>

</html>