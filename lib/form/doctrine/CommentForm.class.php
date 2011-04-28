<?php

/**
 * Comment form.
 *
 * @package    grainedevie
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentForm extends BaseCommentForm
{
  public function configure()
  {
      $this->setWidget('text', new sfWidgetFormTextarea());
        $this->setValidator('text', new sfValidatorString());
        unset(
            $this['update_at']
        );

        $this->getWidgetSchema()->setLabels(array(
            'text' => 'commentaire',
        ));
  }
}
