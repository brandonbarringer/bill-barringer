<?php  
  $post = $args['post'];
?>

<article class="blog-card">
  <h3 class="blog-card__title">
    <a href="<?= get_permalink($post) ?>">
      <?= get_the_title($post) ?>
    </a>
  </h3>
  <div class="blog-card__text">
    <?= Helpers::getExcerpt($post, 40) ?>
  </div>
</article>