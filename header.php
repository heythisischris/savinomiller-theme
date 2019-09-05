<?php
//$post = get_post();
$wpEntity = new WpEntityApplication();
$wpEntity->init();
$entity = $wpEntity->entity;
if(empty($entity)){
$entity = $wpEntity->getEntity(4);
}

if(empty($entity->metaboxKey)){
$entity->metaboxKey = 'Ultrap';
}

$metaTagController = new SMMetatagController($entity);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $metaTagController->title; ?></title>
    <base href="<?php echo home_url(); ?>" >
    <link rel="canonical" href="<?php echo $entity->url; ?>" />


    <meta name="description" content="<?php echo $metaTagController->description; ?>" />
    <meta name="generator" content="http://tnbw.com - Till Bergs" />

    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $metaTagController->title; ?>" />
    <meta property="og:description" content="<?php echo $metaTagController->description; ?>" />
    <meta property="og:url" content="<?php echo $entity->url; ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
    <?php echo $metaTagController->ogImageTag; ?>

    <?php //wp_head(); ?>

    <meta name="viewport" content="minimum-scale=1.0, width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <script src="<?php echo TEMPLATE_URI; ?>/framework-assets/js/modernizr-2.6.2.min.js" ></script>
    <script type='text/javascript' src='<?php echo TEMPLATE_URI; ?>/framework-assets/js/jquery/jquery-1.11.2.min.js'></script>

    <link rel='stylesheet' href='<?php echo TEMPLATE_URI; ?>/framework-assets/css/normalize-3.0.2-custom.css' type='text/css' />
    <link rel='stylesheet' href='<?php echo TEMPLATE_URI; ?>/framework-assets/css/defaults.css' type='text/css' />
    <link rel="stylesheet" href="<?php echo TEMPLATE_URI; ?>/icons/genericons/genericons.css" />

    <link rel='stylesheet' href='<?php echo TEMPLATE_URI; ?>/style.css' type='text/css' />
    <link rel='stylesheet' href='<?php echo TEMPLATE_URI; ?>/responsive.css' type='text/css' />
    <script type='text/javascript' src='<?php echo TEMPLATE_URI; ?>/js/jquery.cycle2.min.js'></script>
    <script type='text/javascript' src='<?php echo TEMPLATE_URI; ?>/js/jquery.cycle2.swipe.min.js'></script>

    <script type='text/javascript' src='<?php echo TEMPLATE_URI; ?>/framework-assets/js/helpers-script-0.4.js'></script>
    <script type='text/javascript' src='<?php echo TEMPLATE_URI; ?>/js/scripts.js'></script>


    <script type="text/javascript" >
        var baseUrl = '<?php echo home_url(); ?>/';
        var currentUrl = '<?php echo home_url(); ?>';
        var spinnerLink = "<?php echo TEMPLATE_URI; ?>/img/spinner.gif";
        var templateUri = "<?php echo TEMPLATE_URI; ?>";

    </script>
    <?php /* ?>
    <link rel="shortcut icon" href="<?php echo TEMPLATE_URI; ?>/img/favicon.gif"  />
    <?Php */ ?>
</head>

<body <?php body_class(); ?> >

<?php include('views/fixed-elements.phtml'); ?>
