<?php
/**
 * Created by PhpStorm.
 * User: ritsch
 * Date: 17/11/2016
 * Time: 14:15
 */
?>


<?php if ($display == 'teaser'): ?>
    <?php if(count($docs) <= 0 ): ?>
<div class="no-news">
          <?php print(t('No results')); ?>
      </div>
<?php else: ?>
<ul class="hal-pub-list">
    <?php foreach ($docs as $doc): ?>
      <?php //dpm($node); ?>
      <li class="hal-pub">
      <a	href="/doc/<?php print $doc->halId_s ?>/<?php print($suffix)?>">
                <?php print $doc->label_s?>
          </a></li>
    <?php endforeach; ?>
    </ul>
<?php if($config->retrieval_method_select != 'by_user_fields'): ?>
<div class="hal-more-pub">
	<a class="more"
		href="/docs/<?php print(date('Y'))?>/<?php print($suffix)?>">Plus de
		publications</a>
</div>
<?php endif; ?>
    <?php endif; ?>
<?php endif; ?>