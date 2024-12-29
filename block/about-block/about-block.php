<?php

$about_content = get_field('about-content');
$img = $about_content['img'];
$heading = $about_content['heading'];
$subheading = $about_content['subheading'];
$description = $about_content['description'];
$list_item = $about_content['list-item'];

?>

<section id="onas" class="about section">
    <div class="container">
        <div class="section__boxes">
            <?php if (!empty($img)): ?>
            <div class="section__img">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($img, 'full')); ?>" alt="<?php echo esc_attr(get_post_meta($img, '_wp_attachment_image_alt', true) ?: 'Obrazek Dekoracyjny lub Promocyjny'); ?>">
            </div>
            <?php endif; ?>
            <div class="section__content">
                <div class="section__titles">
                <?php if (!empty($subheading)): ?>
        <h3 class="section__subheading">
            <?= esc_html($subheading); ?>
        </h3>
        <?php endif; ?>
        <?php if (!empty($heading)): ?>

        <h2 class="section__title">
            <?= esc_html($heading); ?>
        </h2>
        <?php endif; ?>
                </div>
                <?php if (!empty($description)): ?>
                <div class="section__texts">
                    <?= wp_kses_post($description); ?>
                </div>
                <?php endif; ?>
                <?php if (!empty($list_item)): ?>
                
                <div class="section__list">
                <?php foreach ($list_item as $item): 
                $item_heading = $item['item-heading'] ?? '';
                $item_description = $item['item-description'] ?? '';
            ?>
                    <div class="section__item">
                    <?php if (!empty($item_heading)): ?>
                        <p class="section__item-title">
                            <?= esc_html($item_heading); ?>
                        </p>
                        <?php endif; ?>
                        <?php if (!empty($item_description)): ?>
                            <p class="section__item-description">
                                <?= esc_html($item_description); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>
            </div>
        </div>
       

    </div>
</section>