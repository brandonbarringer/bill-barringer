<?php  
  $fields = get_field('contact');
  $title = $fields['title'];
  $phone = $fields['phone'];
  // remove non-numeric characters from phone number
  $phoneLink = preg_replace('/[^0-9]/', '', $phone);
?>

<div class="contact">
  <div class="contact__layout">
    <div class="contact__content">
    <h2 class="contact__title">
        <?= $title ?>  
      </h2>
      <a href="tel:<?= $phoneLink ?>" class="contact__phone">
        <?= $phone ?>
      </a>
    </div>
  </div>
</div>