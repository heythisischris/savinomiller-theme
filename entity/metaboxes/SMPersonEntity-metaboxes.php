<?php



add_filter('rwmb_meta_boxes','sm_person_entity_register_meta_boxes');

function sm_person_entity_register_meta_boxes( $meta_boxes ){
    $prefix = 'SMPersonEntity';


    $meta_boxes[] = array(
        'id' => 'standard',
        'title' => __( '&nbsp', 'meta-box' ),
        'post_types' => array( 'smpersonentity'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __( 'Title', 'meta-box' ),
                'id' => "{$prefix}corporateTitle",
                'desc' => __( '', 'meta-box' ),
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            ),
            array(
                'name' => __( 'Function', 'meta-box' ),
                'id' => "{$prefix}corporateFunction",
                'desc' => __( '', 'meta-box' ),
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            ),
            array(
                'name' => __( 'Phone number', 'meta-box' ),
                'id' => "{$prefix}phone",
                'desc' => __( '', 'meta-box' ),
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            ),
            array(
                'name' => __( 'CV', 'meta-box' ),
                'id' => "{$prefix}cv",
                'desc' => __( '', 'meta-box' ),
                'type' => 'wysiwyg',
                'std' => __( '', 'meta-box' ),
                'raw' => false,
                'options' => array(
                    'textarea_rows' => 4,
                    'teeny' => true,
                    'media_buttons' => false,
                ),
            ),
            array(
                'name' => __( 'Row in grid on staff page', 'meta-box' ),
                'id' => "{$prefix}type",
                'type' => 'select_advanced',
// Array of 'value' => 'Label' pairs for select box
                'options' => array(
                    'first-row' => __( 'First row', 'meta-box' ),
                    'second-row' => __( 'Second row', 'meta-box' )
                ),
// Select multiple values, optional. Default is false.
                'multiple' => false,
// 'std' => 'value2', // Default value, optional
                'placeholder' => __( 'Select an Item', 'meta-box' ),
            ),
            array(
                'name' => __( 'Email', 'meta-box' ),
                'id' => "{$prefix}email",
                'desc' => __( '', 'meta-box' ),
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            ),
            array(
                'name' => __( 'Resume', 'meta-box' ),
                'id' => "{$prefix}resume",
                'type' => 'file',
            ),
        ),
    );

    return $meta_boxes;
};








