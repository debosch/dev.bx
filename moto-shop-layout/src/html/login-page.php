<?php
require_once 'moto-shop-layout/src/html/header.php';
?>

    <!doctype html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="/moto-shop-layout/src/styles/login-page-style.css">
        <title>Document</title>
    </head>
    <body>

    <div class="container-fluid">
        <div class="wrapper">
            <div class="login-wrapper">
                <div class="row">
                    <div class="col">
                        <p class="login-label">Try the product out for free.</p>
                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control login-input black-border" placeholder="email" id="inputEmail1" aria-label="email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control login-input black-border" placeholder="password" id="inputPassword1" aria-label="password">
                            </div>
                            <button type="submit" class="btn btn-start-trial-text btn-dark btn-start-trial text-center">Start free trial</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
    </html>

<?php
require_once 'moto-shop-layout/src/html/footer.php';
?>