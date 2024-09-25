<section class="features">
    <div class="container-xl">
        <div class="features__grid mb-5">
            <div class="features__card">
                <img src="<?=get_stylesheet_directory_uri()?>/img/icon-home.svg"
                    alt="">
                <div class="features__pre-title">Design</div>
                <div class="features__title">Consultation</div>
                <div class="features__content">Our in-house design team will help you find the perfect style for your home,  taking you through samples and offering helpful expert advice.</div>
            </div>
            <div class="features__card">
                <img src="<?=get_stylesheet_directory_uri()?>/img/icon-british.svg"
                    alt="">
                <div class="features__pre-title">Handcrafted</div>
                <div class="features__title">British Made</div>
                <div class="features__content">All our products are handcrafted in the UK using only the finest materials for a long-lasting, high-quality finish.</div>
            </div>
            <div class="features__card">
                <img src="<?=get_stylesheet_directory_uri()?>/img/icon-installation.svg"
                    alt="">
                <div class="features__pre-title">Expert</div>
                <div class="features__title">Installation</div>
                <div class="features__content">Our in-house fitters will complete the installation to your full satisfaction and always finish the job to the highest standard.</div>
            </div>
            <div class="features__card">
                <img src="<?=get_stylesheet_directory_uri()?>/img/icon-bespoke.svg"
                    alt="">
                <div class="features__pre-title">Bespoke</div>
                <div class="features__title">Custom Fitted</div>
                <div class="features__content">All our products are made-to-measure for your home, working to the exact measurements of your space for the perfect fit.</div>
            </div>
            <?php
            $current_url = $_SERVER['REQUEST_URI'];
            if (
               strpos($current_url, 'shutters') !== false ||
               strpos($current_url, 'blinds') !== false ||
               strpos($current_url, 'wall-panelling') !== false ||
               strpos($current_url, 'flooring') !== false
            ) {
                ?>
            <div class="features__card">
                <img src="<?=get_stylesheet_directory_uri()?>/img/icon-value.svg"
                    alt="">
                <div class="features__pre-title">Best Value</div>
                <div class="features__title">Price Promise</div>
                <div class="features__content">Offered across all our ranges, you'll know you'll be getting a competitive price for your quality products and installation.</div>
            </div>
                <?php
            }
            else {
                ?>
                <div class="features__card">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/icon-25.svg"
                        alt="">
                    <div class="features__pre-title">25 Year</div>
                    <div class="features__title">Guarantee</div>
                    <div class="features__content">Enjoy peace of mind with a 25-year guarantee on all our fitted furniture, ensuring your Kingswood products remain a lasting part of your home.</div>
                </div>
                <?php
            }
            ?>
        </div>
        <a href="/about/why-choose-us/" class="button">Find out <span>more</span></a>
    </div>
</section>