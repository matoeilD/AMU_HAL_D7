<?php
/**
 * Created by PhpStorm.
 * User: ritsch
 * Date: 17/11/2016
 * Time: 14:15
 */
global $language;

?>
<?php if ($display == 'full'): ?>
    <?php if (count($docs) <= 0): ?>
<div class="no-news">
            <?php print(t('No results')); ?>
        </div>
<?php else: ?>
<ul class="hal-pub-list">
            <?php foreach ($docs as $doc): ?>
                <li class="hal-pub"><a
		href="/doc/<?php print $doc->halId_s ?>/<?php print($suffix)?>"><?php print $doc->label_s ?></a>
		<span class="hal_pub_doctype"><?php print $doc->docType_s; ?> </span>
	</li>
            <?php endforeach; ?>
        </ul>
<?php endif; ?>

    <?php
	/* ---- Year navigation toolbar----- */
	$hal_date_start = variable_get ( 'hal_date_start', '2000' );
	?>
<ul class="hal-year-nav">
        <?php for ($year = date('Y'); $year >= $hal_date_start; $year--): ?>
            <li><a
		href="/docs/<?php print($year) ?>/<?php print($suffix)?>"><?php print($year) ?></a>&nbsp;</li>
        <?php endfor; ?>
    </ul>
<?php endif; ?>