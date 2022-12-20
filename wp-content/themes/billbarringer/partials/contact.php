<?php  
  $fields = get_field('contact');
  $title = $fields['title'];
  $phone = $fields['phone'];
  $email = antispambot($fields['email']);
  // remove non-numeric characters from phone number
  $phoneLink = preg_replace('/[^0-9]/', '', $phone);
?>

<div class="contact">
  <div class="contact__layout">
    <div class="contact__content">
      <h2 class="contact__title">
        <?= $title ?>  
      </h2>
      <div class="contact__buttons">
        <?php if (!empty($email)): ?>
          <a href="mailto:<?= $email ?>" class="contact__button">
            <?= $email ?>
          </a>
        <?php endif ?>
        <?php if (!empty($phone)): ?>
          <a href="tel:<?= $phoneLink ?>" class="contact__button">
            <?= $phone ?>
          </a>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>