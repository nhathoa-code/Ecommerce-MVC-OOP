 <h3 class="p-3 border-bottom bg-light mb-0" style="font-size: 1.3rem;font-weight: normal">TOP 10 YÊU THÍCH</h3>
 <div class="list-group">
     <?php

        use Models\HangHoa;

        $top10 = HangHoa::where("dac_biet", "=", "1")->orderBy("so_luot_xem", "DESC")->take(10)->get();

        foreach ($top10 as $item) :
            $href = "./hang-hoa-chi-tiet?ma_hh=$item->ma_hh";
        ?>
         <div class="top10 product-top10 list-group-item list-group-item-action">
             <img src="../content/images/products/<?= $item->hinh ?>">
             <a href="<?= $href ?>" class=""><?= $item->ten_hh ?></a>
         </div>

     <?php endforeach ?>

 </div>