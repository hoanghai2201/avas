<?php
/**
 * The blog template file.
 *
 * @package          Trang Tien Plaza\Templates
 * @trangtienplaza-version 1.0.0
 */

get_header();
global $domain;
$current_product_id = get_the_ID();
$current_lang = pll_get_post_language($current_product_id);
$terms = wp_get_post_terms($current_product_id, 'project_category');
$terms_ids = wp_get_post_terms($current_product_id, 'project_category', ['fields' => 'ids']);
?>
<section id="section-1" class="pb-3">
    <div class="box-breadcrumb align-center">
        <ul>
            <?php
                $project_categories = get_terms([
                    'taxonomy'   => 'project_category',
                    'hide_empty' => false,
                ]);

                if (!empty($project_categories) && !is_wp_error($project_categories)) {
                    foreach ($project_categories as $category) {
                        $category_id = $category->term_id;
                        $category_name = pll__( $category->name );
                        $category_link  = get_term_link($category_id, 'project_category');
                        if(in_array($category_id, $terms_ids)){
                            $active = 'active';
                        }else{
                            $active = '';
                        }
            ?>
            <li>
                <a href="<?php echo esc_url($category_link); ?>" title="<?php echo esc_html($category_name); ?>" class="btn-breadcrumbs fw-400 fs-14 <?php echo $active; ?>"><?php echo esc_html($category_name); ?></a>
                <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.83333 1.33331L13.5 5.99998M13.5 5.99998L8.83333 10.6666M13.5 5.99998L1.5 5.99998" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: #ED1B24;"></path>
                </svg>
            </li>
            <?php
                    }
                }
            ?>
        </ul>
    </div>
</section>
<section id="section-2" class="py-4">
    <div class="container">
        <div class="row g-5 pt-120">
            <div class="col-md-6 col-sm-12">
                <?php
                $gallery = get_field('gallery');
                if($gallery) : ?>
                    <div class="project-gallery">
                        <div class="main-gallery">
                            <?php foreach ($gallery as $image) : ?>
                                <div class="gallery-cell item1-sync-img1-js">
                                    <img data-zoom-image="<?php echo esc_url($image['url']); ?>" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="thumb-gallery">
                            <?php foreach ($gallery as $image) : ?>
                                <div class="gallery-cell item1-sync-sm-img1-js">
                                    <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="detail-post">
                    <h1 class="c-detail-title pb-1"><?php the_title(); ?></h1>
                    <div class="box-packing">
                        <p class="packaging"><span><?php echo pll__('Packaging'); ?></span> <?php echo esc_html(get_field('packaging')); ?></p>
                        <p class="weight"><span><?php echo pll__('Net weight'); ?></span> <?php echo esc_html(get_field('net_weight')); ?></p>
                    </div>
                    <div class="product-desc">
                        <?php echo nl2br(esc_html(get_field('description'))); ?>
                    </div>
                    <button class="read-more mb-4"><?php echo pll__('Read More'); ?></button>
                    <?php if(!empty(get_field('link_button'))): ?>
                    <a class="btn-contact" href="<?php echo esc_url(get_field('link_button')); ?>">
                        <?php echo pll__('Contact Us'); ?>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.33333 3.3335L14 8.00016M14 8.00016L9.33333 12.6668M14 8.00016L2 8.00016" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <?php endif; ?> 
                    <div class="accordion py-5" id="listIngredients">
                    <?php
                        if(have_rows('list_info')):
                            $i = 0;
                            while(have_rows('list_info')) : the_row();
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
                                <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php if($i == 1){ echo 'show'; }  ?>" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#listIngredients">
                                    <div class="accordion-body">
                                        <?php echo $desc; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            endwhile;
                        endif;
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="section-3" class="py-5 section-related">
    <div class="container">
        <div class="box-title-related mb-2">
            <h2 class="fs-32 fw-600"><?php echo pll__('You May Also Like'); ?></h2>
        </div>
        <?php if(wp_is_mobile()): ?>
            <div class="carousel product-list js-flickity" data-flickity='{ "wrapAround": true, "pageDots": false, "groupCells": 2, "freeScroll": false }'>
                <?php
                    if (!empty($terms) && !is_wp_error($terms)) {
                        $category_ids = wp_list_pluck($terms, 'term_id'); 
                        $related_products = new WP_Query([
                            'post_type'      => 'project',
                            'posts_per_page' => 10,
                            'post__not_in'   => [$current_product_id],
                            'tax_query'      => [
                                [
                                    'taxonomy' => 'project_category',
                                    'field'    => 'term_id',
                                    'terms'    => $category_ids,
                                ],
                            ],
                            'lang'           => $current_lang,
                        ]);

                        if ($related_products->have_posts()) {
                            while ($related_products->have_posts()) {
                                $related_products->the_post();
                                $product_title = get_the_title();
                                $product_link = get_permalink();
                                $product_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                ?>
                <div class="carousel-cell">
                    <div class="new-product align-center has-hover">
                        <a href="<?php echo esc_url($product_link); ?>" title="<?php echo esc_html($product_title); ?>"><img class="product-img image-zoom" src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_title); ?>"></a>
                        <h3><a href="<?php echo esc_url($product_link); ?>" title="<?php echo esc_html($product_title); ?>"><?php echo esc_html($product_title); ?></a></h3>
                    </div>
                </div>
                <?php
                            }
                        }
                        wp_reset_postdata();
                    }
                ?>
            </div>
        <?php else: ?>
            <div class="carousel product-list-pc product-related js-flickity" data-flickity='{ "cellAlign": "left","imagesLoaded": true,"lazyLoad": 1,"wrapAround": true,"pageDots": false,"groupCells": 5, "freeScroll": false }'>
                <?php
                    if (!empty($terms) && !is_wp_error($terms)) {
                        $category_ids = wp_list_pluck($terms, 'term_id'); 
                        $related_products = new WP_Query([
                            'post_type'      => 'project',
                            'posts_per_page' => 10,
                            'post__not_in'   => [$current_product_id],
                            'tax_query'      => [
                                [
                                    'taxonomy' => 'project_category',
                                    'field'    => 'term_id',
                                    'terms'    => $category_ids,
                                ],
                            ],
                            'lang'           => $current_lang,
                        ]);

                        if ($related_products->have_posts()) {
                            while ($related_products->have_posts()) {
                                $related_products->the_post();
                                $product_title = get_the_title();
                                $product_link = get_permalink();
                                $product_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                ?>
                <div class="carousel-cell">
                    <div class="new-product align-center has-hover">
                        <a href="<?php echo esc_url($product_link); ?>" title="<?php echo esc_html($product_title); ?>"><img class="product-img image-zoom" src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_title); ?>"></a>
                        <h3><a href="<?php echo esc_url($product_link); ?>" title="<?php echo esc_html($product_title); ?>"><?php echo esc_html($product_title); ?></a></h3>
                    </div>
                </div>
                <?php
                            }
                        }
                        wp_reset_postdata();
                    }
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>

<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo $domain; ?>/wp-content/themes/aquariuss/js/jquery.zoom.min.js?v=1.0"></script>
<script>
    $(document).ready(function () {
        $('.item1-sync-sm-img1-js').click(function(e) {
            var bigImg = $('.item1-sync-img1-js').find("img").first(),
                smallImg = $(this).children("img");

            $('.item1-sync-sm-img1-js').css({'border': '1px solid rgba(189, 166, 166, 0.28)'});
            $(this).css({'border': '2px solid #4c97d8'});

            bigImg.attr('src', smallImg.attr('src'));

            $('.item1-sync-img1-js>.zoom1-js').trigger('zoom.destroy');
            $('.item1-sync-img1-js>.zoom1-js').zoom();
        });

        const desc = document.querySelector('.product-desc');
        const readMoreBtn = document.querySelector('.read-more');
        const maxHeight = parseInt(window.getComputedStyle(desc).maxHeight);

        function toggleReadMore() {
            if (desc.scrollHeight > maxHeight) {
                readMoreBtn.style.display = 'block';
            } else {
                readMoreBtn.style.display = 'none';
            }
        }

        toggleReadMore();

        readMoreBtn.addEventListener('click', function() {
            if (desc.classList.contains('expanded')) {
                desc.classList.remove('expanded');
                this.textContent = '<?php echo pll__('Read More'); ?>';
                toggleReadMore(); // Kiểm tra lại sau khi thu gọn
            } else {
                desc.classList.add('expanded');
                this.textContent = '<?php echo pll__('Read Less'); ?>';
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        $('.item1-sync-img1-js>img:first-child')
            .wrap('<div class="zoom1 zoom1-js"></div>')
            .parent()
            .zoom();

        var mainGallery = document.querySelector('.main-gallery');
        imagesLoaded(mainGallery, { background: true }, function(instance) {
            console.log('Main gallery images loaded:', instance.images.length);
            // document.querySelectorAll('.main-gallery .gallery-cell').forEach(cell => {
            //     cell.style.height = '100%';
            // });
            var mainFlkty = new Flickity(mainGallery, {
                cellAlign: 'center',
                contain: true,
                wrapAround: true,
                pageDots: false,
                <?php if(wp_is_mobile()): ?>
                draggable: false,
                <?php endif; ?>
                prevNextButtons: false,
            });
            mainFlkty.resize();
            mainFlkty.reloadCells();
            setTimeout(() => mainFlkty.resize(), 100);
            mainGallery.classList.add('loaded');
        });
        
        var thumbnailCarousel = document.querySelector('.thumb-gallery');
        imagesLoaded(thumbnailCarousel, { background: true }, function(instance) {
            console.log('Thumbnail gallery images loaded:', instance.images.length);
            // document.querySelectorAll('.thumb-gallery .gallery-cell').forEach(cell => {
            //     cell.style.height = '100%';
            // });
            var flkty = new Flickity(thumbnailCarousel, {
                asNavFor: '.main-gallery',
                contain: true,
                pageDots: false,
                prevNextButtons: true,
                wrapAround: <?php echo (count($gallery) > 4) ? 'true' : 'false'; ?>, 
                cellAlign: 'left',
                groupCells: 1,
                percentPosition: false
            });
            flkty.resize();
            setTimeout(() => flkty.resize(), 100);

            // thumbnailCarousel.on('change', function(index) {
            //     mainGallery.select(index);
            // });
        });

        // setTimeout(function(){
        //     $(".gallery-cell").css('height', '100%');
        // }, 200);
    });
</script>
