<?php //get_template_part('templates/page', 'header'); ?>
<!-- This doesn't work quite yet so I'm using a static template -->
<?php // get_template_part('templates/content', 'hero'); ?>
<div class="section section--primary">
  <div class="container">
    <h1>Our Therapists and Staff</h1>
  </div>
</div>

<?php if (!have_posts()) : ?>
  <div class="section">
    <div class="container">
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'sage'); ?>
      </div>
    </div>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>



<div class="section section--small">
  <div class="container">
    <?php
    $locations = array('post_type' => 'wpsl_stores', 'posts_per_page' => 100);
    $locations_loop = new WP_Query($locations);
    ?>

    <?php while ($locations_loop->have_posts()) : $locations_loop->the_post(); ?>
      <div class="section section--small">
        <div class="therapist-location-title">
          <h2><?php the_title(); ?></h2>
          <a href="<?php the_permalink(); ?>">View this location</a>
        </div>

        <div class="row" id="location-<?php the_id() ?>">


          <?php 
          $therapists = get_field('therapists');

          if($therapists) :
            foreach($therapists as $therapist) : ?>

          <div class="col-sm-6 col-md-3">
            <article class="therapist-thumbnail">
              <a href="<?php echo get_the_permalink($therapist->ID) ?>" data-target="therapist-modal-<?php echo $therapist->ID; ?>">
                <div class="therapist-thumbnail__image">
                  <?php $therapist_image = get_the_post_thumbnail($therapist->ID); ?>
                  <?php 
                  if ($therapist_image):
                    echo $therapist_image;
                  else:  
                    ?>
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/kbpt/Blank_headshot.jpg" alt="">
                <?php endif; ?>
              </div>
              <h3 class="therapist-thumbnail__name">
                <?php echo get_the_title($therapist->ID); ?>
              </h3>
            </a>

            <?php 
            $terms = get_the_terms($therapist->ID, 'therapist_title');
            if ( !is_wp_error($terms)) :
              $title_links = wp_list_pluck($terms, 'name'); 
            $titles = implode(", ", $title_links);
            endif;
            ?>

            <p class="therapist-thumbnail__title"><?php echo $titles; ?></p>
          </article><!-- .therapist-thumbnail -->
        </div><!-- .col-sm-6 --> 

        <!-- copy over from content-single-therapist.php -->
      <?php endforeach; endif; ?>
    </div><!-- .row -->
  </div><!-- .section --> 
<?php endwhile;?>
</div><!-- .container --> 
</div><!-- .section --> 
<?php #the_posts_navigation(); ?>