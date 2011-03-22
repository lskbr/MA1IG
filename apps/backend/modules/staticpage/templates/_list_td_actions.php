<td>
    <ul class="sf_admin_td_actions">
        <li class="sf_admin_action_up">
            <?php
            if ($static_page->getPosition() > 1) {
                echo link_to('Monter', 'staticpage/listMonter?id='.$static_page->getId(), array());
            }
            ?>
        </li>
        <li class="sf_admin_action_down">
            <?php
            if ($static_page->getPosition() < StaticPage::getLastPositionOfMyCategory($static_page)) {
                echo link_to('Descendre', 'staticpage/listDescendre?id='.$static_page->getId(), array());
            }
            ?>
        </li>
        <?php echo $helper->linkToEdit($static_page, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
        <?php echo $helper->linkToDelete($static_page, array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
    </ul>
</td>