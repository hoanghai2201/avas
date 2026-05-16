<?php
/**
 * Home Page.
 *
 * @package          Aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
get_header();

global $domain;
global $wp_query;
$term = get_queried_object();
$args = array(
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'lang'           => pll_current_language(),
    'orderby'        => 'date',
    'order'          => 'DESC',
    'tax_query'      => array(
        array(
            'taxonomy' => 'project_category',
            'field'    => 'term_id',
            'terms'    => $term->term_id,
        ),
    ),
);
$cate_id     = $term->term_id;
$query       = new WP_Query($args);
$banner      = get_field('banner', 'project_category_'.$cate_id);
$bannermb    = get_field('banner_mobile', 'project_category_'.$cate_id);
?>
<section id="section-1" class="py-4 ptm-0">
    <div class="container">
        <div class="col-lg-12">
            <div class="info-item-large">
                <?php if(wp_is_mobile()): ?>
                    <img src="<?php echo esc_url($bannermb['url']); ?>" />
                <?php else: ?>
                    <img src="<?php echo esc_url($banner['url']); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section id="section-2" class="pb-3" data-aos="fade-up">
    <div class="container">
        <div class="row w-auto g-<?php if(wp_is_mobile()){ echo '3'; }else{ echo '5'; } ?> justify-center gmb-15">
            <?php
                $project_categories = get_terms([
                    'taxonomy'   => 'project_category',
                    'hide_empty' => false,
                ]);
                if (!empty($project_categories) && !is_wp_error($project_categories)) {
                    foreach ($project_categories as $category) {
                        $category_id    = $category->term_id;
                        $category_name  = pll__( $category->name );
                        $category_link  = get_term_link($category_id, 'project_category');
                        $cateImage      = get_field('image', 'project_category_'.$category_id);
                        $cateImageHover = get_field('image_hover', 'project_category_'.$category_id);
                        ?>
                        <div class="col-md-2 col-sm-4 col-xs-4" data-aos="fade-up">
                            <div class="item-project align-center pointer">
                                <a href="<?php echo esc_url($category_link); ?>" title="<?php echo esc_attr($category_name); ?>">
                                    <img class="img-nohover" src="<?php echo esc_url($cateImage['url']); ?>" alt="<?php echo esc_attr($category_name); ?>">
                                    <img class="img-hover" src="<?php echo esc_url($cateImageHover['url']); ?>" alt="<?php echo esc_attr($category_name); ?>">
                                </a>
                                <h3><a href="<?php echo esc_url($category_link); ?>" title="<?php echo esc_attr($category_name); ?>"><?php echo esc_attr($category_name); ?></a></h3>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                }
            ?>
        </div>
    </div>
</section>
<section id="section-3" class="pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="category-products">
                    <div class="category-title" data-aos="fade-up">
                        <h2><?php echo single_cat_title('', false); ?></h2>
                    </div>
                <?php
                $imgNew = esc_url(get_option('icon_new'));
                if(empty($imgNew)){
                    $imgNew = $domain.'/wp-content/themes/aquariuss/images/new.svg';
                }

                if ($query->have_posts()) {
                    $counter = 0; // Biến đếm sản phẩm đã hiển thị

                    while ($query->have_posts()) {
                        $query->the_post();

                        // Bắt đầu hàng mới
                        if ($counter == 0 || $counter == 3 || ($counter > 3 && ($counter - 3) % 4 == 0)) {
                            echo '<div class="product-row">'; // Mở div chứa hàng sản phẩm
                        }
                        $new = (int)get_field('new', get_the_ID());
                        echo '<div class="product">';
                        if($new){
                           echo '<div class="product-new"><img class="new-img right" src="'.$imgNew.'"></div>'; 
                        }
                        echo '<a href="'.esc_url(get_permalink()).'">';
                        echo '<img src="'.esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')).'" alt="'.esc_attr(esc_html(get_the_title())).'">';
                        echo '<div class="product-title"><h4>'.esc_html(esc_html(get_the_title())).'</h4></div>';
                        echo '</a>';
                        echo '</div>';
                        $counter++;

                        // Kết thúc hàng
                        if ($counter == 3 || ($counter > 3 && ($counter - 3) % 4 == 0)) {
                            echo '</div>'; // Đóng div chứa hàng sản phẩm
                        }
                    }

                    // Nếu kết thúc vòng lặp mà hàng chưa đóng, đóng lại hàng
                    if ($counter % 4 != 0) {
                        echo '</div>';
                    }
                } else {
                    // echo '<p>No posts found in this category.</p>';
                }
                ?>
                </div>

            </div>
        </div>
    </div>
</section>
<?php
get_footer(); // Include footer.php
?>
