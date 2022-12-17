<?php  
  $text = $args['text'];
  $link = $args['link'];
  $class = $args['class'];
?>

<a 
  href="<?= $link ?>" 
  class="button <?= $class ?>"
>
  <?= $text ?>
</a>