<td>
  <ul class="sf_admin_td_actions">
  	<?php if(!$news->getIsActivated()): ?>
    <li class="sf_admin_action_enable">
      <?php echo link_to(__('Publier'), 'news/enable?id='.$news->getId(), array()) ?>
    </li>
    <?php else: ?>
    <li class="sf_admin_action_disable">
      <?php echo link_to(__('Invalider'), 'news/disable?id='.$news->getId(), array()) ?>
    </li>
    <?php endif; ?>
    <?php echo $helper->linkToEdit($news, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($news, array('params' => array(), 'confirm' => 'Etes-vous sûr?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
  </ul>
</td>