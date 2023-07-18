<?php
/*
 * The template for displaying pages
 */
get_header();
while ( have_posts() ) : the_post(); ?>

<section class="page__section">
  <div class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="page__content">
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php
endwhile;
get_footer(); ?>