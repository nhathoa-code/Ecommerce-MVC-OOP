<style>
    li {
        list-style-type: none;
    }
</style>
<div class="p-2 border-bottom bg-light">TÀI KHOẢN</div>
<div style="padding: 1rem;">
    <div style="text-align: center;display:flex;align-items:center;margin-bottom:0.5rem">
        <p style="margin-left: 1rem;"><?= $_SESSION['user']['ho_ten'] ?></p>
    </div>
    <li><a href="./khach-hang-dang-xuat">Đăng xuất</a></li>
    <?php
    if ($_SESSION['user']['vai_tro'] == "Nhân viên") {
        echo "<li><a href='../admin'>Quản trị website</a></li>";
    }
    ?>
</div>