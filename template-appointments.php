<?php
/**
* Template Name: Appointments Template
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>

  <!-- Include all the insurance providers here -->
  
  <div class="section section--small">
  <div class="container">
    <div class="section section--small">
      <h2>Call or email your local Kennedy Brothers to make a new appointment:</h2>
      <?php
      $locations = array('post_type' => 'wpsl_stores', 'posts_per_page' => 100);
      $locations_loop = new WP_Query($locations);
      ?>

      <div class="row">
        <?php while ($locations_loop->have_posts()) : $locations_loop->the_post(); ?>
          <div class="col-sm-6 col-md-4">
            <div class="section section--small">
              <h3 class="text--primary"><?php the_title(); ?></h3>
              <a href="mailto:<?php the_field('wpsl_email'); ?>"><?php the_field('wpsl_email'); ?></a>
              <a href="tel:<?php the_field('wpsl_phone') ?>"><?php the_field('wpsl_phone') ?></a>
            </div><!-- .section --> 
          </div>
        <?php endwhile; wp_reset_query(); ?>
      </div><!-- .row -->
    </div><!-- .section --> 

    <div class="section section--small">
      <?php the_content(); ?>
    </div>

    <div class="section section--small">
      <h3>Insurance providers accepted:</h3>
      <br>

      <?php
      $providers = array(
        'post_type' => 'provider', 
        'posts_per_page' => 100,
        'order' => 'ASC',
        'orderby' => 'title'
        );
      $providers_loop = new WP_Query($providers);
      ?>

      <ul class="providers">
        <?php while ($providers_loop->have_posts()) : $providers_loop->the_post(); ?>
          <li class="provider">
            <div class="provider__logo">
              <?php the_post_thumbnail(); ?>
            </div>
            <div class="provider__name">
              <?php the_title(); ?>
              <?php if (get_field('needs_prescription')): echo ' *'; endif; ?>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>

      <p>Patient needs to obtain a referral from their Primary Care Physician for all insurance providers.</p>
      <p>* Patient needs to bring in a written prescription from their physician (PCP or specialist) that is no more than 30 days old.</p>
    </div><!-- .container --> 
  </div><!-- .section --> 
  </div><!-- .section --> 
<?php endwhile; ?>

