<?php
/**
 * The template for displaying the footer.
 *
 * @package flatsome
 */

global $domain;
?>

</main><!-- #main -->

<footer class="text-white">
	<?php
		get_template_part('template-parts/footer/footer');
	?>
</footer><!-- .footer-wrapper -->

</div><!-- #wrapper -->

<!-- Back to Top Button -->
<button id="back-to-top" aria-label="Back to top" title="Lên đầu trang">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="18 15 12 9 6 15"></polyline>
    </svg>
</button>

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
    background: #d97539;
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
