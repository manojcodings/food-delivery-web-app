
<!-- ===== FOOTER HTML ===== -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">

            <div class="footer-about">
                <h3>Royal Dining</h3>
                <p>Experience the finest culinary delights crafted with passion and the freshest ingredients. Your satisfaction is our top priority.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div class="footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="categories.php">Categories</a></li>
                    <li><a href="foods.php">Food Menu</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>

            <div class="footer-contact">
                <h4>Contact Info</h4>
                <div class="contact-items">

                    <a href="https://maps.app.goo.gl/oKnPZ2ELdjDigDZQ9" target="_blank" class="contact-item ci-map">
                        <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                        View Location on Map
                    </a>

                    <a href="tel:9555660984" class="contact-item ci-phone">
                        <span class="icon"><i class="fas fa-phone"></i></span>
                        9555660984
                    </a>

                    <a href="mailto:manojcodewith@gmail.com" class="contact-item ci-email">
                        <span class="icon"><i class="fas fa-envelope"></i></span>
                        manojcodewith@gmail.com
                    </a>

                </div>
            </div>

        </div>
    </div>

    <hr class="footer-divider">

    <div class="page-wrapper">
        <div class="footer-bottom">
            <p>
                &copy; <?php echo date('Y'); ?> Royal Dining. All Rights Reserved.<br>
                Crafted with <i class="fas fa-heart" style="color:#ff4757;"></i> by
                <span class="brand">M. Rajpoot</span>
            </p>
        </div>
    </div>

</footer>

<!-- Mobile Menu Script -->
<script>
    const mobileMenu = document.getElementById('mobile-menu');
    const navMenu = document.querySelector('.nav-menu');
    mobileMenu.addEventListener('click', () => {
        navMenu.classList.toggle('active');
    });
</script>
</body>
</html>
