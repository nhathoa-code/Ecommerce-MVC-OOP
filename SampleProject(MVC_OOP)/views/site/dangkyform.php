<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.
    0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Document</title>
    <style>
        .error {
            display: inline-block;
            margin-top: 0.5rem;
            color: red;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;" class="text-info mt-2">ĐĂNG KÝ THÀNH VIÊN</h1>
    <?php
    if (isset($message)) {
        echo "<h5 class='alert alert-success'>" . $message . "</h5>";
    }
    ?>
    <form style="margin: 0 25rem;" action="./dang-ky" method="post">
        <div class="form-group">
            <label>Tên đăng nhập</label>
            <input type="text" class="form-control" name="ma_kh" value="<?php echo isset($validator) ? $validator->old("ma_kh") : "" ?>">
            <?php if (isset($error)) : ?>
                <?php if ($error->has("ma_kh")) : ?>
                    <span class="error"><?= $error->first("ma_kh") ?></span>
                <?php endif ?>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" class="form-control" name="mat_khau" value="<?php echo isset($validator) ? $validator->old("mat_khau") : "" ?>">
            <?php if (isset($error)) : ?>
                <?php if ($error->has("mat_khau")) : ?>
                    <span class="error"><?= $error->first("mat_khau") ?></span>
                <?php endif ?>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label>Xác nhận mật khẩu</label>
            <input type="password" class="form-control" name="mat_khau_confirmed" value="<?php echo isset($validator) ? $validator->old("mat_khau_confirmed") : "" ?>">
        </div>
        <div class="form-group">
            <label>Họ và tên</label>
            <input type="text" class="form-control" name="ho_ten" value="<?php echo isset($validator) ? $validator->old("ho_ten") : "" ?>">
            <?php if (isset($error)) : ?>
                <?php if ($error->has("ho_ten")) : ?>
                    <span class="error"><?= $error->first("ho_ten") ?></span>
                <?php endif ?>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label>Địa chỉ email</label>
            <input type="email" class="form-control" name="email" value="<?php echo isset($validator) ? $validator->old("email") : "" ?>">
            <?php if (isset($error)) : ?>
                <?php if ($error->has("email")) : ?>
                    <span class="error"><?= $error->first("email") ?></span>
                <?php endif ?>
            <?php endif ?>
        </div>
        <button type="submit" class="btn btn-outline-dark">Đăng ký</button>
        <a href="./" class="btn btn-outline-dark">Trang chủ</a>
    </form>
</body>

</html>