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
    <?php if(count($doc) <= 0 ): ?>
<div class="no-doc">
          <?php print(t('No results')); ?>
      </div>
<?php else: ?>

<h2><?php ($doc[0]->authLastNameFirstName_s )? print t("AUTHORS") :''?></h2>
<ul class="doc-authors">
        <?php foreach ($doc[0]->authLastNameFirstName_s as $auth): ?>
            <li><?php print $auth ?></li>
        <?php endforeach; ?>
        </ul>

<?php  if($doc[0]->keyword_s || $doc[0]->en_keyword_s):?>
<h2><?php print t("keywords")?></h2>
<?php
			if ($language->language == "fr") {
				print ("<ul class=\"doc-keywords\">") ;
				foreach ( $doc [0]->keyword_s as $keyword ) {
					print "<li>" . $keyword . "</li>";
				}
				print ("</ul>") ;
			} else {
				print $doc [0]->en_keyword_s;
			}
			?>
        <?php endif; ?>

         <?php  if($doc[0]->docType_s):?>
<h2><?php print t("Document type")?></h2>
<?php print $doc[0]->docType_s;?>
            <?php endif; ?>


<h2><?php ($doc[0]->abstract_s || $doc[0]->en_abstract_s) ? print t("ABSTRACT"):''; ?></h2>
<p class="doc-abstract">
        <?php
		if ($language->language == "fr") {
			print $doc [0]->abstract_s [0];
		} else {
			print $doc [0]->en_abstract_s [0];
		}
		?>
        </p>
<?php  if($doc[0]->fileMain_s):?>
<h2><?php print t("FILE")?></h2>
<a class="doc-file" href="<?php  print($doc[0]->fileMain_s)?>"> <img
	src="/<?php print drupal_get_path('module','amu_hal')."/doc_file.png"?>" />
</a>
<?php endif; ?>

          <?php  if($doc[0]->uri_s):?>
<p class="doc-more-info">
	<a class="more" href="<?php print $doc[0]->uri_s;?>"><?php print(t("More information")) ?></a>
</p>
<?php endif; ?>

    <?php endif; ?>
<?php endif; ?>