<?php wp_footer();?>

<!--footer start-->
<footer class="footer" id="footer">
    <div class="footer__wrapper">
        <div class="container">
            <div class="row">
                <?php
                // Query the "Footer Section" custom post type.
                $footer_query = new WP_Query(array(
                    'post_type' => 'site_information',
                    'posts_per_page' => 1, // You may adjust this as needed.
                ));

                if ($footer_query->have_posts()) :
                    while ($footer_query->have_posts()) : $footer_query->the_post();

                        // Retrieve ACF fields.
                        $logo = get_field('site_logo');
                        $facebook_url = get_field('facebook_link');
                        $youtube_url = get_field('youtube_link');
                        $twitter_url = get_field('tiktok_link');
                        $map_iframe = get_field('map_link');
                        $phone_number = get_field('contact_number');
                        $whatsapp_link = get_field('whatsapp_link');
                       

                        ?>

                        <div class="col-lg-4">
                            <div class="footer__info">
                                <div class="footer__info--logo">
                                <img src="<?php echo $logo['url']; ?>" alt="image" height="120px">

                                </div>
                                <div class="footer__info--content">
                                    <p class="paragraph dark">
                                    Green Peace offers top notch services: Tent & Catering, Sound System, Party Palace and more.
                                        
                                    </p>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook"><a href="<?php echo $facebook_url; ?>"><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="youtube"><a href="<?php echo $youtube_url; ?>"><i class="fab fa-youtube"></i></a></li>
                                            <li class="twitter"><a href="<?php echo $twitter_url; ?>"><i class="fab fa-tiktok"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="footer__content-wrapper">
                                <div class="footer__list">
                                    <ul>
                                        <li>Our Location in Map</li>
                                        <li>
                                            <?php echo $map_iframe; // Use the map iframe here. ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="download-buttons">
                                    <h5>Download</h5>
                                    <a href="tel:<?php echo esc_attr($phone_number); ?>" class="google-play">
                                        <i class="fa-solid fa-phone-volume"></i>
                                        <div class="button-content">
                                            <h6><span><?php echo $phone_number; ?></span></h6>
                                        </div>
                                    </a>
                                    <a href="<?php echo $whatsapp_link; ?>" class="apple-store">
                                        <i class="fab fa-whatsapp"></i>
                                        <div class="button-content">
                                            <h6><span>Chat With Us.</span></h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <?php
                    endwhile;
                endif;

                // Reset the post data.
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</footer>







<!--footer end-->
<script src="<?php echo get_template_directory_uri();?>/assets/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/popper-1.16.0.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/bootstrap.min.js"></script>
<script>
  $(window).on('load', function () {
    $("body").addClass("loaded");
  });
</script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/ytdefer.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/script.js"></script>


<!-- for gallery fancybox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
  integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"
  integrity="sha512-j7/1CJweOskkQiS5RD9W8zhEG9D9vpgByNGxPIqkO5KrXrwyDAroM9aQ9w8J7oRqwxGyz429hPVk/zR6IOMtSA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $('[data-fancybox="gallery"]').fancybox({
    buttons: [
      "share",
      "download",
      //   "zoom",
      "slideShow",
      "fullscreen",
      "thumbs",
      "close"
    ],
  });
</script>

<script>
  $(document).ready(function () {
    $('.header__nav li').on('click', function () {
      $('.header__nav').css('right', '100%');
      return 0;
    });
  });
  $(document).ready(function () {
    $('.header__bars').on('click', function () {
      $('.header__nav').css('right', '0%');
      return 0;
    });
  });
</script>

</body>

</html>