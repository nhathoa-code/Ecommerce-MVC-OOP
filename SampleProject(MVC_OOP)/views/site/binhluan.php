<?php
if (count($binh_luan_list) > 0) {
?>
    <div class="comments-container">
        <?php
        foreach ($binh_luan_list as $bl) {
        ?>
            <div data-id="<?= $bl->ma_bl ?>" class="comment">
                <div class="nguoi-binh-luan">
                    <div style="flex: 1;">
                        <p class="name"><?= $bl->ma_kh ?></p>
                        <p class="date"><?= $bl->ngay_bl ?></p>
                    </div>
                    <?php
                    if (isset($_SESSION['user']) && $_SESSION['user']['ma_kh'] == $bl->ma_kh) :
                    ?>
                        <div class="comment-control">
                            <button data-id="<?= $bl->ma_bl ?>" class="edit btn btn-outline-dark">Edit</button>
                        </div>
                    <?php endif ?>
                </div>
                <p data-id="<?= $bl->ma_bl ?>" class="noi-dung edit-note">
                    <?= $bl->noi_dung ?>
                </p>
            </div>
        <?php } ?>
    </div>
    <?php
    $total_pages = ceil($total_rows / $limit);
    if ($total_pages > 1) :
    ?>
        <?php if ($total_pages > 3) : ?>
            <span class="page-nav">
                <?php for ($i = 1; $i <= 3; $i++) : ?>
                    <span class="item">
                        <a class="page <?php echo $i == 1 ? "active-page" : "" ?>" data-page="<?= $i ?>"><?= $i ?></a>
                    </span>
                <?php endfor ?>
                <span class="item">
                    <a class="page" data-page="<?= $total_pages ?>">Last</a>
                </span>
            </span>
        <?php else : ?>
            <span class="page-nav">
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <span class="item">
                        <a class="page <?php echo $i == 1 ? "active-page" : "" ?>" data-page="<?= $i ?>"><?= $i ?></a>
                    </span>
                <?php endfor ?>
                <span class="item">
                    <a class="page" data-page="<?= $total_pages ?>">Last</a>
                </span>
            </span>
        <?php endif ?>
    <?php endif ?>

<?php } ?>
<?php
if (!isset($_SESSION['user'])) {
    echo '<h4 style="color:#04AA6D;margin-top:2rem">ĐĂNG NHẬP ĐỂ BÌNH LUẬN</h4>';
} else {
?>
    <form action="./binh-luan-them" method="get">
        <textarea name="noi_dung" rows="4"></textarea>
        <input type="hidden" name="ma_hh" value="<?php echo $_GET['ma_hh'] ?>">
        <button type="submit" class="btn btn-outline-dark">Gửi bình luận</button>
    </form>
<?php } ?>




<script>
    $(document).on("click", ".edit", function() {
        if (!$("p[data-id=" + $(this).data("id") + "]").next().hasClass("xac-nhan")) {
            $(".xac-nhan").remove();
            $("p[data-id=" + $(this).data("id") + "]").attr("contenteditable", "true");
            $("p[data-id=" + $(this).data("id") + "]").css("border-bottom", "1px solid #99a2aa");
            $("p[data-id=" + $(this).data("id") + "]").focus();
            let btn = $("<button>").attr("class", "xac-nhan btn btn-outline-dark");
            btn.attr("data-id", $(this).data("id"));
            btn.text("xác nhận");
            $("p[data-id=" + $(this).data("id") + "]").after(btn);
        }
    })

    $(document).on("click", '.xac-nhan', function() {
        let id = $(this).data("id");
        $.ajax({
            url: "./binh-luan-sua",
            method: "GET",
            data: {
                "ma_bl": $(this).data("id"),
                "noi_dung": $("p[data-id=" + $(this).data("id") + "]").text().trim()
            },
            success: function(data) {
                $("p[data-id=" + id + "]").css({
                    "border-bottom": "none"
                });
                $("p[data-id=" + id + "]").attr("contenteditable", "false");
                $("button[data-id=" + id + "].xac-nhan").remove();
            },
            error: function(message) {
                console.log(message);
            }
        })
    })

    <?php if (count($binh_luan_list) > 0) : ?>
        $(document).on("click", ".page", function() {
            $.ajax({
                url: "./tai-binh-luan",
                method: "GET",
                dataType: "json",
                data: {
                    "total_pages": <?= $total_pages ?>,
                    "limit": <?= $limit ?>,
                    "page_num": $(this).data("page"),
                    "ma_hh": <?= $ma_hh ?>
                },
                success: function(data) {
                    $(".comments-container").html(data.output);
                    $(".page-nav").html(data.nav_page);
                },
                error: function(message) {
                    console.log(message);
                }
            })
        });
    <?php endif ?>
</script>