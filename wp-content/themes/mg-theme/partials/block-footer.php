<footer id="main-footer" class="main-footer">
  <div class="container">
    <div class="main-footer__info">
      <p><?php the_field('copyright', 'option'); ?></p>
      <p><b>Графік роботи Call-центру</b></p>
      <p><?php the_field('schedule', 'option'); ?></p>
    </div>
    <div class="main-footer__info">
      <p><b>Контакти</b></p>
      <p><a href="tel:<?php the_field('phone', 'option'); ?>"><?php the_field('phone', 'option'); ?></a> <br> <a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a></p>
    </div>
    <div class="main-footer__info">
      <p><b>Інше</b></p>
      <p><button class="btn btn-gray modalOpen" data-modal="oferta">Публічна оферта</button></p>
    </div>
  </div>
</footer>

<section class="modal modal__oferta">
  <button class="modal__wrap modalClose"></button>
  <div class="modal__inner">
    <button class="modal__close modalClose"></button>
    <?php the_field('oferta', 'option'); ?>
  </div>
</section>