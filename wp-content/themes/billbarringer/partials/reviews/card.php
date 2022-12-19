<?php  
  $name = $args['customer_first_name'];
  $text = nl2br($args['review']);
  $rating = $args['score'];
  $parts = explode('.', $rating);
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
      <div class="review-card__name">
        <?= $name ?>
      </div>
      <div class="review-card__text">
        <?= $text ?>
      </div>
      <div class="review-card__rating rating">
        <div class="rating__num">
          <?= $rating ?>
        </div>
        <div class="rating__stars">
          <?php for ($i = 0; $i < $parts[0]; $i++): ?>
              <span class="rating__star">
              </span>
          <?php endfor ?>
          <?php if ($parts[1] > 0 && $parts[0] < 5):  ?>
            <span class="rating__star rating__star--half" style="--fill: <?= $parts[1] ?>%"></span>
            <?php for ($i = $parts[0] + 1; $i < 5; $i++): ?>
              <span class="rating__star rating__star--outline"></span>
            <?php endfor ?>
          <?php else:  ?>
            <?php for ($i = $parts[0]; $i < 5; $i++): ?>
              <span class="rating__star rating__star--outline"></span>
            <?php endfor ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>