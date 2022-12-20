<?php  
  $data = Reviews::get();
  $reviews = $data['survey_reviews'];
  $totalReviews = function ($reviews) {
    $total5 = (int)$reviews['total_5_star_reviews'];
    $percent5 = (float)$reviews['total_5_star_percentage'];

    return round($total5 / $percent5 * 100);
  };
  $stats = [
    [
      'value' => $totalReviews($reviews),
      'label' => 'Reviews'
    ],
    [
      'value' => $reviews['total_5_star_reviews'],
      'label' => '5 Star'
    ],
    [
      'value' => $reviews['average_score'],
      'label' => 'Average'
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