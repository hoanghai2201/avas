<?php
/**
 * Footer.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
?>
<script src="<?php echo $domain; ?>/wp-content/themes/aquariuss/js/popper.min.js"></script>
<script src="<?php echo $domain; ?>/wp-content/themes/aquariuss/js/aos.js"></script>
<script src="<?php echo $domain; ?>/wp-content/themes/aquariuss/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $domain; ?>/wp-content/themes/aquariuss/js/jquery-3.6.4.min.js"></script>
<script src="<?php echo $domain; ?>/wp-content/themes/aquariuss/js/flatpickr.js"></script>
<script src="<?php echo $domain; ?>/wp-content/themes/aquariuss/js/flickity.pkgd.min.js"></script>
<?php if(is_page('oem-works')): ?>
<script src="<?php echo $domain; ?>/wp-content/themes/aquariuss/js/lightbox.js"></script>
<?php endif; ?>
<script>
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 100) {
            navbar.classList.add('shadow-header');
        } else {
            navbar.classList.remove('shadow-header');
        }
    });
    AOS.init({
        once: true,
    });
    document.getElementById("search-btn").addEventListener("click", function(event) {
        event.stopPropagation();
        let offcanvasMenu = document.getElementById('offcanvasMenu'); 
        if (offcanvasMenu.classList.contains('show')) {
            $('#navbar-toggler').click();
        }
        $('#search-btn').hide();
        $('#box-search').addClass('search-close');
        $('.search-box').addClass('search-box-active');
    });

    $(function() {
        let full_width = $('body').width();
        let mainmeu_width = $('.navbar-nav').width();
        let pleftMenu = (full_width - mainmeu_width)/2;
        $('.mega-menu-content').css('width', (mainmeu_width-5)+'px');
        $('.mega-menu-content').css('margin-left', (pleftMenu+25)+'px');

        var current = location.pathname;
        var isPolicies = current.includes("policies");

        if (current !== '/' || isPolicies) {
            $('.box-breadcrumb ul li a').each(function() {
                var $this = $(this);
                var linkHref = $this.attr('href');
                if(linkHref.indexOf(current) !== -1 || (isPolicies && linkHref.includes("policies"))){
                    $this.addClass('active');
                }
            });
        }

        let button = location.pathname;
        if(button != '/'){
            $('.list-button .button-item a').each(function(){
                var $this = $(this);
                if($this.attr('href').indexOf(button) !== -1){
                    $this.addClass('active');
                }
            });
        }
    });

    document.getElementById("navbar-toggler").addEventListener("click", function(event) {
        event.stopPropagation();
        let navbarToggler = document.getElementById('navbar-toggler'); 
        if (navbarToggler.classList.contains('active')) {
            $('#navbar-toggler').removeClass('active');
        } else {
            $('#navbar-toggler').addClass('active');
        }

        let searchBtn = document.getElementById('search-box'); 
        if (searchBtn.classList.contains('search-box-active')) {
            close_search();
        }
    });

    function close_search(){
        $('#search-btn').show();
        $('#box-search').removeClass('search-close');
        $('.search-box').removeClass('search-box-active');
    }

    // const submenuItems = document.querySelectorAll('.has-submenu > a');
    // submenuItems.forEach((item) => {
    //     item.addEventListener('click', (e) => {
    //         e.preventDefault();

    //         const submenu = item.nextElementSibling;
    //         const icon = item.querySelector(".toggle-icon");
            
    //         document.querySelectorAll('.sub-menu').forEach((menu) => {
    //             if (menu !== item.nextElementSibling) {
    //                 menu.style.display = "none";
    //             }
    //         });

    //         document.querySelectorAll('.toggle-icon').forEach((otherIcon) => {
    //             if (otherIcon !== icon) {
    //                 otherIcon.classList.remove("rotate-icon");
    //             }
    //         });

    //         submenu.style.display = submenu.style.display === "block" ? "none" : "block";
    //         icon.classList.toggle("rotate-icon");
    //     });
    // });
    const toggleIcons = document.querySelectorAll('.toggle-icon');
    toggleIcons.forEach((icon) => {
        icon.addEventListener('click', (e) => {
            e.preventDefault();
            
            const parentLi = icon.parentElement;
            const submenu = parentLi.querySelector('.sub-menu');
            
            // Đóng tất cả submenu khác
            document.querySelectorAll('.sub-menu').forEach((menu) => {
                if (menu !== submenu) {
                    menu.style.display = "none";
                }
            });

            // Xoay tất cả icon khác về vị trí ban đầu
            document.querySelectorAll('.toggle-icon').forEach((otherIcon) => {
                if (otherIcon !== icon) {
                    otherIcon.classList.remove("rotate-icon");
                }
            });

            // Toggle submenu hiện tại
            submenu.style.display = submenu.style.display === "block" ? "none" : "block";
            icon.classList.toggle("rotate-icon");
        });
    });

    // Tự động mở menu cha dựa trên URL
    function autoOpenSubmenu() {
        const currentUrl = window.location.href; // Lấy URL hiện tại
        
        document.querySelectorAll('.sub-menu a').forEach((link) => {
            // Kiểm tra xem URL hiện tại có khớp với href của link trong submenu không
            if (currentUrl === link.href) {
                const submenu = link.closest('.sub-menu'); // Tìm submenu chứa link
                const parentLi = submenu.closest('.has-submenu'); // Tìm menu cha
                const toggleIcon = parentLi.querySelector('.toggle-icon'); // Tìm icon
                
                if (submenu && toggleIcon) {
                    submenu.style.display = "block"; // Hiển thị submenu
                    toggleIcon.classList.add("rotate-icon"); // Xoay icon
                }
            }
        });
    }
    document.addEventListener('DOMContentLoaded', autoOpenSubmenu);

    document.addEventListener("DOMContentLoaded", function () {
        const backToTop = document.getElementById("backToTop");
        window.addEventListener("scroll", function () {
            if (window.scrollY > 300) {
                backToTop.style.display = "block";
            } else {
                backToTop.style.display = "none";
            }
        });
        backToTop.addEventListener("click", function () {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    });

    <?php if(is_page('about-us') || is_page('oem') || is_category()): ?>
    $(document).ready(function () {
        var full_width = $('body').width();
        var container_width = $('.container').width();
        var pleft = (full_width - container_width)/2;
        $('.pleft, .p-left').css('padding-left', pleft + 'px');
        $('.p-right').css('padding-right', pleft + 'px');
    });
    <?php endif; ?>
</script>

<?php if(is_front_page()): ?>
<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo $domain; ?>/wp-content/themes/aquariuss/js/jquery.zoom.min.js?v=1.0"></script>
<script>
    var flkty = new Flickity('.main-carousel', {
        autoPlay: true,
        wrapAround: true,
        pageDots: true,
        prevNextButtons: true,
        friction: 0.3
    });

    var mainCarousel = document.querySelector('.main-carousel');
    imagesLoaded(mainCarousel, { background: true }, function(instance) {
        console.log('Main gallery images loaded:', instance.images.length);
        let mainFlkty = new Flickity(mainCarousel, {
            autoPlay: true,
            wrapAround: true,
            pageDots: true,
            prevNextButtons: true,
            friction: 0.3
        });
        mainFlkty.resize();
        mainFlkty.reloadCells();
        setTimeout(() => mainFlkty.resize(), 100);
    });
</script>
<?php endif; ?>