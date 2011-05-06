<?php

/**
 * contactavances module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage contactavances
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContactavancesGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%_status%% - %%=sender_name%% - %%faq_category%% - %%created_at%% - %%read_at%% - %%_folderjs%% - %%_responder%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Liste des messages';
  }

  public function getEditTitle()
  {
    return 'Lecture du message de %%sender_name%%';
  }

  public function getNewTitle()
  {
    return 'New Contactavances';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'folder_id',);
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => '_status',  1 => '=sender_name',  2 => 'faq_category',  3 => 'created_at',  4 => 'read_at',  5 => '_folderjs',  6 => '_responder',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'text' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Message',),
      'is_saved' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Voulez-vous conserver ce message ?',),
      'read_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Lu le',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Envoyé le',),
      'reply_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'comment_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'sender_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'category_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Catégorie',),
      'folder_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Dossier',),
      'forward_to_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'sender_name' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Expéditeur',),
      'faq_category' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Catégorie',),
      'comment' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Commentaire',  'help' => 'N\'est pas visible pour l\'expéditeur mais seulement par les admins',),
      'folderjs' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Dossier',),
      'responder' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Persone devant répondre :',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'text' => array(),
      'is_saved' => array(),
      'read_at' => array(),
      'created_at' => array(),
      'reply_at' => array(),
      'comment_id' => array(),
      'sender_id' => array(),
      'category_id' => array(),
      'folder_id' => array(),
      'forward_to_id' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'text' => array(),
      'is_saved' => array(),
      'read_at' => array(),
      'created_at' => array(),
      'reply_at' => array(),
      'comment_id' => array(),
      'sender_id' => array(),
      'category_id' => array(),
      'folder_id' => array(),
      'forward_to_id' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'text' => array(),
      'is_saved' => array(),
      'read_at' => array(),
      'created_at' => array(),
      'reply_at' => array(),
      'comment_id' => array(),
      'sender_id' => array(),
      'category_id' => array(),
      'folder_id' => array(),
      'forward_to_id' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'text' => array(),
      'is_saved' => array(),
      'read_at' => array(),
      'created_at' => array(),
      'reply_at' => array(),
      'comment_id' => array(),
      'sender_id' => array(),
      'category_id' => array(),
      'folder_id' => array(),
      'forward_to_id' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'text' => array(),
      'is_saved' => array(),
      'read_at' => array(),
      'created_at' => array(),
      'reply_at' => array(),
      'comment_id' => array(),
      'sender_id' => array(),
      'category_id' => array(),
      'folder_id' => array(),
      'forward_to_id' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'MessageAdminForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'MessageFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array('read_at', 'desc');
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
