  <h3 class="p-3 border-bottom bg-light mb-0" style="font-size: 1.3rem;font-weight: normal">DANH MỤC</h3>
  <div class="list-group">
    <?php

    use Models\LoaiHang;

    $loais = LoaiHang::all();

    ?>
    <?php foreach ($loais as $loai) : ?>
      <a href="./hang-hoa-danh-sach?ma_loai=<?= $loai->ma_loai ?>" class="list-group-item list-group-item-action"><?= $loai->ten_loai ?></a>
    <?php endforeach ?>
    <a href="./hang-hoa-danh-sach" class="list-group-item list-group-item-action">Tất cả</a>
  </div>
  <div class="search-form">
    <form action="./hang-hoa-tim-kiem" method="get">
      <input name="tu_khoa" placeholder="Từ khóa tìm kiếm">
    </form>
  </div>