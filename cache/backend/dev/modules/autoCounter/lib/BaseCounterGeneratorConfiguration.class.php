<?php

/**
 * counter module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage counter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCounterGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return array();
  }

  public function getListParams()
  {
    return '%%=initial_date%% - %%=initial_number%% - %%=period%% - %%=objective_number%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Gestion du compteur d\'arbres';
  }

  public function getEditTitle()
  {
    return 'Modification du compteur d\'arbres';
  }

  public function getNewTitle()
  {
    return 'Gestion du compteur d\'arbres';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array(  0 => '=initial_date',  1 => '=initial_number',  2 => '=period',  3 => '=objective_number',);
  }

  public function getNewDisplay()
  {
    return array(  0 => '=initial_date',  1 => '=initial_number',  2 => '=period',  3 => '=objective_number',);
  }

  public function getListDisplay()
  {
    return array(  0 => '=initial_date',  1 => '=initial_number',  2 => '=period',  3 => '=objective_number',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'initial_date' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'initial_number' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'period' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'objective_number' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'initial_date' => array(  'label' => 'Date initial',  'date_format' => 'dd-MMMM-yyyy',),
      'initial_number' => array(  'label' => 'Nombre d\'arbres initial',),
      'period' => array(  'label' => 'Période (en mois)',),
      'objective_number' => array(  'label' => 'Objectif',),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'initial_date' => array(),
      'initial_number' => array(),
      'period' => array(),
      'objective_number' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'initial_date' => array(),
      'initial_number' => array(),
      'period' => array(),
      'objective_number' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'initial_date' => array(  'label' => 'Date initial',  'date_format' => 'dd-MMMM-yyyy',),
      'initial_number' => array(  'label' => 'Nombre d\'arbres initial',),
      'period' => array(  'label' => 'Période (en mois)',),
      'objective_number' => array(  'label' => 'Objectif',),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'initial_date' => array(  'label' => 'Date initial',  'date_format' => 'dd-MMMM-yyyy',),
      'initial_number' => array(  'label' => 'Nombre d\'arbres initial',),
      'period' => array(  'label' => 'Période (en mois)',),
      'objective_number' => array(  'label' => 'Objectif',),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'CounterForm';
  }

  public function hasFilterForm()
  {
    return false;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'CounterFormFilter';
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
    return array(null, null);
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
