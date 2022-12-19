<?php
  get_header();
?>

<div class="post-rollup">
  <div class="container">
    <h1 class="post-rollup__title">
      The Latest News &amp; Tips in the Mortgage Industry
    </h1>
    <div class="post-rollup__items">
      <!-- the wordpress loop -->
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php Helpers::renderPartial('blog-card', ['post' => get_the_ID()]) ?>
      <?php endwhile; else: ?>
        <div class="post-rollup__no-results">
          <h2>Sorry, we couldn't find any news</h2>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php
  get_footer();