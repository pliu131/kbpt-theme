<div class="section section--large section--hero section--image" style="background-image: url(<?php the_post_thumbnail_url() ?>)">
  <div class="overlay"></div>

  <div class="container">
    <?php if (is_front_page()): ?>
      <?php the_content(); ?>
      <a class="btn btn--primary" href="/locations">Visit a Location</a>
    <?php else: ?>
      <?php the_title(); ?>
      <?php the_excerpt(); ?>
    <?php endif; ?>
  </div>
</div>
