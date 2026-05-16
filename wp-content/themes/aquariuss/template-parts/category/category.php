<?php
/**
 * Home Page.
 *
 * @package          Aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
$category = get_queried_object();
global $wp_query;
$posts_per_page = $wp_query->get('posts_per_page');
?>

<section id="section-1" class="pb-5">
    <div class="box-banner banner-about relative">
        <?php
            if(wp_is_mobile()){
                $image = get_field('image_mobile', $category);
            } else {
                $image = get_field('image', $category);
            }
        ?>
        <div class="box-image-banner relative">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <h3 class="title-big text-white show-mobile hidden-pc"><?php echo get_field('title_image', $category); ?></h3>
        </div>
        <div class="desc-banner pleft">
            <div class="detail-banner">
                <h3 class="title-big text-white fs-62 show-pc hidden-mobile"><?php echo get_field('title_image', $category); ?></h3>
                <?php echo esc_attr(get_field('description_image', $category)); ?>
            </div>
        </div>
    </div>
</section>

<section id="section-3" class="py-4">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-9 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-sm-12" data-aos="fade-up">
                        <h5 class="pyt-5 mb-3"><?php echo pll__('All'); ?> <?php echo single_cat_title('', false); ?></h5>
                    </div>
                </div>
                <div class="row mtm-08">
                    <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'cat' => get_query_var('cat'),
                            'lang' => pll_current_language(),
                            'posts_per_page' => $posts_per_page,
                            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                        );
                        $query = new WP_Query($args);
                        if($query->have_posts()) : 
                            while ($query->have_posts()) : $query->the_post(); 
                                $categories = get_the_category();
                                $selected_category = '';

                                if ($categories) {
                                    foreach ($categories as $category) {
                                        if ($category->parent != 0) { // Nếu là danh mục con
                                            $selected_category = $category;
                                            break; // Ưu tiên danh mục con đầu tiên
                                        }
                                    }
                                    if (!$selected_category) {
                                        $selected_category = $categories[0];
                                    }
                                }
                            ?>
                                <div class="col-lg-4 col-md-4 col-sm-12 mb25" data-aos="fade-up">
                                    <div class="col-inner">
                                        <div class="box box-normal box-text-bottom box-blog-post has-hover">
                                            <div class="image-news has-hover">
                                                <a href="<?php the_permalink(); ?>" class="plain">
                                                    <div class="box-image">
                                                        <img decoding="async" src="<?php echo esc_url(get_the_post_thumbnail_url($post, 'large')); ?>" class="attachment-medium size-medium wp-post-image image-zoom" alt="<?php the_title(); ?>" />
                                                        <?php if ($selected_category) : ?>
                                                            <a class="category-post" href="<?php echo esc_url(get_category_link($selected_category->term_id)); ?>"><?php echo esc_html($selected_category->name); ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="box-text mpb-0">
                                                <div class="box-text-inner blog-post-inner mtm-08">
                                                    <h5 class="post-title is-large"><a href="<?php the_permalink(); ?>" class="plain"><?php the_title(); ?></a></h5>
                                                    <p class="text-left from_the_blog_excerpt"><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="mt-1 btn-readmore button-item hide-for-medium">
                                        <?php echo pll__('Learn More'); ?>
                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.83333 1.33331L13.5 5.99998M13.5 5.99998L8.83333 10.6666M13.5 5.99998L1.5 5.99998" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: #ED1B24;"></path>
                                        </svg>  
                                    </a>
                                </div>
                                <?php
                            endwhile;
                            $pagination_args = array(
                                'total' => $query->max_num_pages,
                                'current' => $paged,
                                'format' => '?paged=%#%', // Thay đổi URL phân trang
                                'show_all' => false,
                                'type' => 'plain',
                                'prev_text' => '<i class="bi bi-arrow-left-short"></i>',
                                'next_text' => '<i class="bi bi-arrow-right-short"></i>',
                            );

                            $paginate_links = '<div class="pagination">'.paginate_links($pagination_args).'</div>';
                        else :
                            echo '<p>'.__('No posts found in this category.', 'Translate').'</p>';
                        endif;
                        wp_reset_postdata();
                    ?>
                    <div class="text-center pt-5">
                        <?php echo $paginate_links; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="box-lastest">
                    <h5 class="pyt-5 mb-3"><?php echo pll__('Latest Articles'); ?></h5>
                    <div class="box-lastest-inner mtm-08">
                    <?php
                        $current_language = pll_current_language();
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 5,
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'lang' => $current_language,
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) : 
                            while ($query->have_posts()) : $query->the_post(); 
                        ?>
                                <div class="latest-post">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="post-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')); ?>" alt="<?php the_title(); ?>" />
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="info-lastest">
                                        <p class="post-date"><?php echo get_the_date('F j, Y'); ?></p>
                                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        else :
                            echo '<p>'.pll__('No posts found.', 'Translate').'</p>'; // Sử dụng Polylang để dịch
                        endif;

                        // Đặt lại dữ liệu bài viết
                        wp_reset_postdata();
                    ?>
                    </div>
                </div>

                <div class="box-categories mt-5">
                    <h5 class="pyt-5 mb-3"><?php echo pll__('Browse by Categories'); ?></h5>
                    <?php
                        $args = array(
                            'taxonomy' => 'category',
                            'hide_empty' => false,
                            'lang' => $current_language,
                            'parent' => 0,
                            'orderby' => 'name',
                            'order' => 'ASC',
                        );
                        $categories = get_categories($args);
                        if (!empty($categories) && !is_wp_error($categories)) : 
                            echo '<ul class="category-list mtm-08">';
                            foreach ($categories as $category) :
                                echo '<li>';
                                echo '<a href="'.esc_url(get_category_link($category->term_id)).'">'.esc_html($category->name).'</a>';
                                echo '</li>';
                                $child_args = array(
                                    'taxonomy' => 'category',
                                    'hide_empty' => false,
                                    'lang' => $current_language,
                                    'parent' => $category->term_id,
                                );
                                $child_categories = get_categories($child_args);
                                if (!empty($child_categories)) :
                                    foreach ($child_categories as $child_category) :
                                        echo '<li>';
                                        echo '<a href="'.esc_url(get_category_link($child_category->term_id)).'">'.esc_html($child_category->name).'</a>';
                                        echo '</li>';
                                    endforeach;
                                endif;
                            endforeach;
                            echo '</ul>';
                        else :
                            echo '<p>'.pll__('No categories found.', 'Translate').'</p>'; // Sử dụng Polylang để dịch
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>