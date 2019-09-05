<?php



class SMMetatagController{

    var $title = '';
    var $ogTitle = '';
    var $ogImageTag = '';
    var $description = '';
    var $metaFeed = '';
    var $seoH1 = '';

    var $entity;


    public function __construct($entity){
        /** @var  @var $entity WpEntity */

        $entity->metaTitle = $entity->fetchMetaValue('meta-title');
        $entity->metaDescription = $entity->fetchMetaValue('meta-description');
        $entity->seoH1 = $entity->fetchMetaValue('seo-h1');

        if(!empty($entity->title) && $entity->title != ''){
            $this->title =  $entity->title." | ".get_bloginfo('name');
        }else{
            $this->title = wp_title( '' )." | ".get_bloginfo('name');
        }

        if(!empty($entity->metaTitle) && $entity->metaTitle != ""){
            $this->title = $entity->metaTitle;
        }
        $this->ogTitle = htmlentities($this->title,ENT_COMPAT,"UTF-8");

        if(!empty($entity->metaFeed) && $entity->metaFeed != ""){
            $this->metaFeed = $entity->metaFeed;
        }

        if(!empty($entity->seoH1) && $entity->seoH1 != ""){
            $this->seoH1 = $entity->seoH1;
        }


        $imgTag = '';
        if(isset($entity->featuredImage)){
            $entity->featuredImage->resize(1200,1200,0);
            $this->ogImageTag = '<meta property="og:image" content="'.$entity->featuredImage->urlsized.'" />';
        }


        if(!empty($entity->metaDescription) && $entity->metaDescription != ""){
            $this->description = $entity->metaDescription;
        }
        else{
            $this->description = $entity->content;
        }

        $this->description = htmlentities($this->minimizeHTML(strip_tags($this->description)),ENT_QUOTES,"UTF-8");

        //$this->entity = $entity;
    }




    private function minimizeHTML($string) {
        // will remove tabs, line breaks and extra white spaces
        $r = preg_replace(array('/\r/','/\n/','/
		/','/\t/'),'',$string);
        $r = preg_replace('/\s\s+/',' ',$r);
        return substr($r,0,250);
    }


}