<td>
  <ul class="sf_admin_td_actions">
  	<?php if(!$guestbook->getIsValidated()): ?>
    <li class="sf_admin_action_enable">
      <?php echo link_to(__('Valider', array(), 'messages'), 'guestbook/enable?id='.$guestbook->getId(), array()) ?>
    </li>
    <?php else: ?>
    <li class="sf_admin_action_disable">
      <?php echo link_to(__('Invalider', array(), 'messages'), 'guestbook/disable?id='.$guestbook->getId(), array()) ?>
    </li>
    <?php endif; ?>
    <?php echo $helper->linkToEdit($guestbook, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($guestbook, array('params' => array(), 'confirm' => 'Etes-vous sûr?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
  </ul>
</td>