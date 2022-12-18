<?php  
  $stats = $args['stats'];
  $stats = [
    [
      'value' => 220,
      'label' => 'Reviews'
    ],
    [
      'value' => 4.96,
      'label' => 'Average'
    ],
    [
      'value' => 31,
      'label' => 'Recent'
    ],
  ];
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