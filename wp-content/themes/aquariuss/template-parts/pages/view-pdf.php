<?php
/**
 * Home Page.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = 0;
}
?>
<section id="section-1" class="py-2">
    <?php echo do_shortcode('[dflip id="'.$id.'"][/dflip]'); ?>
</section>