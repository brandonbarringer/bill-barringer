<?php  
  $reviews = $args['reviews'];
  $reviews = get_option('fake_review');
?>

<div class="reviews__cards">
  <div class="reviews__container">
    <?php foreach($reviews as $review): 
      $review['rating'] = number_format((float)$review['rating'] . '.' . rand(0, 99), 2, '.', '');
    ?>
      <?php Helpers::renderPartial('reviews/card', $review) ?>
    <?php endforeach ?>
  </div>
</div>