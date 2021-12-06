  <?php
    $request = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], "/", 1) + 1);
    ?>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link <?php echo $request == "admin/" ? "active" : "" ?>" href="./">Trang chủ</a>
          </li>
          <li class=" nav-item">
              <a class="nav-link <?php echo strpos($request, "loai-hang") ? "active" : "" ?>" href="./loai-hang">Loại hàng</a>
          </li>
          <li class="nav-item">
              <a class="nav-link <?php echo strpos($request, "hang-hoa") ? "active" : "" ?>" href="./hang-hoa">Hàng hóa</a>
          </li>
          <li class="nav-item">
              <a class="nav-link <?php echo strpos($request, "khach-hang") ? "active" : "" ?>" href="./khach-hang">Khách hàng</a>
          </li>
          <li class="nav-item">
              <a class="nav-link <?php echo strpos($request, "binh-luan") ? "active" : "" ?>" href="./binh-luan">Bình luận</a>
          </li>
          <li class="nav-item">
              <a class="nav-link <?php echo strpos($request, "don-hang") ? "active" : "" ?>" href="./don-hang">Đơn hàng</a>
          </li>
          <li class="nav-item">
              <a class="nav-link <?php echo strpos($request, "thong-ke") ? "active" : "" ?>" href="./thong-ke">Thống kê</a>
          </li>
      </ul>
  </nav>