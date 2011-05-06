<?php foreach ($folders as $compteur => $folder): ?>
	<a href="#" class="folderChoice" id="<?php echo $folder->getId(); ?>"><?php echo $folder->getSlogan1(); ?></a>
<?php endforeach; ?>
