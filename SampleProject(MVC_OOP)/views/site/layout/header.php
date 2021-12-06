<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../content/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="../content/css/trangchu.css">
    <style>
        .row-main {
            display: grid;
            grid-template-columns: 3.5fr 1fr;
            column-gap: 1rem;
        }
    </style>
</head>

<body>
    <h1 style="padding:0.5rem 0;margin-top:0.5rem" class="text-success">sampleproject(mvc_oop)
        <span class="float-right cart"><a href="./gio-hang"><i class="fas fa-shopping-cart"></i></a><span class="so-luong">
                <?php
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    $tong = 0;
                    foreach ($_SESSION['cart'] as $product) {
                        $tong += $product['so_luong'];
                    }
                    echo $tong;
                }
                ?></span></span>
    </h1>