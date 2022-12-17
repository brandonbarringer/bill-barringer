<?php  
  $reviews = $args['reviews'];
?>

<div class="reviews">
  <?php foreach($reviews as $review): ?>
    <div class="reviews__review">
      <?php Helpers::renderPartial('reviews/card', $review) ?>
    </div>
  <?php endforeach ?>
</div>