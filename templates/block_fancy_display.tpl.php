<?php
/**
 * Created by PhpStorm.
 * User: ritsch
 * Date: 17/11/2016
 * Time: 14:15
 */
global $language;

?>
<?php if ($display == 'teaser'): ?>
  <?php if (count($docs) <= 0): ?>
    <div class="no-news">
      <?php print(t('No results')); ?>
    </div>
  <?php else: ?>
    <ul class="hal-pub-list-type-2 ">
      <?php foreach ($docs as $doc): ?>
        <li class="hal-pub">
          <a href="/doc/<?php print $doc->halId_s ?>/<?php print($suffix) ?>">
            <div class="hal-pub__title">
              <?php
              if ($language->language == "fr") {
                print($doc->title_s[0]);
              }
              else {
                if ($doc->en_title_s[0]) {
                  print($doc->en_title_s[0]);
                }
                else {
                  print($doc->title_s[0]);
                }
              }
              ?>
            </div>
            <ul class="hal-pub__authors">
              <?php foreach ($doc->authLastNameFirstName_s as $auth): ?>
                <li><?php print $auth ?></li>
              <?php endforeach; ?>
            </ul>
            <div class="hal-pub__citation-ref">
              <?php print($doc->journalTitle_s) ?>
            </div>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <?php if ($config->retrieval_method_select != 'by_user_fields'): ?>
      <div class="hal-more-pub">
        <a class="more" href="/docs/<?php print(date('Y')) ?>/<?php print($suffix) ?>">
          Plus de publications
        </a>
      </div>
    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>


