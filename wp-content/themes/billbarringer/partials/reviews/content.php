<?php  
  $title = $args['title'];
  $content = wpautop($args['content']);
  $title = 'What Sets Me Apart From Other Lenders?';
  $content = wpautop('What stands me apart from other Lenders? It is simple: I live my personal & professional life by one axiom: Treat others as you want to be treated. Very simple but at the same time complex: What this means is that I will always be honest and communicative to all of the parties involved in the transaction. It also means that I will give every option available to fit your financing needs as no two people are alike. What may be good for one borrower may not be good for everyone.

  I take great pride in my knowledge of the industry and the latest guidelines & trends. With this knowledge I am able to tailor a loan program that fits the borrower’s situation, both now and in the future.
  
  Studies have shown that next to a divorce, and death, purchasing a house can be the most stressful process there is. While no one has ever told me the mortgage process was fun, I make every effort to make it bearable. I am at YOUR service.')
?>

<div class="review-content">
  <h2 class="review-content__title">
    <?= $title ?>
  </h2>
  <div class="review-content__text">
    <?= $content ?>
  </div>
</div>