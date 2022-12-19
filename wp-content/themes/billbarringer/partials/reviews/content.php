<?php  
  $fields = get_field('reviews');
  $title = $fields['title'];
  $text = $fields['text'];
?>

<div class="review-content">
  <h2 class="review-content__title">
    <?= $title ?>
  </h2>
  <div class="review-content__text">
    <?= $text ?>
  </div>
</div>