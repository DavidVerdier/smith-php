<?php
$container = new FullHeightContainer();
$layout = new BorderLayout();
$bar = new FLowLayout();

$btn = new Button('#',new Icon('coffee'), 'Coffee');
$btn->addStyle('big');
$bar->addComponent($btn);
$btn = new Button('#',new Icon('upload'), 'Upload');
$btn->addStyle('big floating');
$bar->addComponent($btn);
$btn = new Button('#',new Icon('file-o'), null);
$btn->addStyle('big floating');
$bar->addComponent($btn);
$btn = new Button('#',new Icon('facebook'), 'Facebook');
$btn->addStyle('big floating');
$bar->addComponent($btn);
$btn = new Button('#',null, 'Twitter');
$btn->addStyle('big floating');
$bar->addComponent($btn);

//$bar->addStyle('fill');

$layout->addComponent($bar,'north');
$container->addComponent($layout);

$app->addComponent($container);
$app->getDocument()->addBaseTheme('Paper');
$app->getDocument()->addHead(new TextNode('<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">'));
$app->getDocument()->addScript(CORE_JS.'/hammer-time');
$app->getDocument()->addLink(new Link('manifest','',CORE_ASSETS.'/manifest.json'));
//$app->debugLayout(true,true);
?>