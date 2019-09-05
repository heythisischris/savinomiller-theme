<?php
/**
 * Template Name: Portfolio Landing
 * *
 */
if(isset($_GET['cat'])){
    include('page-project-overview.php');
}else{
    include('page-homepage.php');
}