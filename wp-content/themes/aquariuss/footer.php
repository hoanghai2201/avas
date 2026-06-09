<?php
/**
 * The template for displaying the footer.
 *
 * @package flatsome
 */

global $domain;
?>

</main><!-- #main -->

<footer class="footer-wrapper">
	<?php
		get_template_part('template-parts/footer/footer');
	?>
</footer><!-- .footer-wrapper -->

</div><!-- #wrapper -->

<style>
#back-to-top {
    position: fixed;
    bottom: 32px;
    right: 32px;
    z-index: 9999;
    width: 48px;
    height: 48px;
    background: #3e6896;
    color: #fff;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 4px 16px rgba(62, 104, 150, 0.35);
    opacity: 0;
    visibility: hidden;
    transform: translateY(16px);
    transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s ease, background 0.2s ease;
}
#back-to-top.visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}
#back-to-top:hover {
    background: #F96305;
    box-shadow: 0 6px 20px rgba(217, 117, 57, 0.4);
    transform: translateY(-3px);
}
#back-to-top svg {
    width: 20px;
    height: 20px;
}
@media (max-width: 767px) {
    #back-to-top {
        bottom: 20px;
        right: 20px;
        width: 42px;
        height: 42px;
    }
}
</style>

<script>
(function () {
    var btn = document.getElementById('back-to-top');
    if (!btn) return;

    window.addEventListener('scroll', function () {
        if (window.scrollY > 300) {
            btn.classList.add('visible');
        } else {
            btn.classList.remove('visible');
        }
    }, { passive: true });

    btn.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
})();
</script>

<?php
	get_template_part('template-parts/footer/script');
?>

<?php wp_footer(); ?>

</body>
</html>
