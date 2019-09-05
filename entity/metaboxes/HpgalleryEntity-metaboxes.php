<?php
/**
 * Created by PhpStorm.
 * User: Till
 * Date: 2/3/15
 * Time: 5:40 PM
*/


add_filter('rwmb_meta_boxes','hp_gallery_entity_register_meta_boxes');

function hp_gallery_entity_register_meta_boxes( $meta_boxes ){
    $prefix = 'HpGalleryEntity';


    $meta_boxes[] = array(
        'id' => 'standard',
        'title' => __( '&nbsp', 'meta-box' ),
        'post_types' => array( 'hpgalleryentity'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __( 'Page Title (h1 Tag)', 'meta-box' ),
                'id' => "{$prefix}-page-title",
                'desc' => __( '', 'meta-box' ),
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            ),
            array(
                'name' => __( 'Images 1', 'meta-box' ),
                'id' => "{$prefix}-images-1",
                'type' => 'image_advanced',
                'max_file_uploads' => 50,
            ),
            array(
                'name' => __( 'Images 2 (optional)', 'meta-box' ),
                'id' => "{$prefix}-images-2",
                'type' => 'image_advanced',
                'max_file_uploads' => 20,
            )
        ),
    );

    return $meta_boxes;
};

