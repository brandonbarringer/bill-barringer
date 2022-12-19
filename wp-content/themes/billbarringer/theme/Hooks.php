<?php

final class Hooks {
  public static function addActions()
  {
    add_action('admin_menu', function() {
      remove_menu_page('edit-comments.php');
    });

    add_action('wp_before_admin_bar_render', function() {
      global $wp_admin_bar;
      $wp_admin_bar->remove_menu('comments');
    });

    add_action('init', function() {
      unregister_taxonomy_for_object_type('post_tag', 'post');
      remove_post_type_support('post', 'comments');
      remove_post_type_support('page', 'comments');
    }, 100);
  }

  public static function addFilters()
  {
    add_filter('do_redirect_guess_404_permalink', '__return_false');
    
    add_filter('acf/settings/save_json', function() {
      return __DIR__ . '/acf-json';
    });

    add_filter('acf/settings/load_json', function($paths) {
      unset($paths[0]);
      $paths[] = __DIR__ . '/acf-json';
      return $paths;
    });

    add_filter('tiny_mce_before_init', function($allowed) {
      $allowed['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6';
      return $allowed;
    });
  }
}
