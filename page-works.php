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
    <div class="p-works__pagination">
        <div class="pnavi">
            <?php //ページリスト表示処理
            global $wp_rewrite;
            $paginate_base = get_pagenum_link(1);
            if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
                $paginate_format = '';
                $paginate_base = add_query_arg('paged', '%#%');
            } else {
                $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') .
                    user_trailingslashit('page/%#%/', 'paged');
                $paginate_base .= '%_%';
            }
            echo paginate_links(array(
                'base' => $paginate_base,
                'format' => $paginate_format,
                'total' => $the_query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '< 前へ',
                'next_text' => '次へ >',
            ));
            ?>
        </div>
    </div>
    <div class="p-works__home-btn">
        <a href="/">HOME</a>
    </div>
</main>
<?php get_footer(); ?>