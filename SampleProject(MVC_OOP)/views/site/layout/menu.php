  <?php
    $request = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], "/", 1) + 1);
    ?>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link <?php echo $request == "site/" ? "active" : "" ?>" href="./">Trang chủ</a>
          </li>
          <li class="nav-item">
              <a class="nav-link <?php echo strpos($request, "gioi-thieu") ? "active" : "" ?>" href="./gioi-thieu">Giới thiệu</a>
          </li>
          <li class=" nav-item">
              <a class="nav-link <?php echo strpos($request, "lien-he") ? "active" : "" ?>" href="./lien-he">Liên hệ</a>
          </li>
          <li class=" nav-item">
              <a class="nav-link <?php echo strpos($request, "gop-y") ? "active" : "" ?>" href="./gop-y">Góp ý</a>
          </li>
          <li class=" nav-item">
              <a class="nav-link <?php echo strpos($request, "hoi-dap") ? "active" : "" ?>" href="./hoi-dap">Hỏi đáp</a>
          </li>
      </ul>
  </nav>