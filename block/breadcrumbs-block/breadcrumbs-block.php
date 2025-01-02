<?php

global $post;


$image_id = get_field('breadcrumbs-image');
$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';


if (!is_singular() && !is_archive()) {
    echo '<div class="breadcrumbs"><p>Breadcrumbs są dostępne tylko na stronach, wpisach i archiwach.</p></div>';
    return;
}


$breadcrumbs = '<div class="breadcrumbs" aria-label="Breadcrumb">';


if ($image_url) {
    $breadcrumbs .= '<div class="breadcrumbs__image"><img src="' . esc_url($image_url) . '" alt="' . esc_attr__('Breadcrumb Image', 'text-domain') . '"></div>';
}

$breadcrumbs .= '<ul class="breadcrumbs__list">';


$breadcrumbs .= '<li class="breadcrumbs__item"><a href="' . esc_url(home_url()) . '">' . __('Strona Główna', 'text-domain') . '</a></li>';


if (is_page() && $post->post_parent) {
    $parent_id = $post->post_parent;
    $parents = [];

    while ($parent_id) {
        $page = get_post($parent_id);
        $parents[] = '<li class="breadcrumbs__item"><a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a></li>';
        $parent_id = $page->post_parent;
    }

    
    $parents = array_reverse($parents);
    foreach ($parents as $parent) {
        $breadcrumbs .= $parent . get_breadcrumb_arrow();
    }
}


if (is_singular()) {
    $breadcrumbs .= get_breadcrumb_arrow() . '<li class="breadcrumbs__item active">' . esc_html(get_the_title()) . '</li>';
}


if (is_archive()) {
    $breadcrumbs .= get_breadcrumb_arrow() . '<li class="breadcrumbs__item active">' . post_type_archive_title('', false) . '</li>';
}

$breadcrumbs .= '</ul></div>';

echo $breadcrumbs;


function get_breadcrumb_arrow() {
    return '<span class="breadcrumbs__separator" aria-hidden="true">' .
        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">' .
        '<path d="M9.29 16.29a1 1 0 0 1 0-1.42L13.17 12 9.3 8.13a1 1 0 1 1 1.41-1.41l4.59 4.59a1 1 0 0 1 0 1.41l-4.59 4.59a1 1 0 0 1-1.41 0z"/>' .
        '</svg>' .
        '</span>';
}

?>
