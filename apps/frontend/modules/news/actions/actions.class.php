<?php

/**
 * news actions.
 *
 * @package    grainedevie
 * @subpackage news
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->news=Doctrine_Core::getTable('News')->createQuery('a')->leftJoin('a.Language t')->where("a.publication_date < NOW()")->andWhere("a.is_activated=?",true)->andWhere('t.abbreviation= ?',$this->getUser()->getCulture())->orderBy('a.publication_date DESC')->execute();
  }
  public function executeShow(sfWebRequest $request)
  {
  	$this->news = $this->getRoute()->getObject();
    $this->comments = Doctrine_Core::getTable('NewsComments')
        ->createQuery('a')
        ->where('a.news_id= ? ', $this->news->getId())
        ->orderBy('least(id,coalesce(father_id,id)), created_at')
        ->execute();
    $this->authenticated = $this->getUser()->isAuthenticated();
    if($this->authenticated)
    {
      $this->form = new NewsCommentsForm();
      $this->form->setDefault('author_id', $this->getUser()->getGuardUser()->getId());
      $this->form->setDefault('news_id', $this->getRequestParameter('id'));
      $this->form->setDefault('father_id', $this->getRequestParameter('answer'));
      if(($this->answer=$this->getRequestParameter('answer'))!=null)
      {
        $com=Doctrine::getTable('newsComments')->find($this->answer);
        $this->answer=$com->getSfGuardUser()->getName();
        $this->form->getWidgetSchema()->setLabels(array('content' =>'Postez un commentaire en réponse à '.$this->answer.' (<a href="'.$this->generateUrl('news_show',$this->news).'">Annuler</a>) : <br/>'));     
      }
      else
        $this->form->getWidgetSchema()->setLabels(array('content' =>'Postez un commentaire : <br/>'));
    }
  }
}