<?php
/**
 * Created by PhpStorm.
 * User: Till
 * Date: 9/3/14
 * Time: 1:47 PM
 */


class SiteviewEntity extends WpEntity {


    var $config = array(
        'labels' => array(
            'name' => 'Site views',
            'singular_name' => 'Site view'
        ),
        'public' => true,
        'has_archive' => false,
        'show_in_nav_menus' => false,
        'rewrite' => array('slug' => 'site-view')
    );


    var $metaboxPath = "entity/metaboxes/SiteviewEntity-metaboxes.php";

    var $source = '';


    public function populate(){
        $this->source = $this->getMetaValue('SiteviewEntity-source');

    }



}