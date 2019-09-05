<?php
/**
 * Created by PhpStorm.
 * User: Till
 * Date: 9/3/14
 * Time: 1:47 PM
 */


class HpgalleryEntity extends WpEntity {


    var $config = array(
        'labels' => array(
            'name' => 'Homepage slides',
            'singular_name' => 'Homepage slides'
        ),
        'public' => true,
        'has_archive' => false,
        'show_in_nav_menus' => false,
        'rewrite' => array('slug' => 'hpgallery')
    );


    var $metaboxPath = "entity/metaboxes/HpgalleryEntity-metaboxes.php";

    var $slidesHtml = '';
    var $textdata1 = '';
    var $h1 = '';
    var $meta;
    var $imageGallery = array();

    public function populate(){
        $this->h1 = $this->getMetaValue('HomepageEntitypage-title');
        $imageGallery =  $this->getMetaValue('HpGalleryEntity-images-1');

        if(!empty($imageGallery)){
            foreach($imageGallery as $image){
                $mediaEntity = new MediaEntity($image);
                $this->imageGallery[] = $mediaEntity;
                $this->slidesHtml.= PartialRenderer::render(TEMPLATE_DIR.'/views/homepage/homepage-gallery-slide.phtml',$mediaEntity);
            }
        }
    }



}