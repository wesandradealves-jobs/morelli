<!DOCTYPE html>
<html <?php language_attributes(); $lang = explode("lang=",get_language_attributes()); ?>>
  <head>
    <title><?php echo (is_single() ? get_bloginfo('title')." - ".get_the_title() : get_bloginfo('title').' - '.get_bloginfo('description')); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta name="language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:locale" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo (is_single() ? get_bloginfo('title')." - ".get_the_title() : get_bloginfo('title')); ?>" />
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta property="og:url" content="<?php echo site_url(); ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="true">
    <?php wp_meta(); ?>
    <link rel="canonical" href="<?php echo site_url(); ?>" />
    <?php wp_head(); ?>
  </head>
  <body
    <?php
    if (is_front_page()) {
    echo 'class="pg-home"';
    } else if(is_author()){
    echo 'class="pg-author pg-profile pg-interna"';
    } else if(is_archive()){
    echo 'class="pg-archive pg-interna pg-'.get_queried_object()->slug.'"';
    } else if(is_category()){
    echo 'class="pg-category pg-interna pg-'.get_queried_object()->slug.'"';
    } else if(is_search()){
    echo 'class="pg-search pg-interna"';
    } else if(is_single()){
    echo 'class="pg-single pg-interna"';
    } else if(is_404()){
    echo 'class="pg-404 pg-interna"';
    } else {
    echo 'class="pg-interna pg-'.$post->post_name.' page_id_'.$post->ID.'"';
    }
    ?>>
    <div id="wrap">
        <header class="header">
            <div class="container">
                <?php get_template_part('template-parts/contato'); ?>
                <?php get_template_part('template-parts/logo'); ?>
                <?php get_template_part('template-parts/navigation'); ?>
            </div>
            <div class="mobile-navigation">
                <?php get_template_part('template-parts/navigation'); ?>
            </div>
        </header>
    	<main class="main">
