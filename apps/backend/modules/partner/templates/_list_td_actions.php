<td>
  <ul class="sf_admin_td_actions">
  	<?php if(!$partner->getIsVisible()): ?>
    <li class="sf_admin_action_enable">
      <?php echo link_to(__('Activer', array(), 'messages'), 'partner/enable?id='.$partner->getId(), array()) ?>
    </li>
    <?php else: ?>
    <li class="sf_admin_action_disable">
      <?php echo link_to(__('Désactiver', array(), 'messages'), 'partner/disable?id='.$partner->getId(), array()) ?>
    </li>
    <?php endif; ?>
  </ul>
</td>