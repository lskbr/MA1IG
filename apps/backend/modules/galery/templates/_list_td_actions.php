<td>
    <ul class="sf_admin_td_actions">
        <li class="sf_admin_action_up">
            <?php
            $min_galery=Galery::getFirstPosition();
            $max_galery=Galery::getLastPosition();

            if ($galery->getPosition() > $min_galery) {
                echo link_to('Monter', 'galery/listMonter?id='.$galery->getId(), array());
            }
            ?>
        </li>
        <li class="sf_admin_action_down">
            <?php
            if ($galery->getPosition() < $max_galery) {
                echo link_to('Descendre', 'galery/listDescendre?id='.$galery->getId(), array());
            }
            ?>
        </li>
        <?php echo $helper->linkToEdit($galery, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
        <?php echo $helper->linkToDelete($galery, array('params' => array(), 'confirm' => 'Etes-vous sûr?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
    </ul>
</td>