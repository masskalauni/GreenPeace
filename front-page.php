
<?php get_header();?>

<!--hero section start-->
<section class="hero" id="hero">
    <div class="hero__wrapper">
        <div class="container">
            <div class="row align-items-center">
                <?php
                $home_content = new WP_Query(array(
                    'post_type' => 'home_content',
                    'posts_per_page' => 1,
                ));

                if ($home_content->have_posts()) :
                    while ($home_content->have_posts()) : $home_content->the_post();
                        $main_heading = get_field('main_heading');
                        $paragraph = get_field('paragraph');
                        $image_url = get_field('image');
                         $button1_link = get_field('contact_number');
                         $button1_link = 'tel:' . preg_replace('/\D/', '', $button1_link);
                        $button1_text = get_field('contact_number');
                        $button2_link = get_field('button2_link');
                        $button2_text = get_field('button2_text');
                        ?>
                        <div class="col-xl-6 col-lg-12 order-2 order-lg-1">
                            <h1 class="main-heading color-black"><?php echo $main_heading; ?></h1>
                            <p class="paragraph">
                              
                                <?php echo $paragraph; ?>
                            </p>
                            <div class="download-buttons">
                                <a href="<?php echo $button1_link; ?>" class="google-play">
                                    <i class="fa-solid fa-phone-volume"></i>
                                    <div class="button-content">
                                        <h6><span><?php echo $button1_text; ?></span></h6>
                                    </div>
                                </a>
                                <a href="<?php echo $button2_link; ?>" class="apple-store">
                                    <i class="fab fa-whatsapp"></i>
                                    <div class="button-content">
                                        <h6><span><?php echo $button2_text; ?></span></h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 order-1 order-lg-2 center_itm">
                            <div class="questions-img hero-img">
                                <img src="<?php echo $image_url['url']; ?>" alt="image">
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif;
                wp_reset_postdata(); // Reset post data
                ?>
            </div>
        </div>
    </div>
</section>


<!--hero section end-->

<!--message section start-->

<section class="clients-sec custom_padding_t" id="feedback">
  <div class="container">
    <h2 class="section-heading color-black">Hear from Managing Director.</h2>
    <div class="testimonial__wrapper">
      <?php
      $args = array(
        'post_type' => 'Message', // Replace with your custom post type name
        'posts_per_page' => 1, // Limit to one message
      );

      $messages = new WP_Query($args);

      if ($messages->have_posts()) :
        while ($messages->have_posts()) : $messages->the_post();
      ?>
          <div class="mesasge_wrapper">
            <div class="image message_image">
              <?php
              $message_image = get_field('image');
              if ($message_image) {
                echo '<img src="' . $message_image['url'] . '" alt="' . $message_image['alt'] . '" height="180px">';
              }
              ?>
            </div>
            <div class="mesasge">
              <div class="testimonial__wrapper">
                <p>
                  <?php the_field('message_content'); ?>
                </p>
                <h4>
                  — <?php the_field('director_name'); ?> <br> &ensp; (Managing Director)
                </h4>
              </div>
            </div>
          </div>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>
  </div>
</section>



<!--message section end-->


<!--feature section start-->
<section class="feature" id="services">
  <div class="container">
    <h2 class="section-heading color-black">Get surprised by amazing services.</h2>
    <div class="row">

      <?php
      // Query the custom post type "services"
      $args = array(
        'post_type' => 'services',
        'posts_per_page' => 4, // Limit the number of services displayed
      );
      $services_query = new WP_Query($args);
      $Counter=1;
      while ($services_query->have_posts()) :
        $services_query->the_post();
       
      ?>

        <div class="col-lg-3 col-md-6">
          <div class="feature__box feature__box--<?php echo $Counter ?>">
            <div class="icon icon-<?php echo $Counter ?>">
              <?php if (has_post_thumbnail()) : ?>
              <i><img src="<?php the_post_thumbnail_url(); ?>" alt="" height="120px"></i>
              <?php endif; ?>
            </div>
            <div class="feature__box__wrapper">
              <div class="feature__box--content feature__box--content-<?php echo $Counter ?>">
                <h3><?php the_title(); ?></h3>
                <p class="paragraph dark"><?php echo get_the_content(); ?></p>
              </div>
            </div>
          </div>
        </div>

      <?php
     $Counter++;
      endwhile;

      // Restore the global post data
      wp_reset_postdata();
      ?>

    </div>
  </div>
</section>


<!--feature section end-->

<!--gallery section start-->

<section class="gallery_section custom_padding_t" id="fancy_gallery">
  <div class="blog__content">
    <h2 class="w-100 section-heading color-black text-center">Capturing Joy: <br> Our Event Showcase.</h2>
    <div class="container">
      <div class="row myFancyGallery justify-content-center">

        <?php
        $custom_images_query = new WP_Query(array(
          'post_type' => 'custom_images',
          'posts_per_page' => -1,
        ));

        if ($custom_images_query->have_posts()) {
          while ($custom_images_query->have_posts()) {
            $custom_images_query->the_post();

            $gallery_images = get_post_meta(get_the_ID(), 'custom_images_gallery_images', true);

            if (!empty($gallery_images)) {
              foreach ($gallery_images as $image_url) {
        ?>

                <div class="col-lg-2 col-md-3 col-4 gallery_item fancy_item">
                  <a href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery">
                    <div class="blog__single-image gallery_item_image">
                      <img src="<?php echo esc_url($image_url); ?>" alt="">
                    </div>
                  </a>
                </div>

        <?php
              }
            }
          }
        }
        wp_reset_postdata();

        ?>

      </div>
    </div>
  </div>
</section>

<!--gallery section end-->

  <!--pricing section start-->
  <section class="pricing" id="pricing">
    <div class="pricing__wrapper">
        <h2 class="section-heading color-black">Easy pricing plans for your needs.</h2>
        <div class="container">
            <div class="row">
                <?php
                $pricing_query = new WP_Query(array('post_type' => 'pricing'));

                while ($pricing_query->have_posts()) : $pricing_query->the_post();
                   
                    $price = get_field('package_price');
                    $package_details = get_field('package_features');
                ?>
                    <div class="col-lg-4">
                        <div class="pricing__single pricing__single-2">
                            <div class="icon">
                                <i><img src="<?php echo get_field('package_image'); ?>" alt="" height="80px"></i>
                            </div>
                            <h4><?php the_title();?></h4>
                            <h3><?php echo esc_html($price); ?></h3>
                            <div class="list">
                                <ul>
                                                            <?php
                            $service_details = get_field('package_features');

                            if (!empty($package_details)) {
                                $details_array = explode(',', $package_details);
                                foreach ($details_array as $detail) {
                                    echo '<li>' . esc_html(trim($detail)) . '</li>';
                                }
                            }
                            ?>
                                </ul>
                            </div>
                            <a href="<?php echo esc_url(get_field('whatsapp_link')); ?>" class="button">
                                <span>GET PACKAGE <i class="fad fa-long-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>


  <!--pricing section end-->

   <!--video gallery section start-->
   <section class="gallery_section custom_padding_tb feature" id="video">
  <div class="blog__content">
    <h2 class="w-100 section-heading color-black text-center">Easy pricing plans <br>mesmerizing gallery.</h2>
    <div class="container">
      <div class="row">
        <?php
        // Query the custom post type 'videos'
        $video_query = new WP_Query(array('post_type' => 'videos'));

        if ($video_query->have_posts()) {
          while ($video_query->have_posts()) {
            $video_query->the_post();

            // Get the video URL from the ACF field
            $video_url = get_field('video_url');
          


                // Check if the URL is in the shortened format
                if (strpos($video_url, 'youtu.be') !== false) {
                    // Convert shortened URL to full embed format
                    $video_id = substr(strrchr($video_url, '/'), 1);
                    $video_url = "https://www.youtube.com/embed/$video_id";
                }


            // Output the video in an iframe
            echo '<div class="col-lg-4 col-md-6 col-12 gallery_item">';
            echo '<iframe src="' . $video_url . '" loading="lazy"></iframe>';
            echo '</div>';
          }

          wp_reset_postdata();
        }
        ?>
      </div>
    </div>
  </div>
</section>

<!--video gallery section end-->

 <!--team section start-->
 <section class="gallery_section custom_padding_tb" id="team">
    <div class="blog__content">
        <h2 class="w-100 section-heading color-black text-center">Meet Our Expert <br> Event Team.</h2>
        <div class="container">
            <div class="row justify-content-center">
                <?php
                $team_members = new WP_Query(array(
                    'post_type' => 'team_member',
                    'posts_per_page' => 3, // Retrieve all team members
                ));

                if ($team_members->have_posts()) :
                    while ($team_members->have_posts()) : $team_members->the_post();
                        $member_name = get_field('name'); // Use the ACF field name for Name
                        $member_position = get_field('position'); // Use the ACF field name for Position
                        $member_photo = get_field('team_member_photo'); // Use the ACF field name for Team Member Photo
                        ?>
                        <div class="col-lg-4 col-md-6 gallery_item">
                            <a>
                                <div class="blog__single blog__single--1">
                                    <div class="blog__single-image">
                                    <img src="<?php echo $member_photo['url']; ?>" alt="<?php echo $member_photo['alt']; ?>">
                                    </div>
                                    <div class="blog__single-info team_item_info">
                                        <h3><?php echo $member_name; ?></h3>
                                        <span><?php echo $member_position; ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    endwhile;
                endif;
                wp_reset_postdata(); // Reset post data
                ?>
            </div>
        </div>
    </div>
</section>


<!--team section end-->

 <!--newsletter section start-->
 <section class="newsletter newsletter-2" id="contact">
  <div class="newsletter__wrapper">
    <div class="container">
      <div class="row align-items-lg-center">
        <div class="col-lg-8">
          <div class="newsletter__info pb-5 mb-5">
            <h2 class="section-heading color-black">Get in touch with us today.</h2>
            <?php echo do_shortcode('[contact-form-7 id="2a76df5" title="Contact Form"]'); ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="newsletter__img">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/img/contactus.png" alt="image">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--newsletter section end-->

<?php get_footer();?>

