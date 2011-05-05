<?php
// auto-generated by sfViewConfigHandler
// date: 2011/05/05 19:40:48
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

  $response->addStylesheet('frontend.css', '', array ());
  $response->addStylesheet('search.css', '', array ());
  $response->addStylesheet('protoslider.css', '', array ());
  $response->addStylesheet('jquery-ui-1.8.10.custom.css', '', array ());
  $response->addStylesheet('slimbox2.css', '', array ());
  $response->addJavascript('http:////www.google.com/jsapi', '', array ());
  $response->addJavascript('lib/prototype.js', '', array ());
  $response->addJavascript('lib/jquery-1.5.1.min.js', '', array ());
  $response->addJavascript('lib/jquery-ui-1.8.10.custom.min.js', '', array ());
  $response->addJavascript('lib/easel.min.js', '', array ());
  $response->addJavascript('lib/chili-1.7.pack.js', '', array ());
  $response->addJavascript('lib/jquery.easing.js', '', array ());
  $response->addJavascript('lib/jquery.dimensions.js', '', array ());
  $response->addJavascript('lib/jquery.accordion.js', '', array ());
  $response->addJavascript('protoslider/protoslider.min.js', '', array ());
  $response->addJavascript('jscounter/jscounter.min.js', '', array ());
  $response->addJavascript('global.js', '', array ());
  $response->addJavascript('addthis.js', '', array ());
  $response->addJavascript('slimbox/slimbox2.js', '', array ());
  $response->addJavascript('http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4d92ffa329add9af', '', array ());


