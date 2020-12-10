<?php

function turbo_wpml_languages($extra_class = '')
{

    global $turbo_option_data;

    $languages = icl_get_languages('skip_missing=0');
    $wpml_select = $turbo_option_data['turbo-wpml-select'];

    echo '<li class="dropdown ' . $extra_class . '">';

    if ($wpml_select === 'name') {
        foreach ($languages as $language) {
            if ($language['active']) {
                echo '<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="' . $language['url'] . '">';
                echo esc_attr($language['translated_name']);
                echo '<svg class="rq-chevron-down" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>';
                echo '</a>';
            }
        }

        echo '<ul class="dropdown-menu with-language">';
        foreach ($languages as $language) {
            if (!$language['active']) {
                echo '<li><a href="' . $language['url'] . '">' . $language['translated_name'] . '</a></li>';
            }
        }
        echo '</ul>';
    } elseif ($wpml_select === 'code') {

        foreach ($languages as $language) {
            if ($language['active']) {
                echo '<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="' . $language['url'] . '">';
                echo esc_attr($language['language_code']);
                echo '<span class="fas fa-angle-down"></span>';
                echo '</a>';
            }
        }

        echo '<ul class="dropdown-menu with-language">';

        foreach ($languages as $language) {
            if (!$language['active']) {
                echo '<li><a href="' . $language['url'] . '">' . $language['language_code'] . '</a></li>';
            }
        }
        echo '</ul>';
    } else {
        foreach ($languages as $language) {
            if ($language['active']) {
                echo '<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="' . $language['url'] . '">';
                echo '<img src="' . $language['country_flag_url'] . '">';
                echo '<span class="fas fa-angle-down"></span>';
                echo '</a>';
            }
        }

        echo '<ul class="dropdown-menu with-language">';
        foreach ($languages as $language) {
            if (!$language['active']) {
                echo '<li><a href="' . $language['url'] . '"><img src="' . $language['country_flag_url'] . '"></a></li>';
            }
        }
        echo '</ul>';
    }

    echo '</li>';
}
