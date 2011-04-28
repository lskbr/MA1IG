<h1>Photos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Image</th>
      <th>Url</th>
      <th>Publication start</th>
      <th>Publication end</th>
      <th>Galery</th>
      <th>Created at</th>
      <th>Updated at</th>

    </tr>
  </thead>
  <tbody>
    <?php $pager_photos=$pager->getResults();  ?>
    <?php foreach ($pager_photos as $photo): ?>
    <tr>
      <td><a href="<?php echo url_for('photo/show?id='.$photo->getId()) ?>"><?php echo $photo->getId() ?></a></td>
      <td><?php include_partial('photo/picsmall', array('photo' => $photo)) ?></td>
      <td><?php echo $photo->getUrl() ?></td>
      <td><?php echo $photo->getPublicationStart() ?></td>
      <td><?php echo $photo->getPublicationEnd() ?></td>
      <td><?php echo $photo->getGaleryId() ?></td>
      <td><?php echo $photo->getCreatedAt() ?></td>
      <td><?php echo $photo->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div class="pagination">
<?php if ($pager->getPage()!=1): ?>
<a href="<?php echo url_for('photo') ?>?page=1">
<img src="/images/icons/first.png" alt="First page" title="First page" /></a>

<a href="<?php echo url_for('photo') ?>?page=<?php echo $pager->getPreviousPage() ?>">
<img src="/images/icons/previous.png" alt="Previous page" title="Previous page" /></a>
<?php endif; ?>

<?php foreach ($pager->getLinks() as $page): ?>
  <?php if ($page == $pager->getPage()): ?>
    <?php echo $page ?>
  <?php else: ?>
    <a href="<?php echo url_for('photo') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
  <?php endif; ?>
<?php endforeach; ?>

<?php if ($pager->getPage()!=$pager->getLastPage()): ?>
<a href="<?php echo url_for('photo') ?>?page=<?php echo $pager->getNextPage() ?>">
<img src="/images/icons/next.png" alt="Next page" title="Next page" /></a>
<a href="<?php echo url_for('photo') ?>?page=<?php echo $pager->getLastPage() ?>">
<img src="/images/icons/last.png" alt="Last page" title="Last page" /></a>
<?php endif; ?>
</div>

<div class="pagination_desc">
<strong><?php echo count($pager) ?></strong> photos in this gallery
<?php if ($pager->haveToPaginate()): ?>
- page <strong><?php echo $pager->getPage() ?>/<?php echo
$pager->getLastPage() ?></strong>
<?php endif; ?>
</div>
