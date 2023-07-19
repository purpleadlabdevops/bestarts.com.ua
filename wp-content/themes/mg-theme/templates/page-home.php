<?php
/*
 * Template Name: Home
 */
get_header(); ?>

<section class="portret">
  <div class="container">
    <div class="portret__left">
      <h1><?php the_field('portret_title'); ?></h1>
      <p><?php the_field('portret_text'); ?></p>
      <button class="btn btn-purple scroll" data-id="disney">Детальніше</button>
    </div>
    <img class="portret__img" src="<?php the_field('portret_image'); ?>" />
  </div>
</section>

<?php $products = get_field('disney_products'); ?>
<script>
const fieldsValues = <?php echo json_encode($products); ?>;
</script>

<section class="disney" id="disney">
  <div class="container">
    <h2><?php the_field('disney_title'); ?></h2>
    <div class="disney__row">
      <?php $i=0; $disney_slider = get_field('disney_slider'); ?>
      <div class="disney__slider">
        <img class="disney__image" src="<?php echo $disney_slider[0]; ?>" />
        <div class="disney__nav">
          <?php foreach( $disney_slider as $image ): $i++; ?>
            <img src="<?php echo $image; ?>" <?php if($i === 1){echo 'class="active"';} ?> />
          <?php endforeach; ?>
        </div>
      </div>
      <div class="disney__form">
        <h4><?php the_field('disney_subtitle'); ?></h4>
        <div class="disney__price">
          ₴<?php echo $products[0]['price']; ?>.00 <strike>₴<?php echo $products[0]['old_price']; ?>.00</strike>
        </div>
        <?php echo do_shortcode('[contact-form-7 id="17" title="Contact form"]'); ?>
        <p class="disney__sign"><?php the_field('disney_sign'); ?></p>
      </div>
    </div>
  </div>
</section>

<section class="works">
  <div class="container">
    <h2><?php the_field('works_title'); ?></h2>
    <?php if( have_rows('works_list') ): ?>
    <div class="works__list">
      <?php while( have_rows('works_list') ) : the_row(); ?>
        <div class="works__item">
          <img src="<?php the_sub_field('image'); ?>" />
          <h3><?php the_sub_field('title'); ?></h3>
          <p><?php the_sub_field('text'); ?></p>
        </div>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<section class="portfolio">
  <div class="container">
    <h2><?php the_field('portfolio_title'); ?></h2>
    <?php if( have_rows('portfolio_list') ): ?>
    <div class="portfolio__list">
      <?php while( have_rows('portfolio_list') ) : the_row(); ?>
        <div class="portfolio__item">
          <img src="<?php the_sub_field('image'); ?>" />
          <h3><?php the_sub_field('title'); ?></h3>
        </div>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php if( have_rows('advantages_list') ): ?>
<section class="advantages">
  <div class="container">
    <div class="advantages__list">
      <?php while( have_rows('advantages_list') ) : the_row(); ?>
        <div class="advantages__item">
          <?php the_sub_field('icon'); ?>
          <h3><?php the_sub_field('title'); ?></h3>
          <p><?php the_sub_field('text'); ?></p>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="tehnics">
  <div class="container">
    <h2><?php the_field('tehnics_title'); ?></h2>
    <p><?php the_field('tehnics_text'); ?></p>
    <button class="btn btn-purple scroll" data-id="disney">Швидке замовлення</button>
  </div>
</section>

<section class="reviews">
  <div class="container">
    <h2><?php the_field('reviews_title'); ?></h2>
    <p><?php the_field('reviews_text'); ?></p>
    <?php if( have_rows('reviews_list') ): ?>
    <div class="reviews__list">
      <?php while( have_rows('reviews_list') ) : the_row(); ?>
        <div class="reviews__item">
          <img src="<?php the_sub_field('image'); ?>" />
          <h3><?php the_sub_field('title'); ?></h3>
          <div class="reviews__stars">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <p><?php the_sub_field('text'); ?></p>
        </div>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
