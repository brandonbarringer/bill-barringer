<?php  
  $title = $args['title'];
  $content = wpautop($args['content']);
?>

<div class="review-content">
  <h2 class="review-content__title">
    <?= $title ?>
  </h2>
  <div class="review-content__text">
    <?= $content ?>
  </div>
</div>