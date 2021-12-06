<?php
//Bảo mật website
// if (!isset($_SESSION['user']) || $_SESSION['user']['vai_tro'] != "Nhân viên") {
//     header("location:" . "$SITE_URL/trang-chinh");
// }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Web design sample project</title>
    <link href="../content/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../content/css/admin.css">
    <script src="../content/js/jquery-3.6.0.js"></script>
    <style>
        .error {
            color: red;
            margin-top: 0.5rem;
            display: inline-block;
        }
    </style>
</head>

<body class=" container">
    <h1 class="alert-danger p-3">QUẢN TRỊ WEBSITE</h1>
    <?php require '../views/admin/layout/menu.php'; ?>