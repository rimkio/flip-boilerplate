<?php

/**
 * Header template
 */


$custom_logo_id = get_theme_mod('custom_logo');
$logo_arr = wp_get_attachment_image_src($custom_logo_id, 'full');
if($logo_arr ){
   $logo = $logo_arr[0];
}

$logo_light = get_theme_mod('logo_light');
$enable_search = __get_field('enable_search', 'option');
$btn_contact = __get_field('btn_contact', 'option');
$header_light = __get_field('header_light');

$classes = [
   'main-header',
   $header_light ? 'header-light' : ''
];
?>
<header id="site-header" class="<?php echo implode(' ', $classes) ?>">
   <div class="d-flex flex-wrap justify-content-between main-header__inner">
      <div class="main-header__left">
         <a href="/" id="the-logo" class="logo-link">
            <?php if ($custom_logo_id) { ?>
               <img id="siteLogo" src="<?= $logo ?>" class="logo" alt="We are Flip" />
               <img id="siteLogo" src="<?= $logo_light ?>" class="logo-light" alt="We are Flip" />
            <?php } else { ?>
               <img id="siteLogo" src="<?= get_template_directory_uri() ?>/assets/images/logo.svg" class="site-logo" alt="We are Flip" />
            <?php } ?>
         </a>
      </div>
      <div class="main-header__right">
         <?php
         if (has_nav_menu('main-menu')) {
            wp_nav_menu([
               'theme_location'  => 'main-menu',
               'menu_class'      => 'main-menu',
               'container_class' => 'd-none d-lg-block menu-container',
               'bootstrap'       => true,
               'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>'
            ]);
         }
         ?>
         <?php if (isset($enable_search) && $enable_search) { ?>
            <div class="main-header__cta-search"></div>
         <?php } ?>

         <?php if (isset($btn_contact) && $btn_contact) { ?>
            <div class="d-none d-lg-block main-header__cta-contact">
               <a href="<?= $btn_contact['url'] ?>" target="<?= $btn_contact['target'] ?>" class="main-header__cta-link"><?= $btn_contact['title'] ?></a>
            </div>
         <?php } ?>

         <div class="d-block d-lg-none main-header__hamberger">
            <div class="icon">
               <div class="line1"></div>
               <div class="line2"></div>
               <div class="line3"></div>
            </div>
         </div>

         <div class="d-block d-lg-none main-header__nav-mobile">
            <div class="nav-mobile__wrap">
               <?php
               if (has_nav_menu('main-menu')) {
                  wp_nav_menu([
                     'theme_location'  => 'main-menu',
                     'menu_class'      => 'main-menu',
                     'container_class' => 'menu-mobile-contain',
                     'bootstrap'       => true,
                     'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>'
                  ]);
               }
               ?>

               <?php if (isset($btn_contact) && $btn_contact) { ?>
                  <div class="main-header__cta-contact">
                     <a href="<?= $btn_contact['url'] ?>" target="<?= $btn_contact['target'] ?>" class="main-header__cta-link"><?= $btn_contact['title'] ?></a>
                  </div>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</header> <!-- #site-header -->