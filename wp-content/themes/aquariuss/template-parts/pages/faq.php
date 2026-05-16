<?php
/**
 * Home Page.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
?>
<section id="section-1" class="pb-3">
    <div class="container">
        <div class="col-lg-12">
            <div class="info-item-large">
                <div class="desc-box ptm-0">
                    <h3 class="title-big fw-400 fs-50 pt-2 pb-3" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title'); ?></h3>
                    <div class="detail-box-large" data-aos="fade-up" data-aos-delay="200">
                        <?php echo get_field('description'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section-2" class="mt-3" style="background: #F6F6F6;">
    <div class="container">
        <div class="col-lg-12">
            <div class="accordion py-5" id="listFaq">
            <?php
                if(have_rows('list_faq')):
                    $i = 0;
                    while(have_rows('list_faq')) : the_row();
                        $i++;
                        $title = get_sub_field('title');
                        $desc  = get_sub_field('description');
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                            <button class="accordion-button <?php if($i > 1){ echo 'collapsed'; }  ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="<?php if($i == 1){ echo 'true'; }else{ echo 'false'; }  ?>" aria-controls="collapse<?php echo $i; ?>">
                                <?php echo $title; ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php if($i == 1){ echo 'show'; }  ?>" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#listFaq">
                            <div class="accordion-body">
                                <?php echo nl2br(esc_html($desc)); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;
                endif;
            ?>
            </div>
            <button class="show-more-faq">Show More</button>
        </div>
    </div>
</section>

<script>
    const items = document.querySelectorAll('.accordion-item');
    const showMoreBtn = document.querySelector('.show-more-faq');
    const maxItems = 8; // Số lượng item hiển thị ban đầu

    // Kiểm tra số lượng item và quyết định hiển thị nút
    function toggleShowMore() {
        if (items.length > maxItems) {
            showMoreBtn.style.display = 'block'; // Hiển thị nút nếu có hơn 8 item
        } else {
            showMoreBtn.style.display = 'none'; // Ẩn nút nếu có 8 hoặc ít hơn
        }
    }

    // Gọi hàm kiểm tra ngay khi tải trang
    toggleShowMore();

    // Xử lý sự kiện click
    showMoreBtn.addEventListener('click', function() {
        const isExpanded = this.textContent === 'Show Less';
        if (isExpanded) {
            items.forEach((item, index) => {
                if (index >= maxItems) {
                    item.classList.remove('show'); // Ẩn các item từ 9 trở đi
                }
            });
            this.textContent = 'Show More';
        } else {
            items.forEach((item, index) => {
                console.log(index);
                if (index >= maxItems) {
                    item.classList.add('show'); // Hiển thị tất cả item
                }
            });
            showMoreBtn.style.display = 'none';
        }
    });
</script>