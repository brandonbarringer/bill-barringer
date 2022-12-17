<?php  
  $name = $args['name'];
  $text = nl2br($args['text']);
  $rating = $args['rating'];
  $image = $args['image'];
?>

<div class="review-card">
  <div class="review-card__layout">
    <div class="review-card__image">
      <?php if (!empty($image)): ?>
        <?php Helpers::renderPartial('image', $image) ?>
      <?php else: ?>
        <span>
          <?= strtoupper(substr($name, 0, 1)); ?>
        </span>
      <?php endif ?>
    </div>
    <div class="review-card__content">
      <div class="review-card__text">
        <?= $text ?>
      </div>
      <div class="review-card__name">
        <?= $name ?>
      </div>
    </div>
    <div class="review-card__rating rating">
      <div class="rating__num">
        <?= $rating ?>
      </div>
      <div class="rating__stars">
        <?php for($i = 0; $i < 5; $i++): ?>
          <?php if ($i < $rating): ?>
            <span class="rating__star rating__star--fill">
              ★
            </span>
          <?php else: ?>
            <span class="rating__star">
              ★
            </span>
          <?php endif ?>
        <?php endfor ?>
    </div>
  </div>