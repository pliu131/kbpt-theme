<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'hero'); ?>
<?php endwhile; ?>

<section class="section section--light section--small text--center">
  <div class="container">
    <h3>Serving Your Massachusetts Neighborhood</h3>
    <br>
    <?php get_template_part('templates/kbpt-locations'); ?>
  </div><!-- .container -->
</section><!-- .section -->

<?php while (have_posts()) : the_post(); ?>
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="image-wrapper">
            <img class="img-responsive" src="<?php the_field('section_1_image'); ?>" alt="">
          </div>
        </div>

        <div class="col-md-6">
          <?php the_field('section_1_content'); ?>
          <a class="btn btn--primary" href="/therapists">See Our Therapists</a>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <?php the_field('section_2_content'); ?>
          <a class="btn btn--primary" href="/services">See Our Therapists</a>
        </div>

        <div class="col-md-6">
        <div class="image-wrapper">
          <img class="img-responsive" src="<?php the_field('section_2_image'); ?>" alt="">
        </div>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; ?>

<section class="section section--primary">
  <div class="container">
    <h3>What our patients are saying</h3>

    <div class="section section--small testimonials">

      <?php
      $testimonials = array('post_type' => 'testimonial', 'posts_per_page' => 100);
      $testimonials_loop = new WP_Query($testimonials);
      ?>
      <?php while ($testimonials_loop->have_posts()) : $testimonials_loop->the_post(); ?>
        <div class="testimonial">
          <div class="row">
            <div class="col-md-3">
              <?php 
              $testimonial_location = get_field('location');
              if($testimonial_location) : ?>
              <div class="testimonial__location">
                <h4><?php echo get_the_title($testimonial_location->ID); ?></h4>
                <?php echo do_shortcode( '[wpsl_address name="false" phone="false" email="false" url="false" fax="false" country="false" id="' . $testimonial_location->ID .'"]' ); ?>
                <a href="<?php echo get_the_permalink($testimonial_location->ID); ?>">View this location</a>
              </div>
            <?php endif; ?>
          </div><!-- .col-md-3 --> 

          <div class="col-md-9">
            <div class="testimonial__content"><?php the_content(); ?></div>
            <div class="testimonial__patient">- <?php the_title(); ?></div>
          </div><!-- .col-md-9 --> 
        </div><!-- .row --> 
      </div><!-- .testimonial -->
    <?php endwhile; ?>
  </div><!-- .section --> 
</div><!-- .container -->
</section>

<script>
  jQuery(function($) {
    $('.testimonials').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      autoplay: true
    });
  });
</script>