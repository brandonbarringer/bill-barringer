<?php
  $text = $args['title'];
  $link = $args['url'];
  $class = $args['class'];
?>

<a 
  href="<?= $link ?>" 
  class="button <?= $class ?>"
>
  <?= $text ?>
</a>