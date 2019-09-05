<?php



add_filter('rwmb_meta_boxes','sm_project_entity_register_meta_boxes');

function sm_project_entity_register_meta_boxes( $meta_boxes ){
    $prefix = 'SMProjectEntity';


    $meta_boxes[] = array(
        'id' => 'standard',
        'title' => __( '&nbsp', 'meta-box' ),
        'post_types' => array( 'smprojectentity'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __( 'Project date', 'meta-box' ),
                'id' => "{$prefix}-projectdate",
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
                'max_file_uploads' => 50,
            )
        ),
    );

    return $meta_boxes;
};