
<nav class="nav">
  <div class="container nav__layout">
    <a class="nav__brand" href="<?php echo home_url(); ?>">
    <?php Helpers::renderPartial('logo') ?>

    </a>
    <button class="nav__toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar__toggle-icon"></span>
    </button>

    <ul class="nav__menu" id="navbarSupportedContent">
      <?php  
        wp_nav_menu([
          'menu' => 'main-menu',
          'items_wrap' => '%3$s',
          'container' => false,
          'depth' => 1,
        ]);
      ?>
    </ul>
  </div>
</nav>
