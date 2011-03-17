<td>
    <ul class="sf_admin_td_actions">
        <li class="sf_admin_action_up">
            <?php
            if ($category->getPosition() > 1) {
                echo link_to('Monter', 'category/listMonter?id='.$category->getId(), array());
            }
            ?>
        </li>
        <li class="sf_admin_action_down">
            <?php
            if ($category->getPosition() < Category::getLastPosition()) {
                echo link_to('Descendre', 'category/listDescendre?id='.$category->getId(), array());
            }
            ?>
        </li>
        <?php echo $helper->linkToEdit($category, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
        <?php echo $helper->linkToDelete($category, array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
    </ul>
</td>