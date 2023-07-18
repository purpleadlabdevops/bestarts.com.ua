<?php get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>
<?php $sub_cat = get_the_category(get_post()->ID); ?>
<section class="post__section">
  <div class="container">
  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>