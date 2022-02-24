<?php
function Portfolio_setup()
{
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'Portfolio_setup'); //after_setup_themeアクションフック※に登録します。