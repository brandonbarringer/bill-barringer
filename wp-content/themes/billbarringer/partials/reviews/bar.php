<?php  
  $stats = $args['stats'];
?>

<div class="reviews-bar">
  <?php foreach($stats as $stat): 
    $value = $stat['value'];
    $label = $stat['label'];
  ?>
    <div class="reviews-bar__stat">
      <div class="reviews-bar__value">
        <?= $value ?>
      </div>
      <div class="reviews-bar__label">
        <?= $label ?>
      </div>
    </div>
  <?php endforeach ?>
</div>