<?php


class SMAwardEntity extends WpEntity {


    var $config = array(
        'labels' => array(
            'name' => 'Awards',
            'singular_name' => 'Award'
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_nav_menus' => true,
        'taxonomies' => array(),
        'rewrite' => array('slug' => 'awards'),
        'supports' => array('title','editor','author','thumbnail')
    );
    var $metaboxPath = "entity/metaboxes/SMAwardEntity-metaboxes.php";
    var $link = '';
    var $fileAttachment = '';
    /*
    var $imageGallery1 = array();
    var $imageGallery2 = array();
    */

    public function populate(){


        $this->date = $this->getMetaValue('SMAwardEntity-date');
        $this->link = $this->getMetaValue('SMAwardEntity-link');
        $this->linktoproject = $this->getMetaValue('SMAwardEntitylinktoproject');
        $fileAttachmentId = $this->getMetaValue('SMAwardEntityfileAttachmentId');
        if(!empty($fileAttachmentId)){
            $this->fileAttachment = new MediaEntity($fileAttachmentId);
        }
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