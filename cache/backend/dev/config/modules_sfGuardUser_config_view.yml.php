<?php
// auto-generated by sfViewConfigHandler
// date: 2011/05/03 13:59:38
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('admin.css', '', array ());
  $response->addStylesheet('jquery-ui-1.8.10.custom.css', '', array ());
  $response->addStylesheet('uidatepicker.css', '', array ());
  $response->addJavascript('lib/jquery-ui-1.8.10.custom.min.js', '', array ());
  $response->addJavascript('lib/uidatepicker-fr.jss', '', array ());


