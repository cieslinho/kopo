<?php
// Pobranie danych z grupy header-content
$header_content = get_field('header-content');

// Wyodrębnienie zmiennych
$header_images = $header_content['header-box'] ?? null;
$header_btns = $header_content['header-btns'] ?? null;
$header_texts = $header_content['header-texts'] ?? null;
$heading = $header_texts['heading'];
$description = $header_texts['description'];
$btn_url = $header_btns['btn-url'];
$cta_url = $header_btns['cta-url'];
$btn_text = $header_btns['btn-text'];
$cta_text = $header_btns['cta-text'];
?>

<?php if ($header_content): ?>
    <header class="header">
        <div class="header__images">
            <?php if ($header_images): ?>
                <?php foreach ($header_images as $image): ?>
                    <img src="<?php echo esc_url(wp_get_attachment_url($image['header-img'])); ?>" alt="" class="header__img">
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="header__bottom">
            <div class="header__texts">
                <h1 class="header__title"><?php echo esc_html($heading); ?></h1>
                <h3 class="header__description"><?php echo esc_html($description); ?></h3>
            </div>
             <div class="header__btns">
                <a href="<?php echo esc_url($btn_url); ?>" class="header__btn"><?php echo esc_html($btn_text); ?></a>
                <a href="<?php echo esc_url($cta_url); ?>" class="header__btn header__btn-cta"><?php echo esc_html($cta_text); ?></a>
            </div>
        </div>
        
    </header>
<?php endif; ?>