<?php
/**
 * The template for displaying the footer.
 *
 * @package flatsome
 */

global $flatsome_opt;
global $domain;
?>

</main><!-- #main -->

<footer class="text-white">
	<?php
		get_template_part('template-parts/footer/footer');
	?>
</footer><!-- .footer-wrapper -->

</div><!-- #wrapper -->

<?php
	get_template_part('template-parts/footer/script');
?>

<?php wp_footer(); ?>

</body>
</html>
