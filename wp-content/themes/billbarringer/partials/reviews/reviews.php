<?php  
  $fields = get_field('reviews');
  $apiKey = $fields['api_key'];
  $widgetKey = $fields['widget_key'];
  $agentString = $fields['agent_string'];
  $baseUrl = 'https://api.experience.com';
  $endpoint = '/v2/core/account/review_widget';
  $url = $baseUrl . $endpoint;
  $params = [
    'api_key' => $apiKey,
    'widget_key' => $widgetKey,
    'agent_string' => $agentString,
  ];
  $url .= '?' . http_build_query($params);
  $today = date('Y-m-d');
  $reviews = get_option('reviews');

  // if the last review was updated more than 24 hours ago, update the reviews
  if ( strtotime($today) - strtotime(get_option('last_review_update')) > 86400 ) {
    var_dump('updating reviews');
    $response = wp_remote_get($url);
    $body = json_decode($response['body'], true);
    $reviews = $body['survey_reviews']['reviews'];
    update_option('last_review_update', $today);
    update_option('reviews', $reviews);
  }
?>

<div class="reviews__cards">
  <div class="reviews__container">
    <?php foreach($reviews as $review): ?>
      <?php Helpers::renderPartial('reviews/card', $review) ?>
    <?php endforeach ?>
  </div>
</div>