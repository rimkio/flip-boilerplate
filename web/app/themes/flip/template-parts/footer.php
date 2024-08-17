<?php
/**
 * Header template
 */

$classes = [
	'main-footer',
];

$logo      = __get_field('logo_ft', 'option');
$cta       = __get_field('btn_contact', 'option');
$copyright = __get_field('copyright_ft', 'option');
$author    = __get_field('author', 'option');
?>

<footer id="site-footer" class="<?php echo implode( ' ', $classes ) ?>">
    <div class="main-footer-warp">
        <div class="container"> 
            <div class="main-footer-top"> 
                <div class="main-footer-top-inner"> 
                    <div class="main-footer-top-left">
                        <?php if(!empty($logo) && isset($logo)): ?>
                            <div class="main-footer--logo"> 
                                <img src="<?= $logo ?>" alt="logo footer" />
                            </div>
                        <?php endif;?>

                        <?php if (has_nav_menu('explore-menu')): ?>
                            <div class="main-footer-top--menu main-footer--explore-menu d-none d-lg-block"> 
                                <h2>Explore</h2>
                                <?php 
                                    wp_nav_menu([
                                        'theme_location' => 'explore-menu',
                                        'menu_class'     => 'explore-menu',
                                        'container'      => false,
                                        'items_wrap'     => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                                        'bootstrap'      => false
                                    ]);
                                ?>
                            </div>
                        <?php endif; ?> 

                        <?php if(!empty($cta['url']) && !empty($cta['title'])): ?>
                            <div class="main-footer--cta d-none d-sm-block d-lg-none"> 
                                <a href="<?= $cta['url'] ?>" target="<?= $cta['target'] ?>">
                                    <?= $cta['title'] ?>
                                </a>
                            </div>
                        <?php endif;?>
                    </div>

                    <div class="main-footer-top-right">  
                        <?php if (has_nav_menu('explore-menu')): ?>
                            <div class="main-footer-top--menu main-footer--explore-menu d-lg-none"> 
                                <h2>Explore</h2>
                                <?php 
                                    wp_nav_menu([
                                        'theme_location' => 'explore-menu',
                                        'menu_class'     => 'explore-menu',
                                        'container'      => false,
                                        'items_wrap'     => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                                        'bootstrap'      => false
                                    ]);
                                ?>
                            </div>
                        <?php endif; ?>

                        <?php if (has_nav_menu('organisation-menu')): ?>
                            <div class="main-footer-top--menu main-footer--organisation-menu"> 
                                <h2>Organisation</h2>
                                <?php 
                                    wp_nav_menu([
                                        'theme_location' => 'organisation-menu',
                                        'menu_class'     => 'organisation-menu',
                                        'container'      => false,
                                        'items_wrap'     => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                                        'bootstrap'      => false
                                    ]);
                                ?>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($cta['url']) && !empty($cta['title'])): ?>
                            <div class="main-footer--cta d-block d-sm-none d-lg-block"> 
                                <a href="<?= $cta['url'] ?>" target="<?= $cta['target'] ?>">
                                    <?= $cta['title'] ?>
                                </a>
                            </div>
                        <?php endif;?> 
                    </div>
                </div>
            </div>

            <div class="main-footer-bottom"> 
                <div class="main-footer-bottom-inner"> 
                    <div class="main-footer-bottom-left"> 
                        <?php if(!empty($copyright) && isset($copyright)): ?>
                            <p class="main-footer--copyright"><?= str_replace('{{YEAR}}', date('Y'), $copyright) ?></p>
                        <?php endif;?> 
                        
                        <?php if (has_nav_menu('terms-menu')): ?>
                            <?php 
                                wp_nav_menu([
                                    'theme_location' => 'terms-menu',
                                    'menu_class'     => 'terms-menu',
                                    'container'      => false,
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                                    'bootstrap'      => false
                                ]);
                            ?>
                        <?php endif; ?>
                    </div>

                    <div class="main-footer-bottom-right"> 
                        <?php if(!empty($author) && isset($author)): ?>
                            <p class="main-footer--flip-text"> <?= $author ?> </p>
                        <?php endif;?>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> <!-- #site-footer -->

