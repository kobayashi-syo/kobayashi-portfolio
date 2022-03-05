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

    <div class="p-category__container">
        <div class="wrapper">
            <!--メイン-->
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="archive-item">
                        <!--カテゴリー記事一覧をパーツ化して読み込み-->
                        <article id="post-<?php the_ID(); ?>" <?php post_class('archive-contents'); ?>>
                            <div class="archive_eyecatch">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('full'); ?>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <?php the_category(); ?>
                            <div class="archive_meta">
                                <a href="<?php the_permalink(); ?>">
                                    <h2 class="archive_title"><?php the_title(); ?></h2>
                                </a>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
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