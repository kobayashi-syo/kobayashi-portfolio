<?php get_header(); ?>
<main>
    <h2 class="p-works__title">WORKS</h2>
    <?php
    // 親カテゴリーのものだけを一覧で取得
    $args = array(
        'parent' => 0,
        'orderby' => 'term_order',
        'order' => 'ASC'
    );
    $categories = get_categories($args);
    ?>
    <div class="categories-lists">
        <?php foreach ($categories as $category) : ?>
            <li class="categorie-list">
                <a class="categorie" href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
            </li>
        <?php endforeach; ?>
    </div>

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
        <?php
        $args = array(
            'mid_size' => 1,
            'prev_text' => '&lt;&lt;前へ',
            'next_text' => '次へ&gt;&gt;',
            'screen_reader_text' => ' ',
        );
        the_posts_pagination($args);
        ?>
    </div>
    <div class="p-works__pagination">
        <div class="pagination">
            <div class="list-box">
                <ul>
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $the_query = new WP_Query(array(
                        'post_status' => 'publish',
                        'post_type' => 'post', //　ページの種類（例、page、post、カスタム投稿タイプ名）
                        'paged' => $paged,
                        'posts_per_page' => 8, // 表示件数
                        'orderby'     => 'date',
                        'order' => 'DESC'
                    ));
                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post();
                    ?>
                            <?php
                            /*　ここにループさせるコンテンツを入れます　*/
                            ?>
                    <?php
                        endwhile;
                    else :
                        echo '<div><p>ありません。</p></div>';
                    endif;
                    ?>
                </ul>
            </div>

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
    </div>
    <div class="p-works__home-btn">
        <a href="/">HOME</a>
    </div>
</main>
<?php get_footer(); ?>