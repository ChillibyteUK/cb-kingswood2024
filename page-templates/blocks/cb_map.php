<section class="map">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-6">
                <h2>Our Location</h2>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa-solid fa-map-marker-alt"></i></span> <?=get_field('contact_address','options')?></li>
                    <li><span class="fa-li"><i class="fa-solid fa-envelope"></i></span> <?=do_shortcode('[contact_email]')?></li>
                    <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span> <?=do_shortcode('[contact_phone]')?></li>
                </ul>
                <h2>Opening Hours</h2>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa-solid fa-calendar"></i></span> <?=get_field('opening_hours','options')?></li>
                </ul>
            </div>
            <div class="col-md-6">
                MAP
            </div>
        </div>
    </div>
</section>