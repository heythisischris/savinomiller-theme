<?php


class SMProjectEntity extends WpEntity {


    var $config = array(
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project'
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_nav_menus' => true,
        'taxonomies' => array('post_tag','category'),
        'rewrite' => array('slug' => 'projects'),
        'supports' => array('title','editor','author','thumbnail')
    );
    var $metaboxPath = "entity/metaboxes/SMProjectEntity-metaboxes.php";
    var $pageTitle = '';
    var $projectDate = '';
    var $imageGallery1 = array();
    var $imageGallery2 = array();


    public function populate(){

        $this->pageTitle = $this->getMetaValue('SMProjectEntity-page-title');
        $this->projectDate = $this->getMetaValue('SMProjectEntity-projectdate');
        $imageGallery1 = $this->getMetaValue('SMProjectEntity-images-1');
        $imageGallery2 = $this->getMetaValue('SMProjectEntity-images-2');

        if(!empty($imageGallery1)){

            if(is_array($imageGallery1)){
                foreach($imageGallery1 as $image){
                    $this->imageGallery1[] = new MediaEntity($image);
                }
            }else{
                $this->imageGallery1[] = new MediaEntity($imageGallery1);
            }
        }

        if(!empty($imageGallery2)){
            if(is_array($imageGallery2)){
                foreach($imageGallery2 as $image){
                    $this->imageGallery2[] = new MediaEntity($image);
                }
            }else{
                $this->imageGallery2[] = new MediaEntity($imageGallery2);
            }
        }

    }
}