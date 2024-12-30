<?php

$social_box = get_field('social-box', 'option');
$contact_content = get_field('contact-content');
$company_box = get_field('company-box', 'option');
$contact_infos = $contact_content['contact-infos'];
$heading_infos = $contact_infos['heading'];
$subheading_infos = $contact_infos['subheading'];
$contact_form = $contact_content['contact-form'];
$form_heading = $contact_form['heading'];
$form_shortcode = $contact_form['shortcode'];

?>


<section class="contact">
    <div class="container">
        <div class="contact__boxes">
            <div class="contact__left">
            <div class="section__titles">
                <?php if (!empty($subheading_infos)): ?>
        <h3 class="section__subheading">
            <?= esc_html($subheading_infos); ?>
        </h3>
        <?php endif; ?>
        <?php if (!empty($heading_infos)): ?>

        <h2 class="section__title">
            <?= esc_html($heading_infos); ?>
        </h2>
        <?php endif; ?>
                </div>
                
                <?php if (!empty($company_box)): ?>
                <div class="contact__items">
                    <?php foreach ($company_box as $item): 
                     $svg_code = $item['company-svg-code'] ?? '';
                     $link = $item['company-link'] ?? '#';
                     $text = $item['company-text'] ?? '';
                     ?>
                    <div class="contact__item">
                    <?php if (!empty($svg_code)): ?>
                        <?= wp_kses(
                            $svg_code,
                            [
                                'svg'   => ['xmlns' => true, 'viewBox' => true, 'fill' => true, 'width' => true, 'height' => true],
                                'path'  => ['d' => true, 'fill' => true],
                                'circle'=> ['cx' => true, 'cy' => true, 'r' => true],
                            ]
                        ); ?>
                    <?php endif; ?>
                        
                            <a href="<?= esc_url($link); ?>" class="contact__item-link">
                            <?php if (!empty($text)): ?>
                        <?= esc_html($text); ?>
                    <?php endif; ?>
                            </a>
                        
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <?php if (!empty($social_box)): ?>

                <div class="contact__socials">
                <?php foreach ($social_box as $item): 
                 $svg_code = $item['svg-code'];
                 $link = $item['link'];
             ?>
                    <a href="<?= esc_url($link); ?>" target="_blank" class="contact__social">
                    <?php if (!empty($svg_code)): ?>
                        <?= wp_kses(
                        $svg_code,
                        [
                            'svg'   => ['xmlns' => true, 'viewBox' => true, 'fill' => true, 'width' => true, 'height' => true],
                            'path'  => ['d' => true, 'fill' => true],
                            'circle'=> ['cx' => true, 'cy' => true, 'r' => true],
                        ]
                    ); ?>
                        <?php endif; ?>

                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="contact__form">
            <?php if (!empty($form_heading)): ?>
                <h3 class="contact__form-heading section__title"><?= esc_html($form_heading); ?></h3>
                <?php endif; ?>
                <div class="contact__form-wrapper">
                <?php
                if (!empty($form_shortcode)): ?>
    <?php echo do_shortcode($form_shortcode); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
