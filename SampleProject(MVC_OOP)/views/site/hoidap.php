<?php include_once "../views/site/layout/header.php" ?>

<?php include_once "../views/site/layout/menu.php" ?>

<div class="row-main no-gutters">
    <div>
        <!--        main-content         -->
        <h1>Hỏi đáp</h1>
    </div>
    <div class="rounded">
        <div class="border">
            <!--     tai khoan        -->
            <?php require '../views/site/layout/dang-nhap.php'; ?>
        </div>
        <div class="border mt-4">
            <!--     loai hang        -->
            <?php require '../views/site/layout/loai-hang.php'; ?>
        </div>
        <div class="border mt-4">
            <!--     top 10           -->
            <?php require '../views/site/layout/top10.php'; ?>
        </div>
    </div>
</div>

<?php include_once "../views/site/layout/footer.php" ?>