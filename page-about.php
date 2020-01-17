<?php

get_header();
$wpEntity->init();
$entity = $wpEntity->entity;
if (strpos($_SERVER['REQUEST_URI'], 'mission')) {
    ?><script>document.getElementById('current-about-name').innerHTML='Studio'</script><?php
    preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $entity->content, $image); echo isset($image[1]) ? "<img class='about-banner-image' style='margin-top:120px;margin-bottom:20px;' src='".TEMPLATE_URI."/img/studio/1.jpg'>" : "";
}
?>
<style>
    body {
        margin-left:0px;
        margin-right:0px;
    }
    .about-banner-image {
        width:100%;
        height:750px;
        object-fit:cover;
    }
    p {
        margin:20px;
    }
    .page-content2 {
        margin-left: 0;
        margin-right: 0;
        width: 100%;
        text-align: left;
        font-size: 22px;
        line-height: 28px;
        padding-top: 0px;
        padding-left: 0px;
        padding-right: 0px;
        margin: 0 auto;
        color: #898D8D;
    }
    .about-link {
        color: #666666 !important;
        text-decoration: none;
        font-size:20px !important;
    }
    .about-block {
        text-align: justify;
        padding-left: 20%;
        padding-right: 20%;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .about-header {
        font-family: 'Segoe UI Semibold';
    }
    .top-block {
        font-size: 24px;
    }

    @media only screen
    and (min-width : 0px) and (max-width : 460px){
        .about-block {
            padding-left: 20px;
            padding-right: 20px;
        }
        .about-banner-image {
            height: 200px;
        }
        .left-image{
            float: none !important;
            width: 100% !important;
            margin-bottom: 0px !important;
        }
        .right-image{
            float: none !important;
            width: 100% !important;
            margin-top: 4px !important;
        }
        .right-block {
            font-size: 19px !important;
            line-height: 30px !important;
        }
        .top-block {
            font-size: 22px;
        }
    }
    @media only screen
    and (min-width : 461px) and (max-width : 750px){
    }
    @media only screen
    and (min-width : 751px) and (max-width : 1000px){
    }
</style>
<div id="main-content" >
    <div class="inner">
        <div class="page-content2">
            <div class="about-block top-block" style="text-align:center;">Savino & Miller Design Studio works to preserve, enhance, and transform environments with the purpose to enrichen human experience, and promote ecological stewardship.</div>
            <div class="about-block top-block" style="text-align:center;">We believe that design should consider and respect context, bring people together, and foster a greater awareness of place.</div>
            <img class='about-banner-image left-image' style='margin-top:40px;margin-bottom:40px;float:left;width:29.5%;object-position: 75% 0;' src='<?php echo TEMPLATE_URI ?>/img/studio/2.jpg'>
            <img class='about-banner-image right-image' style='margin-top:40px;margin-bottom:40px;float:right;width:70%' src='<?php echo TEMPLATE_URI ?>/img/studio/3.jpg'>
            <div class="about-block about-header">APPROACH</div>
            <div class="about-block">We are a team of professionals dedicated to improving and transforming our open spaces and built environments. Our guiding principle is to recognize the unique qualities inherent in each project.</div>
            <div class="about-block" style="text-align:center;font-style:italic;">WE ENGAGE THE CULTURAL AND ENVIRONMENTAL CONTEXT OF THE SITE WITH <b>IMAGINATION, ECOLOGICAL SENSITIVITY, RESILIENT PRACTICES</b> AND <b>THOUGHTFUL DESIGN</b>.</div>
            <div class="about-block">Our design process is a creative and collaborative exploration of ideas. SMDS integrates the diverse disciplines of landscape architecture, architecture, urban design, and fine arts, challenging our design team to view each project as a fresh canvas, specific to each site and client.</div>
            <div class="about-block">Careful attention to details helps to engender a sense of place and creates a unique experience. The firm is highly accomplished in bringing their projects to fruition with artistry and ecological sensitivity.</div>
            <img class='about-banner-image left-image' style='margin-top:40px;margin-bottom:40px;float:left;width:60%;' src='<?php echo TEMPLATE_URI ?>/img/studio/4.jpg'>
            <div class='about-banner-image right-image right-block' style='margin-top:40px;margin-bottom:40px;float:right;width:39.5%;background-color:#62B0BB;color:#ffffff;text-align:center;font-size:24px;line-height:50px;display: flex;align-items: center;'><div style="padding:10%;">As sculptors of the spatial environment, our aim is to create meaningful experiences and <b>“carve the very atmosphere and medium”</b> through which we move, breathe, and experience our lives.</div></div>
            <div class="about-block about-header">HISTORY</div>
            <div class="about-block">Savino & Miller Design Studio began in 1985 with the partnership of Adriana Savino and Barry Miller as a collaborative approach with architecture, landscape architecture, urban design and regional planning. Their first projects focused on the Art Deco District in Miami Beach where they showed how small gardens, courtyards and the outdoor terraces further contribute in the resurgence of the district framing, complementing and animating the beautiful architecture.</div>
            <div class="about-block" style="text-align:center;font-style:italic;"><b>PRESERVATION, SUSTAINABILITY, AND UPLIFTING THE ROLE OF NATURE</b> HAVE BEEN AT THE CORE OF OUR PRACTICE FROM THE VERY BEGINNING.</div>
            <img class='about-banner-image' style='margin-top:20px;margin-bottom:20px;' src='<?php echo TEMPLATE_URI ?>/img/studio/5.jpg'>
            <div class="about-block about-header" style="font-weight:800">SERVICES</div>
            <div class="about-block about-header">LANDSCAPE ARCHITECTURE</div>
            <div class="about-block">Our designs aim to bridge the built environment with the natural environment; fulfilling our role in environmental protection and meeting human needs for open space interaction and enjoyment. Our team is committed to restoring the natural environment disturbed by human activity. We believe that good outdoors design considers and is respectful of context, is ecologically responsible, brings people together, and fosters a greater awareness of place.</div>
            <div class="about-block about-header">URBAN DESIGN</div>
            <div class="about-block">Creative urban interventions combine our professional experience, knowledge and sensitivity toward the linkage of landscape, architecture and urban planning in order to integrate, enhance and transform the existing or proposed spatial infrastructure of a city, neighborhood or large project site.</div>
            <div class="about-block about-header">ARCHITECTURE</div>
            <div class="about-block">Our architectural projects achieve an integrated balance of building and open space to improve and preserve the scale and character of each site. Our goal is to provide our clients with creative buildings and spatial solutions that respond to pragmatic goals. At the same time, we respect and enhance the existing and relevant infrastructure, providing a contemporary response to the proposed building’s design program.</div>
            <div class="about-block about-header">MASTER PLANNING</div>
            <div class="about-block">Our focus is to provide a sound, efficient and pragmatic approach to site planning for a resilient future, which focuses on land stewardship, the creation of vibrant, safe urban places, and adaptive development. Site master planning is the moment when the crucial decisions involving how the project’s program interfaces with the site, and its cultural and natural context will be addressed.</div>
            <img class='about-banner-image left-image' style='margin-top:40px;margin-bottom:0px;float:left;width:49.75%;' src='<?php echo TEMPLATE_URI ?>/img/studio/6.jpg'>
            <img class='about-banner-image right-image' style='margin-top:40px;margin-bottom:0px;float:right;width:49.75%' src='<?php echo TEMPLATE_URI ?>/img/studio/7.jpg'>
        </div>
    </div>
</div>