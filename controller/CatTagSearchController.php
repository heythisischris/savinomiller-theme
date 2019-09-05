<?php


class CatTagSearchController {



    var $collectionHtml = '';
    var $posts_per_page = 100;
    var $notFoundMessage = '<article class="cat-tag-search" ><div class="cat-tag-search-topper" ><h6>Sorry, we could not find any results for your search.</h6></div></article>';
    var $CCSclass = '';
    var $postType;
    var $topPartHtml = '';
    var $entityCollection = array();
    var $currentCat;
    var $currentCatName;


    public function run(WpEntityApplication $wpEntity){

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $this->topPartHtml = $this->notFoundMessage;
        $collection = array();

        if(!empty($_GET['cat'])){
            $category_name = str_replace('/','',$_GET['cat']);
            $this->CCSclass = 'search-cat';
            $this->topPartHtml = '<h1>Category: '.$this->findCategoryBySlug($_GET['cat']).'</h1>';
            $args = array('post_type' => $this->postType, 'posts_per_page' => $this->posts_per_page, 'paged'=>$paged, 'category_name' => $category_name);
            $wp_query = new WP_Query($args);
            $this->entityCollection = $wpEntity->entifyPostsFromWP_Query($wp_query);

        }else if(!empty($_GET['tag'])){
            $this->CCSclass = 'search-cat';
            $tag_name = str_replace('/','',$_GET['tag']);
            $this->topPartHtml = '<h1>Tag: '.findCategoryBySlug($_GET['tag']).'</h1>';
            $args = array('post_type' => $this->postType, 'posts_per_page' => $this->posts_per_page, 'paged'=>$paged, 'tag' => $tag_name);
            $wp_query = new WP_Query($args);
            $this->entityCollection = $wpEntity->entifyPostsFromWP_Query($wp_query);

        }else if(!empty($_GET['search'])){
            $this->CCSclass = 'search-cat';
            $search = $_GET['search'];
            $this->topPartHtml = '<h1>Search: '.stripslashes($search).'</h1>';
            $args = array('post_type' => $this->postType, 'posts_per_page' => $this->posts_per_page, 'paged'=>$paged, 's' => $search,'orderby' => 'date');
            $wp_query = new WP_Query($args);
            $this->entityCollection = $wpEntity->entifyPostsFromWP_Query($wp_query);

            if(empty($this->entityCollection)){
                $search = strtolower(str_replace(' ','-',$search));

                $args = array('post_type' => $this->postType, 'posts_per_page' => $this->posts_per_page, 'paged'=>$paged,'category_name' => $search);
                $wp_query = new WP_Query($args);
                $this->entityCollection = $wpEntity->entifyPostsFromWP_Query($wp_query);
                if(empty( $this->entityCollection)){
                    $args = array('post_type' => $this->postType, 'posts_per_page' => $this->posts_per_page, 'paged'=>$paged,'tag' => $search);
                    $wp_query = new WP_Query($args);
                    $this->entityCollection = $wpEntity->entifyPostsFromWP_Query($wp_query);
                }
            }
        }else{
            $args = array('post_type' => $this->postType, 'posts_per_page' => $this->posts_per_page, 'paged'=>$paged);
            $this->topPartHtml = '';
            $wp_query = new WP_Query($args);
            $this->entityCollection = $wpEntity->entifyPostsFromWP_Query($wp_query);
        }


    }

    function unSlug($string){
        $array = explode('-',$string);
        $html = '';
        foreach($array as $part){
            $html.=  ucfirst($part).' ';
        }
        if(empty($array)){
            $html = $string;
        }
        return rtrim($html);
    }


    function findCategoryBySlug($string){
        $obj = get_category_by_slug($string);
        $catName = str_replace('/','',$string);
        $catName = $this->unSlug($catName);

        if(false !=  $obj){
            $catName = $obj->name;
            $this->currentCatName = $catName;
            $this->currentCat = $obj;
        }
        return $catName;
    }
}