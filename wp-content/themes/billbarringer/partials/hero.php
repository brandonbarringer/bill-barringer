<?php  
  $title = $args['title'];
  $content = nl2br($args['content']);
  $image = $args['image'];
  $button = $args['button'];
?>

<div class="hero">
  <div class="hero__layout">
    <div class="hero__content">
      <h1 class="hero__title">
        <?= $title ?>
      </h1>
      <p class="hero__text">
        <?= $content ?>
      </p>
      <?php Helpers::renderPartial('button', $button) ?>
    </div>
  </div>
</div>