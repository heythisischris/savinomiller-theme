<?php


class SMPersonEntity extends WpEntity {


    var $config = array(
        'labels' => array(
            'name' => 'Team',
            'singular_name' => 'Team'
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_nav_menus' => true,
        'taxonomies' => array(),
        'rewrite' => array('slug' => 'team'),
        'supports' => array('title','editor','author','thumbnail')
    );
    var $metaboxPath = "entity/metaboxes/SMPersonEntity-metaboxes.php";

    var $cv = '';

    var $corporateTitle = '';
    var $corporateFunction = '';
    var $email = '';
    var $type = '';

    public function populate(){


        $this->cv = $this->getMetaValue('SMPersonEntitycv');
        $this->corporateTitle = $this->getMetaValue('SMPersonEntitycorporateTitle');
        $this->corporateFunction = $this->getMetaValue('SMPersonEntitycorporateFunction');
        $this->email = $this->getMetaValue('SMPersonEntityemail');
        $this->type = $this->getMetaValue('SMPersonEntitytype');
        $this->resume =  $this->getMetaValue('SMPersonEntityresume');

        /*
        $imageGallery1 = $this->getMetaValue('SMPersonEntity-images-1');

        if(!empty($imageGallery1)){

            if(is_array($imageGallery1)){
                foreach($imageGallery1 as $image){
                    $this->imageGallery1[] = new MediaEntity($image);
                }
            }else{
                $this->imageGallery1[] = new MediaEntity($imageGallery1);
            }
        }
*/

    }
}