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
    <div class="box-breadcrumb align-center">
        <ul>
            <?php
                if(have_rows('list_link')):
                    $i = 1;
                    while(have_rows('list_link')) : the_row();
                        $i++;
                        $page_url = get_sub_field('button_link');
                        $page_id = url_to_postid($page_url);
                        if($page_id):
                            $page = get_post($page_id);
                            if($page):
                                ?>
                                <li>
                                    <a href="<?php echo esc_url(get_permalink($page_id)); ?>" title="<?php echo esc_html($page->post_title); ?>" class="btn-breadcrumbs fw-400 fs-14"><?php echo esc_html($page->post_title); ?></a>
                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.83333 1.33331L13.5 5.99998M13.5 5.99998L8.83333 10.6666M13.5 5.99998L1.5 5.99998" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: #ED1B24;"></path>
                                    </svg>
                                </li>
                                <?php
                            endif;
                        endif;
                    endwhile;
                endif;
            ?>
        </ul>
    </div>
</section>

<section id="section-2" class="py-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="box-company">
                    <h1 class="pt-2 pb-4 fw-400 fs-50"><?php echo get_the_title(); ?></h1>
                    <?php
                        if(have_rows('list_info')):
                            $i = 1;
                            while(have_rows('list_info')) : the_row();
                                $i++;
                                $key   = get_sub_field('key');
                                $value = get_sub_field('value');
                                ?>
                                <div class="row-company" data-aos="fade-up" data-aos-delay="<?php echo $i; ?>00">
                                    <div class="key"><?php echo esc_html($key); ?></div>
                                    <div class="value"><?php echo esc_html($value); ?></div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                    ?>
                </div>
                <div class="align-center pt-3">
                    <?php
                        $file = get_field('file_pdf');
                        if ($file) {
                            $file_id = $file['ID']; // Lấy ID file
                            $file_url = $file['url']; // Lấy URL file
                            // $file_name = pathinfo($file_url, PATHINFO_FILENAME);
                            $file_path = get_attached_file($file_id); // Lấy đường dẫn file trên server
                            $file_size = filesize($file_path); // Lấy dung lượng file (bytes)
                            $file_name = get_the_title($file_id);

                            // Chuyển đổi dung lượng file từ bytes sang KB, MB, GB
                            function format_size($size) {
                                if ($size >= 1073741824) { // GB
                                    return number_format($size / 1073741824, 2) . ' GB';
                                } elseif ($size >= 1048576) { // MB
                                    return number_format($size / 1048576, 2) . ' MB';
                                } elseif ($size >= 1024) { // KB
                                    return number_format($size / 1024, 2) . ' KB';
                                } else {
                                    return $size . ' bytes';
                                }
                            }

                            $dflip_book_url = get_field('pdf_id');
                            $dflip_book_id  = 0;
                            if($dflip_book_url) {
                                if (preg_match('/dflip=(\d+)/', $dflip_book_url, $matches)) {
                                    $dflip_book_id = intval($matches[1]);
                                }
                            }
                            echo '<a class="btn-file mb-5" href="'.$domain.'/view-pdf?id='.$dflip_book_id.'" target="_blank" title="'.esc_html($file_name).'" data-aos="fade-up" data-aos-delay="100">'.esc_html($file_name).' ('.esc_html(format_size($file_size)).')</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>