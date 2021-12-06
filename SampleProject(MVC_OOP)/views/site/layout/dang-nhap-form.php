 <h3 class="p-3 border-bottom bg-light" style="font-size: 1.3rem;font-weight: normal">TÀI KHOẢN</h3>
 <form class="p-3" action="./khach-hang-dang-nhap" method="post">
     <div class="form-group">
         <label>Mã khách hàng:</label>
         <input type="text" name="ma_kh" class="form-control" value="<?php echo isset($_SESSION['ma_kh_old']) ? $_SESSION['ma_kh_old'] : "" ?>">
         <?php
            if (isset($_SESSION['ma_kh_error'])) {
                echo "<span class='error'>" . $_SESSION['ma_kh_error'] . "</span>";
            }
            ?>
     </div>
     <div class="form-group">
         <label>Mật khẩu:</label>
         <input type="password" name="mat_khau" class="form-control" value="<?php echo isset($_SESSION['mat_khau_old']) ? $_SESSION['mat_khau_old'] : "" ?>">
         <?php
            if (isset($_SESSION['mat_khau_error'])) {
                echo "<span class='error'>" . $_SESSION['mat_khau_error'] . "</span>";
            }
            ?>
     </div>
     <div class="form-group form-check border py-1 px-2 rounded">
         <label class="form-check-label">
             <input class="form-check-input ml-0" name="ghi_nho" type="checkbox"> <span class="pl-4">Ghi nhớ tài khoản?</span>
         </label>
     </div>
     <!-- <input type="hidden" name="dang-nhap-layout"> -->
     <button type="submit" class="btn btn-outline-dark">Đăng nhập</button>
     <ul class="ml-4 mt-3">
         <li><a href="./dang-ky-form">Đăng ký thành viên</a></li>
     </ul>
     <?php
        unset($_SESSION['ma_kh_error'], $_SESSION['mat_khau_error'], $_SESSION['ma_kh_old'], $_SESSION['mat_khau_old']);
        ?>
 </form>