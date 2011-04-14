<td>
    <ul class="sf_admin_td_actions">
        <li class="sf_admin_action_up">
            <?php
            if ($faq->getPosition() > 1) {
                echo link_to('Monter', 'faq/listMonter?id='.$faq->getId(), array());
            }
            ?>
        </li>
        <li class="sf_admin_action_down">
            <?php
            if ($faq->getPosition() < Category::getLastPosition()) {
                echo link_to('Descendre', 'faq/listDescendre?id='.$faq->getId(), array());
            }
            ?>
        </li>
        <?php echo $helper->linkToEdit($faq, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
        <?php echo $helper->linkToDelete($faq, array('params' => array(), 'confirm' => 'Etes-vous sûr?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
    </ul>
</td>