<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kobayashi Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
</head>

<body>
    <div class="header__bg-color__box"></div>
    <header class="l-header">
        <div class="header-container">
            <a href="/" class="logo-btn">
                <div class="logo-box">
                    <h2 class="logo">Kobayashi PORTFOLIO</h2>
                </div>
            </a>
            <div class="openbtn4"><span class="ham-border"></span><span class="ham-border"></span><span class="ham-border"></span></div>
            <nav id="nav-box">
                <ul class="nav">
                    <a href="/" class="nav-link">
                        <li class="nav-item">HOME</li>
                    </a>
                    <a href="/works" class="nav-link">
                        <li class="nav-item">WORKS</li>
                    </a>
                    <a href="/about" class="nav-link">
                        <li class="nav-item">ABOUT</li>
                    </a>
                    <a href="/skill" class="nav-link">
                        <li class="nav-item">SKILL</li>
                    </a>
                    <a href="/#service" class="nav-link">
                        <li class="nav-item">SERVICE</li>
                    </a>
                    <a href="/contact" class="nav-link">
                        <li class="nav-item">CONTACT</li>
                    </a>
                </ul>
            </nav>
        </div>
    </header>