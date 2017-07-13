<?php 
/*
Template Name: Special Layout
*/

get_header();

if(have_posts()):
    while (have_posts()) : the_post(); ?>
    <article class="post page">
        <div class="row">
            <div class="col-xs-2">
                <h2>
                    <?php the_title() ?>
                </h2>
            </div>
            <div class="col-xs-10">        
                <?php the_content() ?>
            </div>
        </div>
    </article>
        
    <?php endwhile; 
    else : 
        echo '<p>No content found</p>';
endif;

get_footer();

?>

