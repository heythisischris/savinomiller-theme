<?php
/**
 * Template Name: Portfolio Landing
 * *
 */

//echo '<script>console.log('.json_encode($post).');</script>';
if(isset($_GET['cat'])){
    $orderObject=json_decode($post->post_content);
    $orderKey=substr($_GET['cat'], 0, -1);
    if (array_key_exists($orderKey, $orderObject)) {
        $orderArray = $orderObject->{$orderKey};
    }
    include('page-project-overview.php');
}else{
    include('page-homepage.php');
}