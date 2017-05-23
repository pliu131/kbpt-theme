<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="section section--primary">
      <div class="container">
        <a class="post-type-link" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">Locations / </a>
        <h1 class="entry-title">
          <?php single_post_title(); ?>
        </h1>
      </div>
    </header>

    <section class="section">
      <?php
      global $post;
      $queried_object = get_queried_object();
      ?>

      <div class="container"">
        <div class="row">
          <div class="col-md-6 location__description">
            <p>
              <?php // Add the content
              $post = get_post( $queried_object->ID );
              setup_postdata( $post );
              // print_r($post);
              echo get_post_field('post_content', $post);
              wp_reset_postdata( $post ); 
              ?>
            </p>
          </div><!-- .col-md-6 -->

          <div class="col-md-6 location__images">
            <?php if (get_field('gallery')) : ?>
              <div class="location__gallery">
                <?php the_field('gallery'); ?>
              </div>

              <div class="location__thumbnails">
                <?php the_field('gallery'); ?>
              </div>
            <?php endif; ?>
          </div>

          <script>
            jQuery(function($) {
              $('.location__gallery .gallery').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.location__thumbnails .gallery'
              });

              $('.location__thumbnails .gallery').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.location__gallery .gallery',
                focusOnSelect: true,
                arrows: false,
              });
            });
          </script>
        </div>
      </div><!-- .container -->
    </section><!-- .section -->

    <?php 
    echo do_shortcode( '[wpsl_map]' );
    ?>

    <div class="section section--light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="location__address">
              <?php echo do_shortcode( '[wpsl_address phone="false" email="false" url="false" fax="false"]' ); ?>
            </div>

            <?php echo do_shortcode( '[wpsl_address name="false" address="false" address2="false" city="false" state="false" zip="false" country="false"]' ); ?>
          </div>

          <div class="col-md-6">
            <?php echo do_shortcode( '[wpsl_hours]' ); ?>
          </div>
        </div>
      </div>
    </div><!-- .section -->



    <!-- Staff Section -->
    <div class="section">
      <div class="container">
        <h3>Therapists and Staff</h3>
        <br>
        <div class="row">
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
    </div>
  </div>
</div>
</article>
<?php endwhile; ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

