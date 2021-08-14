<?php get_header(); ?>
    <div id="primary">
        <main id="main">
            <?php
                if ( have_posts() ){
                    while ( have_posts() ) : the_post();
                        the_title();
                        the_content();
                endwhile;
                }
            ?>
        </main>
    </div>
<?php get_footer(); ?>
 