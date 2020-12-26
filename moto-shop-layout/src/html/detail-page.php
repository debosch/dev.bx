<?php
require_once 'moto-shop-layout/src/html/header.php';
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/moto-shop-layout/src/styles/detail-page-style.css">
    <title>Document</title>
</head>
<body>

<div class="container-fluid container-fluid-colored">
    <div class="wrapper">
        <div class="row">
            <div class="col-7">
                <h1>Feature that is amazing</h1>
                <p class="header-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <ul>
                    <li class="header-text">Benefit of Feature</li>
                    <li class="header-text">Benefit of Feature</li>
                    <li class="header-text">Benefit of Feature</li>
                </ul>
                <button type="button" class="btn btn-warning btn-lg buy-btn buy-btn-text text-center">Buy</button>
            </div>
            <div class="col-5">
                <div class="image-wrapper">
                    <img src="/moto-shop-layout/src/img/image8.png" class="img-fluid header-img" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="wrapper">
        <div class="row">
            <div class="col">
                <h1>Value Proposition</h1>
                <table class="table-bordered border-secondary">
                    <thead>
                    <tr class="secondary-colored">
                        <th class="table-header text-center table-first-col">Value Name</th>
                        <th class="table-header table-text table-second-col">Property</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="table-text">
                            <td class="table-text table-first-col">First value proposition</td>
                            <td class="table-text table-second-col">First Property proposition</td>
                        </tr>
                        <tr>
                            <td class="table-text table-first-col">Second value proposition</td>
                            <td class="table-text table-second-col">Second Property proposition</td>
                        </tr>
                    </tbody>
                    <thead>
                    <tr>
                        <th class="table-header secondary-colored text-center" colspan="2">Additional Property</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <td class="table-text table-first-col">First value proposition</td>
                        <td class="table-text table-second-col">First Property proposition</td>
                    </tr>
                    <tr>
                        <td class="table-text table-first-col">Second value proposition</td>
                        <td class="table-text table-second-col">Second Property proposition</td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-warning btn-lg buy-btn buy-btn-short buy-btn-text text-center">Buy</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
require_once 'moto-shop-layout/src/html/footer.php';
?>

