<?php echo get_component('repository', 'logo') ?>

<?php if (QubitAcl::check($resource, 'update')): ?>
  <?php include_component('repository', 'uploadLimit', array('resource' => $resource)) ?>
<?php endif; ?>

<div class="section" id="holdings">

  <h3><?php echo sfConfig::get('app_ui_label_holdings') ?></h3>

  <ul>
    <?php foreach ($pager->getResults() as $hit): ?>
      <?php $doc = build_i18n_doc($hit) ?>
      <li><?php echo link_to($doc[$sf_user->getCulture()]['title'], array('module' => 'informationobject', 'slug' => $doc['slug'])) ?></li>
    <?php endforeach; ?>
  </ul>

  <?php echo get_partial('default/pager', array('pager' => $pager, 'small' => true)) ?>

</div>
