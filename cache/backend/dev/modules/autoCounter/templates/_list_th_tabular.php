<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_initial_date">
  <?php if ('initial_date' == $sort[0]): ?>
    <?php echo link_to(__('Date initial', array(), 'messages'), '@counter', array('query_string' => 'sort=initial_date&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Date initial', array(), 'messages'), '@counter', array('query_string' => 'sort=initial_date&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_initial_number">
  <?php if ('initial_number' == $sort[0]): ?>
    <?php echo link_to(__('Nombre d\'arbres initial', array(), 'messages'), '@counter', array('query_string' => 'sort=initial_number&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Nombre d\'arbres initial', array(), 'messages'), '@counter', array('query_string' => 'sort=initial_number&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_period">
  <?php if ('period' == $sort[0]): ?>
    <?php echo link_to(__('Période (en mois)', array(), 'messages'), '@counter', array('query_string' => 'sort=period&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Période (en mois)', array(), 'messages'), '@counter', array('query_string' => 'sort=period&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_objective_number">
  <?php if ('objective_number' == $sort[0]): ?>
    <?php echo link_to(__('Objectif', array(), 'messages'), '@counter', array('query_string' => 'sort=objective_number&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Objectif', array(), 'messages'), '@counter', array('query_string' => 'sort=objective_number&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>