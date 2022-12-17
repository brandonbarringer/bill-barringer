<?php  
  $title = $args['title'];
  $button = $args['button'];
  $image = $args['image'];
?>

<div class="cta">
  <div class="cta__layout">
    <div class="cta__content">
      <h2 class="cta__title">
        <?= $title ?>
      </h2>
      <?php Helpers::renderPartial('button', $button) ?>
    </div>
    <div class="cta__image">
      <?php Helpers::renderPartial('image', $image) ?>
    </div>
  </div>
</div>