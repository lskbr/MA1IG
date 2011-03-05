<td>
  <ul class="sf_admin_td_actions">
    <li class="sf_admin_action_enable">
      <?php echo link_to(__('Activer', array(), 'messages'), 'language/enable?id='.$language->getId(), array()) ?>
    </li>
    <li class="sf_admin_action_disable">
      <?php echo link_to(__('Désactiver', array(), 'messages'), 'language/disable?id='.$language->getId(), array()) ?>
    </li>
  </ul>
</td>
