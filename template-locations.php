<?php
/**
 * Template Name: Locations Template
 */
?>

<div class="section section--primary">
  <div class="container">
    <h1>Locations</h1>
  </div>
</div>

<div class="section section--small">
<div class="container">
  <div class="row">
    <?php
    $locations = array('post_type' => 'wpsl_stores', 'posts_per_page' => 100);
    $locations_loop = new WP_Query($locations);
    ?>

    <?php while ($locations_loop->have_posts()) : $locations_loop->the_post(); ?>
      <div class="col-sm-12 col-md-6">
        <div class="section section--small">
          <div class="location-thumbnail">
            <div class="image-wrapper">
              <?php if (get_the_post_thumbnail()): ?>
                <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
              <?php else: ?>  
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/kbpt/Blank_headshot.jpg" alt="">
              <?php endif ?>
            </div>

            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="location-thumbnail__address">
                <h2 class="text--primary"><?php the_title(); ?></h2>
                <?php echo do_shortcode('[wpsl_address name="false" phone="false" fax="false" email="false" id="' . get_the_ID() . '"]'); ?>
                </div>
              </div>

              <div class="col-sm-12 col-md-6">
                <div class="location-thumbnail__link">
                  <a class="btn btn--primary" href="<?php the_permalink(); ?>">View Location</a>
                </div>
              </div>
            </div>
          </div>
        </div><!-- .location-thumbnail --> 
      </div><!-- .section --> 
    <?php endwhile; ?>
  </div>
</div><!-- .container --> 
</div><!-- .section --> 