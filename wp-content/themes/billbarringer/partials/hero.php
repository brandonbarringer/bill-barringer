<?php
  $fields = get_field('hero');
  $title = $fields['title'];
  $content = nl2br($fields['text']);
  $button = get_field('apply_link');
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
      <?php Helpers::renderPartial('button', array_merge($button, ['class' => 'button--shake'])) ?>
    </div>
  </div>
</div>