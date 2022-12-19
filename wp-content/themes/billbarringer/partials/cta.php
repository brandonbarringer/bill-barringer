<?php
  $fields = get_field('cta');
  $title = $fields['title'];
  $button = get_field('apply_link');
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
  </div>
</div>