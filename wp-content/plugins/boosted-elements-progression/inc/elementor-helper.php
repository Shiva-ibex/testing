<?php
namespace Elementor;

function boosted_elements_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'boosted-elements-progression',
        [
            'title'  => esc_html__( 'Boosted Elements Addons', 'boosted-elements-progression' ),
            'icon' => 'fa fa-cog'
        ],
        1
    );
}
add_action('elementor/init','Elementor\boosted_elements_elementor_init');


