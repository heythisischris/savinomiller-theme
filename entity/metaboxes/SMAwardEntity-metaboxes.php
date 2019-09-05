<?php



add_filter('rwmb_meta_boxes','sm_award_entity_register_meta_boxes');

function sm_award_entity_register_meta_boxes( $meta_boxes ){
    $prefix = 'SMAwardEntity';


    $meta_boxes[] = array(
        'id' => 'standard',
        'title' => __( '&nbsp', 'meta-box' ),
        'post_types' => array( 'smawardentity'),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => __( 'Date', 'meta-box' ),
                'id' => "{$prefix}date",
                'type' => 'date',
                // jQuery date picker options. See here http://api.jqueryui.com/datepicker
                'js_options' => array(
                    'appendText' => __( '(yyyy-mm-dd)', 'meta-box' ),
                    'dateFormat' => __( 'yy-mm-dd', 'meta-box' ),
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                ),
            ),
            array(
                'name' => __( 'Link to project', 'meta-box' ),
                'id' => "{$prefix}linktoproject",
                'type' => 'post',
// Post type
                'post_type' => 'smprojectentity',
// Field type, either 'select' or 'select_advanced' (default)
                'field_type' => 'select_advanced',
                'placeholder' => __( 'Select an Item', 'meta-box' ),
// Query arguments (optional). No settings means get all published posts
                'query_args' => array(
                    'post_status' => 'publish',
                    'posts_per_page' => - 1,
                )
            ),
            array(
                'name' => __( 'Outside Link', 'meta-box' ),
                'id' => "{$prefix}-link",
                'desc' => __( '', 'meta-box' ),
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            ),
            array(
                'name' => __( 'File Attachment', 'meta-box' ),
                'id' => "{$prefix}fileAttachmentId",
                'type' => 'file',
            )
        ),
    );

    return $meta_boxes;
};