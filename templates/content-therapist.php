<div class="col-sm-6 col-md-3">
  <article class="therapist-thumbnail <?php post_class(); ?>">
    <a href="<?php echo get_permalink() ?>">
      <div class="therapist-thumbnail__image">
        <?php the_post_thumbnail(); ?>  
      </div>
    </a>
    <a href="#">
      <h3 class="therapist-thumbnail__name"><?php the_title(); ?></h3>
    </a>
    <?php 
      $terms = get_the_terms ($post->id, 'therapist_title');
      if ( !is_wp_error($terms)) :
        $title_links = wp_list_pluck($terms, 'name'); 
      $titles = implode(", ", $title_links);
      endif; 
    ?>

    <p class="therapist-thumbnail__title">
      <?php echo $titles; ?>
      <?php the_field('location') ?>
    </p>
  </a>
</article>
</div>