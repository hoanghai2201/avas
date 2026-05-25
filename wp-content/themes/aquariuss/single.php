<?php
/**
 * The blog template file.
 *
 * @package          Aquariuss\Templates
 * @aquariuss-version 1.0.0
 */

get_header();
global $domain;
?>
<section id="section-1" class="pb-5">
    <div class="box-banner banner-about relative">
        <?php
            if(wp_is_mobile()){
                $bgNews = get_option('site_bg_mb_news');
                $image  = get_field('background_mobile');
                if(empty($image['url'])){
                    $image['url'] = $bgNews;
                    $image['alt'] = get_the_title();
                }else{
                    $image = get_field('background_mobile');
                }
            } else {
                $bgNews = get_option('site_bg_news');
                $image  = get_field('background');
                if(empty($image['url'])){
                    $image['url'] = $bgNews;
                    $image['alt'] = get_the_title();
                }else{
                    $image = get_field('background');
                }
            }
        ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    </div>
    <div class="container">
        <div class="title-post">
            <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        $publish_date = get_the_date('d/m/Y'); ?>
                        <h1><?php the_title(); ?></h1>
                        <div class="text-center pt-4">
                            <span class="created_date"><?php echo esc_html($publish_date); ?></span>
                        </div>
                    <?php endwhile;
                endif;
            ?>
        </div>        
    </div>
</section>

<section id="section-2" class="pb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post(); ?>
                            <div class="post-content">
                                <div class="desc-content">
                                    <?php echo nl2br(esc_html(get_field('description'))); ?>
                                </div>
                                <?php the_content(); ?>
                            </div>
                            <div class="bottom-posts">
                                <?php
                                    // Get the current post URL and title
                                    $current_post_url = get_permalink();
                                    $current_post_title = urlencode(get_the_title()); // Encode title for URL

                                    // Define the social media links
                                    $social_links = array(
                                        'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($current_post_url),
                                        'instagram' => 'https://www.instagram.com/share?url=' . urlencode($current_post_url),
                                        'zalo' => 'https://zalo.me/share?link=' . urlencode($current_post_url),
                                        'tiktok' => 'https://www.tiktok.com/share?url=' . urlencode($current_post_url),
                                        'youtube' => 'https://www.youtube.com/share?url=' . urlencode($current_post_url),
                                        'x' => 'https://twitter.com/intent/tweet?url=' . urlencode($current_post_url)
                                    );
                                ?>

                                <div class="social-share">
                                    <span><?php echo pll__('Share this article'); ?></span>
                                    <div class="box-social box-social-detail">
                                        <a target="_blank" href="<?php echo esc_url($social_links['x']); ?>"><img style="width: 41px; height: 41px;" src="<?php echo $domain; ?>/wp-content/themes/aquariuss/images/x.svg"></a>
                                        <a target="_blank" href="<?php echo esc_url($social_links['facebook']); ?>"><img style="width: 41px; height: 41px;" src="<?php echo $domain; ?>/wp-content/themes/aquariuss/images/facebook.svg"></a>
                                        <a target="_blank" href="<?php echo esc_url($social_links['instagram']); ?>"><img style="width: 41px; height: 41px;" src="<?php echo $domain; ?>/wp-content/themes/aquariuss/images/instagram.svg"></a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    endif;
                ?>
            </div>
        </div>
    </div>
</section>

<section id="section-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="pt-5 mt-5 bt"></div>
                <h3 class="releated-title"><?php echo pll__('Other Articles'); ?></h3>
            </div>
            <?php
                $current_post_id = get_the_ID();
                $categories = wp_get_post_categories($current_post_id);
                if(wp_is_mobile()){
                    $posts_per_page = 9;
                } else {
                    $posts_per_page = 4;
                }
                if (!empty($categories)) {
                    $args = array(
                        'category__in'   => $categories,
                        'post__not_in'   => array($current_post_id),
                        'posts_per_page' => $posts_per_page,
                    );

                    $related_posts_query = new WP_Query($args);

                    if ($related_posts_query->have_posts()) {
                        if(wp_is_mobile()): ?>
                            <div class="col-lg-12 col-sm-12">
                                <div class="carousel releated-list js-flickity" data-flickity='{ "wrapAround": true, "pageDots": false, "groupCells": 1, "freeScroll": false }'>
                                <?php
                                while($related_posts_query->have_posts()) {
                                    $related_posts_query->the_post(); ?>
                                    <div class="carousel-cell">
                                        <div class="new-product align-center <?php if(!wp_is_mobile()): ?>has-hover <?php endif; ?>">
                                            <a href="<?php the_permalink(); ?>" class="plain">
                                                <div class="box-image2">
                                                    <div class="image-zoom image-cover"> 
                                                        <img decoding="async" src="<?php echo esc_url(get_the_post_thumbnail_url($post, 'large')); ?>" class="attachment-medium size-medium wp-post-image" alt="<?php the_title(); ?>" /> 
                                                    </div>
                                                </div>
                                                <div class="box-text mpb-0">
                                                    <div class="box-text-inner blog-post-inner">
                                                        <h5 class="post-title is-large"><?php the_title(); ?></h5>
                                                        <p class="from_the_blog_excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                                        <a href="<?php the_permalink(); ?>" class="mt-1 btn-readmore-mb button-item"><?php echo pll__('Read more'); ?></a>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        <?php else:
                            echo '<div class="row">';
                            while($related_posts_query->have_posts()) {
                                $related_posts_query->the_post();
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
                                <div class="col-lg-3 col-md-3 col-sm-12 mb25" data-aos="fade-up">
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
                                                <div class="box-text-inner blog-post-inner">
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
                            }
                            echo '</div>'; ?>
                        <?php endif;
                    }
                    wp_reset_postdata();
                }
            ?>
        </div>
    </div>    
</section>

<?php get_footer(); ?>