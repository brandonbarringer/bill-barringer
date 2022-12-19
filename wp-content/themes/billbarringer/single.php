<?php
  get_header();
?>

<?php if (have_posts()):  ?>
    <div class="post-single">
      <div class="container container--small">
        <?php while (have_posts()): the_post(); ?>
          <h1 class="post-single__title">
            <?php the_title(); ?>
          </h1>
          <div class="post-single__content">
            <?php the_content(); ?>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
<?php endif; ?>
<?php
  get_footer();