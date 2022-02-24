<?php get_header(); ?>
<main>
    <h2 class="p-works__title">WORKS</h2>
    <div class="p-works__container">
        <?php
        global $post;
        $args = array('posts_per_page' => 8);
        $myposts = get_posts($args);
        foreach ($myposts as $post) {
            setup_postdata($post);
        ?>
            <div class="item-box">
                <div class="thumbnail-box">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('index_thumbnail'); ?></a>
                </div>
                <div class="title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>
                <div class="category">
                    <a href="<?php the_permalink(); ?>"><?php the_category(',') ?></a>
                </div>
            </div>
        <?php
        }
        wp_reset_postdata();
        ?>
    </div>
    <div class="p-works__home-btn">
        <a href="/">HOME</a>
    </div>
</main>
<?php get_footer(); ?>