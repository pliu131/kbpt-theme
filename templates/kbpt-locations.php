<?php
$locations = array('post_type' => 'wpsl_stores', 'posts_per_page' => 100);
$locations_loop = new WP_Query($locations);
?>

<ul class="kbpt-locations">
  <?php while ($locations_loop->have_posts()) : $locations_loop->the_post(); ?>
    <li class="kbpt-location">
      <a href="<php the_permalink(); ?>">
        <?php echo do_shortcode( '[wpsl_address phone="false" email="false" url="false" fax="false" country="false"]' ); ?>
      </a>
    </li>
  <?php endwhile; ?>
</ul>