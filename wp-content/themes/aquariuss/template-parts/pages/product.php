<?php
/**
 * Home Page.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
?>
<section id="section-1" class="py-4 ptm-0">
    <div class="container">
        <div class="col-lg-12">
            <div class="info-item-large">
                <?php if(wp_is_mobile()): ?>
                    <img src="<?php echo esc_url(get_field('banner_mobile')['url']); ?>" />
                <?php else: ?>
                    <img src="<?php echo esc_url(get_field('banner')['url']); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="section-2" class="pb-3" data-aos="fade-up">
    <div class="container">
        <div class="row w-auto g-<?php if(wp_is_mobile()){ echo '3'; }else{ echo '5'; } ?> justify-center gmb-15 pm-15">
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
                <?php
                    $project_categories = get_terms([
                        'taxonomy'   => 'project_category',
                        'hide_empty' => false,
                    ]);

                    $imgNew = esc_url(get_option('icon_new'));
                    if(empty($imgNew)){
                        $imgNew = $domain.'/wp-content/themes/aquariuss/images/new.svg';
                    }

                    if (!empty($project_categories) && !is_wp_error($project_categories)) {
                        foreach ($project_categories as $category) {
                            $category_id = $category->term_id;
                            $category_name = pll__($category->name);

                            // Lấy danh sách sản phẩm thuộc danh mục này
                            $args = [
                                'post_type'      => 'project',
                                'posts_per_page' => -1, // Lấy tất cả sản phẩm
                                'orderby'        => 'date',
                                'order'          => 'DESC',
                                'tax_query'      => [
                                    [
                                        'taxonomy' => 'project_category',
                                        'field'    => 'term_id',
                                        'terms'    => $category_id,
                                    ]
                                ]
                            ];

                            $project_query = new WP_Query($args);
                            if ($project_query->have_posts()) {
                                echo '<div class="category-products">';
                                echo '<div class="category-title"><h2>'.esc_html($category_name).'</h2></div>';
                                $products = [];
                                while ($project_query->have_posts()) {
                                    $project_query->the_post();
                                    $products[] = [
                                        'id'    => get_the_ID(),
                                        'title' => get_the_title(),
                                        'link'  => get_permalink(),
                                        'image' => get_the_post_thumbnail_url(get_the_ID(), 'medium'),
                                    ];
                                }

                                $total_products = count($products);
                                $count = 0;

                                while ($count < $total_products) {
                                    if ($count == 0) {
                                        $row_size = 3; // Hàng đầu tiên có 3 sản phẩm
                                    } else {
                                        $row_size = min(4, $total_products - $count); // Các hàng sau có tối đa 4 sản phẩm
                                    }

                                    echo '<div class="product-row">';
                                    for ($i = 0; $i < $row_size; $i++) {
                                        if ($count >= $total_products) {
                                            break;
                                        }

                                        $product = $products[$count];
                                        $new = (int)get_field('new', $product['id']);

                                        // Hiển thị sản phẩm
                                        echo '<div class="product">';
                                        if($new){
                                           echo '<div class="product-new"><img class="new-img right" src="'.$imgNew.'"></div>'; 
                                        }
                                        echo '<a href="'.esc_url($product['link']).'">';
                                        echo '<img src="'.esc_url($product['image']).'" alt="'.esc_attr($product['title']).'">';
                                        echo '<div class="product-title"><h4>'.esc_html($product['title']).'</h4></div>';
                                        echo '</a>';
                                        echo '</div>';

                                        $count++;
                                    }
                                    echo '</div>'; // Đóng div.product-row
                                }

                                echo '</div>'; // Đóng category-products
                            }
                            wp_reset_postdata();
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</section>
