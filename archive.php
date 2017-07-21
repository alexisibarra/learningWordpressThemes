<?php 

get_header();

if(have_posts()):

    ?>

        <h2>
        <?php
            if(is_category()) {
                single_cat_title();
            } elseif(is_tag()) {
                echo "tag";
            } elseif(is_author(  )){
                the_post();
                echo get_the_author( );
                rewind_posts();
            } elseif(is_day(  )){
                echo 'Day archive';
            } elseif(is_month(  )){
                echo 'Month';
            } elseif(is_year(  )){
                echo 'Year';
            } else {
                echo 'Archives';
            }
        ?>
        </h2>

    <?php while (have_posts()) : the_post(); ?>
    <article class="post">

        <h2>
            <a href="<?php the_permalink();?>"><?php the_title() ?></a>
        </h2>

        <p class="post-info">
            <?php the_time('F jS Y g:i a'); ?> | 
            <a href="<?php echo get_author_posts_url( get_the_author_meta('ID')) ?>">
                <?php the_author( ); ?>
            </a> |
            Posted in 
            <?php 
                $categories = get_the_category();
                $separator = ", ";
                $output = '';

                if($categories){
                    foreach ($categories as $category) {
                        $output .= "<a href='" . get_category_link( $category->term_id ). "'>". $category->cat_name . "</a>" . $separator;
                    }
                    
                }

                echo trim($output, $separator);
            ?>
        </p>
        <?php the_content() ?>
    </article>
        
    <?php endwhile; 
    else : 
        echo '<p>No content found</p>';
endif;

get_footer();

?>

