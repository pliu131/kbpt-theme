<?php //get_template_part('templates/page', 'header'); ?>
<!-- This doesn't work quite yet so I'm using a static template -->
<?php // get_template_part('templates/content', 'hero'); ?>
<div class="section section--primary">
  <div class="container">
    <h1>Injuries</h1>
  </div>
</div>

<div class="section section--small">
  <div class="container">
    <?php if (!have_posts()) : ?>
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'sage'); ?>
      </div>
      <?php get_search_form(); ?>
    <?php else: ?> 
      <div class="row">
        <?php while (have_posts()) : the_post();  ?>  
          <div class="col-sm-6 col-md-3">
            <div class="section section--small">
              <a href="<?php the_permalink() ?>">
                <div class="image-wrapper image-wrapper--square">
                  <?php the_post_thumbnail(); ?>
                </div>
                <br>
                <h3><?php the_title(); ?></h3>
              </a>
            </div><!-- .section --> 
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</div>



