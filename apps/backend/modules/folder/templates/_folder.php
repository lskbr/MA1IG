<table>
    <input type="hidden" class="folderMessageId" value="#">
    <?php foreach ($folders as $compteur => $folder): ?>
        <tr>
            <td>
                <a href="#" class="folderChoice" id="<?php echo $folder->getId(); ?>"><?php echo $folder->getName(); ?></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>