<?php
/**
 * Home Page.
 *
 * @package          Trang Tien Plaza\Templates
 * @trangtienplaza-version 1.0.0
 */
global $domain;
?>
<div id="content" role="main" class="content-area">
    <section class="section section-6 py-3" id="section_882664219" data-aos="fade-up">
        <div class="bg section-bg fill bg-fill  bg-loaded"> </div>
        <div class="section-content relative">
            <div class="row" id="row-233363030">
                <div id="col-797954391" class="col small-12 large-12">
                    <div class="col-inner">
                        <style>
                            #row-1092349379 .grid-col-1 {
                                height: 705px
                            }

                            #row-1092349379 .grid-col-1-2 {
                                height: auto;
                            }

                            #row-1092349379 .grid-col-1-3 {
                                height: 200px
                            }

                            #row-1092349379 .grid-col-2-3 {
                                height: 400px
                            }

                            #row-1092349379 .grid-col-1-4 {
                                height: 150px
                            }

                            #row-1092349379 .grid-col-3-4 {
                                height: 450px
                            }

                            /* Tablet */
                            @media(max-width: 850px) {
                                #row-1092349379 .grid-col-1 {
                                    height: 400px
                                }

                                #row-1092349379 .grid-col-1-2 {
                                    height: auto;
                                }

                                #row-1092349379 .grid-col-1-3 {
                                    height: 133.33333333333px
                                }

                                #row-1092349379 .grid-col-2-3 {
                                    height: 266.66666666667px
                                }

                                #row-1092349379 .grid-col-1-4 {
                                    height: 100px
                                }

                                #row-1092349379 .grid-col-3-4 {
                                    height: 300px
                                }
                            }

                            /* Mobile */
                            @media(max-width: 550px) {
                                #row-1092349379 .grid-col-1 {
                                    height: 400px
                                }

                                #row-1092349379 .grid-col-1-2 {
                                    height: auto
                                }

                                #row-1092349379 .grid-col-1-3 {
                                    height: 133.33333333333px
                                }

                                #row-1092349379 .grid-col-2-3 {
                                    height: 266.66666666667px
                                }

                                #row-1092349379 .grid-col-1-4 {
                                    height: 100px
                                }

                                #row-1092349379 .grid-col-3-4 {
                                    height: 300px
                                }
                            }
                        </style>
                        <h3 class="py-2"><?php echo single_cat_title('', false); ?></h3>
                        <div id="row-1092349379" class="row has-shadow row-box-shadow-1 row-grid" data-packery-options='{"itemSelector": ".col", "gutter": 0, "presentageWidth" : true}'>
                            <?php
                                global $wp_query;
                                $posts_per_page = $wp_query->get('posts_per_page');
                                $i = 0;
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                $args = array(
                                    'cat' => get_query_var('cat'),
                                    'lang' => pll_current_language(),
                                    'posts_per_page' => $posts_per_page,
                                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                                );

                                $query = new WP_Query($args);
                                if($query->have_posts()) : 
                                    while($query->have_posts()) : $query->the_post(); 
                                        $publish_date = get_the_date('d.m.y'); ?>
                                        <?php if($i == 0): ?>
                                            <div class="col post-item grid-col grid-col-1 large-6 box-left box-left-page medium-12 ptm-0">
                                                <div class="col-inner"> 
                                                    <a href="<?php the_permalink(); ?>" class="plain">
                                                        <div class="box box-shade dark box-text-bottom box-blog-post has-hover">
                                                            <div class="box-image">
                                                                <div class="image-zoom image-cover" style="padding-top:56%;">
                                                                    <img loading="lazy" decoding="async" width="320" height="401" src="<?php echo esc_url(get_the_post_thumbnail_url($post, 'full')); ?>" class="attachment-large size-large wp-post-image" alt="<?php the_title(); ?>" />
                                                                    <div class="shade"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a> 
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php $i++; ?>
                                    <?php
                                    endwhile;
                                    $i = 0; ?>
                                    <div class="col post-item grid-col grid-col-1-2 large-6 box-news-page box-news medium-6">
                                        <div class="col-inner no-shadow" style="background:transparent;">
                                    <?php
                                    while($query->have_posts()) : $query->the_post(); 
                                        $publish_date = get_the_date('d.m.y'); ?>
                                        <?php if($i > 0): ?>
                                            <div class="box-shade dark box-text-bottom box-item box-blog-post has-hover">
                                                <div class="box-image-item">
                                                    <div class="image-zoom image-cover"> 
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                            <img loading="lazy" decoding="async" src="<?php echo esc_url(get_the_post_thumbnail_url($post, 'thumbnail')); ?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="<?php the_title(); ?>" />
                                                            <div class="shade"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="box-text-item">
                                                    <div class="box-text-inner blog-post-inner">
                                                        <p class="created_date"><?php echo esc_html($publish_date); ?></p>
                                                        <h5 class="post-title is-larger uppercase"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
                                                        <div class="description-item hide-for-medium"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></div> 
                                                        <a href="<?php the_permalink(); ?>" class="btn-readmore button-item hide-for-medium"><?php echo pll__('Continue reading'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php $i++; ?>
                                    <?php
                                    endwhile;
                                    $pagination_args = array(
                                        'total' => $query->max_num_pages,
                                        'current' => $paged,
                                        'format' => '?paged=%#%', // Thay đổi URL phân trang
                                        'show_all' => false,
                                        'type' => 'plain',
                                        'prev_text' => '<span>'.pll__('Previous', 'Translate').'</span>',
                                        'next_text' => '<span>'.pll__('Next', 'Translate').'</span>',
                                    );

                                    $paginate_links = '<div class="pagination">'.paginate_links($pagination_args).'</div>';
                                else :
                                    echo '<p>' . __('No posts found in this category.', 'Translate') . '</p>';
                                endif;
                                wp_reset_postdata();
                            ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <?php echo $paginate_links; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            #section_882664219 {
                padding-top: 0px;
                padding-bottom: 0px;
            }

            #section_882664219 .ux-shape-divider--top svg {
                height: 150px;
                --divider-top-width: 100%;
            }

            #section_882664219 .ux-shape-divider--bottom svg {
                height: 150px;
                --divider-width: 100%;
            }
        </style>
    </section>
</div>