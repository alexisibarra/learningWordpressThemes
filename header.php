<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="container">
        <header class="site-header">
        <div class="row">
            <div class="col-sm-6">
                <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a></h1>
                <h5>
                    <?php bloginfo('description') ?>

                    <?php if (is_page('portfolio')) { ?>
                    - <span>Thanks for visiting us</span>
                    <?php } ?>
                </h5>
            
                <nav class="site-nav">
                    <?php
                        $args = array(
                            'theme_location' => 'primary',
                            'menu_class' => 'nav nav-tabs'
                        )
                    ?>
                    <?php wp_nav_menu( $args) ?>
                </nav>
            </div>
            <div class="col-sm-6">
                <div class="hd-search text-right">
                    <?php get_search_form() ?>
                </div>

            </div>
        </div>
        </header>
