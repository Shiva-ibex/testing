<?php
namespace Elementor;

function progression_theme_elements_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'progression-studios-viseo',
        [
            'title'  => 'Theme Addons',
            'icon' => 'font'
        ],
        2
    );
}
add_action('elementor/init','Elementor\progression_theme_elements_elementor_init');




