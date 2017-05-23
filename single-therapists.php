<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="section section--primary section--hero">
      <div class="container">
        <a class="post-type-link" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">Therapists / </a>
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </div>
    </header>

    <div class="section">
      <div class="container">
        <div class="entry-content">
          <div class="row">
            <div class="col-md-3">
              <div class="image-wrapper image-wrapper--square">
                <?php if (get_the_post_thumbnail()): ?>
                  <?php the_post_thumbnail(); ?>  
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/kbpt/Blank_headshot.jpg" alt="">
                <?php endif ?>
              </div>
              <br>
              <?php 
              $location = get_field('location');

              if ($location) :
                $location_name = get_the_title($location->ID);
                $location_permalink = get_the_permalink($location->ID);
                $location_meta = get_post_meta($location->ID, 'wpsl_phone');
              endif;
              ?>

              <p>
                <strong>Location:</strong><br>
                <a href="<?php echo $location_permalink?>"><?php echo $location_name ?></a>
              </p>
              <p>
                <strong>Phone:</strong><br>
                <a href="<?php echo $location_meta[0]?>"><?php echo $location_meta[0] ?></a>
              </p>

              <p>
                <strong>Email:</strong><br>
                <a href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a>  
              </p>
            </div>

            <div class="col-md-9">
              <?php the_content() ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
