<center>
    <h1>Choix d'un dossier</h1>
</center>
<ul>
    <input type="hidden" class="folderMessageId" value="#">
    <?php foreach ($folders as $compteur => $folder): ?>
        <li>
            <a href="#" class="folderChoice" id="<?php echo $folder->getId(); ?>"><?php echo $folder->getName(); ?></a>
        </li>
    <?php endforeach; ?>
</ul>
