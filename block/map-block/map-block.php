<?php
$iframe_url = get_field('iframe-url');
$iframe_height = get_field('iframe-height');

?>



<section class="map">
    <div class="map__container">
        <iframe src="<?php echo esc_html($iframe_url); ?>" width="100%" height="<?php echo esc_html($iframe_height); ?>"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>