<?php

$section_content = get_field('section-right-content');
$img = $section_content['img'];
$heading = $section_content['heading'];
$subheading = $section_content['subheading'];
$description = $section_content['description'];
$section_item = $section_content['section-item'];

?>

<section class="section section-right">
    <div class="container">
        <div class="section__boxes">
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
                <?php if (!empty($section_item)): ?>
                
                <div class="section__images">
                <?php foreach ($section_item as $item): 
                $item_img = $item['item-img'] ?? '';
                $item_link = $item['item-link'] ?? '';
                $item_link_text = $item['item-text'] ?? '';
                $item_read_more = $item['item-read-more'] ?? '';
            ?>
                    <div class="section__box">
                    <?php if (!empty($item_img)): ?>
                        <img src="<?php echo esc_url(wp_get_attachment_image_url($item_img, 'full')); ?>" alt="<?php echo esc_attr(get_post_meta($item_img, '_wp_attachment_image_alt', true) ?: 'Obrazek Dekoracyjny lub Promocyjny'); ?>" class="section__box-img">
                    <?php endif; ?>
                    <?php if (!empty($item_link) || !empty($item_link_text)): ?>
                        <a href="<?php echo esc_url($item_link); ?>" class="section__box-link">
                        
                            <?php echo esc_html($item_link_text); ?>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($item_read_more)): ?>
                        <a href="<?php echo esc_url($item_link); ?>" class="section__box-readmore">
                        
                            <?php echo esc_html($item_read_more); ?>
                        </a>
                    <?php endif; ?>
                    </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>
            </div>
            <?php if (!empty($img)): ?>
            <div class="section__img">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($img, 'full')); ?>" alt="<?php echo esc_attr(get_post_meta($img, '_wp_attachment_image_alt', true) ?: 'Obrazek Dekoracyjny lub Promocyjny'); ?>">
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>