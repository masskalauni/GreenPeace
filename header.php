<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
  <?php
  function dynamic_favicon() {
    $favicon_post = get_posts(array(
        'post_type' => 'site_information', // Replace with your custom post type name
        'posts_per_page' => 1, // Limit to one post
    ));

    if ($favicon_post) {
        $favicon_url = get_field('favicon', $favicon_post[0]->ID);
        
        if ($favicon_url) {
            echo '<link rel="icon" type="image/png" sizes="32x32" href="' . $favicon_url . '">';
        }
    }
}

add_action('wp_head', 'dynamic_favicon');

?>
  <!-- fontawesome -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!--stylesheet-->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/all.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">

   <!-- gallery fancy box -->
   <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <?php wp_head();?>
</head>

<body>
  <!--header section start-->
  <header class="header header-1">
    <div class="container">
      <div class="header__wrapper">
        <div class="header__logo">
        <?php
$site_information = get_posts(array(
    'post_type' => 'site_information', // Replace with your custom post type name
    'posts_per_page' => 1, // Limit to one post
));

if ($site_information) {
    $site_logo_url = get_field('site_logo', $site_information[0]->ID);
    
    if ($site_logo_url) {
        echo '<a href="#hero">';
        echo '<img src="' . esc_url($site_logo_url['url']) . '" alt="logo" height="60px">';
        echo '</a>';
    }
}
?>

        </div>
        <div class="header__nav">
          <ul class="header__nav-primary">
            <li><a href="#hero"><i class="fad fa-home-alt"></i></a></li>
            <li><a href="#hero">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#fancy_gallery">Gallery</a></li>
            <li><a href="#pricing">Package</a></li>
            <li><a href="#video">Video</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <span><i class="fas fa-times"></i></span>
        </div>
        <div class="header__bars">
          <div class="header__bars-bar header__bars-bar-1"></div>
          <div class="header__bars-bar header__bars-bar-2"></div>
          <div class="header__bars-bar header__bars-bar-3"></div>
        </div>
      </div>
    </div>
  </header>
  <!--header section end-->