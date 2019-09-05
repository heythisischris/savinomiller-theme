<?php
add_filter('rwmb_meta_boxes','siteview_register_meta_boxes');

function siteview_register_meta_boxes( $meta_boxes ){
    $prefix = 'siteview';

    $meta_boxes[] = array(
            'id' => 'standard',
            'title' => __( '&nbsp', 'meta-box' ),
            'context' => 'normal',
            'priority' => 'high',
            'autosave' => true,
            'fields' => array(
            array(
                'name' => __( 'Source link', 'meta-box' ),
                'id' => "{$prefix}-source",
                'desc' => __( '', 'meta-box' ),
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            )
        )
    );
    return $meta_boxes;
};