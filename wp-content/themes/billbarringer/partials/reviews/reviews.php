<?php
  $body = Reviews::get();
  $reviews = $body['survey_reviews']['reviews'];
?>

<div class="reviews__cards">
  <div class="reviews__container">
    <?php foreach($reviews as $review): ?>
      <?php Helpers::renderPartial('reviews/card', $review) ?>
    <?php endforeach ?>
  </div>
</div>