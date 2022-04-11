</main>
<?php if (!defined('MAINTENANCE') && !defined('ERROR_404') && !defined('ADMIN')) { ?>
<footer>
    <section class="footer">
        <div class="xLarge-12 large-12 medium-12 small-12 xSmall-12 bottom-container">
            <div class="xSmall-10 small-10 medium-10 large-6 xLarge-6 bottom-left">
                <a href="<?= DOMAIN ?>/">
                    <img src="<?= DOMAIN ?>/assets/media/images/logo_Locascio_Cloud.png" alt="logo">
                </a>
                <a href="#">CGU</a>
                <a href="#">RGPD</a>
                <a href="/mentions-legales">Mentions légales</a>
            </div>
            <div class="xSmall-10 small-10 medium-10 large-4 xLarge-4 bottom-right">
                <div class="socials-footer">
                    <a class="circle-icon facebook" href="#"></a>
                    <a class="circle-icon discord" href="#"></a>
                    <a class="circle-icon twitter" href="#"></a>
                </div>
                <div class="copyright-footer">
                    <p>Copyright © 2020 - <?= date("Y"); ?> PPE EPSI</p>
                </div>
            </div>
        </div>

    </section>
</footer>
<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ==" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= DOMAIN ?>/assets/js/default/script.js"></script>
</body>
</html>
