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

<?php
get_footer();
