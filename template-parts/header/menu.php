<?php $logo = get_theme_mod('custom_logo'); ?>

<nav class="nav">
    <div class="container">
    <div class="nav__top">
    <?php
    // Social Box
    $social_box = get_field('social-box', 'option');
    if (!empty($social_box)): ?>
        <div class="nav__socials nav__socials-top">
            <?php foreach ($social_box as $item): 
                $svg_code = $item['svg-code'] ?? '';
                $link = $item['link'] ?? '#';
            ?>
                <a href="<?= esc_url($link); ?>" target="_blank" class="nav__social">
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

    <?php
    // Company Box
    $company_box = get_field('company-box', 'option');
    if (!empty($company_box)): ?>
        <div class="nav__infos">
            <?php foreach ($company_box as $item): 
                $svg_code = $item['company-svg-code'] ?? '';
                $link = $item['company-link'] ?? '#';
                $text = $item['company-text'] ?? '';
            ?>
                <a href="<?= esc_url($link); ?>" target="_blank" class="nav__info">
                    
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
                    <?php if (!empty($text)): ?>
                        <?= esc_html($text); ?>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

        <div class="nav__navbar">

            <a href="<?php echo esc_url(get_home_url()); ?>" class="nav__logo">
                <?php if ($logo): ?>
                <img src="<?php echo esc_url($logo); ?>" alt="Logo KOPO" />
                <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-png.png" alt="Logo KOPO" />
                <?php endif; ?>
            </a>


            <div class="nav__overlay"></div>
            <div class="nav__menu">
                <div class="nav__btns">
                    <p>MENU</p>
                    <button class="nav__close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="transform: ;msFilter:;">
                            <path
                                d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                            </path>
                        </svg>
                    </button>
                </div>


                <?php wp_nav_menu(array(
                'theme_location' => 'nav-menu',
                'container' => false,
                'menu_class' => 'nav__items',
                 'walker' => new navWalker(),
                ));?>




                <a href="<?php echo esc_url(get_home_url()); ?>" class="nav__logo">
                    <?php if ($logo): ?>
                    <img src="<?php echo esc_url($logo); ?>" alt="Logo KOPO" />
                    <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-png.png" alt="Logo KOPO" />
                    <?php endif; ?>
                </a>

                <div class="nav__motto">
                    <p>Przedstawiciel największego producenta w dziedzinie hydrauliki firmy PARKER HANNIFIN</p>
                </div>

                <?php
            

if (!empty($social_box)): ?>
                <div class="nav__socials">
                    <?php foreach ($social_box as $item): 
            $svg_code = $item['svg-code'];
            $link = $item['link'];
        ?>
                    <a href="<?= esc_url($link); ?>" target="_blank" class="nav__social">
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



            <button class="nav__btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    style="transform: ;msFilter:;">
                    <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                </svg>
            </button>

            <div class="nav__cta">
                <a href="" class="nav__cta-btn">Zapytanie</a>

            </div>
        </div>
    </div>
</nav>

