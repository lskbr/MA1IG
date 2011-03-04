<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <?php echo $sf_content ?>
    </body><div id="footer">
        <div class="content">
            <!-- footer content -->

            <?php
            $form = new sfFormLanguage(
                            $sf_user,
                            array('languages' => array('en', 'fr'))
                    )
            ?>
            <form action="<?php echo url_for('change_language') ?>">
<?php echo $form ?><input type="submit" value="ok" />
            </form>
        </div>
    </div>
    <div id="footer">
  <div class="content">
    <!-- footer content -->

    <?php include_component('language', 'language') ?>
  </div>
</div>

</html>
