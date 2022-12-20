<?php

class Reviews {

  private static function fetch() {
    $frontPageId = get_option('page_on_front');
    $fields = get_field('reviews', $frontPageId);
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
    $response = wp_remote_get($url);
    return json_decode($response['body'], true);
  }

  public static function get() {
    $today = date('Y-m-d');

    $body = self::fetch();
    update_option('last_review_update', $today);
    update_option('reviews', $body);

    // if the last review was updated more than 24 hours ago, update the reviews
    if ( strtotime($today) - strtotime(get_option('last_review_update')) > 86400 ) {
      $body = self::fetch();
      update_option('last_review_update', $today);
      update_option('reviews', $body);
    }

    return get_option('reviews');
  }
  
}