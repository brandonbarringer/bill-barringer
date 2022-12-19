<?php
get_header();
?>

<?php Helpers::renderPartial('hero') ?>

<div class="reviews">
  <div class="container">
    <?php Helpers::renderPartial('reviews/bar') ?>
    <?php Helpers::renderPartial('reviews/content') ?>
  </div>

  <?php Helpers::renderPartial('reviews/reviews') ?>
</div>

<?php Helpers::renderPartial('cta') ?>
<div class="blog">
  <div class="container">
    <div class="blog__content">
      <h2 class="blog__title">
        What's Happening in the Mortgage Industry?
      </h2>
      <?php Helpers::renderPartial('button', [
        'title' => 'View All',
        'url' => get_post_type_archive_link('post'),
        'class' => 'button--dark'
      ])  ?>
    </div>
    <div class="blog__cards">
      <?php
        $posts = get_posts([
          'numberposts' => 6,
          'post_type' => 'post',
          'post_status' => 'publish',
        ]);
      ?>
      <?php foreach($posts as $post): ?>
        <?php Helpers::renderPartial('blog-card', ['post' => $post]) ?>
        <?php wp_reset_query() ?>
      <?php endforeach ?>
    </div>
  </div>
</div>
<?php Helpers::renderPartial('contact') ?>


<?php
get_footer();
