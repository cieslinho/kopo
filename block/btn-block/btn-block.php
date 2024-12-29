<?php

$btn_content = get_field('btn-content');
$btn_text = $btn_content['btn-text'] ?? ''; // Bezpieczne przypisanie wartości
$btn_link = $btn_content['btn-link'] ?? '';

?>

<section class="section section-btn">
    <div class="container">
        <?php if (!empty($btn_link) && !empty($btn_text)): ?>
            <div class="section__wrapper">

            
            <a href="<?php echo esc_url($btn_link); ?>" target="_blank" class="section__btn btn">
                <?php echo esc_html($btn_text); ?>
            </a>
            </div>
        <?php endif; ?>
    </div>
</section>
