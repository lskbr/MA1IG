<td>
    <ul class="sf_admin_td_actions">
        <li class="sf_admin_action_forward">
            <a href="#" class="sf_admin_action_forward_link" id="<?php echo $message->getId()?>">Déléguer la réponse</a>
        </li>
        <li class="sf_admin_action_change_folder">
            <a href="#" class="sf_admin_action_change_folder_link" id="<?php echo $message->getId()?>">Changer de dossier</a>
        </li>
        <?php echo $helper->linkToDelete($message, array('params' => array(), 'confirm' => 'Etes-vous sûr?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
    </ul>
</td>


