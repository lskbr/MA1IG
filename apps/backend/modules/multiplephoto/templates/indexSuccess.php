<form method="post" enctype="multipart/form-data" accept-charset="utf-8">
  <p>
    <?php use_stylesheets_for_form($form)?>
    <?php use_javascripts_for_form($form)?>
    <?php echo $form?>
    <input type="hidden" name="sf_method" value="put" />
  </p>
</form>