<?php
if(!defined(SCRIPT_DEBUG)){
    define('SCRIPT_DEBUG',false);
}
ini_set('error_reporting', E_ALL);
ini_set('display_errors','On');

show_admin_bar( false );

define("LOCAL_SERVER_NAME",'savinomiller.loc');
define("APPLICATION_NAME",'savinomiller.loc');

define("REMOTE_SITE_URL",'http://staging.tnbw.com/savinomiller');

define("TEMPLATE_URI",get_template_directory_uri());
define("TEMPLATE_DIR",get_template_directory());

define( 'DISALLOW_FILE_EDIT', true );

/* COMMENTS are off */
if(isset($_POST['comment_post_ID'])){
    echo 'Sorry comments are not allowed';
    exit;
}

if('staging.tnbw.com' == $_SERVER['SERVER_NAME']) {
    $letPass = false;
    $authDomain = 'savino';
    if (!empty($_POST[$authDomain.'-user-auth']) && $_POST[$authDomain.'-user-auth'] == 'savino') {
        setcookie($authDomain.'-user-auth', 'savino', 0, "/");
        $letPass = true;
    }

    if (!empty($_COOKIE[$authDomain.'-user-auth']) && $_COOKIE[$authDomain.'-user-auth'] == 'savino') {
        $letPass = true;
        setcookie($authDomain.'-user-auth', 'savino', 0, "/");
    }

    if ($letPass == false) {
        echo 'Please enter your authorization token:
	<form method="post" name="authform" >
	<input type="text" name="'.$authDomain.'-user-auth" value="" />
	<input type="submit" value="Submit" />
	</form>
	';
        exit;
    }
}

// legacy
define('BASE_URL',home_url().'/');

require_once(ABSPATH.'wp-content/plugins/srgbe-framework-0006-savino/application.ini.php');
require_once(TEMPLATE_DIR.'/controller/SMMetatagController.php');


function returnManifest(){
    $manifest = array();
    $manifest['dirs'] = array();
    $upload_dir = wp_upload_dir();
    $baseurl = $upload_dir['baseurl'];
    $manifest['baseurl'] =$baseurl;

    $path = $upload_dir['basedir'];
    $manifest['basedir'] = $path;

    $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
    foreach($objects as $name => $object){

        $relativeName = str_replace($path,'',$name);
        if(is_file($name)){
            $manifest['files'][] = str_replace($path,$baseurl,$name);
        }

        if(is_dir($name)){
            $dirname = str_replace($path,$baseurl,$name);
            $dirname = str_replace('/..','',$dirname);
            $dirname = str_replace('/.','',$dirname);
            if(!in_array($dirname,$manifest['dirs'])){
                $manifest['dirs'][] = str_replace($path,$baseurl,$dirname);
            }

        }

    }
    header('Content-Type: application/json');
    echo json_encode($manifest);
    exit;
}


if(!empty($_GET['returnManifest'])){
    returnManifest();
    exit;
}


//print_r($wpEntity);
add_action( 'init', 'initWpEntity' );

function initWpEntity() {
    global $wpEntity;

    $wpEntity->enabledEntities = array('Pressnews');
    //$wpEntity->enabledEntities = array();
    foreach($wpEntity->enabledEntities as $key){
        include_once(FRAMEWORK_PATH.'/entity/'.$key.'Entity.php');
        $classString = $key.'Entity';
        $entity = new  $classString();
        $entity->registerEntity();
    }

    $templateEntities = array('SMProject','SMPerson','SMAward');
    foreach($templateEntities as $key){
        include_once(TEMPLATE_DIR.'/entity/'.$key.'Entity.php');
        $classString = $key.'Entity';
        $entity = new  $classString();
        $entity->registerEntity();
        //print_r($entity);
    };
}



function register_my_menu() {
    register_nav_menu('main-menu',__( 'Main menu' ));
    register_nav_menu('about-sub-menu',__( 'About sub menu' ));
    //register_nav_menu('team-sub-menu',__( 'Team sub menu' ));
    //register_nav_menu('project-sub-menu',__( 'Project sub menu'));
    //register_nav_menu('press-sub-menu',__( 'Press sub menu'));
    //register_nav_menu('video-menu',__( 'Video menu'));
    //register_nav_menu('siteview-menu',__( 'Site view menu'));
}
add_action('init','register_my_menu');


add_filter('rwmb_meta_boxes','SRGBE_post_register_meta_boxes');
function SRGBE_post_register_meta_boxes( $meta_boxes ){
    $prefix = 'SRGBEpost';




    $meta_boxes[] = array(
        'id' => 'standard',
        'post_types' => array( 'post', 'page' ),
        'title' => __( '&nbsp', 'meta-box' ),
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
                'name' => __( 'Images 2 (optional - will be used as background on about pages)', 'meta-box' ),
                'id' => "{$prefix}-images-2",
                'type' => 'image_advanced',
                'max_file_uploads' => 50,
            ),
            array(
                'name' => __( 'Source link', 'meta-box' ),
                'id' => "{$prefix}-source",
                'desc' => __( '', 'meta-box' ),
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            ),
            array(
                'name' => __( 'Source label', 'meta-box' ),
                'id' => "{$prefix}-sourceName",
                'desc' => __( '* optional', 'meta-box' ),
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            ),
            array(
                'name' => __( 'Vimeo id', 'meta-box' ),
                'id' => "{$prefix}-vimeoId",
                'desc' => __( '(use the number from the url:https://vimeo.com/90322634 )', 'meta-box' ),
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            ),
            array(
                'name' => __( 'Meta Title', 'meta-box' ),
                'id' => "{$prefix}meta-title",
                'desc' => __( '', 'meta-box' ),
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            ),
            array(
                'name' => __( 'Meta Description', 'meta-box' ),
                'id' => "{$prefix}meta-description",
                'type' => 'textarea',
                'cols' => 20,
                'rows' => 3,
            ),
            array(
                'name' => __('Seo H1', 'meta-box' ),
                'id' => "{$prefix}seo-h1",
                'desc' => __( '', 'meta-box' ),
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            ),
            array(
                'name' => __( 'Open Graph image (*optional)', 'meta-box' ),
                'id' => $prefix."openGraphImage",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
            ),

        )
    );

    // homepage only
    if(!empty($_REQUEST['post']) && $_REQUEST['post'] == 4 ||!empty($_REQUEST['post_ID']) && $_REQUEST['post_ID'] == 4 ){
        $meta_boxes[0]['fields'][] = array(
            'type' => 'divider',
            'id' => 'fake_divider_id', // Not used, but needed
        );

        $i = 1;
        while($i <= 21){

            $meta_boxes[0]['fields'][] = array(
                'name' => __( 'Title '.$i, 'meta-box' ),
                'desc' => __( '', 'meta-box' ),
                'id' => $prefix.$i."sectionTitle",
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            );

            $meta_boxes[0]['fields'][] = array(
                'name' => __( 'Outbound link '.$i, 'meta-box' ),
                'desc' => __( '', 'meta-box' ),
                'id' => $prefix.$i."outboundLink",
                'type' => 'text',
                'std' => __( '', 'meta-box' ),
                'clone' => false,
            );

            $meta_boxes[0]['fields'][] = array(
                'name' => __('Link '.$i, 'meta-box' ),
                'id' => $prefix.$i."pages",
                'type' => 'post',
                'post_type' => array('page','pressnewsentity','smawardentity'),
                'field_type' => 'select_advanced',
                'placeholder' => __( 'Select an Item', 'meta-box' ),
                'query_args' => array(
                    'post_status' => 'publish',
                    'posts_per_page' => - 1,
                )
            );

            $meta_boxes[0]['fields'][] = array(
                'name' => __( 'Image '.$i, 'meta-box' ),
                'id' => $prefix.$i."imgadv",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
            );
            /*
            $meta_boxes[0]['fields'][] = array(
                'name' => __( 'Text '.$i, 'meta-box' ),
                'id' => $prefix.$i."wysiwyg",
                'type' => 'wysiwyg',
                'raw' => false,
                'std' => __( '', 'meta-box' ),
                'options' => array(
                    'textarea_rows' => 4,
                    'teeny' => true,
                    'media_buttons' => false,
                )
            );
            */
            $i++;
        }
    }


    return $meta_boxes;
};


