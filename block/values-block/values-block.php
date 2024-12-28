<?php
$values_content = get_field('values-content');
$values_box = $values_content['values-box'];



?>


<section class="values">
    <div class="container">
    <?php
    // values Box
    if (!empty($values_box)): ?>
        <div class="values__boxes">
            <?php foreach ($values_box as $item): 
                $svg_code = $item['svg-code'] ?? '';
                $heading = $item['heading'] ?? '';
                $number = $item['number'] ?? '';
            ?>
                <div class="values__box">
                    
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
                    <?php if (!empty($heading)): ?>
                        <p class="values__title"><?= esc_html($heading); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($number)): ?>
                        <span class="values__number"><?= esc_html($number); ?></span>
                    <?php endif; ?>
                
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
      
    </div>
</section>